<div class="main_blog_details">
  <img class="img-fluid" src="img/blog/blog4.png" alt="">
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
          <img width="42" height="42" src="img/blog/user-img.png" alt="">
        </div>
      </div>
    </div>
  </div>

  <blockquote class="blockquote">
    <?php if (has_excerpt()) {
      the_excerpt();
    } else {
      the_content();
    } ?>
  </blockquote>
  <?php the_content(); ?>
  <div class="news_d_footer flex-column flex-sm-row">
    <span class="mr-2"><i class="ti-themify-favicon"></i></span><?php comments_number() ?>
    <div class="news_socail ml-sm-auto mt-sm-0 mt-2">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-dribbble"></i></a>
      <a href="#"><i class="fab fa-behance"></i></a>
    </div>
  </div>
</div>