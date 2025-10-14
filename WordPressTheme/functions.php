<?php
function enqueue_custom_scripts() {
  // Google Fontsの読み込み
  wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato:wght@400;700&family=Noto+Sans+JP:wght@100..900&display=swap', [], null );

  // SwiperのCSS読み込み
  wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], null );

  // テーマのメインCSS読み込み
  wp_enqueue_style( 'main-style', get_theme_file_uri( '/assets/css/style.css' ), [], null );

  // jQueryの読み込み（defer属性付き）
  wp_enqueue_script( 'jquery-cdn', 'https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js', [], '3.7.1', true );

  // jQuery.inviewプラグインの読み込み（defer属性付き）
  wp_enqueue_script( 'jquery-inview', get_theme_file_uri( '/assets/js/jquery.inview.min.js' ), [ 'jquery-cdn' ], 'null', true );

  // SwiperのJavaScript読み込み（defer属性付き）
  wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], '8.0.0', true );

  // テーマのメインJavaScriptファイル読み込み（defer属性付き）
  wp_enqueue_script( 'main-script', get_theme_file_uri( '/assets/js/script.js' ), [ 'jquery-cdn' ], null, true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );

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
  $menu[5][0] = $name;  // $menu[5]は、「投稿」メニュー全体を指している。その表示ラベルを指す$menu[5][0]を「ブログ」に変更
  // $submenu['edit.php']は、「投稿」のサブメニューを指す。[5][0]は「投稿一覧」を示し、これを「ブログ一覧」に変更
  $submenu['edit.php'][5][0] = $name . '一覧';
  // $submenu['edit.php'][10][0]は「新規追加（投稿を追加）」を指し、「新しいブログ」に変更
  $submenu['edit.php'][10][0] = '新しい' . $name;
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
  //「追加」ボタンのテキストを変更（_xは翻訳関数で、「追加」というテキストを「ブログ」に関連付ける）
  $labels->add_new = _x( '追加', $name );
  $labels->add_new_item = $name . 'の新規追加'; //「新規追加（投稿を追加）」のラベルを「ブログの新規追加」に変更
  $labels->edit_item = $name . 'の編集';  //「編集（投稿を編集）」のラベルを「ブログの編集」に変更（タブの箇所）
  $labels->new_item = '新規' . $name; //「新規」のラベルを「新規ブログ」に変更 → 現行UIでは目立つ場所に現れないため、「新規ブログ」という可視テキストは基本出てこない 25.9.28
  $labels->view_item = $name . 'を表示'; //「表示（投稿を表示）」のラベルを「ブログを表示」に変更（アドミンバーの箇所）
  $labels->search_items = $name . 'を検索'; //「検索（投稿を検索）」のラベルを「ブログを検索」に変更（ブログ一覧画面の右上）
  //「見つからなかった」メッセージを「ブログが見つかりませんでした」に変更
  $labels->not_found = $name . 'が見つかりませんでした';
  // ゴミ箱に見つからなかった場合のメッセージを「ゴミ箱にブログは見つかりませんでした」に変更
  $labels->not_found_in_trash = 'ゴミ箱に' . $name . 'は見つかりませんでした';
  $labels->name_admin_bar = $name;  //「+ 新規 > 投稿」→「+ 新規 > ブログ」に変更（アドミンバーのサブメニュー表示名） 25.9.28
}
// add_action関数を使って、Change_objectlabel関数をWordPressの初期化（init）のタイミングで実行するように登録
add_action( 'init', 'Change_objectlabel' ); // initアクション：WordPressの初期化が完了したタイミングで呼ばれるアクション（カスタム投稿タイプ・タクソノミー・リライトルールを登録するのに最適）
// Change_menulabel関数をWordPressの管理画面のメニュー（admin_menu）が読み込まれたときに実行するように登録
add_action( 'admin_menu', 'Change_menulabel' ); // admin_menuアクション：管理画面にメニューを追加・編集できるタイミングで実行されるアクション

// add_theme_support関数は特定のテーマ機能を有効化するためのもの。
// この関数により、テーマが特定の機能をサポートしていることをWPに知らせることができる
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */  // 管理画面で記事やページに画像を追加できるようになる
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		[ /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
    ]
	);
}
add_action( 'after_setup_theme', 'my_setup' );  // after_setup_themeアクション：テーマが読み込まれた直後に実行されるアクション（プラグインは全部読み込まれたけど、まだWordPress本体の初期化（init）には入っていないタイミング）

