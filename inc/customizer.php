<?php
/**
 * Two Rivers Theme Customizer.
 *
 * @package Two_Rivers
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tworivers_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	/* General Settings */
    $wp_customize->add_section(
        'general_settings',
        array(
            'title' => __( 'General Settings', 'tworivers' ),
            'description' => __( 'Some common settings for the entire site', 'tworivers' ),
            'priority' => 30,
        )
    );
    
    // logo
    $wp_customize->add_setting(
        'tworivers_logo', array (
            'sanitize_callback' => 'esc_url_raw'
        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tworivers_logo',
            array(
                'label' => __( 'Upload Logo', 'tworivers' ),
                'section' => 'general_settings',
                'settings' => 'tworivers_logo'
            )
        )
    );
}
add_action( 'customize_register', 'tworivers_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tworivers_customize_preview_js() {
	wp_enqueue_script( 'tworivers_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tworivers_customize_preview_js' );
