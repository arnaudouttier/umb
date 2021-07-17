<?php
/**
 * The featured post template file
 *
 * @package umb
 */

?>

<article <?php post_class('featured'); ?> id="post-<?php the_ID(); ?>">

    <div class="entry-header">
   
        <?php get_template_part('template-parts/entry-header');?>

    </div><!-- entry-header -->
    
</article>