//アーカイブの表示件数変更  $query ↓ 現在のページでどの投稿が表示されるかを決定するための情報が入っている
function change_posts_per_page( $query ) {
  // 管理画面やメインクエリでない場合は処理しない
  if ( is_admin() || ! $query->is_main_query() )
      return;

  // カスタム投稿タイプ「campaign」のアーカイブページの場合、4件に設定(カスタムタクソノミーのアーカイブページも同様)
  if ( $query->is_post_type_archive( 'campaign' ) || is_tax( 'campaign_category' ) ) { //カスタム投稿タイプまたはカスタムタクソノミーを指定
      $query->set( 'posts_per_page', '4' ); //表示件数を指定
  }
  // カスタム投稿タイプ「voice」のアーカイブページの場合、6件に設定(カスタムタクソノミーのアーカイブページも同様)
  if ( $query->is_post_type_archive( 'voice' ) || is_tax( 'voice_category' ) ) {
    $query->set( 'posts_per_page', '6' );
  }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );

// カスタム投稿タイプ「campaign」のリライトルールを空にして、詳細ページを生成しない
add_filter( 'campaign_rewrite_rules', '__return_empty_array' );

// カスタム投稿タイプ「voice」のリライトルールを空にして、詳細ページを生成しない
add_filter( 'voice_rewrite_rules', '__return_empty_array' );

// 投稿の閲覧数をカウントする関数を作成
function set_post_views( $postID ) {
  // カスタムフィールド（特別なデータの保存場所）の名前を設定。「post_views_count」という名前で、各投稿の閲覧数を保存
  $count_key = 'post_views_count';
  // $postID で指定された投稿のカスタムフィールドから、閲覧数を取得。true は1つの値だけを取得する指定
  $count = get_post_meta( $postID, $count_key, true );
  // もし、カウントのデータがまだ存在しない（空の値が返ってきた）場合、初期値として1を設定（0 → 1に修正）
  if ( $count == '' ) {
    $count = 1; // 0 → 1に修正（この関数は投稿が表示されたときに呼び出されるので、初回は1として設定）
    // delete_post_meta()：念のため、既存のカスタムフィールドを削除
    delete_post_meta( $postID, $count_key );  // 通常のWPの運用では「キーが存在するのに値が空」という状態はほとんど発生しないのでこの行は削除しても問題ない（ →「安全性を優先したい」ので残すことにする）
    // add_post_meta()：新しく投稿に「0」という初期値の閲覧数を登録
    add_post_meta( $postID, $count_key, $count );
    // もしすでにカウントが存在している場合、カウントを1増やす
  } else {
    $count++;
    // update_post_meta()：カスタムフィールドの閲覧数を新しい値に更新（1つ増やす）
    update_post_meta( $postID, $count_key, $count );
  }
}

// 投稿が表示されたときにset_post_views()関数を呼び出してカウントを増やす
function track_post_views( $post_id ) {
  // もし今表示されているページが「単一の投稿ページ」でなければ、何もせずにこの関数を終了（ブログ一覧ページなどではカウントしない）
  if ( ! is_single() ) return;
  // もし投稿IDが指定されていなければ、global $post を使って現在表示している投稿のIDを取得
  if ( empty( $post_id ) ) {
    global $post;
    $post_id = $post->ID;
  }
  // set_post_views( $post_id ) で、現在の投稿の閲覧数をカウント
  set_post_views( $post_id );
}
// add_action()：wp_head というWordPressの特定の場所（ページのヘッダー）で track_post_views() 関数を呼び出すように設定
//（これにより、ページが表示されるたびに閲覧数がカウントされる）
add_action( 'wp_head', 'track_post_views' );

// 投稿カスタムフィールドから閲覧数を取得する関数
function get_post_views( $postID ) {  // 指定された投稿（記事）の閲覧数を取得して表示するための関数
  // $count_key：前と同じく、閲覧数のカスタムフィールドの名前
  $count_key = 'post_views_count';
  // get_post_meta()：これも前と同じく、指定した投稿の閲覧数をカスタムフィールドから取得
  $count = get_post_meta( $postID, $count_key, true );
  // もし閲覧数がまだ存在しなければ、0を返す（「0 View」を表示する）。最初は誰も見ていない投稿には0が設定される
  if ( $count == '' ) {
    return "0 View";
  }
  // return：カウントされた数に「Views」という文字を付けて返す
  return $count . ' Views';
}

