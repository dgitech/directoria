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
                        <div class="col-sm-6 col-sm-offset-3 v_middle">
                            <div class="contact_information">
                                <ul>
                                    <?php if (!empty($address)) { ?>
                                    <li>
                                        <span class="fa fa-map-marker"></span>
                                        <p><?php echo esc_html($address); ?></p>
                                    </li>
                                    <?php }

                                    if (!empty($phone)) { ?>
                                    <li>
                                        <span class="fa fa-phone"></span>
                                        <p><?php echo esc_html($phone); ?></p>
                                    </li>
                                    <?php }

                                    if (!empty($email)) { ?>
                                    <li>
                                        <span class="fa fa-envelope"></span>
                                        <p><?php echo esc_html($email); ?></p>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="contact_form_wrapper directory_form_elem">
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
        </div>
    </div><!-- end single_area -->

    <!--================================
        END CONTACT AREA
    =================================-->

<?php get_footer(); ?>