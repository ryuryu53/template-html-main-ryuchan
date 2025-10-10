<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--site-map js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Privacy&nbsp;Policy</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part( 'parts/breadcrumbs' ); ?>

  <!-- プライバシーポリシー -->
  <section class="layout-page-template page-template">
    <div class="page-template__inner inner">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="page-template__title section-header">
          <h2 class="section-header__title"><?php the_title(); ?></h2>
        </div>
        <div class="page-template__text-block">
          <!-- 編集画面でli要素を入力し直すと番号と文字が詰まってしまう現象発生 → GutenbergやTinyMCEは編集時にユーザーが入力していなくても、保存 → 再編集 → 保存を繰り返すうちにHTML内の空白（&nbsp; ではない通常の半角スペース）が削除または改行位置変更されることがある（ブラウザは ::before 疑似要素と文字の間に自動的にスペースを補わない仕様） 25.10.10 -->
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </section>

<?php get_footer(); ?>
