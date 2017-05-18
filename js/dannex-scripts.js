$(document).ready(function($){
  $(window).scroll(function(){
    if($('.hero')[0].getBoundingClientRect().bottom < 100){
      $('nav.navbar').addClass('navbar-mini');
    }
    else{
      $('nav.navbar').removeClass('navbar-mini');
    }
  });

  $('.go-back>a').on('click', function(e){
    e.preventDefault();
    history.go(-1);
  });
});