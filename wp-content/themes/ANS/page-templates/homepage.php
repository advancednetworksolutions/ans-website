<?php
/**
 * Template Name: Homepage
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<style>
#progress {  bottom: 0px; height: 10px; width: 0px; background: #bdbcc0; z-index: 500; }
</style>

		<div class="cycle-slideshow" data-cycle-slides="> div" data-cycle-fx="scrollHorz" data-cycle-timeout="9000" data-cycle-next=".nextControl">
		
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="slide-text" style="background:#<?php the_field('background_color1'); ?>; background-image:url('<?php the_field('background_image1'); ?>');">
					<?php the_field('title'); ?>
					<?php the_field('content'); ?>
					<a href="<?php the_field('link_url'); ?>"><?php the_field('link_text'); ?></a>
					<!--[if !IE 7]><!--><section class="progbar"><p class="nextControl" style="margin-left:50px;"></p></section><!--<![endif]-->
					
				</div>
				
				<div class="slide-text" style="background:#<?php the_field('background_color2'); ?>; background-image:url('<?php the_field('background_image2'); ?>');">
					<?php the_field('title2'); ?>
					<?php the_field('content2'); ?>
					<a href="<?php the_field('link_url2'); ?>"><?php the_field('link_text2'); ?></a>
					<!--[if !IE 7]><!--><section class="progbar"><p class="nextControl" style="margin-left:338px;"></p></section><!--<![endif]-->
					
				</div>
				
				<div class="slide-text" style="background:#<?php the_field('background_color3'); ?>; background-image:url('<?php the_field('background_image3'); ?>');">
					<?php the_field('title3'); ?>
					<?php the_field('content3'); ?>
					<a href="<?php the_field('link_url3'); ?>"><?php the_field('link_text3'); ?></a>
					<!--[if !IE 7]><!--><section class="progbar"><p class="nextControl" style="margin-left:615px;"></p></section><!--<![endif]-->
					
				</div>
			<?php endwhile; // end of the loop. ?>
			
		</div>
		<div style="background-color:#424243;">
		<!--<div id="progress"></div>-->
		</div>
	<script>
	var progress = $('#progress'),
		slideshow = $( '.cycle-slideshow' );

	slideshow.on( 'cycle-initialized cycle-before', function( e, opts ) {
		progress.stop(true).css( 'width', 0 );
	});

	slideshow.on( 'cycle-initialized cycle-after', function( e, opts ) {
		if ( ! slideshow.is('.cycle-paused') )
			progress.animate({ width: '100%' }, opts.timeout, 'linear' );
	});

	slideshow.on( 'cycle-paused', function( e, opts ) {
	   progress.stop(); 
	});

	slideshow.on( 'cycle-resumed', function( e, opts, timeoutRemaining ) {
		progress.animate({ width: '100%' }, timeoutRemaining, 'linear' );
	});
</script>	
	  <div class="content">
                <div class="content-left">
                    <h2>WHO ARE YOU?</h2>
                    <a style="text-decoration: none;" href="/managed-services/it-expert/"><div class="expert-home"><div style="height: 182px;"></div><div style="background-color: #6d6d6e; opacity:0.8; height: 32px; font-size: 10px; color: #FFF; text-align: left; padding-left: 12px; "><span style="display: block; padding-top: 4px; line-height: 12px;">I'm an IT Expert<br />Who Needs an IT Partner.</span></div></div></a>
                    <a style="text-decoration: none;" href="/managed-services/it-simplicity/"><div class="not-expert-home"><div style="height: 182px;"></div><div style="background-color: #6d6d6e;  opacity:0.8; height: 32px; font-size: 10px; color: #FFF; text-align: left; padding-left: 12px; "><span style="display: block; padding-top: 4px; line-height: 12px;">I'm NOT an IT Expert<br />and Need Simplicity.</span></div></div></a>
                    <a style="text-decoration: none;" href="/key-industries/"><div class="serve-home"><div style="height: 97px;"></div><div style="background-color: #6d6d6e; opacity:0.8; height: 31px; font-size: 10px; color: #FFF; text-align: left; padding-left: 12px; "><span style="display: block; padding-top: 9px; line-height: 12px;">Industries We Serve.</span></div></div></a>
                </div>
                <div class="content-right">
                    <h2>FEATURED BLOG</h2>
                    <div class="content-right-featured-blog">
                        <?php   
							wp_reset_postdata();
							$bios = new WP_Query(array('post_type' => 'bio'));
							$countit = 0;
						?>
						
						<?php while ( $bios->have_posts() ) : $bios->the_post(); ?>
							
							<?php 
								$titles[$countit] = get_the_title();
								$imgs[$countit] = get_field('blogger_picture');
								$countit++;
							?>
						<?php endwhile; // end of the loop. ?>
                        
                        <?php 
                        $count = 0;
                        $cat_id = 2; //the certain category ID
                        $latest_cat_post = new WP_Query( array('posts_per_page' => 2, 'category__in' => array($cat_id)));
                        if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
                            <?php if($count == 0): ?>
								<div class="featured-blog-pic">
									<?php 
									$pic = 0;
									$auth = get_the_author();
									$numb = 22;
									foreach ($titles as $value) {
									  if($value == $auth){
										$numb = $pic;
									  }
									  $pic++;
									}
								?>
								<img src="<?php echo $imgs[$numb]; ?>" />
								</div>
								<div class="featured-blog-content">
                                <?php the_post_thumbnail(); ?>
                                <?php if ( is_single() ) : ?>
                                <h1><?php the_title(); ?></h1>
                                <?php else : ?>

                                <h1><?php 
                                        $title = get_the_title();
                                        $titler = substr($title, 0, 45);
                                        echo $titler;
                                    ?></h1>

                                <?php endif; // is_single() ?>

                                <?php if ( is_search() ) : // Only display Excerpts for Search ?>

                                <?php else : ?>

                                <?php 
                                    $content = get_the_content(); 
                                    $result = substr($content, 0, 400);
                                    echo $result . "...";
                                ?>

                                <a  style=" width: 75px;" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Read More About: %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><br /><span style="width: 75px;" class="read-more">Read More ></span></a><br /><br />
                        <?php $count++; endif; ?>
                            </div>
                        </div>  
                        <div class="content-right-second-blog">
                        <?php else : ?>
                                <?php the_post_thumbnail(); ?>
                                <?php if ( is_single() ) : ?>
                                <h1><?php the_title(); ?></h1>
                                <?php else : ?>

                                <h1><?php the_title(); ?></h1>

                                <?php endif; // is_single() ?>

                                <?php if ( is_search() ) : // Only display Excerpts for Search ?>

                                <?php else : ?>

                                <?php 
                                    $content = get_the_content(); 
                                    $result = substr($content, 0, 255);
                                    echo $result . "...";
                                ?>

                                <a  style=" width: 75px;" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Read More About: %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><br /><span class="read-more" style=" width: 75px;">Read More ></span></a><div class="clear-both"></div>
                        <?php endif; ?>        
                        <?php endif; ?>
                        
                        <?php endwhile; endif; ?>
                        

                    </div>
                </div>
            </div>
            <div class="clear-both"></div>
            <div class="hr-line"></div>
            <div class="middle-nav">
			<?php while ( have_posts() ) : the_post(); ?>
			
                <a style="margin-left:22px;" href="<?php the_field('page_url', 72); ?>" onmouseover="document.getElementById('image1').src='<?php the_field('icon_active', 72); ?>';" onmouseout="document.getElementById('image1').src='<?php the_field('icon_inactive', 72); ?>';"><img id="image1" src="<?php the_field('icon_inactive', 72); ?>" alt="Network Design and Security" /><br /><p><?php the_field('title_text', 72); ?></p></a>
				
                <a href="<?php the_field('page_url', 263); ?>" onmouseover="document.getElementById('image2').src='<?php the_field('icon_active', 263); ?>';" onmouseout="document.getElementById('image2').src='<?php the_field('icon_inactive', 263); ?>';"><img id="image2" src="<?php the_field('icon_inactive', 263); ?>" alt="Project management" /><br /><p><?php the_field('title_text', 263); ?></p></a>
				
                <a href="<?php the_field('page_url', 265); ?>" onmouseover="document.getElementById('image3').src='<?php the_field('icon_active', 265); ?>';" onmouseout="document.getElementById('image3').src='<?php the_field('icon_inactive', 265); ?>';"><img id="image3" src="<?php the_field('icon_inactive', 265); ?>" alt="Cloud Service / Storage Solutions" /><br /><p><?php the_field('title_text', 265); ?></p></a>
				
                <a href="<?php the_field('page_url', 267); ?>" onmouseover="document.getElementById('image4').src='<?php the_field('icon_active', 267); ?>';" onmouseout="document.getElementById('image4').src='<?php the_field('icon_inactive', 267); ?>';"><img id="image4" src="<?php the_field('icon_inactive', 267); ?>" alt="Disaster Recovery" /><br /><p><?php the_field('title_text', 267); ?></p></a>
				
                <a href="<?php the_field('page_url', 273); ?>" onmouseover="document.getElementById('image5').src='<?php the_field('icon_active', 273); ?>';" onmouseout="document.getElementById('image5').src='<?php the_field('icon_inactive', 273); ?>';"><img id="image5" src="<?php the_field('icon_inactive', 273); ?>" alt="Server Virtualization" /><br /><p><?php the_field('title_text', 273); ?></p></a>
				
                <a href="<?php the_field('page_url', 271); ?>" onmouseover="document.getElementById('image6').src='<?php the_field('icon_active', 271); ?>';" onmouseout="document.getElementById('image6').src='<?php the_field('icon_inactive', 271); ?>';"><img id="image6" src="<?php the_field('icon_inactive', 271); ?>" alt="Remote Monitoring" /><br /><p><?php the_field('title_text', 271); ?></p></a>
				
                <a href="<?php the_field('page_url', 275); ?>" onmouseover="document.getElementById('image7').src='<?php the_field('icon_active', 275); ?>';" onmouseout="document.getElementById('image7').src='<?php the_field('icon_inactive', 275); ?>';"><img id="image7" src="<?php the_field('icon_inactive', 275); ?>" alt="Secure Wireless Solutions" /><br /><p><?php the_field('title_text', 275); ?></p></a>
			<?php endwhile; // end of the loop. ?>
            </div>
            <div class="clear-both"></div>

            
            <div class="video">
                <?php while ( have_posts() ) : the_post(); ?>
				
                <div class="video-slot1"><a href="<?php the_field('left_url'); ?>"><img src="<?php the_field('left_video'); ?>" alt="" /><br /><br /><p><?php the_field('left_text'); ?></p></a></div>
                <div class="video-slot2"><a href="<?php the_field('center_url'); ?>"><img src="<?php the_field('center_video'); ?>" alt="" /><br /><br /><p><?php the_field('center_text'); ?></p></a></div>
                <div class="video-slot3"><a href="<?php the_field('right_url'); ?>"><img src="<?php the_field('right_video'); ?>" alt="" /><br /><br /><p><?php the_field('right_text'); ?></p></a></div>
                <?php endwhile; // end of the loop. ?>
            </div>
            
            <div class="clear-both"></div>
            <div class="hr-line" style="margin-bottom:35px;"></div>
            <div style="margin: 0 auto;"><img src="<?php the_field('logos'); ?>" alt="" /></div>

<?php get_footer(); ?>