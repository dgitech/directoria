<?php
/*
 * Template Name: Full-Width Template
 * */

get_header();
while (have_posts())
{?>
    <div class="single_area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?php the_post();
                    the_content();?>
                </div>
            </div>
        </div>
    </div>
<?php }
get_footer();
