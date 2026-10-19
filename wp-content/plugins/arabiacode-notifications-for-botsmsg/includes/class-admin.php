<?php
if (!defined('ABSPATH')) exit;

class BOTSMSG_Admin {

    public function __construct() {
        add_action('admin_menu', [$this, 'menu']);
        add_action('admin_init', [$this, 'settings']);
        add_action('wp_ajax_sn_send_manual', [$this, 'send_manual']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_assets']);
    }

    public function enqueue_assets($hook) {
        if ($hook !== 'toplevel_page_botsmsg-settings') {
            return;
        }

        wp_enqueue_style(
            'botsmsg-admin-css',
            BOTSMSG_URL . 'assets/css/admin.css',
            [],
            BOTSMSG_VERSION
        );

        wp_enqueue_script(
            'botsmsg-admin-js',
            BOTSMSG_URL . 'assets/js/admin.js',
            [],
            BOTSMSG_VERSION,
            true
        );

        wp_localize_script('botsmsg-admin-js', 'botsmsg_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);
    }

    public function menu() {
        add_menu_page(
            'BotsMSG Settings',
            'BotsMSG',
            'manage_options',
            'botsmsg-settings',
            [$this, 'page'],
            'dashicons-format-chat'
        );
    }

    public function settings() {
        // Settings tab group
        register_setting('botsmsg_settings_group', 'botsmsg_appkey', [
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        register_setting('botsmsg_settings_group', 'botsmsg_authkey', [
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        register_setting('botsmsg_settings_group', 'botsmsg_receiver', [
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        // Notifications tab group
        register_setting('botsmsg_notifications_group', 'botsmsg_order_message', [
            'sanitize_callback' => 'sanitize_textarea_field'
        ]);

        register_setting('botsmsg_notifications_group', 'botsmsg_enable_user', [
            'sanitize_callback' => 'absint'
        ]);

        register_setting('botsmsg_notifications_group', 'botsmsg_enable_comment', [
            'sanitize_callback' => 'absint'
        ]);

        register_setting('botsmsg_notifications_group', 'botsmsg_enable_order', [
            'sanitize_callback' => 'absint'
        ]);

        register_setting('botsmsg_notifications_group', 'botsmsg_enable_form', [
            'sanitize_callback' => 'absint'
        ]);

        register_setting('botsmsg_notifications_group', 'botsmsg_user_message', [
            'sanitize_callback' => 'sanitize_textarea_field'
        ]);

        register_setting('botsmsg_notifications_group', 'botsmsg_order_created_message', [
            'sanitize_callback' => 'sanitize_textarea_field'
        ]);

        register_setting('botsmsg_notifications_group', 'botsmsg_order_processing_message', [
            'sanitize_callback' => 'sanitize_textarea_field'
        ]);

        register_setting('botsmsg_notifications_group', 'botsmsg_order_completed_message', [
            'sanitize_callback' => 'sanitize_textarea_field'
        ]);

        register_setting('botsmsg_notifications_group', 'botsmsg_order_cancelled_message', [
            'sanitize_callback' => 'sanitize_textarea_field'
        ]);

        // AI Agent tab group
        register_setting('botsmsg_ai_group', 'botsmsg_ai_enabled', [
            'sanitize_callback' => 'absint'
        ]);

        register_setting('botsmsg_ai_group', 'botsmsg_ai_offhours_only', [
            'sanitize_callback' => 'absint'
        ]);

        register_setting('botsmsg_ai_group', 'botsmsg_ai_offhours_start', [
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        register_setting('botsmsg_ai_group', 'botsmsg_ai_offhours_end', [
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        register_setting('botsmsg_ai_group', 'botsmsg_ai_groq_apikey', [
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        register_setting('botsmsg_ai_group', 'botsmsg_ai_model', [
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        register_setting('botsmsg_ai_group', 'botsmsg_ai_system_prompt', [
            'sanitize_callback' => 'sanitize_textarea_field'
        ]);

        register_setting('botsmsg_ai_group', 'botsmsg_ai_webhook_secret', [
            'sanitize_callback' => 'sanitize_text_field'
        ]);

        register_setting('botsmsg_ai_group', 'botsmsg_ai_bot_number', [
            'sanitize_callback' => 'sanitize_text_field'
        ]);
    }

    public function send_manual() {

        if (!current_user_can('manage_options')) {
            wp_send_json_error('Unauthorized');
        }

        if (
            !isset($_POST['nonce']) ||
            !wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['nonce'])),
                'botsmsg_nonce'
            )
        ) {
            wp_send_json_error('Invalid nonce');
        }

        $phone = isset($_POST['phone'])
            ? sanitize_text_field(wp_unslash($_POST['phone']))
            : '';

        $message = isset($_POST['message'])
            ? sanitize_textarea_field(wp_unslash($_POST['message']))
            : '';

        if (!$phone || strlen($phone) < 8 || !$message) {
            wp_send_json_error('Invalid data');
        }

        botsmsg_send_message($message, $phone);

        wp_send_json_success('Message Sent');
    }

    public function page() {
?>

<div class="wrap botsmsg-container">

<h1>🚀 BotsMSG Dashboard</h1>

<div class="botsmsg-tabs">
    <button class="tab-btn active" data-tab="settings">⚙️ Settings</button>
    <button class="tab-btn" data-tab="notifications">🔔 Notifications</button>
    <button class="tab-btn" data-tab="ai-agent">🤖 AI Agent</button>
    <button class="tab-btn" data-tab="send">📲 Send</button>
    <button class="tab-btn" data-tab="logs">📊 Logs</button>
</div>

<!-- SETTINGS -->
<div class="tab-content active" id="settings">
    <div class="botsmsg-card">
        <h2>🔑 API Settings</h2>


        <h4>For App Key and Auth Key go to <a href="https://botsmsg.com">botsmsg.com </a></h4>

        <form method="post" action="options.php">
            <?php settings_fields('botsmsg_settings_group'); ?>

            <div class="botsmsg-grid">
                <div>
                    <label>App Key</label>
                    <input type="text" name="botsmsg_appkey" value="<?php echo esc_attr(get_option('botsmsg_appkey')); ?>">
                </div>

                <div>
                    <label>Auth Key</label>
                    <input type="text" name="botsmsg_authkey" value="<?php echo esc_attr(get_option('botsmsg_authkey')); ?>">
                </div>

                <div>
                    <label>Admin Mobile</label>
                    <input type="text" name="botsmsg_receiver" value="<?php echo esc_attr(get_option('botsmsg_receiver')); ?>">
                </div>
            </div>

            <br>
            <button class="button button-primary">💾 Save Settings</button>
        </form>
    </div>
</div>

<!-- NOTIFICATIONS -->
<div class="tab-content" id="notifications">
    <div class="botsmsg-card">
        <form method="post" action="options.php">
            <?php settings_fields('botsmsg_notifications_group'); ?>

        <h3>⚙️ Enable Notifications</h3>
        <div class="botsmsg-switches">
            <?php $this->toggle('Order', 'botsmsg_enable_order'); ?>
            <?php $this->toggle('User', 'botsmsg_enable_user'); ?>
            <?php $this->toggle('Comment', 'botsmsg_enable_comment'); ?>
            <?php $this->toggle('Forms', 'botsmsg_enable_form'); ?>
        </div>

        <h3>🛒 WooCommerce Messages</h3>

        <label>Order Created</label>
        <textarea name="botsmsg_order_created_message"><?php echo esc_textarea(get_option('botsmsg_order_created_message')); ?></textarea>

        <label>Order Processing</label>
        <textarea name="botsmsg_order_processing_message"><?php echo esc_textarea(get_option('botsmsg_order_processing_message')); ?></textarea>

        <label>Order Completed</label>
        <textarea name="botsmsg_order_completed_message"><?php echo esc_textarea(get_option('botsmsg_order_completed_message')); ?></textarea>

        <label>Order Cancelled</label>
        <textarea name="botsmsg_order_cancelled_message"><?php echo esc_textarea(get_option('botsmsg_order_cancelled_message')); ?></textarea>

        <p>Available variables: {name}, {order_id}, {total}</p>

        <h3>👤 User Registration Message</h3>
        <textarea name="botsmsg_user_message"><?php echo esc_textarea(get_option('botsmsg_user_message')); ?></textarea>

        <br><br>
        <button class="button button-primary">💾 Save Notifications</button>

        </form>
    </div>
</div>

<!-- AI AGENT -->
<div class="tab-content" id="ai-agent">
    <div class="botsmsg-card">
        <h2>🤖 AI Agent Settings</h2>
        <p>When a customer sends a WhatsApp message to your number, the AI will read your business info below and reply automatically.</p>

        <form method="post" action="options.php">
            <?php settings_fields('botsmsg_ai_group'); ?>

            <h3>⚡ Enable AI Agent</h3>
            <div class="botsmsg-switches">
                <?php $this->toggle('Enable AI Auto-Reply', 'botsmsg_ai_enabled'); ?>
                <?php $this->toggle('Reply During Off-Hours Only', 'botsmsg_ai_offhours_only'); ?>
            </div>

            <br>
            <div class="botsmsg-grid" id="offhours-fields">
                <div>
                    <label>Off-Hours Start (e.g. 18:00)</label>
                    <input type="time" name="botsmsg_ai_offhours_start" value="<?php echo esc_attr(get_option('botsmsg_ai_offhours_start', '18:00')); ?>">
                </div>
                <div>
                    <label>Off-Hours End (e.g. 09:00)</label>
                    <input type="time" name="botsmsg_ai_offhours_end" value="<?php echo esc_attr(get_option('botsmsg_ai_offhours_end', '09:00')); ?>">
                </div>
            </div>

            <h3>🔑 Groq API Credentials</h3>
            <div class="botsmsg-grid">
                <div>
                    <label>Groq API Key</label>
                    <input type="password" name="botsmsg_ai_groq_apikey" value="<?php echo esc_attr(get_option('botsmsg_ai_groq_apikey')); ?>" autocomplete="new-password" style="width:100%">
                </div>
                <div>
                    <label>Model (default: llama-3.3-70b-versatile)</label>
                    <input type="text" name="botsmsg_ai_model" value="<?php echo esc_attr(get_option('botsmsg_ai_model', 'llama-3.3-70b-versatile')); ?>" style="width:100%">
                </div>
            </div>

            <h3>📋 Business Info / Knowledge Base</h3>
            <p>Write your business information here. The AI will use this as its knowledge base when replying to customers.</p>
            <textarea name="botsmsg_ai_system_prompt" rows="10" style="width:100%; font-family: monospace;"><?php echo esc_textarea(get_option('botsmsg_ai_system_prompt')); ?></textarea>

            <h3>� Bot WhatsApp Number</h3>
            <div class="botsmsg-grid">
                <div>
                    <label>Your BotsMSG WhatsApp Number (e.g. 201123452433)</label>
                    <input type="text" name="botsmsg_ai_bot_number" value="<?php echo esc_attr(get_option('botsmsg_ai_bot_number')); ?>" style="width:100%" placeholder="201123452433">
                    <small>The WhatsApp number connected to BotsMSG. Used to ignore outgoing message webhooks and prevent reply loops.</small>
                </div>
            </div>

            <h3>�🔒 Webhook Security (Optional)</h3>
            <div class="botsmsg-grid">
                <div>
                    <label>Webhook Secret</label>
                    <input type="text" name="botsmsg_ai_webhook_secret" value="<?php echo esc_attr(get_option('botsmsg_ai_webhook_secret')); ?>" style="width:100%">
                    <small>If set, BotsMSG must send this value in the <code>X-BotsMSG-Secret</code> header.</small>
                </div>
            </div>

            <h3>🔗 Webhook URL</h3>
            <p>Copy this URL and paste it in your BotsMSG dashboard under <strong>Incoming Webhook / Callback URL</strong>:</p>
            <div style="display:flex; gap:8px; align-items:center;">
                <input type="text" id="botsmsg_webhook_url" readonly value="<?php echo esc_url(rest_url('botsmsg/v1/webhook')); ?>" style="width:100%; background:#f0f0f1; cursor:pointer;" onclick="this.select();">
                <button type="button" class="button" onclick="navigator.clipboard.writeText(document.getElementById('botsmsg_webhook_url').value).then(function(){alert('Webhook URL copied!')});">Copy</button>
            </div>

            <br>
            <button class="button button-primary">💾 Save AI Agent Settings</button>
        </form>
    </div>
</div>

<!-- SEND -->
<div class="tab-content" id="send">
    <div class="botsmsg-card">
        <h2>📲 Send Manual Message</h2>

        <input type="hidden" id="botsmsg_nonce" value="<?php echo esc_attr(wp_create_nonce('botsmsg_nonce')); ?>">

        <div class="botsmsg-grid">
            <input type="text" id="phone" placeholder="Phone: 201xxxxxxxxx">
            <button class="botsmsg-btn" id="send-btn">
                <span id="btn-text">Send Message</span>
                <span id="loader">⏳ Sending...</span>
            </button>
        </div>

        <br>
        <textarea id="msg" placeholder="Write your message..."></textarea>
    </div>
</div>

<!-- LOGS -->
<div class="tab-content" id="logs">
    <div class="botsmsg-card">
        <h2>📊 Message Logs</h2>

        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr style="text-align: justify;">
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $logs = BOTSMSG_Logs::get_logs();

                if ($logs) {
                    foreach ($logs as $log) {
                        $color = $log->status === 'success' ? 'green' : 'red';

                        echo '<tr>
                            <td>' . esc_html($log->phone) . '</td>
                            <td>' . esc_html($log->message) . '</td>
                            <td style="color:' . esc_attr($color) . '">' . esc_html($log->status) . '</td>
                            <td>' . esc_html($log->created_at) . '</td>
                        </tr>';
                    }
                } else {
                    echo "<tr><td colspan='4'>No logs found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</div>

<?php
    }

    private function toggle($label, $name) {
        ?>
        <label>
            <input type="checkbox" name="<?php echo esc_attr($name); ?>" value="1"
            <?php checked(1, get_option($name)); ?>>
            <?php echo esc_html($label); ?>
        </label>
        <?php
    }
}