<?php

if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

delete_option('botsmsg_appkey');
delete_option('botsmsg_authkey');
delete_option('botsmsg_receiver');
delete_option('botsmsg_order_message');
delete_option('botsmsg_enable_user');
delete_option('botsmsg_enable_comment');
delete_option('botsmsg_enable_order');
delete_option('botsmsg_enable_form');
delete_option('botsmsg_user_message');
delete_option('botsmsg_order_created_message');
delete_option('botsmsg_order_processing_message');
delete_option('botsmsg_order_completed_message');
delete_option('botsmsg_order_cancelled_message');

global $wpdb;
// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.DirectDatabaseQuery.SchemaChange
$wpdb->query( $wpdb->prepare( 'DROP TABLE IF EXISTS `%s`', $wpdb->prefix . 'botsmsg_logs' ) );