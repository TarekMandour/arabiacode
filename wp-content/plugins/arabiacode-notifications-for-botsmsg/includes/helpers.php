<?php
if (!defined('ABSPATH')) exit;

// get credentials
function botsmsg_get_credentials() {
    return [
        'appkey' => sanitize_text_field(get_option('botsmsg_appkey')),
        'authkey' => sanitize_text_field(get_option('botsmsg_authkey')),
    ];
}

// Send Text Message
function botsmsg_send_message($message, $phone = null) {

    $creds = botsmsg_get_credentials();

    if (!$creds['appkey'] || !$creds['authkey']) return false;

    $response = wp_remote_post('https://botsmsg.com/api/create-message', [
        'timeout' => 20,
        'body' => [
            'appkey'  => sanitize_text_field($creds['appkey']),
            'authkey' => sanitize_text_field($creds['authkey']),
            'to'      => sanitize_text_field($phone),
            'message' => sanitize_textarea_field($message),
            'sandbox' => 'false'
        ]
    ]);

    if (is_wp_error($response)) {
        BOTSMSG_Logs::insert($phone, $message, 'failed', $response->get_error_message());
        return false;
    }

    $body = wp_remote_retrieve_body($response);

    BOTSMSG_Logs::insert($phone, $message, 'success', $body);

    return $body;
}

/**
 * Send a message to the Groq API and return the AI's reply.
 *
 * @param string $user_message The incoming message from the WhatsApp user.
 * @return string|false        The AI reply text, or false on failure.
 */
function botsmsg_call_groq($user_message) {

    $api_key       = sanitize_text_field(get_option('botsmsg_ai_groq_apikey', ''));
    $model         = sanitize_text_field(get_option('botsmsg_ai_model', 'llama-3.3-70b-versatile'));
    $system_prompt = sanitize_textarea_field(get_option('botsmsg_ai_system_prompt', ''));

    if (empty($api_key)) return false;

    $payload = [
        'model'    => $model,
        'messages' => [
            [
                'role'    => 'system',
                'content' => $system_prompt ?: 'You are a helpful assistant.',
            ],
            [
                'role'    => 'user',
                'content' => $user_message,
            ],
        ],
    ];

    $response = wp_remote_post('https://api.groq.com/openai/v1/chat/completions', [
        'timeout' => 30,
        'headers' => [
            'Authorization' => 'Bearer ' . $api_key,
            'Content-Type'  => 'application/json',
        ],
        'body' => wp_json_encode($payload),
    ]);

    if (is_wp_error($response)) {
        return false;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);

    if (empty($data['choices'][0]['message']['content'])) {
        return false;
    }

    return sanitize_textarea_field($data['choices'][0]['message']['content']);
}

