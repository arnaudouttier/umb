<?php
/**
 * 	The cover template file
 *	Template Name: Cover Template
 * 	Template Post Type: post, page, featured
 * 
 * @package Go
 */

get_header();

?>

<main class="site-content-cover" role="main">

	<article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">

		<div class="entry-header">
			
			<?php get_template_part('template-parts/entry-header');?>

		</div><!-- entry-header -->    


		<div class="post-content">

			<?php the_content(); ?>

			<?php

				edit_post_link();
				/* Single bottom post meta. */
				twentytwenty_the_post_meta(get_the_ID(), 'single-bottom');

			?>

			<?php if (is_single()) : ?>

				<div class="content-post-navigation">
					<?php  get_template_part('template-parts/navigation'); ?>
				</div><!-- content-post-navigation -->
				
			<?php endif; ?>

		</div><!-- .post-content -->
		
		<div class="post-footer">
			
			<?php get_template_part('template-parts/related-post'); ?>
			<!-- Related posts -->
		
			<div class="comments-wrapper section-inner">
		
				<?php comments_template(); ?>
		
			</div><!-- .comments-wrapper -->
		
		</div><!-- .post-footer -->

	</article><!-- .article -->

</main><!-- #site-content -->

<div class="sidebar-area">
	<?php get_template_part( 'template-parts/sidebars' ); ?>
</div><!-- .sidebar-area -->


<?php get_footer(); ?>
