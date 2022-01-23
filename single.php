<?php
  $post = $wp_query->post;
 
  if (in_category('tours')) { //slug  категории
      include(TEMPLATEPATH.'/single-tours.php');
  }
   else {
      include(TEMPLATEPATH.'/single-default.php');
  }

  
