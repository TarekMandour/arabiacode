<?php
/**
 * Reusable Arabiacode page sections.
 *
 * Add these shortcodes in the WordPress Shortcode block on any page:
 * [ac_hero], [ac_services], [ac_about], [ac_partners], [ac_projects]
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function arabiacode_render_section_shortcode( $atts, $content = '', $tag = '' ) {
    $sections = array(
        'ac_hero'     => 'hero',
        'ac_services' => 'services',
        'ac_about'    => 'about',
        'ac_partners' => 'partners',
        'ac_projects' => 'projects',
    );

    if ( ! isset( $sections[ $tag ] ) ) {
        return '';
    }

    $template = get_template_directory() . '/template-parts/sections/' . $sections[ $tag ] . '.php';
    if ( ! file_exists( $template ) ) {
        return '';
    }

    ob_start();
    include $template;
    return ob_get_clean();
}

foreach ( array( 'ac_hero', 'ac_services', 'ac_about', 'ac_partners', 'ac_projects' ) as $arabiacode_section_shortcode ) {
    add_shortcode( $arabiacode_section_shortcode, 'arabiacode_render_section_shortcode' );
}
