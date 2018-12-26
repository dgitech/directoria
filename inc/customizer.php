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
function directoria_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'directoria_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'directoria_customize_partial_blogdescription',
        ));
    }

    //display site title or hide it
    $wp_customize->add_setting('show_title_tagline', array(
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
    $wp_customize->add_panel('directoria_theme_option', array(
        'priority' => 10,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Theme Options', 'directoria'),
        'description' => __('Customize the settings of the Directoria Theme Here', 'directoria'),
    ));

    /*FRONT PAGE SECTION*/
    $wp_customize->add_section('directoria_home_page', array(
        'title' => __('Front Page Settings', 'directoria'),
        'priority' => '70',
        'description' => __('You can customize settings for The front/home page here', 'directoria'),
        'panel' => 'directoria_theme_option',
    ));
    //Breadcrumb Background
    $wp_customize->add_setting('directoria_home_bg', array(
        'default' => get_template_directory_uri() . '/images/home_page_bg.jpg',
        'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters

    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'directoria_home_bg', array(
                'label' => __('Front Page Background', 'directoria'),
                'section' => 'directoria_home_page',
                'settings' => 'directoria_home_bg',
                'description' => __('Select an image for Home Page Background', 'directoria'),
            )
        )
    );


    /*BREADCRUMB SECTION*/

    $wp_customize->add_section('directoria_breadcrumb', array(
        'title' => __('Breadcrumb Settings', 'directoria'),
        'priority' => '70',
        'description' => __('The Directoria Theme uses two types of breadcrumbs. One breadcrumb for regular page and post and Another breadcrumb style for directory listing item\'s details page. You can set the background for both types of breadcrumb below', 'directoria'),
        'panel' => 'directoria_theme_option',
    ));
    //Breadcrumb Background
    $wp_customize->add_setting('directoria_breadcrumb_bg', array(
        'default' => get_template_directory_uri() . '/images/breadcrumb.jpg',
        'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters

    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'breadcrumb_bg', array(
                'label' => __('General Breadcrumb Background', 'directoria'),
                'section' => 'directoria_breadcrumb',
                'settings' => 'directoria_breadcrumb_bg',
                'description' => __('Select an image for general breadcrumb\'s background', 'directoria'),
            )
        )
    );

    //Breadcrumb Background
    $wp_customize->add_setting('directoria_list_breadcrumb_bg', array(
        'default' => get_template_directory_uri() . '/images/bcbg.jpg',
        'sanitize_callback' => 'esc_url_raw' //cleans URL from all invalid characters

    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'list_breadcrumb_bg', array(
                'label' => __('Listing Breadcrumb', 'directoria'),
                'section' => 'directoria_breadcrumb',
                'settings' => 'directoria_list_breadcrumb_bg',
                'description' => __('Select an image for the breadcrumb\'s background on directory listing page', 'directoria'),

            )
        )
    );


    /*Contact Settings*/
    $wp_customize->add_section('directoria_contact', array(
        'title' => __('Contact Settings', 'directoria'),
        'priority' => '70',
        'description' => __('Customize your contact information here. You can create any page with "<strong>Contact Template</strong>" to see this information on the page. You can also contact form by copying contact form 7 shortcode and pasting it on the page where Page Template is "<strong>Contact Template</strong>".', 'directoria'),
        'panel' => 'directoria_theme_option',
    ));
    //Contact Address
    $wp_customize->add_setting('directoria_address', array(
        'sanitize_callback' => 'wp_filter_nohtml_kses' //cleans URL from all invalid characters
    ));

    $wp_customize->add_control('directoria_address', array(
            'type' => 'text',
            'label' => __('Your Address', 'directoria'),
            'section' => 'directoria_contact',
            'settings' => 'directoria_address',
            'description' => __('Enter your contact address. Eg. Abc Business Center, 123 Road, London, England', 'directoria'),
            'input_attrs' => array(
                'placeholder' => __('Eg. 123 Road, London.', 'directoria'),
            ),
        )

    );

    //Phone Number
    $wp_customize->add_setting('directoria_phone', array(
        'sanitize_callback' => 'wp_filter_nohtml_kses' //cleans URL from all invalid characters
    ));

    $wp_customize->add_control('directoria_phone', array(
            'type' => 'text',
            'label' => __('Your Phone Number', 'directoria'),
            'section' => 'directoria_contact',
            'settings' => 'directoria_phone',
            'description' => __('Enter your phone number. Eg. +44 000 111 222', 'directoria'),
            'input_attrs' => array(
                'placeholder' => __('Eg. +44 000 111 222', 'directoria'),
            ),
        )

    );

    //Phone Number
    $wp_customize->add_setting('directoria_email', array(
        'sanitize_callback' => 'sanitize_email' //cleans URL from all invalid characters
    ));

    $wp_customize->add_control('directoria_email', array(
            'type' => 'text',
            'label' => __('Your Email', 'directoria'),
            'section' => 'directoria_contact',
            'settings' => 'directoria_email',
            'description' => __('Enter your email address. Eg. johndoe@website.com', 'directoria'),
            'input_attrs' => array(
                'placeholder' => __('Eg. johndoe@website.com', 'directoria'),
            ),
        )
    );


    /*Footer Credit SECTION*/
    $wp_customize->add_section('directoria_footer_credit_sec', array(
        'title' => __('Footer Settings', 'directoria'),
        'priority' => '70',
        'description' => __('You can customize content of your footer eg. footer credit etc here', 'directoria'),
        'panel' => 'directoria_theme_option',
    ));
    //Footer Credit Settings
    $wp_customize->add_setting('directoria_footer_credit', array(
        'default' => sprintf(__('&copy; %s All rights reserved', 'directoria'), date('Y')),
        'sanitize_callback' => 'wp_kses_post' //cleans URL from all invalid characters
    ));
    //Footer Credit control or text field
    $wp_customize->add_control('directoria_footer_credit', array(
            'type' => 'text',
            'label' => __('Footer Credit', 'directoria'),
            'section' => 'directoria_footer_credit_sec',
            'settings' => 'directoria_footer_credit',
            'description' => sprintf(__('Enter credit text for your footer. Eg. &copy; %s All rights reserved. etc', 'directoria'), date('Y')),
            'input_attrs' => array(
                'placeholder' => sprintf(__('Eg. &copy; %s All rights reserved', 'directoria'), date('Y')),
            ),
        )
    );

    // Footer Text Color
    $wp_customize->add_setting('footer_text_color', array(
        'default' => '#cccccc'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_color_text', array(
        'label' => __('Footer Text Color', 'bizillion'),
        'section' => 'directoria_footer_credit_sec',
        'settings' => 'footer_text_color'
    )));

    // Header background Color

    $wp_customize->add_setting('header_color', array(
        'default' => '#fff'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_color', array(
        'label' => __('Header Background Color', 'bizillion'),
        'section' => 'theme_colors',
        'settings' => 'header_color'
    )));


    // Theme Color
    $wp_customize->add_section('theme_colors', array(
        'title' => __('Theme Color', 'directoria'),
        'priority' => '70',
        'panel' => 'directoria_theme_option',
    ));

    $wp_customize->add_setting('theme_color', array(
        'default' => '#1b7ffc'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color', array(
        'label' => __('Primary Color', 'bizillion'),
        'section' => 'theme_colors',
        'settings' => 'theme_color'
    )));

    // Footer background Color

    $wp_customize->add_setting('footer_color', array(
        'default' => '#2f3131'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_color', array(
        'label' => __('Footer Background Color', 'bizillion'),
        'section' => 'theme_colors',
        'settings' => 'footer_color'
    )));

}

