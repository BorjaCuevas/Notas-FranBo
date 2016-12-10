$(document).ready(function() {
   $('.selector').on('click', function(event){
       if(event.currentTarget.className !='selected'){
            $('.selector').toggleClass('selected');
            $('.log').toggleClass('oculto');
       }
   });
   
   var elementColorTop = Math.floor(($('.segunda').offset().top));
   var elementAmarilloBottom = Math.floor(($('.personal').offset().top) + ($('.personal').height())/2);
   var elementRojoBottom = Math.floor(($('.familia').offset().top) + ($('.familia').height())/2);
   var elementAzulBottom = Math.floor(($('.trabajo').offset().top) + ($('.trabajo').height())/2);
   var elementVerdeBottom = Math.floor(($('.otros').offset().top) + ($('.otros').height())/2);
   
   $(document).scroll (function(event){
      var windowTop = $(document).scrollTop();
      var windowBottom = $(document).scrollTop() + $(window).height();
      if(windowTop >= elementColorTop){
         $('#colores').removeClass('colormovil');
         $('#colores').addClass('colorfijo');
         $('#nombregrupos').removeClass('nombremovil');
         $('#nombregrupos').addClass('nombrefijo');
      }else {
         $('#colores').removeClass('colorfijo');
         $('#colores').addClass('colormovil');
         $('#nombregrupos').removeClass('nombrefijo');
         $('#nombregrupos').addClass('nombremovil');
         $('.amarillo').removeClass('actual');
      }
      
      if(windowBottom >= elementAmarilloBottom && windowBottom <= elementRojoBottom){
         $('.amarillo').addClass('actual');
         $('.rojo').removeClass('actual');
         $('.Personal').addClass('actual');
         $('.Casa').removeClass('actual');
      }
      
      if(windowBottom >= elementRojoBottom && windowBottom <= elementAzulBottom){
         $('.rojo').addClass('actual');
         $('.amarillo').removeClass('actual');
         $('.azul').removeClass('actual');
         $('.Casa').addClass('actual');
         $('.Personal').removeClass('actual');
         $('.Trabajo').removeClass('actual');
      }
      
      if(windowBottom >= elementAzulBottom && windowBottom <= elementVerdeBottom){
         $('.azul').addClass('actual');
         $('.rojo').removeClass('actual');
         $('.verde').removeClass('actual');
         $('.Trabajo').addClass('actual');
         $('.Casa').removeClass('actual');
         $('.Otros').removeClass('actual');
      }
      
      if(windowBottom >= elementVerdeBottom){
         $('.verde').addClass('actual');
         $('.azul').removeClass('actual');
         $('.Otros').addClass('actual');
         $('.Trabajo').removeClass('actual');
      }
   });
});