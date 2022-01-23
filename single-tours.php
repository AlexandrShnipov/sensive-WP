<?php get_header(); ?>

<!--================ Hero sm Banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
      <h1><?php echo the_field('title-tour', 11);?></h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo get_permalink(32); ?>"><?php echo get_the_title(32);?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo get_permalink(11); ?>"><?php echo get_the_title(11);?></a></li>
            <li class="breadcrumb-item active" aria-current="page">
            <?php echo the_field('title-tour', 11);?></li>
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

          get_template_part('template-parts/content', 'tours');

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
      <?php get_sidebar(); ?>
    </div>
    <!-- End Blog Post Siddebar -->
  </div>
</section>
<!--================ End Blog Post Area =================-->

<?php get_footer(); ?>