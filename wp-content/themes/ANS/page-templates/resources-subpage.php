<?php
/**
 * Template Name: Resources Subpage
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

	
			<?php 
		while ( have_posts() ) : the_post();
			$test = get_field('page_title');
			$test2 = get_field('page_background_image');
		endwhile;
		if ($test == null && $test2 == null) :
		?>
		<div class="slideshow">
			<img src="<?php echo get_template_directory_uri(); ?>/images/blog-image.jpg" alt="Advanced Network Solutions" />
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
                  <?php wp_nav_menu (array( 'theme_location' => 'forth', 'container' => false, 'menu_class' => 'none', 'menu_id' => 'none', 'submenu' => 'scott2' )); ?>
                    
                   
                    
						
                        
                      
                    </div>
                    
                <div class="content-project-right">
                    <?php wp_reset_postdata(); ?>
							<?php while ( have_posts() ) : the_post(); ?>
								<h1><?php the_title(); ?></h1>
							<?php endwhile; // end of the loop. ?>
                    <div class="content-right-resources-blog">
                        
                        
                        <?php 
                        $count = 0;
                        $cat_id = 2; //the certain category ID
                        $latest_cat_post = new WP_Query( array('posts_per_page' => 2, 'category__in' => array($cat_id)));
                        if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
                            <div class="resources-blog-pic-float">
								<p><?php the_date(); ?></p>
								<div class="resources-blog-pic">
									<img src="<?php echo get_template_directory_uri(); ?>/images/blogger.png" />
								</div>
								<p style="color:#424243;"><?php the_author(); ?></p>
							</div>
							<div class="resources-blog-content">
                                <?php the_post_thumbnail(); ?>
                                <?php if ( is_single() ) : ?>
                                <h1><?php the_title(); ?></h1>
                                <?php else : ?>

                                <h1><?php the_title(); ?></h1>

                                <?php endif; // is_single() ?>

                                <?php if ( is_search() ) : // Only display Excerpts for Search ?>

                                <?php else : ?>
                                <?php if($count == 0): ?>
                                    <?php 
                                        $content = get_the_content(); 
                                        $result = substr($content, 0, 800);
                                        echo $result . "...";
                                    ?>
                                <?php endif; ?>
                                <?php if($count > 0): ?>
                                    <?php 
                                        $content = get_the_content(); 
                                        $result = substr($content, 0, 400);
                                        echo $result . "...";
                                    ?>
                                <?php endif; ?>
								<br />
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="Facebook" onmouseover="over(this, 'facebook.png', 'facebook-on.png');" onmouseout="over(this, 'facebook-on.png', 'facebook.png');" style="margin-top:5px;" /></a>
								
								<a href="https://twitter.com/home?status=<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="Twitter" onmouseover="over(this, 'twitter.png', 'twitter-on.png');" onmouseout="over(this, 'twitter-on.png', 'twitter.png');" style="margin-top:5px;" /></a>
								
                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Read More About: %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span class="read-more" style="float: right; text-transform:capitalize; width: 75px;">Read More ></span></a><br /><br />
								</div><div class="clear-both"></div>
                            <?php endif; ?>
                            <?php if($count == 0): ?>
                                <div class="content-project-right-divider"></div>
                            <?php endif; ?>
                        <?php $count++; endwhile; endif; ?>
                            
                        </div>  
                    
                <div class="clear-both"></div>
                
                
                <div class="clear-both"></div>
               
            </div>
        </div>

<?php get_footer(); ?>