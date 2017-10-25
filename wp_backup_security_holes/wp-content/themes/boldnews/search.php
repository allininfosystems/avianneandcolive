<?php get_header(); ?>
       
    <div id="content" class="col-full">
		<div id="main" class="col-left">
            
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumb"><p>','</p></div>'); } ?>
			<?php if (have_posts()) : $count = 0; ?>
            
            <span class="archive_header"><?php _e('Search results:', 'woothemes') ?> <?php printf(the_search_query());?></span>
                
            <?php while (have_posts()) : the_post(); $count++; ?>
                                                                        
            <!-- Post Starts -->
            <div class="post">
            
            	<?php woo_image('width='.$woo_options['woo_thumb_w'].'&height='.$woo_options['woo_thumb_h'].'&class=thumbnail '.$woo_options['woo_thumb_align']); ?>
            
                <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                
                <?php woo_post_meta(); ?>
                
                <div class="entry">
                    <?php the_excerpt(); ?>
                </div><!-- /.entry -->
                
                <div class="post-more">      
                	<?php if ( $woo_options['woo_post_content'] == "excerpt" ) { ?>
					<span class="comments"><?php comments_popup_link(__('Leave a comment', 'woothemes'), __('1 Comment', 'woothemes'), __('% Comments', 'woothemes')); ?></span>
					<span class="post-more-sep">&bull;</span>
                    <span class="read-more"><a href="<?php the_permalink() ?>" title="<?php _e('Continue Reading &rarr;','woothemes'); ?>"><?php _e('Continue Reading &rarr;','woothemes'); ?></a></span>
                    <?php } ?>
                </div>   

                        
            </div><!-- /.post -->
                                                    
            <?php endwhile; else: ?>
            
            <div class="post">
                <p><?php _e('Sorry, no posts matched your criteria.', 'woothemes') ?></p>
            </div><!-- /.post -->
            
            <?php endif; ?>  
        		
			<?php woo_pagenav(); ?>
                
        </div><!-- /#main -->

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>
