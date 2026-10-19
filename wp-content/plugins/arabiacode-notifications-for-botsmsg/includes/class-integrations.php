<?php
if (!defined('ABSPATH')) exit;

class BOTSMSG_Integrations {

    public function __construct() {

        // Contact Form 7
        add_action('wpcf7_mail_sent', [$this, 'cf7_handler']);

        // WPForms
        add_action('wpforms_process_complete', [$this, 'wpforms_handler'], 10, 4);

        // Gravity Forms
        add_action('gform_after_submission', [$this, 'gravity_handler'], 10, 2);

        // Ninja Forms
        add_action('ninja_forms_after_submission', [$this, 'ninja_handler']);
    }

    public function cf7_handler($contact_form) {
        $this->notify("New CF7 Submission");
    }

    public function wpforms_handler($fields, $entry, $form_data, $entry_id) {
        // error_log( $fields[2]['value'] );
        $this->notify("New WPForms Submission");
    }

    public function gravity_handler($entry, $form) {
        $this->notify("New Gravity Form Submission");
    }

    public function ninja_handler($form_data) {
        $this->notify("New Ninja Form Submission");
    }

    private function notify($message) {

        if (!get_option('botsmsg_enable_form')) return;

        $admin_receiver = get_option('botsmsg_receiver');

        botsmsg_send_message($message, $admin_receiver);
    }
}