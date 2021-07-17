<?php
/**
 * The entry-header template file
 *
 * @package Go
 */

?>

<div class="entry-header-image">

    <?php if (has_post_thumbnail())  : ?>

        <a href="<?php the_permalink(); ?>">
            <div class="article-image" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url()) ?>')"></div>
        </a>

    <?php else : ?>
    
        <a href="<?php the_permalink(); ?>">
            <div class="article-image" style="background-image: url('<?php echo esc_url(umb_catch_that_image()) ?>');"></div>
        </a>
 
    <?php endif; ?>

</div><!-- .entry-header-image -->

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