<form class="newsletter-widget" role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>" >
  <div class="d-flex flex-row">
  <input type="text" placeholder="поиск" class="form-control" value="<?php echo get_search_query() ?>" name="s" id="s">
    <button class=" click-btn btn btn-default bbtns"><i class="ti-search"></i></button>
  </div>
</form>