<?php get_header(); ?>
<!--================ Hero sm banner start =================-->
<section class="mb-30px">
  <div class="container">
    <div class="hero-banner hero-banner--sm">
      <div class="hero-banner__content">
        <h1><?php echo the_field('title',$post->ID);?></h1>
        <nav aria-label="breadcrumb" class="banner-breadcrumb">
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo get_permalink(32); ?>"><?php echo get_the_title(32);?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php the_title();?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>
<!--================ Hero sm banner end =================-->


<!-- ================ contact section start ================= -->
<section class="section-margin--small section-margin">
  <div class="container">
    <div class="d-none d-sm-block mb-5 pb-4">
      <!-- <div id="map" style="height: 420px;"></div> -->
      <script>
        function initMap() {
          var uluru = {
            lat: -25.363,
            lng: 131.044
          };
          var grayStyles = [{
              featureType: "all",
              stylers: [{
                  saturation: -90
                },
                {
                  lightness: 50
                }
              ]
            },
            {
              elementType: 'labels.text.fill',
              stylers: [{
                color: '#A3A3A3'
              }]
            }
          ];
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {
              lat: -31.197,
              lng: 150.744
            },
            zoom: 9,
            styles: grayStyles,
            scrollwheel: false
          });
        }
      </script>

      <?php the_content(); ?>

    </div>


    <div class="row">
      <div class="col-md-4 col-lg-3 mb-4 mb-md-0">
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3><?php echo the_field('address-top',$post->ID);?></h3>
            <p><?php echo the_field('address-bottom',$post->ID);?></p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-headphone"></i></span>
          <div class="media-body">
            <h3><a href="tel:<?php echo the_field('tel-link',$post->ID);?>"><?php echo the_field('tel',$post->ID);?></a></h3>
            <p><?php echo the_field('working-hours',$post->ID);?></p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-email"></i></span>
          <div class="media-body">
            <h3><a href="mailto:<?php echo the_field('email',$post->ID);?>"><?php echo the_field('email',$post->ID);?></a></h3>
            <p><?php echo the_field('slogan',$post->ID);?></p>
          </div>
        </div>
      </div>
      <div class="col-md-8 col-lg-9">
        <!-- <form action="<?php echo admin_url('admin-ajax.php') ?>" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
          <input type="hidden" name="action" value="my_action">
          <div class="row">
            <div class="col-lg-5">
              <div class="form-group">
                <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
              </div>
              <div class="form-group">
                <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
              </div>
              <div class="form-group">
                <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
              </div>
            </div>
            <div class="col-lg-7">
              <div class="form-group">
                <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="5" placeholder="Enter Message"></textarea>
              </div>
            </div>
          </div>
          <div class="form-group text-center text-md-right mt-3">
            <button type="submit" class="button button--active button-contactForm">Send Message</button>
          </div>
        </form> -->
        <?php echo do_shortcode( '[contact-form-7 id="40" title="Виджет формы"]' ) ?>
      </div>
    </div>
  </div>
</section>
<!-- ================ contact section end ================= -->
<?php get_footer(); ?>