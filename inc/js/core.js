//@prepros-prepend mixitup.min.js
//@prepros-prepend mixitup-multifilter.min.js
//@prepros-prepend mixitup-pagination.js
//@prepros-prepend jquery.magnific-popup.js
//@prepros-prepend slick.min.js
//@prepros-prepend readmore.js
//@prepros-prepend scrollreveal.js

jQuery(document).ready(function($) {

 /* ADD CLASS ON SCROLL*/

 $(window).scroll(function() {
  var scroll = $(window).scrollTop();

  if (scroll >= 100) {
    $("body").addClass("scrolled");
  } else {
    $("body").removeClass("scrolled");
  }
});

// ========== Controller for lightbox elements

$('#parent').magnificPopup({
  delegate: 'a',
  type: 'image',
  mainClass: 'mfp-img-mobile',
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
  },
});


/* TABBED CONTENT */

$(document).ready(function () {
  if ($('.tabbed-section').length) {
    $(".tabbed-section__head--tab:nth-child(1)").addClass("active");
    $(".tabbed-section__body--item:nth-child(1)").addClass("visible");
  }
});

$(".tabbed-section__head--tab").click(function (e) {
  var selectedTab = $(this).attr("data-tab");
  $(".tabbed-section__head--tab.active").removeClass('active');
  $(this).addClass('active');
  $(".tabbed-section__body--item.visible").removeClass('visible');
  $(".tabbed-section__body--item." + selectedTab).addClass('visible');
});



new Readmore('article', {
  speed: 150,
  collapsedHeight: 105,
});



// SIDEBAR MOBILEMENU

$(document).ready(function() {

  function toggleSidebar() {
    $(".navbutton").toggleClass("active");
    $("main").toggleClass("move-to-left");
    $(".sidebar-item").toggleClass("active");
  }

  $(".navbutton").on("click tap", function() {
    toggleSidebar();
  });

  // $(document).keyup(function(e) {
  //   if (e.keyCode === 27) {
  //     toggleSidebar();
  //   }
  // });

});






// ACCORDIAN SINGLE ITEM ONLY

$(document).ready(function() {
  $('.block__title').click(function(event) {
    $(this).toggleClass('active').next().slideToggle(300);
      if($('.block__title').hasClass('one')){
          $('.block__title').not($(this)).removeClass('active');
          $('.block__text').not($(this).next()).slideUp(300);
      }
      
  });

});

// $(document).ready(function(){
//   $('.block__title').click(function() {
//       $(this).next().toggle('slow');
//       return false;
//   }).next().hide();
// });





const sections = document.querySelectorAll('.onview');

// Using Intersection Observer ↓

const observerConfig = {
  root: null,
  rootMargin: '600px 0px 0px',
  threshold: 0.1
};

const observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
    } else {
      entry.target.classList.remove('visible');
    }
  });
}, observerConfig);

sections.forEach(section => {
  observer.observe(section);
});

var containerEl = document.querySelector('.filter-grid');
var mixer;

if (containerEl) {
    mixer = mixitup(containerEl, {
    //   controls: {
    //     toggleLogic: 'or',
    //     toggleDefault:'none'
    // }
    });
}

var containerEl = document.querySelector('.multi-filter-grid');
var mixer;
if (containerEl) {
mixer = mixitup(containerEl, {
  multifilter: {
      enable: true // enable the multifilter extension for the mixer
  }
});
}

$(".pop-link").click(function(){
  var id = $(this).attr('id');
  $('.' + id)[0].play();
});

$("#enlarge").click(function(){
  $(".half-col").toggleClass("map-enlarge");
});

$(".popup__close").click(function(){
  var id = $(this).attr('id');
  $('.' + id)[0].pause();
});

var slideLeft = {
distance: '40px',
origin: 'left',
opacity: 0.0,
reset:true,
duration: 1000,
delay:250,
mobile:false,
};
var slideRight = {
distance: '40px',
origin: 'right',
opacity: 0.0,
reset:true,
duration: 1000,
mobile:false,
};
var slideDown = {
distance: '40px',
origin: 'top',
opacity: 0.0,
reset:true,
duration: 1000,
mobile:false,
};
var slideUp = {
distance: '40px',
origin: 'bottom',
opacity: 0.0,
reset:true,
duration: 1000,
mobile:false,
};
var tileDown = {
distance: '40px',
origin: 'top',
opacity: 0.0,
reset:true,
duration: 1000,
mobile:false,
interval:40,
};

ScrollReveal().reveal('.fmleft', slideLeft);
ScrollReveal().reveal('.fmtop', slideDown);
ScrollReveal().reveal('.fmbottom', slideUp);
ScrollReveal().reveal('.fmright', slideRight);
ScrollReveal().reveal('.tile', tileDown);


var vid = document.getElementById("advertvideo");
function playVid() {vid.play();}
function pauseVid() {vid.pause();}

ScrollReveal().reveal('video', {
  beforeReveal: playVid ,
  beforeReset: pauseVid,
  reset: true,
  mobile:false,
});


$(document).ready(function() {

  var Mwidth = 960; // mobile devices
  if ($(window).width() > Mwidth) {
      var headerHeight = $('.top-navbar').height();
      $(window).on('scroll', {
              TopPrev: 0
          },
          function() {
              var TopCurrent = $(window).scrollTop();
              //check if user is scroll up
              if (TopCurrent < this.TopPrev) {
                  //if scroll up
                  if (TopCurrent > 0 && $('.top-navbar').hasClass('fixed-menu')) {
                      $('.top-navbar').addClass('visible-scroll-up');
                  } else {
                      $('.top-navbar').removeClass('visible-scroll-up fixed-menu');
                  }
              } else {
                  //if scroll down
                  $('.top-navbar').removeClass('visible-scroll-up');
                  if (TopCurrent > headerHeight && !$('.top-navbar').hasClass('fixed-menu')) $('.top-navbar').addClass('fixed-menu');
              }
              this.TopPrev = TopCurrent;
          });
  }
});

// SLICK SLIDER

$('.single-slider--blocks').slick();



$('.slider-images').slick({
  dots: true,
  arrows: false,
  slidesToShow: 1,
  autoplay: true,
  autoplaySpeed: 4000,
  fade: true,
  cssEase: 'linear',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
      
      }
    },
    {
      breakpoint: 600,
      settings: {
        dots: true,
        arrows: false,
      }
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.experience-blocks').slick({
  responsive: [
    {
      breakpoint: 1024,
      settings: {
      
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        dots: true,
        arrows: false,
      }
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.triple-blocks').slick({
  centerMode: true,
  centerPadding: '200px',
  slidesToShow: 1,
  arrows: false,
  focusOnSelect: true,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 3,
        infinite: true,
        
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        centerMode: false,
        centerPadding: '0px',
        dots: true
      }
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


var currentYear = new Date().getFullYear();  

    for (var i = 1; i <= 5; i++ ) {
        $("#timeselector").append(

            $("<li></li>")
                .attr("data-toggle", ('.m' + currentYear))
                .attr("class", ('control'))
                .text(currentYear)

        );
        currentYear--;
    }

    $(document).ready(function(){
      $("#accordian h3").click(function(){
        //slide up all the link lists
        $("#accordian ul ul").slideUp();
        //slide down the link list below the h3 clicked - only if its closed
        if(!$(this).next().is(":visible"))
        {
          $(this).next().slideDown();
        }
      })
    })
   

}); //Don't remove ---- end of jQuery wrapper




// var mixer = mixitup('.filter-grid');