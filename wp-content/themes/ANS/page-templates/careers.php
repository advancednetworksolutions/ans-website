<?php
/**
 * Template Name: Careers page
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
margin-top: 20px;
margin-bottom: 20px;
}
.header-contact {
margin-right: 0px;
}
.key-bottom-contact-btn {
width: 125px;
}
.header-nav {
margin-right: 35px;
}
.company-contact-text h3 {
	margin-top: 0;
}
.content-project-right ul{
    margin-left:20px;
}
.content-project-right li{
	padding-bottom:5px;
}
.content-project-right p{
	padding-bottom:10px;
}    
.bio-content h1 a{
    cursor:pointer;
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
			<img src="<?php echo get_template_directory_uri(); ?>/images/company-image.jpg" alt="Advanced Network Solutions" />
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
                  <?php wp_nav_menu (array( 'theme_location' => 'third', 'container' => false, 'menu_class' => 'none', 'menu_id' => 'none', 'submenu' => 'scott2' )); ?>
                    
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

                                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Read More About: %s', 'twentytwelve' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><span class="read-more" style="float: right; padding-right: 10px; text-transform:capitalize; width: 75px;">Read More ></span></a><br /><br />
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
                    
                <div class="clear-both"></div>
				
				<?php  
                        wp_reset_postdata();
						$args = array(
							'post_status' => 'publish',
							'post_type' => 'career',
							'meta_key' => 'careers_order_number',
							'orderby' => 'meta_value_num',
							'order' => 'ASC'
						);
                        $post_type = new WP_Query($args); ?>
						<?php
							$count_posts = wp_count_posts('career')->publish;
							$keep = 0;
                            $bioPost =0;
							?>
						<?php if($count_posts != 0): ?>
							<?php while ( $post_type->have_posts() ) : $post_type->the_post(); ?>
								<?php $postid = get_the_ID(); ?>
								<div class="industries">
									<script>
                                        function conShow<?php echo $postid; ?>(){
                                            $( ".bio-text<?php echo $postid; ?>" ).toggle();
                                        }
                                    </script>
									<div class="bio-content">
										<h1><a onclick="conShow<?php echo $postid; ?>();"><?php the_title(); ?></a></h1>
										<div style="display:none;" class="bio-text<?php echo $postid; ?>"><?php the_field('career_description'); ?></div>
									</div>
								</div>
								<div class="clear-both"></div>
								<?php $keep++; 
									if($keep != $count_posts):?>
									<div class="content-project-right-divider"></div>
									<?php endif; ?>  
							
							<?php endwhile; // end of the loop. ?>
						<?php endif; ?>
						<?php if($count_posts == 0): ?>
							<p><i>There are no positions open at this time. Please check back again soon to see our latest openings.</i></p>
						<?php endif; ?>
						
                <div class="content-project-right-divider"></div>
                <div class="key-bottom-content">
                    
                    <div class="key-bottom-contact">
                        <div class="company-contact-text">
                            <?php wp_reset_postdata(); ?>
							<?php while ( have_posts() ) : the_post(); ?>
                            <h3><?php the_field('contact_orange_small', 28); ?></h3>
                            <p><?php the_field('contact_black_small', 28); ?></p>
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
               
            </div>
        </div>

<?php get_footer(); ?>