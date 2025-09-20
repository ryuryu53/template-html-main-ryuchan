<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--blog js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Blog</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- ブログ一覧 -->
  <div class="layout-two-column two-column">
    <div class="two-column__inner inner">
      <div class="two-column__article column-article">
        <div class="column-article__items blog-cards blog-cards--2col">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="blog-cards__item blog-card">
              <a href="<?php the_permalink(); ?>" class="blog-card__link">
                <picture class="blog-card__img">
                  <?php if ( get_the_post_thumbnail() ) : ?>
                    <source srcset="<?php the_post_thumbnail_url( 'full' ); ?>">  <!-- jpg使用のため「type="image/webp"」を削除 -->
                    <img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                  <?php else : ?>
                    <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/noimage.png" alt="noimage">
                  <?php endif; ?>
                </picture>
                <div class="blog-card__body">
                  <time datetime="<?php the_time( 'c' ); ?>" class="blog-card__date"><?php the_time( 'Y.m.d' ); ?></time>
                  <h3 class="blog-card__title text--medium"><?php the_title(); ?></h3>
                  <p class="blog-card__text text--black-pc">
                    <?php
                      // 投稿本文を取得
                      // $postオブジェクトには、その投稿に関連するさまざまな情報が格納されている
                      // post_contentは、投稿オブジェクト（$post）のプロパティの一つで、その投稿の本文（記事の内容）が保存されている
                      $content = $post->post_content;

                      // 文字数を制限（ここでは110文字 → これでカンプの文字数と一致する）
                      // mb_strlen: 文字数を数える関数。UTF-8を指定することで日本語を正しく数えられる
                      if ( mb_strlen( $content, 'UTF-8' ) > 110 ) {
                        // mb_substr: 文字列の一部を取り出す関数（110文字取り出す）
                        $content = mb_substr( $content, 0, 110, 'UTF-8' ) . '...';
                      }

                      // コメントや不要なタグを削除（HTMLタグは維持してもOKなら、2番目のパラメータに指定 → <p>タグOKだと.blog-card__textの外に<p>タグができてそこにテキストが入ってしまう！）
                        $content = strip_tags( $content );

                      // 改行を<br>タグに変換 → <br>タグがテキストの上にできてしまう！
                      // $content_with_breaks = nl2br( $content );

                      // 整形したコンテンツを出力
                      echo $content;
                    ?>
                  </p>
                </div>
              </a>
            </article>
          <?php endwhile; endif; ?>
        </div>

        <!-- ページナビゲーション -->
        <div class="column-article__wp-pagenavi">
          <?php wp_pagenavi(); ?>
        </div>
      </div>

      <!-- サイドバー -->
      <aside class="two-column__aside">
        <?php get_sidebar(); ?>
      </aside>
    </div>
  </div>

<?php get_footer(); ?>
