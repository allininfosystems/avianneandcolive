<?php
if (!is_admin()) add_action( 'wp_print_scripts', 'woothemes_add_javascript' );

if (!function_exists('woothemes_add_javascript')) {

	function woothemes_add_javascript () {
	
		global $woo_options;
	
		// wp_enqueue_script('jquery');    
		wp_enqueue_script( 'superfish', get_template_directory_uri() . '/includes/js/superfish.js', array( 'jquery' ) );
		
		// Load the custom jCarouselLite only if necessary.
		if ( ( get_option('woo_slider') == "true" )/* && is_front_page() */) {
		
			wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/includes/js/jquery.easing.min.js', array( 'jquery' ) );
			wp_enqueue_script( 'woo-jcarousellite', get_template_directory_uri() . '/includes/js/woo-jcarousellite.js', array( 'jquery' ) );
		
		} // End IF Statement
		
		// General should always be loaded last.
		wp_enqueue_script( 'woo-general', get_template_directory_uri() .'/includes/js/general.js', array( 'jquery' ) );
		
		// Load the custom jCarouselLite settings only if necessary.
		if ( ( get_option('woo_slider') == "true" )/* && is_front_page() */) {
		
			// Allow our JavaScript file (the general one) to see our slider setup data.
			$data = array(
						'autoStart' => get_option('woo_slider_auto') == "true", 
						'interval' => $woo_options['woo_slider_interval'], 
						'speed' => $woo_options['woo_slider_speed'] * 1000, 
						'hoverPause' => true, 
						'visible' => 4, 
						'scroll' => $woo_options['woo_slider_scroll_quantity'], 
						'circular' => true
						);
			
			wp_localize_script( 'woo-general', 'woo_jcarousellite_settings', $data );
		
		} // End IF Statement
		
	} // End woothemes_add_javascript()
	
} // End IF Statement
?>