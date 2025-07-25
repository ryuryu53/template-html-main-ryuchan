"use strict";

// 宣言を jQuery(function ($) {}); の外側でする
// var mv_swiper;
jQuery(function ($) {
  // この中であればWordpressでも「$」が使用可能になる
  /* --------------------------------------------
   *   スクロールしてmvを過ぎたらヘッダーの背景色を変える
   * -------------------------------------------- */
  var header = $('.js-header');
  var headerheight = $('.js-header').height();
  var height = $('.js-mv-height').height();
  console.log('ヘッダーの高さ：' + headerheight);
  console.log('メインビューの高さ：' + height);
  console.log(height - headerheight);
  // ヘッダークラス名付与
  $(window).scroll(function () {
    if ($(this).scrollTop() > height - headerheight) {
      header.addClass('is-color');
    } else {
      header.removeClass('is-color');
    }
  });

  /* --------------------------------------------
   *   ドロワーメニュー
   * -------------------------------------------- */
  $(".js-hamburger, .js-sp-nav").click(function () {
    if ($(".js-hamburger").hasClass('is-active')) {
      $(".js-hamburger").removeClass("is-active");
      $('body, html').css('overflow', 'auto');
      // $('.js-header').removeClass("is-active");
      $(".js-sp-nav").fadeOut(300);
    } else {
      $(".js-hamburger").addClass("is-active");
      $('body, html').css('overflow', 'hidden'); // 動画レビュー：ドロワーを開いたときは後ろがスクロールしないようにする
      // $('.js-header').addClass('is-active');  // 動画レビュー：ロゴとメニューの文字が被らないように背景色を指定 ⇒ .sp-navのtop:rem(80)をpadding-topで指定して、最初からそこに色をつけるやり方に変更。この方がシンプル（25.2.4）
      $(".js-sp-nav").fadeIn(300);
    }
  });

  // 画面幅のサイズが変わったら
  $(window).on('resize', function () {
    // FB：追加 ∵iOSでは縦スクロールすると画面幅が変わったと認識してresizeイベントが作動してしまう
    if (window.matchMedia("(min-width: 768px)").matches) {
      // xマークを三マークにする（.js-hamburgerの要素にクラス名is-activeがあれば削除する）
      // 動画レビュー：ロゴとメニューの文字が被らないようにした背景色を元に戻す → 上記よりJSによるこの背景色の指定はなくしたので「.js-header」を削除（25.7.8）
      $('.js-hamburger').removeClass('is-active');

      // .js-sp-navを閉じる（.js-sp-navが表示されていれば非表示にする）
      $('.js-sp-nav').fadeOut(300);
    }
  });

  /* --------------------------------------------
   *   mvスワイパー
   * -------------------------------------------- */
  // スワイパーの自動再生を一時停止 → ローディングアニメーションを「jQuery(function ($) {}」の中に書くやり方へ変更したので、通常通りスワイパーを自動再生 25.3.16
  var mv_swiper = new Swiper('.js-mv-swiper', {
    // ここで「var」を削除して、グローバルに宣言したmv_swiperを使用 → 使用せず
    loop: true,
    effect: 'fade',
    speed: 3000,
    // スライド（フェイド）が変わるスピード
    allowTouchMove: false,
    // 3秒(delay: 3000)たつ前にマウスでカチャカチャなぞることによって次のスライドへ移るのをさせないようにする（これがないとクリックで自分でスライドできてしまう）
    autoplay: {
      delay: 3000 // 3秒後にスライドが変わっていく
    }
    // autoplay: false // 最初は自動再生をしない
  });

  /* --------------------------------------------
   *   campaignスワイパー
   * -------------------------------------------- */
  var campaign_swiper = new Swiper('.js-campaign-swiper', {
    slidesPerView: 'auto',
    loop: true,
    speed: 1000,
    spaceBetween: 24,
    breakpoints: {
      768: {
        spaceBetween: 40
      }
    },
    autoplay: {
      speed: 1000,
      disableOnInteraction: false // falseを設定すると、自動再生はユーザーの操作（スワイプ）後に無効にならず、操作後に毎回再起動される
    },

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    }
  });

  /* --------------------------------------------
   *   背景色の後に画像が表示されるエフェクト
   * -------------------------------------------- */
  //要素の取得とスピードの設定
  var box = $('.js-colorbox'),
    speed = 700;

  //.js-colorboxの付いた全ての要素に対して下記の処理を行う
  box.each(function () {
    $(this).append('<div class="color"></div>');
    var color = $(this).find($('.color')),
      image = $(this).find('img');
    var counter = 0;
    image.css('opacity', '0');
    color.css('width', '0%');
    //inviewを使って背景色が画面に現れたら処理をする
    color.on('inview', function () {
      if (counter == 0) {
        $(this).delay(200).animate({
          'width': '100%'
        }, speed, function () {
          image.css('opacity', '1');
          $(this).css({
            'left': '0',
            'right': 'auto'
          });
          $(this).animate({
            'width': '0%'
          }, speed);
        });
        counter = 1;
      }
    });
  });

  /* --------------------------------------------
   *   スクロールしながらページトップへ戻るボタン
   * -------------------------------------------- */
  var topBtn = $('.js-to-top');
  topBtn.hide();

  // ボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 70) {
      // 指定px以上のスクロールでボタンを表示
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上ならボタンを非表示
      topBtn.fadeOut();
    }
  });

  // ボタンをクリックしたらスクロールして上に戻る
  topBtn.click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 300, 'swing');
    return false;
  });

  // Contactセクションの右下でボタンが止まる
  $('.js-to-top').hide();
  $(window).on('scroll', function () {
    var documentHeight = $(document).height(); // ドキュメント全体の高さ
    var wHeight = $(window).height(); // ブラウザの表示領域の高さ
    var scrollAmount = $(window).scrollTop(); // スクロールした距離
    var footerHeight = $('.js-footer').innerHeight(); // フッターの高さ(padding含む)
    var browserWidth = window.outerWidth;
    if (documentHeight - (wHeight + scrollAmount) <= footerHeight) {
      // ページトップへ戻るボタンがフッターの直前に来たら、positionプロパティの値をfixedからabsoluteに変更する
      if (browserWidth < 768) {
        $('.js-to-top').css({
          position: 'absolute',
          bottom: footerHeight + 16
        });
      } else {
        $('.js-to-top').css({
          position: 'absolute',
          bottom: footerHeight + 20
        });
      }
    } else {
      if (browserWidth < 768) {
        $('.js-to-top').css({
          position: 'fixed',
          bottom: '16px'
        });
      } else {
        $('.js-to-top').css({
          position: 'fixed',
          bottom: '20px'
        });
      }
    }
  });

  /* --------------------------------------------
   *   ボックスシャドウを更新する関数
   * -------------------------------------------- */
  function updateBoxShadow() {
    var browserW = window.innerWidth;
    $('.tab__item').each(function () {
      if (browserW >= 768) {
        if (!$(this).hasClass('is-active')) {
          $(this).css('box-shadow', 'none');
        } else {
          $(this).css('box-shadow', '0.125rem 0.125rem 0.25rem rgba(0, 0, 0, 0.25)'); // 元のスタイルを指定
        }
      } else {
        // 768px未満なら全てにデフォルトのbox-shadowを適用
        $(this).css('box-shadow', '0.125rem 0.125rem 0.25rem rgba(0, 0, 0, 0.25)');
      }
    });
  }

  /* --------------------------------------------
   *   タブの設定
   * -------------------------------------------- */
  // 最初に表示されるタブの設定
  $('.js-tab-item:first-child').addClass('is-active');
  $('.js-tab-content:first-child').addClass('is-active');

  // タブによる切り替え
  var tabButton = $(".js-tab-item"),
    tabContent = $(".js-tab-content");
  tabButton.on("click", function () {
    var index = tabButton.index(this);
    tabButton.removeClass("is-active");
    $(this).addClass("is-active");
    tabContent.removeClass("is-active");
    tabContent.eq(index).addClass("is-active");
    updateBoxShadow();
  });

  // 初期状態のボックスシャドウを更新
  updateBoxShadow();

  // ウィンドウがリサイズされたときにボックスシャドウを更新
  $(window).resize(function () {
    updateBoxShadow();
  });

  // タブを選択する関数を定義
  function selectTab(hash) {
    // すべてのタブコンテンツを非表示に("is-active"クラスを削除)する
    $('.js-tab-content').removeClass('is-active');

    // すべてのタブアイテムから"is-active"クラスを削除する
    $('.js-tab-item').removeClass('is-active');

    // ハッシュに対応するタブアイテムに"is-active"クラスを追加する
    $(hash).addClass('is-active');

    // ハッシュに対応するタブコンテンツを表示("is-active"クラスを追加)する
    var contentId = hash + '-content';
    $(contentId).addClass('is-active');
  }

  // ページがロードされたときにURLのハッシュを取得
  var hash = window.location.hash;

  // ハッシュが存在する場合は、そのタブを選択
  if (hash) {
    selectTab(hash);
    updateBoxShadow();
  }

  // フッターまたはドロワーメニューのリンクがクリックされたときの処理
  $('.footer-nav__left-detail-link, .sp-nav__left-detail-link').on('click', function (e) {
    // デフォルトのリンク動作をキャンセル
    // e.preventDefault();

    // クリックされたリンクのハッシュを取得
    var targetHash = this.hash;

    // 該当するタブを選択
    selectTab(targetHash);
    updateBoxShadow();

    // 該当タブまでスクロール
    // $('html, body').animate({
    //     scrollTop: $(targetHash).offset().top
    // }, 500);
  });

  /* --------------------------------------------
   *   モーダル
   * -------------------------------------------- */
  var open = $('.js-modal-open'),
    modal = $('.js-modal');
  var scrollTop;

  //   スクロールバーの幅を計算する関数
  function getScrollbarWidth() {
    return window.innerWidth - document.documentElement.clientWidth;
  }

  //Gallery画像をクリックしたらモーダルを表示する
  open.on('click', function () {
    var imgsrc = $(this).find('img').attr('src');
    $('.modal__img').children().attr('src', imgsrc);
    modal.addClass('is-open');

    // スクロールバーの幅を取得
    var scrollbarWidth = getScrollbarWidth();

    // 背景を固定してスクロールさせない
    scrollTop = $(window).scrollTop();
    $('body').css({
      position: 'fixed',
      top: -scrollTop,
      left: 0,
      // right: 0,
      width: "calc(100% - ".concat(scrollbarWidth, "px)") // スクロールバーの幅を考慮する
    });
  });

  //モーダルをクリックしたらモーダルを閉じる
  modal.on("click", function () {
    modal.removeClass("is-open");

    // 背景の固定を解除する
    $('body').css({
      position: '',
      top: '',
      left: '',
      // right: '',
      width: ''
    });
    $(window).scrollTop(scrollTop);
  });

  /* --------------------------------------------
   *   トグル
   * -------------------------------------------- */
  $(".js-archive-toggle-title").on("click", function () {
    $(this).toggleClass("is-open");
    $(this).next().slideToggle(300);
  });

  /* --------------------------------------------
   *   アコーディーン
   * -------------------------------------------- */
  $(".js-accordion-title").on("click", function () {
    $(this).toggleClass("is-close");
    $(this).next().slideToggle(300);
  });

  /* --------------------------------------------
   *   ★ページネーションの設定（SP版とPC版で表示するページ数を変える設定）
   * -------------------------------------------- */
  // `.wp-pagenavi .current` が存在する場合のみイベントリスナーを登録
  if (document.querySelector('.wp-pagenavi .current')) {
    // ウェブページが完全に読み込まれたときにadjustPaginationという関数を実行するようにブラウザに指示
    // （documentオブジェクトにアクセスして、addEventListenerメソッドにより、DOMContentLoadedイベント（ページ全体のHTMLが完全に読み込まれ、DOMツリーが構築された後に発生）が発生するとadjustPagination関数が呼び出される）
    document.addEventListener('DOMContentLoaded', adjustPagination);
    // ブラウザのウィンドウのサイズが変更されたときにadjustPaginationという関数を実行
    // （windowオブジェクトにアクセスして、addEventListenerメソッドにより、resizeイベント（ブラウザのウィンドウのサイズが変更されたときに発生）が発生するとadjustPagination関数が呼び出される）
    window.addEventListener('resize', adjustPagination);
  }
  // 関数宣言はホイスティングされる → 関数を定義する前にその関数を呼び出すことが可能
  function adjustPagination() {
    // adjustPagination() 実行前に currentPageElement の存在を確認
    // 万が一 adjustPagination() が呼ばれた場合でも、 .wp-pagenavi .current が存在しなければ return で関数を途中で終了
    var currentPageElement = document.querySelector('.wp-pagenavi .current');
    if (!currentPageElement) return; // ⇒ null.textContent を読み取るエラーを防げる

    // ブラウザのウィンドウの幅が768ピクセル未満かどうかをチェックし、その結果をisMobileという変数に保存
    // 768ピクセル未満ならtrue（モバイル）、それ以上ならfalse（PC）になる
    var isMobile = window.innerWidth < 768;
    // モバイルの場合はページあたり4ページ、PCの場合は6ページを表示するように設定
    var perPage = isMobile ? 4 : 6; // isMobileがtrueなら4、falseなら6になる
    // ページネーションの中で現在表示されているページの番号を取得して、それを整数（数値）に変換
    // （document.querySelectorメソッド：指定したセレクタに一致するドキュメント内の最初の要素を返す）
    // （textContentプロパティ：選択された要素のテキスト内容を取得）
    // （parseInt関数：文字列を整数に変換する → 第一引数は変換したい文字列、第二引数は数値の基数（この場合は十進数））
    var currentPage = parseInt(document.querySelector('.wp-pagenavi .current').textContent, 10);
    // ページネーションに関連するすべてのリンクと現在のページを示す要素を取得
    // （document.querySelectorAllメソッド：指定したCSSセレクタに一致するドキュメント内のすべての要素をノードリストとして返す）
    var paginationLinks = document.querySelectorAll('.wp-pagenavi a.page, .wp-pagenavi span.current');
    // ページネーションにおいて表示するページの範囲を決定する際の「開始ページ」を計算
    // （Math.max関数：引数として与えられた2つの数値から、より大きい方を返す）
    // （Math.floor関数：与えられた数値を小数点以下を切り捨てて最大の整数を返す）
    var startPage = Math.max(currentPage - Math.floor(perPage / 2), 1);
    // ページネーションにおいて表示するページの範囲を決定する際の「終了ページ」を計算
    // （Math.min関数：引数として与えられた数値から、より小さい方を返す）
    var endPage = Math.min(startPage + perPage - 1, currentPage + Math.floor(perPage / 2));

    // 全てのページリンクを一つずつ見ていき、そのページ番号が表示範囲内なら表示し、範囲外なら非表示にする
    paginationLinks.forEach(function (link) {
      // 引数 link は、リストの各要素を指す
      var pageNumber = parseInt(link.textContent, 10);
      // ページ番号 (pageNumber) が有効な数値かどうかを確認し、有効な場合にそのリンクの表示・非表示を制御
      // （isNaN()関数：引数として渡された値が数値でない場合に true を返す）
      if (!isNaN(pageNumber)) {
        // style.displayプロパティ：指定したHTML要素の表示方法を制御。空文字列 ('') を設定すると、その要素はデフォルトの表示スタイルに従って表示される
        link.style.display = pageNumber >= startPage && pageNumber <= endPage ? '' : 'none';
      }
    });

    // 前後のリンクの表示制御を確保（「次へ」と「前へ」のリンクは常に表示されるように設定）
    document.querySelectorAll('.wp-pagenavi .nextpostslink, .wp-pagenavi .previouspostslink').forEach(function (link) {
      link.style.display = ''; // 常に表示
    });
  }

  /* --------------------------------------------
   *   お問い合わせフォーム：エラーメッセージの改行処理
   * -------------------------------------------- */
  $('.wpcf7').on('submit', function (event) {
    // 画面幅が767px以下の場合に改行を挿入
    if (window.innerWidth <= 767) {
      // 送信後、エラーメッセージが出力されるのを監視
      setTimeout(function () {
        // エラーメッセージのテキストを探す
        var responseOutput = $('.wpcf7-response-output');
        if (responseOutput.length) {
          var text = responseOutput.html();
          // 「入力されていません。」の後に改行を追加
          responseOutput.html(text.replace('入力されていません。', '入力されていません。<br>&nbsp;&nbsp;&nbsp;&nbsp;'));
        }
      }, 500); // 少し遅延させることで、エラーメッセージの生成を待つ
    }
  });

  /* --------------------------------------------
   *   ローディングアニメーション
   * -------------------------------------------- */
  function runLoadingAnimation() {
    var $loading = $(".js-loading-white");
    var $images = $(".js-loading-images");
    var $imgLeft = $(".js-loading-img-left");
    var $imgRight = $(".js-loading-img-right");
    var $title = $(".js-loading-title");
    // トップページでのみアニメーションを実行
    if ($loading.length === 0) {
      return;
    }
    // ローディングアニメーション開始時にスクロール禁止の処理を実行
    $("html, body").css("overflow", "hidden");
    // ローディングアニメーションの処理を実行
    $loading.delay(1000).queue(function (next) {
      // 1秒待機
      $title.fadeIn(1000, function () {
        // フェードイン（1秒） → 「50);」の下にあるnext(); を呼ぶ
        $images.delay(1000).queue(function (next) {
          // 1秒待機して$images.queue(...) を登録
          $(this).addClass("appear"); // `.loading__images` に `appear` クラスを追加
          setTimeout(function () {
            $imgLeft.addClass("loaded"); // `.loading__img-left` に `loaded` クラスを追加
            $imgRight.addClass("loaded"); // `.loading__img-right` に `loaded` クラスを追加
            next(); // `$images.queue()` のキューを進める（setTimeout 完了後に呼ぶ）
          }, 50); // 50ミリ秒遅らせる 👉 初期状態（transform: translateY(100%)）をブラウザに認識させてアニメーションが動くようにする 👉 transitionend イベントが発火！
        });

        next(); // next(); を呼んで $loading.queue() の次の処理へ進める
      });
    });

    $(document).on("transitionend", ".js-loading-img-right", function () {
      $loading.addClass("fadeout");
      $images.delay(1000).fadeOut(1000);
    });

    // ローディングアニメーション終了時にスクロール許可の処理を実行
    setTimeout(function () {
      $("html, body").css("overflow", "auto");
    }, 6000);
  }
  runLoadingAnimation();
});

// ローディングアニメーション
// jQuery(window).on("load", function () {
//   jQuery(".js-load").fadeOut(1000, function () {
//     // fadeOutを使用してフェード後に非表示に
//     jQuery(this).addClass('loaded'); // フェードアウト後に非表示
//     // フェードアウト完了後の処理
//     // 左右の画像が下からスライド
//     jQuery('.js-mv-img-left').addClass('loaded'); // 左の画像をスライドイン

//     jQuery('.js-mv-img-right').addClass('loaded'); // 右の画像をスライドイン（80px差で配置済み）

//     setTimeout(function () {
//       // タイトルを表示
//       jQuery('.js-mv-header, .js-header').css('opacity', '1');

//       // 2秒後にスワイパーの自動再生を開始
//       // autoplayオプションを追加・設定して開始
//       // mv_swiper.params.autoplay = {  // この書き方だとスワイパーが止まってしまう！よって、以下の通り1行に書いた
//       //   delay: 3000,
//       // };
//       mv_swiper.params.autoplay.delay = 3000; // 3秒ごとにスライド(3秒後にスライドが変わっていく)
//       mv_swiper.autoplay.start(); // 自動再生を開始
//     }, 2000);
//   });
// });