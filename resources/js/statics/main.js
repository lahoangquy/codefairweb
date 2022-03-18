(function($) {
  $('.mobile-menu').slicknav({
    prependTo: '.navbar-header',
    parentTag: 'span',
    allowParentLinks: true,
    duplicate: false,
    label: ''
  });

  // Team slider
  const teamSlider = $('.team-slider');
  teamSlider.owlCarousel({
    navigation: false,
    pagination: true,
    slideSpeed: 1000,
    stopOnHover: true,
    autoPlay: true,
    items: 3,
    itemsDesktop: [1199, 3],
    itemsDesktopSmall: [1024, 3],
    itemsTablet: [600, 1],
    itemsMobile: [479, 1]
  });

  teamSlider.find('.owl-prev').html('<i class="fa fa-chevron-left"></i>');
  teamSlider.find('.owl-next').html('<i class="fa fa-chevron-right"></i>');

  // Team slider
  const sponsorSlider = $('.sponsor-slider');
  sponsorSlider.owlCarousel({
    navigation: false,
    pagination: true,
    slideSpeed: 1000,
    stopOnHover: true,
    autoPlay: true,
    items: 6,
    itemsDesktop: [1199, 4],
    itemsDesktopSmall: [1024, 4],
    itemsTablet: [600, 2],
    itemsMobile: [479, 2]
  });

  sponsorSlider.find('.owl-prev').html('<i class="fa fa-chevron-left"></i>');
  sponsorSlider.find('.owl-next').html('<i class="fa fa-chevron-right"></i>');

  // News and events
  const newsandEvent = $('.news-and-events');
  newsandEvent.owlCarousel({
    navigation: true,
    pagination: false,
    slideSpeed: 1000,
    stopOnHover: true,
    center: true,
    autoPlay: true,
    items: 3,
    itemsDesktop: [1199, 3],
    itemsDesktopSmall: [1024, 4],
    itemsTablet: [600, 1],
    itemsMobile: [479, 1]
  });

  newsandEvent.find('.owl-prev').html('<i class="bi bi-chevron-compact-left text-primary"></i>');
  newsandEvent.find('.owl-next').html('<i class="bi bi-chevron-compact-right text-primary"></i>');

  // Photo & video
  const photoVideos = $('.photo-videos');
  photoVideos.owlCarousel({
    navigation: true,
    pagination: false,
    slideSpeed: 1000,
    stopOnHover: true,
    center: true,
    autoPlay: true,
    items: 4,
    itemsDesktop: [1199, 3],
    itemsDesktopSmall: [1024, 4],
    itemsTablet: [600, 1],
    itemsMobile: [479, 1]
  });

  photoVideos.find('.owl-prev').html('<i class="bi bi-chevron-compact-left text-primary"></i>');
  photoVideos.find('.owl-next').html('<i class="bi bi-chevron-compact-right text-primary"></i>');

  $('.popup-gallery').magnificPopup({
    disableOn: 700,
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    delegate: 'a',
    gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1]
    }
  });

  const scrollAnimationTime = 1200;
  const scrollAnimation = 'easeInOutExpo';
  $('a.scrollto').on('bind', 'click.smoothscroll', function(event) {
    event.preventDefault();
    let target = this.hash;
    $('html, body')
      .stop()
      .animate({ scrollTop: $(target).offset().top }, scrollAnimationTime, scrollAnimation, function() {
        window.location.hash = target;
      });
  });

  const offset = 200;
  $(window).scroll(function() {
    if ($(this).scrollTop() > offset) {
      $('.back-to-top').fadeIn(400);
    } else {
      $('.back-to-top').fadeOut(400);
    }
  });

  $('.back-to-top').on('click', function(event) {
    event.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 600);
    return false;
  });

  $.stellar({
    horizontalScrolling: true,
    verticalOffset: 40,
    responsive: true
  });

  $('#loader').fadeOut();
})(jQuery);
