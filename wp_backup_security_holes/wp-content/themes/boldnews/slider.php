<?php
/*
Template Name: Slider
*/
?>
<?php if(!isset($GLOBALS['mobile_av']) && !isset($_GET['wsm'])):?>
<style type="text/css">
#navigation { display: none; }
</style>
<?php get_header(); ?>
<?php global $woo_options; ?>
       
    <div id="content" class="page col-full">
		<div id="main" style="width: 100%; text-align: center;" class="col-left">
             
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div id="breadcrumb"><p>','</p></div>'); } ?>

            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
                                                                        
                <div class="post">

                    <h1 class="title"><?php the_title(); ?></h1>

                    <div class="entry">
	                	
	                	<div style="margin: 16px 0 90px;"><?php the_uds_billboard("billboard") ?></div>

	                	<?php the_content(); ?>
	                	
	                	<?php /* ?>
	                	<div style="margin: 16px 0 98px;"><?php the_uds_billboard("billboard-2") ?></div>
	                	<?php */ ?>
	                	
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
	               	</div><!-- /.entry -->

					<?php edit_post_link( __('{ Edit }', 'woothemes'), '<span class="small">', '</span>' ); ?>
                    
                </div><!-- /.post -->
                
                <?php $comm = $woo_options['woo_comments']; if ( ($comm == "page" || $comm == "both") ) : ?>
                    <?php comments_template(); ?>
                <?php endif; ?>
                                                    
			<?php endwhile; else: ?>
				<div class="post">
                	<p><?php _e('Sorry, no posts matched your criteria.', 'woothemes') ?></p>
                </div><!-- /.post -->
            <?php endif; ?>  
        
		</div><!-- /#main -->

        

    </div><!-- /#content -->
		
<?php get_footer(); ?>
<?php else: ?>
	<?php echo "<link rel='stylesheet' id='uds-billboard-css'  href='http://www.avianneandco.com/blog/wp-content/plugins/uBillboard/css/billboard.min.css?ver=3.1.0' type='text/css' media='screen' />
<script type='text/javascript' src='http://www.avianneandco.com/blog/wp-includes/js/jquery/jquery.js?ver=1.7.1'></script>
<script type='text/javascript' src='http://www.avianneandco.com/blog/wp-content/plugins/uBillboard/js/billboard.min.js?ver=3.1.0'></script>
<style type='text/css'>.cms-content .uds-bb { margin: 0 !important; }</style>"; ?>
	<?php
		$opts = array('http' =>
				array(
						'header'  => 'User-agent: Mozilla/5.0 (iPhone; U; CPU like Mac OS X; en) AppleWebKit/420.1 (KHTML, like Gecko) Version/3.0 Mobile/3B48b Safari/419.3',
				)
		);
		$context  = stream_context_create($opts);
		$magento = file_get_contents('http://www.avianneandco.com/celebrity-jewelry-gallery', false, $context);
		$content = str_replace("[SLIDER]",get_uds_billboard("billboard"),$magento);
		$content = str_replace('<script type="text/javascript" src="http://d3p1jc4qwvxcf2.cloudfront.net/js/aw_mobile/jquery-1.4.4.min.js"></script>','',$content);
		echo $content;
	?>
<script type='text/javascript'>
		//<![CDATA[
		jQuery(document).ready(function(){
			jQuery('#uds-bb-0').show().uBillboard({
				width: '600px',
				height: '600px',
				squareSize: '100px',
				autoplay: true,
				pauseOnVideo: true,
				showControls: true,
				showPause: false,
				showPaginator: false,
				showThumbnails: false,
				showTimer: false,
				thumbnailHoverColor: "#006699",
				slides: {
					0: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					1: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'right',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: true
					},
					2: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					3: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					4: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					5: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					6: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					7: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					8: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					9: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					10: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					11: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					12: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: true
					},
					13: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					14: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					15: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					16: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					17: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					18: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					19: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					20: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					21: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					22: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					23: {
						linkTarget: '',
						delay: 1000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					24: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					25: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					26: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					27: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					28: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					29: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					30: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					31: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					32: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					33: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					34: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					35: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					36: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					37: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					38: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					39: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					40: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					41: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					42: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					43: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					44: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					45: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					46: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					47: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					48: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					49: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					50: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					51: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					52: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					53: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					54: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					55: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'repeat',
						stop: false
					},
					56: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					57: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					58: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					59: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					60: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					61: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					62: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					63: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					64: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					65: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					66: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					67: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					68: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					},
					69: {
						linkTarget: '',
						delay: 5000,
						transition: 'scale',
						direction: 'none',
						bgColor: 'transparent',
						repeat: 'no-repeat',
						stop: false
					}
				}
			});
		
		});
		//]]>
</script>
<?php endif; ?>