<?php
if (!defined('ABSPATH')) exit;

class BOTSMSG_Notifications {

    public function __construct() {

        add_action('user_register', [$this, 'user_notification']);
        add_action('comment_post', [$this, 'comment_notification'], 10, 3);

        // WooCommerce events
        add_action('woocommerce_checkout_order_processed', [$this, 'order_created']);
        add_action('woocommerce_order_status_processing', [$this, 'order_processing']);
        add_action('woocommerce_order_status_completed', [$this, 'order_completed']);
        add_action('woocommerce_order_status_cancelled', [$this, 'order_cancelled']);
    }

    // New User
    public function user_notification($user_id) {

        if (!get_option('botsmsg_enable_user')) return;

        $user = get_userdata($user_id);

        $template = get_option('botsmsg_user_message');

        $data = [
            'name'  => $user->display_name,
            'email' => $user->user_email,
        ];

        $message = BOTSMSG_Templates::parse($template, $data);

        botsmsg_send_message($message);

    }

    // New User Comment
    public function comment_notification($comment_ID, $approved, $commentdata) {

        if (!get_option('botsmsg_enable_comment')) return;

        $admin_receiver = get_option('botsmsg_receiver');

        if ($approved != 1) return;

        $comment = get_comment($comment_ID);

        $message = "New Comment by: " . $comment->comment_author .
                   "\r\n" . $comment->comment_content;

        botsmsg_send_message($message, $admin_receiver);
    }

    // New Order
    public function order_created($order_id) {

        if (!get_option('botsmsg_enable_order')) return;

        $this->send_order_message($order_id, 'botsmsg_order_created_message');
    }

    // Processing Order
    public function order_processing($order_id) {
        $this->send_order_message($order_id, 'botsmsg_order_processing_message');
    }

    //Completed Order
    public function order_completed($order_id) {
        $this->send_order_message($order_id, 'botsmsg_order_completed_message');
    }

    //Cancelled Order
    public function order_cancelled($order_id) {
        $this->send_order_message($order_id, 'botsmsg_order_cancelled_message');
    }

    private function send_order_message($order_id, $option_key) {

        if (!$order_id) return;

        $order = wc_get_order($order_id);
        if (!$order) return;

        $phone = $order->get_billing_phone();
        if (!$phone) return;

        $template = get_option($option_key);

        if (!$template) {
            $template = "Hello {name}, your order #{order_id} status updated. Total: {total}";
        }

        $data = [
            'name'     => $order->get_billing_first_name(),
            'phone'    => $phone,
            'email'    => $order->get_billing_email(),
            'order_id' => $order->get_id(),
            'total'    => $order->get_total(),
        ];

        $message = BOTSMSG_Templates::parse($template, $data);

        botsmsg_send_message($message, $phone);
    }


}