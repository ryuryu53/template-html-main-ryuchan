<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--blog-single js-mv-height">
    <div class="sub-mv__header">
      <div class="sub-mv__title">Blog</div>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- ブログ詳細 -->
  <div class="layout-two-column two-column">
    <div class="two-column__inner inner">
      <div class="two-column__article single-article">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article class="single-article__item single-body">
            <div class="single-body__meta">
              <time datetime="<?php the_time( 'c' ); ?>" class="single-body__date"><?php the_time( 'Y.m.d' ); ?></time>
              <h1 class="single-body__title"><?php the_title(); ?></h1>
            </div>
            <picture class="single-body__img">
              <?php if ( get_the_post_thumbnail() ) : ?>
                <source srcset="<?php the_post_thumbnail_url( 'full' ); ?>">  <!-- jpg使用のため「type="image/webp"」を削除 -->
                <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
              <?php else : ?>
                <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/noimage.png" alt="noimage">
              <?php endif; ?>
            </picture>
            <!-- これ以下はWP化したときにクラス名がつけられない。クラス名をつけてCSSを当ててはいけない -->
            <div class="single-body__content">
              <?php the_content(); ?>
            </div>
          </article>
        <?php endwhile; endif; ?>

        <div class="single-article__page-link">
          <?php
            $prev = get_previous_post();
            if ( ! empty( $prev ) ) {
              $prev_url = esc_url( get_permalink( $prev->ID ) );
            }

            $next = get_next_post();
            if ( ! empty( $next ) ) {
              $next_url = esc_url( get_permalink( $next->ID ) );
            }
          ?>
          <div class="page-link">
            <div class="page-link__flex">
              <?php if ( ! empty( $prev ) ) : ?>
                <a class="page-link__prev" rel="prev" href="<?php echo $prev_url; ?>"></a>
              <?php endif; ?>
              <?php if ( ! empty( $next ) ) : ?>
                <a class="page-link__next" rel="next" href="<?php echo $next_url; ?>"></a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>

      <!-- サイドバー -->
      <aside class="two-column__aside">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>

<?php get_footer(); ?>
