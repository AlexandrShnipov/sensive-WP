<?php

if (post_password_required()) {
  return;
}
?>

<div id="comments" class="comments-area">

  <?php
  // You can start editing here -- including this comment!
  if (have_comments()) :
  ?>
    <h4><?php comments_number(); ?></h4>
    <?php the_comments_navigation(); ?>

    <ol class="p-0">
      <?php
      wp_list_comments(
        array(
          'walker'            => new Bootstrap_Walker_Comment(),
          'max_depth'         => '2',
          'style'             => 'ol',
          'type'              => 'all',
          'reply_text'        => ' <div class="reply-btn d-flex">
          <a href="" class="btn-reply text-uppercase">ОТВЕТИТЬ</a>
        </div>',
          'per_page'          => '10',
          'avatar_size'       => 80,
          'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
          'echo'              => true,     // true или false
        )
      );
      ?>
    </ol><!-- .comment-list -->

    <?php
    the_comments_navigation();

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open()) :
    ?>
      <p class="no-comments"><?php esc_html_e('Comments are closed.', 'word'); ?></p>
  <?php
    endif;

  endif; // Check for have_comments().

  $defaults = [
    'fields'               => [

      'author' => '<div class="row"><div class="form-group col-lg-6 col-md-6">
      <input class="form-control" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" placeholder="Имя"/>
</div>',

      'email'  => '<div class="form-group col-lg-6 col-md-6">      
        <input id="email" class="form-control" name="email" type="email" value="' . esc_attr($commenter['comment_author_email']) . '"size="30" aria-describedby="email-notes" placeholder = "Email" />
      </div></div>',

      'subject'  => '<div class="form-group">      
        <input id="subject" class="form-control" name="subject" type="text" value="' . esc_attr($commenter['comment_author']) . '"size="30" aria-describedby="email-notes" placeholder = "Организация" />
      </div>',

      'cookies' => '<p class="comment-form-cookies-consent">' .
        '<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />', '
  <label class="label" for="wp-comment-cookies-consent">' . __('Сохранить моё имя, email и адрес сайта в этом браузере для последующих моих комментариев.') . '</label>
</p>',

    ],
    'comment_field'        => '<div class="form-group">
          <textarea id="comment" name="comment" class="form-control mb-10" rows="5" aria-required="true" required="required" placeholder = "Комментарий"></textarea>
    </div>',

    'must_log_in'          => '<p class="must-log-in">' .
      sprintf(__('Вам нужно <a href="%s">войти</a> что бы оставить комментарий.'), wp_login_url(apply_filters('the_permalink', get_permalink($post->ID)))) . '
     </p>',
    'logged_in_as'         => '<p class="logged-in-as">' .
      sprintf(__('<a href="%1$s" aria-label="Вы вошли как %2$s.">Вы вошли как %2$s</a>. <a href="%3$s">Выйти?</a>'), get_edit_user_link(), $user_identity, wp_logout_url(apply_filters('the_permalink', get_permalink()))) . '
     </p>',
    'comment_notes_before' => '<p class="comment-notes">
      <span id="email-notes">' . __('Вам нужно заполнить все поля что бы оставить комментарий.') . '</span>     
    </p>',
    'comment_notes_after'  => '',
    'id_form'              => 'commentform',
    'id_submit'            => 'submit',
    'class_form'           => 'comment-form',
    'class_submit'         => 'button submit_btn',
    'name_submit'          => 'submit',
    'title_reply'          => __('Оставьте комментарий'),
    'title_reply_to'       => __('Ответить %s'),
    'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
    'title_reply_after'    => '</h3>',
    'cancel_reply_before'  => ' <small>',
    'cancel_reply_after'   => '</small>',
    'cancel_reply_link'    => __('Отменить отправку'),
    'label_submit'         => __('Отправить комментарий'),
    'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s">%4$s </button>',
    'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
    'format'               => 'html5',
  ];

  comment_form($defaults);
  ?>

  

</div><!-- #comments -->