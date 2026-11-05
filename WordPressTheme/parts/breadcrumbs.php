<nav class="breadcrumbs" aria-label="パンくずリスト">
  <div class="breadcrumbs__inner <?php if ( is_404() ) { echo 'breadcrumbs__inner--white'; } ?> inner">
    <ol class="breadcrumbs__list">
      <?php
        if ( function_exists( 'bcn_display_list' ) ) {
          bcn_display_list();
        }
      ?>
    </ol>
  </div>
</nav>

<?php /* 旧コード
<div class="breadcrumbs">
  <div class="breadcrumbs__inner <?php if ( is_404() ) { echo 'breadcrumbs__inner--white'; } ?> inner">
    <?php
      if ( function_exists( 'bcn_display' ) ) {
        bcn_display();
      }
      ?>
  </div>
</div>
*/ ?>
