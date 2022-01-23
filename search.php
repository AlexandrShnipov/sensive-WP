<?php get_header(); ?>
<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1>
          <?php
          /* translators: %s: search query. */
          printf(esc_html__('Результаты поиска по фразе: %s', 'word'), '<span>' . get_search_query() . '</span>');
          ?>
        </h1>
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
                      <li><a href="#"><i class="ti-user"></i><?php the_author(); ?></a></li>
                      <li><a href="#"><i class="ti-themify-favicon"></i><?php comments_number() ?></a></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="<?php echo get_the_permalink() ?>">
                      <h3><?php the_title(); ?></h3>
                    </a>
                    <p><?php the_excerpt(); ?></p>
                    <a class="button" href="<?php echo get_the_permalink() ?>">Читать далее <i class="ti-arrow-right"></i></a>
                  </div>
                </div>

              <?php endwhile;
          else : ?>
              'К сожалению, ни один из постов не подошел под ваши критерии.
            <?php endif; ?>
            <!-- цикл постов -->
              </div>

              <!-- цикл постов -->


              <div class="row">
                <div class="col-lg-12">
                  <nav class="blog-pagination justify-content-center d-flex">
                    <ul class="pagination">
                      <?php
                      wp_pagenavi();
                      
                      get_the_posts_pagination(
                        array(
                          'show_all'     => false, // показаны все страницы участвующие в пагинации
                          'end_size'     => 1,     // количество страниц на концах
                          'mid_size'     => 1,     // количество страниц вокруг текущей
                          'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                          'prev_text'    => __('<span class="page-link page-item ti-angle-left m-1"</span>'),
                          'next_text'    => __('<span class="page-link page-item ti-angle-right m-1"</span>'),
                          'before_page_number' => '<span class="page-link">',
                          'after_page_number' => '</span>',
                          'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                          'screen_reader_text' => __('Posts navigation'),
                        )
                      ); ?>
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

<?php get_footer(); ?>