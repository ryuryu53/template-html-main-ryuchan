<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="contact-mv sub-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Contact</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- お問い合わせ -->
    <div class="top-page-contact2 page-contact">
    <div class="page-contact__inner inner">
      <div class="page-contact__content form">
        <!-- <p class="form__error" id="form__error"></p> -->
        <form action="#" method="post" class="form__contact" id="form__contact">
          <dl class="form__item">
            <dt>お名前<span>必須</span></dt>
            <dd>
              <input type="text" name="user_name" value="" class="form__name" id="form__name" placeholder="沖縄&emsp;太郎" />
            </dd>
          </dl>
          <dl class="form__item">
            <dt>メールアドレス<span>必須</span></dt>
            <dd>
              <input type="email" name="mail_address" value="" class="form__email" id="form__email" placeholder="aaa000@ggmail.com" />
            </dd>
          </dl>
          <dl class="form__item">
            <dt>電話番号<span>必須</span></dt>
            <dd>
              <input type="tel" name="tel_number" value="" class="form__tel" id="form__tel" placeholder="000-0000-0000" />
            </dd>
          </dl>
          <dl class="form__item">
            <dt class="">お問合せ項目<span>必須</span></dt>
            <dd class="">
              <label><input type="checkbox" name="inquiry" value="ダイビング講習について" /><span>ダイビング講習について</span></label>
              <label><input type="checkbox" name="inquiry" value="ファンダイビングについて" /><span>ファンダイビングについて</span></label>
              <label><input type="checkbox" name="inquiry" value="体験ダイビングについて" /><span>体験ダイビングについて</span></label>
            </dd>
          </dl>
          <dl class="form__item">
            <dt>キャンペーン</dt>
            <dd class="">
              <select name="campaign" class="form__campaign" id="form__campaign">
                <option value="" hidden>キャンペーン内容を選択</option>
                <option value="ライセンス講習">ライセンス講習</option>
                <option value="ファンダイビング">ファンダイビング</option>
                <option value="体験ダイビング">体験ダイビング</option>
              </select>
            </dd>
          </dl>
          <dl class="form__item">
            <dt>お問合せ内容<span>必須</span></dt>
            <dd>
              <textarea name="contents" class="form__textarea" id="form__textarea"></textarea>
            </dd>
          </dl>
          <div class="form__agree">
            <label><input type="checkbox" name="agree" value="1" id="form__checkbox"><span>個人情報の取り扱いについて同意のうえ送信します。</span></label>
          </div>
          <div class="form__btn">
            <div class="form__btn-submit">
              <input type="submit" value="Send" />
              <div class="form__btn-arrow"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
    </div>

<?php get_footer(); ?>
