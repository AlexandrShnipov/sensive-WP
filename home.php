<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1><?php echo the_field('title', 193); ?></h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo get_permalink(32); ?>">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo the_field('title', 193); ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--================ Hero sm Banner end =================-->

<!--================ Start Blog Post Area =================-->
<section class="blog-post-area section-margin mt-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">

        <!-- цикл постов -->

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <!-- Вывод постов, функции цикла: the_title() и т.д. -->
            <div class="single-recent-blog-post">
              <div class="thumb">
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
                  echo '<img class="img-fluid w-100" src="' . get_template_directory_uri() . '/img/blog/dummi.jpg"/>';
                }
                ?>
                <ul class="thumb-info">
                  <li>
                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                      <i class="ti-user"></i><?php the_author(); ?>
                    </a>
                  </li>
                  <li>
                    <a href="<?php echo get_the_permalink() ?>"><i class="ti-notepad"></i><?php the_time('j F Y'); ?></a>
                  </li>
                  <li>
                    <a href="<?php echo get_the_permalink() ?>"><i class="ti-themify-favicon"></i><?php comments_number(); ?></a>
                  </li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="<?php echo get_the_permalink() ?>">
                  <h3><?php the_title(); ?></h3>
                </a>
                <p class="tag-list-inline"><?php the_tags() ?></p>
                <p><?php the_excerpt(); ?></p>
                <a class="button" href="<?php echo get_the_permalink() ?>">Читать далее <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          <?php endwhile;
        else : ?>
          Записей нет.
        <?php endif; ?>
        <!-- цикл постов -->



        <div class="row">
          <div class="col-lg-12">
            <nav class="blog-pagination justify-content-center d-flex flex-nowrap ">
              <ul class="pagination">

                <?php the_posts_pagination(
                  array(
                    'show_all'     => false, // показаны все страницы участвующие в пагинации
                    'end_size'     => 1,     // количество страниц на концах
                    'mid_size'     => 1,     // количество страниц вокруг текущей
                    'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                    'prev_text'    => __('<span class="page-link page-item m-1">&#x3C;</span></span>'),
                    'next_text'    => __('<span class="page-link page-item m-1">&#x3E;</span></span>'),
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
<?php get_footer() ?>