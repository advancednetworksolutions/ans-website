<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<style>
    .site-content{
        width: 90%;
        text-align: left;
        padding-left: 50px;
    }
	.breadcrumbs{
		padding-top: 40px;
	}
</style>
	<div class="breadcrumbs">
		<?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
	</div>
	<div id="primary" class="site-content">
		<div id="content" role="main">
				<?php 
						$bios = get_post_type();
				?>
			<?php while ( have_posts() ) : the_post(); ?>
				
				<?php if($bios == 'bio'):?>
				<h1><?php the_title(); ?></h1>
				 <?php the_field('bloggers_information'); ?>
				
				<?php endif; ?>
				<?php if($bios != 'bio'){
				 get_template_part( 'content', get_post_format() ); 
				}?>
				<nav class="nav-single">
					<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
					<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'twentytwelve' ) . '</span> %title' ); ?></span>
					<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'twentytwelve' ) . '</span>' ); ?></span>
				</nav><!-- .nav-single -->

				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>