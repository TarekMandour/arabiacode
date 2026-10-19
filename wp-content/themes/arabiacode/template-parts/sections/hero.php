<?php
/** Reusable hero section. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
        <!-- Start Hero -->
        <div class="hero hero_06">
            <div class="swiper hero_slider h-100">
                <div class="swiper-wrapper">
                    <!-- item Slider 01 -->
                    <div class="slide swiper-slide" style="background-image: url('<?php echo esc_url( of_get_option( 'hero_background', get_template_directory_uri() . '/assets/images/background/slider7.webp' ) ); ?>');">
                        <div class="slide_wrapper container position-relative">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="content">  
                                        <h1 class="title vm-animate-6 mb-5" data-cs-stagger="0.05">
                                            <?php echo esc_html( of_get_option( 'hero_title', 'حيث يصبح الحلم حقيقة' ) ); ?>
                                        </h1>
                                        <p class="subtitle mb-0 vm-animate-7 move-line-3d">
                                            <?php echo esc_html( of_get_option( 'hero_description', 'نساعدك على تقديم أفضل الخدمات التقنية لتحويل الفكرة والحلم إلى حقيقة.' ) ); ?>
                                        </p>
                                        <div class="fade-slide bottom">
                                            <a href="<?php echo get_option('home').'/contact-us'; ?>" class="vm_btn btn_white_border btn_22_32 d-inline-block vm-animate-9">
                                                <span class="d-flex align-items-center">
                                                    تواصل معنا
                                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/arrow_left_white.svg" alt="arrow_rigth" class="me-3"> 
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Positional Elements -->
                    </div>
                    <!-- item Slider 01 -->
                </div>
            </div>
        </div>
        <!-- End Hero -->
