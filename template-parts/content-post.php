<div class="main_blog_details">
  <?php
  //должно находится внутри цикла
  if (has_post_thumbnail()) {
    the_post_thumbnail(
      'post-thumbnail',
      array(
        'class' => "img-fluid w-100"
      )
    );
  } else {
    echo '<img class="img-fluid" src="' . get_template_directory_uri() . '/img/blog/dummi.jpg"/>';
  }
  ?>
  <a href="#">
    <h4><?php the_title(); ?></h4>
  </a>
  <div class="user_details">
    <div class="float-left">
      <a href="#">Lifestyle</a>
      <a href="#">Gadget</a>
    </div>
    <div class="float-right mt-sm-0 mt-3">
      <div class="media">
        <div class="media-body">
          <h5><?php the_author(); ?></h5>
          <p><?php the_time('j F Y G:i'); ?></p>
        </div>
        <div class="d-flex">
          <?php echo get_avatar(get_the_author_meta('user_email'), 42); ?>
        </div>
      </div>
    </div>
  </div>

  <blockquote class="blockquote">
    <?php if (has_excerpt()) {
      the_excerpt();
    } else {} ?>
  </blockquote>
  <?php the_content(); ?>
  <div class="news_d_footer flex-column flex-sm-row">
    <span class="mr-2"><i class="ti-themify-favicon"></i></span><?php comments_number() ?>
    <div class="news_socail ml-sm-auto mt-sm-0 mt-2 d-flex">

      <!-- !  -->
      <?php wp_nav_menu([
        'theme_location'  => 'menu-social-footer',
        'container'       => false,
        'menu_class'      => 'news_socail ml-sm-auto mt-sm-0 mt-2 d-flex',
        'menu_id'         => false,
        'echo'            => true,
        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',

      ]); ?>
     
    </div>
  </div>
</div>