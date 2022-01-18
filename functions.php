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


//! подключение стилей и скриптов

add_action('wp_enqueue_scripts', 'sensive_scripts');

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
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/vendors/linericon/style.css', array('main'), null);

  //owl-carousel
  wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/vendors/owl-carousel/owl.carousel.min.css', array('main'), null);

  // подключаем основные стили
  wp_enqueue_style('sensive', get_template_directory_uri() . '/css/style.css', array('main'), null);

  //! переподключаем jQuery
  wp_deregister_script('jquery');
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

  // main
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}

// ! регистрируем несколько областей меню
function sensive_menus()
{

  $locations = array(

    // собираем несколько зон (областей ) меню 
    'header'   => __('Header Menu', 'sensive'),
    'menu-social-header'   => __('Menu Social Header', 'sensive'),
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
