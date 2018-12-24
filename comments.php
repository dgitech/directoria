<?php
/**
 * The template for displaying comments.

 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */


if ( post_password_required() ) {
    return;
}
?>



<?php if ( have_comments() ) { ?>


    <div class="comment_area">
        <div class="area_title"><h4>
                <?php
                printf( _nx( '1 comment', '%1$s comments', get_comments_number(), 'comments title', 'directoria' ),
                    number_format_i18n( get_comments_number() ) );
                ?>
            </h4></div>

        <div class="comment_wrapper">
            <ul class="media-list">
                <?php wp_list_comments( array(
                    'callback' => 'directoria_comments_output',
                    'style'      => 'li',
                    'short_ping' => true,
                    'max_depth' => 3,
                    'avatar_size'=> 90,

                ) );
                ?>
            </ul>
        </div>
    </div>




<?php } // End Comments ?>

<?php
// If comments are closed and there are comments, let's leave a little note, shall we?
if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
    ?>
    <div class="area_title"><h4><?php _e( 'Comments are closed.', 'directoria' ); ?></h4></div>
<?php } ?>





<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
    'id_submit' => 'submit-comment',
    'class_submit' => 'btn directory_btn',
    'class_form'      => 'reply_form',
    'title_reply'=> esc_html__( 'Leave A Reply','directoria' ),
    'title_reply_to' => esc_html__( 'Post a Reply to %s','directoria' ).'</div>',
    'title_reply_before'   => '<div class="comment_area_title"><h4>',
    'title_reply_after'    => '</h4></div>',
    'cancel_reply_link' => esc_html__( 'Cancel Reply','directoria' ),
    'label_submit' => esc_html__( 'Submit Comment','directoria' ),
    'comment_field' => '<div class="col-md-12"><textarea id="comment" class="input_field" placeholder="'. esc_html__( 'Write your comment here...','directoria' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea></div>',
    'comment_notes_before' => '',
    'comment_notes_after' => '',
    'fields' => apply_filters( 'comment_form_default_fields', array(

            'author' =>	'<div class"row"><div class="col-md-6"><input id="author" class="input_field" placeholder="'. esc_html__( 'Name','directoria' ).'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30" ' . esc_attr($aria_req) . ' />
                            </div>',


            'email' => '<div class="col-md-6"> <input id="email" class="input_field" placeholder="'. esc_html__( 'Email','directoria' ).'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30" ' . esc_attr($aria_req)  . ' />
                            </div></div>'

        )
    ),
    'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s"/>%4$s</button>',
    'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',

    );








?>

    <div class="comment_pager">
        <p><?php paginate_comments_links(); ?></p>
    </div>


    <!-- comment_form() will show the form if the comment is open and show a message if the comments are closed.-->
<?php comment_form($args); ?>




<?php
// Rid Custom Comment listing
function directoria_comments_output( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>
    <!--start a single comment list-->
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <div class="media" id="div-comment-<?php comment_ID(); ?>">
        <div class="pull-left no-pull-xs">
            <a href="#" class="cmnt_img">
                <?php
                $avatar_size = !empty( $args['avatar_size'] ) ? intval($args['avatar_size']) : 90;
                echo get_avatar( $comment, $avatar_size );
                ?>
            </a>
        </div>
        <div class="media-body">
            <div class="media_top">
                <div class="heading_left pull-left">
                    <a href="#"><h4 class="media-heading"><?php echo get_comment_author_link(); ?></h4></a>
                    <span><?php comment_time( 'F d, Y' ); ?></span>
                </div>

                <!--                                  <a href="#" class="reply hidden-xs-m pull-right">Reply</a>-->

                <div class="reply hidden-xs-m pull-right">
                    <?php comment_reply_link( array_merge( $args, array( 'reply_text' => ''.esc_attr__('Reply','directoria').'', 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                </div>
            </div>
            <p><?php comment_text(); ?></p>

        </div>
    </div>


    <?php

}

