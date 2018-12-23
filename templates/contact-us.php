<?php
/**
 * Template Name: Contact Template
 **/
get_header();
// get all contact information
$address = get_theme_mod('directoria_address', '');
$phone = get_theme_mod('directoria_phone', '');
$email = get_theme_mod('directoria_email', '');



?>

    <!--================================
        START CONTACT AREA
    =================================-->

    <!-- start single_area -->
    <div class="single_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="address_contact">
                                <?php if (!empty($address)) { ?>
                                    <div class="col-md-4">
                                        <div class="contact_tile">
                                            <span class="fa fa-map-marker icon"></span>
                                            <h4 class="tiles__title"><?php echo esc_html__('Office Address','directoria')?></h4>
                                            <div class="tiles__content">
                                                <p><?php echo esc_html($address); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                if (!empty($phone)) { ?>
                                    <div class="col-md-4">
                                        <div class="contact_tile">
                                            <span class="fa fa-phone icon"></span>
                                            <h4 class="tiles__title"><?php echo esc_html__('Phone Number','directoria')?></h4>
                                            <div class="tiles__content">
                                                <p><?php echo esc_html($phone); ?></p>
                                            </div>
                                        </div>
                                        <!-- end /.contact_tile -->
                                    </div>
                                <?php }
                                if (!empty($email)) { ?>
                                <div class="col-md-4">
                                    <div class="contact_tile">
                                        <span class="fa fa-envelope icon"></span>
                                        <h4 class="tiles__title"><?php echo esc_html__('Email Address','directoria')?></h4>
                                        <div class="tiles__content">
                                            <p><?php echo esc_html($email); ?></p>
                                        </div>
                                    </div>
                                    <!-- end /.contact_tile -->
                                </div>
                                <?php }?>
                        </div>
                    </div>
                    <div class="row">
                            <div class="contact_form_wrapper directory_form_elem">
                                <div class="contact_form__title">
                                    <h3><?php echo esc_html__('Leave Your Messages','directoria')?></h3>
                                </div>
                                <?php
                                while (have_posts()){
                                    the_post();
                                    the_content();
                                }
                                ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end single_area -->

    <!--================================
        END CONTACT AREA
    =================================-->

<?php get_footer(); ?>