<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Directoria
 */
global $post;
get_header(); ?>

    <section class="single_post single_area single_page active">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-md-8">

                    <div class="single_blog_post_wrapper" id="post-<?php echo $post->ID; ?>">
                        <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'page' );


                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                    </div> <!-- #post-<?php echo $post->ID;; ?> -->

                </div><!-- col-md-8-->

                <?php
                get_sidebar();
                ?>

            </div><!-- end row -->
        </div><!-- end container -->
    </section>

<?php

get_footer();

