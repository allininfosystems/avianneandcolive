<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title><?php woo_title(); ?></title>
<?php woo_meta(); ?>
<?php global $woo_options; ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( $woo_options['woo_feed_url'] ) { echo $woo_options['woo_feed_url']; } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
      
<?php wp_head(); ?>
<?php woo_head(); ?>
<script type="text/javascript">
  var __lc = {};
  __lc.license = 1074645;

  (function() {
    var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
    lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
  })();
</script>
<!-- Google Webfonts --> 
<link href="http://fonts.googleapis.com/css?family=PT+Sans:r,b" rel="stylesheet" type="text/css" />


</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">
           
	<div id="header-wrap">
		<div id="header" class="col-full">
	 		<?php /* ?>      
			<div id="logo">
		       
			<?php if ($woo_options['woo_texttitle'] <> "true") : $logo = $woo_options['woo_logo']; ?>
				<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">
					<img src="<?php if ($logo) echo $logo; else { bloginfo('template_directory'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" />
				</a>
	        <?php endif; ?> 
	        
	        <?php if( is_singular() && !is_front_page() ) : ?>
				<span class="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></span>
	        <?php else : ?>
				<h1 class="site-title"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
	        <?php endif; ?>
				<span class="site-description"><?php bloginfo('description'); ?></span>
		      	
			</div><!-- /#logo -->
		       
			<?php if ( $woo_options['woo_ad_top'] == 'true' ) { ?>
	        <div id="topad">
				<?php if ($woo_options['woo_ad_top_adsense'] <> "") { echo stripslashes($woo_options['woo_ad_top_adsense']);  } else { ?>
					<a href="<?php echo $woo_options['woo_ad_top_url']; ?>"><img src="<?php echo $woo_options['woo_ad_top_image']; ?>" width="468" height="60" alt="advert" /></a>
				<?php } ?>		   	
			</div><!-- /#topad -->
	        <?php }*/ ?>
	       	<h4 id="logo">
	        	<span>Avianne &amp; Co Jewelers</span>
				<a href="/"></a>
			</h4>
	        <span class="nypcj">NEW YORK’S PREMIER CUSTOM JEWELERS</span>
	        <div class="chat-phones">
	        	<div id="LiveChat_1317342923"></div>
	        	<script type="text/javascript">
					 var __lc_buttons = __lc_buttons || [];
					__lc_buttons.push({
						elementId: 'LiveChat_1317342923',
						language: 'en',
						skill: '0'
					});
				</script>
	        	<ul>
	        		<li><img border="0" style="vertical-align: bottom; padding-bottom: 2px;" src="<?php echo get_bloginfo('template_directory'); ?>/images/usa.jpg" /> 888-243-4344</li>
	        		<li style="display: none;"><img border="0" style="vertical-align: bottom; padding-bottom: 2px;" src="<?php echo get_bloginfo('template_directory'); ?>/images/british.jpg" /> 888-243-4344</li>
	        	</ul>
	        </div>
		</div><!-- /#header -->
	    
	    <div class="middle-container top-head-container">
			<div id="navigation" class="col-full">
				<div id="page-nav">
		    	<div class="col-full">
				<?php
				if ( function_exists('has_nav_menu') && has_nav_menu('primary-menu') ) {
					wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fl', 'theme_location' => 'primary-menu' ) );
				} else {/*
				?>
		        <ul id="main-nav" class="nav fl">
					<?php 
		        	if ( isset($woo_options['woo_custom_nav_menu']) AND $woo_options['woo_custom_nav_menu'] == 'true' ) {
		        		if ( function_exists('woo_custom_navigation_output') )
							woo_custom_navigation_output();
					} else { ?>
			            <?php if ( is_page() ) $highlight = "page_item"; else $highlight = "page_item current_page_item"; ?>
			            <li class="<?php echo $highlight; ?>"><a href="<?php bloginfo('url'); ?>"><?php _e('Home', 'woothemes') ?></a></li>
			            <?php 
			    			wp_list_pages('sort_column=menu_order&depth=6&title_li=&exclude=43'); 
					}
					?>
		        </ul><!-- /#nav -->
		        <?php */ wp_nav_menu( array('menu' => 'Top nav menu' )); } ?>
		        <div id="icons" class="fr">
		    		
		    		<h3><?php echo _e('Find Us Online:','woothemes'); ?></h3>
		    			<ul>
		    				<li><a href="<?php if ( $woo_options['woo_feed_url'] ) { echo $woo_options['woo_feed_url']; } else { echo get_bloginfo_rss('rss2_url'); } ?>" title="Subscribe"><img src="<?php bloginfo('template_directory'); ?>/images/ico-rssfeed.png" alt="" /></a></li>
		    				<?php if ($woo_options['woo_social_digg']): ?><li><a href="<?php echo $woo_options['woo_social_digg']; ?>" title="Digg"><img src="<?php bloginfo('template_directory'); ?>/images/ico-digg.png" alt="" /></a></li><?php endif; ?>
		    				<?php if ($woo_options['woo_social_twitter']): ?><li><a href="<?php echo $woo_options['woo_social_twitter']; ?>" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/ico-twitter.png" alt="" /></a></li><?php endif; ?>
		    				<?php if ($woo_options['woo_social_technorati']): ?><li><a href="<?php echo $woo_options['woo_social_technorati']; ?>" title="Technorati"><img src="<?php bloginfo('template_directory'); ?>/images/ico-technorati.png" alt="" /></a></li><?php endif; ?>
		    				<?php if ($woo_options['woo_social_stumbleupon']): ?><li><a href="<?php echo $woo_options['woo_social_stumbleupon']; ?>" title="Stumbleupon"><img src="<?php bloginfo('template_directory'); ?>/images/ico-stumbleupon.png" alt="" /></a></li><?php endif; ?>
		    				<?php if ($woo_options['woo_social_facebook']): ?><li><a href="<?php echo $woo_options['woo_social_facebook']; ?>" title="Facebook"><img src="<?php bloginfo('template_directory'); ?>/images/ico-facebook.png" alt="" /></a></li><?php endif; ?>
		    				<?php if ($woo_options['woo_social_googleplus']): ?><li><a href="<?php echo $woo_options['woo_social_googleplus']; ?>" title="Google+"><img src="<?php bloginfo('template_directory'); ?>/images/ico-social-googleplus.png" alt="" /></a></li><?php endif; ?>
		    			</ul>        	
		
		        </div><!-- /#icons -->      
		    	<div class="fix"></div>
		    	
		    	</div><!-- /.col-full -->
				</div><!-- /#page-nav -->
				<?php /* ?>
				<div id="cat-nav" class="nav fl">
		        <div class="col-full">
							<?php
							if ( function_exists('has_nav_menu') && has_nav_menu('secondary-menu') ) {
								wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'secnav', 'menu_class' => 'fl', 'theme_location' => 'secondary-menu' ) );
							} else {
							?>
		                    <ul id="secnav" class="fl">
		                    
							<?php 
		                    if ( get_option('woo_custom_nav_menu') == 'true' && function_exists('woo_custom_navigation_output') ) {
								if ( get_option('woo_menu_desc') == "true" ) $desc = 1;
								woo_custom_navigation_output("name=Woo Menu 2&desc=".$desc);
		                    } else { ?>
		            	
			            <?php if ( is_home() OR is_front_page()) $highlight = "page_item current_page_item"; else $highlight = "page_item"; ?>
			            <?php wp_list_categories('sort_column=menu_order&depth=6&title_li=&show_option_none=&exclude='.get_option('woo_cats_exclude')); ?>
			            
			        <?php } ?>
			            
		        </ul><!-- /#nav2 -->
		
		                    <?php } ?>
		                </div><!-- /.col-full -->
		            </div><!-- /#cat-nav -->
		            <?php */?>
			</div><!-- /#navigation -->
		
		
			<?php if ($woo_options['woo_slider'] == "true" /*AND ( is_home() OR is_front_page() )*/ ) { ?>
			<div class="col-full" id="featured-slider">
				<div id="sliderWrap">
					<h2 class="title"><span><?php _e('Featured News Posts','woothemes'); ?></span></h2>
					<!-- SLIDER POSTS -->
					<?php include(TEMPLATEPATH . '/includes/slider.php'); ?>
				</div>   
			</div>  
			<?php } ?>
		</div><!-- /.middle-container -->
		
	</div><!-- #header-wrap -->       
	<div class="middle-container">
