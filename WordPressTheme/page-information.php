<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="information-mv sub-mv js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title sub-mv__title--space">Information</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- ダイビング情報 -->
  <section class="layout-page-information page-information">
    <div class="page-information__inner inner">
      <div class="page-information__container tab">
        <ul class="tab__list">
          <li id="tab1" class="tab__item js-tab-item"><span>ライセンス<br class="u-mobile">講習</span></li>
          <li id="tab2" class="tab__item js-tab-item"><span>ファン<br class="u-mobile">ダイビング</span></li>
          <li id="tab3" class="tab__item js-tab-item"><span>体験<br class="u-mobile">ダイビング</span></li>
        </ul>
        <ul class="tab__cards information-cards">
          <li id="tab1-content" class="information-cards__item information-card js-tab-content">
            <div class="information-card__content">
              <div class="information-card__body">
                <h2 class="information-card__title">ライセンス講習</h2>
                <p class="information-card__text">泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします&#65281;スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう&#65281;</p>
              </div>
              <picture class="information-card__img">
                <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/info-license.webp" type="image/webp">
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/info-license.jpg" alt="5人の人がエメラルドグリーンの海でスキューバダイビングを楽しんでいる様子">
              </picture>
            </div>
          </li>
          <li id="tab2-content" class="information-cards__item information-card js-tab-content">
            <div class="information-card__content">
              <div class="information-card__body">
                <h2 class="information-card__title">ファンダイビング</h2>
                <p class="information-card__text">ブランクダイバー、ライセンスを取り立ての方も安心&#65281;沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意&#65281;</p>
              </div>
              <picture class="information-card__img">
                <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/info-fundiving.webp" type="image/webp">
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/info-fundiving.jpg" alt="薄いピンク色の多くの熱帯魚が泳いでいる様子">
              </picture>
            </div>
          </li>
          <li id="tab3-content" class="information-cards__item information-card js-tab-content">
            <div class="information-card__content">
              <div class="information-card__body">
                <h2 class="information-card__title">体験ダイビング</h2>
                <p class="information-card__text">ブランクダイバー、ライセンスを取り立ての方も安心&#65281;沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意&#65281;</p>
              </div>
              <picture class="information-card__img">
                <source srcset="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/info-diving.webp" type="image/webp">
                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/info-diving.jpg" alt="白とオレンジ色のツートンカラーの2匹の熱帯魚が泳いでいる様子">
              </picture>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
