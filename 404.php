<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Directoria
 */

get_header(); ?>


    <section class="single_post single_area single_page active">
        <!-- start container -->
        <div class="container">
            <!-- start row -->
            <div class="row">
                <div class="col-md-8">
                    <div class="content-not-found">
                        <header class="page-header">
                            <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'directoria' ); ?></h1>
                        </header><!-- .page-header -->

                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'directoria' ); ?></p>

                        <?php
                        get_search_form();
                        ?>
                    </div>
                </div><!-- col-md-8-->

                <?php
                get_sidebar();
                ?>

            </div><!-- end row -->
        </div><!-- end container -->
    </section>

<?php
get_footer();
