"use strict";

document.addEventListener('DOMContentLoaded', function () {
  console.log('JavaScript is loaded');
  // 画面幅が767px以下の場合に改行を挿入
  if (window.innerWidth <= 767) {
    var responseOutput = document.querySelector('.wpcf7-response-output');
    console.log(responseOutput);
    if (responseOutput) {
      var text = responseOutput.innerHTML;
      // 「～入力されていません。」の後に改行を追加
      responseOutput.innerHTML = text.replace('入力されていません。', '入力されていません。<br>');
    }
  }
});