$(function(){
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 200) {
      $('.header__top').addClass('sticky')
    } else {
      $('.header__top').removeClass('sticky')
    }
  })

  const headerHeight = $('.header__top').outerHeight();

  $(".menu a, .go-top").on("click", function (e) {
    e.preventDefault();

    const scrollAnchor = $(this).attr('href');

    let scrollPoint = $(scrollAnchor).offset().top - headerHeight;

    $('body,html').animate({ scrollTop: scrollPoint }, 1500);
  });
  
  $('.slider__inner').slick({
    dots: true,
    prevArrow: '<button type="button" class="slick-prev"><img src="images/arrow-left.svg" alt="стрілка вліво"></button>',
    nextArrow: '<button type="button" class="slick-next"><img src="images/arrow-right.svg" alt="стрілка вправо"></button>',
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false
        }
      },
    ]
  });

  $('.menu__burger, .menu a').on('click', function (){
    $('.header__top-inner').toggleClass('header__top-inner--active')
  });

  var mixer = mixitup('.portfolio__content');
});