<?php get_header(); ?>
<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
      <h1><?php echo the_field('title',$post->ID);?></h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo get_permalink(32); ?>">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo the_field('title',$post->ID); ?></li>
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
                  echo '<img class="img-fluid" src="' . get_template_directory_uri() . '/img/blog/dummi.jpg"/>';
                }
                ?>
                <ul class="thumb-info">
                  <li><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><i class="ti-user"></i><?php the_author(); ?></a></li>
                  <li><a href="#"><i class="ti-notepad"></i><?php the_time('j F Y'); ?></a></li>
                  <li><a href="#"><i class="ti-themify-favicon"></i><?php comments_number(); ?></a></li>
                </ul>
              </div>
              <div class="details mt-20">
                <a href="<?php echo get_the_permalink() ?>">
                  <h3><?php the_title();?></h3>
                </a>
                <p><?php the_excerpt();?></p>

            
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

        <div class="row">
          <div class="col-lg-12">
            <nav class="blog-pagination justify-content-center d-flex">
              <ul class="pagination">
              <?php the_posts_pagination(
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

                <li class="page-item">
                  <a href="#" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="ti-angle-left"></i>
                    </span>
                  </a>
                </li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item">
                  <a href="#" class="page-link" aria-label="Next">
                    <span aria-hidden="true">
                      <i class="ti-angle-right"></i>
                    </span>
                  </a>
                </li>

              </ul>
            </nav>
          </div>
        </div>
      </div>

      <!-- Start Blog Post Siddebar -->
    
      <?php get_sidebar('tours') ?>
    </div>
    <!-- End Blog Post Siddebar -->
  </div>
</section>
<!--================ End Blog Post Area =================-->
<?php get_footer(); ?>