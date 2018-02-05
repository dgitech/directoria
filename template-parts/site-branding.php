<?php
$title_tagline = get_theme_mod( 'show_title_tagline');
// show title and tagline if it is not set to blank
if ( $title_tagline ) {?>
    <div class="site_tagline_wrap">
        <?php
        $name = get_bloginfo( 'name', 'display' );
        $description = get_bloginfo( 'description', 'display' );

        if ( $name || is_customize_preview() ) { ?>
            <a href="<?php echo site_url();?>" > <h1 class="site-title"><?php echo esc_html( $name); ?></h1></a>
        <?php }
        if ( $description || is_customize_preview() ) { ?>
            <p class="site-description"><?php echo esc_html( $description); ?></p>
        <?php }?>
    </div>
<?php } ?>