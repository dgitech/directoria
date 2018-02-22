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
        </div>

        <div class="blog_content_wrapper">
            <div class="blog_title">
                <?php the_title('<h3>', '</h3>'); ?>
                <div class="blog_meta">
                    <?php directoria_posted_on(); ?>
                </div>
            </div>

            <!-- start blog_contents -->
            <div class="blog_contents">
               <?php the_content();
               wp_link_pages();
               ?>
            </div><!-- end blog contents -->
        </div><!-- end blo_content_area -->
    </div>
    <!-- start author_info -->
    <div class="author_info">
        <div class="admin_img">
            <?php echo get_avatar( get_the_author_meta('email')  , 114 ); ?>
        </div>

        <div class="admin_info">
            <h4><?php the_author(); ?></h4>

            <?php
            $author_bio = get_the_author_meta('description');
            if (!empty($author_bio)) echo "<p>{$author_bio}</p>";
            $social_links= array();
            $social_links['rss'] = get_the_author_meta( 'rss_url' );
            $social_links['twitter'] = get_the_author_meta( 'twitter_profile' );
            $social_links['google-plus'] = get_the_author_meta( 'google_profile' );
            $social_links['youtube'] = get_the_author_meta( 'youtube_profile' );
            $social_links['pinterest-p'] = get_the_author_meta( 'pinterest_profile' );
            $social_links['facebook'] = get_the_author_meta( 'facebook_profile' );
            $social_links['linkedin'] = get_the_author_meta( 'linkedin_profile' );
            $social_links['instagram'] = get_the_author_meta( 'instagram_profile' );
            //if we have links then output an ul
            if ( !empty( $social_links ) ) {
                ?>
                <ul>
                    <?php foreach ($social_links as $name => $link ){
                        if ( !empty( $link ) ) { ?>
                            <li><a href="<?php echo esc_html( $link ); ?>"><span class="fa fa-<?php echo esc_attr( $name)?>"></span></a></li>

                        <?php }
                    } ?>
                </ul>
            <?php } ?>
        </div>
    </div>
    <!-- end author_info -->

