<?php get_header(); ?>

  <!-- 下層ページのメインビュー -->
  <section class="voice-mv sub-mv js-mv-height">
    <div class="sub-mv__header">
      <h1 class="sub-mv__title">Voice</h1>
    </div>
  </section>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumbs'); ?>

  <!-- お客様の声 -->
  <div class="layout-page-campaign page-campaign">
    <div class="page-campaign__inner inner">
      <div class="page-campaign__category campaign-category">
        <!-- タクソノミーのタブを生成 -->
        <a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>" class="campaign-category__link <?php if ( !is_tax() ) echo 'is-active'; ?>">All</a>
        <?php
        // 表示したい順番のスラッグを指定（FB：並び替え不要）
        // $custom_order = array('license', 'fun-diving', 'experience-diving');

        $terms = get_terms(array(
          'taxonomy' => 'voice_category',
          'hide_empty' => true,
        ));

        // スラッグ順にタームを並び替える（FB：並び替え不要）
        if ( !empty($terms) ) :
        //   usort($terms, function($a, $b) use ($custom_order) {
        //     $pos_a = array_search($a->slug, $custom_order);
        //     $pos_b = array_search($b->slug, $custom_order);
        //     return $pos_a - $pos_b;
        //   });

          // 並び替え後にリンクを生成（FB：並び替え不要）
          foreach ($terms as $term) :
            $term_link = get_term_link($term);
        ?>
        <a href="<?php echo esc_url($term_link); ?>" class="campaign-category__link <?php echo (is_tax('voice_category', $term->slug) ? 'is-active' : ''); ?>">
          <?php echo esc_html($term->name); ?>
        </a>
        <?php endforeach; endif; ?>
      </div>
      <div class="page-campaign__items voice-cards">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article class="voice-cards__item voice-card">
            <div class="voice-card__link">
              <div class="voice-card__head">
                <div class="voice-card__meta">
                  <div class="voice-card__label">
                    <!-- 年代（性別） -->
                    <span class="voice-card__age">
                      <?php
                        $voice_age_and_gender = get_field('voice_age_and_gender');  // グループフィールドからデータを取得
                        $voice_age = $voice_age_and_gender['voice_1'];  // サブフィールドから年代を取得
                        $voice_gender = $voice_age_and_gender['voice_2']; // サブフィールドから性別を取得
                      ?>
                      <?php if ( $voice_age ) : ?>
                        <?php echo esc_html($voice_age); ?>
                      <?php endif; ?>
                      <?php if ( $voice_gender ) : ?>
                        (<?php echo esc_html($voice_gender); ?>)
                      <?php endif; ?>
                    </span>
                    <?php
                      // カスタムタクソノミー「voice_category」の取得
                      $terms = get_the_terms(get_the_ID(), 'voice_category');
                      if ( $terms && !is_wp_error($terms) ) :
                    ?>
                      <p class="voice-card__category"><?php echo esc_html($terms[0]->name); ?></p>
                    <?php endif; ?>
                  </div>
                  <h3 class="voice-card__title"><?php the_title(); ?></h3>
                </div>
                <div class="voice-card__img colorbox js-colorbox">
                  <picture>
                    <?php if ( get_the_post_thumbnail() ) : ?>
                      <source srcset="<?php the_post_thumbnail_url('full'); ?>" type="image/webp">
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像">
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/noimage.png" alt="noimage">
                    <?php endif; ?>
                  </picture>
                </div>
              </div>
              <?php if ( get_field('voice_3') ) : ?>
                <p class="voice-card__text text--black-sp"><?php the_field('voice_3'); ?></p>
              <?php endif; ?>
            </div>
          </article>
        <?php endwhile; endif; ?>
      </div>
    </div>
  </div>

  <div class="layout-pagenavi layout-pagenavi--voice-page">
    <?php wp_pagenavi(); ?>
  </div>

<?php get_footer(); ?>
