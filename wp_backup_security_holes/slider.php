<?php require_once("/var/www/html/store/wp/wp-load.php"); ?>
<?php $woo_options = get_option('woo_options'); ?>
<?php if ($woo_options['woo_slider'] == "true") { ?>
	<div class="col-full" id="featured-slider">
		<div id="sliderWrap">
			<h2 class="title"><span><?php _e('Latest News From Avianne & Co','woothemes'); ?></span></h2>
			<!-- SLIDER POSTS -->
			<?php include(TEMPLATEPATH . '/includes/slider.php'); ?>
		</div>   
	</div>  
<?php } ?>