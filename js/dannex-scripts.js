$(document).ready(function($){
  $(window).scroll(function(){
    if($('.hero')[0].getBoundingClientRect().bottom < 0){
      $('nav.navbar').addClass('navbar-mini');
    }
    else{
      $('nav.navbar').removeClass('navbar-mini');
    }
  });
});