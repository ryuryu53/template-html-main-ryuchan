<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="price-mv sub-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title sub-mv__title--space2">Price</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- 料金一覧 -->
  <section class="top-page-price page-price">
    <div class="page-price__inner inner">
      <div class="page-price__table page-price-table">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php
            // 5つの料金表に対応するフィールド名を設定
            $price_tables = [
              'table_prices1',
              'table_prices2',
              'table_prices3',
              'table_prices4',
              'table_prices5'
            ];

            // カウンター変数を追加
            $counter = 1;

            // 各料金表について処理
            foreach ( $price_tables as $price_table_key ) :
              // テーブルタイトルと料金表情報を取得  substr($price_table_key, -1) はこの文字列の最後の1文字を取り出す
              $table_title = SCF::get('table_title' . substr($price_table_key, -1));
              $table_prices = SCF::get($price_table_key);

              // テーブルタイトルと料金表情報が存在するか確認
            if ( !empty($table_title) && !empty($table_prices) ) :
          ?>
              <div class="page-price-table__content">
                <!-- h2 タグに id を追加し、連番を付ける -->
                <h2 id="title<?php echo $counter; ?>" class="page-price-table__title"><?php echo esc_html($table_title); ?></h2>
                <dl class="page-price-table__items">
                  <?php foreach ( $table_prices as $price ) : ?>
                    <div class="page-price-table__item">
                      <dt>
                        <?php
                          $course_name = $price['course_name' . substr($price_table_key, -1)];
                          $course_name_escaped = esc_html($course_name);
                          // HTMLエスケープしてから改行文字（\n）を<br class="u-mobile">タグに変換（「\"u-mobile\"」でダブルクォーテーションをエスケープ）
                          $course_name_with_br = str_replace("\n", "<br class=\"u-mobile\">", $course_name_escaped);
                          echo $course_name_with_br;
                        ?>
                      </dt>
                      <dd>&yen;<?php echo esc_html(number_format($price['course_price' . substr($price_table_key, -1)])); ?></dd>
                    </div>
                  <?php endforeach; ?>
                </dl>
              </div>
          <?php
              // カウンターをインクリメントして連番を進める
              $counter++;
              endif;
            endforeach;
          ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
