<?php
/** Reusable about section. */
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
        <!-- Start about us -->
        <div class="about_us pt_150">
            <div class="container">
                <div class="row align-items-center row-gap-4">
                    <!-- Image Side -->
                    <div class="col-lg-5 fadeInLeft">
                        <div class="img_container">
                            <!-- 537 x 620 -->
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/about_us/mask_img2.webp" alt="about_us" class="mask_img fade-slide bottom" data-cs-delay="0.5">
                            <!-- Top Logo -->
                        </div>
                    </div>
                    <!-- Content Side -->
                    <div class="col-lg-7 ps-lg-5">
                        <div class="content ps-xl-5">
                            <p class="section_subtitle" data-cs-stagger="0.05">من نحن</p>
                            <h2 class="section_title mt-0 mb-4 move-line-3d">
                             <?php echo esc_html( of_get_option( 'about_title', 'مؤسسة arabiacode' ) ); ?>
                            </h2>
                            <p class="section_description mb_10 fade-slide bottom" data-cs-delay="0.8">
                                <?php echo esc_html( of_get_option( 'about_description', 'تختص مؤسسة Arabiacode في تصميم وبرمجة المواقع وتقديم خدمات الاستضافة.' ) ); ?> 
                            </p>
                            <p class="vm_para  fade-slide bottom" data-cs-delay="1">
                                <?php echo esc_html( of_get_option( 'about_description_2', 'مؤسسة Arabiacode رائدة في عالم التقنية وتوفر حلولًا تقنية تناسب احتياجات العملاء.' ) ); ?>
                            </p>
                            <div class="row align-items-center pt-4 fade-slide bottom" data-cs-delay="1.2">
                                <div class="col-6">
                                    <div class="counter d-flex flex-column">
                                        <span class="counter__count mb-3"><?php echo esc_html( of_get_option( 'years_experience', '9+' ) ); ?></span>
                                        <p class="counter__text mb-0">سنين خبرة</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter d-flex flex-column fade-slide bottom" data-cs-delay="1.4">
                                        <span class="counter__count mb-3"><?php echo esc_html( of_get_option( 'customer_satisfaction', '100%' ) ); ?></span>
                                        <p class="counter__text mb-0">رضا العملاء</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End about us -->
