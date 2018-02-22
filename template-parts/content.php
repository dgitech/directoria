<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Directoria
 */

?>


<article class="directory_blogpost" id="post-<?php the_ID(); ?>">
    <figure>
        <div class="directory_blog_image_wrapp">
            <?php
            if (has_post_thumbnail()){
                the_post_thumbnail('blog_thumbnail');
            }
            ?>
        </div>

        <figcaption>
            <?php
            the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            the_excerpt();
            ?>


        </figcaption>
    </figure>
</article> <!-- #post-<?php the_ID(); ?> -->