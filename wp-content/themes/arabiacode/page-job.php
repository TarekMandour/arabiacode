<?php
/*
* Template Name: JobPage
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
    <?php $ac_breadcrumb = of_get_option( 'breadcrumb', get_template_directory_uri() . '/assets/images/breadcrumb/1.jpg' ); ?>
    <div class="breadcrumb_wrap" style="background-image: url('<?php echo esc_url( $ac_breadcrumb ); ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_content">
                        <h1 class="page_title">التوظيف</h1>
                        <div class="page_list_border">
                            <ul class="page_list">
                                <li><a href="<?php echo get_option('home'); ?>">الرئيسية</a></li>
                                <li>التوظيف</li>
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

                <!-- Contact Form -->
                <div class="row pt_100 pb_150">
                    <div class="col-lg-2">

                    </div>
                    <div class="col-lg-8">
                        <h3 class="mb-5 wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.2s">ادخل معلوماتك</h3>
                        <?php echo $success; ?>
                        <?php echo $error; ?>
                        
                        <form class="vm_form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="POST" enctype="multipart/form-data">
                            <?php wp_nonce_field( 'arabiacode_job_form', 'job_form_nonce' ); ?>
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
                                <label for="title" class="vm_para w-100">
                                    التخصص
                                    <input type="text" id="title" name="title" value="" placeholder="ادخل التخصص" required>
                                </label>
                            </div>
                            <label for="message" class="vm_para wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="0.8s">
                                ارفع ال C.V
                                <input type="file" id="cv" name="file" class="" accept=".pdf,.doc,.docx,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" />
                                    <small>PDF أو DOC أو DOCX، بحد أقصى 5 ميجابايت.</small>
                            </label>

                            <input type="hidden" name="action" value="submit_job_form">
                            <p class="vm_para position-relative wow animated fadeInUp" data-wow-duration="1.5s" data-wow-delay="1s">ارجو ادخال البيانات بعنايه ، سيتم مراجعة البيانات وشكرا لك.</p>
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