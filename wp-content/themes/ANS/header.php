<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<style>
	.top-nav{
		width:960px;
	}
	.dropdown_4columns{
		background-color:#f7f6f6;
	}
</style>
<![endif]-->
<!--[if IE 8]>
<style>
	.dropdown_4columns{
		background-color:#f7f6f6;
	}
	
</style>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
<script type="text/javascript" src="http://fast.fonts.net/jsapi/d90096df-4955-4752-b7c4-b766edf6e6f1.js"></script>
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/styles.css">
<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/menu.css">


<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
<!--[if !IE 7]><!-->
<script>
    function headerForm() {
        $( "#header-contact" ).toggle();
      };
	  
	  function headerForm22() {
        $( "#header-contact22" ).toggle();
      };
	  
	  $(function(){
    $('#header').data('size','big');
});

$(window).scroll(function(){
    if($(document).scrollTop() > 170)
    {
        if($('#header').data('size') == 'big')
        {
            $('#header').data('size','small');
            $('#header').hide();
            $('#header22').slideDown();
        }
    }
    else
    {
        if($('#header').data('size') == 'small')
        {
            $('#header').data('size','big');
            $('#header').show();
            $('#header22').hide();
        }  
    }
});
</script>
<!--<![endif]-->
<script type="text/javascript">
	<!--//--><![CDATA[//><!--
		var images = new Array()
		function preload() {
			for (i = 0; i < preload.arguments.length; i++) {
				images[i] = new Image()
				images[i].src = preload.arguments[i]
			}
		}
		preload(
			"<?php echo get_template_directory_uri(); ?>/images/serve-color.jpg",
			"<?php echo get_template_directory_uri(); ?>/images/expert-color.jpg",
			"<?php echo get_template_directory_uri(); ?>/images/not-expert-color.jpg"
		)
	//--><!]]>
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58706743-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>
    <div class="wrapper22">
<div id="page" class="hfeed site">
				<div id="header" class="header">
					<div class="headerlogo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/header-logo.jpg" alt="Advanced Network Solutions" width="440" /></a>
					</div>
					<div class="social">
						<div class="social-btn">
                        <a href="http://www.facebook.com/ansolutions" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook" onmouseover="over(this, 'facebook.png', 'facebook-on.png');" onmouseout="over(this, 'facebook-on.png', 'facebook.png');" /></a>
                        <a href="http://www.twitter.com/ansolutions" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter" onmouseover="over(this, 'twitter.png', 'twitter-on.png');" onmouseout="over(this, 'twitter-on.png', 'twitter.png');" /></a>
                        <a href="https://www.linkedin.com/company/advanced-network-solutions" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="Linkedin" onmouseover="over(this, 'linkedin.png', 'linkedin-on.png');" onmouseout="over(this, 'linkedin-on.png', 'linkedin.png');" /></a>
                        <!--<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/flickr.png" alt="Flickr" onmouseover="over(this, 'flickr.png', 'flickr-on.png');" onmouseout="over(this, 'flickr-on.png', 'flickr.png');" /></a>-->
                        <a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="RSS" onmouseover="over(this, 'rss.png', 'rss-on.png');" onmouseout="over(this, 'rss-on.png', 'rss.png');" /></a>
                    </div>
						<div class="header-nav">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>resources/" style="padding-right:42px;">BLOG</a>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>company/press-media/" style="padding-right:42px;">PRESS</a>
							<a onclick="headerForm();" target="_blank"  rel="nofollow"><span style="cursor: pointer;" class="header-contact">CONTACT US NOW</span></a>
							
							<div id="header-contact" style="width:308px;">
									<?php echo do_shortcode('[contact-form-7 id="150" title="Contact form 1"]'); ?></div>
							</div>
						</div>
						
						<div class="clear-both"></div>
            
             <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '', 'menu_id' => 'nav', 'container_class' => 'top-nav', 'walker' => new Walker_Nav_Pointers ) ); ?>
			 
                </div>
				<div id="header22" class="header22">
					<div class="headerlogo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/header-logo22.jpg" alt="Advanced Network Solutions" /></a>
					</div>
					<div class="social">
						<div class="social-btn">
                        <a href="http://www.facebook.com/ansolutions" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook" onmouseover="over(this, 'facebook.png', 'facebook-on.png');" onmouseout="over(this, 'facebook-on.png', 'facebook.png');" /></a>
                        <a href="http://www.twitter.com/ansolutions" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter" onmouseover="over(this, 'twitter.png', 'twitter-on.png');" onmouseout="over(this, 'twitter-on.png', 'twitter.png');" /></a>
                        <a href="https://www.linkedin.com/company/advanced-network-solutions" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="Linkedin" onmouseover="over(this, 'linkedin.png', 'linkedin-on.png');" onmouseout="over(this, 'linkedin-on.png', 'linkedin.png');" /></a>
                        <!--<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/flickr.png" alt="Flickr" onmouseover="over(this, 'flickr.png', 'flickr-on.png');" onmouseout="over(this, 'flickr-on.png', 'flickr.png');" /></a>-->
                        <a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="RSS" onmouseover="over(this, 'rss.png', 'rss-on.png');" onmouseout="over(this, 'rss-on.png', 'rss.png');" /></a>
                    </div>
						<div class="header-nav">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>resources/" style="padding-right:42px;">BLOG</a>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>company/press-media/" style="padding-right:42px;">PRESS</a>
							<a onclick="headerForm22();" target="_blank"  rel="nofollow"><span style="cursor: pointer;" class="header-contact">CONTACT US NOW</span></a>
							
							<div id="header-contact22" style="width:308px;">
									<?php echo do_shortcode('[contact-form-7 id="150" title="Contact form 1"]'); ?></div>
						</div>
						</div>
                
            
            <div class="clear-both"></div>
            
             <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => '', 'menu_id' => 'nav', 'container_class' => 'top-nav', 'walker' => new Walker_Nav_Pointers ) ); ?>
            
				</div>
           </div>
	<div id="main" class="wrapper">
            
            
            
            