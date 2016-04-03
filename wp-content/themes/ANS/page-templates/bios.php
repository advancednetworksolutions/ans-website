<?php
/**
 * Template Name: Bios Page
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
.wrapper{ margin-top: 50px; }
</style>
                    
                    <?php  
                        wp_reset_postdata();
                        $bios = new WP_Query(array('post_type' => 'bio'));
                    ?>
			<?php while ( $bios->have_posts() ) : $bios->the_post(); ?>
                        
                        <div class="bio-pic"><img src="<?php the_field('bio_picture'); ?>" width="221" /></div>
						<h1><?php the_title(); ?></h1>
                        <?php the_field('bloggers_information'); ?>
			<?php endwhile; // end of the loop. ?>


<?php get_footer(); ?>