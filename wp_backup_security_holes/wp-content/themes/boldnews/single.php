<?php get_header(); ?>
<?php global $woo_options; ?>

    <div id="content" class="col-full">
    <?php if ( $woo_options['woo_post_author'] == "true" ) { ?>
	    <div id="sliderWrap">
			<h2 class="title"><span><?php _e( 'About the Post', 'woothemes' ); ?></span></h2>
			<?php
	global $post;
	$author_id=$post->post_author;
?>
			<div id="post-author">
				<div class="profile-image"><?php echo get_avatar( get_the_author_meta( 'ID', $author_id ), '90' ); ?></div>
				<div class="profile-content">
					<h3><?php _e( 'Author Information', 'woothemes' ); ?></h3>
					<span class="post-author"><span class="small"><?php _e( 'Posted by: ', 'woothemes' ) ?></span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID', $author_id ) ); ?>"><?php echo get_the_author_meta( 'display_name', $author_id ) ; ?></a></span>
					<p><?php echo get_the_author_meta( 'user_description', $author_id ); ?></p>
				</div><!-- .post-entries -->
				<div class="fix"></div>
			</div><!-- #post-author -->

			<div class="post-meta">
				<h3><?php _e( 'Post Information', 'woothemes' ); ?></h3>
				<span class="post-date"><span class="small"><?php _e( 'Posted on: ', 'woothemes' ) ?></span><?php the_time( get_option( 'date_format' ) ); ?></span><br />
				<span class="post-category"><span class="small"><?php _e( 'Posted in: ', 'woothemes' ) ?></span><?php the_category( ', ' ); ?></span><br />
				<span class="comments"><span class="small"><?php _e( 'Comments: ', 'woothemes' ) ?></span><?php comments_popup_link( __( '0 Comments', 'woothemes' ), __( '1 Comment', 'woothemes' ), __( '% Comments', 'woothemes' ) ); ?></span>
			<div class="fix"></div>
			</div><!-- .post-meta -->

			<div class="share">
				<h3><?php _e( 'Share The Post', 'woothemes' ); ?></h3>
				<p><?php _e( 'Please use the following buttons below to share the post that you are reading with the popular aggregators:', 'woothemes' ); ?></p>
				<div id="icons" class="fr">

						<ul>
							<?php if ( $woo_options['woo_share_digg'] == 'true' ): ?><li><a href="http://digg.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Digg this!"><img src="<?php bloginfo( 'template_directory' ); ?>/images/ico-digg.png" alt="" /></a></li><?php endif; ?>
							<?php if ( $woo_options['woo_share_twitter'] == 'true' ): ?><li><a href="http://twitter.com/home/?status=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Tweet this!"><img src="<?php bloginfo( 'template_directory' ); ?>/images/ico-twitter.png" alt="" /></a></li><?php endif; ?>
							<?php if ( $woo_options['woo_share_technorati'] == 'true' ): ?><li><a href="http://technorati.com/faves?add=<?php the_permalink(); ?>" title="Fav on Technorati"><img src="<?php bloginfo( 'template_directory' ); ?>/images/ico-technorati.png" alt="" /></a></li><?php endif; ?>
							<?php if ( $woo_options['woo_share_stumbleupon'] == 'true' ): ?><li><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="Stumble it"><img src="<?php bloginfo( 'template_directory' ); ?>/images/ico-stumbleupon.png" alt="" /></a></li><?php endif; ?>
							<?php if ( $woo_options['woo_share_facebook'] == 'true' ): ?><li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" title="Share on Facebook."><img src="<?php bloginfo( 'template_directory' ); ?>/images/ico-facebook.png" alt="" /></a></li><?php endif; ?>
							<?php if ( $woo_options['woo_share_reddit'] == 'true' ): ?><li><a href="http://www.reddit.com/submit?url=<?php the_permalink();?>" title="Share on Reddit."><img src="<?php bloginfo( 'template_directory' ); ?>/images/ico-reddit.png" alt="" /></a></li><?php endif; ?>
						</ul>

				</div><!-- #icons -->
				<div class="fix"></div>
			</div><!-- .share -->
			<div class="fix"></div>

		</div><!-- #sliderWrap -->
		<?php } ?>

		<div id="main" class="col-left">

		<?php if ( function_exists( 'yoast_breadcrumb' ) ) { yoast_breadcrumb( '<div id="breadcrumb"><p>', '</p></div>' ); } ?>

        <?php if ( have_posts() ) : $count = 0; ?>
        <?php while ( have_posts() ) : the_post(); $count++; ?>

			<div <?php post_class(); ?>>
				<?php echo woo_embed( 'width=610' ); ?>
                <?php if ( $woo_options['woo_thumb_single'] == "true" && ! woo_embed( '' ) ) woo_image( 'width='.$woo_options['woo_single_w'].'&height='.$woo_options['woo_single_h'].'&class=thumbnail '.$woo_options['woo_thumb_single_align'] ); ?>

                <h1 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>

                <div class="entry">
                	<?php the_content(); ?>
                	<p>
	                	<span class='st_plusone_hcount' displayText='Google +1'></span>
						<span class='st_twitter_hcount' displayText='Tweet'></span>
						<span class='st_email_hcount' displayText='Email'></span>
						<span class='st_sharethis_hcount' displayText='ShareThis'></span>
						<span class='st_facebook_hcount' displayText='Facebook'></span>
					</p>
					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
				</div>

				<?php the_tags( '<p class="tags">'.__( 'Tags: ', 'woothemes' ), ', ', '</p>' ); ?>

            </div><!-- .post -->

	        <div id="post-entries">
	            <div class="nav-prev fl"><?php previous_post_link( '%link', '<span class="meta-nav">&larr;</span> %title' ); ?></div>
	            <div class="nav-next fr"><?php next_post_link( '%link', '%title <span class="meta-nav">&rarr;</span>' ); ?></div>
	            <div class="fix"></div>
	        </div><!-- #post-entries -->

            <?php $comm = $woo_options['woo_comments']; if ( ( $comm == 'post' || $comm == 'both' ) ) : ?>
                <?php comments_template( '', true ); ?>
            <?php endif; ?>

		<?php endwhile; else: ?>
			<div class="post">
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
			</div><!-- .post -->
       	<?php endif; ?>

		</div><!-- #main -->

        <?php get_sidebar(); ?>

    </div><!-- #content -->

<?php get_footer(); ?>