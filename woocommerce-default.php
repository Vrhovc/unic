<?php
get_header(); ?>

<div class="grid-container">
	<div id="primary" class="content-area grid-75 push-25 mobile-grid-100">
		<div id="content" class="site-content" role="main">

			<?php woocommerce_content(); ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar('left'); ?>
</div>
<?php get_footer(); ?>