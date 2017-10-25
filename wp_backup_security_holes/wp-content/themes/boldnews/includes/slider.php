<?php
/*-----------------------------------------------------------------------------------

FILE INFORMATION

Description: WooThemes slider component.
Date Created: 2011-01-18.
Author: Matty.
Since: 1.0


TABLE OF CONTENTS

- Slider setup.
- Slider XHTML.
- Reset Global Variables.

-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------
  Slider setup.
-----------------------------------------------------------------------------------*/

	global $woo_options, $wp_query, $post;
	
	$count = 0;
	$woo_slider_tags = '';
	$number_to_show = 4;
	$slides = array();
	$shownposts = array();
	
	// Set the number of slides to show.
	if ( array_key_exists( 'woo_slider_entries', $woo_options ) && is_numeric( $woo_options['woo_slider_entries'] ) ) {
	
		$number_to_show = $woo_options['woo_slider_entries'];
	
	} // End IF Statement
	
	if ( array_key_exists( 'woo_slider_tags', $woo_options ) ) {
	
		$woo_slider_tags = $woo_options['woo_slider_tags'];
		
		if ( $woo_slider_tags == '' ) {} else {
		
			$tag_array = array(); // The array to hold the IDs of the tags we want to check in.
	    	
			$slide_tags_array = explode( ',', $woo_slider_tags ); // Tags to be shown
			
			foreach ( $slide_tags_array as $s ) {
			
				// Check that the tag exists.
				$tag = get_term_by( 'name', trim($s), 'post_tag', ARRAY_A );
				
				if ( $tag['term_id'] > 0 ) {
					
					if ( array_key_exists( 'term_id', $tag ) ) {
					
						$tag_array[] = $tag['term_id'];
					
					} // End IF Statement
				
				} // End IF Statement				
			
			} // End FOREACH Loop
		
			// If we have tag IDs, run the code.
			if ( count( $tag_array ) ) {
			
				// Preserve the original query for the page being loaded.
				$original_query = $wp_query;
				$original_post = $post;
				
				// Run the query to get the slides.
				$slides = query_posts(array('tag__in' => $tag_array, 'showposts' => $number_to_show ) );
			
			} // End IF Statement
		
		} // End IF Statement
	
	} // End IF Statement
	
/*-----------------------------------------------------------------------------------
  Slider XHTML.
-----------------------------------------------------------------------------------*/

	if ( count( $slides ) ) {
?>
<div id="slider" class="slider">
	<div id="slides" class="slides">
		<ul>
		<?php
			foreach ( $slides as $post ) {
			
			setup_postdata( $post );
			
			if ( !woo_image( 'return=true' ) ) continue; // Skip post if it doesn't have an image
			
			// Mark this post as having been shown.
			$shownposts[$count] = $post->ID;
		?>
			<li id="slide-<?php the_ID(); ?>" class="slide slide-count-<?php echo $count+1; ?>">
				<div class="content">
					<?php woo_image('key=image&width=216&height='.$woo_options['woo_slider_height'].'&class=slide-image'); ?>
					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<span class="post-meta">
						<span class="post-date"><?php the_date( get_option( 'date_format' ) ); ?></span><!--/.post-date-->
						<span class="sep">&bull;</span>
						<span class="post-author"><span class="small"><?php _e('Posted by:', 'woothemes') ?></span> <?php the_author_posts_link(); ?></span><!--/.post-author-->
					</span><!--/.post-meta-->
					
					<div class="entry">
						<p><?php echo woo_excerpt( get_the_excerpt(), '80'); ?></p>
					</div><!--/.entry-->
					
				</div><!--/.content-->
			</li>
		<?php
				$count++;
				
			} // End FOREACH Loop
		?>
		</ul>
		<div class="fix"></div><!--/.fix-->
	</div><!--/#slides-->
	
	<?php if ($count > 4) { ?>
	
		<a href="#" class="next btn-next"><?php _e( 'Next', 'woothemes' ); ?></a>
		<a href="#" class="previous btn-previous"><?php _e( 'Previous', 'woothemes' ); ?></a>
		
	<?php } // End IF Statement ?>

</div><!--/#slider .slider-->
<?php
	} else {
	
		if ( $woo_slider_tags == '' ) {
		
			echo do_shortcode('[box type="info"]Please setup tag(s) in your options panel that are used in posts.[/box]');
			
		} else {

			echo do_shortcode('[box type="info"]No posts with your specified tag(s) were found[/box]');
			
		} // End IF Statement   

	} // End IF Statement

/*-----------------------------------------------------------------------------------
  Reset Global Variables.
-----------------------------------------------------------------------------------*/	
	
	$post = $original_post;
	
	if ( get_option('woo_exclude') <> $shownposts ) { update_option("woo_exclude", $shownposts); } // End IF Statement
?>

<?php wp_reset_query(); ?> 