// 管理画面に閲覧数とアイキャッチのカラムを追加し、順序を調整
function customize_views_column( $columns ) {
  // 現在の画面が投稿一覧（post）の場合だけ処理を行う
  $screen = get_current_screen(); // get_current_screen()：現在の管理画面がどの画面なのかを取得
  // $screen->post_type === 'post'：現在表示している管理画面が「通常の投稿」（postタイプ）の場合のみ、「閲覧数」カラムを追加
  if ( $screen->post_type === 'post' ) { // 'post'のみで閲覧数を表示する
    // 新しいカラムを追加し、順序を調整
    $reordered_columns = []; // 新しいカラムの順序を保持するための配列を準備

    // 元々のカラム（$columns）を一つ一つ処理する。$keyにはカラムの名前、$valueにはカラムの表示名が入る
    foreach ( $columns as $key => $value ) {
      if ( $key === 'date' ) {  // もしカラムが「日付（date）」だったら･･･
        //「日付」の前に「閲覧数（post_views）」カラムを追加
        $reordered_columns['post_views'] = '閲覧数';
      } elseif ( $key === 'title' ) { // もしカラムが「タイトル（title）」だったら･･･
        //「タイトル」の前に「アイキャッチ（thumbnail）」カラムを追加
        $reordered_columns['thumbnail'] = 'アイキャッチ';
      }
      // 元のカラムを順番に$reordered_columnsに追加。これで、他のカラムも保持される
      $reordered_columns[ $key ] = $value; // 既存のカラムをそのまま追加
    }
    // return：新しく並べ替えたカラムを返す。これにより、「閲覧数」が日付の左側に、「アイキャッチ」がタイトルの左側に追加される
    return $reordered_columns;
  }

  return $columns; // 'post'以外（例えばcampaignやvoiceなど）の時はそのままカラムを返す
}
// manage_posts_columnsというフィルター（管理画面の投稿一覧のカラムを決める直前に実行されるフィルター）に、このcustomize_views_column関数を登録 → 投稿一覧画面のカラムが変更される
add_filter( 'manage_posts_columns', 'customize_views_column' );

// カラムに投稿の閲覧数とアイキャッチを表示
function display_views_column( $column_name, $post_id ) {
  if ( $column_name === 'post_views' ) {  // もしカラムが「閲覧数（post_views）」なら、その投稿のIDを使ってget_post_views()で取得した閲覧数を表示
    echo esc_html( get_post_views( $post_id ) );  // get_post_views()は作成済み
  } elseif ( $column_name === 'thumbnail' ) { // もしカラムが「アイキャッチ（thumbnail）」なら、その投稿のIDを使ってアイキャッチを表示
    if ( has_post_thumbnail( $post_id ) ) {
      echo get_the_post_thumbnail( $post_id, [ 100, 100 ] ); // 100x100サイズでアイキャッチを表示
    } else {
      echo 'なし'; // アイキャッチ未設定時は「なし」と表示
    }
  }
}
// manage_posts_custom_columnアクション（管理画面の投稿一覧のカラムに値を表示するときに実行されるアクション）を使って、display_views_column関数を実行する → カラムに閲覧数とアイキャッチが表示される
add_action( 'manage_posts_custom_column', 'display_views_column', 10, 2 );

// カラムの並び替えを可能にする
function make_views_column_sortable( $columns ) { // 管理画面で「閲覧数」カラムをクリックすると、閲覧数順に並び替えができるようにする関数
  // post_viewsというカラムが、post_views_count（カスタムフィールドに保存された閲覧数）で並び替えができるように設定
  //（カスタムフィールド（特別なデータの保存場所）は「post_views_count」という名前で、各投稿の閲覧数を保存）
  $columns['post_views'] = 'post_views_count';  //「post_views カラムをクリックしたら orderby=post_views_count を使う」設定（左辺：post_views → カラムID（「どのカラムか」）、右辺：post_views_count → 並び替え時に orderby の「値」として使われる。管理画面で「閲覧数」カラムをクリックするとURLに「?orderby=post_views_count」が付与される）
  return $columns;
}
// manage_edit-post_sortable_columnsフィルター（「どのカラムをクリック可能にするか（並び替え対象にするか）」を決めるときに実行されるフィルター）にこの関数を登録し、投稿一覧画面で閲覧数カラムの並び替えが可能になる
add_filter( 'manage_edit-post_sortable_columns', 'make_views_column_sortable' );

