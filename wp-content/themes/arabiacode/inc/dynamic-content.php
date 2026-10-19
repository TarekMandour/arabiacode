<?php
/**
 * Dynamic content types for the Arabiacode theme.
 * Keeps service and project content manageable in WordPress without a page builder.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

function arabiacode_register_content_types() {
    register_post_type( 'ac_service', array(
        'labels' => array(
            'name' => 'الخدمات', 'singular_name' => 'خدمة',
            'add_new_item' => 'إضافة خدمة جديدة', 'edit_item' => 'تعديل الخدمة',
            'new_item' => 'خدمة جديدة', 'view_item' => 'عرض الخدمة',
            'search_items' => 'بحث في الخدمات', 'not_found' => 'لا توجد خدمات',
            'menu_name' => 'خدمات الشركة',
        ),
        'public' => true, 'show_in_rest' => true, 'has_archive' => true,
        'rewrite' => array( 'slug' => 'our-services', 'with_front' => false ),
        'menu_icon' => 'dashicons-screenoptions',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
        'publicly_queryable' => true,
    ) );

    register_post_type( 'ac_project', array(
        'labels' => array(
            'name' => 'المشروعات', 'singular_name' => 'مشروع',
            'add_new_item' => 'إضافة مشروع جديد', 'edit_item' => 'تعديل المشروع',
            'new_item' => 'مشروع جديد', 'view_item' => 'عرض المشروع',
            'search_items' => 'بحث في المشروعات', 'not_found' => 'لا توجد مشروعات',
            'menu_name' => 'مشروعات الشركة',
        ),
        'public' => true, 'show_in_rest' => true, 'has_archive' => true,
        'rewrite' => array( 'slug' => 'projects', 'with_front' => false ),
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
        'publicly_queryable' => true,
    ) );
}
add_action( 'init', 'arabiacode_register_content_types' );
