<?php
/*
* Template Name: HomePage
*/
?>
<?php get_header(); ?>
		
	<!-- Start Main -->
    <main class="main">

        <?php echo do_shortcode( '[ac_hero]' ); ?>

        <?php echo do_shortcode( '[ac_services]' ); ?>

        
        
        <?php echo do_shortcode( '[ac_about]' ); ?>

        <?php echo do_shortcode( '[ac_partners]' ); ?>

        <?php echo do_shortcode( '[ac_projects]' ); ?>

        <!-- Back to top Start -->
        <button class="backto_top">
            <i data-feather="arrow-up"></i>
        </button>
        <!-- Back to top end -->
    </main>
    <!-- End Main -->

<?php get_footer(); ?>