/**
 * home.js
 **/

/* !stack ------------------------------------------------------------------- */
$(function() {
  mainSlider();
});
$(window).load(function () {
});
$(window).on('load resize', function(){
  homeTile();
  navHeight();
});

/* !Slider --------------------------------------------------- */
var mainSlider = function(){

  $('.main-slider').fadeIn('slow');
  $('.main-slider .slider').slick({
    autoplay:true,
    autoplaySpeed:5000,
    speed: 1000,
    dots:true,
    pauseOnHover:false
  });

}
/* !Tile --------------------------------------------------- */
var homeTile = function(){

  $('.home-block-roleplaying .cmn-item-list li').tile();

}

/* !Service Nav Height --------------------------------------------------- */
var navHeight = function(){

  var nav = $('.home-block-service .item-list-type01 a')
  var navW = nav.innerWidth();
  nav.css('height',navW+'px');

}
