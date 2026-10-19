<?php
/*
* Template Name: HomePage
*/
?>
<?php get_header(); ?>
		
	<!-- Start Main -->
    <main class="main">

        <!-- Start Hero -->
        <div class="hero hero_06">
            <div class="swiper hero_slider h-100">
                <div class="swiper-wrapper">
                    <!-- item Slider 01 -->
                    <div class="slide swiper-slide" style=" background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/background/slider7.webp');">
                        <div class="slide_wrapper container position-relative">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="content">  
                                        <h1 class="title vm-animate-6 mb-5" data-cs-stagger="0.05">
                                            حيث يصبح الحلم حقيقة
                                        </h1>
                                        <p class="subtitle mb-0 vm-animate-7 move-line-3d">
                                            نساعدك على تقديم أفضل الخدمات التقنية لتحويل الفكرة والحلم إلى حقيقة، وعالم تقني مختلف ومميز. في فانتاستك، تبدأ جميع رحلاتنا بفكرة صغيرة وتكبر لتصبح واقعًا تعيشه وتأخذك إلى عالم التميز، النجاح، التطور، ورؤية مختلفة. لنبدأ معًا في اكتشاف هذه الرحلة.
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

        <!-- Start Services One -->
        <div class="services pt_140">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-md-7 text-center">
                        <p class="section_subtitle" data-cs-stagger="0.05">لماذا نحن</p>
                        <h2 class="section_title mt-2 move-line-3d">خدماتنا المميزة</h2>
                    </div>
                </div>
                <?php
                $arabiacode_home_services = new WP_Query( array(
                    'post_type'      => 'ac_service',
                    'post_status'    => 'publish',
                    'posts_per_page' => 6,
                    'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
                ) );
                if ( $arabiacode_home_services->have_posts() ) :
                ?>
                <div class="row row-gap-3 mt-4">
                    <?php $home_service_index = 0; while ( $arabiacode_home_services->have_posts() ) : $arabiacode_home_services->the_post(); $home_service_index++; ?>
                    <div class="col-sm-6 col-lg-4 d-flex justify-content-center fade-slide bottom" data-cs-delay="<?php echo esc_attr( min( 0.3 * $home_service_index, 1.2 ) ); ?>">
                        <div class="vm_service">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'medium', array( 'class' => 'h75', 'alt' => esc_attr( get_the_title() ) ) ); ?>
                            <?php endif; ?>
                            <div class="content">
                                <h2 class="title">
                                    <a href="<?php the_permalink(); ?>" class="position-relative">
                                        <?php the_title(); ?>
                                        <i data-feather="arrow-up-right"></i>
                                    </a>
                                </h2>
                                <p class="vm_para"><?php echo esc_html( get_the_excerpt() ? get_the_excerpt() : wp_trim_words( wp_strip_all_tags( get_the_content() ), 28 ) ); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <?php else : ?>
                <div class="row row-gap-3 mt-4">
                    <!-- Single Services -->
                    <div class="col-sm-6 col-lg-4 d-flex justify-content-center fade-slide bottom" data-cs-delay="0.3">
                        <div class="vm_service">
                            <!-- Service Icon -->
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/services/web.png" class="h75" alt="strategy_plan">
                            <!-- Service Content -->
                            <div class="content">
                                <h1 class="title">
                                    <a href="service-details.html" class="position-relative">
                                        تصميم وتطوير المواقع الالكترونيه
                                        <i data-feather="arrow-up-right"></i>
                                    </a>
                                </h1>
                                <p class="vm_para">
                                    نقوم بوضع استراتيجيات لتصميم وتطوير المواقع الإلكترونية، والتي لا تقتصر فقط على الشكل الجمالي للموقع فحسب.
                                </p>
                                <ul class="list p-0">
                                    <li class="list_item">تصميم موقع الكتروني</li>
                                    <li class="list_item">تطوير موقع الكتروني</li>
                                    <li class="list_item">الدعم الفني وحلول الويب</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Services -->
                    <div class="col-sm-6 col-lg-4 d-flex justify-content-center fade-slide bottom" data-cs-delay="0.6">
                        <div class="vm_service">
                            <!-- Service Icon -->
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/services/app.png" class="h75" alt="email_marketing">
                            <!-- Service Content -->
                            <div class="content">
                                <h1 class="title">
                                    <a href="service-details.html" class="position-relative">
                                        تصميم وتطوير تطبيقات الهواتف
                                        <i data-feather="arrow-up-right"></i>
                                    </a>
                                </h1>
                                <p class="vm_para">
                                    تصميم وتطوير تطبيقات الجوال جذّابة بصريًا، تفاعلية وسهلة الاستخدام من تطبيقات الأجهزة الذكية لإحداث أثر إبداعي هائل.
                                </p>
                                <ul class="list p-0">
                                    <li class="list_item">تطوير التطبيقات</li>
                                    <li class="list_item">انشاء حسابات على المتاجر</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Services -->
                    <div class="col-sm-6 col-lg-4 d-flex justify-content-center fade-slide bottom" data-cs-delay="1.2">
                        <div class="vm_service">
                            <!-- Service Icon -->
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/services/host.png" class="h75" alt="seo_optimization">
                            <!-- Service Content -->
                            <div class="content">
                                <h1 class="title">
                                    <a href="service-details.html" class="position-relative">
                                        الاستضافة والخوادم
                                        <i data-feather="arrow-up-right"></i>
                                    </a>
                                </h1>
                                <p class="vm_para">
                                    
                                    حافظ على استقرار موقعك الدائم بنسبة تصل حتى 99% مع خدمات الاستضافة والخوادم التي نُقدمها لكم
                                
                                </p>
                                <ul class="list p-0">
                                    <li class="list_item">استضافات linux</li>
                                    <li class="list_item">استضافات windows</li>
                                    <li class="list_item">التراخيص والاضافات</li>
                                </ul>
                            </div>
                        </div>
                    </div>                       
                    <!-- Single Services -->
                    <div class="col-sm-6 col-lg-4 d-flex justify-content-center fade-slide bottom" data-cs-delay="1.2">
                        <div class="vm_service">
                            <!-- Service Icon -->
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/services/graphic.png" class="h75" alt="seo_optimization">
                            <!-- Service Content -->
                            <div class="content">
                                <h1 class="title">
                                    <a href="service-details.html" class="position-relative">
                                        التصميمات UI / UX
                                        <i data-feather="arrow-up-right"></i>
                                    </a>
                                </h1>
                                <p class="vm_para">
                                    
                                    نساعدك في بناء هوية تجارية مميزة تعكس قيم شركتك وتجذب العملاء. من شعارات إلى تصاميم العلامات التجارية، نحن هنا لتحقيق رؤيتك.
                                
                                </p>
                                <ul class="list p-0">
                                    <li class="list_item">تصميم تجربة المستخدم</li>
                                    <li class="list_item">تصميم الهويات التجارية</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Services -->
                    <div class="col-sm-6 col-lg-4 d-flex justify-content-center fade-slide bottom" data-cs-delay="1.2">
                        <div class="vm_service">
                            <!-- Service Icon -->
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/services/erp.png" class="h75" alt="seo_optimization">
                            <!-- Service Content -->
                            <div class="content">
                                <h1 class="title">
                                    <a href="service-details.html" class="position-relative">
                                        تصميم وبرمجة أنظمة ERP
                                        <i data-feather="arrow-up-right"></i>
                                    </a>
                                </h1>
                                <p class="vm_para">
                                    
                                    تعزيز فعالية أعمالك. عن طريق تطوير حلول مخصصة تلبي احتياجات عملك بشكل دقيق، مما يسهم في تحسين تنظيم العمليات وزيادة الإنتاجية.
                                
                                </p>
                                <ul class="list p-0">
                                    <li class="list_item">الانظمة المحاسبية</li>
                                    <li class="list_item">انظمة المدارس</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Services -->
                    <div class="col-sm-6 col-lg-4 d-flex justify-content-center fade-slide bottom" data-cs-delay="0.9">
                        <div class="vm_service">
                            <!-- Service Icon -->
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/services/analytics.png" class="h75" alt="content_marketing">
                            <!-- Service Content -->
                            <div class="content">
                                <h1 class="title">
                                    <a href="service-details.html" class="position-relative">
                                        التسويق الالكتروني والاعلانات المموله
                                        <i data-feather="arrow-up-right"></i>
                                    </a>
                                </h1>
                                <p class="vm_para">
                                    تعزيز تواجدك على الإنترنت والعمل على تحسين ترتيب موقعك في محركات البحث المجانية مثل قوقل بحيث يظهر في النتائج الأولى
                                </p>
                                <ul class="list p-0">
                                    <li class="list_item">تحسين وتطوير محركات البحث</li>
                                    <li class="list_item">إدارة منصات التواصل الاجتماعي</li>
                                    <li class="list_item">إدارة الحملات الإعلانية الممولة</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- End Services One -->

        
        
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
                             مؤسسة arabiacode
                            </h2>
                            <p class="section_description mb_10 fade-slide bottom" data-cs-delay="0.8">
                                تختص مؤسسة Arabiacode في تصميم وبرمجة المواقع وكذلك تقديم خدمات الاستضافات ، خدماتنا تمتاز بأنّها مبتكرة ومرنة وتناسب كافة احتياجات أصحاب المواقع سواء كانوا من أصحاب الأعمال أو أصحاب المواقع الشخصية. 
                            </p>
                            <p class="vm_para  fade-slide bottom" data-cs-delay="1">
                                مؤسسة Arabiacode رائدة في عالم التقنية بفريق عمل يتميز بأعلى المؤهلات والخبرة وتهدف لتوفير احدث الحلول التقنية لتناسب جميع احتياجات العملاء.
                            </p>
                            <div class="row align-items-center pt-4 fade-slide bottom" data-cs-delay="1.2">
                                <div class="col-6">
                                    <div class="counter d-flex flex-column">
                                        <span class="counter__count mb-3">9+</span>
                                        <p class="counter__text mb-0">سنين خبرة</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="counter d-flex flex-column fade-slide bottom" data-cs-delay="1.4">
                                        <span class="counter__count mb-3">100%</span>
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

        <!-- Start Partners -->
        <div class="partners pt_100">
            <div class="container d-flex overflow-hidden">
                <ul class="partners__list d-flex align-items-center justify-content-center m-0 p-0">
                    <li>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/partners/11.png" alt="Arabiacode" class="partners__brand">
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/partners/12.png" alt="Arabiacode" class="partners__brand">
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/partners/3.png" alt="Arabiacode" class="partners__brand">
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/partners/4.webp" alt="Arabiacode" class="partners__brand">
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/partners/9.png" alt="Arabiacode" class="partners__brand">
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/partners/13.png" alt="Arabiacode" class="partners__brand">
                    </li>
                    <li>
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/partners/1.png" alt="Arabiacode" class="partners__brand">
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Partners -->

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

                </div>
            </div>  
        </div>
        <!-- End Work Showcase -->

        <!-- Back to top Start -->
        <button class="backto_top">
            <i data-feather="arrow-up"></i>
        </button>
        <!-- Back to top end -->
    </main>
    <!-- End Main -->

<?php get_footer(); ?>