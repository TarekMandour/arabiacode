<?php
/*
* Template Name: AboutPage
*/
?>
<?php get_header(); ?>

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb_wrap" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/breadcrumb/1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_content">
                        <h1 class="page_title">من نحن</h1>
                        <div class="page_list_border">
                            <ul class="page_list">
                                <li><a href="<?php echo get_option('home'); ?>">الرئيسية</a></li>
                                <li>من نحن</li>
                            </ul> 
                        </div>                             
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->
		
	<!-- Start Main -->
    <main class="main">
        
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
        <div class="partners pt_100 pb_140">
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

        <!-- 
        <div class="team pt_150 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-md-7 text-center">
                        <h2 class="section_title mt-2 move-line-3d"> فريقنا</h2>
                    </div>
                </div>
                <div class="row row-gap-lg-5 row-gap-4">

                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="vm_team">
                            <div class="vm_team__thumb position-relative">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/team/team-6.webp" alt="team_member">
                            </div>
                            <div class="vm_team__content text-center">
                                <p class="name mb-1">احمد امين</p>
                                <p class="vm_para mb-0">مدير قسم التسويق</p>
                            </div>
                        </div>  
                    </div>

                    <div class="col-sm-6 col-lg-4 col-xl-3">                            
                        <div class="vm_team">
                            <div class="vm_team__thumb position-relative">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/team/team-6.webp" alt="team_member">
                            </div>
                            <div class="vm_team__content text-center">
                                <p class="name mb-1">طارق مندور</p>
                                <p class="vm_para mb-0">مدير قسم التطوير</p>
                            </div>
                        </div> 
                    </div>

                    <div class="col-sm-6 col-lg-4 col-xl-3">                                
                        <div class="vm_team">
                            <div class="vm_team__thumb position-relative">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/team/team-7.webp" alt="team_member">
                            </div>
                            <div class="vm_team__content text-center">
                                <p class="name mb-1">احمد بدير</p>
                                <p class="vm_para mb-0">مدير قسم السيرفرات</p>
                            </div>
                        </div>  
                    </div>

                    <div class="col-sm-6 col-lg-4 col-xl-3">                               
                        <div class="vm_team">
                            <div class="vm_team__thumb position-relative">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/images/team/team-8.webp" alt="team_member">
                            </div>
                            <div class="vm_team__content text-center">
                                <p class="name mb-1">محمد غنيم</p>
                                <p class="vm_para mb-0">مدير قسم التصميمات</p>
                            </div>
                        </div> 
                    </div>
                </div>                      
            </div>
        </div>
        -->   
        
        

        <!-- Back to  top Start -->
        <button class="backto_top">
            <i data-feather="arrow-up"></i>
        </button>
        <!-- Back to top end -->
    </main>
    <!-- End Main -->

<?php get_footer(); ?>