<?php
/**
 * Plugin Name: ArabiaCode Notifications for BotsMSG
 * Plugin URI:  https://botsmsg.com
 * Description: Automate messaging notifications for WooCommerce orders, users, and forms using BotsMSG API.
 * Version:     1.0.0
 * Author:      ArabiaCode
 * Author URI:  https://arabiacode.com
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: arabiacode-notifications-for-botsmsg
 * Requires at least: 5.0
 * Requires PHP: 7.4
 */

if (!defined('ABSPATH')) exit;

define('BOTSMSG_VERSION', '1.0.0');
define('BOTSMSG_PATH', plugin_dir_path(__FILE__));
define('BOTSMSG_URL', plugin_dir_url(__FILE__));

require_once BOTSMSG_PATH . 'includes/helpers.php';
require_once BOTSMSG_PATH . 'includes/class-notifications.php';
require_once BOTSMSG_PATH . 'includes/class-admin.php';
require_once BOTSMSG_PATH . 'includes/class-integrations.php';
require_once BOTSMSG_PATH . 'includes/class-logs.php';
require_once BOTSMSG_PATH . 'includes/class-templates.php';
require_once BOTSMSG_PATH . 'includes/class-ai-agent.php';

new BOTSMSG_Notifications();
new BOTSMSG_Admin();
new BOTSMSG_Integrations();
new BOTSMSG_AI_Agent();

register_activation_hook(__FILE__, 'botsmsg_create_logs_table');

function botsmsg_create_logs_table() {
    global $wpdb;

    $table = $wpdb->prefix . 'botsmsg_logs';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table (
        id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        phone VARCHAR(50) NOT NULL,
        message TEXT NOT NULL,
        status VARCHAR(20) DEFAULT 'pending',
        response TEXT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}