<?php
/**
 * Directoria Theme Customizer
 *
 * @package Directoria
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function directoria_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'directoria_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'directoria_customize_partial_blogdescription',
		) );
	}

    //display site title or hide it
    $wp_customize->add_setting( 'show_title_tagline', array(
        'sanitize_callback' => 'wp_filter_nohtml_kses' //cleans URL from all invalid characters
    ));

    $wp_customize->add_control('show_title_tagline', array(
            'type' => 'checkbox',
            'label' => __('Display Site Title and Tagline', 'directoria'),
            'section' => 'title_tagline',
            'settings' => 'show_title_tagline',

        )

    );




	/*Add a panel for our theme options*/
    $wp_customize->add_panel( 'directoria_theme_option', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Theme Options', 'directoria'),
        'description'    => __('Customize the settings of the Directoria Theme Here', 'directoria'),
    ) );

    /*FRONT PAGE SECTION*/
    $wp_customize->add_section('directoria_home_page',array(
        'title' => __('Front Page Settings', 'directoria'),
        'priority' => '70',
        'description' => __('You can customize settings for The front/home page here', 'directoria'),
        'panel'         => 'directoria_theme_option',
    ));
    //Breadcrumb Background
    $wp_customize->add_setting( 'directoria_home_bg', array(
        'default' => get_template_directory_uri().'/images/home_page_bg.jpg',
        'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters

    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize,'directoria_home_bg', array(
                'label' => __('Front Page Background', 'directoria'),
                'section' => 'directoria_home_page',
                'settings' => 'directoria_home_bg',
                'description' => __('Select an image for Home Page Background', 'directoria'),
            )
        )
    );




    /*BREADCRUMB SECTION*/

    $wp_customize->add_section('directoria_breadcrumb',array(
        'title' => __('Breadcrumb Settings', 'directoria'),
        'priority' => '70',
        'description' => __('The Directoria Theme uses two types of breadcrumbs. One breadcrumb for regular page and post and Another breadcrumb style for directory listing item\'s details page. You can set the background for both types of breadcrumb below', 'directoria'),
        'panel'         => 'directoria_theme_option',
    ));
    //Breadcrumb Background
    $wp_customize->add_setting( 'directoria_breadcrumb_bg', array(
        'default' => get_template_directory_uri().'/images/breadcrumb.jpg',
        'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters

    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize,'breadcrumb_bg', array(
                'label' => __('General Breadcrumb Background', 'directoria'),
                'section' => 'directoria_breadcrumb',
                'settings' => 'directoria_breadcrumb_bg',
                'description' => __('Select an image for general breadcrumb\'s background', 'directoria'),
            )
        )
    );

    //Breadcrumb Background
    $wp_customize->add_setting( 'directoria_list_breadcrumb_bg', array(
        'default' => get_template_directory_uri().'/images/bcbg.jpg',
        'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters

    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize,'list_breadcrumb_bg', array(
                'label' => __('Listing Breadcrumb', 'directoria'),
                'section' => 'directoria_breadcrumb',
                'settings' => 'directoria_list_breadcrumb_bg',
                'description' => __('Select an image for the breadcrumb\'s background on directory listing page', 'directoria'),

            )
        )
    );



    /*Contact Settings*/
    $wp_customize->add_section('directoria_contact',array(
        'title' => __('Contact Settings', 'directoria'),
        'priority' => '70',
        'description' => __('Customize your contact information here. You can create any page with "<strong>Contact Template</strong>" to see this information on the page. You can also contact form by copying contact form 7 shortcode and pasting it on the page where Page Template is "<strong>Contact Template</strong>".', 'directoria'),
        'panel'         => 'directoria_theme_option',
    ));
    //Contact Address
    $wp_customize->add_setting( 'directoria_address', array(
        'sanitize_callback' => 'wp_filter_nohtml_kses' //cleans URL from all invalid characters
    ));

    $wp_customize->add_control('directoria_address', array(
                'type' => 'text',
                'label' => __('Your Address', 'directoria'),
                'section' => 'directoria_contact',
                'settings' => 'directoria_address',
                'description' => __('Enter your contact address. Eg. Abc Business Center, 123 Road, London, England', 'directoria'),
            'input_attrs'     => array(
                'placeholder' => __('Eg. 123 Road, London.', 'directoria'),
            ),
            )

    );

    //Phone Number
    $wp_customize->add_setting( 'directoria_phone', array(
        'sanitize_callback' => 'wp_filter_nohtml_kses' //cleans URL from all invalid characters
    ));

    $wp_customize->add_control('directoria_phone', array(
            'type' => 'text',
            'label' => __('Your Phone Number', 'directoria'),
            'section' => 'directoria_contact',
            'settings' => 'directoria_phone',
            'description' => __('Enter your phone number. Eg. +44 000 111 222', 'directoria'),
            'input_attrs'     => array(
                'placeholder' => __('Eg. +44 000 111 222', 'directoria'),
            ),
        )

    );

    //Phone Number
    $wp_customize->add_setting( 'directoria_email', array(
        'sanitize_callback' => 'sanitize_email' //cleans URL from all invalid characters
    ));

    $wp_customize->add_control('directoria_email', array(
            'type' => 'text',
            'label' => __('Your Email', 'directoria'),
            'section' => 'directoria_contact',
            'settings' => 'directoria_email',
            'description' => __('Enter your email address. Eg. johndoe@website.com', 'directoria'),
            'input_attrs'     => array(
                'placeholder' => __('Eg. johndoe@website.com', 'directoria'),
            ),
        )

    );




}
add_action( 'customize_register', 'directoria_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function directoria_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function directoria_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function directoria_customize_preview_js() {
	wp_enqueue_script( 'directoria-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'directoria_customize_preview_js' );
