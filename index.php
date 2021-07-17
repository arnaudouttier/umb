<?php
/**
 * The index template file
 *
 * @package umb
 */

get_header();

?>

<?php  if(!is_paged()) : ?>

    <?php if( get_theme_mod( 'umb_featured_home_page_setting' ) == 1 && is_home( )) : ?>

        <div class="featured-post">

            <?php 
            
            $args = array(
                'posts_per_page' => 1,
                'meta_key' => 'meta-checkbox',
                'meta_value' => 'yes'
            );

            ?>
        
            <?php $featuredQuery = new WP_Query($args); ?>

            <?php if ( have_posts() ) : while (  $featuredQuery->have_posts() ) :  $featuredQuery->the_post(); ?>
                    
                <?php get_template_part('template-parts/featured', 'image'); ?>

            <?php endwhile; ?>

            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        
        </div><!-- .featured-post -->

    <?php endif; ?>
    
<?php endif; ?>

<!-- Featured Post -->

<?php

$archive_title    = '';
$archive_subtitle = '';

if (is_search()) {
    global $wp_query;

    $archive_title = sprintf(
        '%1$s %2$s',
        '<span class="color-accent">' . __('Search:', 'umb') . '</span>',
        '&ldquo;' . get_search_query() . '&rdquo;'
    );

    if ($wp_query->found_posts) {
        $archive_subtitle = sprintf(
            /* translators: %s: Number of search results */
            _n(
                'We found %s result for your search.',
                'We found %s results for your search.',
                $wp_query->found_posts,
                'umb'
            ),
            number_format_i18n($wp_query->found_posts)
        );
    } else {
        $archive_subtitle = __('We could not find any results for your search. You can give it another try through the search form below.', 'umb');
    }
} elseif (! is_home()) {
    $archive_title    = get_the_archive_title();
    $archive_subtitle = get_the_archive_description();
}

?>

<?php if ($archive_title || $archive_subtitle)  : ?>

    <header class="archive-header has-text-align-center header-footer-group">
        
        <div class="archive-header-inner section-inner medium">

            <?php if ($archive_title) { ?>
            <h2 class="archive-title heading-size-2 color-accent"><?php echo wp_kses_post($archive_title); ?></h2>
            <?php } ?>

            <?php if ($archive_subtitle) { ?>
            <div class="archive-subtitle section-inner thin max-percentage intro-text">
                <?php echo wp_kses_post(wpautop($archive_subtitle)); ?></div>
            <?php } ?>

        </div><!-- .archive-header-inner -->
        
    </header><!-- .archive-header -->

<?php endif ; ?>


<main class="site-content" role="main">

    <div class="grid-container">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            <?php get_template_part('template-parts/content', get_post_type()); ?>

        <?php endwhile; ?>   
        
        <?php endif; ?>
            
    </div><!-- .grid-container -->

    <?php if (is_search()) :?>

        <div class="no-search-results-form thin">

            <?php get_search_form(array( 'label' => __('search again', 'umb'),));?>

        </div><!-- .no-search-results -->

    <?php endif; ?>

    <div class="pagination">
        <?php get_template_part('template-parts/pagination'); ?>
    </div><!-- .pagination -->

</main><!-- .site-content -->

<div class="sidebar-area">
    <?php get_template_part( 'template-parts/sidebars' ); ?>
</div><!-- .sidebar-area -->
        
<?php 
get_footer();
