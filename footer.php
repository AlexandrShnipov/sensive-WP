 <!--================ Start Footer Area =================-->
 <footer class="footer-area section-padding">
   <div class="container">
     <div class="row">
       <div class="col-lg-3  col-md-6 col-sm-6">
         <div class="single-footer-widget">
           <?php get_sidebar('footer-text') ?>
         </div>
       </div>
       <div class="col-lg-3  col-md-6 col-sm-6">
         <div class="single-footer-widget">
           <h6>Newsletter</h6>
           <p>Stay update with our latest</p>
           <div class="" id="mc_embed_signup">

             <form target="_blank" novalidate="true" action="" method="get" class="form-inline">
               <div class="d-flex flex-row">
                 <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                 <button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
                 <div style="position: absolute; left: -5000px;">
                   <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                 </div>
                 <!-- <div class="col-lg-4 col-md-4">
                        <button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
                      </div>  -->
               </div>
               <div class="info"></div>
             </form>
           </div>
         </div>
       </div>
       <div class="col-lg-3  col-md-6 col-sm-6">
         <div class="single-footer-widget mail-chimp">
           <h6 class="mb-20">Instragram Feed</h6>
           <ul class="instafeed d-flex flex-wrap">
             <li><img src="img/instagram/i1.jpg" alt=""></li>
             <li><img src="img/instagram/i2.jpg" alt=""></li>
             <li><img src="img/instagram/i3.jpg" alt=""></li>
             <li><img src="img/instagram/i4.jpg" alt=""></li>
             <li><img src="img/instagram/i5.jpg" alt=""></li>
             <li><img src="img/instagram/i6.jpg" alt=""></li>
             <li><img src="img/instagram/i7.jpg" alt=""></li>
             <li><img src="img/instagram/i8.jpg" alt=""></li>
           </ul>
         </div>
       </div>
       <div class="col-lg-3 col-md-6 col-sm-6">

         <div class="single-footer-widget">
           <?php get_sidebar('footer-social') ?>
         </div>
       </div>
     </div>
   </div>
   <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
     <p class="footer-text m-0">
       <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
       <?php the_field('title-copyright', 32); echo date('Y '); the_field('text-copyright', 32);?> <a href="<?php echo the_field('link', 32); ?>" target="_blank">Colorlib</a>
       <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
     </p>
   </div>
   </div>
 </footer>
 <!--================ End Footer Area =================-->

 <!-- <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="js/jquery.ajaxchimp.min.js"></script>
  <script src="js/mail-script.js"></script>
  <script src="js/main.js"></script> -->

 <?php wp_footer() ?>

 </body>

 </html>