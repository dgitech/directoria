<?php

/*
 * Template Name: Home Page Template
 * */

get_header('home');
while (have_posts())
{
    the_post();
    the_content();
}
get_footer();
