<?php get_header(); ?>
<main class="site-main">
  <!--================Hero Banner start =================-->
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner">
        <div class="hero-banner__content">
          <h3><?php echo the_field('subtitle', $post->ID); ?></h3>
          <h1><?php echo the_field('title', $post->ID); ?></h1>
          <h4></h4>
        </div>
      </div>
    </div>
  </section>
  <!--================Hero Banner end =================-->

  <!--================ Blog slider start =================-->
  <section>
    <div class="container">
      <div class="owl-carousel owl-theme blog-slider">


        <?php
        global $post;

        $query = new WP_Query([
          'posts_per_page' => 5,
          'post_type'        => 'tours',
        ]);

        if ($query->have_posts()) {
          while ($query->have_posts()) {
            $query->the_post();
        ?>

            <div class="owl-stage-outer">
              <div class="card blog__slide text-center">
                <div class="blog__slide__img">
                  <?php
                  //должно находится внутри цикла
                  if (has_post_thumbnail()) {
                    the_post_thumbnail(
                      'slider',
                      array(
                        'class' => "card-img rounded-0"
                      )
                    );
                  } else {
                    echo '<img class="card-img rounded-0" src="' . get_template_directory_uri() . '/img/blog/dummi.jpg"/>';
                  }
                  ?>
                </div>
                <div class="blog__slide__content">
                  <h3><a href="<?php echo get_the_permalink() ?>"><?php the_title(); ?></a></h3>
                  <p><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' назад'; ?></p>
                </div>
              </div>
            </div>

        <?php
          }
        } else {
          // Постов не найдено
        }
        wp_reset_postdata(); // Сбрасываем $post
        ?>

      </div>
    </div>
  </section>
  <!--================ Blog slider end =================-->

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin mt-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">

          <?php
          global $post;

          $query = new WP_Query([
            'posts_per_page' => 4,
            'post_type' => 'post',
          ]);

          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post();
          ?>
              <div class="single-recent-blog-post">
                <div class="thumb">
                  <?php if (has_post_thumbnail()) {
                    the_post_thumbnail(
                      'post-thumbnail',
                      array(
                        'class' => "img-fluid w-100"
                      )
                    );
                  } else {
                    echo '<img class="img-fluid" src="' . get_template_directory_uri() . '/img/blog/dummi.jpg"/>';
                  } ?>
                  <img class="img-fluid" src="img/blog/blog1.png" alt="">
                  <ul class="thumb-info">
                    <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="ti-user"></i><?php the_author() ?></a></li>
                    <li><a href="#"><i class="ti-notepad"></i><?php the_time('j F Y'); ?></a></li>
                    <li><a href="#"><i class="ti-themify-favicon"></i><?php comments_number() ?></a></li>
                  </ul>
                </div>
                <div class="details mt-20">
                  <a href="<?php echo get_the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                  </a>
                  <p class="tag-list-inline">Категории: <?php the_category(', '); ?></p>
                  <p class="tag-list-inline"><?php the_tags(); ?></p>
                  <?php the_excerpt(); ?>
                  <a class="button" href="<?php echo get_the_permalink() ?>">Читать далее <i class="ti-arrow-right"></i></a>
                </div>
              </div>
          <?php
            }
          } else {
            // Постов не найдено
          }

          wp_reset_postdata(); // Сбрасываем $post
          ?>

        </div>

        <!-- Start Blog Post Siddebar -->

        <?php get_sidebar('front-page'); ?>


        <!-- <div class="single-sidebar-widget newsletter-widget">
                  <h4 class="single-sidebar-widget__title">Newsletter</h4>
                  <div class="form-group mt-30">
                    <div class="col-autos">
                      <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Enter email'">
                    </div>
                  </div>
                  <button class="bbtns d-block mt-20 w-100">Subcribe</button>
                </div> -->


        <div class="single-sidebar-widget popular-post-widget">
          <h4 class="single-sidebar-widget__title">Popular Post</h4>
          <div class="popular-post-list">
            <div class="single-post-list">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb1.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#">Adam Colinge</a></li>
                  <li><a href="#">Dec 15</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h6>Accused of assaulting flight attendant miktake alaways</h6>
                </a>
              </div>
            </div>
            <div class="single-post-list">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb2.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#">Adam Colinge</a></li>
                  <li><a href="#">Dec 15</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h6>Tennessee outback steakhouse the
                    worker diagnosed</h6>
                </a>
              </div>
            </div>
            <div class="single-post-list">
              <div class="thumb">
                <img class="card-img rounded-0" src="img/blog/thumb/thumb3.png" alt="">
                <ul class="thumb-info">
                  <li><a href="#">Adam Colinge</a></li>
                  <li><a href="#">Dec 15</a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="blog-single.html">
                  <h6>Tennessee outback steakhouse the
                    worker diagnosed</h6>
                </a>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- End Blog Post Siddebar -->
    </div>
  </section>
  <!--================ End Blog Post Area =================-->
</main>

<?php get_footer(); ?>