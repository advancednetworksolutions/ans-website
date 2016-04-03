<?php
/**
 * Template Name: Key Industries Page
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<style>
	.hr-line {
		margin-top: 25px;
		margin-bottom: 20px;
	}
	.key-bottom-contact-btn {
		padding-top: 15px;
	}
</style>
<script>
	$( document ).ready(function() {
	
		$.fn.scrollView = function () {
			return this.each(function () {
				$('html, body').animate({
					scrollTop: $(this).offset().top
				}, 1000);
			});
		}
        //$("#short<?php echo $_GET['postId']; ?>").toggle();
		//$("#long<?php echo $_GET['postId']; ?>").toggle();
		//$("#rm<?php echo $_GET['postId']; ?>").toggle();
		//$("#rl<?php echo $_GET['postId']; ?>").toggle();
		$('#<?php echo $_GET['postId']; ?>').scrollView();
    });
</script>
	
		<?php 
		while ( have_posts() ) : the_post();
			$test = get_field('page_title');
			$test2 = get_field('page_background_image');
		endwhile;
		if ($test == null && $test2 == null) :
		?>
		<div class="slideshow">
			<img src="<?php echo get_template_directory_uri(); ?>/images/key-image.jpg" alt="Advanced Network Solutions" />
		</div>
		<?php else : ?>
			<?php while ( have_posts() ) : the_post(); ?>
					<div class="slide-text" style="height:300px; background:#<?php the_field('page_background_color'); ?>; background-image:url('<?php the_field('page_background_image'); ?>');">
						<?php the_field('page_title'); ?>
						<?php the_field('page_content'); ?>
						<a href="<?php the_field('page_link_url'); ?>"><?php the_field('page_link_text'); ?></a>
						
					</div>
					
			<?php endwhile; // end of the loop. ?>
			
		<?php endif; ?>
			<div class="breadcrumbs">
				<?php if(function_exists('bcn_display'))
				{
					bcn_display();
				}?>
			</div>
            <div class="content-project">
                <div class="content-project-left">
                  <?php wp_nav_menu (array( 'theme_location' => 'secondary', 'container' => false, 'menu_class' => 'none', 'menu_id' => 'none', 'submenu' => 'scott2' )); ?>
                    
                    <div class="side-divider"></div>
                    <a href="/project-services/cloud-services/"><img src="<?php echo get_template_directory_uri(); ?>/images/side/sale-cloud.png" /></a>
                    <div class="side-divider"></div>
                    <div class="side-contact">
                        <div class="side-contact-btn">
                        <a href="#contact_form_pop" class="fancybox" target="_blank"  rel="nofollow"><span class="header-contact">CONTACT US NOW</span></a>
                        <div style="display:none;" class="fancybox-hidden">
                        <div id="contact_form_pop" style="width:308px;">
                                <?php echo do_shortcode('[contact-form-7 id="150" title="Contact form 1"]'); ?></div>
                        </div>
                        </div>
                    </div>
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
                    <div class="side-divider"></div>
                    <div class="side-blog">
                        
                     <?php 
                        $count = 0;
                        $cat_id = 2; //the certain category ID
                        $latest_cat_post = new WP_Query( array('posts_per_page' => 4, 'category__in' => array($cat_id)));
                        if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
                            <?php if($count == 0): ?>
								<div class="side-blog-pic">
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
								<div class="side-blog-content">
                                <?php the_post_thumbnail(); ?>
                                <?php if ( is_single() ) : ?>
                                <h1><?php the_title(); ?></h1>
                                <?php else : ?>

                                <h1><?php 
                                        $title = get_the_title();
                                        $titler = substr($title, 0, 28);
                                        echo $titler;
                                    ?></h1>

                                <?php endif; // is_single() ?>

                                <?php if ( is_search() ) : // Only display Excerpts for Search ?>

                                <?php else : ?>

                                <?php 
                                    $content = get_the_content(); 
                                    $result = substr($content, 0, 200);
                                    echo $result . "...";
                                ?>

                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Read More About: %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span class="read-more" style="float: right;  padding-right: 10px; text-transform:capitalize; width: 75px;">Read More ></span></a><br /><br />
                        <?php $count++; endif; ?>
                                </div>
                        </div>
                        <div class="clear-both"></div> 
                        
                        <?php else : ?>
						<div class="side-second-blog">
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
                                    $result = substr($content, 0, 250);
                                    echo $result . "...";
                                ?>

                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Read More About: %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><br /><span class="read-more" style="float: right; padding-right: 10px; padding-bottom: 2px; text-transform:capitalize; width: 75px;">Read More ></span></a><div class="clear-both"></div> 
                             </div>
                        <div class="clear-both"></div> 
                        <?php endif; ?>        
                        <?php endif; ?>
                        
                        <?php endwhile; endif; ?>
                        
                      
                    </div>
                <div class="content-project-right">
				
                    <?php wp_reset_postdata(); ?>
                    <?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
					<?php endwhile; // end of the loop. ?>
					
                    <?php  
                        wp_reset_postdata();
						$args = array(
							'post_status' => 'publish',
							'post_type' => 'key-industry-type',
							'meta_key' => 'key_order_number',
							'orderby' => 'meta_value_num',
							'order' => 'ASC'
						);
                        $post_type = new WP_Query($args);
                    ?><?php $counter = 0; ?>
                        <?php while ( $post_type->have_posts() ) : $post_type->the_post(); ?>
                        <?php $postid = get_the_ID(); ?>
                        <script>
                            /*function test<?php echo $counter; ?>() {
                                
                                    $("#short<?php echo $postid; ?>").toggle();
                                    $("#long<?php echo $postid; ?>").toggle();
									$("#rm<?php echo $postid; ?>").toggle();
									$("#rl<?php echo $postid; ?>").toggle();
                              };*/
                        </script>
						<div id="<?php echo $postid; ?>"></div>
                        <div class="industries">
                            <div class="key-icon"><a style="" onclick="test<?php echo $counter; ?>();"><img src="<?php the_field('icon'); ?>" onmouseover="over(this, '<?php the_field('icon'); ?>', '<?php the_field('icon_on'); ?>');" onmouseout="over(this, '<?php the_field('icon_on'); ?>', '<?php the_field('icon'); ?>');"/></a></div><br/>
                            <div class="key-content">
                                <h1 style="font-family:'Helvetica W01 Bold';"><?php the_title(); ?></h1>
                                <div id="short<?php echo $postid; ?>"><?php the_field('short_description'); ?></div>
                                <div style='display:none;' id="long<?php echo $postid; ?>"><?php the_field('long_description'); ?></div>
                              <!--  <p id='rm<?php/* echo $postid; ?>' style="margin-top: 0; float: right; width: 80px;"><a style="width: 80px;" class="read-more" style="cursor: pointer;" onclick="test<?php echo $counter; ?>();">Read More ></a></p>
								<p id='rl<?php echo $postid; ?>' style="margin-top: 0; float: right; display:none; width: 80px;"><a style="width: 80px;" class="read-more" style="cursor: pointer;" onclick="test<?php echo $counter; */?>();">Read Less ></a></p>-->
                            </div>
                        </div>
                        <div class="clear-both"></div>
                        <?php $counter++; ?>
                        <?php endwhile; // end of the loop. ?>
						
                    
                </div>
                <div class="clear-both"></div>
                <div class="hr-line"></div>
                <div class="key-bottom-content">
                    
                    <div class="key-bottom-contact">
                        <div class="key-bottom-contact-text22">
							<?php wp_reset_postdata(); while ( have_posts() ) : the_post(); ?> 
								<h3><?php the_field('contact_orange'); ?></h3>
								<p><?php the_field('contact_black'); ?></p>
							<?php endwhile; // end of the loop. ?>
                        </div>
                        <div class="key-bottom-contact-btn">
                            <a href="#contact_form_pop" class="fancybox" target="_blank"  rel="nofollow"><span class="header-contact">CONTACT US NOW</span></a>
                        <div style="display:none;" class="fancybox-hidden">
                        <div id="contact_form_pop" style="width:308px;">
                                <?php echo do_shortcode('[contact-form-7 id="150" title="Contact form 1"]'); ?></div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="clear-both"></div>
                <div class="hr-line"></div>
                
            </div>
                <div class="video2">
                <?php while ( have_posts() ) : the_post(); ?>
                <div class="video-slot1"><a href="<?php the_field('left_url', 30); ?>"><img src="<?php the_field('left_video', 30); ?>" /><br /><p><?php the_field('left_text', 30); ?></p></a></div>
                <div class="video-slot2"><a href="<?php the_field('center_url', 30); ?>"><img src="<?php the_field('center_video', 30); ?>" /><br /><p><?php the_field('center_text', 30); ?></p></a></div>
                <div class="video-slot3"><a href="<?php the_field('right_url', 30); ?>"><img src="<?php the_field('right_video', 30); ?>" /><br /><p><?php the_field('right_text', 30); ?></p></a></div>
                <?php endwhile; // end of the loop. ?>
            </div>
           

<?php get_footer(); ?>