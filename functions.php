<?php
/**
 * Directoria functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Directoria
 */

if (!function_exists('directoria_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function directoria_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Directoria, use a find and replace
         * to change 'directoria' to the name of your theme in all the template files.
         */
        load_theme_textdomain('directoria', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('woocommerce');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('blog_thumbnail', '750', '500', true);

        register_nav_menus(array(
            'primary' => __('Primary Menu', 'directoria'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));


        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 29,
            'width' => 152,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'directoria_setup');


function directoria_author_profile($socialprofile)
{
    $socialprofile['rss_url'] = 'RSS URL';
    $socialprofile['google_profile'] = 'Google Plus Profile URL';
    $socialprofile['youtube_profile'] = 'Youtube Profile URL';
    $socialprofile['pinterest_profile'] = 'Pinterest Profile URL';
    $socialprofile['twitter_profile'] = 'Twitter Profile URL';
    $socialprofile['facebook_profile'] = 'Facebook Profile URL';
    $socialprofile['linkedin_profile'] = 'Linkedin Profile URL';
    $socialprofile['instagram_profile'] = 'Instagram Profile URL';
    return $socialprofile;
}

add_filter('user_contactmethods', 'directoria_author_profile', 10, 1);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function directoria_content_width()
{
    $GLOBALS['content_width'] = apply_filters('directoria_content_width', 640);
}

add_action('after_setup_theme', 'directoria_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
//widgets
add_action('widgets_init', 'directoria_widgets_init');

function directoria_widgets_init()
{

    register_sidebar(array(
        'name' => __('Right Sidebar', 'directoria'),
        'id' => 'right-sidebar',
        'description' => __('Add widgets for the right sidebar on blog posts/pages', 'directoria'),
        'before_widget' => '<div id="%1$s" class="widget default %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget_title"><h4>',
        'after_title' => '</h4></div>',

    ));
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    if (is_plugin_active('business-directory-by-aazztech/business-directory-base.php') && !is_registered_sidebar('right-sidebar-listing')) {
        register_sidebar(array(
            'name' => __('Listing Right Sidebar', 'directoria'),
            'id' => 'right-sidebar-listing',
            'description' => __('Add widgets for the right sidebar on single listing page', 'directoria'),
            'before_widget' => '<div class="widget default">',
            'after_widget' => '</div>',
            'before_title' => '<div class="widget_title"><h4>',
            'after_title' => '</h4></div>',

        ));
    };


}

/**
 * Enqueue scripts and styles.
 */
function directoria_scripts()
{
    /*@todo; Dequeue the bootstrap style from the plugin because we have bootstrap here.*/
    wp_enqueue_style('directoria-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('directoria-css-stars', get_template_directory_uri() . '/css/css-stars.css');
    wp_enqueue_style('directoria-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('directoria-owl-carousel', get_template_directory_uri() . '/css/owl.carousel.css');
    wp_enqueue_style('directoria-style', get_stylesheet_uri());
    wp_enqueue_style('directoria-responsive', get_template_directory_uri() . '/css/responsive.css');

    /*Directoria Scrips*/
    wp_enqueue_script('directoria-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0.0', true);

    wp_enqueue_script('directoria-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.0.0', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    wp_enqueue_script('directoria-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('directoria-jquery-barrating', get_template_directory_uri() . '/js/jquery.barrating.min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('directoria-owl-carousel-min', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('directoria-main-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'directoria-owl-carousel-min'), '1.0.0', true);


}

add_action('wp_enqueue_scripts', 'directoria_scripts');


// Replaces the excerpt "Read More" text by a link
function directoria_excerpt_more($more)
{
    global $post;
    return '<br><a class="directory_read_more" href="' . get_permalink($post->ID) . '"> ' . __('Read More', 'directoria') . '</a>';

}

add_filter('excerpt_more', 'directoria_excerpt_more');


// comment field in top
function directoria_move_comment_field_to_bottom($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'directoria_move_comment_field_to_bottom');


/*helper*/
if (!function_exists('is_directoria_active')) {
    /**
     * It checks if the Directoria theme is installed currently.
     * @return bool It returns true if the directoria theme is active currently. False otherwise.
     */
    function is_directoria_active()
    {
        return wp_get_theme()->get_stylesheet() === 'directoria';
    }
}

if (!function_exists('is_business_hour_active')) {
    /**
     * It checks if the Directorist Multiple images Extension is active and enabled
     * @return bool It returns true if the Directorist Multiple images Extension is active and enabled
     */
    function is_business_hour_active()
    {
        $enable = atbdp_get_option('enable_business_hour', 'atbdp_business_hour');
        include_once(ABSPATH . 'wp-admin/includes/plugin.php'); // though the is_plugin_active() should work fine in the admin area but it showed me error. I tried several times. So, I had to include the function manually so that it works fine on back and front end.
        $active = is_plugin_active('directorist-business-hour/bd-business-hour.php');
        return (('yes' == $enable) && $active); // plugin is active and enabled
    }
}
/**
 * Adds the URL to the top level navigation menu item
 * @see $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args ); at line 94 in directoria-nav-walker.php
 */
function directoria_add_top_level_menu_url($atts, $item, $args)
{
    if (!wp_is_mobile() && !empty($args->has_children)) {
        $atts['href'] = !empty($item->url) ? $item->url : '';
    }
    return $atts;
}

add_filter('nav_menu_link_attributes', 'directoria_add_top_level_menu_url', 99, 3);

/**
 * Makes the top level navigation menu item clickable
 */
function directoria_make_top_level_menu_clickable()
{
    if (!wp_is_mobile()) { ?>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                if ($(window).width() >= 767) {
                    $('.navbar-nav > li.menu-item > a').click(function () {
                        if ($(this).attr('target') !== '_blank') {
                            window.location = $(this).attr('href');
                        } else {
                            var win = window.open($(this).attr('href'), '_blank');
                            win.focus();
                        }
                    });
                }
            });
        </script>
    <?php }
}

add_action('wp_footer', 'directoria_make_top_level_menu_clickable', 1);


/**
 * Implement the Bootstrap nav feature.
 */
require get_template_directory() . '/inc/directoria-nav-wakler.php';
/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * TGMPA Plugin Activation for this theme.
 */
require get_template_directory() . '/inc/tgm-plugin.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}


//=========================================
//  Config for demo data import
//=================================
function ocdi_import_files()
{
    return array(
        array(
            'import_file_name' => 'Direo Demo Content',
            'local_import_file' => trailingslashit(get_template_directory()) . 'ocdi/demo-content.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'ocdi/widgets.wie',
            'local_import_customizer_file' => trailingslashit(get_template_directory()) . 'ocdi/customizer.dat',
            'import_notice' => __('After you import this demo, you will have to setup the slider separately.', 'directoria'),
        ),
    );
}

add_filter('pt-ocdi/import_files', 'ocdi_import_files');

function directoria_after_import_setup() {
    // Assign menus to their locations.
    $primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

    set_theme_mod( 'nav_menu_locations', array(
            'primary' => $primary_menu->term_id,
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title( 'Home' );
    $blog_page_id  = get_page_by_title( 'Blog' );

    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $front_page_id->ID );
    update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'pt-ocdi/after_import', 'directoria_after_import_setup' );
