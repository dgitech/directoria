<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Directoria
 */

?>

<div class="post_area">
    <!-- start blog img -->
    <div class="blog_img">
        <?php
        if (has_post_thumbnail()){
            the_post_thumbnail('blog_thumbnail');
        }
        ?>
    </div><!--ends blog_img-->

    <div class="blog_content_wrapper">
        <div class="blog_title">
            <?php the_title('<h3>', '</h3>'); ?>
        </div><!--ends blog_title-->

        <!-- start blog_contents -->
        <div class="blog_contents">
            <?php
            the_content();

            wp_link_pages();
            ?>

        </div>
        <!-- end blog contents -->
    </div><!-- end blog_content_wrapper -->
</div> <!--ends post_area-->

