<?php
/**
 * Single template for Arabiacode services.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>
<div class="breadcrumb_wrap" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/breadcrumb/1.jpg' ); ?>')">
    <div class="container"><div class="row"><div class="col-lg-12"><div class="breadcrumb_content">
        <h1 class="page_title"><?php the_title(); ?></h1>
        <div class="page_list_border"><ul class="page_list">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">الرئيسية</a></li>
            <li><a href="<?php echo esc_url( get_post_type_archive_link( 'ac_service' ) ); ?>">الخدمات</a></li>
            <li><?php the_title(); ?></li>
        </ul></div>
    </div></div></div></div>
</div>
<main class="main"><section class="services pt_140 pb_140"><div class="container">
    <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class( 'row justify-content-center' ); ?>>
            <div class="col-lg-10">
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="mb-4"><?php the_post_thumbnail( 'large', array( 'class' => 'img-fluid', 'alt' => esc_attr( get_the_title() ) ) ); ?></div>
                <?php endif; ?>
                <div class="vm_para"><?php the_content(); ?></div>
            </div>
        </article>
    <?php endwhile; ?>
</div></section></main>
<?php get_footer(); ?>
