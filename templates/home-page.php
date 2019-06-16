<?php

/*
 * Template Name: Home Page Template
 * */

get_header('home');
while (have_posts()) { ?>
    <div class="directoria_home_area_wrapper">
        <?php the_post();
        the_content(); ?>
    </div>
<?php }
get_footer();