// 閲覧数で並び替え
function order_by_views( $query ) { // 投稿のクエリ（データベースから情報を取得する処理）を、「閲覧数」で並び替えるように書き換えるための関数
  // 管理画面以外ではこの関数を実行しない
  if ( ! is_admin() ) return;

  $orderby = $query->get( 'orderby' );  // $orderby：現在の並び替え条件を確認
  // もし並び替え条件がpost_views_countなら、meta_keyにpost_views_countを設定し、meta_value_numで数値として並び替えを行う（$orderby が 'post_views_count' なら、「閲覧数」で並び替えるようにクエリを書き換える）
  if ( 'post_views_count' == $orderby ) {
    $query->set( 'meta_key', 'post_views_count' );  // meta_key = 'post_views_count' →「post_views_count というカスタムフィールドを基準にする」と指定
    $query->set( 'orderby', 'meta_value_num' ); // orderby = 'meta_value_num' →「数値として並び替えを行う」と指定
  }
}
// pre_get_postsアクションで、この関数を実行する → クエリが実行される前に並び替え条件を適用
add_action( 'pre_get_posts', 'order_by_views' );

// アーカイブタイトルの「月: 」や「年: 」などのプレフィックスを削除（「無名関数」を登録 → 登録したフィルターを後から解除（remove_filter）できない）
add_filter( 'get_the_archive_title', function ( $title ) {
  if ( is_day() ) {  // 現在のページが「日別アーカイブ」かを判定
    $title = get_the_date( 'Y年n月j日' ); // 年月日を「2024年8月31日」の形式で表示
  } elseif ( is_month() ) {
    $title = get_the_date( 'Y年n月' ); // 年月を「2024年8月」の形式で表示
  } elseif ( is_year() ) {
    $title = get_the_date( 'Y年' ); // 年を「2024年」の形式で表示
  }
  return $title;
});

// Contact Form 7で自動挿入されるPタグ、brタグを削除
add_filter( 'wpcf7_autop_or_not', 'wpcf7_autop_return_false' );
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
function remove_wysiwyg_for_post_type( $post_type ) {
  // 存在確認（存在しない場合はスキップ）→ 登録されていない投稿タイプを指定してもエラーにならず、安全に動作する 25.10.6
  if ( post_type_exists( $post_type ) ) {
    remove_post_type_support( $post_type, 'editor' );
  }
  // 必要に応じて他の機能を削除
  // remove_post_type_support( $post_type, 'thumbnail' );
}

add_action( 'init', function() {
  // 管理画面でのみ実行（init アクションはサイトの表示側（front側）でも呼ばれるので、無駄に処理が走らないようにする） 25.10.6
  if ( is_admin() ) {
    // エディターを無効にする投稿タイプのリスト
    $post_types = [ 'campaign', 'voice' ];

    // 各投稿タイプに対してエディターを削除
    foreach ( $post_types as $post_type ) {
      remove_wysiwyg_for_post_type( $post_type );
    }
  }
});

// 管理画面にカスタムCSSを追加する（Campaignページ、説明文の文字を赤くする）
function my_acf_admin_styles() {
  global $pagenow;  // 今開いている管理画面が「投稿編集」なのかなどを判定するためのグローバル変数

  // 投稿編集画面 or 新規追加画面のとき
  if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
    $screen = get_current_screen(); // 現在の管理画面の情報（投稿タイプなど）を取得

    // 投稿タイプが 'campaign' のときだけCSSを出力
    if ( $screen && $screen->post_type === 'campaign' ) { // $screen->post_type：編集している投稿の種類（例：post, page, campaign）を取得
      echo '
      <style>
        /* 「手順」欄に入力した文字を赤くする */
        .acf-field .acf-label p.description {
          color: red;
        }
      </style>
      ';
    }
  }
}
// admin_head は「管理画面の <head> タグが読み込まれるタイミング」で実行されるアクションフック → 管理画面が表示されるたびに my_acf_admin_styles() が呼び出され、CSSが <head> 内に挿入される
add_action( 'admin_head', 'my_acf_admin_styles' );

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
add_action( 'admin_head', 'my_custom_admin_styles' );

