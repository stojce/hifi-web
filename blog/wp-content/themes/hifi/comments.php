<?php
/*
The comments page for Bones
*/

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
    <div class="alert alert-info"><?php _e("This post is password protected. Enter the password to view comments.","bonestheme"); ?></div>
    <?php
    return;
}
?>

<!-- You can start editing here. -->
<div id="comments">
<?php if ( have_comments() ) : ?>
    <?php if ( ! empty($comments_by_type['comment']) ) : ?>
        <nav id="comment-nav">
            <ul class="clearfix">
                <li><?php previous_comments_link( __("Older comments","bonestheme") ) ?></li>
                <li><?php next_comments_link( __("Newer comments","bonestheme") ) ?></li>
            </ul>
        </nav>

        <?php wp_list_comments('type=comment&callback=bones_comments'); ?>

    <?php endif; ?>

    <?php if ( ! empty($comments_by_type['pings']) ) : ?>
        <h3 id="pings">Trackbacks/Pingbacks</h3>

        <ol class="pinglist">
            <?php wp_list_comments('type=pings&callback=list_pings'); ?>
        </ol>
    <?php endif; ?>

    <nav id="comment-nav">
        <ul class="clearfix">
            <li><?php previous_comments_link( __("Older comments","bonestheme") ) ?></li>
            <li><?php next_comments_link( __("Newer comments","bonestheme") ) ?></li>
        </ul>
    </nav>

<?php else : // this is displayed if there are no comments so far ?>

    <?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed
        ?>

        <?php
        $suppress_comments_message = of_get_option('suppress_comments_message');

        if (is_page() && $suppress_comments_message) : ?>

        <?php else : ?>

            <!-- If comments are closed. -->
            <p class="alert alert-info"><?php _e("Comments are closed","bonestheme"); ?>.</p>

        <?php endif; ?>

    <?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

    <section id="respond" class="respond-form">

        <h3 id="comment-form-title">Add your thoughts</h3>

        <p class="content-divider"></p>

        <div id="cancel-comment-reply">
            <p class="small"><?php cancel_comment_reply_link( __("Cancel","bonestheme") ); ?></p>
        </div>

        <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
            <div class="help">
                <p><?php _e("You must be","bonestheme"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in","bonestheme"); ?></a> <?php _e("to post a comment","bonestheme"); ?>.</p>
            </div>
        <?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="form-vertical" id="commentform">

                <?php if ( is_user_logged_in() ) : ?>

                    <p class="comments-logged-in-as"><?php _e("Logged in as","bonestheme"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e("Log out of this account","bonestheme"); ?>"><?php _e("Log out","bonestheme"); ?> &raquo;</a></p>

                <?php else : ?>

                    <ul id="comment-form-elements" class="clearfix">

                        <li>
                            <div class="control-group">
                                <label for="author">Name:</label>
                                <input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
                            </div>
                        </li>

                        <li>
                            <div class="control-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
                            </div>
                        </li>

                    </ul>

                <?php endif; ?>

                <div class="clearfix">
                    <div class="input">
                        <textarea name="comment" id="comment" placeholder="Your thoughts ..." tabindex="3"></textarea>
                    </div>
                    <div class="form-actions">
                        <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
                        <?php comment_id_fields(); ?>
                    </div>
                </div>
                <?php
                //comment_form();
                do_action('comment_form()', $post->ID);

                ?>

            </form>

        <?php endif; // If registration required and not logged in ?>
    </section>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>