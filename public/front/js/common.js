/**
 * common.js
 **/

/* !stack ------------------------------------------------------------------- */
$(function() {
  pageScroll();
  pageTopFadeIn();
  viewStar();
  accordion();
  hdMenu();
});
$(window).load(function () {
});
$(window).on('load resize', function(){
  tile();
});

/* !pageScroll -------------------------------------------------------------- */
var pageScroll = function(){
  $('a.scroll').click(function() {
    var speed = 400;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
  });
}

/* !PageTop Fade In --------------------------------------------------- */
var pageTopFadeIn = function(){
  $(window).scroll(function(){
    var Target = $(".pageTop");
    var TargetPos = 100;
    var ScrollPos = $(window).scrollTop();
    if( ScrollPos >= TargetPos) {
      Target.fadeIn();
    }
    else {
      Target.fadeOut();
    }
  });
}

/* !View Star --------------------------------------------------- */
var viewStar = function(){

  var star = $('.ico-star');
  var starText = $('.star-num');
  var vNum = $('.vw-num .num').text();

  if(vNum.length > 1){
    star.addClass('ico-star-10');
    starText.text('10');
  }
  if(vNum.length > 2){
    star.addClass('ico-star-100');
    starText.text('100');
  }
  if(vNum.length > 3){
    star.addClass('ico-star-1000');
    starText.text('1000');
  }
  if(vNum.length > 4){
    star.addClass('ico-star-10000');
    starText.text('10000');
  }
  if(vNum.length > 5){
    star.addClass('ico-star-100000');
    starText.text('100000');
  }
}

/* !Tile --------------------------------------------------- */
var tile = function(){
}

/* !accordion --------------------------------------------------- */
var accordion = function(){

  $(".acc_trigger").click(function(){
    $(this).next(".acc_hide").slideToggle();
    $(this).toggleClass("acc_open");
  });

}

/* !hdMenu --------------------------------------------------- */
var hdMenu = function(){
  var menuContent = $('.hd-menu-contents');
  $('.btn-menu a').on('click', function(){
    menuContent.fadeIn();
  });
  $('.btn-close').on('click', function(){
    menuContent.fadeOut();
  });
}

