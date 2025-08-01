<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="contact-mv sub-mv js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Contact</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- 送信完了 -->
  <div class="layout-page-contact page-contact">
    <div class="page-contact__inner inner">
      <div class="page-contact__content">
        <p class="page-contact__thanks-title">お問い合わせ内容を送信完了しました。</p>
        <p class="page-contact__thanks-text">このたびは、お問い合わせ頂き<br class="u-mobile">誠にありがとうございます。</p>
        <p class="page-contact__thanks-text">お送り頂きました内容を確認の上、<br class="u-mobile">3営業日以内に折り返しご連絡させて頂きます。<br>また、ご記入頂いたメールアドレスへ、<br class="u-mobile">自動返信の確認メールをお送りしております。</p>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
