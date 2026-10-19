<?php
/** Reusable projects section. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
        <!-- Start Work Showcase -->
        <div class="work pt_150 bg_gray py_140 mt-5 mb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-md-7 text-center">
                        <p class="section_subtitle" data-cs-stagger="0.05">المشاريع</p>
                        <h2 class="section_title text-center mb_50 move-line-3d">بعض من مشاريعنا</h2>
                    </div>
                </div>
                <div class="swiper portfolio_slider_02">
                    <div class="swiper-wrapper">
                        <?php
                        $arabiacode_projects = new WP_Query( array(
                            'post_type'      => 'ac_project',
                            'post_status'    => 'publish',
                            'posts_per_page' => 6,
                            'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
                        ) );
                        if ( $arabiacode_projects->have_posts() ) :
                        ?>
                        <div class="vm_grid style_02 swiper-slide">
                            <?php
                            $project_index = 0;
                            $project_fallback_images = array( '1.webp', '2.webp', '4.webp', '5.webp', '6.webp', '7.webp' );
                            while ( $arabiacode_projects->have_posts() ) : $arabiacode_projects->the_post();
                                $project_index++;
                                $project_image = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                                if ( ! $project_image ) {
                                    $project_image = get_template_directory_uri() . '/assets/images/portfolio/' . $project_fallback_images[ $project_index - 1 ];
                                }
                            ?>
                            <div class="grid_item grid_item-<?php echo esc_attr( $project_index ); ?>">
                                <img src="<?php echo esc_url( $project_image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" class="portfolio_img">
                                <a href="<?php the_permalink(); ?>" class="portfolio_link d-flex align-items-center justify-content-center" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/icons/download_icon.svg' ); ?>" alt="">
                                </a>
                            </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
                        <?php else : ?>
                    <div class="swiper-wrapper">
                        <!-- Slider 01 -->
                        <div class="vm_grid style_02 swiper-slide">
                            <div class="grid_item grid_item-1">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/portfolio/1.webp" alt="Arabiacode" class="portfolio_img">
                                <a href="https://kashkolly.com/" target="_blank" class="portfolio_link d-flex align-items-center justify-content-center">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/download_icon.svg" alt="Arabiacode">
                                </a>
                            </div>
                            <div class="grid_item grid_item-2">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/portfolio/2.webp" alt="Arabiacode" class="portfolio_img">
                                <a href="https://itqans.com/" target="_blank" class="portfolio_link d-flex align-items-center justify-content-center">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/download_icon.svg" alt="Arabiacode">
                                </a>
                            </div>
                            <div class="grid_item grid_item-3">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/portfolio/4.webp" alt="Arabiacode" class="portfolio_img">
                                <a href="https://eshop4.arabiacode.com/" target="_blank" class="portfolio_link d-flex align-items-center justify-content-center">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/download_icon.svg" alt="Arabiacode">
                                </a>
                            </div>
                            <div class="grid_item grid_item-4">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/portfolio/5.webp" alt="Arabiacode" class="portfolio_img">
                                <a href="https://eshop3.arabiacode.com/" target="_blank" class="portfolio_link d-flex align-items-center justify-content-center">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/download_icon.svg" alt="Arabiacode">
                                </a>
                            </div>
                            <div class="grid_item grid_item-5">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/portfolio/6.webp" alt="Arabiacode" class="portfolio_img">
                                <a href="https://goldencars.cc/" target="_blank" class="portfolio_link d-flex align-items-center justify-content-center">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/download_icon.svg" alt="Arabiacode">
                                </a>
                            </div>
                            <div class="grid_item grid_item-6">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/portfolio/7.webp" alt="Arabiacode" class="portfolio_img">
                                <a href="http://awaadegypt.com/en" target="_blank" class="portfolio_link d-flex align-items-center justify-content-center">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/download_icon.svg" alt="Arabiacode">
                                </a>
                            </div>
                        </div>
                    </div>
                        <?php endif; ?>

                </div>
            </div>  
        </div>
        <!-- End Work Showcase -->
