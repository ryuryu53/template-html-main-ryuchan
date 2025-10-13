<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--price js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title sub-mv__title--space2">Price</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part( 'parts/breadcrumbs' ); ?>

  <!-- 料金一覧 -->
  <section class="layout-page-price page-price">
    <div class="page-price__inner inner">
      <div class="page-price__table page-price-table">
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
        $has_any_price = false; // ← 1つでも料金表があれば true にする

        // コースデータの有効性をチェックする関数
        function is_valid_course( $price, $key_suffix ) {
          //「コース名が空でない」かつ「価格が空でない」なら true、それ以外なら falseを返す
          return ! empty( $price["course_name{$key_suffix}"] ) && ! empty( $price["course_price{$key_suffix}"] );
        }

        // 各料金表について処理
        foreach ( $price_tables as $price_table_key ) :
          // テーブルタイトルと料金表情報を取得  substr($price_table_key, -1) はこの文字列の最後の1文字を取り出す
          $key_suffix = substr( $price_table_key, -1 ); // キーの末尾番号を取得
          $table_title = SCF::get( "table_title{$key_suffix}", get_the_ID() );
          $table_prices = SCF::get( $price_table_key, get_the_ID() ); // $table_pricesには「1つの料金表のすべてのコース情報（行データ）」が配列として入る

          // テーブルタイトルと料金表情報が存在するか確認
          if ( ! empty( $table_title ) && ! empty( $table_prices ) && is_array( $table_prices ) ) :
            // 有効な料金が 1つ以上あるかどうかを確認するためのフラグ
            $has_valid_price = false;
            //「料金表の中に、有効なコースが1つでもあるか」を確認する（各項目が空でないことを確認）
            foreach ( $table_prices as $price ) { // $price：1行分のコースデータ（コース名・価格）が入った連想配列
              if ( is_valid_course( $price, $key_suffix ) ) {
                $has_valid_price = true;  //「有効な料金がある」とフラグを立てる
                break;  // 1つ見つかったらすぐループを抜ける
              }
            }
            // 有効な料金情報が存在する場合のみ表示
            if ( $has_valid_price ) :
              $has_any_price = true; // ← 1つでも表示されたら true にする
        ?>
          <div class="page-price-table__content">
            <!-- h2タグのid名に連番を付ける -->
            <h2 id="title<?php echo $counter; ?>" class="page-price-table__title"><?php echo esc_html( $table_title ); ?></h2>
            <dl class="page-price-table__items">
              <?php foreach ( $table_prices as $price ) : ?>
                <?php
                // コース名と価格が空でないことを確認
                if ( is_valid_course( $price, $key_suffix ) ) :
                ?>
                  <div class="page-price-table__item">
                    <dt>
                      <?php
                      // HTMLエスケープしてから改行文字（\n）を<br class="u-mobile">タグに変換（「\"u-mobile\"」でダブルクォーテーションをエスケープ）
                      $course_name = esc_html( $price["course_name{$key_suffix}"] );
                      echo str_replace( "\n", "<br class=\"u-mobile\">", $course_name );
                      ?>
                    </dt>
                    <dd>&yen;<?php echo esc_html( number_format( intval( $price["course_price{$key_suffix}"] ) ) ); ?></dd>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </dl>
          </div>
        <?php
              $counter++; // カウンターをインクリメントして連番を進める（$has_valid_priceがfalseのときは連番を進めない）
            endif;
          endif;
        endforeach;

        // ここで出力が一度もなかった場合にメッセージを表示
        if ( ! $has_any_price ) :
          echo '<p>現在、料金情報は登録されていません。</p>';
        endif;
        ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
