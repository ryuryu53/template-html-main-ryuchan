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
            // 料金表のフィールド名をリスト化
            $price_tables = [
              'table_prices1',
              'table_prices2',
              'table_prices3',
              'table_prices4',
              'table_prices5'
            ];

            $counter = 1; // タイトルID用カウンター

            // コースデータの有効性をチェックする関数
            function is_valid_course($price, $key_suffix) {
                return !empty($price["course_name{$key_suffix}"]) && !empty($price["course_price{$key_suffix}"]);
            }

            // 各料金表について処理
            foreach ( $price_tables as $price_table_key ) :
              // テーブルタイトルと料金表情報を取得  substr($price_table_key, -1) はこの文字列の最後の1文字を取り出す
              $key_suffix = substr($price_table_key, -1); // キーの末尾番号を取得
              $table_title = SCF::get("table_title{$key_suffix}");
              $table_prices = SCF::get($price_table_key);

              // テーブルタイトルと料金表情報が存在するか確認
              if ( !empty($table_title) && !empty($table_prices) && is_array($table_prices) ) :
                // 各項目が空でないことを確認
                $has_valid_price = false;
                foreach ( $table_prices as $price ) {
                  if ( is_valid_course($price, $key_suffix) ) {
                    $has_valid_price = true;
                    break;
                  }
                }
                // 有効な料金情報が存在する場合のみ表示
                if ( $has_valid_price ) :
          ?>
              <div class="page-price-table__content">
                <!-- h2 タグに id を追加し、連番を付ける -->
                <h2 id="title<?php echo $counter; ?>" class="page-price-table__title"><?php echo esc_html($table_title); ?></h2>
                <dl class="page-price-table__items">
                  <?php foreach ( $table_prices as $price ) : ?>
                    <?php
                      // コース名と価格が空でないことを確認
                      if ( is_valid_course($price, $key_suffix) ) :
                    ?>
                      <div class="page-price-table__item">
                        <dt>
                          <?php
                            // HTMLエスケープしてから改行文字（\n）を<br class="u-mobile">タグに変換（「\"u-mobile\"」でダブルクォーテーションをエスケープ）
                            $course_name = esc_html($price["course_name{$key_suffix}"]);
                            echo str_replace("\n", "<br class=\"u-mobile\">", $course_name);
                          ?>
                        </dt>
                        <dd>&yen;<?php echo esc_html(number_format(intval($price["course_price{$key_suffix}"]))); ?></dd>
                      </div>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </dl>
              </div>
          <?php
                  endif;
                endif;
              endforeach;
            $counter++; // カウンターをインクリメントして連番を進める
          ?>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
