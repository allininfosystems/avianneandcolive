<?php
/*
Template Name: Top-slider
*/
?>
<?php if ($woo_options['woo_slider'] == "true" /*AND ( is_home() OR is_front_page() )*/ ) { ?>
	<div class="col-full" id="featured-slider">
		<div id="sliderWrap">
			<h2 class="title"><span><?php _e('Featured News Posts','woothemes'); ?></span></h2>
			<!-- SLIDER POSTS -->
			<?php include(TEMPLATEPATH . '/includes/slider.php'); ?>
		</div>   
	</div>  
<?php } ?>