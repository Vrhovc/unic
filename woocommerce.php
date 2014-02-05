<?php
/**
Template Name: Left Sidebar
 */

get_header(); ?>

	<div id="primary" class="content-area grid-75 push-25 mobile-grid-100">
		<div id="content" class="site-content" role="main">

			<?php woocommerce_content(); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('left'); ?>
<?php get_footer(); ?>
