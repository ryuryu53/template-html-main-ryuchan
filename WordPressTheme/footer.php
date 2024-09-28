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

      <!-- Contact -->
      <?php if ( !is_page(array('contact', 'thanks')) && !is_404() ) : ?>
        <section class="top-contact contact">
          <div class="contact__inner inner">
            <div class="contact__wrapper">
              <div class="contact__info">
                <div class="contact__logo">
                  <a href="#top" class="contact__logo-link"><img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/contact-logo.svg" alt="CodeUps">
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
                  <a href="<?php echo $contact; ?>" class="button"><span class="button__text">Contact&nbsp;us</span></a>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>

      <!-- ページトップへ戻るボタン -->
      <?php if ( !is_404() ) : ?>
        <div class="to-top js-to-top">
          <a href="#top" class="to-top__link"></a>
        </div>
      <?php endif; ?>
    </main>

    <!-- フッター -->
    <footer class="top-footer <?php if ( is_404() ) { echo 'top-footer--404-page'; } ?> footer js-footer">
      <div class="footer__inner inner">
        <div class="footer__img">
          <div class="footer__logo">
            <a href="<?php echo $home; ?>" class="footer__logo-link">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/footer-logo.svg" alt="CodeUps">
            </a>
          </div>
          <div class="footer__sns">
            <a href="https://www.facebook.com/" class="footer__sns-link" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/facebook-logo.svg" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/" class="footer__sns-link" target="_blank" rel="noopener noreferrer">
              <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/instagram-logo.svg" alt="Instagram">
            </a>
          </div>
        </div>
        <nav class="footer__nav footer-nav">
          <div class="footer-nav__left-content">
            <ul class="footer-nav__left-items">
              <li class="footer-nav__left-item">
                <a href="<?php echo $campaign; ?>" class="footer-nav__left-link">キャンペーン</a>
                <ul class="footer-nav__left-detail-items">
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $campaign; ?>" class="footer-nav__left-detail-link">ライセンス取得</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $campaign; ?>" class="footer-nav__left-detail-link">貸切体験ダイビング</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $campaign; ?>" class="footer-nav__left-detail-link">ナイトダイビング</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $campaign; ?>" class="footer-nav__left-detail-link">貸切ファンダイビング</a>
                  </li>
                </ul>
              </li>
              <li class="footer-nav__left-item">
                <a href="<?php echo $about; ?>" class="footer-nav__left-link">私たちについて</a>
              </li>
            </ul>
            <ul class="footer-nav__left-items">
              <li class="footer-nav__left-item">
                <a href="<?php echo $information; ?>" class="footer-nav__left-link">ダイビング情報</a>
                <ul class="footer-nav__left-detail-items">
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $information; ?>#tab1" class="footer-nav__left-detail-link">ライセンス講習</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $information; ?>#tab3" class="footer-nav__left-detail-link">体験ダイビング</a>
                  </li>
                  <li class="footer-nav__left-detail-item">
                    <a href="<?php echo $information; ?>#tab2" class="footer-nav__left-detail-link">ファンダイビング</a>
                  </li>
                </ul>
              </li>
              <li class="footer-nav__left-item">
                <a href="<?php echo $blog; ?>" class="footer-nav__left-link">ブログ</a>
              </li>
            </ul>
          </div>
          <div class="footer-nav__right-content">
            <ul class="footer-nav__right-items">
              <li class="footer-nav__right-item">
                <a href="<?php echo $voice; ?>" class="footer-nav__right-link">お客様の声</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $amount; ?>" class="footer-nav__right-link">料金一覧</a>
                <ul class="footer-nav__right-detail-items">
                  <li class="footer-nav__right-detail-item">
                    <a href="<?php echo $amount; ?>" class="footer-nav__right-detail-link">ライセンス講習</a>
                  </li>
                  <li class="footer-nav__right-detail-item">
                    <a href="<?php echo $amount; ?>" class="footer-nav__right-detail-link">体験ダイビング</a>
                  </li>
                  <li class="footer-nav__right-detail-item">
                    <a href="<?php echo $amount; ?>" class="footer-nav__right-detail-link">ファンダイビング</a>
                  </li>
                  <li class="footer-nav__right-detail-item">
                    <a href="<?php echo $amount; ?>" class="footer-nav__right-detail-link">スペシャルダイビング</a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="footer-nav__right-items">
              <li class="footer-nav__right-item">
                <a href="<?php echo $faq; ?>" class="footer-nav__right-link">よくある質問</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $privacy; ?>" class="footer-nav__right-link">プライバシー<br class="u-mobile">ポリシー</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $terms; ?>" class="footer-nav__right-link">利用規約</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $contact; ?>" class="footer-nav__right-link">お問い合わせ</a>
              </li>
              <li class="footer-nav__right-item">
                <a href="<?php echo $sitemap; ?>" class="footer-nav__right-link">サイトマップ</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="footer__copyright">
          <small>Copyright&nbsp;&copy;&nbsp;2021&nbsp;-&nbsp;2023&nbsp;CodeUps&nbsp;LLC.&nbsp;All&nbsp;Rights&nbsp;Reserved.</small>
        </div>
      </div>
    </footer>
    <?php wp_footer(); ?>
  </body>

</html>
