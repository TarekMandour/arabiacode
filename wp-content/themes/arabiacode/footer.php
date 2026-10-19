    <!-- Start Footer -->
    <footer class="footer">
            <!-- Start Footer Top -->
            <div class="footer__top bg_black">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-md-6 col-lg-1 mb-lg-0 mb-3 align-self-center">

                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="footer_logo">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="d-inline-block h-100">
                                    <img src="<?php echo esc_url( of_get_option( 'footerlogo', get_template_directory_uri() . '/assets/images/logo/logo-shadow.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo">
                                    <img src="<?php echo esc_url( of_get_option( 'logo', get_template_directory_uri() . '/assets/images/logo/logo.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="main-logo-img logo">
                                </a>
                            </div>
                        </div>
                        <!-- Contact Information -->
                        <div class="col-sm-8 col-md-6 col-lg-3 mb-lg-0 mb-3 align-self-center">
                            <h1 class="title widget_title"><i data-feather="map-pin"></i> العنوان</h1>
                            <p class="vm_para footer_l"><?php echo esc_html( of_get_option( 'address', 'الأسكندريه – سيدي جابر – ش ابوقير' ) ); ?></p>
                            <h1 class="title widget_title"><i data-feather="mail"></i> البريد الالكتروني </h1>
                            <a href="mailto:<?php echo esc_attr( of_get_option( 'email', 'info@arabiacode.com' ) ); ?>" class=" contact d-block">
                                <p class="vm_para footer_l">
                                    <?php echo esc_html( of_get_option( 'email', 'info@arabiacode.com' ) ); ?>
                                </p>
                            </a>
                            <a href="mailto:<?php echo esc_attr( of_get_option( 'email2', 'tarek.mandourr@gmail.com' ) ); ?>" class=" contact d-block">
                                <p class="vm_para footer_l">
                                    <?php echo esc_html( of_get_option( 'email2', 'tarek.mandourr@gmail.com' ) ); ?>
                                </p>
                            </a>

                            <?php $ac_phone = of_get_option( 'phone', '201006287379+' ); ?><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ac_phone ) ); ?>" class="title contact d-block"><i data-feather="phone"></i> <?php echo esc_html( $ac_phone ); ?></a>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-3 mb-lg-0 mb-3 align-self-center">
                            <h1 class="title widget_title">روابط مهمة</h1>
                            <div class="row">
                                <div class="col-6">
                                    <ul class="ps-0 mb-0">
                                        <li class="mb-1 mb-md-3"><a href="<?php echo get_option('home').'/about-us'; ?>" class="vm_para footer_l f_l py-3">نبذة عنا</a></li>
                                        <li class="my-1 my-md-3"><a href="<?php echo get_option('home').'/services'; ?>" class="vm_para footer_l f_l py-3">الخدمات</a></li>
                                        <li class="mt-1 mt-md-3"><a href="#" class="vm_para footer_l f_l py-3">الشروط والاحكام</a></li>
                                        <li class="my-1 my-md-3"><a href="<?php echo get_option('home').'/contact-us'; ?>" class="vm_para footer_l f_l py-3">تواصل معنا</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer End -->
            <div class="footer__end" style="background: #111;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12 col-lg-12 order-sm-2 order-lg-2">
                            <p class="vm_para footer_l mb-0 text-center">
                                <span><?php echo esc_html( of_get_option( 'copy_right', 'Copyright © ' . gmdate( 'Y' ) ) ); ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
        
        <a  class="whats-app" href="https://api.whatsapp.com/send?phone=+201006287379&text=اهلاArabiacode" target="_blank">
            <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/whatsapp.webp" alt="Arabiacode" />
        </a>

        <!-- vendor Js -->
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/jquery.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/bootstrap.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/feather.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/swiper-bundle.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/isotope.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/imageloded.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/gsap.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/SplitText.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/ScrollTrigger.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/animate.js"></script>
        <!-- Script -->
        <script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js"></script>

        <?php wp_footer(); ?>
    </body>
</html>