// // エディターのメインコンテンツエリアについて高さを調整
// function custom_editor_styles_for_specific_page() {
//   // 現在の画面情報を取得
//   $screen = get_current_screen();

  // // 管理画面でのみ実行し、投稿タイプと投稿IDを正しく取得（min-height だと縦スクロールバーが2本出る）
  // if (is_admin() && $screen) {
  //   $post_id = 0;

  //   // 編集画面の場合、URLパラメータから投稿IDを取得
  //   if (isset($_GET['post'])) {
  //     $post_id = intval($_GET['post']);
  //   }

  //   // 投稿タイプを取得
  //   $post_type = '';
  //   if ($post_id > 0) {
  //     $post_type = get_post_type($post_id);
  //   }

  //   // 固定ページ（page）かつ特定のIDが12（料金一覧）または16（よくある質問）の場合にのみスタイルを適用
  //   if ($post_type === 'page' && ($post_id === 12 || $post_id === 16)) {
  //     echo '<style>
  //       /* エディタエリアの初期高さを設定（リサイズ機能は保持） */
  //       .editor-visual-editor {
  //         min-height: 80vh;
  //       }
  //     </style>';
  //   }
  // }
  // // エディタ画面かつ特定の固定ページIDが12（料金一覧）または16（よくある質問）の場合にスタイルを適用
  // if ( 'post' === $screen->base && get_the_ID() === 12 || get_the_ID() === 16 ) {
  //   echo '<style>
  //     .editor-visual-editor {
  //       height: 80%;
  //     }
  //   </style>';
  // }
// }
// add_action('admin_head', 'custom_editor_styles_for_specific_page');

// 料金一覧（ID: 12）とよくある質問（ID: 16）のエディター初期高さを80vhに設定（これでもうまくいかない。
// 「WordPressのブロックエディターの初期高さを設定するのは、実際には非常に困難な問題」との事。「リサイズハンドルを使って手動調整」で妥協する）
function set_editor_initial_height() {
  $screen = get_current_screen();

  if ( 'post' === $screen->base && isset( $_GET['post'] ) ) {
    $post_id = intval( $_GET['post'] );
    if ( $post_id === 12 || $post_id === 16 ) {
      ?>
      <style>
        .editor-styles-wrapper {
          height: 80vh !important;
        }
      </style>
      <?php
    }
  }
}
add_action( 'admin_head', 'set_editor_initial_height' );

// 管理画面にカスタムCSSを追加する（固定ページ、説明文の文字を赤くする）
function my_scf_admin_styles() {
  global $pagenow;  // 今開いている管理画面が「投稿編集」なのかなどを判定するためのグローバル変数

  // 投稿編集画面 or 新規追加画面のとき（投稿（post）、固定ページ（page）、カスタム投稿タイプ（campaign、voiceなど）の編集画面はいずれも post.php、新規追加はいずれも post-new.php）
  if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
    $screen = get_current_screen(); // 現在の管理画面の情報（投稿タイプなど）を取得

    // 投稿タイプが固定ページのときだけCSSを出力
    if ( $screen && $screen->post_type === 'page' ) {
      echo '<style>
        /* SCFの「手順」欄に入力した文字を赤くする */
        .smart-cf-meta-box-table td .instruction {
          color: red;
        }
      </style>';
    }
  }
}
// admin_head は「管理画面の <head> タグが読み込まれるタイミング」で実行されるアクションフック → 管理画面が表示されるたびに my_scf_admin_styles() が呼び出され、CSSが <head> 内に挿入される
add_action( 'admin_head', 'my_scf_admin_styles' );

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
add_action( 'admin_head', 'my_custom_dashboard_styles' );

// フックを使ってダッシュボードにウィジェットを追加
add_action( 'wp_dashboard_setup', 'add_my_custom_dashboard_widget' );

// すべての固定ページのエディターを削除
// function my_remove_post_editor_support() {
// remove_post_type_support( 'page', 'editor' );//本文
// }
// add_action( 'init' , 'my_remove_post_editor_support' );

// これでもOK！
// 「料金一覧」「よくある質問」「プライバシーポリシー」「利用規約」以外の固定ページのブロックエディタを非表示にする（1）
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

