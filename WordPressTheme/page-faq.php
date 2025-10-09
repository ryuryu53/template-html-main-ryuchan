<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="layout-sub-mv sub-mv sub-mv--faq js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">FAQ</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part( 'parts/breadcrumbs' ); ?>

  <!-- よくある質問 -->
  <div class="layout-page-faq page-faq">
    <div class="page-faq__inner inner">
      <div class="page-faq__accordion accordion">
        <?php
        $q_and_a = SCF::get( 'q_and_a', get_the_ID() );
        if ( ! empty( $q_and_a ) ) :
        ?>
          <div class="accordion__container">
            <?php
            foreach ( $q_and_a as $fields ) :
              if ( ! empty( $fields['question'] ) && ! empty( $fields['answer'] ) ) :
            ?>
              <div class="accordion__item">
                <button class="accordion__title js-accordion-title">
                  <p class="accordion__title-text">
                    <?php
                    echo nl2br( esc_html( $fields['question'] ) );
                    ?>
                  </p>
                </button>
                <div class="accordion__content js-accordion-content">
                  <p class="accordion__text">
                    <?php
                    echo nl2br( esc_html( $fields['answer'] ) );
                    ?>
                  </p>
                </div>
              </div>
            <?php
              endif;
            endforeach;
            ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
