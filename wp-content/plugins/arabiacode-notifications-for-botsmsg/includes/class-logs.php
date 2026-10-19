<?php
if (!defined('ABSPATH')) exit;

class BOTSMSG_Logs {

    public static function insert($phone, $message, $status = 'pending', $response = '') {
        global $wpdb;

        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
        $wpdb->insert(
            $wpdb->prefix . 'botsmsg_logs',
            [
                'phone'      => sanitize_text_field($phone),
                'message'    => sanitize_textarea_field($message),
                'status'     => sanitize_text_field($status),
                'response'   => sanitize_textarea_field($response),
                'created_at' => current_time('mysql'),
            ],
            ['%s', '%s', '%s', '%s', '%s']
        );

        wp_cache_delete('botsmsg_logs', 'botsmsg');
    }

    public static function get_logs($limit = 50) {
        global $wpdb;

        $cache_key = 'botsmsg_logs';
        $cached    = wp_cache_get($cache_key, 'botsmsg');

        if (false !== $cached) {
            return $cached;
        }

        $table = $wpdb->prefix . 'botsmsg_logs';

        // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery
        $results = $wpdb->get_results(
            $wpdb->prepare(
                'SELECT * FROM `' . esc_sql( $table ) . '` ORDER BY id DESC LIMIT %d',
                $limit
            )
        );

        wp_cache_set($cache_key, $results, 'botsmsg');

        return $results;
    }
}