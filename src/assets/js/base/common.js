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


  // smooth link
  $('a[href^=#]').click(function() {
    var speed = 800;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });

  //svg sprite
  svg4everybody();

});
