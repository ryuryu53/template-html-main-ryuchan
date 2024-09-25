<!DOCTYPE html>
<?php if ( is_page('information') ) : ?>
  <html class="html1" lang="ja">
<?php else : ?>
  <html lang="ja">
<?php endif; ?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="robots" content="noindex" />
    <?php wp_head(); ?>
  </head>

  <body>
    <!-- ヘッダー -->
    <header class="header js-header">
      <div class="header__inner">
        <h1 class="header__logo">
          <a href="#top" class="header__logo-link">
            <picture>
              <source media="(max-width: 767px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/header-logo.svg">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/header-logo-pc.svg" alt="CodeUps">
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