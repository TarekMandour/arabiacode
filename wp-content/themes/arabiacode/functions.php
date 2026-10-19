<?php
 
function disable_emojis_wp_head() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );    
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );  
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis_wp_head' );

function arabiacode_form_redirect( $path, $success ) {
    $url = add_query_arg( 'mailer', $success ? 'true' : 'false', home_url( $path ) );
    wp_safe_redirect( $url );
    exit;
}

function arabiacode_form_admin_email() {
    $configured_email = function_exists( 'of_get_option' ) ? of_get_option( 'email', get_option( 'admin_email' ) ) : get_option( 'admin_email' );
    return is_email( $configured_email ) ? $configured_email : get_option( 'admin_email' );
}

function handle_contact_form_submission() {
    if ( 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ?? '' ) ) {
        arabiacode_form_redirect( '/contact-us/', false );
    }

    if ( ! isset( $_POST['contact_form_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['contact_form_nonce'] ) ), 'arabiacode_contact_form' ) ) {
        arabiacode_form_redirect( '/contact-us/', false );
    }

    $name    = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
    $email   = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
    $subject = sanitize_text_field( wp_unslash( $_POST['subject'] ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

    if ( '' === $name || ! is_email( $email ) || '' === $phone || '' === $subject || '' === $message ) {
        arabiacode_form_redirect( '/contact-us/', false );
    }

    $body = "Name: {$name}\nPhone: {$phone}\nEmail: {$email}\nSubject: {$subject}\n\n{$message}";
    $sent = wp_mail( arabiacode_form_admin_email(), sprintf( 'Contact form: %s', $subject ), $body );

    arabiacode_form_redirect( '/contact-us/', $sent );
}
add_action( 'admin_post_nopriv_submit_contact_form', 'handle_contact_form_submission' );
add_action( 'admin_post_submit_contact_form', 'handle_contact_form_submission' );

function handle_job_form_submission() {
    if ( 'POST' !== strtoupper( $_SERVER['REQUEST_METHOD'] ?? '' ) ) {
        arabiacode_form_redirect( '/careers/', false );
    }

    if ( ! isset( $_POST['job_form_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['job_form_nonce'] ) ), 'arabiacode_job_form' ) ) {
        arabiacode_form_redirect( '/careers/', false );
    }

    $name  = sanitize_text_field( wp_unslash( $_POST['name'] ?? '' ) );
    $email = sanitize_email( wp_unslash( $_POST['email'] ?? '' ) );
    $phone = sanitize_text_field( wp_unslash( $_POST['phone'] ?? '' ) );
    $title = sanitize_text_field( wp_unslash( $_POST['title'] ?? '' ) );

    if ( '' === $name || ! is_email( $email ) || '' === $phone || '' === $title ) {
        arabiacode_form_redirect( '/careers/', false );
    }

    $attachments = array();
    if ( isset( $_FILES['file'] ) && UPLOAD_ERR_NO_FILE !== (int) $_FILES['file']['error'] ) {
        $file = $_FILES['file'];
        $max_size = 5 * 1024 * 1024;
        $allowed_types = array(
            'pdf'  => 'application/pdf',
            'doc'  => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        );

        if ( UPLOAD_ERR_OK !== (int) $file['error'] || (int) $file['size'] > $max_size || (int) $file['size'] <= 0 ) {
            arabiacode_form_redirect( '/careers/', false );
        }

        $checked_file = wp_check_filetype_and_ext( $file['tmp_name'], $file['name'], $allowed_types );
        if ( empty( $checked_file['ext'] ) || ! isset( $allowed_types[ $checked_file['ext'] ] ) || ! is_uploaded_file( $file['tmp_name'] ) ) {
            arabiacode_form_redirect( '/careers/', false );
        }

        // Attach the temporary upload directly; do not store CVs in a public uploads directory.
        $attachments[] = $file['tmp_name'];
    }

    $body = "Name: {$name}\nPhone: {$phone}\nEmail: {$email}\nSpecialty: {$title}";
    $sent = wp_mail(
        arabiacode_form_admin_email(),
        sprintf( 'Job application from %s', $name ),
        $body,
        array( 'Reply-To: ' . $name . ' <' . $email . '>' ),
        $attachments
    );

    arabiacode_form_redirect( '/careers/', $sent );
}
add_action( 'admin_post_nopriv_submit_job_form', 'handle_job_form_submission' );
add_action( 'admin_post_submit_job_form', 'handle_job_form_submission' );


add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'video' ) );

/* ------------------------------------------------------------------*/
/* ADD PRETTYPHOTO REL ATTRIBUTE FOR LIGHTBOX */
/* ------------------------------------------------------------------*/

define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );

add_action( 'wp_head', 'wps_params', 10 );
function wps_params() {

	global $wp;
$current_slug = add_query_arg( array(), $wp->request );
//echo $current_slug ;
if ($current_slug == 'about-phone') {
	//echo $current_slug ;
}

}

/* require files */
require_once get_template_directory() . '/admin/options-framework.php';

remove_filter( 'the_content', 'wpautop' );

add_filter('wp_get_attachment_link', 'rc_add_rel_attribute');
function rc_add_rel_attribute($link) {
	global $post;
	return str_replace('<a href', '<a data-gal="lightbox" href', $link);
}


add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/***** Wdigets Elements******/ 
// require_once( get_template_directory().'/vc-elements/slider-text.php' );  
// require_once( get_template_directory().'/vc-elements/boxing-text.php' );  

/*****menu!******/

// require_once('wp_bootstrap_navwalker.php');

function add_class_to_all_menu_anchors( $atts, $item, $args ) {
    if ( isset( $args->theme_location ) && 'mobile' === $args->theme_location ) {
        $atts['class'] = 'menu_list__link';
    } else {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_all_menu_anchors', 10, 3 );

function arabiacode_menu_item_classes( $classes, $item, $args, $depth ) {
    if ( isset( $args->theme_location ) && 'mobile' === $args->theme_location ) {
        $classes[] = 'menu_list__item';
        if ( in_array( 'menu-item-has-children', $classes, true ) ) {
            $classes[] = 'mobile_menu_item_has_children';
        }
    } else {
        $classes[] = 'nav-item';
        if ( in_array( 'menu-item-has-children', $classes, true ) ) {
            $classes[] = 'menu_item_has_children';
        }
    }
    return array_unique( $classes );
}
add_filter( 'nav_menu_css_class', 'arabiacode_menu_item_classes', 10, 4 );

function arabiacode_menu_submenu_classes( $classes, $args, $depth ) {
    return array( 'sub_menu' );
}
add_filter( 'nav_menu_submenu_css_class', 'arabiacode_menu_submenu_classes', 10, 3 );

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main' => 'Main Nav',
		  'mobile' => 'Mobile Nav',
		  'secondary' => 'footer Nav',
		  'footer2' => 'footer 2 Nav',
		  'footer3' => 'footer 3 Nav'
		)
	);
}

/*****images!******/
if ( function_exists('add_theme_support') )
add_theme_support('post-thumbnails');


/*****serach!******/
function change_wp_search_size($query) {
	if ( $query->is_search ) // Make sure it is a search page
		$query->query_vars['posts_per_page'] = 3; // Change 10 to the number of posts you would like to show

	return $query; // Return our modified query variables
}
add_filter('pre_get_posts', 'change_wp_search_size'); // Hook our custom function onto the request filter


/*****Sidebars!******/

if ( function_exists('register_sidebar') ) {

   register_sidebar(array(
   'name' => 'footer 1',
   'before_widget' => '<div id="%1$s" class="tags">',
   'after_widget' => '</div>',
   'before_title' => '<div class="title black"><h3>',
   'after_title' => '</h3> </div>'
    ));

   register_sidebar(array(
   'name' => 'footer 2',
   'before_widget' => '<div id="%1$s" class="widget_bunch_about_us">',
   'after_widget' => '</div>',
   'before_title' => '<h3 class="footer-title">',
   'after_title' => '</h3>'
   ));
   
   register_sidebar(array(
   'name' => 'footer 3',
   'before_widget' => '<div id="%1$s" class="widget_bunch_about_us">',
   'after_widget' => '</div>',
   'before_title' => '<h3 class="footer-title">',
   'after_title' => '</h3>'
   ));
   
   register_sidebar(array(
   'name' => 'footer 4',
   'before_widget' => '<div id="%1$s" class="widget_bunch_about_us">',
   'after_widget' => '</div>',
   'before_title' => '<h3 class="footer-title">',
   'after_title' => '</h3>'
   ));

}

/*****pagination !******/

function kriesi_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination-tt clearfix'><ul>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
         if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
         echo "</ul></div>\n";
     }
}
?>
<?php
	function advanced_comment($comment, $args, $depth) 
	{
   $GLOBALS['comment'] = $comment; 
?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<div class="avatar">
				<figure>
					<?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
				</figure>
			</div>
			<div class="comment-details">
				<div class="comment-header">
					<div class="name-date">
						<?php printf(get_comment_author_link()) ?>
						<span class="comment-date"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
						<?php edit_comment_link(__('(Edit)'),'  ','') ?></span>
					</div>
					<div class="reply">
						<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>
				</div>
					<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
					<?php endif; ?>
				<div class="comment-text">
					 <?php comment_text() ?>
				</div>
			</div>
   </li>
<?php  } 

function the_breadcrumb() {
	if (!is_home()) {
		echo '<ol class="breadcrumb"> <li><a href="';
		echo get_option('home');
		echo '">';
		
		echo "الرئيسية</a> </li> ";
		if (is_category() || is_single()) {
			echo '<li class="active">';
			echo the_category();
			echo '</li>';
			if (is_single()) {
				echo " » ". " ";
				the_title();
			}
		} elseif (is_page() ) {
			echo '<li class="active"><a href="';
			echo  the_permalink() . '">';
			echo the_title();
			echo "</a> </li> ";
		} elseif (is_search() ) {
			echo '<li class="active"><a href="';
			echo the_permalink() . '">';
			echo the_title();
			echo "</a> </li> ";
        }
        echo '</ol>';
	}
} 

/** Register dynamic company content types. */
require_once get_template_directory() . '/inc/dynamic-content.php';
require_once get_template_directory() . '/inc/page-builder.php';
