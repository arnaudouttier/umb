<?php
/**
 * The customizer file for the theme
 *
 * @package umb
 */

/*
    remove/add control from customize admin page
*/
function umb_customize_register($wp_customize)
{


    /*  REMOVE DEFAULT SECTION CONTROL */
    $wp_customize->remove_section('cover_template_options');    
    $wp_customize->remove_section('background_image');    
    $wp_customize->remove_section('options');    
    $wp_customize->remove_control('header_footer_background_color');      
    $wp_customize->remove_control('background_color');      
    $wp_customize->remove_control('accent_hue_active');    
    

     /* Page Width */
    $wp_customize->add_setting('umb_main_width_setting', array(
        'default' => '992px',
        'transport'    => 'refresh',
         'sanitize_callback' => 'umb_sanitize_select_width'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'umb_main_width_control', array(
        'label'     =>  __('Page width', 'umb'),
        'section'   =>  'static_front_page',
        'settings'  =>  'umb_main_width_setting',
        'type'      =>  'select',
        'choices'  => array(
            '100%' => esc_html__( 'Full width', 'umb'),
            '1200px' => esc_html__('1200px', 'umb'),
            '992px' => esc_html__('992px', 'umb'), 
            '768px' => esc_html__('768px', 'umb')
         ),
    )));

    /* Homepage Layout */
    $wp_customize->add_setting('umb_home_layout_setting', array(
        'default' => '1fr',
         'transport'    => 'refresh',
         'sanitize_callback' => 'umb_sanitize_select_layout'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'umb_home_layout_control', array(
        'label'     =>  __('Layout', 'umb'),
        'section'   =>  'static_front_page',
        'settings'  =>  'umb_home_layout_setting',
        'type'      =>  'select',
        'choices'  => array(
            '1fr' => esc_html__('1 column', 'umb'),
            '1fr 1fr' => esc_html__('2 columns', 'umb'),
            '1fr 1fr 1fr' => esc_html__('3 columns', 'umb'),
        ),
    ))); 

    /* Homepage Display Featured Post */
    $wp_customize->add_setting('umb_featured_home_page_setting', array(
        'default'   =>  0,
        'sanitize_callback' => 'umb_sanitize_checkbox'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'umb_featured_home_page_control', array(
        'label'     =>  __('Display featured post', 'umb'),
        'section'   =>  'static_front_page',
        'settings'  =>  'umb_featured_home_page_setting',
        'type'      =>  'checkbox'
    )));

     /* Homepage featured post width */
    $wp_customize->add_setting('umb_featured_width_setting', array(
        'default' => '992px',
        'transport'    => 'refresh',
         'sanitize_callback' => 'umb_sanitize_select_width'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'umb_featured_width_control', array(
        'label'     =>  __('Featured post width', 'umb'),
        'section'   =>  'static_front_page',
        'settings'  =>  'umb_featured_width_setting',
        'type'      =>  'select',
        'choices'  => array(
            '100%' => esc_html__( 'Full width', 'umb'),
            '1200px' => esc_html__('1200px', 'umb'),
            '992px' => esc_html__('992px', 'umb'), 
            '768px' => esc_html__('768px', 'umb')
         ),
    ))); 

    /*  Article image height */
    $wp_customize->add_setting('umb_article_image_height_setting', array(
        'default' => '300px',
        'transport'    => 'refresh',
        'sanitize_callback' => 'umb_sanitize_select_imagewidth' 
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'umb_article_image_height_control', array(
        'label'     =>  __('Article image height', 'umb'),
        'section'   =>  'static_front_page',
        'settings'  =>  'umb_article_image_height_setting',
        'type'      =>  'select',
        'choices'  => array(
            '400px' => esc_html__( '400px', 'umb'),
            '300px' => esc_html__('300px', 'umb'),
            '250px' => esc_html__('250px', 'umb'), 
            '200px' => esc_html__('200px', 'umb')
         ),
        )
    )); 

     /* SINGLE SECTION */

     $wp_customize->add_section('single', array(
        'title'     => __('Single Post', 'umb'),
        'priority'  => 30,
    ));

    /* Single Post Post-content Width */
    $wp_customize->add_setting('umb_single_post_width_setting', array(
        'default' => '772px',
        'transport'    => 'refresh',
         'sanitize_callback' => 'umb_sanitize_select_width'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'umb_single_post_width_control', array(
        'label'     =>  __('Single Post Content width', 'umb'),
        'section'   =>  'single',
        'settings'  =>  'umb_single_post_width_setting',
        'type'      =>  'select',
        'choices'  => array(
            '1200px' => esc_html__('1200px', 'umb'),
            '992px' => esc_html__('992px', 'umb'), 
            '768px' => esc_html__('768px', 'umb')
         ),
    )));

    /*  COLOR SECTION */

    /* Main Color Section */
    $wp_customize->add_section('colors', array(
        'title'     => __('Colors', 'umb'),
        'priority'  => 30,
    ));

    /* Primary Color */
    $wp_customize->add_setting( 'umb_main_color_setting',
    array(
        'default' => 'hsl(210, 51%, 15%)',
        'transport' => 'refresh',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
    )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'umb_main_color_control',
            array(
                'label'   => __( 'Primary color', 'umb' ),
                'section' => 'colors',
                'settings' => 'umb_main_color_setting',
                'capability' => 'edit_theme_options'
            )
        )
    ); 

    /* HEADER SECTION */

    /* Header section */
    $wp_customize->add_section('umb_header', array(
        'title'     => __('Header', 'umb'),
        'priority'  => 30,
    ));

    /* Full width Header */
    $wp_customize->add_setting('umb_header_width_setting', array(
        'default'   => 0,
        'sanitize_callback' => 'umb_sanitize_checkbox'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'umb_header_width_control', array(
        'label'     =>  __(' Full width header ', 'umb'),
        'section'   =>  'umb_header',
        'settings'  =>  'umb_header_width_setting',
        'type'      =>  'checkbox'
    ))); 

     /*  FOOTER COPYRIGHT AREA */ 

	$wp_customize->add_section('umb_footer_section', array(
        'title'     => __('Footer Copyright area', 'umb'),
        'priority'  => 120,
    ));

	$wp_customize->add_setting( 'footer_display_title_and_tagline_setting' , array(
        'default'   => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'umb_sanitize_checkbox'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'umb_display_footer_info_control', array(
        'label'    => __( 'Display copyright area', 'umb' ),
        'section'  => 'umb_footer_section',
        'settings' => 'footer_display_title_and_tagline_setting',
        'type'        => 'checkbox',
    ) ) );


     $wp_customize->add_setting( 'umb_site_info_footer_setting' , array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'umb_site_info_footer_control', array(
        'label'    => __( 'Footer copyright text', 'umb' ),
        'section'  => 'umb_footer_section',
        'settings' => 'umb_site_info_footer_setting',
        'type' => 'text'
    ) ) );
}


/* SANITIZATION */


 /* Checkbox sanitization function */
function umb_sanitize_checkbox($input)
{
    return (1 === absint($input)) ? 1 : 0;
}

/* Layout sanitization function */
function umb_sanitize_select_layout($value)
{
    if (! in_array($value, array( '1fr', '1fr 1fr', '1fr 1fr 1fr' ))) {
    $value = '1fr';
    }
    return $value;
}

/* Page Width sanitization function */
function umb_sanitize_select_width($value)
{
    if (! in_array($value, array( '768px', '992px', '1200px', '100%' ))) {
    $value = '1200px';
    } 
    return $value;
}

/* Image height sanitization function */
function umb_sanitize_select_imagewidth($value)
{
    if (! in_array($value, array( '200px', '250px', '300px', '400px' ))) {
    $value = '300px';
    }
    return $value;
}