// 「料金一覧」「よくある質問」「プライバシーポリシー」「利用規約」以外の固定ページのブロックエディタを非表示にする（2）
function my_remove_post_editor_support() {
  // 現在の画面が管理画面であり、編集しているのが固定ページの場合のみ処理を続ける
  // 今表示している画面の情報を$screenという変数に保存
  $screen = get_current_screen();
  // その画面で編集している投稿タイプ（$screen->post_type）が固定ページ（page）、かつ現在の管理画面の「画面タイプ」（$screen->base）が編集画面（post）ならば
  if ( $screen->post_type === 'page' && $screen->base === 'post' ) {
    // 編集しているページのIDを取得（現在のページIDを取得（$_GET['post']）し、存在していればそれを整数値に変換して$post_idに保存し、IDがない場合は0を代入）
    $post_id = isset( $_GET['post'] ) ? intval( $_GET['post'] ) : 0;

    // IDに基づいてページのスラッグを取得し、特定のページならエディタ削除をしない
    $exclude_slugs = [ 'price', 'faq', 'privacy-policy', 'terms-of-service' ];
    // get_post_field()：指定した投稿IDに関連する特定のフィールド（ここではpost_name、すなわちスラッグ）を取得するための関数
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

// 繰り返しフィールドの「＋」「×」ボタンにラベル追加
function add_custom_button_labels() {
  global $pagenow;  // 今開いている管理画面が「投稿編集」なのかなどを判定するためのグローバル変数

  // 投稿編集画面 or 新規追加画面のとき（投稿（post）、固定ページ（page）、カスタム投稿タイプ（campaign、voiceなど）の編集画面はいずれも post.php、新規追加はいずれも post-new.php）
  if ( $pagenow === 'post.php' || $pagenow === 'post-new.php' ) {
    $screen = get_current_screen(); // 現在の管理画面の情報（投稿タイプなど）を取得

    // 投稿タイプが固定ページのときだけCSSを出力
    if ( $screen && $screen->post_type === 'page' ) {
      echo '
      <style>
      /* 「+」ボタンに「追加」ラベルを追加 */
      .dashicons-plus-alt::after {
        content: "追加";
        font-size: 12px;
        vertical-align: top;
        margin-left: 5px;
        padding-right: 10px;
      }

      .btn-add-repeat-group.dashicons.dashicons-plus-alt.smart-cf-repeat-btn {
        color: green;
      }

      /* 「×」ボタンに「削除」ラベルを追加 */
      .dashicons-dismiss::after {
        content: "削除";
        font-size: 12px;
        vertical-align: top;
        margin-left: 5px;
        padding-right: 10px;
      }

      .btn-remove-repeat-group.dashicons.dashicons-dismiss.smart-cf-repeat-btn {
        color: blue;
      }
      </style>
      ';
    }
  }
}
// admin_head は「管理画面の <head> タグが読み込まれるタイミング」で実行されるアクションフック → 管理画面が表示されるたびに add_custom_button_labels() が呼び出され、CSSが <head> 内に挿入される
add_action( 'admin_head', 'add_custom_button_labels' );

// GETパラメータを受け取って、フォームのセレクトボックスのデフォルト値として設定
function custom_wpcf7_select_filter( $tag ) {
  // $tagが配列かどうかを確認。配列でないなら、そのまま返して関数の処理を終了（$tag：Contact Form 7 側で用意されている引数。$tagの中には対象のフォーム部品に関する情報（名前・値・オプションなど）が配列として入っている）
  if ( ! is_array( $tag ) ) return $tag;

  $form_field_name = 'menu-464'; // CF7のセレクトボックス名（ショートコード内のname）
  // URLにselect_planというパラメータがあるかどうかを確認（$_GET：URLのクエリパラメータ（GETパラメータ → ?の後ろの部分）を取得するための配列。例：https://example.com/?key=value だとkeyを指定してvalueを取得）
  if ( isset( $_GET['select_plan'] ) && isset( $tag['values'] ) ) { // isset() は「変数が存在するか」を調べる関数
    // urldecode()を使ってURLエンコードされている文字（例: %20 → スペース）を元の形に戻す
    $selected_value = urldecode( $_GET['select_plan'] ); // GETパラメータをデコード
    // $tag['name']（現在のフォームのフィールド名）が $form_field_name（指定したセレクトボックス）と同じかを確認
    if ( $tag['name'] === $form_field_name ) {
      // $tag['values'] には、セレクトボックスの選択肢（プルダウンの中身）が入っている
      foreach ( $tag['values'] as $key => $value ) {  // $keyは選択肢の番号（0から始まる）、$valueは選択肢の文字（ライセンス取得など）
        // もしGETパラメータの値と、今見ている選択肢のvalueが同じなら…
        if ( $value === $selected_value ) {
          // $tag['options']はデフォルトでは空の配列である可能性が高いが、初めから存在しない（未定義）可能性もあるので、安全にコードを動作させるためには以下のチェックをした方がよい
          if ( ! isset( $tag['options'] ) ) {
            $tag['options'] = []; // `options`が未定義なら空の配列をセット
          }
          // default: をつけて、CF7のデフォルト値として設定。CF7の仕様では1から始まるため+1（[] を使うことで、配列の最後に値を追加できる）
          $tag['options'][] = 'default:' . ( $key + 1 ); // 例えば、$key = 0 なら、'default:1' となり、1番目の選択肢がデフォルトになる（Contact Form 7 は default:数字 を指定すると、その順番の選択肢を selected にしてくれる仕組みになっている）
        }
      }
    }
  }
  // 変更を加えた$tagを返す → フォームのセレクトボックスのデフォルト値が変更される
  return $tag;
}
// add_filter()を使って、CF7のフォームタグをカスタマイズする処理を追加（'wpcf7_form_tag'はCF7 のフォームタグを変更するためのフィルターフック）
add_filter( 'wpcf7_form_tag', 'custom_wpcf7_select_filter', 10, 2 );

// 管理画面のカスタム投稿一覧にもカラムを追加（順番を調整）
function add_custom_post_thumbnail_columns( $columns ) {
  $new_columns = []; // 新しいカラムの順序を保持するための配列を準備

  foreach ( $columns as $key => $value ) {
      if ( $key === 'title' ) {
          // タイトルの前にサムネイルを追加（thumbnailだと同じカラムが2回追加されてしまう → thumbnail_customに変更。なぜ？すでにブログ一覧でthumbnailを使っているから？ ⇒ ChatGPT見解：$new_columns['thumbnail'] を入れたあと、$new_columns[$key] = $value; で $keyが'thumbnail'だった場合、再度追加されてしまう。つまりWordPress側で既に「thumbnail」というカラムキーを暗黙的に使っていた → それがぶつかって二重に表示されている可能性がある  25.10.02）
          $new_columns['thumbnail_custom'] = 'アイキャッチ';
      }
      $new_columns[ $key ] = $value; // 既存のカラムをそのまま追加
  }

  return $new_columns; // 新しく並べ替えたカラムを返す。これにより、「アイキャッチ」がタイトルの左側に追加される
}

// campaign用
add_filter( 'manage_campaign_posts_columns', 'add_custom_post_thumbnail_columns' );
// voice用
add_filter( 'manage_voice_posts_columns', 'add_custom_post_thumbnail_columns' );

// カラムの中身を出力
function add_custom_post_thumbnail_column_content( $column_name, $post_id ) {
  if ( $column_name === 'thumbnail_custom' ) {
      if ( has_post_thumbnail( $post_id ) ) {
          echo get_the_post_thumbnail( $post_id, [ 100, 100 ] ); // 100x100サイズでアイキャッチを表示
      } else {
          echo 'なし'; // アイキャッチ未設定時は「なし」と表示
      }
  }
}

// campaign用
add_action( 'manage_campaign_posts_custom_column', 'add_custom_post_thumbnail_column_content', 10, 2 );
// voice用
add_action( 'manage_voice_posts_custom_column', 'add_custom_post_thumbnail_column_content', 10, 2 );

/* --------------------------------------------
 *   ログイン画面のロゴをオリジナルに変更
 * -------------------------------------------- */
function custom_login_logo() {
  ?>
  <style type="text/css">
    /* ログインページ全体の背景色をカスタム（任意） */
    body.login {
        background-color: #DDF0F1; /* お好みで色変更 */
    }

    /* ロゴの配置を変更 */
    .login h1 a {
      background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/footer-logo.svg');
      background-size: contain; /* 画像を枠に収める */
      width: 300px;  /* ロゴの幅（必要に応じて調整） */
        /* height: auto; ロゴの高さ（必要に応じて調整）「height: auto;」だとロゴが極端に小さくなってしまう！デフォルトの「height: 84px;」を使用 */
      margin-bottom: 25px; /* ログインフォームとの余白 */
    }
  </style>
  <?php
}
// login_enqueue_scriptsアクションフック：ログインページの CSS・JSを読み込む直前に実行される
// add_action( 'login_enqueue_scripts', 'custom_login_logo' );  // このタイミングでは WP本体の CSS（login.min.css）に上書きされてしまう
// login_headアクションフック：ログインページ（wp-login.php）の <head> タグ内で、1.WP標準のログインCSS（login.min.css など）が読み込まれる。2.login_head アクションが発火（ここで custom_login_logoの<style>…</style> が出力される）3.その後に <head> を閉じて本文へ（WPの標準CSSが読み込まれた後にCSSが追加される）
add_action( 'login_head', 'custom_login_logo' );

// ロゴクリック時のリンク先を自サイトに変更（デフォルト：WordPress公式サイト「https://wordpress.org/」）
function custom_login_logo_url() {
  return home_url(); // サイトのトップページ
}
// login_headerurlフィルターフック：ロゴのリンクURLを出力する直前に実行される（WPがロゴのリンク先（https://wordpress.org/）を出力しようとする → login_headerurl フィルタが呼ばれる！ → custom_login_logo_url() が実行され、home_url() に書き換わる）
add_filter( 'login_headerurl', 'custom_login_logo_url' );

// ロゴの titleテキスト（ツールチップテキスト：マウスカーソルを要素の上に乗せたときに、ふわっと表示される小さな説明のこと）を変更（デフォルト：title="Powered by WordPress" という文字を入れている）
function custom_login_logo_url_title() {
  return get_bloginfo( 'name' ); //「サイトのタイトル」を表示
}
// login_headertextフィルターフック：ロゴの titleテキスト（「Powered by WordPress」）を出力する直前に実行される（get_bloginfo('name') に置き換わる）⇒ WP6.5以降はtitle属性がなくなった。「リンクテキスト自体がサイト名」になった → これにより、login_headertextフィルターの出番がなくなった → 削除してOK！？ → ダメ！削除したらリンクテキストが「Powered by WordPress」になってしまう！！ → login_headertextフィルターを残しておく（バージョン 6.8.3）
add_filter( 'login_headertext', 'custom_login_logo_url_title' );

/* --------------------------------------------
 *   ログイン画面の背景に画像を設定
 * -------------------------------------------- */
function my_login_custom_background_images() {
  ?>
  <style>
    body.login {
      background: none;
      position: relative;
      min-height: 100vh;
      overflow: hidden;
    }

    /* === デフォルト（モバイル）用 === */
    body.login::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;

      /* スマホ版の4枚を配置 */
      background:
        url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/mv_1.webp') 0% 0% / 50% 50% no-repeat,
        url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/mv_2.webp') 100% 0% / 50% 50% no-repeat,
        url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/mv_3.webp') 0% 100% / 50% 50% no-repeat,
        url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/mv_4.webp') 100% 100% / 50% 50% no-repeat;
      background-repeat: no-repeat;
      background-size: 50% 50%;
    }

    /* === PC（768px以上）用 === */
    @media (min-width: 768px) {
      body.login::before {
        background:
          url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/mv-pc_1.webp') 0% 0% / 50% 50% no-repeat,
          url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/mv-pc_2.webp') 100% 0% / 50% 50% no-repeat,
          url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/mv-pc_3.webp') 0% 100% / 50% 50% no-repeat,
          url('<?php echo get_stylesheet_directory_uri(); ?>/assets/images/common/mv-pc_4.webp') 100% 100% / 50% 50% no-repeat;
      }
    }
  </style>
  <?php
}
add_action( 'login_head', 'my_login_custom_background_images' );

function my_login_text_color_adjust() {
  ?>
  <style>
    /* 「パスワードをお忘れですか？」リンク */
    #nav a {
      color: rgba(255, 255, 255, 0.9) !important;
      text-shadow: 0 1px 3px rgba(0,0,0,0.3);
      transition: color 0.3s ease;
    }
    #nav a:hover {
      color: #fff !important;
    }

    /* 「← TeamDevelopment へ移動」リンク */
    #backtoblog a {
      color: rgba(255, 255, 255, 0.85) !important;
      text-shadow: 0 1px 3px rgba(0,0,0,0.3);
      transition: color 0.3s ease;
    }
    #backtoblog a:hover {
      color: #fff !important;
    }

    /* リンクが背景に埋もれないよう、軽く下地を追加 */
    .login #nav, .login #backtoblog {
      background: rgba(0,0,0,0.25);
      padding: 6px 12px;
      border-radius: 6px;
      display: block;
    }

    /* レイアウト調整（中央寄せ） */
    .login #nav, .login #backtoblog {
      text-align: center;
      margin: 10px auto;
      width: fit-content;
    }
  </style>
  <?php
}
add_action( 'login_head', 'my_login_text_color_adjust' );
