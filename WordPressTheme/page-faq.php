<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="faq-mv sub-mv">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">FAQ</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- よくある質問 -->
  <div class="top-page-faq page-faq">
    <div class="page-faq__inner inner">
      <div class="faq__accordion accordion">
      <div class="accordion__container">
          <?php
            $q_and_a = SCF::get('q_and_a');
            if ( !empty($q_and_a) ) :
            foreach ( $q_and_a as $fields ) :
          ?>
            <div class="accordion__item">
              <?php if ( !empty($fields['question']) && !empty($fields['answer']) ) : ?>
                <div class="accordion__title js-accordion-title">
                  <p class="accordion__title-text">
                    <?php
                    echo nl2br(esc_html($fields['question']));
                    ?>
                  </p>
                </div>
                <div class="accordion__content js-accordion-content">
                  <p class="accordion__text">
                    <?php
                    echo nl2br(esc_html($fields['answer']));
                    ?>
                  </p>
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; endif; ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
