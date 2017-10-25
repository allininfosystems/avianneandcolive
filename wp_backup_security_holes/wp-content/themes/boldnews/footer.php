</div><!-- /.middle-container -->
<?php global $woo_options; ?>

	<?php if ( woo_active_sidebar('footer-1') ||
			   woo_active_sidebar('footer-2') || 
			   woo_active_sidebar('footer-3') || 
			   woo_active_sidebar('footer-4') ) : ?>
	<div id="footer-widgets">
	  <div class="col-full">
		<div class="block">
        	<?php woo_sidebar('footer-1'); ?>    
		</div>
		<div class="block">
        	<?php woo_sidebar('footer-2'); ?>    
		</div>
		<div class="block">
        	<?php woo_sidebar('footer-3'); ?>    
		</div>
		<div class="block">
        	<?php woo_sidebar('footer-4'); ?>    
		</div>
		<div class="fix"></div>
	  </div>
	</div><!-- /#footer-widgets  -->
    <?php endif; ?>
    
	<div id="footer">
	<?php /* ?>
	  <div class="inner">
		<div id="copyright" class="col-left">
		<?php if($woo_options['woo_footer_left'] == 'true'){
		
				echo stripslashes($woo_options['woo_footer_left_text']);	

		} else { ?>
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo(); ?>. <?php _e('All Rights Reserved.', 'woothemes') ?></p>
		<?php } ?>
		</div>
		
		<div id="credit" class="col-right">
        <?php if($woo_options['woo_footer_right'] == 'true'){
		
        	echo stripslashes($woo_options['woo_footer_right_text']);
       	
		} else { ?>
			<p><?php _e('Powered by', 'woothemes') ?> <a href="http://www.wordpress.org">WordPress</a>. <?php _e('Designed by', 'woothemes') ?> <a href="<?php $aff = $woo_options['woo_footer_aff_link']; if(!empty($aff)) { echo $aff; } else { echo 'http://www.woothemes.com'; } ?>"><img src="<?php bloginfo('template_directory'); ?>/images/woothemes.png" width="74" height="19" alt="Woo Themes" /></a></p>
		<?php } ?>
		</div>
	  </div
	  <div class="fix"></div>
	  <?php */ ?>
	</div><!-- /#footer  -->

</div><!-- /#wrapper -->
<!-- BEGIN GOOGLE ANALYTICS CODE -->
<script type="text/javascript">
//<![CDATA[
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
    })();

    var _gaq = _gaq || [];

_gaq.push(['_setAccount', 'UA-6196938-1']);
_gaq.push(['_trackPageview']);


//]]>
</script>
<!-- END GOOGLE ANALYTICS CODE -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>