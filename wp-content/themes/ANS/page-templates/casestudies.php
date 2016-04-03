<?php
/**
 * Template Name: Case Studies Page
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
.content-project-right-divider:last-child{
	display:none;
}
</style>
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

                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Read More About: %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span class="read-more" style=" float: right; padding-right: 10px; text-transform:capitalize; width: 75px;">Read More ></span></a><br /><br />
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
                    <h1 style="font-weight:normal;">CASE STUDIES</h1>
                    <div class="content-right-resources-blog">
                        
                        
                        <?php 
                        $count = 0;
                        $cat_id = 12; //the certain category ID
                        $latest_cat_post = new WP_Query( array('posts_per_page' => 5, 'category__in' => array($cat_id)));
                        if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
                            <div class="resources-blog-pic-float">
								<p><?php the_date(); ?></p>
								<div class="resources-blog-pic">
								
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
								<p style="color:#424243;"><?php the_author(); ?></p>
							</div>
							<div class="resources-blog-content">
                                <?php the_post_thumbnail(); ?>
                                <?php if ( is_single() ) : ?>
                                <a style="color:#424243" href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>
                                <?php else : ?>

                                <a style="color:#424243" href="<?php the_permalink(); ?>"><h1><?php the_title(); ?></h1></a>

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

                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Read More About: %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><br /><span class="read-more" style="float: right; width: 75px;">Read More ></span></a><br /><br />
								</div><div class="clear-both"></div>
                            <?php endif; ?>
                            
                                <div class="content-project-right-divider"></div>
                            
                        <?php $count++; endwhile; endif; ?>
                            
                        </div>  
                    
                <div class="clear-both"></div>
                
                
                <div class="clear-both"></div>
               
            </div>
        </div>

<?php get_footer(); ?>