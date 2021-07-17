<?php
/**
 * 	The no intro image template file
 *	Template Name: No intro image
 * 	Template Post Type: post, page, featured
 * 
 * @package Go
 */

get_header();

?>

<main class="site-content-cover" role="main">

	<article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">

		<div class="entry-header">
			
			<div class="entry-header-inner">

				<?php

				if (is_singular()) {
					the_title('<h1 class="entry-header-title site-title">', '</h1>');
				} else {
					the_title('<h2 class="entry-header-title site-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>');
				}
				?>

				<div class="entry-header-date">
					<p><?php echo get_the_date() ; ?></p>
				</div><!-- entry-header-date -->

				<div class="entry-categories">
						<?php the_category(); ?>
				</div><!-- .entry-categories -->

				<div class="single-post-meta">
					<?php 
						// Default to displaying the post meta.
						twentytwenty_the_post_meta(get_the_ID(), 'single-top');
					?>
				</div><!-- single-post-meta -->

			</div><!-- .entry-header-inner -->

		</div><!-- entry-header -->    

		<div class="post-content">

			<?php the_content(); ?>

			<?php

				edit_post_link();
				/* Single bottom post meta */
				twentytwenty_the_post_meta(get_the_ID(), 'single-bottom');

			?>

			<?php if (is_single()) : ?>

				<div class="content-post-navigation">
					<?php  get_template_part('template-parts/navigation'); ?>
				</div>
				<!-- content-post-navigation -->
				
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
