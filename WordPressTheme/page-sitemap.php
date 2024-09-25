<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="site-map-mv sub-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Site&nbsp;<span class="site-map-mv__title-text">map</span></h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- サイトマップ -->
  <div class="top-page-site-map page-site-map">
    <div class="page-site-map__inner inner">
      <nav class="page-site-map__nav footer-nav">
        <div class="footer-nav__left-content footer-nav__left-content--width">
          <ul class="footer-nav__left-items">
            <li class="footer-nav__left-item footer-nav__left-item--green">
              <a href="./page-campaign.html" class="footer-nav__left-link footer-nav__left-link--icon-green">キャンペーン</a>
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
            <li class="footer-nav__left-item footer-nav__left-item--green">
              <a href="./page-about.html" class="footer-nav__left-link footer-nav__left-link--icon-green">私たちについて</a>
            </li>
          </ul>
          <ul class="footer-nav__left-items footer-nav__left-items--width">
            <li class="footer-nav__left-item footer-nav__left-item--green">
              <a href="./page-information.html" class="footer-nav__left-link footer-nav__left-link--icon-green">ダイビング情報</a>
              <ul class="footer-nav__left-detail-items">
                <li class="footer-nav__left-detail-item">
                  <a href="#" class="footer-nav__left-detail-link">ライセンス講習</a>
                </li>
                <li class="footer-nav__left-detail-item">
                  <a href="#" class="footer-nav__left-detail-link">体験ダイビング</a>
                </li>
                <li class="footer-nav__left-detail-item">
                  <a href="#" class="footer-nav__left-detail-link">ファンダイビング</a>
                </li>
              </ul>
            </li>
            <li class="footer-nav__left-item footer-nav__left-item--green">
              <a href="./home.html" class="footer-nav__left-link footer-nav__left-link--icon-green">ブログ</a>
            </li>
          </ul>
        </div>
        <div class="footer-nav__right-content footer-nav__right-content--width">
          <ul class="footer-nav__right-items">
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="./page-voice.html" class="footer-nav__right-link footer-nav__right-link--icon-green">お客様の声</a>
            </li>
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="./page-price.html" class="footer-nav__right-link footer-nav__right-link--icon-green">料金一覧</a>
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
          <ul class="footer-nav__right-items footer-nav__right-items--width">
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="./page-faq.html" class="footer-nav__right-link footer-nav__right-link--icon-green">よくある質問</a>
            </li>
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="./page-privacy.html" class="footer-nav__right-link footer-nav__right-link--icon-green">プライバシー<br class="u-mobile">ポリシー</a>
            </li>
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="./page-terms.html" class="footer-nav__right-link footer-nav__right-link--icon-green">利用規約</a>
            </li>
            <li class="footer-nav__right-item footer-nav__right-item--green">
              <a href="./page-contact.html" class="footer-nav__right-link footer-nav__right-link--icon-green">お問い合わせ</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>

<?php get_footer(); ?>
