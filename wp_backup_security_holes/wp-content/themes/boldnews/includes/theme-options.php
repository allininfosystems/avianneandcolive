<?php

//Enable WooSEO on these custom Post types
$seo_post_types = array('post','page');
define("SEOPOSTTYPES", serialize($seo_post_types));

//Global options setup
add_action('init','woo_global_options');
function woo_global_options(){
	// Populate WooThemes option in array for use in theme
	global $woo_options;
	$woo_options = get_option('woo_options');
}

add_action( 'admin_head','woo_options' );  
if (!function_exists('woo_options')) {
function woo_options() {
	
// VARIABLES
$themename = "Bold News";
$manualurl = 'http://www.woothemes.com/support/theme-documentation/boldnews/';
$shortname = "woo";

//Access the WordPress Categories via an Array
$woo_categories = array();  
$woo_categories_obj = get_categories('hide_empty=0');
foreach ($woo_categories_obj as $woo_cat) {
    $woo_categories[$woo_cat->cat_ID] = $woo_cat->cat_name;}
$categories_tmp = array_unshift($woo_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$woo_pages = array();
$woo_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($woo_pages_obj as $woo_page) {
    $woo_pages[$woo_page->ID] = $woo_page->post_name; }
$woo_pages_tmp = array_unshift($woo_pages, "Select a page:");       

//Stylesheets Reader
$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();
if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}

//More Options
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");

// THIS IS THE DIFFERENT FIELDS
$options = array();   
  
// General Settings

$options[] = array( "name" => "General Settings",
					"type" => "heading",
					"icon" => "general");
                        
$options[] = array( "name" => "Theme Stylesheet",
					"desc" => "Select your themes alternative color scheme.",
					"id" => $shortname."_alt_stylesheet",
					"std" => "default.css",
					"type" => "select",
					"options" => $alt_stylesheets);

$options[] = array( "name" => "Custom Logo",
					"desc" => "Upload a logo for your theme, or specify an image URL directly.",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");    
                                                                                     
$options[] = array( "name" => "Text Title",
					"desc" => "Enable text-based Site Title and Tagline. Setup title & tagline in Settings->General.",
					"id" => $shortname."_texttitle",
					"std" => "false",
					"class" => "collapsed",
					"type" => "checkbox");

$options[] = array( "name" => "Site Title",
					"desc" => "Change the site title (must have 'Text Title' option enabled).",
					"id" => $shortname."_font_site_title",
					"std" => array('size' => '40','unit' => 'px','face' => 'Georgia','style' => '','color' => '#222222'),
					"class" => "hidden",
					"type" => "typography");  

$options[] = array( "name" => "Site Description",
					"desc" => "Change the site description (must have 'Text Title' option enabled).",
					"id" => $shortname."_font_tagline",
					"std" => array('size' => '14','unit' => 'px','face' => 'Georgia','style' => 'italic','color' => '#999999'),
					"class" => "hidden last",
					"type" => "typography");  
					          
$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px <a href='http://www.faviconr.com/'>ico image</a> that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Tracking Code",
					"desc" => "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "textarea");        

$options[] = array( "name" => "RSS URL",
					"desc" => "Enter your preferred RSS URL. (Feedburner or other)",
					"id" => $shortname."_feed_url",
					"std" => "",
					"type" => "text");
                    
$options[] = array( "name" => "E-Mail URL",
					"desc" => "Enter your preferred E-mail subscription URL. (Feedburner or other)",
					"id" => $shortname."_subscribe_email",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Contact Form E-Mail",
					"desc" => "Enter your E-mail address to use on the Contact Form Page Template. Add the contact form by adding a new page and selecting 'Contact Form' as page template.",
					"id" => $shortname."_contactform_email",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Custom CSS",
                    "desc" => "Quickly add some CSS to your theme by adding it to this block.",
                    "id" => $shortname."_custom_css",
                    "std" => "",
                    "type" => "textarea");

$options[] = array( "name" => "Post/Page Comments",
					"desc" => "Select if you want to enable/disable comments on posts and/or pages. ",
					"id" => $shortname."_comments",
					"type" => "select2",
					"options" => array("post" => "Posts Only", "page" => "Pages Only", "both" => "Pages / Posts", "none" => "None") );                                                          
    
$options[] = array( "name" => "Post Content",
					"desc" => "Select if you want to show the full content or the excerpt on posts. ",
					"id" => $shortname."_post_content",
					"type" => "select2",
					"options" => array("excerpt" => "The Excerpt", "content" => "Full Content" ) ); 
					
$options[] = array( "name" => "Pagination Style",
					"desc" => "Select the style of pagination you would like to use on the blog.",
					"id" => $shortname."_pagination_type",
					"type" => "select2",
					"options" => array("paginated_links" => "Numbers", "simple" => "Next/Previous" ) );
					
$options[] = array( "name" => "About the Post",
					"desc" => "This will enable the about the post box on the single posts page. Edit author description in <a href='".home_url()."/wp-admin/profile.php'>Profile</a>.",
					"id" => $shortname."_post_author",
					"std" => "true",
					"type" => "checkbox");    					 

// Styling Options

$options[] = array( "name" => "Styling Options",
					"type" => "heading",
					"icon" => "styling");   
					
$options[] = array( "name" =>  "Body Background Color",
					"desc" => "Pick a custom color for background color of the theme e.g. #697e09",
					"id" => "woo_body_color",
					"std" => "",
					"type" => "color");
					
$options[] = array( "name" => "Body background image",
					"desc" => "Upload an image for the theme's background",
					"id" => $shortname."_body_img",
					"std" => "",
					"type" => "upload");
					
$options[] = array( "name" => "Background image repeat",
                    "desc" => "Select how you would like to repeat the background-image",
                    "id" => $shortname."_body_repeat",
                    "std" => "no-repeat",
                    "type" => "select",
                    "options" => array("no-repeat","repeat-x","repeat-y","repeat"));

$options[] = array( "name" => "Background image position",
                    "desc" => "Select how you would like to position the background",
                    "id" => $shortname."_body_pos",
                    "std" => "top",
                    "type" => "select",
                    "options" => array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right"));

$options[] = array( "name" =>  "Link Color",
					"desc" => "Pick a custom color for links or add a hex color code e.g. #697e09",
					"id" => "woo_link_color",
					"std" => "",
					"type" => "color");   

$options[] = array( "name" =>  "Link Hover Color",
					"desc" => "Pick a custom color for links hover or add a hex color code e.g. #697e09",
					"id" => "woo_link_hover_color",
					"std" => "",
					"type" => "color");                    

$options[] = array( "name" =>  "Button Color",
					"desc" => "Pick a custom color for buttons or add a hex color code e.g. #697e09",
					"id" => "woo_button_color",
					"std" => "",
					"type" => "color");          
					
// Typography
									
$options[] = array( "name" => "Typography",
					"type" => "heading",
					"icon" => "typography");   

$options[] = array( "name" => "Enable Custom Typography",
					"desc" => "Enable the use of custom typography for your site. Custom styling will be output in your sites HEAD.",
					"id" => $shortname."_typography",
					"std" => "false",
					"type" => "checkbox"); 									   

$options[] = array( "name" => "General Typography",
					"desc" => "Change the general font.",
					"id" => $shortname."_font_body",
					"std" => array('size' => '12','unit' => 'px','face' => 'Arial','style' => '','color' => '#555555'),
					"type" => "typography");  

$options[] = array( "name" => "Navigation",
					"desc" => "Change the navigation font.",
					"id" => $shortname."_font_nav",
					"std" => array('size' => '14','unit' => 'px','face' => 'Arial','style' => '','color' => '#555555'),
					"type" => "typography");  

$options[] = array( "name" => "Post Title",
					"desc" => "Change the post title.",
					"id" => $shortname."_font_post_title",
					"std" => array('size' => '24','unit' => 'px','face' => 'Arial','style' => 'bold','color' => '#222222'),
					"type" => "typography");  

$options[] = array( "name" => "Post Meta",
					"desc" => "Change the post meta.",
					"id" => $shortname."_font_post_meta",
					"std" => array('size' => '12','unit' => 'px','face' => 'Arial','style' => '','color' => '#999999'),
					"type" => "typography");  
					          
$options[] = array( "name" => "Post Entry",
					"desc" => "Change the post entry.",
					"id" => $shortname."_font_post_entry",
					"std" => array('size' => '14','unit' => 'px','face' => 'Arial','style' => '','color' => '#555555'),
					"type" => "typography");  

$options[] = array( "name" => "Widget Titles",
					"desc" => "Change the widget titles.",
					"id" => $shortname."_font_widget_titles",
					"std" => array('size' => '16','unit' => 'px','face' => 'Arial','style' => 'bold','color' => '#555555'),
					"type" => "typography");  

// Homepage					
$options[] = array( "name" => "Homepage",
					"icon" => "homepage",
					"type" => "heading");
					
$options[] = array( "name" => "Blog Title",
          			"desc" => "Enter the title to use on homepage above the recent blog posts.",
          			"id" => $shortname."_home_title_blog",
          			"std" => "Recent News",
          			"type" => "text"); 
          			
$options[] = array(	"name" => "2 Column Magazine Style",
					"desc" => "Show normal posts in two columns instead of default one column",
					"id" => $shortname."_home_magazine",
					"std" => "true",
					"type" => "checkbox");

//Social Settings					
$options[] = array( "name" => "Social",
					"icon" => "misc",
					"type" => "heading");

$options[] = array( "name" => "Digg",
					"desc" => "Enter your profile url",
					"id" => $shortname."_social_digg",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Twitter",
					"desc" => "Enter your profile url",
					"id" => $shortname."_social_twitter",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Technorati",
					"desc" => "Enter your profile url",
					"id" => $shortname."_social_technorati",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Stumbleupon",
					"desc" => "Enter your profile url",
					"id" => $shortname."_social_stumbleupon",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Facebook",
					"desc" => "Enter your profile url",
					"id" => $shortname."_social_facebook",
					"std" => "",
					"type" => "text");         
					
$options[] = array( "name" => "Google Plus",
					"desc" => "Enter your profile url",
					"id" => $shortname."_social_googleplus",
					"std" => "",
					"type" => "text");          
					
$options[] = array( "name" => "Enable Digg Share",
					"desc" => "Single Post - About the Post",
					"id" => $shortname."_share_digg",
					"std" => "false",
					"type" => "checkbox");   
					
$options[] = array( "name" => "Enable Twitter Share",
					"desc" => "Single Post - About the Post",
					"id" => $shortname."_share_twitter",
					"std" => "false",
					"type" => "checkbox");         

$options[] = array( "name" => "Enable Technorati Share",
					"desc" => "Single Post - About the Post",
					"id" => $shortname."_share_technorati",
					"std" => "false",
					"type" => "checkbox");         

$options[] = array( "name" => "Enable Stumbleupon Share",
					"desc" => "Single Post - About the Post",
					"id" => $shortname."_share_stumbleupon",
					"std" => "false",
					"type" => "checkbox");         

$options[] = array( "name" => "Enable Facebook Share",
					"desc" => "Single Post - About the Post",
					"id" => $shortname."_share_facebook",
					"std" => "false",
					"type" => "checkbox");   
					
$options[] = array( "name" => "Enable Reddit Share",
					"desc" => "Single Post - About the Post",
					"id" => $shortname."_share_reddit",
					"std" => "false",
					"type" => "checkbox");         
                    
// Slider					
$options[] = array( "name" => "Slider",
					"icon" => "slider",
					"type" => "heading");
	
$options[] = array( "name" => "Enable Slider",
                    "desc" => "Enable the slider on the homepage.",
                    "id" => $shortname."_slider",
                    "std" => "false",
                    "type" => "checkbox");
                                            
$options[] = array( "name" => "Slider Tag",
                    "desc" => "Add one or more tags that you would like to have displayed in the slider section on your homepage. For example, if you add 'tag1, tag3' here, then all posts tagged with either 'tag1' or 'tag3' will be shown in the slider.",
                    "id" => $shortname."_slider_tags",
                    "std" => "tag, tag, tag",
                    "type" => "text");

$options[] = array( "name" => "Slider Entries",
                    "desc" => "Select the number of entries that should appear in the home page slider.",
                    "id" => $shortname."_slider_entries",
                    "std" => "10",
                    "type" => "select",
                    "options" => $other_entries);
                    
$options[] = array( "name" => "Exclude Featured Posts",
					"desc" => "Exclude the slider posts from normal posts below slider.",
					"id" => $shortname."_slider_exclude",
					"std" => "true",
					"type" => "checkbox");        

$options[] = array(  "name" => "Animation Speed",
                    "desc" => "The time in <b>seconds</b> the animation between frames will take e.g. <strong>600</strong>",
                    "id" => $shortname."_slider_speed",
                    "std" => "0.6",
					"type" => "select",
					"options" => array( '0.0', '0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', '1.0', '1.1', '1.2', '1.3', '1.4', '1.5', '1.6', '1.7', '1.8', '1.9', '2.0' ) );

$options[] = array( "name" => "Auto Start",
                    "desc" => "Set the slider to start sliding automatically.",
                    "id" => $shortname."_slider_auto",
                    "std" => "false",
                    "type" => "checkbox");   
                    
$options[] = array( "name" => "Auto Slide Interval",
                    "desc" => "The time in <b>seconds</b> each slide pauses for, before sliding to the next e.g. <strong>4</strong>",
                    "id" => $shortname."_slider_interval",
                    "std" => "6",
					"type" => "select",
					"options" => array( '1', '2', '3', '4', '5', '6', '7', '8', '9', '10' ) );
                    
$options[] = array( "name" => "Slider scrolls by this many slides",
                    "desc" => "Select the number of slides that should scroll at a single time when the slider scrolls.",
                    "id" => $shortname."_slider_scroll_quantity",
                    "std" => "1",
                    "type" => "select",
                    "options" => array( '1', '2', '3' ));	

$options[] = array( "name" => "Slider Image Height",
                    "desc" => "Set the height of the slider image in pixels e.g 86",
                    "id" => $shortname."_slider_height",
                    "std" => "86",
                    "type" => "text");
                    
                    					
//Dynamic Images 					                   
$options[] = array( "name" => "Dynamic Images",
					"type" => "heading",
					"icon" => "image");    
				    				   
$options[] = array( "name" => "WP Post Thumbnail",
					"desc" => "Use WordPress post thumbnail to assign a post thumbnail.",
					"id" => $shortname."_post_image_support",
					"std" => "true",
					"class" => "collapsed",
					"type" => "checkbox"); 

$options[] = array( "name" => "WP Post Thumbnail - Dynamically Resize",
					"desc" => "The post thumbnail will be dynamically resized using native WP resize functionality. <em>(Requires PHP 5.2+)</em>",
					"id" => $shortname."_pis_resize",
					"std" => "true",
					"class" => "hidden",
					"type" => "checkbox"); 									   
					
$options[] = array( "name" => "WP Post Thumbnail - Hard Crop",
					"desc" => "The image will be cropped to match the target aspect ratio.",
					"id" => $shortname."_pis_hard_crop",
					"std" => "true",
					"class" => "hidden last",
					"type" => "checkbox"); 									   

$options[] = array( "name" => "Enable Dynamic Image Resizer",
					"desc" => "This will enable the thumb.php script which dynamically resizes images added through post custom field.",
					"id" => $shortname."_resize",
					"std" => "true",
					"type" => "checkbox");    
                    
$options[] = array( "name" => "Automatic Image Thumbs",
					"desc" => "If no image is specified in the 'image' custom field or WP post thumbnail then the first uploaded post image is used.",
					"id" => $shortname."_auto_img",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Thumbnail Image Dimensions",
					"desc" => "Enter an integer value i.e. 250 for the desired size which will be used when dynamically creating the images.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"type" => array( 
									array(  'id' => $shortname. '_thumb_w',
											'type' => 'text',
											'std' => 100,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_thumb_h',
											'type' => 'text',
											'std' => 100,
											'meta' => 'Height')
								  ));
                                                                                                
$options[] = array( "name" => "Thumbnail Image alignment",
					"desc" => "Select how to align your thumbnails with posts.",
					"id" => $shortname."_thumb_align",
					"std" => "alignleft",
					"type" => "radio",
					"options" => array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center")); 

$options[] = array( "name" => "Show thumbnail in Single Posts",
					"desc" => "Show the attached image in the single post page.",
					"id" => $shortname."_thumb_single",
					"class" => "collapsed",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Single Image Dimensions",
					"desc" => "Enter an integer value i.e. 250 for the image size. Max width is 576.",
					"id" => $shortname."_image_dimensions",
					"std" => "",
					"class" => "hidden last",
					"type" => array( 
									array(  'id' => $shortname. '_single_w',
											'type' => 'text',
											'std' => 200,
											'meta' => 'Width'),
									array(  'id' => $shortname. '_single_h',
											'type' => 'text',
											'std' => 200,
											'meta' => 'Height')
								  ));

$options[] = array( "name" => "Single Post Image alignment",
					"desc" => "Select how to align your thumbnail with single posts.",
					"id" => $shortname."_thumb_single_align",
					"std" => "alignright",
					"type" => "radio",
					"class" => "hidden",
					"options" => array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center")); 

$options[] = array( "name" => "Add thumbnail to RSS feed",
					"desc" => "Add the the image uploaded via your Custom Settings to your RSS feed",
					"id" => $shortname."_rss_thumb",
					"std" => "false",
					"type" => "checkbox");  
					
//Footer
$options[] = array( "name" => "Footer Customization",
					"type" => "heading",
					"icon" => "footer");    
					
					
$options[] = array( "name" => "Custom Affiliate Link",
					"desc" => "Add an affiliate link to the WooThemes logo in the footer of the theme.",
					"id" => $shortname."_footer_aff_link",
					"std" => "",
					"type" => "text");	
									
$options[] = array( "name" => "Enable Custom Footer (Left)",
					"desc" => "Activate to add the custom text below to the theme footer.",
					"id" => $shortname."_footer_left",
					"class" => "collapsed",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Custom Text (Left)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
					"id" => $shortname."_footer_left_text",
					"class" => "hidden last",
					"std" => "<p></p>",
					"type" => "textarea");
						
$options[] = array( "name" => "Enable Custom Footer (Right)",
					"desc" => "Activate to add the custom text below to the theme footer.",
					"id" => $shortname."_footer_right",
					"class" => "collapsed",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Custom Text (Right)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
					"id" => $shortname."_footer_right_text",
					"class" => "hidden last",
					"std" => "<p></p>",
					"type" => "textarea");
							
//Advertising
$options[] = array( "name" => "Top Ad (468x60px)",
					"type" => "heading",
					"icon" => "ads");    

$options[] = array( "name" => "Enable Ad",
					"desc" => "Enable the ad space",
					"id" => $shortname."_ad_top",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Adsense code",
					"desc" => "Enter your adsense code (or other ad network code) here.",
					"id" => $shortname."_ad_top_adsense",
					"std" => "",
					"type" => "textarea");

$options[] = array( "name" => "Image Location",
					"desc" => "Enter the URL to the banner ad image location.",
					"id" => $shortname."_ad_top_image",
					"std" => "http://www.woothemes.com/ads/468x60b.jpg",
					"type" => "upload");
					
$options[] = array( "name" => "Destination URL",
					"desc" => "Enter the URL where this banner ad points to.",
					"id" => $shortname."_ad_top_url",
					"std" => "http://www.woothemes.com",
					"type" => "text");                        
                                              
// Add extra options through function
if ( function_exists("woo_options_add") )
	$options = woo_options_add($options);

if ( get_option('woo_template') != $options) update_option('woo_template',$options);      
if ( get_option('woo_themename') != $themename) update_option('woo_themename',$themename);   
if ( get_option('woo_shortname') != $shortname) update_option('woo_shortname',$shortname);
if ( get_option('woo_manual') != $manualurl) update_option('woo_manual',$manualurl);


// Woo Metabox Options
// Start name with underscore to hide custom key from the user
$woo_metaboxes = array();

global $post;

if ( ( get_post_type() == 'post') || ( !get_post_type() ) ) {

	$woo_metaboxes[] = array (	"name" => "image",
								"label" => "Image",
								"type" => "upload",
								"desc" => "Upload an image or enter an URL.");
	
	if ( get_option('woo_resize') == "true" ) {						
		$woo_metaboxes[] = array (	"name" => "_image_alignment",
									"std" => "Center",
									"label" => "Image Crop Alignment",
									"type" => "select2",
									"desc" => "Select crop alignment for resized image",
									"options" => array(	"c" => "Center",
														"t" => "Top",
														"b" => "Bottom",
														"l" => "Left",
														"r" => "Right"));
	}

	$woo_metaboxes[] = array (  "name"  => "embed",
					            "std"  => "",
					            "label" => "Embed Code",
					            "type" => "textarea",
					            "desc" => "Enter the video embed code for your video (YouTube, Vimeo or similar)");
					            
} // End post


// Add extra metaboxes through function
if ( function_exists("woo_metaboxes_add") )
	$woo_metaboxes = woo_metaboxes_add($woo_metaboxes);
    
if ( get_option('woo_custom_template') != $woo_metaboxes) update_option('woo_custom_template',$woo_metaboxes);      

}
}



?>