<?php
/**
 * The customize css file ( Theme mod )
 *
 * @package umb
 */

function umb_customize_css()
{

?>

    <style type="text/css">

    /* featured-home-page Width */
    .featured-post {
        max-width: <?php echo esc_attr(get_theme_mod('umb_featured_width_setting' , '992px'));?>;
    }

    /* Main width */
    .site-content, .sidebar-area {
        max-width: <?php echo esc_attr(get_theme_mod('umb_main_width_setting' , '992px'));?> !important;
        margin: auto;
    }

    /* Single Post-content Width */
    .post-content, .post-footer{
        max-width: <?php echo esc_attr(get_theme_mod('umb_single_post_width_setting' , '768px'));?> !important;
        margin: auto;
    }

    /* Primary Color */
    .footer-menu a,
    #site-footer .wp-block-button.is-style-outline,
    .wp-block-pullquote::before,
    .singular:not(.overlay-header) .entry-header a,
    .archive-header a,
    .header-footer-group .color-accent-hover:hover,
    .color-accent-hover:hover,
    .color-accent-hover:focus,
    :root .has-accent-color,
    .has-drop-cap:not(:focus)::first-letter,
    .wp-block-button.is-style-outline,
    .entry-categories-inner a,
    .entry-categories a,
    .next-post,
    .previous-post,
    .umb-related-post-title a,
    .to-the-top a,
    .post-meta .meta-icon,
    .umb-related-post-title,
    .pagination .nav-links a,
    .entry-content-continue a,
    .entry-content-continue span {
        color: <?php echo esc_attr(get_theme_mod('umb_main_color_setting','hsl(210, 51%, 15%)'));?>!important;
    }

    input[type="submit"],
    .footer-widgets .social-icons a,
    .comment-reply-link {
        background-color: <?php echo esc_attr(get_theme_mod('umb_main_color_setting', 'hsl(210, 51%, 15%)'));?>!important;
    }

    blockquote {
        border-color: <?php echo esc_attr(get_theme_mod('umb_main_color_setting',  'hsl(210, 51%, 15%)'));?>!important;
    }

    @media (min-width:768px) {

        /* Article Image Height*/
        article .article-image {
            height: <?php echo esc_attr(get_theme_mod('umb_article_image_height_setting' , '300px'));?>;
        }
    }

    
    @media (min-width: 992px) {

        /* Grid container */
        .grid-container {
            display: grid;
            grid-template-columns: <?php echo esc_attr(get_theme_mod('umb_home_layout_setting' , '1fr'));?>;
        }
    }
    </style>

    <!-- Header Width -->
    <?php if ( get_theme_mod('umb_header_width_setting')  == 1  ) : ?>

        <style type="text/css">
        @media (min-width: 992px) {
            .header-inner {
                max-width: 100%;
                margin: 0 25px;
            }

            .header-titles-wrapper,
            .header-titles {
                margin: 0;
            }
        }
        </style>

    <?php endif ; ?>

<?php  } ?>