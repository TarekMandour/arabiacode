<?php
/**
 * Archive template for Arabiacode services.
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }
get_header();
?>
<div class="breadcrumb_wrap" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/breadcrumb/1.jpg' ); ?>')">
    <div class="container"><div class="row"><div class="col-lg-12"><div class="breadcrumb_content">
        <h1 class="page_title">الخدمات</h1>
        <div class="page_list_border"><ul class="page_list">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">الرئيسية</a></li><li>الخدمات</li>
        </ul></div>
    </div></div></div></div>
</div>
<main class="main"><section class="services pt_140 pb_140"><div class="container">
    <div class="row row-gap-3">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-6 col-lg-4 d-flex justify-content-center">
                <article <?php post_class( 'vm_service' ); ?>>
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium', array( 'class' => 'h75', 'alt' => esc_attr( get_the_title() ) ) ); } ?>
                    <div class="content"><h2 class="title"><a class="position-relative" href="<?php the_permalink(); ?>"><?php the_title(); ?> <i data-feather="arrow-up-right"></i></a></h2>
                    <p class="vm_para"><?php echo esc_html( get_the_excerpt() ? get_the_excerpt() : wp_trim_words( wp_strip_all_tags( get_the_content() ), 28 ) ); ?></p></div>
                </article>
            </div>
        <?php endwhile; the_posts_pagination(); else : ?>
            <div class="col-12"><p class="vm_para">لا توجد خدمات منشورة حاليًا.</p></div>
        <?php endif; ?>
    </div>
</div></section></main>
<?php get_footer(); ?>
