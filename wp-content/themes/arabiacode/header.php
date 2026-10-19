<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <?php $ac_favicon = of_get_option( 'fav_ico' ); ?><link rel="shortcut icon" href="<?php echo esc_url( $ac_favicon ? $ac_favicon : get_template_directory_uri() . '/assets/images/logo/fav.png' ); ?>">

        <!-- CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/vendor/swiper-bundle.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/rtl.css">

        <?php wp_head(); ?>
    </head>
    <body>

        <!-- Start Header -->
        <header id="sticky_header" class="header header-06 border-bottom-1">
            <!-- Start Header Main -->
            <div class="header__main position-relative mx-auto row align-items-center justify-content-between">
                <!-- Start Header Left -->
                <div class="col-6 col-lg-2 p-0">
                    <div class="header__left">
                        <div class="header__logo">
                            <a href="<?php echo get_option('home'); ?>">
                                <img src="<?php echo esc_url( of_get_option( 'logo', get_template_directory_uri() . '/assets/images/logo/logo.png' ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="logo">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Header Left -->
                <!-- Start Header Center -->
                <div class="col-7 col-lg-8 col-xl-6 d-none d-lg-block p-0">
                    <div class="header__center d-flex align-items-center justify-content-center">
                        <nav id="sideNav" class="mainmenu__nav">
                            <!-- Start Mainmenu Nav -->
                             <?php 
                                global $wp;
                             ?>
                            <ul class="primary-menu nav nav-pills">
                                <li class="nav-item"><a class="nav-link <?php if ($wp->request == '') { echo 'active'; } ?>" href="<?php echo get_option('home'); ?>">الرئيسية</a></li>
                                <li class="nav-item"><a class="nav-link <?php if ($wp->request == 'about-us') { echo 'active'; } ?>" href="<?php echo get_option('home').'/about-us'; ?>">نبذة عنا</a></li>
                                <li class="nav-item"><a class="nav-link <?php if ($wp->request == 'services') { echo 'active'; } ?>" href="<?php echo get_option('home').'/services'; ?>">الخدمات</a></li>
                                <li class="nav-item menu_item_has_children">
                                    <a class="nav-link" href="javascript:;">منتجاتنا</a>
                                    <ul class="sub_menu">
                                        <li><a href="https://eshop5.arabiacode.com/" target="_blank">متاجر الكترونية</a></li>
                                        <li><a href="https://kashkolly.com/" target="_blank">منصة تعليمية</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo get_option('home'); ?>">المدونة</a></li>
                                <li class="nav-item"><a class="nav-link <?php if ($wp->request == 'careers') { echo 'active'; } ?>" href="<?php echo get_option('home').'/careers'; ?>">التوظيف</a></li>
                                <li class="nav-item"><a class="nav-link <?php if ($wp->request == 'contact-us') { echo 'active'; } ?>" href="<?php echo get_option('home').'/contact-us'; ?>">تواصل معنا</a></li>
                            </ul>
                            <!-- End Mainmenu Nav -->
                        </nav>
                    </div>
                </div>
                <!-- End Header Center -->
                <!-- Start Header Right  -->
                <div class="col-6 col-lg-2 col-xl-4 p-0">
                    <div class="header__right d-flex align-items-center justify-content-end">
                        <!-- Menu Button -->
                        <button class="menu menu_btn flex-shrink-0">
                            <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/menu_whi.svg" alt="menu" class="menu_icon">
                        </button>
                    </div>
                </div>
                <!-- End Header Right -->
            </div>
        </header>
        <!-- End Header Area -->

        <!-- Start Popup Mobile Menu  -->
        <div class="popup_mobile_menu">
            <div class="menu">
                <div class="menu__top">
                    <div class="menu_header d-flex align-items-center justify-content-between">
                        <a class="logo" href="<?php echo get_option('home'); ?>">
                            <img src="<?php echo esc_url( of_get_option( 'logo2', of_get_option( 'logo', get_template_directory_uri() . '/assets/images/logo/logo.png' ) ) ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                        <div class="close_button d-flex align-items-center justify-content-center">
                            <button class="close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="menu__content mobile_menu_nav">
                    <!-- Navigation Menu -->
                    <ul class="menu_list d-flex d-lg-none flex-column">
                        <li class="menu_list__item"><a class="menu_list__link" href="<?php echo get_option('home'); ?>">الرئيسية</a></li>
                        <li class="menu_list__item"><a class="menu_list__link" href="<?php echo get_option('home').'/about-us'; ?>">نبذة عنا</a></li>
                        <li class="menu_list__item"><a class="menu_list__link" href="<?php echo get_option('home').'/services'; ?>">الخدمات</a></li>
                        <li class="menu_list__item mobile_menu_item_has_children">
                            <a class="menu_list__link" href="javascript:;">منتجاتنا</a>
                            <ul class="sub_menu">
                                <li><a href="https://eshop5.arabiacode.com/" target="_blank">متاجر الكترونية</a></li>
                                <li><a href="https://kashkolly.com/" target="_blank">منصة تعليمية</a></li>
                            </ul>
                        </li>
                        <li class="menu_list__item"><a class="menu_list__link" href="<?php echo get_option('home'); ?>">المدونة</a></li>
                        <li class="menu_list__item"><a class="menu_list__link" href="<?php echo get_option('home').'/careers'; ?>">التوظيف</a></li>
                        <li class="menu_list__item"><a class="menu_list__link" href="<?php echo get_option('home').'/contact-us'; ?>">تواصل معنا</a></li>
                    </ul>
                    <!-- About Company -->
                    <ul class="address d-none d-lg-block">
                        <li>
                            <div><i data-feather="map-pin"></i></div>
                            <p class="text-white mb-0"><?php echo esc_html( of_get_option( 'address', 'الأسكندريه – سيدي جابر – ش ابوقير.' ) ); ?></p>
                        </li>
                        <li>
                            <div><i data-feather="phone"></i></div>
                            <div class="d-flex flex-column">
                                <?php $ac_phone = of_get_option( 'phone', '201006287379+' ); $ac_phone2 = of_get_option( 'phone2', '201008233821+' ); ?>
                                <a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ac_phone ) ); ?>"><?php echo esc_html( $ac_phone ); ?></a>
                                <?php if ( $ac_phone2 ) : ?><a href="tel:<?php echo esc_attr( preg_replace( '/[^0-9+]/', '', $ac_phone2 ) ); ?>"><?php echo esc_html( $ac_phone2 ); ?></a><?php endif; ?>
                            </div>
                        </li>
                        <li>
                            <div><i data-feather="mail"></i></div>
                            <div class="d-flex flex-column">
                                <?php $ac_email = of_get_option( 'email', 'info@arabiacode.com' ); $ac_email2 = of_get_option( 'email2', 'tarek.mandourr@gmail.com' ); ?>
                                <a href="mailto:<?php echo esc_attr( $ac_email ); ?>"><span><?php echo esc_html( $ac_email ); ?></span></a>
                                <?php if ( $ac_email2 ) : ?><a href="mailto:<?php echo esc_attr( $ac_email2 ); ?>"><span><?php echo esc_html( $ac_email2 ); ?></span></a><?php endif; ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- social sharea area -->
                <!-- <div class="social_share">
                    <p class="social_share__title">سوشيال ميديا</p>
                    <ul class="social_share__list d-flex align-items-center m-0 p-0">
                        <li class="facebook d-flex align-items-center justify-content-center">
                            <a href="javascript:;" class="social_share__list_link">
                                <i data-feather="facebook"></i>
                            </a>
                        </li>
                        <li class="instagram d-flex align-items-center justify-content-center">
                            <a href="javascript:;" class="social_share__list_link">
                                <i data-feather="instagram"></i>
                            </a>
                        </li>
                        <li class="linkedin d-flex align-items-center justify-content-center">
                            <a href="javascript:;" class="social_share__list_link">
                                <i data-feather="twitter"></i>
                            </a>
                        </li>
                        <li class="linkedin d-flex align-items-center justify-content-center">
                            <a href="javascript:;" class="social_share__list_link">
                                <i data-feather="linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
        <!-- End Popup Mobile Menu  -->