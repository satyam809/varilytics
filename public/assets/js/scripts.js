
//  Preloader
jQuery(window).on("load", function () {
  $('#preloader').fadeOut(500);
  $('#main-wrapper').addClass('show');
});


// According Collapse Toggle 
  $('.filter-group .card-header a').on('click', function(){
  $('.filter-group .filter-content').removeClass('show');
  $(this).addClass('show');
});



// Toggle Class
  $(".toggle-password").on('click', function () {
      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
          input.attr("type", "text");
      } else {
          input.attr("type", "password");
      }
  });



// Counters
  $('.counter-value').each(function() {
   var $this = $(this),
    countTo = $this.attr('data-count');

$({ countNum: $this.text()}).animate({
  countNum: countTo
},
{
  duration: 3000,
  easing:'linear',
  step: function() {
    $this.text(Math.floor(this.countNum));
  },
  complete: function() {
    $this.text(this.countNum);
    //alert('finished');
  }
});  
});


// This makes the current link containing li of class "active"
  var url = window.location.href;
  var activePage = url;
  $('.navbar-nav a.nav-link').each(function () {
      var linkPage = this.href;

      if (activePage == linkPage) {
        $(".navbar-nav > li").removeClass("active");
          $(this).closest("li").addClass("active");
          $(this).closest(".navbar-nav > li").addClass("active");
      }
  });



//  Preloader AOS
AOS.init({
duration: 1200,
})


// Tooltips
$(function () {
$('[data-toggle="tooltip"]').tooltip()
})

// Data Table
//$('table.table').DataTable();


//Toggle
$(".customdropdown > a").click(function(){
$("ul.sub-dropdown").slideToggle();
});


//FullScreen
$(this).parents('.rigPanelBox').toggleClass('box-fullscreen');
window.dispatchEvent(new Event('resize'));



(function ($) {	
var headerHeight =   parseInt($('.onepage').css('height'), 10);
$(".scroll").unbind().on('click',function(event) 
{
  event.preventDefault();
  
  if (this.hash !== "") {
    var hash = this.hash;	
    var seactionPosition = $(hash).offset().top;
    var headerHeight =   parseInt($('.onepage').css('height'), 10);
    
    
    $('body').scrollspy({target: ".scroll-nav", offset: headerHeight+2}); 
    
    var scrollTopPosition = seactionPosition - (headerHeight);
    
    $('html, body').animate({
      scrollTop: scrollTopPosition
    }, 800, function(){
      
    });
  }   
});
$('body').scrollspy({target: ".scroll-nav", offset: headerHeight + 2});  

$('.header').css('height','');
var headerHeight = $('.header').height();
$('.header').css('height', headerHeight);


//  Header fixed
  $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {
          $('.header').addClass("animated slideInDown fixed"), 3000;
      } else {
          $('.header').removeClass("animated slideInDown fixed"), 3000;
      }
  });


//  Nice Select
  $('select').niceSelect();
  


  $(function () {
      for (var nk = window.location,
          o = $(".menu a, .sub-menu a").filter(function () {
              return this.href == nk;
          })
              .addClass("active")
              .parent()
              .addClass("active"); ;) {
          // console.log(o)
          if (!o.is("li")) break;
          o = o.parent()
              .addClass("show")
              .parent()
              .addClass("active");
      }

  });

  // $(function () {
  //     // var win_w = window.outerWidth;
  //     var win_h = window.outerHeight;
  //     var win_h = window.outerHeight;
  //     if (win_h > 0 ? win_h : screen.height) {
  //         $(".content-body").css("min-height", (win_h + 60) + "px");
  //     };
  // });

  $('.sidebar-right-trigger').on('click', function () {
      $('.sidebar-right').toggleClass('show');
  });

  $('[data-toggle="tooltip"]').tooltip();

  $('.data-close').on('click', function () {
      e.preventDefault();
      $(this).parent().parent().remove();
  });

  $("#tbUser").on('click', '.btnDelete', function () {
      $(this).closest('tr').remove();
  });


  $(function () {
  if(jQuery('#slider').length > 0)
  {
    var slider = document.getElementById("slider");
    slider.oninput = function () {
      $('.count').text(this.value).css({
        'left': this.value + '%',
        'transform': 'translateX(-' + this.value + '%)'
      });
      $('.fill').css('width', this.value + '%');
    }
  }
  });


