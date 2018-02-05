<?php
get_header('single');
global $post;
$lf= get_post_meta($post->ID, '_listing_info', true);
$listing_info= (!empty($lf)) ? aazztech_enc_unserialize($lf) : array();

extract($listing_info);

?>

<section class="directory_wrapper">
    <!-- start breadcrumb area-->
    <div class="directory_breadcrumb_area" style=" background-image: url('<?php echo get_theme_mod('directoria_list_breadcrumb_bg', '');?>')">
        <div class="<?php echo is_directoria_active() ? 'container': 'container-fluid'; ?>">
            <div class="row">
                <div class="col-md-12">

                    <div class="directory_listing_info">
                        <div class="listing_title">
                            <?php the_title('<h2>', '</h2>') ?>
                            <p class="sub_title"><?= (!empty($tagline)) ? esc_html($tagline) : ''; ?></p>
                        </div>
                        <?php

                        /**
                         * Fires after the title and sub title of the listing is rendered on the single listing page
                         * @param array $listing_info The meta information of the current listing
                         * @since 1.1.1
                         * @since 1.0.0
                         */

                        do_action('atbdp_after_listing_tagline', $listing_info);

                        ?>

                        <ul class="directory_tags">
                            <?php
                            $cats = get_the_terms(get_the_ID(), ATBDP_CATEGORY);
                            if (!empty($cats)) {
                                foreach ($cats as $cat) {

                                    ?>
                                    <li>
                                        <p class="directory_tag">
                                            <span class="fa <?= esc_attr(get_cat_icon($cat->term_id)); ?>" aria-hidden="true"></span>
                                            <span>
                                                    <a href="<?php echo esc_url(ATBDP_Permalink::get_category_archive($cat)); ?>">
                                                        <?= $cat->name; ?>
                                                    </a>
                                                </span>
                                        </p>
                                    </li>
                                <?php  }
                            }
                            ?>

                        </ul>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb area-->
    <div class="directory_listiing_detail_area single_area">
        <div class="container">
        <div class="row">
            <?php
            if (have_posts()){
                the_post(); the_content();
            }
            ?>
        </div>
    </div>
    </div>
</section>
<?php get_footer(); ?>

