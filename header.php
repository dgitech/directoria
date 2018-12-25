<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Directoria
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- start menu area -->
<div class="menu_area colored">
    <!-- start .container -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <?php
                        the_custom_logo();
                        get_template_part('template-parts/site-branding');
                        ?>
                    </div>

                     <?php
                    wp_nav_menu( array(
                            'menu'              => 'primary',
                            'theme_location'    => 'primary',
                            'depth'             => 2,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'menu_class'        => 'nav navbar-nav',
                            'fallback_cb'       => 'Directoria_Navwalker::fallback',
                            'walker'            => new Directoria_Navwalker()
                        )
                    );
                    ?>
                </nav>
            </div>
        </div>
    </div><!-- end container -->
</div>
<!-- end menu area -->
<?php $breadcrumb_bg = get_theme_mod('directoria_breadcrumb_bg', get_template_directory_uri().'/images/breadcrumb.jpg');?>
<!-- start directroy_breadcrumb_area -->
<div class="directory_breadcrumb_area" style="background-image: url('<?php echo esc_url($breadcrumb_bg); ?>')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="directory_breadcrumb">
                    <?php directoria_adv_breadcrumbs(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- end directory_breadcrumb_area -->