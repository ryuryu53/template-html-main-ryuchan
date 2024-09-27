<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="site-map-mv sub-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Terms&nbsp;of&nbsp;Service</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- 利用規約 -->
  <section class="top-page-template page-template">
    <div class="page-template__inner inner">
      <div class="page-template__title section-header">
        <h2 class="section-header__title"><?php the_title(); ?></h2>
      </div>
      <div class="page-template__text-block">
        <?php the_content(); ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
