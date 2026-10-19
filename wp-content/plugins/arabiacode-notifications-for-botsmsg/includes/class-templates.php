<?php
if (!defined('ABSPATH')) exit;

class BOTSMSG_Templates {

    public static function parse($message, $data = []) {

        if (!$message) return '';

        $variables = [
            '{name}'      => $data['name'] ?? '',
            '{phone}'     => $data['phone'] ?? '',
            '{email}'     => $data['email'] ?? '',
            '{order_id}'  => $data['order_id'] ?? '',
            '{total}'     => $data['total'] ?? '',
        ];

        return str_replace(array_keys($variables), array_values($variables), $message);
    }
}