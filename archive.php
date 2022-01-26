<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>

          <?php
          if (is_category()) {
            echo get_queried_object()->name;
          }
          if (is_tag()) {
            echo get_queried_object()->name;
          }
          if (is_author()) {
            echo get_the_author_meta('display_name');
          }
          if (is_date()) {
            echo get_the_date('j F Y');
          }
          ?>
        </h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo get_permalink(32); ?>"><?php echo get_the_title(32);?></a></li>
            <li class="breadcrumb-item active" aria-current="page">Архив</li>
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
      <div class="col-lg-8">
        <div class="row">

          <!-- цикл постов -->
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <!-- Вывод постов, функции цикла: the_title() и т.д. -->
            <div class="col-lg-6 single-recent-blog-post">
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
                  <div class="thumb">
                    <ul class="thumb-info">
                      <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="ti-user"></i><?php the_author(); ?></a></li>
                      <li><a href="<?php echo get_the_permalink() ?>"><i class="ti-themify-favicon"></i><?php comments_number() ?></a></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="<?php echo get_the_permalink() ?>">
                      <h3><?php echo title(13); ?></h3>
                    </a>
                    <p><?php echo excerpt(14); ?></p>
                    <a class="button" href="<?php echo get_the_permalink() ?>">Читать далее <i class="ti-arrow-right"></i></a>
                  </div>
                </div>

              <?php endwhile;
          else : ?>
                К сожалению, ни один из постов не подошел под ваши критерии.
            <?php endif; ?>
            <!-- цикл постов -->
              </div>

              <!-- цикл постов -->


              <div class="row">
                <div class="col-lg-12">
                  <nav class="blog-pagination justify-content-center d-flex">
                    <ul class="pagination">
                    <?php wp_pagenavi(); ?>
                    </ul>
                  </nav>
                </div>
              </div>
        </div>

        <!-- Start Blog Post Siddebar -->
        <?php get_sidebar(); ?>
      </div>
      <!-- End Blog Post Siddebar -->
    </div>
</section>
<!--================ End Blog Post Area =================-->
<?php get_footer() ?>