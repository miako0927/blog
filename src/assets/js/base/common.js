$(function() {


  //loading-animation
  $(window).on('load', function(){
    $('.loading').delay(0).fadeOut(300);
  });
  setTimeout(function(){
    $('.loading').delay(1000).fadeOut(700);
  },5000);


  //page transition animation
  $(window).on('load', function(){
    $('body').removeClass('fadeout');
  });
  $(function() {
    $('a:not([href^="#"]):not([target])').on('click', function(e){// ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
      e.preventDefault(); // ナビゲートをキャンセル
      url = $(this).attr('href'); // 遷移先のURLを取得
      if (url !== '') {
        $('body').addClass('fadeout');  // bodyに class="fadeout"を挿入
        setTimeout(function(){
          window.location = url;  // 0.8秒後に取得したURLに遷移
        }, 800);
      }
      return false;
    });
  });


  //hamburger button
  $('#navToggle').click(function(){
      $('header').toggleClass('openNav');
  });
  $('nav a').on('click', function(){
    if (window.innerWidth <= 767) {
      $('#navToggle').click();
    }
  });


  //ScrollReveal
  $(window).on('load', function(){
    window.sr = ScrollReveal({
      reset: false, //画面に登場するたびにアニメーション
      mobile: true //モバイルでもアニメーションさせる
    });

    sr.reveal('.animation-fadein2', {
      duration: 2000,
      easing: 'cubic-bezier(0.5, -0.01, 0, 1.005)',
      opacity: 0
    });

    sr.reveal('.animation-fadein3', {
      duration: 3000,
      easing: 'cubic-bezier(0.5, -0.01, 0, 1.005)',
      opacity: 0
    });

    sr.reveal('.animation-bottom-delay1000', {
      duration: 1000,
      distance: '40px',
      easing: 'cubic-bezier(0.5, -0.01, 0, 1.005)',
      origin: 'bottom',
      delay: 1000
    });

    sr.reveal('.animation-right', {
      duration: 1000,
      distance: '40px',
      easing: 'cubic-bezier(0.5, -0.01, 0, 1.005)',
      origin: 'right',
      interval: 150,
      viewFactor: 0.5//要素自身の高さの何％がビューポートに入ったらアニメーションを開始するか：値は1の場合100％を意味する。
    });

    sr.reveal('.animation-bottom', {
      duration: 1000,
      distance: '40px',
      easing: 'cubic-bezier(0.5, -0.01, 0, 1.005)',
      origin: 'bottom',
      interval: 150,
      viewFactor: 0.5//要素自身の高さの何％がビューポートに入ったらアニメーションを開始するか：値は1の場合100％を意味する。
    });

    sr.reveal('.animation-interval', {
      duration: 1000,
      distance: '40px',
      easing: 'cubic-bezier(0.5, -0.01, 0, 1.005)',
      interval: 100,
      origin: 'bottom',
      viewFactor: 0.5//要素自身の高さの何％がビューポートに入ったらアニメーションを開始するか：値は1の場合100％を意味する。
    });

  });

});
