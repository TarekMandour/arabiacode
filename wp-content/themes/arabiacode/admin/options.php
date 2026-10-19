<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_check'),
		'two' => __('Two', 'options_check'),
		'three' => __('Three', 'options_check'),
		'four' => __('Four', 'options_check'),
		'five' => __('Five', 'options_check')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'options_check'),
		'two' => __('Pancake', 'options_check'),
		'three' => __('Omelette', 'options_check'),
		'four' => __('Crepe', 'options_check'),
		'five' => __('Waffle', 'options_check')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/admin/images/';

	$options = array();
	
	$options[] = array(
		'name' => __('Header', 'options_check'),
		'type' => 'heading');
			
	$options[] = array(
		'name' => __('Logo upload', 'options_check'),
		'id' => 'logo',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Logo 2 upload', 'options_check'),
		'id' => 'logo2',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Footer Logo upload', 'options_check'),
		'id' => 'footerlogo',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Fav ico', 'options_check'),
		'id' => 'fav_ico',
		'type' => 'upload');
	
	$options[] = array(
		'name' => __('Site Key', 'options_check'),
		'id' => 'site_key',
		'std' => 'site_key',
		'type' => 'text');

	$options[] = array(
		'name' => __('Site Description', 'options_check'),
		'id' => 'site_description',
		'std' => 'site_description',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Email', 'options_check'),
		'id' => 'email',
		'std' => 'email',
		'type' => 'text');

	$options[] = array(
		'name' => __('Phone', 'options_check'),
		'id' => 'phone',
		'std' => 'phone',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Phone 3', 'options_check'),
		'id' => 'phone3',
		'std' => 'phone',
		'type' => 'text');

	$options[] = array(
		'name' => __('Address', 'options_check'),
		'id' => 'address',
		'std' => 'address',
		'type' => 'text');

	$options[] = array(
		'name' => __('Address 3', 'options_check'),
		'id' => 'address3',
		'std' => 'address',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Breadcrumb', 'options_check'),
		'id' => 'breadcrumb',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Footer', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => 'the top footer',
		'id' => 'top_footer',
		'std' => 1,
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Email 2', 'options_check'),
		'id' => 'email2',
		'std' => 'email',
		'type' => 'text');

	$options[] = array(
		'name' => __('Phone 2', 'options_check'),
		'id' => 'phone2',
		'std' => 'phone',
		'type' => 'text');

	$options[] = array(
		'name' => __('Address 2', 'options_check'),
		'id' => 'address2',
		'std' => 'address',
		'type' => 'text');

	$options[] = array(
		'name' => __('Copy right', 'options_check'),
		'id' => 'copy_right',
		'std' => 'Default Value',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Social Media', 'options_check'),
		'type' => 'heading');
	
	$options[] = array(
		'name' => __('Facebook', 'options_check'),
		'id' => 'facebook',
		'std' => 'facebook',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Twitter', 'options_check'),
		'id' => 'twitter',
		'std' => 'twitter',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Youtube', 'options_check'),
		'id' => 'google',
		'std' => 'google',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Instagram', 'options_check'),
		'id' => 'instagram',
		'std' => 'instagram',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Linkedin', 'options_check'),
		'id' => 'linkedin',
		'std' => 'linkedin',
		'type' => 'text');


	$options[] = array( 'name' => __( 'Homepage Content', 'options_check' ), 'type' => 'heading' );
	$options[] = array( 'name' => __( 'Hero Title', 'options_check' ), 'id' => 'hero_title', 'std' => 'حيث يصبح الحلم حقيقة', 'type' => 'text' );
	$options[] = array( 'name' => __( 'Hero Description', 'options_check' ), 'id' => 'hero_description', 'std' => 'نساعدك على تقديم أفضل الخدمات التقنية لتحويل الفكرة والحلم إلى حقيقة، وعالم تقني مختلف ومميز. في Arabiacode، تبدأ جميع رحلاتنا بفكرة صغيرة وتكبر لتصبح واقعًا تعيشه وتأخذك إلى عالم التميز والنجاح والتطور.', 'type' => 'textarea' );
	$options[] = array( 'name' => __( 'About Title', 'options_check' ), 'id' => 'about_title', 'std' => 'مؤسسة arabiacode', 'type' => 'text' );
	$options[] = array( 'name' => __( 'About Description', 'options_check' ), 'id' => 'about_description', 'std' => 'تختص مؤسسة Arabiacode في تصميم وبرمجة المواقع وكذلك تقديم خدمات الاستضافات، بخدمات مبتكرة ومرنة تناسب احتياجات أصحاب الأعمال وأصحاب المواقع الشخصية.', 'type' => 'textarea' );
	$options[] = array( 'name' => __( 'About Secondary Description', 'options_check' ), 'id' => 'about_description_2', 'std' => 'مؤسسة Arabiacode رائدة في عالم التقنية بفريق عمل متميز وخبرة تسعى لتوفير أحدث الحلول التقنية لتناسب احتياجات العملاء.', 'type' => 'textarea' );
	$options[] = array( 'name' => __( 'Years of Experience', 'options_check' ), 'id' => 'years_experience', 'std' => '9+', 'type' => 'text' );
	$options[] = array( 'name' => __( 'Customer Satisfaction', 'options_check' ), 'id' => 'customer_satisfaction', 'std' => '100%', 'type' => 'text' );

	return $options;
}