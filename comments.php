<?php
/**
 * The template for displaying comments
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area mt-12 pt-8 border-t border-gray-200">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title text-2xl font-bold text-wisdom-purple mb-6 font-minion">
            <?php
            $comment_count = get_comments_number();
            if ('1' === $comment_count) {
                printf(
                    _x('One thought on &ldquo;%1$s&rdquo;', 'comments title', 'wisdom-waypoints'),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            } else {
                printf(
                    _nx(
                        '%1$s thought on &ldquo;%2$s&rdquo;',
                        '%1$s thoughts on &ldquo;%2$s&rdquo;',
                        $comment_count,
                        'comments title',
                        'wisdom-waypoints'
                    ),
                    number_format_i18n($comment_count),
                    '<span>' . wp_kses_post(get_the_title()) . '</span>'
                );
            }
            ?>
        </h2>

        <?php the_comments_navigation(); ?>

        <ol class="comment-list space-y-6">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'callback'   => 'wisdom_waypoints_comment',
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation();

        if (!comments_open()) :
        ?>
            <p class="no-comments text-gray-600 font-avenir mt-6">
                <?php _e('Comments are closed.', 'wisdom-waypoints'); ?>
            </p>
        <?php
        endif;

    endif; // Check for have_comments().

    comment_form(array(
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title text-xl font-bold text-wisdom-purple mb-4 font-minion">',
        'title_reply_after'  => '</h3>',
        'class_form'         => 'comment-form space-y-4',
        'comment_field'      => '<p class="comment-form-comment"><label for="comment" class="block text-sm font-medium text-gray-700 mb-2 font-avenir">' . _x('Comment', 'noun', 'wisdom-waypoints') . ' <span class="required text-wisdom-red">*</span></label> <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-wisdom-purple focus:border-transparent font-avenir"></textarea></p>',
        'fields'             => array(
            'author' => '<p class="comment-form-author"><label for="author" class="block text-sm font-medium text-gray-700 mb-2 font-avenir">' . __('Name', 'wisdom-waypoints') . ' <span class="required text-wisdom-red">*</span></label> <input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" maxlength="245" autocomplete="name" required="required" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-wisdom-purple focus:border-transparent font-avenir" /></p>',
            'email'  => '<p class="comment-form-email"><label for="email" class="block text-sm font-medium text-gray-700 mb-2 font-avenir">' . __('Email', 'wisdom-waypoints') . ' <span class="required text-wisdom-red">*</span></label> <input id="email" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email" required="required" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-wisdom-purple focus:border-transparent font-avenir" /></p>',
            'url'    => '<p class="comment-form-url"><label for="url" class="block text-sm font-medium text-gray-700 mb-2 font-avenir">' . __('Website', 'wisdom-waypoints') . '</label> <input id="url" name="url" type="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" maxlength="200" autocomplete="url" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-wisdom-purple focus:border-transparent font-avenir" /></p>',
        ),
        'submit_button'      => '<input name="%1$s" type="submit" id="%2$s" class="%3$s bg-wisdom-purple text-white px-6 py-2 rounded-md hover:bg-opacity-90 transition-colors font-avenir cursor-pointer" value="%4$s" />',
    ));
    ?>

</div>