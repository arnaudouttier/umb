<?php
/**
 * The content template file
 *
 * @package Go
 */

?>

<article <?php post_class('article'); ?> id="post-<?php the_ID(); ?>">

    <div class="entry-header">
        
        <?php get_template_part('template-parts/entry-header');?>

    </div><!-- entry-header -->

    <div class="post-content">

        <?php  if(is_home() || is_search() || is_archive()) : ?>

            <?php  the_excerpt(); ?>
    
            <div class="post-content-continue">
                
                <a href="<?php the_permalink(); ?>">
                    <?php esc_html_e('Continue reading', 'umb') ?>
                </a>
                <span>&rarr;</span>

            </div><!-- post-content-continue -->

        <?php else : ?>

            <?php the_content(); ?>

        <?php endif; ?>

        <div class="pagination section-inner">
            <?php
            wp_link_pages(
                    array(
                    'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__('Page', 'umb') . '"><span class="label">' . __('Pages:', 'umb') . '</span>',
                    'after'       => '</nav>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                )
                );
        
            edit_post_link();

            ?>

        </div><!-- .pagination section-inner -->

        <?php if (is_single()) : ?>

            <div class="single-pagination">
                <?php  get_template_part('template-parts/single-pagination'); ?>
            </div>
            <!-- content-post-navigation -->

        <?php endif; ?>

    </div><!-- .post-content -->

    <div class="post-footer">

        <?php if (is_single() || is_page()):?>

            <?php get_template_part('template-parts/related-post'); ?>

            <div class="comments-wrapper section-inner">

                <?php comments_template(); ?>

            </div><!-- .comments-wrapper -->

        <?php endif;?>

    </div><!-- .post-footer -->

</article><!-- .article -->