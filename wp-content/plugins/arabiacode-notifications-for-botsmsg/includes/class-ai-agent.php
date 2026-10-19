<?php
if (!defined('ABSPATH')) exit;

class BOTSMSG_AI_Agent {

    public function __construct() {
        add_action('rest_api_init', [$this, 'register_webhook']);
    }

    /**
     * Register the public webhook endpoint.
     * URL: POST /wp-json/botsmsg/v1/webhook
     */
    public function register_webhook() {
        register_rest_route('botsmsg/v1', '/webhook', [
            'methods'             => WP_REST_Server::CREATABLE,
            'callback'            => [$this, 'handle_webhook'],
            'permission_callback' => '__return_true',
        ]);
    }

    /**
     * Handle incoming webhook from BotsMSG.
     *
     * @param WP_REST_Request $request
     * @return WP_REST_Response
     */
    public function handle_webhook(WP_REST_Request $request) {

        // ── 1. Validate webhook secret (if configured) ───────────────────────
        $secret = get_option('botsmsg_ai_webhook_secret', '');
        if (!empty($secret)) {
            $incoming = $request->get_header('x-botsmsg-secret');
            if (!hash_equals($secret, (string) $incoming)) {
                error_log('[BotsMSG AI] Unauthorized: invalid webhook secret');
                return new WP_REST_Response(['error' => 'Unauthorized'], 401);
            }
        }

        // ── 2. Parse payload ─────────────────────────────────────────────────
        $body = $request->get_json_params(); // works when Content-Type: application/json
        if (empty($body)) {
            $body = $request->get_body_params(); // fallback: form-encoded
        }
        if (empty($body)) {
            // Fallback: BotsMSG may send raw JSON without the correct Content-Type header
            $raw  = $request->get_body();
            $body = json_decode($raw, true);
            if (!is_array($body)) {
                $body = [];
            }
        }

        error_log('[BotsMSG AI] Parsed body: ' . wp_json_encode($body));

        $phone   = $this->extract_phone($body);
        $message = $this->extract_message($body);

        error_log('[BotsMSG AI] Phone: ' . $phone . ' | Message: ' . $message);

        if (empty($phone) || empty($message)) {
            BOTSMSG_Logs::insert('unknown', wp_json_encode($body), 'failed', 'Missing phone or message in payload');
            return new WP_REST_Response(['error' => 'Missing phone or message', 'body' => $body], 400);
        }

        // ── Guard: ignore outgoing messages to prevent infinite reply loop ────
        // BotsMSG fires a webhook for every sent message (including the bot's own
        // replies). We compare the sender against the configured bot WhatsApp number.
        $bot_number   = sanitize_text_field(get_option('botsmsg_ai_bot_number', ''));
        $phone_digits = preg_replace('/\D/', '', $phone);
        $bot_digits   = preg_replace('/\D/', '', $bot_number);

        if (!empty($bot_digits) && $phone_digits === $bot_digits) {
            error_log('[BotsMSG AI] Skipped: sender is the bot itself (outgoing message)');
            return new WP_REST_Response(['status' => 'skipped_outgoing'], 200);
        }

        $phone   = sanitize_text_field($phone);
        $message = sanitize_textarea_field($message);

        // ── 3. Check if AI agent is enabled ──────────────────────────────────
        if (!get_option('botsmsg_ai_enabled', 0)) {
            error_log('[BotsMSG AI] Skipped: AI agent is disabled in settings');
            return new WP_REST_Response(['status' => 'ai_disabled'], 200);
        }

        // ── 4. Off-hours gate ─────────────────────────────────────────────────
        if (get_option('botsmsg_ai_offhours_only', 0)) {
            $start = sanitize_text_field(get_option('botsmsg_ai_offhours_start', '18:00'));
            $end   = sanitize_text_field(get_option('botsmsg_ai_offhours_end',   '09:00'));

            if (!$this->is_offhours($start, $end)) {
                error_log('[BotsMSG AI] Skipped: within business hours (' . current_time('H:i') . ')');
                return new WP_REST_Response(['status' => 'within_business_hours', 'current_time' => current_time('H:i')], 200);
            }
        }

        // ── 5. Call Groq AI ───────────────────────────────────────────────────
        error_log('[BotsMSG AI] Calling Groq for: ' . $message);
        $ai_reply = botsmsg_call_groq($message);

        if (!$ai_reply) {
            error_log('[BotsMSG AI] Groq API returned empty/false. Check API key and model in settings.');
            BOTSMSG_Logs::insert($phone, $message, 'failed', 'Groq API returned no reply');
            return new WP_REST_Response(['error' => 'Groq API error — check API key and model in AI Agent settings'], 500);
        }

        error_log('[BotsMSG AI] Groq replied: ' . $ai_reply);

        // ── 6. Send reply via BotsMSG ─────────────────────────────────────────
        $result = botsmsg_send_message($ai_reply, $phone);

        if (!$result) {
            error_log('[BotsMSG AI] BotsMSG send failed for phone: ' . $phone);
            return new WP_REST_Response(['error' => 'BotsMSG send failed — check App Key / Auth Key in Settings'], 500);
        }

        error_log('[BotsMSG AI] Reply sent successfully to ' . $phone);
        return new WP_REST_Response(['status' => 'ok', 'phone' => $phone], 200);
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    /**
     * Extract the sender phone number from the BotsMSG webhook payload.
     *
     * BotsMSG format: { "sender": "201006287379", "payload": { ... } }
     */
    private function extract_phone(array $body): string {
        // BotsMSG native format
        if (!empty($body['sender'])) {
            return (string) $body['sender'];
        }
        // Generic fallbacks
        foreach (['phone', 'from', 'mobile', 'number'] as $key) {
            if (!empty($body[$key])) {
                return (string) $body[$key];
            }
        }
        // Nested under 'data'
        if (isset($body['data']) && is_array($body['data'])) {
            foreach (['sender', 'phone', 'from', 'mobile', 'number'] as $key) {
                if (!empty($body['data'][$key])) {
                    return (string) $body['data'][$key];
                }
            }
        }
        return '';
    }

    /**
     * Extract the message text from the BotsMSG webhook payload.
     *
     * BotsMSG format: { "payload": { "conversation": "يا هلا", ... }, ... }
     */
    private function extract_message(array $body): string {
        // BotsMSG native format: payload.conversation
        if (!empty($body['payload']['conversation'])) {
            return (string) $body['payload']['conversation'];
        }
        // Other nested payload fields (e.g. payload.text, payload.body)
        if (isset($body['payload']) && is_array($body['payload'])) {
            foreach (['text', 'body', 'message', 'content', 'msg'] as $key) {
                if (!empty($body['payload'][$key])) {
                    return (string) $body['payload'][$key];
                }
            }
        }
        // Top-level fallbacks
        foreach (['message', 'text', 'body', 'content', 'msg'] as $key) {
            if (!empty($body[$key])) {
                return (string) $body[$key];
            }
        }
        // Nested under 'data'
        if (isset($body['data']) && is_array($body['data'])) {
            foreach (['conversation', 'message', 'text', 'body', 'content', 'msg'] as $key) {
                if (!empty($body['data'][$key])) {
                    return (string) $body['data'][$key];
                }
            }
        }
        return '';
    }

    /**
     * Check whether the current WordPress-timezone time falls within the
     * configured off-hours window. Supports midnight-crossing ranges
     * (e.g. 18:00 – 09:00).
     *
     * @param string $start "HH:MM"
     * @param string $end   "HH:MM"
     */
    private function is_offhours(string $start, string $end): bool {
        $now = (int) str_replace(':', '', current_time('H:i')); // e.g. 2130
        $s   = (int) str_replace(':', '', $start);               // e.g. 1800
        $e   = (int) str_replace(':', '', $end);                 // e.g. 0900

        if ($s < $e) {
            // Same-day range: e.g. 09:00 – 18:00
            return ($now >= $s && $now < $e);
        }

        // Midnight-crossing range: e.g. 18:00 – 09:00
        return ($now >= $s || $now < $e);
    }
}
