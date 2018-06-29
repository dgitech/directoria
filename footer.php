<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Directoria
 */
$credit = get_theme_mod('directoria_footer_credit')
?>
<!-- start footer area -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- start copyright text -->
                <p><?php echo wp_kses_post($credit); ?></p>
                <!-- end copyright text -->
            </div>
        </div>
    </div>
</footer><!-- end footer area -->

<?php wp_footer(); ?>

</body>
</html>
