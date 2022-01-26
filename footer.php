 <!--================ Start Footer Area =================-->
 <footer class="footer-area section-padding mb-auto">
   <div class="container">
     <div class="row">

       <div class="col-lg-3  col-md-6 col-sm-6">
         <div class="single-footer-widget">
           <?php get_sidebar('footer-text') ?>
         </div>
       </div>

       <div class="col-lg-3  col-md-6 col-sm-6">
         <div class="single-footer-widget">

           <h6>Подпишитесь на нас</h6>
           <p>Будьте в курсе наших новостей</p>
           <div>
             <form action="https://app.getresponse.com/add_subscriber.html" accept-charset="utf-8" method="post">
               <div class="d-flex flex-row">
                 <input class="form-control" placeholder="Ведите Email" type="text" name="email" required /><br />
                 <!-- List token -->
                 <!-- Get the token at: https://app.getresponse.com/campaign_list.html -->
                 <input class="form-control" type="hidden" name="campaign_token" value="ZcrCV" />
                 <!-- Thank you page (optional) -->
                 <input type="hidden" name="thankyou_url" value="<?php echo home_url('thankyou'); ?>" />
                 <!-- Add subscriber to the follow-up sequence with a specified day (optional) -->
                 <button class="click-btn btn btn-default" type="submit" name="start_day" value="0"><span class="lnr lnr-arrow-right"></span></button>
                 <!-- Subscriber button -->
                 <div style="position: absolute; left: -5000px;">
                   <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                 </div>
               </div>
             </form>

           </div>
         </div>
       </div>




       <div class="col-lg-3  col-md-6 col-sm-6">
         <div class="single-footer-widget mail-chimp">
           <?php get_sidebar('footer-gallery') ?>
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
       <?php the_field('title-copyright', 32);
        echo date('Y ');
        the_field('text-copyright', 32); ?> <a href="https://colorlib.com" target="_blank">Colorlib</a>
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