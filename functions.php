<?php

if (!function_exists('sensive_setup')) {
  function sensive_setup()
  {

    load_theme_textdomain('sensive', get_template_directory() . '/languages');

    // !добавляем пользовательский логотип
    add_theme_support('custom-logo', [
      'height'      => 50,
      'width'       => 130,
      'flex-width'  => false,
      'flex-height' => false,
      'header-text' => '',
      'unlink-homepage-logo' => false, // WP 5.5
    ]);

    //! логотип не ссылка на главной странице
    function theme_logo()
    {
      $custom_logo_id = get_theme_mod('custom_logo');
      // Если главная, то без ссылки
      if (is_front_page()) {
        $html = wp_get_attachment_image($custom_logo_id, 'full', false, array(
          'class' => 'custom-logo',
          'itemprop' => 'url image',
          'alt' => get_bloginfo('name')
        ));
        // На прочих страницах ссылка на главную есть
      } else {
        $html = sprintf(
          '<a href="%1$s" class="custom-logo-link" rel="home" title="' . get_bloginfo('name') . '" itemprop="url">%2$s</a>',
          esc_url(home_url('/')),
          wp_get_attachment_image(
            $custom_logo_id,
            'full',
            false,
            array(
              'class' => 'custom-logo',
              'itemprop' => 'url image',
              'alt' => get_bloginfo('name')
            )
          )
        );
      }
      return $html;
    }
    add_filter('get_custom_logo', 'theme_logo');

    //! добаляется свой класс в HTML
    add_filter('get_custom_logo', 'change_logo_class');
    function change_logo_class($classes)
    {
      //  $html = str_replace('class="custom-logo"', 'class="navbar-brand"', $html);
      $classes = str_replace('class="custom-logo-link"', 'class="navbar-brand"', $classes);
      return $classes;
    }
    // !

    // ! подключаем поддержку HTML5 тегов
    add_theme_support('html5', array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption',
      'script',
      'style',
    ));

    // ! добавляем динамический <title>
    add_theme_support('title-tag');
  }

  add_action('after_setup_theme', 'sensive_setup');
}

// ! включаем миниатюры для постов и страниц

add_theme_support('post-thumbnails');
set_post_thumbnail_size(730, 390, true); // размер миниатюры поста по умолчанию
add_image_size( 'slider', 350, 230, true );

//! подключение стилей и скриптов

add_action('wp_enqueue_scripts', 'sensive_scripts', 'action_function_name_7714', 99);

function sensive_scripts()
{
  wp_enqueue_style('main', get_stylesheet_uri());


  // bootstrap
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/vendors/bootstrap/bootstrap.min.css', array('main'), null);

  // fontawesome
  wp_enqueue_style('fontawesome', get_template_directory_uri() . '/vendors/fontawesome/css/all.min.css', array('main'), null);

  // themify-icons
  wp_enqueue_style('themify-icons', get_template_directory_uri() . '/vendors/themify-icons/themify-icons.css', array('main'), null);

  // linericon
  wp_enqueue_style('linericon', get_template_directory_uri() . '/vendors/linericon/style.css', array('main'), null);

  //owl-carousel
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/vendors/owl-carousel/owl.theme.default.min.css', array('main'), null);

  //owl-carousel
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/vendors/owl-carousel/owl.carousel.min.css', array('main'), null);

  // подключаем основные стили
  wp_enqueue_style('sensive', get_template_directory_uri() . '/css/style.css', array('main'), null);

  //! переподключаем jQuery
  wp_deregister_script( 'jquery-core' );
  wp_deregister_script('jquery');
  wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', false, null, true );
  wp_register_script('jquery', get_template_directory_uri() . '/vendors/jquery/jquery-3.2.1.min.js');
  wp_enqueue_script('jquery');

  // bootstrap
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/vendors/bootstrap/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true);

  // owl-carousel
  wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/vendors/owl-carousel/owl.carousel.min.js', array('jquery'), '1.0.0', true);

  // ajaxchimp
  wp_enqueue_script('ajaxchimp', get_template_directory_uri() . '/js/jquery.ajaxchimp.min.js', array('jquery'), '1.0.0', true);

  // mail-script
  wp_enqueue_script('mail-script', get_template_directory_uri() . '/js/mail-script.js', array('jquery'), '1.0.0', true);

  //contact
  wp_enqueue_script('mail-script', get_template_directory_uri() . '/vendors/contact.js', array('jquery'), '1.0.0', true);


  // main
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
  }

  function action_function_name_7714(){
    wp_localize_script( 'jquery', 'sensive', array( 
      'template_url' => get_template_directory_uri(), 
    ) );
  }