add_action('customize_register', 'directoria_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function directoria_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function directoria_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function directoria_customize_preview_js()
{
    wp_enqueue_script('directoria-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'directoria_customize_preview_js');

/**
 * Binds CSS handlers to make Theme color change.
 */

function directoria_theme_color()
{

    $theme_color = get_theme_mod('theme_color', '#1b7ffc');
    $header_color = get_theme_mod('header_color', '#fff');
    $theme_footer_color = get_theme_mod('footer_color', '#2f3131');

    $theme_color_tyle = <<<EDD
                
        .directorist .directory_field:focus,
        .single_radio input[type='radio']:checked + label span,
        .directorist select:focus,.director_social_wrap ul li a,
        .read_more_area .read_more,a.directory_read_more:hover,
        blockquote,.widget.tags li a:hover,a.directory_category:hover,
        .directory_image_galler_wrap span:hover,.directorist .add_listing_form_wrapper .select2-container--focus .select2-selection,
        .directorist select.form-control:focus, .directorist .directory_btn, .directorist .btn, .directory_btn, 
        .directorist .btn.btn-default, .directorist .btn.btn-primary, .directorist .directory_btn:hover, 
        .directorist .btn:hover, .directorist .btn.btn-default:hover{
            border-color: {$theme_color};
        }
        
        .menu_area.colored{
            background: {$header_color};
        }
        
        /* bg */
        .directory_custom_suggestion ul li:hover,
        .read_more_area .read_more:hover,.directory_are_title h4 span,
        .navigation.pagination .nav-links  a:hover,.search-submit,
        .header_form_wrapper .directory_btn,.single_checkbox label.selected,
        .single_radio label span:before,.single_checkbox label.active,
        .choose_btn input[type='file'] + label,.directory_regi_btn input[type='submit'],
        .navigation.pagination .nav-links  .current,.day_selection_btn button,
        .directorist .navigation.pagination .nav-links  a:hover,.db_btn_area button.directory_edit_btn,
        .directorist .navigation.pagination .nav-links  .current,.expandable_fields button,
        .directory_main_content_area .submit_btn button,#close:checked + label span.cs,
        .directorist .single_directory_post figcaption,a.directory_category:hover,
        .directorist .dashboard_wrapper .nav-tabs>li>a:before,
        .directory_breadcrumb_area .directory_tags ul li a:hover,
        .reviewer i, .directory_user_area_form #loginform p.login-submit  input[type='submit'],
        .reviewer_avatar span, .listing_submit_btn, .td#today, .directorist .directory_btn:hover, 
        .directorist .btn:hover, .directorist .btn.btn-default:hover, .btn:hover{
            background: {$theme_color};
        }
        
        /* color */
        .directory_breadcrumb ol li a:hover,
        .directory_main_content_area .single_search_field span:hover,
        .single_direcotry_post .content_upper .post_title a,
        .directory_review_info .rating_num,.widget_title h4,
        .read_more_area .read_more,.directory_breadcrumb span,
        .admin_info ul li a:hover,.comment-reply-link,
        .directory_image_galler_wrap span:hover,.rating_label,
        .profile_title h4,.directory_blogpost  .blogpost_title:hover h2,
        a.directory_read_more:hover,.blog_meta .author, .widget ul li a:hover,
        .director_social_wrap ul li a,.directory_are_title h4,
        .widget  > ul > li a:hover,.contact_information ul li span,
        .latest_rev_info a,.days_time > span,.directory_drag_drop p span,
        .directory_home_category_area > span,.related_listing_title p,
        .atbdp_reviews_title p,.cate_title h4,.widget_content a:hover,
        .reviewer p, .tagcloud a:hover,a:hover,.contact_tile .icon,
        .dropdown ul li a:hover,.directorist .article_content ul li .infos .tags li a, .directorist .directory_btn, 
        .directorist .btn, .directory_btn, .directorist .btn.btn-default, .directorist .btn.btn-primary{
            color: {$theme_color};
        }
        
        footer.footer{
            background: {$theme_footer_color};
        }
EDD;

    wp_add_inline_style('directoria-style', $theme_color_tyle);
}

add_action('wp_enqueue_scripts', 'directoria_theme_color');
