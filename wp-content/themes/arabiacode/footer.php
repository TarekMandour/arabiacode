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
                                <a href="index.html" class="d-inline-block h-100">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo/logo-shadow.png" alt="logo" class="logo">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/logo/logo.png" alt="logo" class="main-logo-img logo">
                                </a>
                            </div>
                        </div>
                        <!-- Contact Information -->
                        <div class="col-sm-8 col-md-6 col-lg-3 mb-lg-0 mb-3 align-self-center">
                            <h1 class="title widget_title"><i data-feather="map-pin"></i> العنوان</h1>
                            <p class="vm_para footer_l">الأسكندريه – سيدي جابر – ش ابوقير</p>
                            <h1 class="title widget_title"><i data-feather="mail"></i> البريد الالكتروني </h1>
                            <a href="mailto:info@arabiacode.com" class=" contact d-block">
                                <p class="vm_para footer_l">
                                    info@arabiacode.com
                                </p>
                            </a>
                            <a href="mailto:tarek.mandourr@gmail.com" class=" contact d-block">
                                <p class="vm_para footer_l">
                                    tarek.mandourr@gmail.com
                                </p>
                            </a>

                            <a href="tel:+201006287379" class="title contact d-block"><i data-feather="phone"></i> 201006287379+</a>
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
                                <span>Copyright © 2024</span>
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