$(function() {

  // //固定ヘッダー
  // var menuHeight = $("nav").height();/* メニュー全体の高さがわからないときは指定 */
  // var nav = $("nav");
  // var startPos = 0;/* スクロールし始めた位置 */
  // $(window).scroll(function(){
  //   var currentPos = $(this).scrollTop();
  //   if (currentPos > startPos) {/* 下にスクロールしたら */
  //   if($(window).scrollTop() >= 0) {
  //     $("nav").addClass("nav--fixed");
  //     $("nav").css("top", "-" + menuHeight + "px");
  //   }
  //   } else {
  //     $("nav").css("top", 0 + "px");
  //   }
  //   startPos = currentPos;/* 次のスクロールしたときの基準 */
  // });

  //slider
  $('.slider').slick({
      dots: true,//インジケーターを表示
      slidesToShow: 1,//表示するスライドの数
      slidesToScroll: 1,//一度にスクロールするスライドの数
      centerMode: true,//センターモード
      centerPadding: '40px',//両端の見切れるスライドの幅
      arrows: false //スライドの左右の矢印ボタンを表示
  });

});
