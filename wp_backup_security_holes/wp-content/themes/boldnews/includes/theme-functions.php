<?php 

/*-----------------------------------------------------------------------------------

TABLE OF CONTENTS

- Page navigation
- WooTabs - Popular Posts
- WooTabs - Latest Posts
- WooTabs - Latest Comments
- Post Meta
- Misc
- WordPress 3.0 New Features Support

-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/* SET GLOBAL WOO VARIABLES
/*-----------------------------------------------------------------------------------*/

// Slider Tags
	$GLOBALS['slide_tags_array'] = array();
// Duplicate posts 
	$GLOBALS['shownposts'] = array();


// Shorten Excerpt text for use in theme
function woo_excerpt($text, $chars = 120) {
	$text = $text." ";
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text."...";
	return $text;
}


/*-----------------------------------------------------------------------------------*/
/* Page navigation */
/*-----------------------------------------------------------------------------------*/
if (!function_exists( 'woo_pagenav')) {
	function woo_pagenav() {

		global $woo_options;

		// If the user has set the option to use simple paging links, display those. By default, display the pagination.
		if ( array_key_exists( 'woo_pagination_type', $woo_options ) && $woo_options[ 'woo_pagination_type' ] == 'simple' ) {
			if ( get_next_posts_link() || get_previous_posts_link() ) {
		?>

            <div class="nav-entries">
                <?php next_posts_link( '<span class="nav-prev fl">'. __( '<span class="meta-nav">&larr;</span> Older posts', 'woothemes' ) . '</span>' ); ?>
                <?php previous_posts_link( '<span class="nav-next fr">'. __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'woothemes' ) . '</span>' ); ?>
                <div class="fix"></div>
            </div>

		<?php
			} // ENDIF
			
		} else {
				
			woo_pagination();
		
		} // ENDIF		 
	
	} 
}
	
/*-----------------------------------------------------------------------------------*/
/* WooTabs - Popular Posts */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('woo_tabs_popular')) {
	function woo_tabs_popular( $posts = 5, $size = 35 ) {
		global $post;
		$popular = get_posts('ignore_sticky_posts=1&orderby=comment_count&showposts='.$posts);
		foreach($popular as $post) :
			setup_postdata($post);
	?>
	<li>
		<?php if ($size <> 0) woo_image('height='.$size.'&width='.$size.'&class=thumbnail&single=true'); ?>
		<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		<span class="meta"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<div class="fix"></div>
	</li>
	<?php endforeach;
	}
}


/*-----------------------------------------------------------------------------------*/
/* WooTabs - Latest Posts */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('woo_tabs_latest')) {
	function woo_tabs_latest( $posts = 5, $size = 35 ) {
		global $post;
		$latest = get_posts('ignore_sticky_posts=1&showposts='. $posts .'&orderby=post_date&order=desc');
		foreach($latest as $post) :
			setup_postdata($post);
	?>
	<li>
		<?php if ($size <> 0) woo_image('height='.$size.'&width='.$size.'&class=thumbnail&single=true'); ?>
		<a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
		<span class="meta"><?php the_time( get_option( 'date_format' ) ); ?></span>
		<div class="fix"></div>
	</li>
	<?php endforeach; 
	}
}



/*-----------------------------------------------------------------------------------*/
/* WooTabs - Latest Comments */
/*-----------------------------------------------------------------------------------*/
if (!function_exists('woo_tabs_comments')) {
	function woo_tabs_comments( $posts = 5, $size = 35 ) {
		global $wpdb;
		
		$comments = get_comments( array( 'number' => $posts, 'status' => 'approve' ) );
		
		if ( $comments ) {
		
			foreach ( (array) $comments as $comment) {
			
			$post = get_post( $comment->comment_post_ID );
		?>
				<li class="recentcomments">
				
					<?php echo get_avatar( $comment, $size ); ?>
				
					<a href="<?php echo get_comment_link($comment->comment_ID); ?>" title="<?php echo wp_filter_nohtml_kses($comment->comment_author); ?> <?php _e('on', 'woothemes'); ?> <?php echo $post->post_title; ?>"><?php echo wp_filter_nohtml_kses($comment->comment_author); ?>: <?php echo substr( wp_filter_nohtml_kses( $comment->comment_content ), 0, 50 ); ?>...</a>
					<div class="fix"></div>
					
				</li>
		<?php	
			} // End FOREACH Loop
			
 		} // End IF Statement

	}
}



/*-----------------------------------------------------------------------------------*/
/* Post Meta */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('woo_post_meta')) {
	function woo_post_meta( ) {
?>
<p class="post-meta">
    <span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
    <?php if (!is_home()) { ?>
    <span class="sep">&bull;</span>
    <span class="post-author"><span class="small"><?php _e('Posted by:', 'woothemes') ?></span> <?php the_author_posts_link(); ?></span>
    <?php } ?>
    <?php edit_post_link( __('{ Edit }', 'woothemes'), '<span class="small">', '</span>' ); ?>
</p>
<?php 
	}
}


/*-----------------------------------------------------------------------------------*/
/* MISC */
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/* WordPress 3.0 New Features Support */
/*-----------------------------------------------------------------------------------*/

if ( function_exists('wp_nav_menu') ) {
	add_theme_support( 'nav-menus' );
	register_nav_menus( array( 'primary-menu' => __( 'Primary Menu' ), 'secondary-menu' => __( 'Secondary Menu' ) ) );
}

    
?>