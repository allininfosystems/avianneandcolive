<?php get_header(); ?>
<?php global $woo_options; ?>

    <div id="content" class="col-full">
    		
		<div id="main" class="col-left<?php if ($woo_options['woo_home_magazine'] == "true" ) echo ' magazine'; ?>">     
		
		<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumb"><p>','</p></div>'); } ?>
		
		<h3 class="blog-title"><?php echo $woo_options['woo_home_title_blog']; ?></h3>
		
		<?php $exclude = ''; if (get_option('woo_slider_exclude') == "true") $exclude = get_option('woo_exclude'); ?>
		<?php 
		$args = array( 	'post_type' => 'post',
						'post__not_in' => $exclude,
						'paged'=> $paged ); 
				query_posts($args); ?>
				
        <?php if (have_posts()) : $counter = 0; ?>
        <?php while (have_posts()) : the_post(); $counter++; ?>
                                                                    
            <div class="post<?php if ($counter > 1) { echo ' last'; $counter = 0; } ?>">

                <?php woo_image('width='.$woo_options['woo_thumb_w'].'&height='.$woo_options['woo_thumb_h'].'&class=thumbnail '.$woo_options['woo_thumb_align']); ?> 
                
                <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                
                <?php woo_post_meta(); ?>
                
                <div class="entry">
                    <?php if ( $woo_options['woo_post_content'] == "content" ) the_content(__('Continue Reading &rarr;', 'woothemes')); else the_excerpt(); ?>
                </div>
                
                <div class="post-more">      
                	<?php if ( $woo_options['woo_post_content'] == "excerpt" ) { ?>
                    <span class="read-more"><a href="<?php the_permalink() ?>" title="<?php _e('Continue Reading &rarr;','woothemes'); ?>"><?php _e('Continue Reading &rarr;','woothemes'); ?></a></span>
                    <?php } ?>
                </div>   
                                     
            </div><!-- /.post -->
            <?php if ( $counter == 0 ) { ?><div class="fix"></div><?php } ?> 
                                                
        <?php endwhile; else: ?>
        
            <div class="post">
                <p><?php _e('Sorry, no posts matched your criteria.', 'woothemes') ?></p>
            </div><!-- /.post -->
        
        <?php endif; ?>  
        
    		<div class="fix"></div>
			<?php woo_pagenav(); ?>
                
		</div><!-- /#main -->

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>