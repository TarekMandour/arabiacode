<?php
/*
* Template Name: ContactPage
*/
$success = '';
$error = '';
if (isset($_GET['mailer']) && $_GET['mailer'] != '') {

    if ($_GET['mailer'] == "true") {
        $success = '<div class="p-3 mb-5 success">
            <p class="mb-0">تم الارسال بنجاح</p>
        </div>';
    } else {
        $error = '<div class="p-3 mb-5 error">
            <p class="mb-0">عفوا هناك خطأ ما</p>
        </div>';
    }
    
}
?>
<?php get_header(); ?>

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb_wrap" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/images/breadcrumb/1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_content">
                        <h1 class="page_title">تواصل معنا</h1>
                        <div class="page_list_border">
                            <ul class="page_list">
                                <li><a href="<?php echo get_option('home'); ?>">الرئيسية</a></li>
                                <li>تواصل معنا</li>
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

        <!-- Start Contact Area -->
        <div class="contact_area">
            <div class="container">
                <!-- Contact Info -->
                <div class="our_info d-md-flex position-relative pt_50">
                    <!-- Single Info Box-->
                    <div class="contact__inner text-lg-center wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">
                        <h3 class="contact_title">رقم الهاتف</h3>
                        <p class="vm_para">نحن مهتمون بالعمل معا</p>
                        <p class="contact_info"><a href="tel:201006287379+" class="txt_black">201006287379+</a></p>
                        <p class="contact_info"><a href="tel:201008233821+" class="txt_black">201008233821+</a></p>
                    </div>
                    <!-- Single Info Box-->
                    <div class="contact__inner text-lg-center wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                        <h3 class="contact_title">البريد الالكتروني</h3>
                        <p class="vm_para">هل لديك مشروع في ذهنك؟ أرسل رسالة.</p>
                        <p class="contact_info"><a href="mailto:info@arabiacode.com" class="txt_black">info@arabiacode.com</a></p>
                        <p class="contact_info"><a href="mailto:tarek.mandourr@gmail.com" class="txt_black">tarek.mandourr@gmail.com</a></p>
                    </div>
                    <!-- Single Info Box-->
                    <div class="contact__inner text-lg-center wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">
                        <h3 class="contact_title">العنوان</h3>
                        <p class="vm_para">قم بزيارة مقرنا الرئيسي.</p>
                        <p class="contact_info">الأسكندريه – سيدي جابر – ش ابوقير</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="row pt_100 pb_150">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-8">
                        <h3 class="mb-5 wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">للدعم والاستفسار</h3>
                        <?php echo $success; ?>
                        <?php echo $error; ?>
                        
                        <form class="vm_form" action="https://arabiacode.com/wp-admin/admin-post.php" method="POST">
                            <div class="d-block d-sm-flex align-items-center justify-content-between gap-2 gap-lg-4 wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.4s">
                                <label for="name" class="vm_para w-100">
                                    الاسم بالكامل
                                    <input type="text" id="name" name="name" value="" placeholder="ادخل الاسم بالكامل" required>
                                </label>
                                <label for="email" class="vm_para w-100">
                                    البريد الالكتروني
                                    <input type="email" id="email" name="email" value="" placeholder="ادخل البريد الالكتروني" required>
                                </label>
                            </div>
                            <div class="d-block d-sm-flex align-items-center justify-content-between gap-2 gap-lg-4 wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.6s">
                                <label for="phone" class="vm_para w-100">
                                    رقم الهاتف
                                    <input type="text" id="phone" name="phone" value="" placeholder="ادخل رقم الهاتف" required>
                                </label>
                                <label for="subject" class="vm_para w-100">
                                    عنوان الرساله
                                    <input type="text" id="subject" name="subject" value="" placeholder="ادخل عنوان الرسالة" required>
                                </label>
                            </div>
                            <label for="message" class="vm_para wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                                محتوى الرسالة
                                <textarea id="message" name="message" rows="3" placeholder="ادخل محتوى الرسالة" required></textarea>
                            </label>

                            <input type="hidden" name="action" value="submit_contact_form">
                            <p class="vm_para position-relative wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">اتصل بنا على مدار الساعة طوال أيام الأسبوع أو املأ النموذج أدناه لتلقي مجانًا.</p>
                            <button type="submit" class="vm_btn fill_btn btn_black btn_17_32 d-inline-block mt-3 wow animated fadeInUp submit" data-wow-duration="1.5s" data-wow-delay="0.4s">
                                <span class="d-flex align-items-center">
                                    ارسال
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/icons/arrow_left_white.svg" alt="arrow_rigth" class="me-3"> 
                                </span>
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-2 pt-5">

                    </div>
                </div>

            </div>
        </div>

        <!-- Back to  top Start -->
        <button class="backto_top">
            <i data-feather="arrow-up"></i>
        </button>
        <!-- Back to top end -->
    </main>
    <!-- End Main -->

<?php get_footer(); ?>