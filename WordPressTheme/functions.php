<?php

function enqueue_custom_scripts() {
  // Google Fontsの読み込み
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@100..900&display=swap', array(), null);

  // SwiperのCSS読み込み
  wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), null);

  // テーマのメインCSS読み込み
  wp_enqueue_style('main-style', get_theme_file_uri('/assets/css/style.css'), array(), null);

  // jQueryの読み込み（defer属性付き）
  wp_enqueue_script('jquery-cdn', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', array(), '3.7.1', true);

  // jQuery.inviewプラグインの読み込み（defer属性付き）
  wp_enqueue_script('jquery-inview', get_theme_file_uri('/assets/js/jquery.inview.min.js'), array('jquery-cdn'), 'null', true);

  // SwiperのJavaScript読み込み（defer属性付き）
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11.0.0', true);

  // テーマのメインJavaScriptファイル読み込み（defer属性付き）
  wp_enqueue_script('main-script', get_theme_file_uri('/assets/js/script.js'), array('jquery-cdn'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

// crossorigin属性を持つタグに対する対応
function add_rel_preconnect( $html, $handle, $href, $media ) {
  // Google Fontsに対してのみpreconnectを追加(ChatGPT)
  if ( 'google-fonts' === $handle ) {
    $html = <<<EOT
<link rel='preconnect' href='https://fonts.googleapis.com'>
<link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
$html
EOT;
  }
  // Swiperに対して特別な処理が不要な場合、そのままスルー
  return $html;
}

add_filter( 'style_loader_tag', 'add_rel_preconnect', 10, 4 );

// 管理画面：投稿 → ブログに名称変更
// 管理画面のメニューにある「投稿」というラベルを「ブログ」に変更する関数を定義
function Change_menulabel() {
  // globalは、WordPressのグローバル変数（$menuと$submenu）を使うための宣言
  // $menuと$submenuは、WordPressの管理画面のメニューの情報を持っている
  global $menu;
  global $submenu;
  $name = 'ブログ'; // $nameという変数に、「ブログ」という新しい名前を設定
  $menu[5][0] = $name;  // menu[5]は、「投稿」メニューを指している。これを「ブログ」に変更
  // submenu['edit.php']は、「投稿」のサブメニューを指す。[5][0]は「投稿一覧」を示し、これを「ブログ一覧」に変更
  $submenu['edit.php'][5][0] = $name.'一覧';
  // submenu['edit.php'][10][0]は「新規追加」を指し、「新しいブログ」に変更
  $submenu['edit.php'][10][0] = '新しい'.$name;
}
  // 投稿オブジェクトのラベルを「ブログ」に変更する関数を定義
function Change_objectlabel() {
  // グローバル変数を使ってWordPressの投稿タイプ（ここでは「投稿」）にアクセス
  global $wp_post_types;
  $name = 'ブログ'; // 再度、$nameに「ブログ」を設定
  // labelsというプロパティにアクセスして、投稿オブジェクト（post）のラベルを変更できるようにする
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;  // 投稿全体の名前を「ブログ」に、単数形の名前も「ブログ」に変更
  $labels->singular_name = $name;
  // 「追加」ボタンのテキストを変更（_xは翻訳関数で、「追加」というテキストを「ブログ」に関連付ける）
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name.'の新規追加'; // 「新規追加」のラベルを「ブログの新規追加」に変更
  $labels->edit_item = $name.'の編集';  // 「編集」のラベルを「ブログの編集」に変更
  $labels->new_item = '新規'.$name; // 「新規」のラベルを「新規ブログ」に変更
  $labels->view_item = $name.'を表示'; // 「表示」のラベルを「ブログを表示」に変更
  $labels->search_items = $name.'を検索'; // 「検索」のラベルを「ブログを検索」に変更
  // 「見つからなかった」メッセージを「ブログが見つかりませんでした」に変更
  $labels->not_found = $name.'が見つかりませんでした';
  // ゴミ箱に見つからなかった場合のメッセージを「ゴミ箱にブログは見つかりませんでした」に変更
  $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
// add_action関数を使って、Change_objectlabel関数をWordPressの初期化（init）のタイミングで実行するように登録
add_action( 'init', 'Change_objectlabel' );
// Change_menulabel関数をWordPressの管理画面のメニュー（admin_menu）が読み込まれたときに実行するように登録
add_action( 'admin_menu', 'Change_menulabel' );

// add_theme_support関数は特定のテーマ機能を有効化するためのもの。
// この関数により、テーマが特定の機能をサポートしていることをWPに知らせることができる
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */  // 管理画面で記事やページに画像を追加できるようになる
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );

//アーカイブの表示件数変更  $query ↓ 現在のページでどの投稿が表示されるかを決定するための情報が入っている
function change_posts_per_page($query) {
  // 管理画面やメインクエリでない場合は処理しない
  if ( is_admin() || ! $query->is_main_query() )
      return;

  // カスタム投稿タイプ「campaign」のアーカイブページの場合、4件に設定(カスタムタクソノミーのアーカイブページも同様)
  if ( $query->is_post_type_archive('campaign') || is_tax('campaign_category') ) { //カスタム投稿タイプまたはカスタムタクソノミーを指定
      $query->set( 'posts_per_page', '4' ); //表示件数を指定
  }
  // カスタム投稿タイプ「voice」のアーカイブページの場合、6件に設定(カスタムタクソノミーのアーカイブページも同様)
  if ( $query->is_post_type_archive('voice') || is_tax('voice_category') ) {
    $query->set( 'posts_per_page', '6' );
  }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

// カスタム投稿タイプ「campaign」のリライトルールを空にして、詳細ページを生成しない
add_filter('campaign_rewrite_rules', '__return_empty_array');

// カスタム投稿タイプ「voice」のリライトルールを空にして、詳細ページを生成しない
add_filter('voice_rewrite_rules', '__return_empty_array');

// 投稿の閲覧数をカウントする関数を作成
function set_post_views($postID) {
  // カスタムフィールド（特別なデータの保存場所）の名前を設定。「post_views_count」という名前で、各投稿の閲覧数を保存
  $count_key = 'post_views_count';
  // $postID で指定された投稿のカスタムフィールドから、閲覧数を取得。true は1つの値だけを取得する指定
  $count = get_post_meta($postID, $count_key, true);
  // もし、カウントのデータがまだ存在しない（空の値が返ってきた）場合、初期値として0を設定
  if ( $count == '' ) {
    $count = 0;
    // delete_post_meta()：念のため、既存のカスタムフィールドを削除
    delete_post_meta($postID, $count_key);
    // add_post_meta()：新しく投稿に「0」という初期値の閲覧数を登録
    add_post_meta($postID, $count_key, '0');
    // もしすでにカウントが存在している場合、カウントを1増やす
  } else {
    $count++;
    // update_post_meta()：カスタムフィールドの閲覧数を新しい値に更新（1つ増やす）
    update_post_meta($postID, $count_key, $count);
  }
}

// 投稿が表示されたときにset_post_views()関数を呼び出してカウントを増やす
function track_post_views($post_id) {
  // もし今表示されているページが「単一の投稿ページ」でなければ、何もせずにこの関数を終了（ブログ一覧ページなどではカウントしない）
  if ( !is_single() ) return;
  // もし投稿IDが指定されていなければ、global $post を使って現在表示している投稿のIDを取得
  if ( empty($post_id) ) {
    global $post;
    $post_id = $post->ID;
  }
  // set_post_views($post_id) で、現在の投稿の閲覧数をカウント
  set_post_views($post_id);
}
// add_action()：wp_head というWordPressの特定の場所（ページのヘッダー）で track_post_views() 関数を呼び出すように設定
// （これにより、ページが表示されるたびに閲覧数がカウントされる）
add_action('wp_head', 'track_post_views');

// 投稿カスタムフィールドから閲覧数を取得する関数
function get_post_views($postID) {  // 指定された投稿（記事）の閲覧数を取得して表示するための関数
  // $count_key：前と同じく、閲覧数のカスタムフィールドの名前
  $count_key = 'post_views_count';
  // get_post_meta()：これも前と同じく、指定した投稿の閲覧数をカスタムフィールドから取得
  $count = get_post_meta($postID, $count_key, true);
  // もし閲覧数がまだ存在しなければ、0を返す（「0 View」を表示する）。最初は誰も見ていない投稿には0が設定される
  if ( $count == '' ) {
    return "0 View";
  }
  // return：カウントされた数に「Views」という文字を付けて返す
  return $count . ' Views';
}

// 管理画面に閲覧数のカラムを追加し、順序を調整
function customize_views_column($columns) {
  // 現在の画面が投稿一覧（post）の場合だけ処理を行う
  $screen = get_current_screen(); // get_current_screen()：現在の管理画面がどの画面なのかを取得
  // $screen->post_type === 'post'：現在表示している管理画面が「通常の投稿」（postタイプ）の場合のみ、「閲覧数」カラムを追加
  if ( $screen->post_type === 'post' ) { // 'post'のみで閲覧数を表示する
    // 新しいカラムを追加し、順序を調整
    $reordered_columns = array(); // 新しいカラムの順序を保持するための配列を準備
    
    // 元々のカラム（$columns）を一つ一つ処理する。$keyにはカラムの名前、$valueにはカラムの表示名が入る
    foreach ($columns as $key => $value) {
      // もしカラムが「日付（date）」だったら･･･
      if ( $key === 'date' ) {
        // 「日付」の前に「閲覧数（post_views）」カラムを追加
        $reordered_columns['post_views'] = '閲覧数';
      }
      // 元のカラムを順番に$reordered_columnsに追加。これで、他のカラムも保持される
      $reordered_columns[$key] = $value; // 既存のカラムをそのまま追加
    }
    // return：新しく並べ替えたカラムを返す。これにより、「閲覧数」が日付の左側に追加される
    return $reordered_columns;
  }

  return $columns; // 'post'以外（例えばcampaignやvoiceなど）の時はそのままカラムを返す
}
// manage_posts_columnsというフィルターに、このcustomize_views_column関数を登録 → 投稿一覧画面のカラムが変更される
add_filter('manage_posts_columns', 'customize_views_column');

// カラムに投稿の閲覧数を表示
function display_views_column($column_name, $post_id) {
  // もしカラムが「閲覧数（post_views）」なら、その投稿のIDを使ってget_post_views()で取得した閲覧数を表示
  if ( $column_name === 'post_views' ) {
    echo get_post_views($post_id);
  }
}
// manage_posts_custom_columnアクションを使って、display_views_column関数を実行する → カラムに閲覧数が表示される
add_action('manage_posts_custom_column', 'display_views_column', 10, 2);

// カラムの並び替えを可能にする
function make_views_column_sortable($columns) { // 管理画面で「閲覧数」カラムをクリックすると、閲覧数順に並び替えができるようにする関数
  // post_viewsというカラムが、post_views_count（カスタムフィールドに保存された閲覧数）で並び替えができるように設定
  // （カスタムフィールド（特別なデータの保存場所）は「post_views_count」という名前で、各投稿の閲覧数を保存）
  $columns['post_views'] = 'post_views_count';
  return $columns;
}
// manage_edit-post_sortable_columnsフィルターにこの関数を登録し、投稿一覧画面で閲覧数カラムの並び替えが可能になる
add_filter('manage_edit-post_sortable_columns', 'make_views_column_sortable');

// 閲覧数で並び替え
function order_by_views($query) { // 投稿のクエリ（データベースから情報を取得する処理）を、閲覧数順に並び替えるための関数
  // 管理画面以外ではこの関数を実行しない
  if ( !is_admin() ) return;

  $orderby = $query->get('orderby');  // $orderby：現在の並び替え条件を確認
  // もし並び替え条件がpost_views_countなら、meta_keyにpost_views_countを設定し、meta_value_numで数値として並び替えを行う
  if ( 'post_views_count' == $orderby ) {
    $query->set('meta_key', 'post_views_count');
    $query->set('orderby', 'meta_value_num');
  }
}
// pre_get_postsアクションで、この関数を実行する → クエリが実行される前に並び替え条件を適用
add_action('pre_get_posts', 'order_by_views');

// アーカイブタイトルの「月: 」や「年: 」などのプレフィックスを削除
add_filter('get_the_archive_title', function ($title) {
  if ( is_day()) {
    $title = get_the_date('Y年n月j日'); // 年月日を「2024年8月31日」の形式で表示
  } elseif ( is_month() ) {
    $title = get_the_date('Y年n月'); // 年月を「2024年8月」の形式で表示
  } elseif ( is_year() ) {
    $title = get_the_date('Y年'); // 年を「2024年」の形式で表示
  }
  return $title;
});

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

// フォームが送信されたときに、サンクスページに自動的に移動させるための処理
function custom_wpcf7_scripts() {
  // もし今表示されているページが固定ページであれば、その後の処理を実行する
  if ( is_page() ) { // 特定のページの場合にのみスクリプトを追加する
    ?>
    <script>
    // フォームが送信された後に何かを行う「イベントリスナー」を追加
    // 'wpcf7mailsent'：Contact Form 7 でフォームが正常に送信されたことを示すイベント
    document.addEventListener( 'wpcf7mailsent', function( event ) {
      // location.href は「ブラウザのURLを変更する」ためのもの → http:～ というURLにリダイレクト（ページ移動）する
      location.href = 'http://codeupsforwordpress3.local/thanks/';
    }, false ); // false はイベントがバブリング（親要素に伝わる）しないようにする設定
    </script>
    <?php
  }
}
// 作成した関数「custom_wpcf7_scripts」を</body> タグの直前に追加する、という指示
add_action( 'wp_footer', 'custom_wpcf7_scripts' );

// WordPressの特定の投稿タイプに対してWYSIWYGエディターを無効化する
function remove_wysiwyg_for_post_type($post_type) {
  remove_post_type_support($post_type, 'editor');
  // 必要に応じて他の機能を削除
  // remove_post_type_support($post_type, 'thumbnail');
}

add_action('init', function() {
  // エディターを無効にする投稿タイプのリスト
  $post_types = ['campaign', 'voice'];

  // 各投稿タイプに対してエディターを削除
  foreach ($post_types as $post_type) {
    remove_wysiwyg_for_post_type($post_type);
  }
});

// 管理画面にカスタムCSSを追加する（Campaignページ、説明文の文字を赤くする）
function my_acf_admin_styles() {
  echo '
  <style>
    /* 「手順」欄に入力した文字を赤くする */
    .acf-field .acf-label p.description {
      color: red;
    }
  </style>
  ';
}
add_action('admin_head', 'my_acf_admin_styles');

// 管理画面にカスタムCSSを追加する（Campaign、Voiceページ、サンプル画像を挿入）
function my_custom_admin_styles() {
  echo '
    <style>
      /* ACFグループの右側にサンプル画像を挿入 */
      /* Campaignページ */
      #acf-group_66f03c54687bd .acf-fields.-top {
        background-image: url(' . get_template_directory_uri() . '/assets/images/common/campaign-sample.webp);
        background-position: top right 8px;
        background-size: contain;
        background-repeat: no-repeat;
      }

      /* Voiceページ */
      #acf-group_66f123ca28191 .acf-fields.-top {
        background-image: url(' . get_template_directory_uri() . '/assets/images/common/voice-sample.webp);
        background-position: top 24px right 8px;
        background-size: 320px;
        background-repeat: no-repeat;
      }
    </style>
  ';
}
add_action('admin_head', 'my_custom_admin_styles');

// エディターのメインコンテンツエリアについて高さを調整
function custom_editor_styles_for_specific_page() {
  // 現在の画面情報を取得
  $screen = get_current_screen();
  
  // エディタ画面かつ特定の固定ページIDが12（料金一覧）または16（よくある質問）の場合にスタイルを適用
  if ( 'post' === $screen->base && get_the_ID() === 12 || get_the_ID() === 16 ) {
    echo '<style>
      .editor-visual-editor {
        height: 80%;
      }
    </style>';
    // エディタ画面かつ特定の固定ページIDが8（私たちについて）の場合にスタイルを適用
  // } elseif ( 'post' === $screen->base && get_the_ID() === 8 ) {
  //   echo '<style>
  //     .editor-visual-editor {
  //       height: 30%;
  //     }
  //   </style>';
  //   // エディタ画面かつ特定の固定ページIDが25（トップページ）の場合にスタイルを適用
  // } elseif ( 'post' === $screen->base && get_the_ID() === 25 ) {
  //   echo '<style>
  //     .editor-visual-editor {
  //       height: 30%;
  //     }
  //   </style>';
  }
}
add_action('admin_head', 'custom_editor_styles_for_specific_page');

// Priceページのエディターで「価格」欄の説明文の文字を赤くする
function my_scf_admin_styles() {
  echo '<style>
    /* SCFの「手順」欄に入力した文字を赤くする */
    .smart-cf-meta-box-table td .instruction {
      color: red;
    }
  </style>';
}
add_action('admin_head', 'my_scf_admin_styles');

// ウィジェットの内容を定義する関数（アイコン付きリンクを追加）
function my_custom_dashboard_widget() {
  // ウィジェット内に表示する内容をリスト化（CSSクラスを使う）
  echo '<ul class="custom-dashboard-links">'; // クラスを割り当て
  echo '<li><span class="dashicons dashicons-admin-home custom-icon"></span><a href="' . get_edit_post_link(25) . '">トップページ</a></li>';
  echo '<li><span class="dashicons dashicons-format-gallery custom-icon"></span><a href="' . get_edit_post_link(8) . '">ギャラリー</a></li>';
  echo '<li><span class="dashicons dashicons-money-alt custom-icon"></span><a href="' . get_edit_post_link(12) . '">料金一覧</a></li>';
  echo '<li><span class="dashicons dashicons-editor-help custom-icon"></span><a href="' . get_edit_post_link(16) . '">よくある質問</a></li>';
  echo '</ul>';
}

// ウィジェットをダッシュボードに追加する関数
function add_my_custom_dashboard_widget() {
  wp_add_dashboard_widget(
      'custom_dashboard_widget',   // ウィジェットのID
      '固定ページへのリンク',     // ウィジェットのタイトル
      'my_custom_dashboard_widget' // ウィジェット内に表示する内容を作る関数
  );
}

// カスタムCSSを追加する関数
function my_custom_dashboard_styles() {
  echo '
  <style>
      .custom-dashboard-links {
          list-style: none;
          padding-left: 0;
      }
      .custom-dashboard-links li {
          font-size: 18px;
          margin-bottom: 10px;
      }
      .custom-dashboard-links .custom-icon {
          margin-right: 5px;
      }
  </style>';
}

// ダッシュボード用のCSSを読み込む
add_action('admin_head', 'my_custom_dashboard_styles');

// フックを使ってダッシュボードにウィジェットを追加
add_action('wp_dashboard_setup', 'add_my_custom_dashboard_widget');

// すべての固定ページのエディターを削除
// function my_remove_post_editor_support() {
// remove_post_type_support( 'page', 'editor' );//本文
// }
// add_action( 'init' , 'my_remove_post_editor_support' );

// これでもOK！
// 「料金一覧」「プライバシーポリシー」「利用規約」以外の固定ページのブロックエディタを非表示にする（1）
// 固定ページに対してブロックエディタを使用するかどうかを制御するフィルターフック
// $use_block_editor（エディタを使うかどうかのブール値）と$post（現在の投稿情報）を引数として受け取る
// add_filter('use_block_editor_for_post', function($use_block_editor, $post) {
//   // 投稿のタイプが「固定ページ」であるかどうかをチェックする
//   if ( $post->post_type === 'page' ) {
//     // 表示するページスラッグのリスト
//     $allowed_pages = ['price', 'faq', 'privacy-policy', 'terms-of-service'];

//     // スラッグがリストに含まれていなければエディタを非表示にする
//     // in_array()関数：指定した値が配列に含まれているかどうかを確認
//     // ページスラッグが許可されたリストに含まれていない場合にtrueを返す
//     if ( !in_array($post->post_name, $allowed_pages) ) {  // post_nameはページのスラッグを指す
//       // 特定の投稿タイプからエディタのサポートを削除する
//       remove_post_type_support('page', 'editor'); // エディタを非表示
//       return false; // ブロックエディタを無効化
//     }
//   }
//   // 条件に該当しない場合は、もともとのブロックエディタの設定を保持するために、この値をそのまま返す
//   return $use_block_editor; // それ以外の場合はエディタを使用
// }, 10, 2);

// 「料金一覧」「プライバシーポリシー」「利用規約」以外の固定ページのブロックエディタを非表示にする（2）
function my_remove_post_editor_support() {
  // 現在の画面が管理画面であり、編集しているのが固定ページの場合のみ処理を続ける
  // 今表示している画面の情報を$screenという変数に保存
  $screen = get_current_screen();
  // その画面で編集している投稿タイプ（$screen->post_type）が固定ページ（page）、かつ現在の管理画面の「画面タイプ」（$screen->base）が編集画面（post）ならば
  if ( $screen->post_type === 'page' && $screen->base === 'post' ) {
    // 編集しているページのIDを取得（現在のページIDを取得（$_GET['post']）し、存在していればそれを整数値に変換して$post_idに保存し、IDがない場合は0を代入）
    $post_id = isset($_GET['post']) ? intval($_GET['post']) : 0;

    // IDに基づいてページのスラッグを取得し、特定のページならエディタ削除をしない
    $exclude_slugs = array('price', 'faq', 'privacy-policy', 'terms-of-service');
    // get_current_screen()：指定した投稿IDに関連する特定のフィールド（ここではpost_name、すなわちスラッグ）を取得するための関数
    $post_slug = get_post_field( 'post_name', $post_id );

    // 除外リストにある場合はエディタ削除を行わない
    if ( in_array( $post_slug, $exclude_slugs ) ) {
      return;
    }

    // 条件に合わない場合はエディタを削除
    // 固定ページからエディター（editor）機能を削除
    remove_post_type_support( 'page', 'editor' );
  }
}
// current_screen：現在の管理画面の画面情報が利用可能になるタイミングでフックされるアクションフック
add_action( 'current_screen', 'my_remove_post_editor_support' );
