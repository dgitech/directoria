<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

    <section class="single_post single_area single_page active">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">

                <!-- BLOG POST LISTINGs  -->
                <div class="col-md-8">

                    <?php
                    if ( have_posts() ) :

                        if ( is_home() && ! is_front_page() ) : ?>
                            <header>
                                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                            </header>

                            <?php
                        endif;

                        /* Start the Loop */
                        while ( have_posts() ) : the_post();

                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_format() );

                        endwhile;


                        ?>
                        <div class="pagination-area">
                            <?php the_posts_pagination(array(
                                'prev_text' => '<span class="fa fa-chevron-left"></span>',
                                'next_text' => '<span class="fa fa-chevron-right"></span>',
                                'mid_size' => '3',
                            )); ?>
                        </div>
                        <?php

                    else :

                        get_template_part( 'template-parts/content', 'none' );

                    endif; ?>

                </div>
                <!-- end col-md-8  -->
                    <?php get_sidebar(); ?>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

<?php

get_footer();
