  <div class="column-aside">  <!-- sidebar.phpは単体で利用できるようにblockから始める -->
    <div class="column-aside__container">
      <div class="column-aside__article">
        <h2 class="column-aside__title">人気記事</h2>
        <div class="column-aside__items article-cards">
          <?php
          // 人気記事を取得するクエリ
          // 人気記事を取得するための条件を設定する配列。この変数に条件をまとめて、後でクエリに使う
          $popular_posts_args = array(
            'posts_per_page' => 3, // 表示する記事数
            'meta_key' => 'post_views_count', // 閲覧数のカスタムフィールド（「post_views_count」はカスタムフィールド（特別なデータの保存場所）の名前）
            // orderby：並び替えの基準を指定。meta_value_num、つまりpost_views_count（閲覧数）という数値を基準にして並び替える
            'orderby' => 'meta_value_num', // 数値順にソート
            'order' => 'DESC', // 降順（閲覧数が多い順に記事を並び替える）
          );
          // $popular_posts_query：WP_QueryというWPのクエリ機能を使って、先ほど設定した条件（閲覧数順に3件の記事を取得する）でデータベースから記事を取得
          $popular_posts_query = new WP_Query($popular_posts_args);
          // サブループ開始
          // if文：人気記事がデータベースから取得できたかを確認（have_posts()で記事があるかどうかをチェック）
          // while文：記事がある限りループを繰り返して、1つずつ記事を処理  the_post()：次の記事を準備して表示
          if ( $popular_posts_query->have_posts() ) : while ( $popular_posts_query->have_posts() ) : $popular_posts_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="article-cards__item article-card">
              <picture class="article-card__img">
                <?php if ( get_the_post_thumbnail() ) : ?>
                  <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" class="article-card__image" alt="<?php the_title(); ?>のアイキャッチ画像">
                <?php else : ?>
                  <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" alt="noimage">
                <?php endif; ?>
              </picture>
              <div class="article-card__body">
                <time datetime="<?php the_time('c'); ?>" class="article-card__date"><?php the_time('Y.m.d') ?></time>
                <h3 class="article-card__title"><?php the_title(); ?></h3>
              </div>
            </a>
          <!-- wp_reset_postdata()：ループで使用された投稿データをリセットして、WordPressの通常の投稿データに戻す
           （サブループで使った投稿データは破棄され、メインクエリの投稿データが復元される） -->
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="column-aside__review">
        <h2 class="column-aside__title">口コミ</h2>
        <div class="column-aside__item review-card">
        <?php
          // 最新のカスタム投稿（voice）の1件を取得するクエリ
          $latest_voice_args = array( // $latest_voice_args：WP_Queryに渡すための条件を設定
            'post_type' => 'voice', // カスタム投稿タイプ「voice」の指定
            'posts_per_page' => 1, // 最新の1件だけ表示
            'orderby' => 'date', // 日付順にソート
            'order' => 'DESC' // 新しいものを先頭に
          );
          // WP_Query：WordPressのクエリ機能を使って、指定した条件でデータベースから「口コミ」の投稿を取得
          $latest_voice_query = new WP_Query($latest_voice_args);
          // サブループ開始   while文：投稿がある限り、このループで1件ずつ口コミの情報を表示。今回は最新の1件なので1回だけ実行される
          if ( $latest_voice_query->have_posts() ) : while ( $latest_voice_query->have_posts() ) : $latest_voice_query->the_post(); ?>
            <picture class="review-card__img">
              <?php if ( get_the_post_thumbnail() ) : ?>
                <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
              <?php else : ?>
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" alt="noimage">
              <?php endif; ?>
            </picture>
            <div class="review-card__body">
              <span class="review-card__age"><?php echo esc_html(get_post_meta(get_the_ID(), 'voice_1', true)); ?>(<?php echo esc_html(get_post_meta(get_the_ID(), 'voice_2', true)); ?>)</span>
              <h3 class="review-card__title"><?php the_title(); ?></h3>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <div class="column-aside__btn">
          <!-- get_post_type_archive_link()：voiceというカスタム投稿タイプのアーカイブページ（口コミの一覧ページ）へのリンクを作成 -->
          <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>" class="button">
            <span class="button__text">View&nbsp;more</span>
          </a>
        </div>
      </div>
      <div class="column-aside__campaign">
        <h2 class="column-aside__title">キャンペーン</h2>
        <ul class="column-aside__items campaign-cards">
          <?php
            // 最新のカスタム投稿（campaign）の2件を取得するクエリ
            $latest_campaign_args = array(  // $latest_campaign_args：WP_Queryに渡すための条件を設定
              'post_type' => 'campaign', // カスタム投稿タイプ「campaign」の指定
              'posts_per_page' => 2, // 最新の2件を表示
              'orderby' => 'date', // 日付順にソート
              'order' => 'DESC' // 新しいものを先頭に･･･降順（DESC）
            );
            // WP_Query：WordPressのクエリ機能を使って、指定した条件でデータベースからキャンペーン投稿を取得
            $latest_campaign_query = new WP_Query($latest_campaign_args);
            // サブループ開始   while文：投稿がある限り、このループで2件のキャンペーン情報を1件ずつ表示
            if ( $latest_campaign_query->have_posts() ) : while ( $latest_campaign_query->have_posts() ) : $latest_campaign_query->the_post(); ?>
            <li class="campaign-cards__item campaign-card campaign-cards__item--blog-page">
              <a href="<?php the_permalink(); ?>" class="campaign-card__link">  <!-- 詳細投稿ページはなし -->
                <picture class="campaign-card__img campaign-card__img--blog-page">
                  <?php if ( get_the_post_thumbnail() ) : ?>
                    <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                  <?php else : ?>
                    <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" alt="noimage">
                  <?php endif; ?>
                </picture>
                <div class="campaign-card__body campaign-card__body--blog-page">
                  <h3 class="campaign-card__title campaign-card__title--blog-page text--medium"><?php the_title(); ?></h3>
                  <p class="campaign-card__text campaign-card__text--blog-page text--small-sp">全部コミコミ(お一人様)</p>
                  <div class="campaign-card__price campaign-card__price--blog-page">
                    <span class="campaign-card__price-before campaign-card__price-before--blog-page">&yen;<?php echo get_post_meta(get_the_ID(), 'campaign_1', true); ?></span><span class="campaign-card__price-after campaign-card__price-after--blog-page">&yen;<?php echo get_post_meta(get_the_ID(), 'campaign_2', true); ?></span>
                  </div>
                </div>
              </a>
            </li>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </ul>
        <div class="column-aside__btn-2">
          <!-- get_post_type_archive_link()：キャンペーンのカスタム投稿タイプ（campaign）のアーカイブページ（一覧ページ）へのリンクを生成 -->
          <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>" class="button"><span class="button__text">View&nbsp;more</span></a>
        </div>
      </div>
      <div class="column-aside__archive">
        <h2 class="column-aside__title">アーカイブ</h2>
        <div class="column-aside__items">
          <?php
          // 年ごとに月別アーカイブを表示する（データベースにアクセスして公開されている投稿の年と月を取得し、その年・月ごとの投稿数も集計する）
          // $wpdb->get_results()：直接データベースに問い合わせを行い（指定されたSQLクエリを実行し）、結果を配列の形で取得する関数
          // SELECT：データベースから特定の情報を取得する  DISTINCT：重複を除いて、一意な結果を取得する  YEAR(post_date)：投稿の日付（post_date）から年だけを抽出する関数
          // AS year：抽出された年に対して、yearという名前を付ける  COUNT(ID)：投稿のIDをカウント  post_countという名前を付けて結果を保存
          // FROM：どのテーブル（データの集まり）から情報を取得するのかを指定  $wpdb->posts：WordPressの投稿（post）データを管理するデフォルトのデータベーステーブル
          // WHERE：データを絞り込む条件を指定。つまり、どのデータを取得するかの基準  post_status = 'publish'：この条件は、公開済みの投稿だけを対象にしている
          // post_type = 'post'：この条件は、通常の投稿（post）のみを対象としている  GROUP BY：この部分は、同じ年・月ごとにデータをグループ化している
          // year, month：このグループ化を行う基準は「年」と「月」  ORDER BY：取得したデータを特定の順番で並び替える（ここでは、投稿の日付（post_date）を基準に並び替えている）
          $years = $wpdb->get_results("
            SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month, COUNT(ID) as post_count
            FROM $wpdb->posts
            WHERE post_status = 'publish' AND post_type = 'post'
            GROUP BY year, month
            ORDER BY post_date DESC
          "); // 重複なしで各月の投稿数をカウントし、公開済みの通常の投稿のみを対象にして降順(最新の投稿を先に表示)で並べ替えられる
          $previous_year = null; // 前のループでの年を記録
          $is_first_year = true; // 最初の年かどうかを判定するフラグ
          if ( $years ) :
            foreach ( $years as $year ) :
              // 年が変わったときにのみ年のトグルを作成
              if ( $previous_year !== $year->year ) {
                if ( $previous_year !== null ) {
                  // 前の年のリストが終わったときに閉じタグを入れる
                  echo '</ul></div>';
                }
                // is-openクラスを最初の年の<h3>タグにのみ追加
                $is_open_class = $is_first_year ? ' is-open' : '';  // 三項演算子：（変数） = （評価） ? （評価がtrueの場合の値） : （評価がfalseの場合の値）;
                // $is_first_yearの評価が「真（true）」の場合は、「 is-open」が$is_open_classに代入される。よって、最初に例えば「$is_first_year = 2」と定義してもOK
                // $is_first_yearの評価が「偽（false）」の場合は、空文字列が$is_open_classに代入される。よって、最初に「$is_first_year = 0(またはnull)」と定義すると評価は偽となる
          ?>
          <div class="column-aside__item-archive archive-toggle js-archive-toggle">
            <h3 class="archive-toggle__year-title js-archive-toggle-title<?php echo $is_open_class; ?>"><?php echo esc_html($year->year); ?></h3>
            <ul class="archive-toggle__items js-archive-toggle-items">
              <?php
              $is_first_year = false; // 2番目以降の年にはis-openクラスを付けない（falseを0やnullにしてもOK）
            }
            // 各月のアーカイブリンク
            $archive_link = get_month_link($year->year, $year->month);  // 指定された年と月のアーカイブページへのリンクを生成
              ?>
              <li class="archive-toggle__item">
                <h4 class="archive-toggle__month-title">
                  <a href="<?php echo esc_url($archive_link); ?>">
                    <?php echo esc_html($year->month . '月'); ?><!--  (<?php echo esc_html($year->post_count); ?>) -->
                  </a>
                </h4>
              </li>
              <?php
              $previous_year = $year->year; // 今回の年を記録
            endforeach;
            // 最後の年の閉じタグ
            echo '</ul></div>';
          endif; ?>
        </div>
      </div>
    </div>
  </div>
