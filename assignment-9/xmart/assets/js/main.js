/***************************************************
==================== JS INDEX ======================
****************************************************
01. PreLoader Js
02. Mobile Menu Js
03. Sidebar Js
04. Cart Toggle Js
05. Search Js
06. Sticky Header Js
07. Data Background Js
08. Testimonial Slider Js
09. Slider Js (Home 3)
10. Brand Js
11. Tesimonial Js
12. Course Slider Js
13. Masonary Js
14. Wow Js
15. Data width Js
16. Cart Quantity Js
17. Show Login Toggle Js
18. Show Coupon Toggle Js
19. Create An Account Toggle Js
20. Shipping Box Toggle Js
21. Counter Js
22. Parallax Js
23. InHover Active Js

****************************************************/

(function ($) {
"use strict";

	var windowOn = $(window);
	////////////////////////////////////////////////////
    // 01. PreLoader Js
	windowOn.on('load',function() {
		$("#loading").fadeOut(500);
	});

	////////////////////////////////////////////////////
    // 02. Mobile Menu Js
	$('#mobile-menu').meanmenu({
		meanMenuContainer: '.mobile-menu',
		meanScreenWidth: "991",
		meanExpand: ['<i class="far fa-angle-right"></i>'],
	});


	////////////////////////////////////////////////////
    // 03. Sidebar Js
	$(".sidebar-toggle").on("click", function () {
		$(".canvas__area").addClass("opened");
		$(".body-overlay").addClass("opened");
	});
	$(".canvas__close-btn").on("click", function () {
		$(".canvas__area").removeClass("opened");
		$(".body-overlay").removeClass("opened");
	});


    ////////////////////////////////////////////////////
    // 06. Cart Toggle Js
    $(".cart-toggle-btn").on("click", function() {
        $(".cartmini__area").addClass("opened");
        $(".body-overlay").addClass("opened");
    });
    $(".cartmini__close-btn").on("click", function() {
        $(".cartmini__area").removeClass("opened");
        $(".body-overlay").removeClass("opened");
    });


	////////////////////////////////////////////
    // body overlay Js
    $(".body-overlay").on("click", function() {
        $(".cartmini__area").removeClass("opened");
		$(".canvas__area").removeClass("opened");
        $(".body-overlay").removeClass("opened");
    });

	////////////////////////////////////////////////////
    // 06. Sticky Header Js
	windowOn.on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 100) {
			$("#header-sticky").removeClass("sticky");
		} else {
			$("#header-sticky").addClass("sticky");
		}
	});


	////////////////////////////////////////////////////
    // 07. Data Background Js
	$("[data-background").each(function () {
		$(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
	});

  	////////////////////////////////////////////////////
    // 07. Nice Select Js
	$('select').niceSelect();

	////////////////////////////////////////////////////
    // 08. slider__active Slider Js

	if (jQuery(".slider__active").length > 0) {
		let sliderActive1 = ".slider__active";
		let sliderInit1 = new Swiper(sliderActive1, {
		  // Optional parameters
		  slidesPerView: 1,
		  slidesPerColumn: 1,
		  paginationClickable: true,
		  loop: true,
		  effect: 'fade',
	
		  autoplay: {
			delay: 5000,
		  },
	
		  // If we need pagination
		  pagination: {
			el: ".main-slider-pagination",
			// dynamicBullets: true,
			clickable: true,
		  },
	
		  // Navigation arrows
		  navigation: {
			nextEl: ".main-slider-button-next",
			prevEl: ".main-slider-button-prev",
		  },
	
		  a11y: false,
		});
	
		function animated_swiper(selector, init) {
		  let animated = function animated() {
			$(selector + " [data-animation]").each(function () {
			  let anim = $(this).data("animation");
			  let delay = $(this).data("delay");
			  let duration = $(this).data("duration");
	
			  $(this)
				.removeClass("anim" + anim)
				.addClass(anim + " animated")
				.css({
				  webkitAnimationDelay: delay,
				  animationDelay: delay,
				  webkitAnimationDuration: duration,
				  animationDuration: duration,
				})
				.one(
				  "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
				  function () {
					$(this).removeClass(anim + " animated");
				  }
				);
			});
		  };
		  animated();
		  // Make animated when slide change
		  init.on("slideChange", function () {
			$(sliderActive1 + " [data-animation]").removeClass("animated");
		  });
		  init.on("slideChange", animated);
		}
	
		animated_swiper(sliderActive1, sliderInit1);
	  }

	var testimonialSlider = new Swiper('.testimonial__slider', {
		slidesPerView: 1,
        spaceBetween: 30,
		loop: true,
        pagination: {
          el: ".testimonial-pagination",
          clickable: true,
        },
		breakpoints: {  
			'1200': {
				slidesPerView: 3,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	var testimonialSlider = new Swiper('.testimonial__slider-2', {
		slidesPerView: 1,
        spaceBetween: 30,
		loop: true,
        pagination: {
          el: ".testimonial-pagination",
          clickable: true,
        },
		breakpoints: {  
			'1200': {
				slidesPerView: 2,
			},
			'992': {
				slidesPerView: 2,
			},
			'768': {
				slidesPerView: 1,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	var brandSlider = new Swiper('.brand__slider', {
		slidesPerView: 1,
        spaceBetween: 30,
		loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
		breakpoints: {  
			'1200': {
				slidesPerView: 6,
			},
			'992': {
				slidesPerView: 3,
			},
			'768': {
				slidesPerView: 3,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	var productSlider = new Swiper('.product__slider', {
		slidesPerView: 1,
        spaceBetween: 30,
		loop: true,
        pagination: {
          el: ".product-pagination",
          clickable: true,
        },
		// Navigation arrows
		navigation: {
		nextEl: ".product-slider-button-next",
		prevEl: ".product-slider-button-prev",
		},
		breakpoints: {  
			'1200': {
				slidesPerView: 4,
			},
			'992': {
				slidesPerView: 4,
			},
			'768': {
				slidesPerView: 2,
			},
			'576': {
				slidesPerView: 1,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});

	var instaSlider = new Swiper('.insta__slider', {
		slidesPerView: 1,
        spaceBetween: 30,
		loop: true,
        pagination: {
          el: ".product-pagination",
          clickable: true,
        },
		// Navigation arrows
		navigation: {
		nextEl: ".slider-button-next",
		prevEl: ".slider-button-prev",
		},
		breakpoints: {  
			'1200': {
				slidesPerView: 5,
			},
			'992': {
				slidesPerView: 4,
			},
			'768': {
				slidesPerView: 3,
			},
			'576': {
				slidesPerView: 2,
			},
			'0': {
				slidesPerView: 1,
			},
		},
	});


	////////////////////////////////////////////////////
    // 13. Masonary Js
	$('.grid').imagesLoaded( function() {
		// init Isotope
		var $grid = $('.grid').isotope({
		  itemSelector: '.grid-item',
		  percentPosition: true,
		  masonry: {
			// use outer width of grid-sizer for columnWidth
			columnWidth: '.grid-item',
		  }
		});


	// filter items on button click
	$('.masonary-menu').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});

	//for menu active class
	$('.masonary-menu button').on('click', function(event) {
		$(this).siblings('.active').removeClass('active');
		$(this).addClass('active');
		event.preventDefault();
	});

	});

	/* magnificPopup img view */
	$(".popup-image").magnificPopup({
		type: "image",
		gallery: {
			enabled: true,
		},
	});

	/* magnificPopup video view */
	$(".popup-video").magnificPopup({
		type: "iframe",
	});

	////////////////////////////////////////////////////
    // 14. Wow Js
	new WOW().init();

	////////////////////////////////////////////////////
    // 15. Data width Js
	$("[data-width]").each(function () {
		$(this).css("width", $(this).attr("data-width"));
	  });
	

	////////////////////////////////////////////////////
    // 16. Cart Quantity Js
	$(".cart-plus-minus").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
	$(".qtybutton").on("click", function () {
		var $button = $(this);
		var oldValue = $button.parent().find("input").val();
		if ($button.text() == "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find("input").val(newVal);
	});

	$('.cart-minus').click(function () {
		var $input = $(this).parent().find('input');
		var count = parseInt($input.val()) - 1;
		count = count < 1 ? 1 : count;
		$input.val(count);
		$input.change();
		return false;
	});
	$('.cart-plus').click(function () {
		var $input = $(this).parent().find('input');
		$input.val(parseInt($input.val()) + 1);
		$input.change();
		return false;
	});
	
	////////////////////////////////////////////////////
	// 22. Range Slider Js
	if (jQuery("#slider-range").length > 0) {
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: 500,
			values: [75, 300],
			slide: function (event, ui) {
				$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
			}
		});
		$("#amount").val("$" + $("#slider-range").slider("values", 0) +
			" - $" + $("#slider-range").slider("values", 1));
	}


	////////////////////////////////////////////////////
	// 17. Show Login Toggle Js
	$('#showlogin').on('click', function () {
		$('#checkout-login').slideToggle(900);
	});

	////////////////////////////////////////////////////
	// 18. Show Coupon Toggle Js
	$('#showcoupon').on('click', function () {
		$('#checkout_coupon').slideToggle(900);
	});

	////////////////////////////////////////////////////
	// 19. Create An Account Toggle Js
	$('#cbox').on('click', function () {
		$('#cbox_info').slideToggle(900);
	});

	////////////////////////////////////////////////////
	// 20. Shipping Box Toggle Js
	$('#ship-box').on('click', function () {
		$('#ship-box-info').slideToggle(1000);
	});

	////////////////////////////////////////////////////
	// 21. Counter Js
	$('.counter').counterUp({
		delay: 10,
		time: 1000
	});
	
	////////////////////////////////////////////////////
	// 22. Parallax Js
	if ($('.scene').length > 0 ) {
		$('.scene').parallax({
			scalarX: 10.0,
			scalarY: 15.0,
		}); 
	};

	////////////////////////////////////////////////////
    // 23. InHover Active Js
	$('.hover__active').on('mouseenter', function () {
		$(this).addClass('active').parent().siblings().find('.hover__active').removeClass('active');
	});


})(jQuery);