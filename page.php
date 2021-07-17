<?php
/**
 * The page template file
 *
 * @package umb
 */

get_header();

?>

<main class="site-content" role="main">

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
		
		<?php the_content(); ?>

	<?php endwhile; endif; ?>

</main><!-- #site-content -->

<div class="sidebar-area">
    <?php get_template_part( 'template-parts/sidebars' ); ?>
</div><!-- .sidebar-area -->

<?php get_footer();?>
