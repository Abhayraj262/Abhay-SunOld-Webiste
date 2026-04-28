var $ = jQuery.noConflict();

/* Script on ready
------------------------------------------------------------------------------*/
$( document ).ready( function() {
  //do jQuery stuff when DOM is ready

  //FAQ content
  if($(".accord-question").length) {
    $(".faq-accordion .accordion li").first().addClass('active');
    $(".faq-accordion .accordion li").first().addClass('active');
    $(".faq-accordion li").first().find('.accord-answer').slideDown();
  }
  $(".accord-question").click(function() {
    var curParent = $(this).parent("li");
      curParent.siblings().removeClass("active");
      $(this).parents(".accordion").find(".accord-answer").slideUp();
      if (curParent.hasClass("active")) {
          $(this).next(".accord-answer").slideUp();
          curParent.removeClass("active");
      } else {
          $(this).next(".accord-answer").stop(true,true).slideDown();
          curParent.addClass("active");
      }
  });

jQuery('.scroll-to-top').click(function(){
      jQuery('body,html').animate({
        scrollTop: 0,
      }, 1000)
    })


  //device block slider
  if($('.devices-block').length){
        $('.devices-block').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            dots: true,
            arrows: false,
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 1500,    
            pauseOnFocus:false,
            pauseOnHover:false,
            responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
              }
            }
          ]
        })
    }



    mobileOnlySlider(".client-testimonials .testimonial-row", true, false, 991, true);

//device block slider
  if($('.bis-slider').length){
        $('.bis-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: !0,
            arrows: true,
            // autoplay: true,
            autoplaySpeed: 3000,
            speed: 1500, 
            appendArrows: $('.news__arrows'),
            prevArrow: '<div class="news__arrow news__arrow_dir_left">Prev</div>',
            nextArrow: '<div class="news__arrow news__arrow_dir_right">Next</div>',   
            pauseOnFocus:false,
            pauseOnHover:false,
            responsive: [
            {
              breakpoint: 1199,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 1023,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 640,
              settings: {
                slidesToShow: 1,
                autoplay: true,
                autoplaySpeed: 2000,
              }
            }
          ]
        })
    }



       $(".logo-slider").slick({
        infinite: !0,
        draggable: !0,
        autoplay: true,
        autoplaySpeed: 3e3,
        adaptiveHeight: !1,
        dots: !1,
        arrows: !1,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [{
            breakpoint: 1399,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
          }
            ,
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplaySpeed: 2000
            }
        }]
    })
    

} );

/* Script on load
------------------------------------------------------------------------------*/
$( window ).on( 'load',function() {
  // page is fully loaded, including all frames, objects and images

} );

/* Script on scroll
------------------------------------------------------------------------------*/
$( window ).on( 'scroll',function() {

} );

/* Script on resize
------------------------------------------------------------------------------*/
$( window ).on( 'resize',function() {

} );

/* Script all functions
------------------------------------------------------------------------------*/
function mobileOnlySlider($slidername, $dots, $arrows, $breakpoint , $height) {
  var slider = jQuery($slidername);
  var settings = {
    mobileFirst: true,
    rows:0,
    adaptiveHeight: $height,
    dots: $dots,
    arrows: $arrows,
    responsive: [
      {
        breakpoint: $breakpoint,
        settings: "unslick"
      }
    ]
  };

  slider.slick(settings);

  jQuery(window).on("resize", function () {
    if ($(window).width() > $breakpoint) {
      return;
    }
    if (!slider.hasClass("slick-initialized")) {
      return slider.slick(settings);
    }
  });
}