<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?php wp_head(); ?>

  <link rel="icon" href="img/Fevicon.png" type="image/png">

  <!-- <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/linericon/style.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css"> -->
</head>

<body>
  <!--================Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <!-- Brand and toggle get grouped for better mobile display -->

          <?php
          if (has_custom_logo()) {
            echo get_custom_logo();
          }
          ?>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">

            <!-- !  -->
            <?php wp_nav_menu([
              'theme_location'  => 'header',
              'container'       => false,
              'menu_class'      => 'nav navbar-nav menu_nav justify-content-center',
              'menu_id'         => false,
              'echo'            => true,
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'walker'          => new bootstrap_4_walker_nav_menu(),
            ]); ?>
            <!--  -->

            <!-- !  -->
             <?php wp_nav_menu([
              'theme_location'  => 'menu-social-header',
              'container'       => false,
              'menu_class'      => 'nav navbar-nav navbar-right navbar-social',
              'menu_id'         => false,
              'echo'            => true,
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              
            ]); ?>
            <!--  -->
       
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->