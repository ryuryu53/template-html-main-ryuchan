<!DOCTYPE html>
<?php if ( is_page( 'price' ) ) : ?>
  <html class="html1" lang="ja">
<?php else : ?>
  <html lang="ja">
<?php endif; ?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <?php
    // 本番環境（ryuryu53.cloudfree.jp）だけでGTMを読み込む
    if ( strpos( $_SERVER['HTTP_HOST'], 'ryuryu53.cloudfree.jp' ) !== false ) :
    ?>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-59TGKWHZ');</script>
    <!-- End Google Tag Manager -->
    <?php endif; ?>
    <!-- ↓ 管理画面でnoindexの設定するためコメントアウト -->
    <!-- <meta name="robots" content="noindex" /> -->
    <?php wp_head(); ?>
  </head>

  <?php
  $home = esc_url( home_url( '/' ) );
  $campaign = esc_url( home_url( '/campaign/' ) );
  $campaign_fun_diving = esc_url( home_url( '/campaign_category/fun-diving/' ) );
  $campaign_license = esc_url( home_url( '/campaign_category/license/' ) );
  $campaign_experience_diving = esc_url( home_url( '/campaign_category/experience-diving/' ) );
  $about = esc_url( home_url( '/about-us/' ) );
  $information = esc_url( home_url( '/information/' ) );
  $blog = esc_url( home_url( '/blog/' ) );
  $voice = esc_url( home_url( '/voice/' ) );
  $amount = esc_url( home_url( '/price/' ) );
  $faq = esc_url( home_url( '/faq/' ) );
  $contact = esc_url( home_url( '/contact/' ) );
  $sitemap = esc_url( home_url( '/sitemap/' ) );
  $privacy = esc_url( home_url( '/privacy-policy/' ) );
  $terms = esc_url( home_url( '/terms-of-service/' ) );
  ?>

  <body>
    <?php if ( strpos( $_SERVER['HTTP_HOST'], 'ryuryu53.cloudfree.jp' ) !== false ) : ?>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-59TGKWHZ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php endif; ?>
    <!-- ヘッダー -->
    <header class="layout-header header js-header">
      <div class="header__inner">
        <?php
        // トップページかどうかを判定し、タグを決定
        $tag = ( is_front_page() ) ? 'h1' : 'div';
        ?>
        <<?php echo $tag; ?> class="header__logo">
          <a href="<?php echo $home; ?>" class="header__logo-link">
            <picture>
              <source media="(max-width: 767px)" srcset="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/header-logo.svg">
              <img src="<?php echo esc_url( get_theme_file_uri() ); ?>/assets/images/common/header-logo-pc.svg" alt="CodeUps">
            </picture>
          </a>
        </<?php echo $tag; ?>>
        <button class="header__drawer hamburger js-hamburger" aria-label="メニューを開く">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <nav class="header__pc-nav pc-nav" aria-label="ヘッダーナビゲーション">
          <ul class="pc-nav__items">
            <li class="pc-nav__item">
              <a href="<?php echo $campaign; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Campaign</span>
                <span class="pc-nav__jatext">キャンペーン</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $about; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">About&nbsp;us</span>
                <span class="pc-nav__jatext">私たちについて</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $information; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Information</span>
                <span class="pc-nav__jatext">ダイビング情報</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $blog; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Blog</span>
                <span class="pc-nav__jatext">ブログ</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $voice; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Voice</span>
                <span class="pc-nav__jatext">お客様の声</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $amount; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Price</span>
                <span class="pc-nav__jatext">料金一覧</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $faq; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">FAQ</span>
                <span class="pc-nav__jatext">よくある質問</span>
              </a>
            </li>
            <li class="pc-nav__item">
              <a href="<?php echo $contact; ?>" class="pc-nav__link">
                <span class="pc-nav__engtext">Contact</span>
                <span class="pc-nav__jatext">お問い合わせ</span>
              </a>
            </li>
          </ul>
        </nav>
        <nav class="header__sp-nav sp-nav js-sp-nav" aria-label="モバイル版ヘッダーナビゲーション">
          <div class="sp-nav__inner">
            <div class="sp-nav__container">
              <div class="sp-nav__left-content">
                <ul class="sp-nav__left-items">
                  <li class="sp-nav__left-item">
                    <a href="<?php echo $campaign; ?>" class="sp-nav__link">キャンペーン</a>
                    <ul class="sp-nav__left-detail-items">
                      <li class="sp-nav__left-detail-item">
                        <a href="<?php echo $campaign_license; ?>" class="sp-nav__left-detail-link">ライセンス取得</a>
                      </li>
                      <li class="sp-nav__left-detail-item">
                        <a href="<?php echo $campaign_experience_diving; ?>" class="sp-nav__left-detail-link">貸切体験ダイビング</a>
                      </li>
                      <li class="sp-nav__left-detail-item">
                        <a href="<?php echo $campaign_experience_diving; ?>" class="sp-nav__left-detail-link">ナイトダイビング</a>
                      </li>
                      <li class="sp-nav__left-detail-item">
                        <a href="<?php echo $campaign_fun_diving; ?>" class="sp-nav__left-detail-link">貸切ファンダイビング</a>
                      </li>
                    </ul>
                  </li>
                  <li class="sp-nav__left-item">
                    <a href="<?php echo $about; ?>" class="sp-nav__link">私たちについて</a>
                  </li>
                </ul>
                <ul class="sp-nav__left-items">
                  <li class="sp-nav__left-item">
                    <a href="<?php echo $information; ?>" class="sp-nav__link">ダイビング情報</a>
                    <ul class="sp-nav__left-detail-items">
                      <li class="sp-nav__left-detail-item">
                        <a href="<?php echo $information; ?>?tab=tab1" class="sp-nav__left-detail-link">ライセンス講習</a>
                      </li>
                      <li class="sp-nav__left-detail-item">
                        <a href="<?php echo $information; ?>?tab=tab3" class="sp-nav__left-detail-link">体験ダイビング</a>
                      </li>
                      <li class="sp-nav__left-detail-item">
                        <a href="<?php echo $information; ?>?tab=tab2" class="sp-nav__left-detail-link">ファンダイビング</a>
                      </li>
                    </ul>
                  </li>
                  <li class="sp-nav__left-item">
                    <a href="<?php echo $blog; ?>" class="sp-nav__link">ブログ</a>
                  </li>
                </ul>
              </div>
              <div class="sp-nav__right-content">
                <ul class="sp-nav__right-items">
                  <li class="sp-nav__right-item">
                    <a href="<?php echo $voice; ?>" class="sp-nav__link">お客様の声</a>
                  </li>
                  <li class="sp-nav__right-item">
                    <a href="<?php echo $amount; ?>" class="sp-nav__link">料金一覧</a>
                    <ul class="sp-nav__right-detail-items">
                      <li class="sp-nav__right-detail-item">
                        <a href="<?php echo $amount; ?>#title1" class="sp-nav__right-detail-link">ライセンス講習</a>
                      </li>
                      <li class="sp-nav__right-detail-item">
                        <a href="<?php echo $amount; ?>#title2" class="sp-nav__right-detail-link">体験ダイビング</a>
                      </li>
                      <li class="sp-nav__right-detail-item">
                        <a href="<?php echo $amount; ?>#title3" class="sp-nav__right-detail-link">ファンダイビング</a>
                      </li>
                      <li class="sp-nav__right-detail-item">
                        <a href="<?php echo $amount; ?>#title4" class="sp-nav__right-detail-link">スペシャルダイビング</a>
                      </li>
                    </ul>
                  </li>
                </ul>
                <ul class="sp-nav__right-items">
                  <li class="sp-nav__right-item">
                    <a href="<?php echo $faq; ?>" class="sp-nav__link">よくある質問</a>
                  </li>
                  <li class="sp-nav__right-item">
                    <a href="<?php echo $privacy; ?>" class="sp-nav__link">プライバシー<br>ポリシー</a>
                  </li>
                  <li class="sp-nav__right-item">
                    <a href="<?php echo $terms; ?>" class="sp-nav__link">利用規約</a>
                  </li>
                  <li class="sp-nav__right-item">
                    <a href="<?php echo $contact; ?>" class="sp-nav__link">お問い合わせ</a>
                  </li>
                  <li class="sp-nav__right-item">
                    <a href="<?php echo $sitemap; ?>" class="sp-nav__link">サイトマップ</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <main>
