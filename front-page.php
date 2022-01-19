<?php get_header(); ?>
<main class="site-main">
  <!--================Hero Banner start =================-->
  <section class="mb-30px">
    <div class="container">
      <div class="hero-banner">
        <div class="hero-banner__content">
          <h3>Tours & Travels</h3>
          <h1>Amazing Places on earth</h1>
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
        <div class="card blog__slide text-center">
          <div class="blog__slide__img">
            <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide1.png" alt="">
          </div>
          <div class="blog__slide__content">
            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
            <p>2 days ago</p>
          </div>
        </div>
        <div class="card blog__slide text-center">
          <div class="blog__slide__img">
            <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide2.png" alt="">
          </div>
          <div class="blog__slide__content">
            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
            <p>2 days ago</p>
          </div>
        </div>
        <div class="card blog__slide text-center">
          <div class="blog__slide__img">
            <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide3.png" alt="">
          </div>
          <div class="blog__slide__content">
            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
            <p>2 days ago</p>
          </div>
        </div>
        <div class="card blog__slide text-center">
          <div class="blog__slide__img">
            <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide1.png" alt="">
          </div>
          <div class="blog__slide__content">
            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
            <p>2 days ago</p>
          </div>
        </div>
        <div class="card blog__slide text-center">
          <div class="blog__slide__img">
            <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide2.png" alt="">
          </div>
          <div class="blog__slide__content">
            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
            <p>2 days ago</p>
          </div>
        </div>
        <div class="card blog__slide text-center">
          <div class="blog__slide__img">
            <img class="card-img rounded-0" src="img/blog/blog-slider/blog-slide3.png" alt="">
          </div>
          <div class="blog__slide__content">
            <h3><a href="#">New york fashion week's continued the evolution</a></h3>
            <p>2 days ago</p>
          </div>
        </div>
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
                    <li><a href="#"><i class="ti-user"></i><?php the_author() ?></a></li>
                    <li><a href="#"><i class="ti-notepad"></i><?php the_time('j F Y'); ?></a></li>
                    <li><a href="#"><i class="ti-themify-favicon"></i><?php comments_number() ?></a></li>
                  </ul>
                </div>
                <div class="details mt-20">
                  <a href="<?php echo get_the_permalink(); ?>">
                    <h3><?php the_title(); ?></h3>
                  </a>         
                  <p class="tag-list-inline">Категории: <?php the_category(', '); ?></p>
                  <p class="tag-list-inline">Теги: <?php the_tags(); ?></p>
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
        <div class="col-lg-4 sidebar-widgets">
          <div class="widget-wrap">
            <div class="single-sidebar-widget newsletter-widget">
              <form action="#">
                <div class="d-flex flex-row">
                  <input class="form-control" name="q" placeholder="Search" required="" type="text" value="">
                  <button class="click-btn btn btn-default bbtns"><i class="ti-search"></i></button>
                </div>
              </form>
            </div>

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

            <div class="single-sidebar-widget post-category-widget">
              <h4 class="single-sidebar-widget__title">Category</h4>
              <ul class="cat-list mt-20">
                <li>
                  <a href="archive.html" class="d-flex justify-content-between">
                    <p>Technology</p>
                    <p>(03)</p>
                  </a>
                </li>
                <li>
                  <a href="archive.html" class="d-flex justify-content-between">
                    <p>Software</p>
                    <p>(09)</p>
                  </a>
                </li>
                <li>
                  <a href="archive.html" class="d-flex justify-content-between">
                    <p>Lifestyle</p>
                    <p>(12)</p>
                  </a>
                </li>
                <li>
                  <a href="archive.html" class="d-flex justify-content-between">
                    <p>Shopping</p>
                    <p>(02)</p>
                  </a>
                </li>
                <li>
                  <a href="archive.html" class="d-flex justify-content-between">
                    <p>Food</p>
                    <p>(10)</p>
                  </a>
                </li>
              </ul>
            </div>

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

            <div class="single-sidebar-widget tag_cloud_widget">
              <h4 class="single-sidebar-widget__title">Tags</h4>
              <ul class="list">
                <li>
                  <a href="#">project</a>
                </li>
                <li>
                  <a href="#">love</a>
                </li>
                <li>
                  <a href="#">technology</a>
                </li>
                <li>
                  <a href="#">travel</a>
                </li>
                <li>
                  <a href="#">software</a>
                </li>
                <li>
                  <a href="#">life style</a>
                </li>
                <li>
                  <a href="#">design</a>
                </li>
                <li>
                  <a href="#">illustration</a>
                </li>
              </ul>
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