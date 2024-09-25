<div class="breadcrumbs">
    <div class="breadcrumbs__inner <?php if ( is_404() ) { echo 'breadcrumbs__inner--white'; } ?> inner">
      <?php
      if ( function_exists('bcn_display') ) {
        bcn_display();
      }
      ?>
    </div>
  </div>