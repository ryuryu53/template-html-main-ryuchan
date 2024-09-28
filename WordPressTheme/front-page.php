<?php get_header(); ?>

  <?php
  $home = esc_url( home_url('/') );
  $campaign = esc_url( home_url('/campaign/') );
  $about = esc_url( home_url('/about-us/') );
  $information = esc_url( home_url('/information/') );
  $blog = esc_url( home_url('/blog/') );
  $voice = esc_url( home_url('/voice/') );
  $amount = esc_url( home_url('/price/') );
  $faq = esc_url( home_url('/faq/') );
  $contact = esc_url( home_url('/contact/') );
  $sitemap = esc_url( home_url('/sitemap/') );
  $privacy = esc_url( home_url('/privacy-policy/') );
  $terms = esc_url( home_url('/terms-of-service/') );
  ?>

  <!-- メインビュー -->
  <section class="mv">
    <div class="mv__inner">
      <div class="swiper mv__slider js-mv-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <picture class="mv__img">
              <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv-pc_1.webp" type="image/webp" width="1440" height="768">
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv_1.webp" type="image/webp" width="375" height="667">
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv_1.jpg" width="375" height="667">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv-pc_1.jpg" alt="海水面のすぐ下で泳いでいる海亀" width="1440" height="768">
            </picture>
          </div>
          <div class="swiper-slide">
            <picture class="mv__img">
              <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv-pc_2.webp" type="image/webp" width="1440" height="768">
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv_2.webp" type="image/webp" width="375" height="667">
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv_2.jpg" width="375" height="667">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv-pc_2.jpg" alt="海亀と2人のダイバーが海中で向き合っている様子" width="1440" height="768">
            </picture>
          </div>
          <div class="swiper-slide">
            <picture class="mv__img">
              <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv-pc_3.webp" type="image/webp" width="1440" height="768">
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv_3.webp" type="image/webp" width="375" height="667">
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv_3.jpg" width="375" height="667">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv-pc_3.jpg" alt="晴れた日の海岸近くの海とそこに浮かぶ白い船" width="1440" height="768">
            </picture>
          </div>
          <div class="swiper-slide">
            <picture class="mv__img">
              <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv-pc_4.webp" type="image/webp" width="1440" height="768">
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv_4.webp" type="image/webp" width="375" height="667">
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv_4.jpg" width="375" height="667">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/mv-pc_4.jpg" alt="人影もまばらな砂浜の前に広がるエメラルドグリーンの海" width="1440" height="768">
            </picture>
          </div>
        </div>
      </div>
      <div class="mv__header">
        <h2 class="mv__title">diving</h2>
        <p class="mv__subtitle">into&nbsp;the&nbsp;ocean</p>
      </div>
    </div>
  </section>

  <!-- Campaign -->
  <section class="top-campaign campaign">
    <div class="campaign__inner inner">
      <div class="campaign__title section-header">
        <p class="section-header__engtitle">Campaign</p>
        <h2 class="section-header__jatitle">キャンペーン</h2>
      </div>
      <div class="campaign__swiper">
        <div class="swiper js-campaign-swiper">
          <ul class="swiper-wrapper campaign__items campaign-cards">
            <?php
            // 最新のカスタム投稿（campaign）の8件を取得するクエリ
            $latest_campaign_args = array(  // $latest_campaign_args：WP_Queryに渡すための条件を設定
              'post_type' => 'campaign', // カスタム投稿タイプ「campaign」の指定
              'posts_per_page' => 8, // 最新の8件を表示
              'orderby' => 'date', // 日付順にソート
              'order' => 'DESC' // 新しいものを先頭に･･･降順（DESC）
            );
            // WP_Query：WordPressのクエリ機能を使って、指定した条件でデータベースからキャンペーン投稿を取得
            $latest_campaign_query = new WP_Query($latest_campaign_args);

            // サブループ開始   while文：投稿がある限り、このループで8件のキャンペーン情報を1件ずつ表示
            if ( $latest_campaign_query->have_posts() ) : while ( $latest_campaign_query->have_posts() ) : $latest_campaign_query->the_post(); ?>
              <li class="swiper-slide campaign-cards__item campaign-card">
                <a href="<?php the_permalink(); ?>" class="campaign-card__link">  <!-- 詳細投稿ページはなし -->
                  <picture class="campaign-card__img">
                    <?php if ( get_the_post_thumbnail() ) : ?>
                    <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" alt="noimage">
                    <?php endif; ?>
                  </picture>
                  <div class="campaign-card__body">
                    <?php
                    // カスタムタクソノミー「campaign_category」の取得
                    $terms = get_the_terms(get_the_ID(), 'campaign_category');
                    if ( $terms && !is_wp_error($terms) ) :
                    ?>
                      <p class="campaign-card__category"><?php echo esc_html($terms[0]->name); ?></p>
                    <?php endif; ?>
                    <h3 class="campaign-card__title text--medium"><?php the_title(); ?></h3>
                    <p class="campaign-card__text text--small-sp">全部コミコミ(お一人様)</p>
                    <div class="campaign-card__price">
                      <?php if ( get_field('campaign_1') ) : ?>
                        <span class="campaign-card__price-before">&yen;<?php echo esc_html(number_format(intval(get_field('campaign_1')))); ?></span>
                      <?php endif; ?>
                      <?php if ( get_field('campaign_2') ) : ?>
                        <span class="campaign-card__price-after">&yen;<?php echo esc_html(number_format(intval(get_field('campaign_2')))); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                </a>
              </li>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </ul>
        </div>
      </div>
      <div class="campaign__swiper-btn">
        <div class="swiper-button-next campaign__btn-next u-desktop"></div>
        <div class="swiper-button-prev campaign__btn-prev u-desktop"></div>
      </div>
      <div class="campaign__btn">
        <a href="<?php echo $campaign; ?>" class="button"><span class="button__text">View&nbsp;more</span></a>
      </div>
    </div>
  </section>

  <!-- About -->
  <section class="top-about about">
    <div class="about__inner inner">
      <div class="about__title section-header">
        <p class="section-header__engtitle">About&nbsp;us</p>
        <h2 class="section-header__jatitle about__title-jp">私たちについて</h2>
      </div>
      <div class="about__img-box">
        <picture class="about__img-left">
          <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_1.webp" type="image/webp">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_1.jpg" alt="赤い屋根瓦の上でトラのような置物がこちらを向いている様子">
        </picture>
        <picture class="about__img-right">
          <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_2.webp" type="image/webp">
          <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/about_2.jpg" alt="黒い頭に黄色いお腹の二匹の魚が泳いでいる様子">
        </picture>
      </div>
      <div class="about__text-body">
        <h3 class="about__subtitle">Dive&nbsp;into<br>the&nbsp;Ocean</h3>
        <div class="about__text-block">
          <p class="about__text text--white-pc">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト<!-- PC版だとこの後さらに「が入ります。」が続く -->
          </p>
          <div class="about__btn">
            <a href="<?php echo $about; ?>" class="button"><span class="button__text">View&nbsp;more</span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Information -->
  <section class="top-information information">
    <div class="information__inner inner">
      <div class="information__title section-header">
        <p class="section-header__engtitle">Information</p>
        <h2 class="section-header__jatitle">ダイビング情報</h2>
      </div>
      <div class="information__content">
        <div class="colorbox js-colorbox">
          <picture class="information__img">
            <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/information.webp" type="image/webp">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/information.jpg" alt="オレンジ色や水色の魚がサンゴ礁の中を泳いでいる様子">
          </picture>
        </div>
        <div class="information__text-body">
          <h3 class="information__subtitle">ライセンス講習</h3>
          <p class="information__text text--black-pc">当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。</p>
          <div class="information__btn">
            <a href="<?php echo $information; ?>" class="button"><span class="button__text">View&nbsp;more</span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Blog -->
  <section class="top-blog blog">
    <div class="blog__inner inner">
      <div class="blog__title section-header">
        <p class="section-header__engtitle section-header__engtitle--white-pc">Blog</p>
        <h2 class="section-header__jatitle section-header__jatitle--white-pc">ブログ</h2>
      </div>
      <div class="blog__items blog-cards">
        <article class="blog-cards__item blog-card">
          <a href="#" class="blog-card__link">
            <picture class="blog-card__img">
              <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/blog_1.webp" type="image/webp">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/blog_1.jpg" alt="白いポツポツに覆われた赤いサンゴ">
            </picture>
            <div class="blog-card__body">
              <time datetime="2023-11-17" class="blog-card__date">2023.11.17</time>
              <h3 class="blog-card__title text--medium">ライセンス取得</h3>
              <p class="blog-card__text text--black-pc">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
            </div>
          </a>
        </article>
        <article class="blog-cards__item blog-card">
          <a href="#" class="blog-card__link">
            <picture class="blog-card__img">
              <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/blog_2.webp" type="image/webp">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/blog_2.jpg" alt="ウミガメが海で泳いでいる様子">
            </picture>
            <div class="blog-card__body">
              <time datetime="2023-11-17" class="blog-card__date">2023.11.17</time>
              <h3 class="blog-card__title text--medium">ウミガメと泳ぐ</h3>
              <p class="blog-card__text text--black-pc">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
            </div>
          </a>
        </article>
        <article class="blog-cards__item blog-card">
          <a href="#" class="blog-card__link">
            <picture class="blog-card__img">
              <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/blog_3.webp" type="image/webp">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/blog_3.jpg" alt="イソギンチャクの中から顔を出すカクレクマノミ">
            </picture>
            <div class="blog-card__body">
              <time datetime="2023-11-17" class="blog-card__date">2023.11.17</time>
              <h3 class="blog-card__title text--medium">カクレクマノミ</h3>
              <p class="blog-card__text text--black-pc">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキスト</p>
            </div>
          </a>
        </article>
      </div>
      <div class="blog__btn">
        <a href="<?php echo $blog; ?>" class="button"><span class="button__text">View&nbsp;more</span></a>
      </div>
    </div>
  </section>

  <!-- Voice -->
  <section class="top-voice voice">
    <div class="voice__inner inner">
      <div class="voice__title section-header">
        <p class="section-header__engtitle voice__title-en">Voice</p>
        <h2 class="section-header__jatitle voice__title-jp">お客様の声</h2>
      </div>
      <div class="voice__items voice-cards">
        <article class="voice-cards__item voice-card">
          <a href="#" class="voice-card__link">
            <div class="voice-card__head">
              <div class="voice-card__meta">
                <div class="voice-card__label">
                  <span class="voice-card__age">20代(女性)</span>
                  <p class="voice-card__category">ライセンス講習</p>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
              </div>
              <div class="voice-card__img colorbox js-colorbox">
                <picture>
                  <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/voice_1.webp" type="image/webp">
                  <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/voice_1.jpg" alt="麦わら帽子をかぶった笑顔の女性">
                </picture>
              </div>
            </div>
            <p class="voice-card__text text--black-sp">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。</p>
          </a>
        </article>
        <article class="voice-cards__item voice-card">
          <a href="#" class="voice-card__link">
            <div class="voice-card__head">
              <div class="voice-card__meta">
                <div class="voice-card__label">
                  <span class="voice-card__age">20代(男性)</span>
                  <p class="voice-card__category">ファンダイビング</p>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
              </div>
              <div class="voice-card__img colorbox js-colorbox">
                <picture>
                  <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/voice_2.webp" type="image/webp">
                  <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/voice_2.jpg" alt="青い服を着たグッドポーズの男性">
                </picture>
              </div>
            </div>
            <p class="voice-card__text text--black-sp">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。</p>
          </a>
        </article>
      </div>
      <div class="voice__btn">
        <a href="<?php echo $voice; ?>" class="button"><span class="button__text">View&nbsp;more</span></a>
      </div>
    </div>
  </section>

  <!-- Price -->
  <section class="top-price price">
    <div class="price__inner inner">
      <div class="price__title section-header">
        <p class="section-header__engtitle">Price</p>
        <h2 class="section-header__jatitle">料金一覧</h2>
      </div>
      <div class="price__contents">
        <div class="price__img colorbox js-colorbox">
          <picture>
            <source media="(min-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/price-pc.webp" type="image/webp">
            <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/price-sp.webp" type="image/webp">
            <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/price-sp.jpg">
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/price-pc.jpg" alt="サンゴの周りを多くの赤い小さな熱帯魚が泳いでいる様子">
          </picture>
        </div>
        <div class="price__table price-table">
          <?php
            // 4つの料金表に対応するフィールド名を設定
            $price_tables = [
              'table_prices1',
              'table_prices2',
              'table_prices3',
              'table_prices4'
            ];
            // 各料金表について処理
            foreach ( $price_tables as $price_table_key ) :
              // PriceページのID
              $page_price_id = 13;
              // テーブルタイトルと料金表情報を取得
              $table_title = SCF::get('table_title' . substr($price_table_key, -1), $page_price_id);
              $table_prices = SCF::get($price_table_key, $page_price_id);
              // テーブルタイトルと料金表情報が存在するか確認
            if ( !empty($table_title) && !empty($table_prices) ) :
          ?>
              <div class="price-table__content">
                <h3 class="price-table__title text--bold"><?php echo esc_html($table_title); ?></h3>
                <dl class="price-table__items text--small-sp">
                  <?php foreach ( $table_prices as $price ) : ?>
                    <div class="price-table__item">
                      <dt>
                        <?php
                          $course_name = $price['course_name' . substr($price_table_key, -1)];
                          $course_name_escaped = esc_html($course_name);
                          echo $course_name_escaped;  // トップページではSP版でも改行しない、HTMLエスケープのみ
                        ?>
                      </dt>
                      <dd>&yen;<?php echo esc_html(number_format($price['course_price' . substr($price_table_key, -1)])); ?></dd>
                    </div>
                  <?php endforeach; ?>
                </dl>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="price__btn">
        <a href="<?php echo $amount; ?>" class="button"><span class="button__text">View&nbsp;more</span></a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
