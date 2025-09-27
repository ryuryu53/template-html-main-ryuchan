<?php get_header(); ?>

  <div class="page-404-area">
    <!-- パンくず -->
    <?php get_template_part( 'parts/breadcrumbs' ); ?>

    <!-- 404 -->
    <section class="layout-page-404 page-404">
      <div class="page-404__inner inner">
        <div class="page-404__title section-header">
          <h1 class="section-header__404-title">404</h1>
        </div>
        <p class="page-404__text">申し訳ありません。<br>お探しのページが見つかりません。</p>
        <div class="page-404__btn">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="button button--reverse"><span class="button__text button__text--reverse">Page&nbsp;TOP</span></a>
        </div>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>