// ! регистрируем несколько областей меню
function sensive_menus()
{

  $locations = array(

    // собираем несколько зон (областей ) меню 
    'header'   => __('Header Menu', 'sensive'),
    'menu-social-header'   => __('Menu Social Header', 'sensive'),
    'menu-social-footer'   => __('Menu Social Footer', 'sensive'),
    // 'footer_left'   => __('Footer Left Menu', 'sensive'),
    // 'footer_right'   => __('Footer Right Menu', 'sensive'),
  );

  // регистрируем области меню, которые лежат в переменной $locations
  register_nav_menus($locations);
}
// хук событие
add_action('init', 'sensive_menus');

// menu Bootstrap
class bootstrap_4_walker_nav_menu extends Walker_Nav_menu
{

  function start_lvl(&$output, $depth = 0, $args = array())
  { // ul
    $indent = str_repeat("\t", $depth); // indents the outputted HTML
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
  { // li a span

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $attributes .= ($args->walker->has_children) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';

    $item_output = $args->before;
    $item_output .= ($depth > 0) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

add_action('wp_ajax_my_action', 'my_action_callback');
add_action('wp_ajax_nopriv_my_action', 'my_action_callback');
function my_action_callback()
{

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    # Подставляем почту администратора
    $mail_to = get_option('admin_email');

    # Собираем данные из формы
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $team = trim($_POST["team"]);
    $message = trim($_POST["message"]);

    if (empty($name) or empty($email) or empty($subject) or empty($message)) {
      # Отправляем ошибку 400 (bad request).
      http_response_code(400);
      echo __("Пожалуйста заполните все обязательные поля.", 'sensive');
      exit;
    }

    # Содержимое письма
    $team = 'Заявка с сайта:' . get_bloginfo('name');
    $content = "Имя: $name\n\n";
    $content .= "Email: $email\n\n";
    $content .= "Тема сообщения: $team\n\n";
    $content .= "Сообщение:\n$message\n";

    # Заголовок письма email headers.
    $headers = "From: Wordpress <info@alexander-shnipov.ru>";

    # Попытка отправить с помощью  mail().
    $success = wp_mail($mail_to, $team, $content, $headers);
    if ($success) {
      # Set a 200 (okay) response code.
      http_response_code(200);
      echo __("Спасибо! Ваше сообщение отправлено.", 'sensive');
    } else {
      # Set a 500 (internal server error) response code.
      http_response_code(500);
      echo __("Упс! Что-то пошло не так, не получилось отправить сообщение.", 'sensive');
    }
  } else {
    # Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo __("Не получилось отправить, попробуйте позже.", 'sensive');
  }

  // выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
  wp_die();
}


//! новый тип записей
  // tours

  add_action('init', 'my_custom_init');
  function my_custom_init()
  {
    register_post_type('tours', array(
        'labels'             => array(
        'name'               => 'Туры', // Основное название типа записи
        'singular_name'      => 'Тур', // отдельное название записи типа Tours
        'add_new'            => 'Добавить новый',
        'add_new_item'       => 'Добавить новый тур',
        'edit_item'          => 'Редактировать тур',
        'new_item'           => 'Новый тур',
        'view_item'          => 'Посмотреть тур',
        'search_items'       => 'Найти тур',
        'not_found'          => 'Туров не найдено',
        'not_found_in_trash' => 'В корзине туров не найдено',
        'parent_item_colon'  => '',
        'menu_name'          => 'Туры'


      ),
      'pages' => true,
      'author'             => true,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => true,
      'capability_type'    => 'post',
      'menu_icon'          => 'dashicons-admin-site-alt2',
      'has_archive'        => true,
      'hierarchical'       => true,
      'has_archive'        => true,
      'menu_position'      => 1,
      'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
      'taxonomies'  => array('category', 'post_tag'),
    ));    
  }

// ! отключаем создание миниатюр файлов для указанных размеров
add_filter('intermediate_image_sizes', 'delete_intermediate_image_sizes');
function delete_intermediate_image_sizes($sizes)
{
  // размеры которые нужно удалить
  return array_diff($sizes, [
    'medium_large',
    'large',
    '1536x1536',
    '2048x2048',
  ]);
}

//! удаляет H2 из шаблона пагинации
add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
function my_navigation_template($template, $class)
{
  /*
	Вид базового шаблона:
	<nav class="navigation %1$s" role="navigation">
		<h2 class="screen-reader-text">%2$s</h2>
		<div class="nav-links">%3$s</div>
	</nav>
	*/

  return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}

// ! выводим пагинацию
the_posts_pagination(array(
  'end_size' => 2,
));



//! шаблон для комментариев

class Bootstrap_Walker_Comment extends Walker
{

  /**
   * What the class handles.
   *
   * @since 2.7.0
   * @var string
   *
   * @see Walker::$tree_type
   */
  public $tree_type = 'comment';

  /**
   * Database fields to use.
   *
   * @since 2.7.0
   * @var array
   *
   * @see Walker::$db_fields
   * @todo Decouple this
   */
  public $db_fields = array(
    'parent' => 'comment_parent',
    'id'     => 'comment_ID',
  );

  /**
   * Starts the list before the elements are added.
   *
   * @since 2.7.0
   *
   * @see Walker::start_lvl()
   * @global int $comment_depth
   *
   * @param string $output Used to append additional content (passed by reference).
   * @param int    $depth  Optional. Depth of the current comment. Default 0.
   * @param array  $args   Optional. Uses 'style' argument for type of HTML list. Default empty array.
   */
  public function start_lvl(&$output, $depth = 0, $args = array())
  {
    $GLOBALS['comment_depth'] = $depth + 1;

    switch ($args['style']) {
      case 'div':
        break;
      case 'ol':
        $output .= '<ol class="children">' . "\n";
        break;
      case 'ul':
      default:
        $output .= '<ul class="children">' . "\n";
        break;
    }
  }

  /**
   * Ends the list of items after the elements are added.
   *
   * @since 2.7.0
   *
   * @see Walker::end_lvl()
   * @global int $comment_depth
   *
   * @param string $output Used to append additional content (passed by reference).
   * @param int    $depth  Optional. Depth of the current comment. Default 0.
   * @param array  $args   Optional. Will only append content if style argument value is 'ol' or 'ul'.
   *                       Default empty array.
   */
  public function end_lvl(&$output, $depth = 0, $args = array())
  {
    $GLOBALS['comment_depth'] = $depth + 1;

    switch ($args['style']) {
      case 'div':
        break;
      case 'ol':
        $output .= "</ol><!-- .children -->\n";
        break;
      case 'ul':
      default:
        $output .= "</ul><!-- .children -->\n";
        break;
    }
  }

  /**
   * Traverses elements to create list from elements.
   *
   * This function is designed to enhance Walker::display_element() to
   * display children of higher nesting levels than selected inline on
   * the highest depth level displayed. This prevents them being orphaned
   * at the end of the comment list.
   *
   * Example: max_depth = 2, with 5 levels of nested content.
   *     1
   *      1.1
   *        1.1.1
   *        1.1.1.1
   *        1.1.1.1.1
   *        1.1.2
   *        1.1.2.1
   *     2
   *      2.2
   *
   * @since 2.7.0
   *
   * @see Walker::display_element()
   * @see wp_list_comments()
   *
   * @param WP_Comment $element           Comment data object.
   * @param array      $children_elements List of elements to continue traversing. Passed by reference.
   * @param int        $max_depth         Max depth to traverse.
   * @param int        $depth             Depth of the current element.
   * @param array      $args              An array of arguments.
   * @param string     $output            Used to append additional content. Passed by reference.
   */
  public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
  {
    if (!$element) {
      return;
    }

    $id_field = $this->db_fields['id'];
    $id       = $element->$id_field;

    parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

    /*
		 * If at the max depth, and the current element still has children, loop over those
		 * and display them at this level. This is to prevent them being orphaned to the end
		 * of the list.
		 */
    if ($max_depth <= $depth + 1 && isset($children_elements[$id])) {
      foreach ($children_elements[$id] as $child) {
        $this->display_element($child, $children_elements, $max_depth, $depth, $args, $output);
      }

      unset($children_elements[$id]);
    }
  }

  /**
   * Starts the element output.
   *
   * @since 2.7.0
   *
   * @see Walker::start_el()
   * @see wp_list_comments()
   * @global int        $comment_depth
   * @global WP_Comment $comment       Global comment object.
   *
   * @param string     $output  Used to append additional content. Passed by reference.
   * @param WP_Comment $comment Comment data object.
   * @param int        $depth   Optional. Depth of the current comment in reference to parents. Default 0.
   * @param array      $args    Optional. An array of arguments. Default empty array.
   * @param int        $id      Optional. ID of the current comment. Default 0 (unused).
   */
  public function start_el(&$output, $comment, $depth = 0, $args = array(), $id = 0)
  {
    $depth++;
    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment']       = $comment;

    if (!empty($args['callback'])) {
      ob_start();
      call_user_func($args['callback'], $comment, $args, $depth);
      $output .= ob_get_clean();
      return;
    }

    if ('comment' === $comment->comment_type) {
      add_filter('comment_text', array($this, 'filter_comment_text'), 40, 2);
    }

    if (('pingback' === $comment->comment_type || 'trackback' === $comment->comment_type) && $args['short_ping']) {
      ob_start();
      $this->ping($comment, $depth, $args);
      $output .= ob_get_clean();
    } elseif ('html5' === $args['format']) {
      ob_start();
      $this->html5_comment($comment, $depth, $args);
      $output .= ob_get_clean();
    } else {
      ob_start();
      $this->comment($comment, $depth, $args);
      $output .= ob_get_clean();
    }

    if ('comment' === $comment->comment_type) {
      remove_filter('comment_text', array($this, 'filter_comment_text'), 40);
    }
  }

  /**
   * Ends the element output, if needed.
   *
   * @since 2.7.0
   *
   * @see Walker::end_el()
   * @see wp_list_comments()
   *
   * @param string     $output  Used to append additional content. Passed by reference.
   * @param WP_Comment $comment The current comment object. Default current comment.
   * @param int        $depth   Optional. Depth of the current comment. Default 0.
   * @param array      $args    Optional. An array of arguments. Default empty array.
   */
  public function end_el(&$output, $comment, $depth = 0, $args = array())
  {
    if (!empty($args['end-callback'])) {
      ob_start();
      call_user_func($args['end-callback'], $comment, $args, $depth);
      $output .= ob_get_clean();
      return;
    }
    if ('div' === $args['style']) {
      $output .= "</div><!-- #comment-## -->\n";
    } else {
      $output .= "</li><!-- #comment-## -->\n";
    }
  }

  /**
   * Outputs a pingback comment.
   *
   * @since 3.6.0
   *
   * @see wp_list_comments()
   *
   * @param WP_Comment $comment The comment object.
   * @param int        $depth   Depth of the current comment.
   * @param array      $args    An array of arguments.
   */
  protected function ping($comment, $depth, $args)
  {
    $tag = ('div' === $args['style']) ? 'div' : 'li';
?>
    <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class('', $comment); ?>>
      <div class="comment-body">
        <?php _e('Pingback:'); ?> <?php comment_author_link($comment); ?> <?php edit_comment_link(__('Edit'), '<span class="edit-link">', '</span>'); ?>
      </div>
    <?php
  }

  /**
   * Filters the comment text.
   *
   * Removes links from the pending comment's text if the commenter did not consent
   * to the comment cookies.
   *
   * @since 5.4.2
   *
   * @param string          $comment_text Text of the current comment.
   * @param WP_Comment|null $comment      The comment object. Null if not found.
   * @return string Filtered text of the current comment.
   */
  public function filter_comment_text($comment_text, $comment)
  {
    $commenter          = wp_get_current_commenter();
    $show_pending_links = !empty($commenter['comment_author']);

    if ($comment && '0' == $comment->comment_approved && !$show_pending_links) {
      $comment_text = wp_kses($comment_text, array());
    }

    return $comment_text;
  }

  /**
   * !Outputs a single comment. (вывод одного комментария)
   *
   * @since 3.6.0
   *
   * @see wp_list_comments()
   *
   * @param WP_Comment $comment Comment to display.
   * @param int        $depth   Depth of the current comment.
   * @param array      $args    An array of arguments.
   */
  protected function comment($comment, $depth, $args)
  {
    if ('div' === $args['style']) {
      $tag       = 'div';
      $add_below = 'comment';
    } else {
      $tag       = 'li';
      $add_below = 'div-comment';
    }

    $commenter          = wp_get_current_commenter();
    $show_pending_links = isset($commenter['comment_author']) && $commenter['comment_author'];

    if ($commenter['comment_author_email']) {
      $moderation_note = __('Your comment is awaiting moderation.');
    } else {
      $moderation_note = __('Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.');
    }
    ?>
      <<?php echo $tag; ?> <?php comment_class($this->has_children ? 'parent' : '', $comment); ?> id="comment-<?php comment_ID(); ?>">
        <?php if ('div' !== $args['style']) : ?>
          <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
          <?php endif; ?>
          <div class="comment-author vcard">
            <?php
            if (0 != $args['avatar_size']) {
              echo get_avatar($comment, $args['avatar_size']);
            }
            ?>
            <?php
            $comment_author = get_comment_author_link($comment);

            if ('0' == $comment->comment_approved && !$show_pending_links) {
              $comment_author = get_comment_author($comment);
            }

            printf(
              /* translators: %s: Comment author link. */
              __('%s <span class="says">says:</span>'),
              sprintf('<cite class="fn">%s</cite>', $comment_author)
            );
            ?>
          </div>
          <?php if ('0' == $comment->comment_approved) : ?>
            <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
            <br />
          <?php endif; ?>

          <div class="comment-meta commentmetadata">
            <?php
            printf(
              '<a href="%s">%s</a>',
              esc_url(get_comment_link($comment, $args)),
              sprintf(
                /* translators: 1: Comment date, 2: Comment time. */
                __('%1$s at %2$s'),
                get_comment_date('', $comment),
                get_comment_time()
              )
            );

            edit_comment_link(__('(Edit)'), ' &nbsp;&nbsp;', '');
            ?>
          </div>

          <?php
          comment_text(
            $comment,
            array_merge(
              $args,
              array(
                'add_below' => $add_below,
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
              )
            )
          );
          ?>

          <?php
          comment_reply_link(
            array_merge(
              $args,
              array(
                'add_below' => $add_below,
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'before'    => '<div class="reply">',
                'after'     => '</div>',
              )
            )
          );
          ?>

          <?php if ('div' !== $args['style']) : ?>
          </div>
        <?php endif; ?>
      <?php
    }

    /**
     *! Outputs a comment in the HTML5 format.
     *
     * @since 3.6.0
     *
     * @see wp_list_comments()
     *
     * @param WP_Comment $comment Comment to display.
     * @param int        $depth   Depth of the current comment.
     * @param array      $args    An array of arguments.
     */
    protected function html5_comment($comment, $depth, $args)
    {
      $tag = ('div' === $args['style']) ? 'div' : 'li';

      $commenter          = wp_get_current_commenter();
      $show_pending_links = !empty($commenter['comment_author']);

      if ($commenter['comment_author_email']) {
        $moderation_note = __('Ваш комментарий ждет модерации.');
      } else {
        $moderation_note = __('Ваш комментарий ждет модерации. Это превью. Ваш комментарий будет опубликован после проверки');
      }
      ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>>
          <article id="div-comment-<?php comment_ID(); ?>" class="single-comment justify-content-between d-flex">

            <div class="d-flex">
              <?php
              if (0 != $args['avatar_size']) {
                echo get_avatar($comment, $args['avatar_size'], 'mystery', '', array('class' => 'thumb'));
              }
              ?>
              <footer class="user justify-content-between flex-column  d-flex">

                <?php
                $comment_author = get_comment_author_link($comment);

                if ('0' == $comment->comment_approved && !$show_pending_links) {
                  $comment_author = get_comment_author($comment);
                }

                printf(
                  /* translators: %s: Comment author link. */
                  __('%s '),
                  sprintf('<h5>%s</h5>', $comment_author)
                );
                ?>


                <div class="desc">
                  <?php
                  printf(
                    '<a href="%s" class="date"><time datetime="%s">%s</time></a>',
                    esc_url(get_comment_link($comment, $args)),
                    get_comment_time('c'),
                    sprintf(
                      /* translators: 1: Comment date, 2: Comment time. */
                      __('%1$s at %2$s'),
                      get_comment_date('j F Y', $comment),
                      get_comment_time('')
                    )
                  );

                  edit_comment_link(__('Edit'), ' <span class="edit-link">', '</span>');
                  ?>

                  <?php if ('0' == $comment->comment_approved) : ?>
                    <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
                  <?php endif; ?>
                  <div class="comment">
                    <?php comment_text(); ?>
                  </div><!-- .comment-content -->
                </div><!-- .comment-metadata -->

              </footer><!-- .comment-meta -->

            </div>

            <?php
            if ('1' == $comment->comment_approved || $show_pending_links) {
              comment_reply_link(
                array_merge(
                  $args,
                  array(
                    'add_below' => 'div-comment',
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<div class="reply d-flex align-items-start">',
                    'after'     => '</div>',
                  )
                )
              );
            }
            ?>
          </article><!-- .comment-body -->
      <?php
    }
  }

  // ! граватар
  add_filter('avatar_defaults', 'wpb_new_gravatar');
  function wpb_new_gravatar($avatar_defaults)
  {
    $myavatar = 'https://alexander-shnipov.ru/wp-content/uploads/2022/01/IMG_0236-scaled.jpg';
    $avatar_defaults[$myavatar] = "Default Gravatar";
    return $avatar_defaults;
  }

  //! создать виджеты
  add_action('widgets_init', 'sensive_widgets_init');
  function sensive_widgets_init()
  {  

    register_sidebar(array(
      'name'          => 'Сайдбар блога',
      'id'            => "sidebar-blog",
      'before_widget' => '<section id="%1$s" class="single-sidebar-widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="single-sidebar-widget__title">',
      'after_title'   => '</h4>'
    ));

    register_sidebar(array(
      'name'          => 'Сайдбар туров',
      'id'            => 'sidebar-tours',
      'before_widget' => '<section id="%1$s" class="single-sidebar-widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="single-sidebar-widget__title">',
      'after_title'   => '</h4>'
    ));

    register_sidebar(array(
      'name'          => 'Сайдбар в подвале текст',
      'id'            => "sidebar-footer-text",
      'before_widget' => '<section id="%1$s" class="single-footer-widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h6>',
      'after_title'   => '</h6>'
    ));

    register_sidebar(array(
      'name'          => 'Социальные сети в подвале',
      'id'            => "sidebar-footer-social",
      'before_widget' => '<section id="%1$s" class="single-footer-widget footer-social d-flex align-items-center  %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h6>',
      'after_title'   => '</h6>',
      'after_title'   => '<p class="footer-social__slogan">Давайте будем социальными</p>'
    ));

    register_sidebar(array(
      'name'          => 'Сайдбар на главной',
      'id'            => "sidebar-front-page",
      'before_widget' => '<section id="%1$s" class="single-sidebar-widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h4 class="single-sidebar-widget__title">',
      'after_title'   => '</h4>'
    ));
  }


  function wpse120407_pre_get_posts( $query ) {
    // Test for category archive index
    // and ensure that the query is the main query
    // and not a secondary query (such as a nav menu
    // or recent posts widget output, etc.
    if ( is_category() && $query->is_main_query() ) {
        // Modify posts per page
        $query->set( 'posts_per_page', 5 ); 
    }
}
add_action( 'pre_get_posts', 'wpse120407_pre_get_posts' );