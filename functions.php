<?php
/**
 * umb functions and definitions
 *
 * @package umb
 */

function umb_theme_info()
{
    return array(
        'name'    => 'umb',
        'slug'    => 'umb',
    );
}

/* Core Constants. */
define('UMB_THEME_FILE_PATH', get_theme_file_path());

/* Include Paths. */
define('UMB_INC_FILZ_PATH', UMB_THEME_FILE_PATH . '/inc/');


class Umb_theme_setup
{

    /* Register action/filter callbacks */
    public function __construct()
    {

        /* Paths */
        $this->template_dir = get_template_directory();
        $this->template_dir_uri = get_template_directory_uri();
        $this->theme_file_path = get_theme_file_path();

        /* Load required files. */
        $this->umb_has_setup();

        add_action('after_setup_theme', array($this, 'umb_theme_setup'));

        /* Load theme CSS */
        add_action('wp_enqueue_scripts', array($this, 'umb_theme_css'));

        /* Widget init */
        add_action( 'widgets_init', array($this, 'umb_widgets_init'));

        /* Customize Panel Options */
        add_action('customize_register', 'umb_customize_register', 30);

        /* Customize Css */
        add_action('wp_head', 'umb_customize_css');

        /* Excerpt More */
        add_filter('excerpt_more', array($this, 'umb_excerpt_more'));

        /* Post Meta */
        add_filter('twentytwenty_post_meta_location_single_top', array($this, 'wps_display_custom_tags'));
    }

    /**
     * Load all core theme function files
     */
    public static function umb_has_setup()
    {

        $dir = UMB_INC_FILZ_PATH;

        require_once $dir . 'umb-custom-css.php';
        require_once $dir . 'umb-customize.php';
        require_once $dir . 'umb-featured-post.php';
    }

   
    /**
     * Languages
     */
    function umb_theme_setup()
    {

        load_child_theme_textdomain('umb', get_stylesheet_directory() . '/languages');

        add_theme_support( 'title-tag' );

        add_theme_support( 'automatic-feed-links' );
    }

    function umb_theme_css(){

        /* Main CSS */
        $parenthandle = 'parent-style';
        $theme = wp_get_theme();
        wp_enqueue_style($parenthandle, get_template_directory_uri() . '/style.css', array(), $theme->parent()->get('Version'));

        /* Normalize Css */
        wp_enqueue_style('normalize', get_theme_file_uri() . '/assets/css/normalize.css');

        /* Hover rotate scale animation css */
        wp_enqueue_style('hrs', get_theme_file_uri() . '/assets/css/hover-rotate-scale.css');

        /* Raleway font */
        wp_enqueue_style('raleway-font', 'https://fonts.googleapis.com/css2?family=Raleway&display=swap');

        /* Playfair font */
        wp_enqueue_style('playfaire-font', 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap');
    }

    /**
     * Add sidebars.
     */
    function umb_widgets_init() {
        register_sidebar( array(
            'name'          => __( 'sidebar-1', 'umb' ),
            'id'            => 'sidebar-1'
        ) );

        register_sidebar( array(
            'name'          => __( 'sidebar-2', 'umb' ),
            'id'            => 'sidebar-2'
        ) );
    }

  
    /*  Filter the excerpt "read more" string. */
    function umb_excerpt_more()
    {
        return '...';
    }

    function wps_display_custom_tags($post_meta)
    {
        /* delete meta tags you do not want to display */
        return array('author', 'comments');
    }
    
}
$umb_theme_setup = new Umb_theme_setup;

/* catch first image*/
function umb_catch_that_image()
{
    global $post, $posts;
    $first_img = ' ';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/< *img[^>]*src *= *["\']?([^"\']*)/i', $post->post_content, $matches);
    $first_img = isset($matches[1][0]) ? $matches[1][0] : null;

    if (empty($first_img)) {
        $first_img = get_stylesheet_directory_uri() . '/assets/images/victor-grabarczyk-cwcKxz3RQMc-unsplash.jpg';
    }
    return $first_img;
}



