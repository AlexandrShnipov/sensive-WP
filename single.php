<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>
          Подробности блога</h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="https://alexander-shnipov.ru/Sensive/blog/">Блог</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Подробности блога</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--================ Hero sm Banner end =================-->

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin">
  <div class="container">
    <div class="row">
      <main class="col-lg-8">
        
        <?php
        while (have_posts()) :
          the_post();

          get_template_part('template-parts/content', get_post_type());

          // the_post_navigation(
          //     array(
          //         'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'word') . '</span> <span class="nav-title">%title</span>',
          //         'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'word') . '</span> <span class="nav-title">%title</span>',
          //     )
          // );

          // If comments are open or we have at least one comment, load up the comment template.
          if (comments_open() || get_comments_number()) :
            comments_template();
          endif;

        endwhile; // End of the loop.
        ?>

      
      </main>

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

<?php get_footer(); ?>