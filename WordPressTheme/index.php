<!DOCTYPE html>
<html class="html1" lang="ja">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="noindex" />
    <!-- meta情報 -->
    <title>CodeUps</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!-- ogp -->
    <meta property="og:title" content="CodeUps" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:site_name" content="CodeUps" />
    <meta property="og:description" content="" />
    <!-- ファビコン -->
    <link rel="icon" href="#" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/css/style.css" />
    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
    <script src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/js/jquery.inview.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
    <script src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/js/script.js" defer></script>
  </head>

  <body>
    <!-- ヘッダー -->
    <header class="header js-header">
      <div class="header__inner">
        <h1 class="header__logo">
          <a href="#top" class="header__logo-link">
            <picture>
              <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/header-logo.svg">
              <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/header-logo-pc.svg" alt="CodeUps">
            </picture>
          </a>
        </h1>
        <div class="header__drawer hamburger js-hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <nav class="header__pc-nav pc-nav">
          <ul class="pc-nav__items">
            <li class="pc-nav__item">
              <a href="./page-campaign.html" class="pc-nav__link">
                <span class="pc-nav__engtext">Campaign</span>
                <span class="pc-nav__jatext">キャンペーン</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="./page-about.html" class="pc-nav__link">
                <span class="pc-nav__engtext">About&nbsp;us</span>
                <span class="pc-nav__jatext">私たちについて</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="./page-information.html" class="pc-nav__link">
                <span class="pc-nav__engtext">Information</span>
                <span class="pc-nav__jatext">ダイビング情報</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="./home.html" class="pc-nav__link">
                <span class="pc-nav__engtext">Blog</span>
                <span class="pc-nav__jatext">ブログ</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="./page-voice.html" class="pc-nav__link">
                <span class="pc-nav__engtext">Voice</span>
                <span class="pc-nav__jatext">お客様の声</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="./page-price.html" class="pc-nav__link">
                <span class="pc-nav__engtext">Price</span>
                <span class="pc-nav__jatext">料金一覧</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="./page-faq.html" class="pc-nav__link">
                <span class="pc-nav__engtext">FAQ</span>
                <span class="pc-nav__jatext">よくある質問</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="./page-contact.html" class="pc-nav__link">
                <span class="pc-nav__engtext">Contact</span>
                <span class="pc-nav__jatext">お問合せ</span>
              </a>
            </li>
          </ul>
        </nav>
        <nav class="header__sp-nav sp-nav js-sp-nav">
          <div class="sp-nav__inner">
            <div class="sp-nav__container">
              <div class="sp-nav__left-content">
                <ul class="sp-nav__left-items">
                  <li class="sp-nav__left-item">
                    <a href="./page-campaign.html" class="sp-nav__link">キャンペーン</a>
                    <ul class="sp-nav__left-detail-items">
                      <li class="sp-nav__left-detail-item">
                        <a href="#" class="sp-nav__left-detail-link">ライセンス取得</a>
                      </li>
                      <li class="sp-nav__left-detail-item">
                        <a href="#" class="sp-nav__left-detail-link">貸切体験ダイビング</a>
                      </li>
                      <li class="sp-nav__left-detail-item">
                        <a href="#" class="sp-nav__left-detail-link">ナイトダイビング</a>
                      </li>
                    </ul>
                  </li>
                  <li class="sp-nav__left-item">
                    <a href="./page-about.html" class="sp-nav__link">私たちについて</a>
                  </li>
                </ul>
                <ul class="sp-nav__left-items">
                  <li class="sp-nav__left-item">
                    <a href="./page-information.html" class="sp-nav__link">ダイビング情報</a>
                    <ul class="sp-nav__left-detail-items">
                      <li class="sp-nav__left-detail-item">
                        <a href="./page-information.html#tab1" class="sp-nav__left-detail-link">ライセンス講習</a>
                      </li>
                      <li class="sp-nav__left-detail-item">
                        <a href="./page-information.html#tab3" class="sp-nav__left-detail-link">体験ダイビング</a>
                      </li>
                      <li class="sp-nav__left-detail-item">
                        <a href="./page-information.html#tab2" class="sp-nav__left-detail-link">ファンダイビング</a>
                      </li>
                    </ul>
                  </li>
                  <li class="sp-nav__left-item">
                    <a href="./home.html" class="sp-nav__link">ブログ</a>
                  </li>
                </ul>
              </div>
              <div class="sp-nav__right-content">
                <ul class="sp-nav__right-items">
                  <li class="sp-nav__right-item">
                    <a href="./page-voice.html" class="sp-nav__link">お客様の声</a>
                  </li>
                  <li class="sp-nav__right-item">
                    <a href="./page-price.html" class="sp-nav__link">料金一覧</a>
                    <ul class="sp-nav__right-detail-items">
                      <li class="sp-nav__right-detail-item">
                        <a href="#" class="sp-nav__right-detail-link">ライセンス講習</a>
                      </li>
                      <li class="sp-nav__right-detail-item">
                        <a href="#" class="sp-nav__right-detail-link">体験ダイビング</a>
                      </li>
                      <li class="sp-nav__right-detail-item">
                        <a href="#" class="sp-nav__right-detail-link">ファンダイビング</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <ul class="sp-nav__right-items">
                  <li class="sp-nav__right-item">
                    <a href="./page-faq.html" class="sp-nav__link">よくある質問</a>
                  </li>
                  <li class="sp-nav__right-item">
                    <a href="./page-privacy.html" class="sp-nav__link">プライバシー<br class="u-mobile">ポリシー</a>
                  </li>
                  <li class="sp-nav__right-item">
                    <a href="./page-terms.html" class="sp-nav__link">利用規約</a>
                  </li>
                  <li class="sp-nav__right-item">
                    <a href="./page-contact.html" class="sp-nav__link">お問い合わせ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <main>
      <!-- メインビュー -->
      <section class="mv">
        <div class="mv__inner">
          <div class="swiper mv__slider js-mv-swiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <picture class="mv__img">
                  <source media="(min-width: 768px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv-pc_1.webp" type="image/webp" width="1440" height="768">
                  <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv_1.webp" type="image/webp" width="375" height="667">
                  <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv_1.jpg" width="375" height="667">
                  <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv-pc_1.jpg" alt="海水面のすぐ下で泳いでいる海亀" width="1440" height="768">
                </picture>
              </div>
              <div class="swiper-slide">
                <picture class="mv__img">
                  <source media="(min-width: 768px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv-pc_2.webp" type="image/webp" width="1440" height="768">
                  <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv_2.webp" type="image/webp" width="375" height="667">
                  <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv_2.jpg" width="375" height="667">
                  <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv-pc_2.jpg" alt="海亀と2人のダイバーが海中で向き合っている様子" width="1440" height="768">
                </picture>
              </div>
              <div class="swiper-slide">
                <picture class="mv__img">
                  <source media="(min-width: 768px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv-pc_3.webp" type="image/webp" width="1440" height="768">
                  <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv_3.webp" type="image/webp" width="375" height="667">
                  <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv_3.jpg" width="375" height="667">
                  <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv-pc_3.jpg" alt="晴れた日の海岸近くの海とそこに浮かぶ白い船" width="1440" height="768">
                </picture>
              </div>
              <div class="swiper-slide">
                <picture class="mv__img">
                  <source media="(min-width: 768px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv-pc_4.webp" type="image/webp" width="1440" height="768">
                  <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv_4.webp" type="image/webp" width="375" height="667">
                  <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv_4.jpg" width="375" height="667">
                  <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/mv-pc_4.jpg" alt="人影もまばらな砂浜の前に広がるエメラルドグリーンの海" width="1440" height="768">
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
                <li class="swiper-slide campaign-cards__item campaign-card">
                  <a href="#" class="campaign-card__link">
                    <picture class="campaign-card__img">
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_1.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_1.jpg" alt="いろいろな色の魚が海で泳いでいる様子">
                    </picture>
                    <div class="campaign-card__body">
                      <p class="campaign-card__category">ライセンス講習</p>
                      <h3 class="campaign-card__title text--medium">ライセンス取得</h3>
                      <p class="campaign-card__text text--small-sp">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <span class="campaign-card__price-before">&yen;56&#44;000</span><span class="campaign-card__price-after">&yen;46&#44;000</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="swiper-slide campaign-cards__item campaign-card">
                  <a href="#" class="campaign-card__link">
                    <picture class="campaign-card__img">
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_2.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_2.jpg" alt="2隻の白いボートが浮かぶエメラルドグリーン浜辺">
                    </picture>
                    <div class="campaign-card__body">
                      <p class="campaign-card__category">体験ダイビング</p>
                      <h3 class="campaign-card__title text--medium">貸切体験ダイビング</h3>
                      <p class="campaign-card__text text--small-sp">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <span class="campaign-card__price-before">&yen;24&#44;000</span><span class="campaign-card__price-after">&yen;18&#44;000</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="swiper-slide campaign-cards__item campaign-card">
                  <a href="#" class="campaign-card__link">
                    <picture class="campaign-card__img">
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_3.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_3.jpg" alt="海の中を漂う光るクラゲ">
                    </picture>
                    <div class="campaign-card__body">
                      <p class="campaign-card__category">体験ダイビング</p>
                      <h3 class="campaign-card__title text--medium">ナイトダイビング</h3>
                      <p class="campaign-card__text text--small-sp">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <span class="campaign-card__price-before">&yen;10&#44;000</span><span class="campaign-card__price-after">&yen;8&#44;000</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="swiper-slide campaign-cards__item campaign-card">
                  <a href="#" class="campaign-card__link">
                    <picture class="campaign-card__img">
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_4.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_4.jpg" alt="ダイビングを楽しむ4人の人たちが水面で合図を交わしている様子">
                    </picture>
                    <div class="campaign-card__body">
                      <p class="campaign-card__category">ファンダイビング</p>
                      <h3 class="campaign-card__title text--medium">貸切ファンダイビング</h3>
                      <p class="campaign-card__text text--small-sp">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <span class="campaign-card__price-before">&yen;20&#44;000</span><span class="campaign-card__price-after">&yen;16&#44;000</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="swiper-slide campaign-cards__item campaign-card">
                  <a href="#" class="campaign-card__link">
                    <picture class="campaign-card__img">
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_1.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_1.jpg" alt="いろいろな色の魚が海で泳いでいる様子">
                    </picture>
                    <div class="campaign-card__body">
                      <p class="campaign-card__category">ライセンス講習</p>
                      <h3 class="campaign-card__title text--medium">ライセンス取得</h3>
                      <p class="campaign-card__text text--small-sp">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <span class="campaign-card__price-before">&yen;56&#44;000</span><span class="campaign-card__price-after">&yen;46&#44;000</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="swiper-slide campaign-cards__item campaign-card">
                  <a href="#" class="campaign-card__link">
                    <picture class="campaign-card__img">
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_2.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_2.jpg" alt="2隻の白いボートが浮かぶエメラルドグリーン浜辺">
                    </picture>
                    <div class="campaign-card__body">
                      <p class="campaign-card__category">体験ダイビング</p>
                      <h3 class="campaign-card__title text--medium">貸切体験ダイビング</h3>
                      <p class="campaign-card__text text--small-sp">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <span class="campaign-card__price-before">&yen;24&#44;000</span><span class="campaign-card__price-after">&yen;18&#44;000</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="swiper-slide campaign-cards__item campaign-card">
                  <a href="#" class="campaign-card__link">
                    <picture class="campaign-card__img">
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_3.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_3.jpg" alt="海の中を漂う光るクラゲ">
                    </picture>
                    <div class="campaign-card__body">
                      <p class="campaign-card__category">体験ダイビング</p>
                      <h3 class="campaign-card__title text--medium">ナイトダイビング</h3>
                      <p class="campaign-card__text text--small-sp">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <span class="campaign-card__price-before">&yen;10&#44;000</span><span class="campaign-card__price-after">&yen;8&#44;000</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="swiper-slide campaign-cards__item campaign-card">
                  <a href="#" class="campaign-card__link">
                    <picture class="campaign-card__img">
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_4.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/campaign_4.jpg" alt="ダイビングを楽しむ4人の人たちが水面で合図を交わしている様子">
                    </picture>
                    <div class="campaign-card__body">
                      <p class="campaign-card__category">ファンダイビング</p>
                      <h3 class="campaign-card__title text--medium">貸切ファンダイビング</h3>
                      <p class="campaign-card__text text--small-sp">全部コミコミ(お一人様)</p>
                      <div class="campaign-card__price">
                        <span class="campaign-card__price-before">&yen;20&#44;000</span><span class="campaign-card__price-after">&yen;16&#44;000</span>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="campaign__swiper-btn">
            <div class="swiper-button-next campaign__btn-next u-desktop"></div>
            <div class="swiper-button-prev campaign__btn-prev u-desktop"></div>
          </div>
          <div class="campaign__btn">
            <a href="./page-campaign.html" class="button"><span class="button__text">View&nbsp;more</span></a>
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
              <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/about_1.webp" type="image/webp">
              <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/about_1.jpg" alt="赤い屋根瓦の上でトラのような置物がこちらを向いている様子">
            </picture>
            <picture class="about__img-right">
              <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/about_2.webp" type="image/webp">
              <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/about_2.jpg" alt="黒い頭に黄色いお腹の二匹の魚が泳いでいる様子">
            </picture>
          </div>
          <div class="about__text-body">
            <h3 class="about__subtitle">Dive&nbsp;into<br>the&nbsp;Ocean</h3>
            <div class="about__text-block">
              <p class="about__text text--white-pc">
                ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキスト<!-- PC版だとこの後さらに「が入ります。」が続く -->
              </p>
              <div class="about__btn">
                <a href="./page-about.html" class="button"><span class="button__text">View&nbsp;more</span></a>
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
                <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/information.webp" type="image/webp">
                <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/information.jpg" alt="オレンジ色や水色の魚がサンゴ礁の中を泳いでいる様子">
              </picture>
            </div>
            <div class="information__text-body">
              <h3 class="information__subtitle">ライセンス講習</h3>
              <p class="information__text text--black-pc">当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。</p>
              <div class="information__btn">
                <a href="./page-information.html" class="button"><span class="button__text">View&nbsp;more</span></a>
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
                  <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/blog_1.webp" type="image/webp">
                  <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/blog_1.jpg" alt="白いポツポツに覆われた赤いサンゴ">
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
                  <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/blog_2.webp" type="image/webp">
                  <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/blog_2.jpg" alt="ウミガメが海で泳いでいる様子">
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
                  <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/blog_3.webp" type="image/webp">
                  <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/blog_3.jpg" alt="イソギンチャクの中から顔を出すカクレクマノミ">
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
            <a href="./home.html" class="button"><span class="button__text">View&nbsp;more</span></a>
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
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/voice_1.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/voice_1.jpg" alt="麦わら帽子をかぶった笑顔の女性">
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
                      <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/voice_2.webp" type="image/webp">
                      <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/voice_2.jpg" alt="青い服を着たグッドポーズの男性">
                    </picture>
                  </div>
                </div>
                <p class="voice-card__text text--black-sp">ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。</p>
              </a>
            </article>
          </div>
          <div class="voice__btn">
            <a href="./page-voice.html" class="button"><span class="button__text">View&nbsp;more</span></a>
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
                <source media="(min-width: 768px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/price-pc.webp" type="image/webp">
                <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/price-sp.webp" type="image/webp">
                <source srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/price-sp.jpg">
                <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/price-pc.jpg" alt="サンゴの周りを多くの赤い小さな熱帯魚が泳いでいる様子">
              </picture>
            </div>
            <div class="price__table price-table">
              <div class="price-table__content">
                <h3 class="price-table__title text--bold">ライセンス講習</h3>
                <dl class="price-table__items text--small-sp">
                  <div class="price-table__item">
                    <dt>オープンウォーターダイバーコース</dt>
                    <dd>&yen;50&#44;000</dd>
                  </div>
                  <div class="price-table__item">
                    <dt>アドバンスドオープンウォーターコース</dt>
                    <dd>&yen;60&#44;000</dd>
                  </div>
                  <div class="price-table__item">
                    <dt>レスキュー＋EFRコース</dt>
                    <dd>&yen;70&#44;000</dd>
                  </div>
                </dl>
              </div>
              <div class="price-table__content">
                <h3 class="price-table__title text--bold">体験ダイビング</h3>
                <dl class="price-table__items text--small-sp">
                  <div class="price-table__item">
                    <dt>ビーチ体験ダイビング(半日)</dt>
                    <dd>&yen;7&#44;000</dd>
                  </div>
                  <div class="price-table__item">
                    <dt>ビーチ体験ダイビング(1日)</dt>
                    <dd>&yen;14&#44;000</dd>
                  </div>
                  <div class="price-table__item">
                    <dt>ボート体験ダイビング(半日)</dt>
                    <dd>&yen;10&#44;000</dd>
                  </div>
                  <div class="price-table__item">
                    <dt>ボート体験ダイビング(1日)</dt>
                    <dd>&yen;18&#44;000</dd>
                  </div>
                </dl>
              </div>
              <div class="price-table__content">
                <h3 class="price-table__title text--bold">ファンダイビング</h3>
                <dl class="price-table__items text--small-sp">
                  <div class="price-table__item">
                    <dt>ビーチダイビング(2ダイブ)</dt>
                    <dd>&yen;14&#44;000</dd>
                  </div>
                  <div class="price-table__item">
                    <dt>ボートダイビング(2ダイブ)</dt>
                    <dd>&yen;18&#44;000</dd>
                  </div>
                  <div class="price-table__item">
                    <dt>スペシャルダイビング(2ダイブ)</dt>
                    <dd>&yen;24&#44;000</dd>
                  </div>
                  <div class="price-table__item">
                    <dt>ナイトダイビング(1ダイブ)</dt>
                    <dd>&yen;10&#44;000</dd>
                  </div>
                </dl>
              </div>
              <div class="price-table__content">
                <h3 class="price-table__title text--bold">スペシャルダイビング</h3>
                <dl class="price-table__items text--small-sp">
                  <div class="price-table__item">
                    <dt>貸切ダイビング(2ダイブ)</dt>
                    <dd>&yen;24&#44;000</dd>
                  </div>
                  <div class="price-table__item">
                    <dt>1日ダイビング(3ダイブ)</dt>
                    <dd>&yen;32&#44;000</dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>
          <div class="price__btn">
            <a href="./page-price.html" class="button"><span class="button__text">View&nbsp;more</span></a>
          </div>
        </div>
      </section>

      <!-- Contact -->
      <section class="top-contact contact">
        <div class="contact__inner inner">
          <div class="contact__wrapper">
            <div class="contact__info">
              <div class="contact__logo">
                <a href="#top" class="contact__logo-link"><img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/contact-logo.svg" alt="CodeUps">
                </a>
              </div>
              <div class="contact__access">
                <div class="contact__access-details access-details">
                  <ul class="access-details__items text">
                    <li class="access-details__item">沖縄県那覇市1-1</li>
                    <li class="access-details__item">TEL:0120-000-0000</li>
                    <li class="access-details__item">営業時間:8:30-19:00</li>
                    <li class="access-details__item">定休日:毎週火曜日</li>
                  </ul>
                </div>
                <div class="contact__access-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3580.0315670456625!2d127.67195729895639!3d26.19565138164196!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e569a926a083d5%3A0xf368c08083a19ad6!2z44CSOTAxLTAxNTIg5rKW57iE55yM6YKj6KaH5biC5bCP56aE77yR5LiB55uu77yR!5e0!3m2!1sja!2sjp!4v1714102427967!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
            <div class="contact__inquiry">
              <div class="contact__title section-header">
                <p class="section-header__engtitle section-header__engtitle--large">Contact</p>
                <h2 class="section-header__jatitle section-header__jatitle--up"><span class="u-mobile">お問合せ</span><span class="u-desktop">お問い合わせ</span></h2>
              </div>
              <p class="contact__text">ご予約・お問い合わせはコチラ</p>
              <div class="contact__btn">
                <a href="./page-contact.html" class="button"><span class="button__text">Contact&nbsp;us</span></a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- ページトップへ戻るボタン -->
      <div class="to-top js-to-top">
        <a href="#top" class="to-top__link"></a>
      </div>
    </main>

    <!-- フッター -->
    <footer class="top-footer footer js-footer">
      <div class="footer__inner inner">
        <div class="footer__img">
          <div class="footer__logo">
            <a href="#top" class="footer__logo-link">
              <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/footer-logo.svg" alt="CodeUps">
            </a>
          </div>
          <div class="footer__sns">
            <a href="#" class="footer__sns-link">
              <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/facebook-logo.svg" alt="Facebook">
            </a>
            <a href="#" class="footer__sns-link">
              <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/instagram-logo.svg" alt="Instagram">
            </a>
          </div>
        </div>
        <nav class="footer__nav footer-nav">
          <div class="footer-nav__left-content">
            <ul class="footer-nav__left-items">
              <li class="footer-nav__left-item">
                <a href="./page-campaign.html" class="footer-nav__left-link">キャンペーン</a>
                <ul class="footer-nav__left-detail-items">
                  <li class="footer-nav__left-detail-item">
                    <a href="#" class="footer-nav__left-detail-link">ライセンス取得</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="#" class="footer-nav__left-detail-link">貸切体験ダイビング</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="#" class="footer-nav__left-detail-link">ナイトダイビング</a>
                  </li>
                </ul>
              </li>
              <li class="footer-nav__left-item">
                <a href="./page-about.html" class="footer-nav__left-link">私たちについて</a>
              </li>
            </ul>
            <ul class="footer-nav__left-items">
              <li class="footer-nav__left-item">
                <a href="./page-information.html" class="footer-nav__left-link">ダイビング情報</a>
                <ul class="footer-nav__left-detail-items">
                  <li class="footer-nav__left-detail-item">
                    <a href="./page-information.html#tab1" class="footer-nav__left-detail-link">ライセンス講習</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="./page-information.html#tab3" class="footer-nav__left-detail-link">体験ダイビング</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="./page-information.html#tab2" class="footer-nav__left-detail-link">ファンダイビング</a>
                  </li>
                </ul>
              </li>
              <li class="footer-nav__left-item">
                <a href="./home.html" class="footer-nav__left-link">ブログ</a>
              </li>
            </ul>
          </div>
          <div class="footer-nav__right-content">
            <ul class="footer-nav__right-items">
              <li class="footer-nav__right-item">
                <a href="./page-voice.html" class="footer-nav__right-link">お客様の声</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="./page-price.html" class="footer-nav__right-link">料金一覧</a>
                <ul class="footer-nav__right-detail-items">
                  <li class="footer-nav__right-detail-item">
                    <a href="#" class="footer-nav__right-detail-link">ライセンス講習</a>
                  </li>
                  <li class="footer-nav__right-detail-item">
                    <a href="#" class="footer-nav__right-detail-link">体験ダイビング</a>
                  </li>
                  <li class="footer-nav__right-detail-item">
                    <a href="#" class="footer-nav__right-detail-link">ファンダイビング</a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="footer-nav__right-items">
              <li class="footer-nav__right-item">
                <a href="./page-faq.html" class="footer-nav__right-link">よくある質問</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="./page-privacy.html" class="footer-nav__right-link">プライバシー<br class="u-mobile">ポリシー</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="./page-terms.html" class="footer-nav__right-link">利用規約</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="./page-contact.html" class="footer-nav__right-link">お問い合わせ</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="footer__copyright">
          <small>Copyright&nbsp;&copy;&nbsp;2021&nbsp;-&nbsp;2023&nbsp;CodeUps&nbsp;LLC.&nbsp;All&nbsp;Rights&nbsp;Reserved.</small>
        </div>
      </div>
    </footer>
  </body>

</html>
