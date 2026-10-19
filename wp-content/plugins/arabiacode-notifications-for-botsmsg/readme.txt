=== ArabiaCode Notifications for BotsMSG ===
Contributors: arabiacode
Tags: messaging, woocommerce, automation, notifications, chatbot
Requires at least: 5.0
Tested up to: 6.9
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automate messaging notifications for WooCommerce orders, users, and forms using BotsMSG API.

== Description ==
ArabiaCode Notifications for BotsMSG is a WordPress plugin that allows you to send automated messages directly from your website using the BotsMSG API service.

This plugin is designed for WooCommerce stores and businesses that want to improve customer communication and automate messaging workflows.

**Features:**

* WooCommerce order notifications (Created, Processing, Completed, Cancelled)
* Smart message templates with dynamic variables
* User registration notifications
* Comment notifications
* Form integrations (Contact Form 7, WPForms, Gravity Forms, Ninja Forms)
* Manual WhatsApp messaging from dashboard
* Message logs with delivery status

== External services ==

This plugin connects to the BotsMSG API to send WhatsApp messages. It is required for all messaging functionality provided by this plugin.

**What data is sent and when:**

* When a WooCommerce order status changes (created, processing, completed, or cancelled), the customer's phone number and a message based on your configured template are sent to the BotsMSG API.
* When a new user registers on your site (if enabled), the admin receiver phone number and a notification message are sent.
* When a new comment is posted (if enabled), the admin receiver phone number and the comment details are sent.
* When a supported form is submitted (Contact Form 7, WPForms, Gravity Forms, Ninja Forms — if enabled), the admin receiver phone number and a notification message are sent.
* When you manually send a message from the plugin dashboard, the entered phone number and message are sent.

In all cases, the data is sent via an HTTP POST request to: `https://botsmsg.com/api/create-message`

This service is provided by BotsMSG:

* Service website: [https://botsmsg.com](https://botsmsg.com)
* Terms of Service: [https://botsmsg.com/page/terms](https://botsmsg.com/page/terms)
* Privacy Policy: [https://botsmsg.com/page/privacy](https://botsmsg.com/page/privacy)

An active BotsMSG account with valid API credentials (App Key and Auth Key) is required.

== Installation ==

1. Upload the plugin folder to `/wp-content/plugins/` or install via the WordPress plugin installer.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Go to the plugin dashboard in the admin menu.
4. Enter your API credentials (App Key and Auth Key) from your BotsMSG account.
5. Configure notifications and templates.

== Frequently Asked Questions ==

= Do I need a BotsMSG account? =
Yes, you need an active account at [https://botsmsg.com](https://botsmsg.com).

= Can I customize messages? =
Yes, you can use dynamic templates with variables like {name}, {order_id}, {total}.

= Does it support WooCommerce? =
Yes, it fully integrates with WooCommerce order events.

= Can I send messages manually? =
Yes, from the plugin dashboard.

== Screenshots ==

1. Dashboard overview
2. WooCommerce notification settings
3. Message templates
4. Manual messaging
5. Logs and analytics

== Changelog ==
= 1.0.0 =
* Initial release with WooCommerce automation and templates.

== Upgrade Notice ==
= 1.0.0 =
Initial release.
