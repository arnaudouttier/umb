<?php
/**
 * The single post template file
 *
 * @package umb
 */

get_header();

?>

<main class="site-content" role="main">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
        <?php get_template_part('template-parts/content', get_post_type()); ?>

    <?php endwhile; ?>            
            
    <?php endif; ?>

</main><!-- .site-content -->

<div class="sidebar-area">
	<?php get_template_part( 'template-parts/sidebars' ); ?>
</div><!-- .sidebar-area -->

<?php get_footer();?>
