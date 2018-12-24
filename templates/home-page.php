<?php

/*
 * Template Name: Home Page Template
 * */

get_header('home');
while (have_posts()) {
    $home_bg_image = get_theme_mod('directoria_home_bg', get_template_directory_uri().'/images/home_page_bg.jpg');
    ?>
    <div class="directoria_home_area_wrapper " style="background-image: url('<?php echo esc_url($home_bg_image); ?>')">
        <?php the_post();
        the_content(); ?>
    </div>
<?php }
get_footer();