// Magnific Popup 
if(jQuery('.mfp-gallery').length)
{
  jQuery('.mfp-gallery').magnificPopup({
    delegate: '.mfp-link',
    type: 'image',
    tLoading: 'Loading image #%curr%...',
    mainClass: 'mfp-img-mobile',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      titleSrc: function(item) {
        return item.el.attr('title') + '<small></small>';
      }
    }
  });	
}	
/* magnificPopup function end */

/* magnificPopup for paly video function */		
if(jQuery('.mfp-video').length)
{
  jQuery('.mfp-video').magnificPopup({
    type: 'iframe',
    iframe: {
      markup: '<div class="mfp-iframe-scaler">'+
           '<div class="mfp-close"></div>'+
           '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
           '<div class="mfp-title">Some caption</div>'+
           '</div>'
    },
    callbacks: {
      markupParse: function(template, values, item) {
        values.title = item.el.attr('title');
      }
    }
  });	
}

/* magnificPopup for paly video function end*/
if($('.popup-youtube, .popup-vimeo, .popup-gmaps').length)
{
  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });	
}


    
/** Newsfeed Carousel **/
  jQuery("#newsfeed").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 0,
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1024: {
            items: 3
          },
          1366: {
            items: 3
          }
        }
  });


/** Statistics Carousel **/
  jQuery("#Statistics").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 0,
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1024: {
            items: 1
          },
          1366: {
            items: 1
          }
        }
  });

/** Corporate User Carousel **/
  jQuery("#corporateUser").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 30,
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1024: {
            items: 3
          },
          1366: {
            items: 3
          }
        }
  });


  /** Customer Testimonials Carousel **/
  jQuery("#customerTestimonials").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 30,
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 7000,
        smartSpeed: 800,
        nav: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 2
          },
          1024: {
            items: 3
          },
          1366: {
            items: 4
          }
        }
  });


/** Popular Statistics Carousel **/
      jQuery("#popular-statistics").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 0,
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        nav: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1024: {
            items: 2
          },
          1366: {
            items: 3
          }
        }
  });

/** Popular Statistics Carousel **/
      jQuery("#MostViewedStatistics").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 0,
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        nav: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1024: {
            items: 2
          },
          1366: {
            items: 3
          }
        }
  });
/** Recent Statistics Carousel **/
      jQuery("#recent-statistics").owlCarousel({
        autoplay: true,
        lazyLoad: true,
        loop: true,
        margin: 0,
        responsiveClass: true,
        autoHeight: true,
        autoplayTimeout: 3000,
        smartSpeed: 800,
        nav: false,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1024: {
            items: 2
          },
          1366: {
            items: 3
          }
        }
  });


})(jQuery);;

// const ml = new PerfectScrollbar('.market-limit');
// const mn = new PerfectScrollbar('.market-nested');
// const ln = new PerfectScrollbar('.limit-nested');
// const sln = new PerfectScrollbar('.stop-limit-nested');
// const pp = new PerfectScrollbar('.price-pair');
// const ts = new PerfectScrollbar('.trade-history');
// const ob = new PerfectScrollbar('.order-book');
// const yp = new PerfectScrollbar('.your-position');
// const bw = new PerfectScrollbar('.balance-widget');
// const mkn = new PerfectScrollbar('.market-news');
// const opt = new PerfectScrollbar('.open-position-table');

//ripple effect on button
Waves.init();
Waves.attach('.wave-effect');
Waves.attach('.btn');
Waves.attach('button');