<?php get_header();?>
 <!--================ Hero sm banner start =================-->
 <section class="mb-30px">
    <div class="container">
      <div class="hero-banner hero-banner--sm">
        <div class="hero-banner__content">
          <h1>404 Страница не найдена</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo get_permalink(32); ?>">Главная</a></li>
              <li class="breadcrumb-item active" aria-current="page">404 страница не найдена</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--================ Hero sm banner end =================-->
<?php get_footer();?>