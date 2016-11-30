function submitForm() {
	var contactForm = $(this);
	$.ajax({
		url: contactForm.attr( 'action' ) + "?ajax=true",
		type: contactForm.attr( 'method' ),
		data: contactForm.serialize(),
		success: function() {
			submitFinished();
		},
		error: function(){
			alert('Возникла ошибка, нет связи с сервером. Попробуйте еще раз.');
			console.log('error!');

		}
	});
}

function submitFinished() {
	$('.contact_form').find("input[name='name'], input[name='phone'], textarea[name='comment']").val("");
	$('.booking_form').find("input[name='name'], input[name='phone'], textarea[name='comment']").val("");
	showAlert("#form-success");
}
// alert.js
var alertClass = "is-shown";
var alertTimeout;
function showAlert(selector) {
	$("" + selector).addClass(alertClass);
	alertTimeout = setTimeout(hideAlert, 3000);
}
function hideAlert() {
	$(".js-alert").removeClass(alertClass);
	alertTimeout = null;
}
$(".js-alert").hover(function() {
		clearTimeout(alertTimeout);
	},
	function() {
		alertTimeout = setTimeout(hideAlert, 3000);
	});
$(".js-alert").find(".js-alert-close").on("click", hideAlert);
// alert.js end
// anim-number.js

$(initNum); // init animateNumber

function initNum($items) {
	//var space_separator_number_step = $.animateNumber.numberStepFactories.separator(',');
	var number = $items || $('.js-animate-num');
	//console.log(number.length)
	number.each(function () {
		var value = $(this).attr("data-value");
		$(this).html(0);
		$(this).animateNumber({
				number: value,
				easing: 'easeOutQuad',
				//numberStep: space_separator_number_step
			},
			1500
		);
		//console.log($(this));
		$(this).clearQueue(); // prevent multiple animations
	});
}
// anim-number.js end
//Animate CSS + WayPoints javaScript Plugin + device.js
//Example: $(".element").animated("zoomInUp", "zoomOutDown");
(function ($) {
	$.fn.animated = function (inEffect, outEffect) {
		$(this).css("opacity", "0").addClass("animated").waypoint(function (dir) {
			if (dir === "down") {
				$(this).removeClass(outEffect).addClass(inEffect).css("opacity", "1");
			} else {
				$(this).removeClass(inEffect).addClass(outEffect).css("opacity", "1");
			}
		}, {
			offset: "85%"
		}).waypoint(function (dir) {
			if (dir === "down") {
				$(this).removeClass(inEffect).addClass(outEffect).css("opacity", "1");
			} else {
				$(this).removeClass(outEffect).addClass(inEffect).css("opacity", "1");
			}
		}, {
			offset: -$(window).height()
		});
	};
})(jQuery);

(function ($) {
	$.fn.animated_once = function (inEffect) {
		$(this).css("opacity", "0").addClass("animated").waypoint(function (dir) {

			$(this).addClass(inEffect).css("opacity", "1");

		}, {
			offset: "85%"
		});
	};
})(jQuery);

(function ($) {
	$.fn.waypointTriger = function (cb) {
		$(this).waypoint(function (dir) {
			if (dir === "down") {
				cb($(this));
			}
		}, {
			offset: "100%"
		}).waypoint(function (dir) {
			if (dir === "up") {
				cb($(this));
			}
		}, {
			offset: -$(window).height()
		});
	};
})(jQuery);

$(function () {

	if (!device.mobile()) {
		$(".js-animations-up").animated("fadeInUp", "fadeOutDown");
		$(".js-animation-up").animated_once("fadeInUp");
		$(".js-animation-in, .section-title, .benefit_item, .exploitation_item--empty, .exploitation_item").animated_once("fadeIn");
		$(".js-animation-left").animated_once("fadeInLeft");
		$(".js-animation-right").animated_once("fadeInRight");
		$(".js-animate-num").waypointTriger(function($this) {
			initNum($this);
		});
	}

}); //ready

$(document).ready(function(){






}); // ready

// google map api
//AIzaSyAuZMjqL0Vvlelcahq5ZiJZ8mAav816Kpg
//
function initMap() {

	// Specify features and elements to define styles.
	var styleArray = [
		{
			featureType: "all",
			stylers: [
				{
					saturation: -70
				}
			]
		}, {
			featureType: "road.arterial",
			elementType: "geometry",
			stylers: [
				{
					hue: "#a8a8a8"
				},
				{
					saturation: 30
				}
			]
		}, {
			featureType: "poi.business",
			//elementType: "labels",
			stylers: [
				{
					visibility: "off"
				}
			]
		}
	];

	// Create a map object and specify the DOM element for display.
	var map = new google.maps.Map(document.getElementById('g-map'), {
		center: center_position,
		scrollwheel: false,
		// Apply the map style array to the map.
		styles: styleArray,
		zoom: 17,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		panControl: false,
		zoomControl: true,
		mapTypeControl: false,
		scaleControl: false,
		streetViewControl: true,
		overviewMapControl: false
	});

//	var marker_position = new google.maps.LatLng(46.4047648, 30.7023735);
	var marker = new google.maps.Marker({
		position: marker_position,
		map: map,
		title: "INMER",
		icon: "/img/icon/map-marker.png"
	});
}

$(window).on("load", initMap);
// google map api end
// pop-up.js
$(document).ready(function () {

	$(".js-pop-up").magnificPopup({
		type: 'inline',
		preloader: false,
		removalDelay: 400,
		mainClass: 'mfp-fade'
	});

	$('.js-pop-up-video').magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false,
		disableOn: 0
	});

	$(".js-pop-up-ajax").magnificPopup({
		type: 'ajax',
		preloader: true,
		focus: false,
		showCloseBtn: false,
		removalDelay: 400,
		mainClass: 'mfp-fade',
		callbacks: {
			ajaxContentAdded: function () {

			}
		}
	});
	$(".js-pop-up-ajax, .js-pop-up").on('mfpOpen', function (e) {
		$("html").addClass("pop-up--shown");
		//console.log( $("html").attr("class"));
	});
	$(".js-pop-up-ajax, .js-pop-up").on('mfpClose', function (e) {
		$("html").removeClass("pop-up--shown");
		//console.log( $("html").attr("class"));
	});

	$('.js-img-popup').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});
}); // ready
// pop-up.js end
// sliders.js
$(document).ready(function () {
	var arrowLeft = '<i class="icon-left"></i>';
	var arrowRight = '<i class="icon-right"></i>';

	// js-product-slider
	var productSlider = $('.js-product-slider').on('init', function(event, slick) {
		$(slick.$slides[0]).addClass('is-visible');
	});
	productSlider.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		infinite: true,
		nextArrow: '<button type="button" class="slider__btn--next slider__btn"> ' + arrowRight + ' </button>',
		prevArrow: '<button type="button" class="slider__btn--prev slider__btn">' + arrowLeft + '</button>',
		//swipeToSlide: true,
		speed: 400,
		accessibility: false
	});

	if (!device.mobile()) {
		productSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
			$(slick.$slides[currentSlide]).removeClass('is-visible');
		});
		productSlider.on('afterChange', function (event, slick, currentSlide) {
			$(slick.$slides[currentSlide]).addClass('is-visible');
		});
	} else {
		productSlider.find(".slick-slide").addClass('is-visible');
	}
	// js-product-slider end

	// js-docs-slider
	var docsSlider = $('.js-docs-slider').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		arrows: true,
		infinite: false,
		nextArrow: '<button type="button" class="slider__btn--next slider__btn"> ' + arrowRight + ' </button>',
		prevArrow: '<button type="button" class="slider__btn--prev slider__btn">' + arrowLeft + '</button>',
		swipeToSlide: true,
		accessibility: false,
		responsive: [
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 1
				}
			}
		]
	});
	$(window).resize(function () {
		docsSlider.slick('slickGoTo', 0);
	});
	docsSlider.slick('slickGoTo', 0);
	// js-docs-slider end


	// js-works-slider
	var worksSlider = $('.js-works-slider').on('init', function(event, slick) {
		$(slick.$slides[0]).addClass('is-visible');
	});
	worksSlider.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: true,
		infinite: false,
		nextArrow: '<button type="button" class="slider__btn--next slider__btn"> ' + arrowRight + ' </button>',
		prevArrow: '<button type="button" class="slider__btn--prev slider__btn">' + arrowLeft + '</button>',
		//swipeToSlide: true,
		speed: 400,
		accessibility: false
	});
	worksSlider.slick('slickGoTo', 0);
	if (!device.mobile()) {
		worksSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
			$(slick.$slides[currentSlide]).removeClass('is-visible');
		});
		worksSlider.on('afterChange', function (event, slick, currentSlide) {
			$(slick.$slides[currentSlide]).addClass('is-visible');
		});
	} else {
		worksSlider.find(".slick-slide").addClass('is-visible');
	}
	// js-works-slider end

	// js-achievements-slider
	var achievementsSlider = $('.js-achievements-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		arrows: false,
		infinite: true,
		accessibility: false,
		speed: 500
	});
	$(window).resize(function () {
		achievementsSlider.slick('slickGoTo', 0);
	});
	achievementsSlider.slick('slickGoTo', 0);

	achievementsSlider.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		//console.log(event);
		//console.log(slick.$slides[nextSlide]);
		//console.log(currentSlide);
		//console.log(nextSlide);
		$(slick.$slides[nextSlide]).find('.js-animate-num').html("0");
	});
	achievementsSlider.on('afterChange', function (event, slick, currentSlide) {
		//console.log(event);
		//console.log(slick);
		//console.log(currentSlide);
		var $items = $(slick.$slides[currentSlide]).find('.js-animate-num');
		initNum($items);
	});

	achievementsSlider.find(".js-next").on("click", function () {
		achievementsSlider.slick('slickNext');
	});
	achievementsSlider.find(".js-prev").on("click", function () {
		achievementsSlider.slick('slickPrev');
	});
	// js-achievements-slider end


	// js-review-slider
	var reviewSlider = $('.js-review-slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		arrows: true,
		infinite: true,
		accessibility: false,
		speed: 500,
		nextArrow: '<button type="button" class="slider__btn--next slider__btn"> ' + arrowRight + ' </button>',
		prevArrow: '<button type="button" class="slider__btn--prev slider__btn">' + arrowLeft + '</button>'
	});
	$(window).resize(function () {
		reviewSlider.slick('slickGoTo', 0);
	});
	reviewSlider.slick('slickGoTo', 0);
	// js-review-slider end

}); // ready

// sliders.js end
/* smooth scrolling */
$(function () {
	$('a[href*="#"]:not([href="#"])').click(function () {
		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			if (target.length) {
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1500);
				return false;
			}
		}
	});
});
/* smooth scrolling end*/
$(function () {
	// on canvas menu
	(function () {
		var $touch = $('.js-toggle-menu');
		var $touch_animate = $('.js-toggle-menu .sandwich');
		var className = "is-shown-menu";
		var $menu = $('.js-mobile-menu');
		var $close = $('.js-menu-close');
		var $wrapper = $("body");
		var startBreakpoint = "48em";

		function showMenu() {
			$wrapper.addClass(className);
			$touch_animate.addClass(className);
			$("html").css("overflow-y", "hidden");
			//console.log("show");
		}

		function hideMenu() {
			$wrapper.removeClass(className);
			$touch_animate.removeClass(className);
			$("html").css("overflow-y", "auto");
			//console.log("hide");
		}

		$touch.on('click', function (e) {
			e.preventDefault();
			e.stopPropagation();
			//console.log("click");
			//console.log(!($touch_animate.hasClass(className)));
			if (!($touch_animate.hasClass(className))) {
				showMenu();
			} else {
				hideMenu();
			}
		});
		$close.on('click', function (e) {
			e.stopPropagation();
			hideMenu();
		});

		$wrapper.on('click', function (e) {
			if (e.target.className !== "js-mobile-menu") {
				hideMenu();
				//console.log("close menu")
			}
		});
		$menu.on('click', function (e) {
			e.stopPropagation();
		});

		$(window).resize(function () {
			var media = window.matchMedia("only screen and (max-width: " + startBreakpoint + ")").matches;
			if (!media) {
				hideMenu();
			}
		});
	})();
	// on canvas menu end
});


(function ($) {
	// prived methods

	var isEmpty = function(value) {
		if ( value === "" ) {
			return true;
		} else {
			return false;
		}
	};
	var isEmail = function() {
		return true;
	};
	var isPhone = function() {
		return true;
	};
	var toggleMarker = function() {
		if (isEmpty( $(this).val() ) ) {
			$(this).addClass("is-invalid");
		} else {
			$(this).removeClass("is-invalid");
		}
	};
	// prived methods end
	var methods = {
		init: function (options) {

			// default option
			var settings = $.extend({
				required: "",
				callback: function() {}
			}, options);

			return this.each(function () {
				var $form = $(this),
					$error = $form.find(".js-error"),
					$inputs = $form.find(".js-form-req"),
					init = "init",
					data = $form.data("validation");

				// Если плагин ещё не проинициализирован
				if (!data) {
					$form.on("submit", function(e) {
						var validationError = false;
						$inputs.each(function() {
							if ( isEmpty( $(this).val() ) ) {

								if ($error) {
									// show error
									$error.html( $(this).attr("placeholder") );
								}

								$(this).focus();
								toggleMarker.apply(this);
								e.preventDefault();
								validationError = true;
								return false;
							}
						});

						// check validation error
						if (!validationError) {
							if ( settings.callback ) {
								// prevent form submit if callback exists
								settings.callback($form);
								return false;
							}
							return true;
						} else {
							// prevent form submit if validation is failed
							return false;
						}
					});
					$inputs.on("change", toggleMarker);

					$(this).data("validation", init);
				}
			});
		}

	};
	$.fn.inmerValidation = function (method) {
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Метод с именем ' + method + ' не существует для jQuery.numberInput');
		}
	};

})(jQuery);

$(function () {
	var $form = $(".js-validation");
	$form.inmerValidation({
		callback: function($formInstance) {
			submitForm.apply($formInstance);
		}
	});
}); //ready
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFqYXgtZm9ybS5qcyIsImFsZXJ0LmpzIiwiYW5pbS1udW1iZXIuanMiLCJhbmltYXRpb24uanMiLCJtYWluLmpzIiwibWFwLmpzIiwicG9wLXVwLmpzIiwic2xpZGVycy5qcyIsInNtb290aC1zY3JvbGwuanMiLCJzd2lwZS1tZW51LmpzIiwidmFsaWRhdGlvbi5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3JCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2xCQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDdEJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ3BFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNSQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNqRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDeERBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2xKQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQ2ZBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzNEQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsImZpbGUiOiJtYWluLmpzIiwic291cmNlc0NvbnRlbnQiOlsiZnVuY3Rpb24gc3VibWl0Rm9ybSgpIHtcclxuICB2YXIgY29udGFjdEZvcm0gPSAkKHRoaXMpO1xyXG5cdCQuYWpheCh7XHJcblx0XHR1cmw6IGNvbnRhY3RGb3JtLmF0dHIoICdhY3Rpb24nICkgKyBcIj9hamF4PXRydWVcIixcclxuXHRcdHR5cGU6IGNvbnRhY3RGb3JtLmF0dHIoICdtZXRob2QnICksXHJcblx0XHRkYXRhOiBjb250YWN0Rm9ybS5zZXJpYWxpemUoKSxcclxuXHRcdHN1Y2Nlc3M6IGZ1bmN0aW9uKCkge1xyXG5cdFx0XHRzdWJtaXRGaW5pc2hlZCgpO1xyXG5cdFx0fSxcclxuXHRcdGVycm9yOiBmdW5jdGlvbigpe1xyXG5cdFx0XHQgYWxlcnQoJ9CS0L7Qt9C90LjQutC70LAg0L7RiNC40LHQutCwLCDQvdC10YIg0YHQstGP0LfQuCDRgSDRgdC10YDQstC10YDQvtC8LiDQn9C+0L/RgNC+0LHRg9C50YLQtSDQtdGJ0LUg0YDQsNC3LicpO1xyXG5cdFx0Y29uc29sZS5sb2coJ2Vycm9yIScpO1xyXG5cclxuXHRcdH1cclxuXHR9KTtcclxufVxyXG5cclxuZnVuY3Rpb24gc3VibWl0RmluaXNoZWQoKSB7XHJcblx0JCh0aGlzKS5maW5kKFwiaW5wdXRbdHlwZT0ndGV4dCddLCBpbnB1dFt0eXBlPSd0ZWwnXSwgaW5wdXRbdHlwZT0nZW1haWwnXSwgaW5wdXRbdHlwZT0nZmlsZSddLCB0ZXh0YXJlYVwiKS52YWwoIFwiXCIgKTtcclxuXHQkKHRoaXMpLmZpbmQoXCJpbnB1dFt0eXBlPSdyYWRpbyddLCBpbnB1dFt0eXBlPSdjaGVja2JveCddXCIpLmF0dHIoXCJjaGVja2VkXCIsIGZhbHNlKTtcclxuXHRzaG93QWxlcnQoXCIjZm9ybS1zdWNjZXNzXCIpO1xyXG59IiwiLy8gYWxlcnQuanNcbnZhciBhbGVydENsYXNzID0gXCJpcy1zaG93blwiO1xudmFyIGFsZXJ0VGltZW91dDtcbmZ1bmN0aW9uIHNob3dBbGVydChzZWxlY3Rvcikge1xuXHQkKFwiXCIgKyBzZWxlY3RvcikuYWRkQ2xhc3MoYWxlcnRDbGFzcyk7XG5cdGFsZXJ0VGltZW91dCA9IHNldFRpbWVvdXQoaGlkZUFsZXJ0LCAzMDAwKTtcbn1cbmZ1bmN0aW9uIGhpZGVBbGVydCgpIHtcblx0JChcIi5qcy1hbGVydFwiKS5yZW1vdmVDbGFzcyhhbGVydENsYXNzKTtcblx0YWxlcnRUaW1lb3V0ID0gbnVsbDtcbn1cbiQoXCIuanMtYWxlcnRcIikuaG92ZXIoZnVuY3Rpb24oKSB7XG5cdGNsZWFyVGltZW91dChhbGVydFRpbWVvdXQpO1xufSxcblx0XHRcdFx0XHRcdFx0XHRmdW5jdGlvbigpIHtcblx0YWxlcnRUaW1lb3V0ID0gc2V0VGltZW91dChoaWRlQWxlcnQsIDMwMDApO1xufSk7XG4kKFwiLmpzLWFsZXJ0XCIpLmZpbmQoXCIuanMtYWxlcnQtY2xvc2VcIikub24oXCJjbGlja1wiLCBoaWRlQWxlcnQpO1xuLy8gYWxlcnQuanMgZW5kIiwiLy8gYW5pbS1udW1iZXIuanNcblxuJChpbml0TnVtKTsgLy8gaW5pdCBhbmltYXRlTnVtYmVyXG5cbmZ1bmN0aW9uIGluaXROdW0oJGl0ZW1zKSB7XG5cdC8vdmFyIHNwYWNlX3NlcGFyYXRvcl9udW1iZXJfc3RlcCA9ICQuYW5pbWF0ZU51bWJlci5udW1iZXJTdGVwRmFjdG9yaWVzLnNlcGFyYXRvcignLCcpO1xuXHR2YXIgbnVtYmVyID0gJGl0ZW1zIHx8ICQoJy5qcy1hbmltYXRlLW51bScpO1xuXHQvL2NvbnNvbGUubG9nKG51bWJlci5sZW5ndGgpXG5cdG51bWJlci5lYWNoKGZ1bmN0aW9uICgpIHtcblx0XHR2YXIgdmFsdWUgPSAkKHRoaXMpLmF0dHIoXCJkYXRhLXZhbHVlXCIpO1xuXHRcdCQodGhpcykuaHRtbCgwKTtcblx0XHQkKHRoaXMpLmFuaW1hdGVOdW1iZXIoe1xuXHRcdFx0XHRudW1iZXI6IHZhbHVlLFxuXHRcdFx0XHRlYXNpbmc6ICdlYXNlT3V0UXVhZCcsXG5cdFx0XHRcdC8vbnVtYmVyU3RlcDogc3BhY2Vfc2VwYXJhdG9yX251bWJlcl9zdGVwXG5cdFx0XHR9LFxuXHRcdFx0MTUwMFxuXHRcdCk7XG5cdFx0Ly9jb25zb2xlLmxvZygkKHRoaXMpKTtcblx0XHQkKHRoaXMpLmNsZWFyUXVldWUoKTsgLy8gcHJldmVudCBtdWx0aXBsZSBhbmltYXRpb25zXG5cdH0pO1xufVxuLy8gYW5pbS1udW1iZXIuanMgZW5kIiwiLy9BbmltYXRlIENTUyArIFdheVBvaW50cyBqYXZhU2NyaXB0IFBsdWdpbiArIGRldmljZS5qc1xuLy9FeGFtcGxlOiAkKFwiLmVsZW1lbnRcIikuYW5pbWF0ZWQoXCJ6b29tSW5VcFwiLCBcInpvb21PdXREb3duXCIpO1xuKGZ1bmN0aW9uICgkKSB7XG5cdCQuZm4uYW5pbWF0ZWQgPSBmdW5jdGlvbiAoaW5FZmZlY3QsIG91dEVmZmVjdCkge1xuXHRcdCQodGhpcykuY3NzKFwib3BhY2l0eVwiLCBcIjBcIikuYWRkQ2xhc3MoXCJhbmltYXRlZFwiKS53YXlwb2ludChmdW5jdGlvbiAoZGlyKSB7XG5cdFx0XHRpZiAoZGlyID09PSBcImRvd25cIikge1xuXHRcdFx0XHQkKHRoaXMpLnJlbW92ZUNsYXNzKG91dEVmZmVjdCkuYWRkQ2xhc3MoaW5FZmZlY3QpLmNzcyhcIm9wYWNpdHlcIiwgXCIxXCIpO1xuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0JCh0aGlzKS5yZW1vdmVDbGFzcyhpbkVmZmVjdCkuYWRkQ2xhc3Mob3V0RWZmZWN0KS5jc3MoXCJvcGFjaXR5XCIsIFwiMVwiKTtcblx0XHRcdH1cblx0XHR9LCB7XG5cdFx0XHRvZmZzZXQ6IFwiODUlXCJcblx0XHR9KS53YXlwb2ludChmdW5jdGlvbiAoZGlyKSB7XG5cdFx0XHRpZiAoZGlyID09PSBcImRvd25cIikge1xuXHRcdFx0XHQkKHRoaXMpLnJlbW92ZUNsYXNzKGluRWZmZWN0KS5hZGRDbGFzcyhvdXRFZmZlY3QpLmNzcyhcIm9wYWNpdHlcIiwgXCIxXCIpO1xuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0JCh0aGlzKS5yZW1vdmVDbGFzcyhvdXRFZmZlY3QpLmFkZENsYXNzKGluRWZmZWN0KS5jc3MoXCJvcGFjaXR5XCIsIFwiMVwiKTtcblx0XHRcdH1cblx0XHR9LCB7XG5cdFx0XHRvZmZzZXQ6IC0kKHdpbmRvdykuaGVpZ2h0KClcblx0XHR9KTtcblx0fTtcbn0pKGpRdWVyeSk7XG5cbihmdW5jdGlvbiAoJCkge1xuXHQkLmZuLmFuaW1hdGVkX29uY2UgPSBmdW5jdGlvbiAoaW5FZmZlY3QpIHtcblx0XHQkKHRoaXMpLmNzcyhcIm9wYWNpdHlcIiwgXCIwXCIpLmFkZENsYXNzKFwiYW5pbWF0ZWRcIikud2F5cG9pbnQoZnVuY3Rpb24gKGRpcikge1xuXG5cdFx0XHQkKHRoaXMpLmFkZENsYXNzKGluRWZmZWN0KS5jc3MoXCJvcGFjaXR5XCIsIFwiMVwiKTtcblxuXHRcdH0sIHtcblx0XHRcdG9mZnNldDogXCI4NSVcIlxuXHRcdH0pO1xuXHR9O1xufSkoalF1ZXJ5KTtcblxuKGZ1bmN0aW9uICgkKSB7XG5cdCQuZm4ud2F5cG9pbnRUcmlnZXIgPSBmdW5jdGlvbiAoY2IpIHtcblx0XHQkKHRoaXMpLndheXBvaW50KGZ1bmN0aW9uIChkaXIpIHtcblx0XHRcdGlmIChkaXIgPT09IFwiZG93blwiKSB7XG5cdFx0XHRcdGNiKCQodGhpcykpO1xuXHRcdFx0fVxuXHRcdH0sIHtcblx0XHRcdG9mZnNldDogXCIxMDAlXCJcblx0XHR9KS53YXlwb2ludChmdW5jdGlvbiAoZGlyKSB7XG5cdFx0XHRpZiAoZGlyID09PSBcInVwXCIpIHtcblx0XHRcdFx0Y2IoJCh0aGlzKSk7XG5cdFx0XHR9XG5cdFx0fSwge1xuXHRcdFx0b2Zmc2V0OiAtJCh3aW5kb3cpLmhlaWdodCgpXG5cdFx0fSk7XG5cdH07XG59KShqUXVlcnkpO1xuXG4kKGZ1bmN0aW9uICgpIHtcblxuXHRpZiAoIWRldmljZS5tb2JpbGUoKSkge1xuXHRcdCQoXCIuanMtYW5pbWF0aW9ucy11cFwiKS5hbmltYXRlZChcImZhZGVJblVwXCIsIFwiZmFkZU91dERvd25cIik7XG5cdFx0JChcIi5qcy1hbmltYXRpb24tdXBcIikuYW5pbWF0ZWRfb25jZShcImZhZGVJblVwXCIpO1xuXHRcdCQoXCIuanMtYW5pbWF0aW9uLWluLCAuc2VjdGlvbi10aXRsZSwgLmJlbmVmaXRfaXRlbSwgLmV4cGxvaXRhdGlvbl9pdGVtLS1lbXB0eSwgLmV4cGxvaXRhdGlvbl9pdGVtXCIpLmFuaW1hdGVkX29uY2UoXCJmYWRlSW5cIik7XG5cdFx0JChcIi5qcy1hbmltYXRpb24tbGVmdFwiKS5hbmltYXRlZF9vbmNlKFwiZmFkZUluTGVmdFwiKTtcblx0XHQkKFwiLmpzLWFuaW1hdGlvbi1yaWdodFwiKS5hbmltYXRlZF9vbmNlKFwiZmFkZUluUmlnaHRcIik7XG5cdFx0JChcIi5qcy1hbmltYXRlLW51bVwiKS53YXlwb2ludFRyaWdlcihmdW5jdGlvbigkdGhpcykge1xuXHRcdFx0aW5pdE51bSgkdGhpcyk7XG5cdFx0fSk7XG5cdH1cblx0XG59KTsgLy9yZWFkeVxuIiwiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKXtcblx0XG5cdFxuXG5cdFxuXHRcblxufSk7IC8vIHJlYWR5XG4iLCIvLyBnb29nbGUgbWFwIGFwaVxyXG4vL0FJemFTeUF1Wk1qcUwwVnZsZWxjYWhxNVppSlo4bUFhdjgxNktwZ1xyXG4vLyBcclxuZnVuY3Rpb24gaW5pdE1hcCgpIHtcclxuXHJcblx0Ly8gU3BlY2lmeSBmZWF0dXJlcyBhbmQgZWxlbWVudHMgdG8gZGVmaW5lIHN0eWxlcy5cclxuXHR2YXIgc3R5bGVBcnJheSA9IFtcclxuXHRcdHtcclxuXHRcdFx0ZmVhdHVyZVR5cGU6IFwiYWxsXCIsXHJcblx0XHRcdHN0eWxlcnM6IFtcclxuXHRcdFx0XHR7XHJcblx0XHRcdFx0XHRzYXR1cmF0aW9uOiAtNzBcclxuXHRcdFx0XHR9XHJcbiAgICAgICAgICAgIF1cclxuICAgICAgICAgIH0sIHtcclxuXHRcdFx0ZmVhdHVyZVR5cGU6IFwicm9hZC5hcnRlcmlhbFwiLFxyXG5cdFx0XHRlbGVtZW50VHlwZTogXCJnZW9tZXRyeVwiLFxyXG5cdFx0XHRzdHlsZXJzOiBbXHJcblx0XHRcdFx0e1xyXG5cdFx0XHRcdFx0aHVlOiBcIiNhOGE4YThcIlxyXG5cdFx0XHRcdH0sXHJcblx0XHRcdFx0e1xyXG5cdFx0XHRcdFx0c2F0dXJhdGlvbjogMzBcclxuXHRcdFx0XHR9XHJcbiAgICAgICAgICAgIF1cclxuICAgICAgICAgIH0sIHtcclxuXHRcdFx0ZmVhdHVyZVR5cGU6IFwicG9pLmJ1c2luZXNzXCIsXHJcblx0XHRcdC8vZWxlbWVudFR5cGU6IFwibGFiZWxzXCIsXHJcblx0XHRcdHN0eWxlcnM6IFtcclxuXHRcdFx0XHR7XHJcblx0XHRcdFx0XHR2aXNpYmlsaXR5OiBcIm9mZlwiXHJcblx0XHRcdFx0fVxyXG4gICAgICAgICAgICBdXHJcbiAgICAgICAgICB9XHJcbiAgICAgICAgXTtcclxuXHJcblx0Ly8gQ3JlYXRlIGEgbWFwIG9iamVjdCBhbmQgc3BlY2lmeSB0aGUgRE9NIGVsZW1lbnQgZm9yIGRpc3BsYXkuXHJcblx0dmFyIG1hcCA9IG5ldyBnb29nbGUubWFwcy5NYXAoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2ctbWFwJyksIHtcclxuXHRcdGNlbnRlcjoge1xyXG5cdFx0XHRsYXQ6IDQ2LjQwNDc2NDgsXHJcblx0XHRcdGxuZzogMzAuNzAyMzczNVxyXG5cdFx0fSxcclxuXHRcdHNjcm9sbHdoZWVsOiBmYWxzZSxcclxuXHRcdC8vIEFwcGx5IHRoZSBtYXAgc3R5bGUgYXJyYXkgdG8gdGhlIG1hcC5cclxuXHRcdHN0eWxlczogc3R5bGVBcnJheSxcclxuXHRcdHpvb206IDE3LFxyXG5cdFx0bWFwVHlwZUlkOiBnb29nbGUubWFwcy5NYXBUeXBlSWQuUk9BRE1BUCxcclxuXHRcdHBhbkNvbnRyb2w6IGZhbHNlLFxyXG5cdFx0em9vbUNvbnRyb2w6IHRydWUsXHJcblx0XHRtYXBUeXBlQ29udHJvbDogZmFsc2UsXHJcblx0XHRzY2FsZUNvbnRyb2w6IGZhbHNlLFxyXG5cdFx0c3RyZWV0Vmlld0NvbnRyb2w6IHRydWUsXHJcblx0XHRvdmVydmlld01hcENvbnRyb2w6IGZhbHNlXHJcblx0fSk7XHJcblx0XHJcblx0dmFyIG1hcmtlcl9wb3NpdGlvbiA9IG5ldyBnb29nbGUubWFwcy5MYXRMbmcoNDYuNDA0NzY0OCwgMzAuNzAyMzczNSk7XHJcblx0dmFyIG1hcmtlciA9IG5ldyBnb29nbGUubWFwcy5NYXJrZXIoe1xyXG5cdFx0cG9zaXRpb246IG1hcmtlcl9wb3NpdGlvbixcclxuXHRcdG1hcDogbWFwLFxyXG5cdFx0dGl0bGU6IFwiSU5NRVJcIixcclxuXHRcdGljb246IFwiaW1nL2ljb24vbWFwLW1hcmtlci5wbmdcIlxyXG5cdH0pO1xyXG59XHJcblxyXG4kKHdpbmRvdykub24oXCJsb2FkXCIsIGluaXRNYXApO1xyXG4vLyBnb29nbGUgbWFwIGFwaSBlbmQiLCIvLyBwb3AtdXAuanNcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcblxuXHRcdCQoXCIuanMtcG9wLXVwXCIpLm1hZ25pZmljUG9wdXAoe1xuXHRcdFx0dHlwZTogJ2lubGluZScsXG5cdFx0XHRwcmVsb2FkZXI6IGZhbHNlLFxuXHRcdFx0cmVtb3ZhbERlbGF5OiA0MDAsXG5cdFx0XHRtYWluQ2xhc3M6ICdtZnAtZmFkZSdcblx0XHR9KTtcblxuXHRcdCQoJy5qcy1wb3AtdXAtdmlkZW8nKS5tYWduaWZpY1BvcHVwKHtcblx0XHRcdGRpc2FibGVPbjogNzAwLFxuXHRcdFx0dHlwZTogJ2lmcmFtZScsXG5cdFx0XHRtYWluQ2xhc3M6ICdtZnAtZmFkZScsXG5cdFx0XHRyZW1vdmFsRGVsYXk6IDE2MCxcblx0XHRcdHByZWxvYWRlcjogZmFsc2UsXG5cdFx0XHRmaXhlZENvbnRlbnRQb3M6IGZhbHNlXG5cdFx0fSk7XG5cdFx0XG5cdCQoXCIuanMtcG9wLXVwLWFqYXhcIikubWFnbmlmaWNQb3B1cCh7XG5cdFx0dHlwZTogJ2FqYXgnLFxuXHRcdHByZWxvYWRlcjogdHJ1ZSxcblx0XHRmb2N1czogZmFsc2UsXG5cdFx0c2hvd0Nsb3NlQnRuOiBmYWxzZSxcblx0XHRyZW1vdmFsRGVsYXk6IDQwMCxcblx0XHRtYWluQ2xhc3M6ICdtZnAtZmFkZScsXG5cdFx0Y2FsbGJhY2tzOiB7XG5cdFx0XHRhamF4Q29udGVudEFkZGVkOiBmdW5jdGlvbiAoKSB7XG5cdFx0XHRcdFxuXHRcdFx0fVxuXHRcdH1cblx0fSk7XG5cdCQoXCIuanMtcG9wLXVwLWFqYXgsIC5qcy1wb3AtdXBcIikub24oJ21mcE9wZW4nLCBmdW5jdGlvbiAoZSkge1xuXHRcdCQoXCJodG1sXCIpLmFkZENsYXNzKFwicG9wLXVwLS1zaG93blwiKTtcblx0XHQvL2NvbnNvbGUubG9nKCAkKFwiaHRtbFwiKS5hdHRyKFwiY2xhc3NcIikpO1xuXHR9KTtcblx0JChcIi5qcy1wb3AtdXAtYWpheCwgLmpzLXBvcC11cFwiKS5vbignbWZwQ2xvc2UnLCBmdW5jdGlvbiAoZSkge1xuXHRcdCQoXCJodG1sXCIpLnJlbW92ZUNsYXNzKFwicG9wLXVwLS1zaG93blwiKTtcblx0XHQvL2NvbnNvbGUubG9nKCAkKFwiaHRtbFwiKS5hdHRyKFwiY2xhc3NcIikpO1xuXHR9KTtcblx0XG5cdCQoJy5qcy1pbWctcG9wdXAnKS5tYWduaWZpY1BvcHVwKHtcblx0XHR0eXBlOiAnaW1hZ2UnLFxuXHRcdGNsb3NlT25Db250ZW50Q2xpY2s6IHRydWUsXG5cdFx0Y2xvc2VCdG5JbnNpZGU6IGZhbHNlLFxuXHRcdGZpeGVkQ29udGVudFBvczogdHJ1ZSxcblx0XHRtYWluQ2xhc3M6ICdtZnAtbm8tbWFyZ2lucyBtZnAtd2l0aC16b29tJywgLy8gY2xhc3MgdG8gcmVtb3ZlIGRlZmF1bHQgbWFyZ2luIGZyb20gbGVmdCBhbmQgcmlnaHQgc2lkZVxuXHRcdGltYWdlOiB7XG5cdFx0XHR2ZXJ0aWNhbEZpdDogdHJ1ZVxuXHRcdH0sXG5cdFx0em9vbToge1xuXHRcdFx0ZW5hYmxlZDogdHJ1ZSxcblx0XHRcdGR1cmF0aW9uOiAzMDAgLy8gZG9uJ3QgZm9nZXQgdG8gY2hhbmdlIHRoZSBkdXJhdGlvbiBhbHNvIGluIENTU1xuXHRcdH1cblx0fSk7XG59KTsgLy8gcmVhZHlcbi8vIHBvcC11cC5qcyBlbmQiLCIvLyBzbGlkZXJzLmpzXG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG5cdHZhciBhcnJvd0xlZnQgPSAnPGkgY2xhc3M9XCJpY29uLWxlZnRcIj48L2k+Jztcblx0dmFyIGFycm93UmlnaHQgPSAnPGkgY2xhc3M9XCJpY29uLXJpZ2h0XCI+PC9pPic7XG5cblx0Ly8ganMtcHJvZHVjdC1zbGlkZXJcblx0dmFyIHByb2R1Y3RTbGlkZXIgPSAkKCcuanMtcHJvZHVjdC1zbGlkZXInKS5vbignaW5pdCcsIGZ1bmN0aW9uKGV2ZW50LCBzbGljaykge1xuXHRcdCQoc2xpY2suJHNsaWRlc1swXSkuYWRkQ2xhc3MoJ2lzLXZpc2libGUnKTtcblx0fSk7XG5cdHByb2R1Y3RTbGlkZXIuc2xpY2soe1xuXHRcdHNsaWRlc1RvU2hvdzogMSxcblx0XHRzbGlkZXNUb1Njcm9sbDogMSxcblx0XHRhcnJvd3M6IHRydWUsXG5cdFx0aW5maW5pdGU6IHRydWUsXG5cdFx0bmV4dEFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJzbGlkZXJfX2J0bi0tbmV4dCBzbGlkZXJfX2J0blwiPiAnICsgYXJyb3dSaWdodCArICcgPC9idXR0b24+Jyxcblx0XHRwcmV2QXJyb3c6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cInNsaWRlcl9fYnRuLS1wcmV2IHNsaWRlcl9fYnRuXCI+JyArIGFycm93TGVmdCArICc8L2J1dHRvbj4nLFxuXHRcdC8vc3dpcGVUb1NsaWRlOiB0cnVlLFxuXHRcdHNwZWVkOiA0MDAsXG5cdFx0YWNjZXNzaWJpbGl0eTogZmFsc2Vcblx0fSk7XG5cdFxuXHRpZiAoIWRldmljZS5tb2JpbGUoKSkge1xuXHRcdHByb2R1Y3RTbGlkZXIub24oJ2JlZm9yZUNoYW5nZScsIGZ1bmN0aW9uIChldmVudCwgc2xpY2ssIGN1cnJlbnRTbGlkZSwgbmV4dFNsaWRlKSB7XG5cdFx0XHQkKHNsaWNrLiRzbGlkZXNbY3VycmVudFNsaWRlXSkucmVtb3ZlQ2xhc3MoJ2lzLXZpc2libGUnKTtcblx0XHR9KTtcblx0XHRwcm9kdWN0U2xpZGVyLm9uKCdhZnRlckNoYW5nZScsIGZ1bmN0aW9uIChldmVudCwgc2xpY2ssIGN1cnJlbnRTbGlkZSkge1xuXHRcdFx0JChzbGljay4kc2xpZGVzW2N1cnJlbnRTbGlkZV0pLmFkZENsYXNzKCdpcy12aXNpYmxlJyk7XG5cdFx0fSk7XG5cdH0gZWxzZSB7XG5cdFx0cHJvZHVjdFNsaWRlci5maW5kKFwiLnNsaWNrLXNsaWRlXCIpLmFkZENsYXNzKCdpcy12aXNpYmxlJyk7XG5cdH1cblx0Ly8ganMtcHJvZHVjdC1zbGlkZXIgZW5kXG5cblx0Ly8ganMtZG9jcy1zbGlkZXJcblx0dmFyIGRvY3NTbGlkZXIgPSAkKCcuanMtZG9jcy1zbGlkZXInKS5zbGljayh7XG5cdFx0c2xpZGVzVG9TaG93OiAyLFxuXHRcdHNsaWRlc1RvU2Nyb2xsOiAxLFxuXHRcdGFycm93czogdHJ1ZSxcblx0XHRpbmZpbml0ZTogZmFsc2UsXG5cdFx0bmV4dEFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJzbGlkZXJfX2J0bi0tbmV4dCBzbGlkZXJfX2J0blwiPiAnICsgYXJyb3dSaWdodCArICcgPC9idXR0b24+Jyxcblx0XHRwcmV2QXJyb3c6ICc8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cInNsaWRlcl9fYnRuLS1wcmV2IHNsaWRlcl9fYnRuXCI+JyArIGFycm93TGVmdCArICc8L2J1dHRvbj4nLFxuXHRcdHN3aXBlVG9TbGlkZTogdHJ1ZSxcblx0XHRhY2Nlc3NpYmlsaXR5OiBmYWxzZSxcblx0XHRyZXNwb25zaXZlOiBbXG5cdFx0XHR7XG5cdFx0XHRcdGJyZWFrcG9pbnQ6IDgwMCxcblx0XHRcdFx0c2V0dGluZ3M6IHtcblx0XHRcdFx0XHRzbGlkZXNUb1Nob3c6IDFcblx0XHRcdFx0fVxuICAgIH1cbiAgXVxuXHR9KTtcblx0JCh3aW5kb3cpLnJlc2l6ZShmdW5jdGlvbiAoKSB7XG5cdFx0ZG9jc1NsaWRlci5zbGljaygnc2xpY2tHb1RvJywgMCk7XG5cdH0pO1xuXHRkb2NzU2xpZGVyLnNsaWNrKCdzbGlja0dvVG8nLCAwKTtcblx0Ly8ganMtZG9jcy1zbGlkZXIgZW5kXG5cblxuXHQvLyBqcy13b3Jrcy1zbGlkZXJcblx0dmFyIHdvcmtzU2xpZGVyID0gJCgnLmpzLXdvcmtzLXNsaWRlcicpLm9uKCdpbml0JywgZnVuY3Rpb24oZXZlbnQsIHNsaWNrKSB7XG5cdFx0JChzbGljay4kc2xpZGVzWzBdKS5hZGRDbGFzcygnaXMtdmlzaWJsZScpO1xuXHR9KTtcblx0d29ya3NTbGlkZXIuc2xpY2soe1xuXHRcdHNsaWRlc1RvU2hvdzogMSxcblx0XHRzbGlkZXNUb1Njcm9sbDogMSxcblx0XHRhcnJvd3M6IHRydWUsXG5cdFx0aW5maW5pdGU6IGZhbHNlLFxuXHRcdG5leHRBcnJvdzogJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwic2xpZGVyX19idG4tLW5leHQgc2xpZGVyX19idG5cIj4gJyArIGFycm93UmlnaHQgKyAnIDwvYnV0dG9uPicsXG5cdFx0cHJldkFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJzbGlkZXJfX2J0bi0tcHJldiBzbGlkZXJfX2J0blwiPicgKyBhcnJvd0xlZnQgKyAnPC9idXR0b24+Jyxcblx0XHQvL3N3aXBlVG9TbGlkZTogdHJ1ZSxcblx0XHRzcGVlZDogNDAwLFxuXHRcdGFjY2Vzc2liaWxpdHk6IGZhbHNlXG5cdH0pO1xuXHR3b3Jrc1NsaWRlci5zbGljaygnc2xpY2tHb1RvJywgMCk7XG5cdGlmICghZGV2aWNlLm1vYmlsZSgpKSB7XG5cdFx0d29ya3NTbGlkZXIub24oJ2JlZm9yZUNoYW5nZScsIGZ1bmN0aW9uIChldmVudCwgc2xpY2ssIGN1cnJlbnRTbGlkZSwgbmV4dFNsaWRlKSB7XG5cdFx0XHQkKHNsaWNrLiRzbGlkZXNbY3VycmVudFNsaWRlXSkucmVtb3ZlQ2xhc3MoJ2lzLXZpc2libGUnKTtcblx0XHR9KTtcblx0XHR3b3Jrc1NsaWRlci5vbignYWZ0ZXJDaGFuZ2UnLCBmdW5jdGlvbiAoZXZlbnQsIHNsaWNrLCBjdXJyZW50U2xpZGUpIHtcblx0XHRcdCQoc2xpY2suJHNsaWRlc1tjdXJyZW50U2xpZGVdKS5hZGRDbGFzcygnaXMtdmlzaWJsZScpO1xuXHRcdH0pO1xuXHR9IGVsc2Uge1xuXHRcdHdvcmtzU2xpZGVyLmZpbmQoXCIuc2xpY2stc2xpZGVcIikuYWRkQ2xhc3MoJ2lzLXZpc2libGUnKTtcblx0fVxuXHQvLyBqcy13b3Jrcy1zbGlkZXIgZW5kXG5cblx0Ly8ganMtYWNoaWV2ZW1lbnRzLXNsaWRlclxuXHR2YXIgYWNoaWV2ZW1lbnRzU2xpZGVyID0gJCgnLmpzLWFjaGlldmVtZW50cy1zbGlkZXInKS5zbGljayh7XG5cdFx0c2xpZGVzVG9TaG93OiAxLFxuXHRcdHNsaWRlc1RvU2Nyb2xsOiAxLFxuXHRcdGZhZGU6IHRydWUsXG5cdFx0YXJyb3dzOiBmYWxzZSxcblx0XHRpbmZpbml0ZTogdHJ1ZSxcblx0XHRhY2Nlc3NpYmlsaXR5OiBmYWxzZSxcblx0XHRzcGVlZDogNTAwXG5cdH0pO1xuXHQkKHdpbmRvdykucmVzaXplKGZ1bmN0aW9uICgpIHtcblx0XHRhY2hpZXZlbWVudHNTbGlkZXIuc2xpY2soJ3NsaWNrR29UbycsIDApO1xuXHR9KTtcblx0YWNoaWV2ZW1lbnRzU2xpZGVyLnNsaWNrKCdzbGlja0dvVG8nLCAwKTtcblxuXHRhY2hpZXZlbWVudHNTbGlkZXIub24oJ2JlZm9yZUNoYW5nZScsIGZ1bmN0aW9uIChldmVudCwgc2xpY2ssIGN1cnJlbnRTbGlkZSwgbmV4dFNsaWRlKSB7XG5cdFx0Ly9jb25zb2xlLmxvZyhldmVudCk7XG5cdFx0Ly9jb25zb2xlLmxvZyhzbGljay4kc2xpZGVzW25leHRTbGlkZV0pO1xuXHRcdC8vY29uc29sZS5sb2coY3VycmVudFNsaWRlKTtcblx0XHQvL2NvbnNvbGUubG9nKG5leHRTbGlkZSk7XG5cdFx0JChzbGljay4kc2xpZGVzW25leHRTbGlkZV0pLmZpbmQoJy5qcy1hbmltYXRlLW51bScpLmh0bWwoXCIwXCIpO1xuXHR9KTtcblx0YWNoaWV2ZW1lbnRzU2xpZGVyLm9uKCdhZnRlckNoYW5nZScsIGZ1bmN0aW9uIChldmVudCwgc2xpY2ssIGN1cnJlbnRTbGlkZSkge1xuXHRcdC8vY29uc29sZS5sb2coZXZlbnQpO1xuXHRcdC8vY29uc29sZS5sb2coc2xpY2spO1xuXHRcdC8vY29uc29sZS5sb2coY3VycmVudFNsaWRlKTtcblx0XHR2YXIgJGl0ZW1zID0gJChzbGljay4kc2xpZGVzW2N1cnJlbnRTbGlkZV0pLmZpbmQoJy5qcy1hbmltYXRlLW51bScpO1xuXHRcdGluaXROdW0oJGl0ZW1zKTtcblx0fSk7XG5cblx0YWNoaWV2ZW1lbnRzU2xpZGVyLmZpbmQoXCIuanMtbmV4dFwiKS5vbihcImNsaWNrXCIsIGZ1bmN0aW9uICgpIHtcblx0XHRhY2hpZXZlbWVudHNTbGlkZXIuc2xpY2soJ3NsaWNrTmV4dCcpO1xuXHR9KTtcblx0YWNoaWV2ZW1lbnRzU2xpZGVyLmZpbmQoXCIuanMtcHJldlwiKS5vbihcImNsaWNrXCIsIGZ1bmN0aW9uICgpIHtcblx0XHRhY2hpZXZlbWVudHNTbGlkZXIuc2xpY2soJ3NsaWNrUHJldicpO1xuXHR9KTtcblx0Ly8ganMtYWNoaWV2ZW1lbnRzLXNsaWRlciBlbmRcblxuXG5cdC8vIGpzLXJldmlldy1zbGlkZXJcblx0dmFyIHJldmlld1NsaWRlciA9ICQoJy5qcy1yZXZpZXctc2xpZGVyJykuc2xpY2soe1xuXHRcdHNsaWRlc1RvU2hvdzogMSxcblx0XHRzbGlkZXNUb1Njcm9sbDogMSxcblx0XHRmYWRlOiB0cnVlLFxuXHRcdGFycm93czogdHJ1ZSxcblx0XHRpbmZpbml0ZTogdHJ1ZSxcblx0XHRhY2Nlc3NpYmlsaXR5OiBmYWxzZSxcblx0XHRzcGVlZDogNTAwLFxuXHRcdG5leHRBcnJvdzogJzxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwic2xpZGVyX19idG4tLW5leHQgc2xpZGVyX19idG5cIj4gJyArIGFycm93UmlnaHQgKyAnIDwvYnV0dG9uPicsXG5cdFx0cHJldkFycm93OiAnPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJzbGlkZXJfX2J0bi0tcHJldiBzbGlkZXJfX2J0blwiPicgKyBhcnJvd0xlZnQgKyAnPC9idXR0b24+J1xuXHR9KTtcblx0JCh3aW5kb3cpLnJlc2l6ZShmdW5jdGlvbiAoKSB7XG5cdFx0cmV2aWV3U2xpZGVyLnNsaWNrKCdzbGlja0dvVG8nLCAwKTtcblx0fSk7XG5cdHJldmlld1NsaWRlci5zbGljaygnc2xpY2tHb1RvJywgMCk7XG5cdC8vIGpzLXJldmlldy1zbGlkZXIgZW5kXG5cbn0pOyAvLyByZWFkeVxuXG4vLyBzbGlkZXJzLmpzIGVuZCIsIi8qIHNtb290aCBzY3JvbGxpbmcgKi9cclxuJChmdW5jdGlvbiAoKSB7XHJcblx0JCgnYVtocmVmKj1cIiNcIl06bm90KFtocmVmPVwiI1wiXSknKS5jbGljayhmdW5jdGlvbiAoKSB7XHJcblx0XHRpZiAobG9jYXRpb24ucGF0aG5hbWUucmVwbGFjZSgvXlxcLy8sICcnKSA9PSB0aGlzLnBhdGhuYW1lLnJlcGxhY2UoL15cXC8vLCAnJykgJiYgbG9jYXRpb24uaG9zdG5hbWUgPT0gdGhpcy5ob3N0bmFtZSkge1xyXG5cdFx0XHR2YXIgdGFyZ2V0ID0gJCh0aGlzLmhhc2gpO1xyXG5cdFx0XHR0YXJnZXQgPSB0YXJnZXQubGVuZ3RoID8gdGFyZ2V0IDogJCgnW25hbWU9JyArIHRoaXMuaGFzaC5zbGljZSgxKSArICddJyk7XHJcblx0XHRcdGlmICh0YXJnZXQubGVuZ3RoKSB7XHJcblx0XHRcdFx0JCgnaHRtbCwgYm9keScpLmFuaW1hdGUoe1xyXG5cdFx0XHRcdFx0c2Nyb2xsVG9wOiB0YXJnZXQub2Zmc2V0KCkudG9wXHJcblx0XHRcdFx0fSwgMTUwMCk7XHJcblx0XHRcdFx0cmV0dXJuIGZhbHNlO1xyXG5cdFx0XHR9XHJcblx0XHR9XHJcblx0fSk7XHJcbn0pO1xyXG4vKiBzbW9vdGggc2Nyb2xsaW5nIGVuZCovIiwiJChmdW5jdGlvbiAoKSB7XHJcbiAgLy8gb24gY2FudmFzIG1lbnVcclxuICAoZnVuY3Rpb24gKCkge1xyXG4gICAgdmFyICR0b3VjaCA9ICQoJy5qcy10b2dnbGUtbWVudScpO1xyXG4gICAgdmFyICR0b3VjaF9hbmltYXRlID0gJCgnLmpzLXRvZ2dsZS1tZW51IC5zYW5kd2ljaCcpO1xyXG4gICAgdmFyIGNsYXNzTmFtZSA9IFwiaXMtc2hvd24tbWVudVwiO1xyXG4gICAgdmFyICRtZW51ID0gJCgnLmpzLW1vYmlsZS1tZW51Jyk7XHJcbiAgICB2YXIgJGNsb3NlID0gJCgnLmpzLW1lbnUtY2xvc2UnKTtcclxuICAgIHZhciAkd3JhcHBlciA9ICQoXCJib2R5XCIpO1xyXG4gICAgdmFyIHN0YXJ0QnJlYWtwb2ludCA9IFwiNDhlbVwiO1xyXG4gICAgXHJcbiAgICBmdW5jdGlvbiBzaG93TWVudSgpIHtcclxuICAgICAgJHdyYXBwZXIuYWRkQ2xhc3MoY2xhc3NOYW1lKTtcclxuICAgICAgJHRvdWNoX2FuaW1hdGUuYWRkQ2xhc3MoY2xhc3NOYW1lKTtcclxuICAgICAgJChcImh0bWxcIikuY3NzKFwib3ZlcmZsb3cteVwiLCBcImhpZGRlblwiKTtcclxuICAgICAgLy9jb25zb2xlLmxvZyhcInNob3dcIik7XHJcbiAgICB9XHJcblxyXG4gICAgZnVuY3Rpb24gaGlkZU1lbnUoKSB7XHJcbiAgICAgICR3cmFwcGVyLnJlbW92ZUNsYXNzKGNsYXNzTmFtZSk7XHJcbiAgICAgICR0b3VjaF9hbmltYXRlLnJlbW92ZUNsYXNzKGNsYXNzTmFtZSk7XHJcbiAgICAgICQoXCJodG1sXCIpLmNzcyhcIm92ZXJmbG93LXlcIiwgXCJhdXRvXCIpO1xyXG4gICAgICAvL2NvbnNvbGUubG9nKFwiaGlkZVwiKTtcclxuICAgIH1cclxuXHJcbiAgICAkdG91Y2gub24oJ2NsaWNrJywgZnVuY3Rpb24gKGUpIHtcclxuICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xyXG4gICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xyXG4gICAgICAvL2NvbnNvbGUubG9nKFwiY2xpY2tcIik7XHJcbiAgICAgIC8vY29uc29sZS5sb2coISgkdG91Y2hfYW5pbWF0ZS5oYXNDbGFzcyhjbGFzc05hbWUpKSk7XHJcbiAgICAgIGlmICghKCR0b3VjaF9hbmltYXRlLmhhc0NsYXNzKGNsYXNzTmFtZSkpKSB7XHJcbiAgICAgICAgc2hvd01lbnUoKTtcclxuICAgICAgfSBlbHNlIHtcclxuICAgICAgICBoaWRlTWVudSgpO1xyXG4gICAgICB9XHJcbiAgICB9KTtcclxuICAgICRjbG9zZS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xyXG4gICAgICBoaWRlTWVudSgpO1xyXG4gICAgfSk7XHJcblx0XHRcclxuXHRcdCR3cmFwcGVyLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgICAgIGlmIChlLnRhcmdldC5jbGFzc05hbWUgIT09IFwianMtbW9iaWxlLW1lbnVcIikge1xyXG4gICAgICAgIGhpZGVNZW51KCk7XHJcblx0XHRcdFx0Ly9jb25zb2xlLmxvZyhcImNsb3NlIG1lbnVcIilcclxuICAgICAgfVxyXG4gICAgfSk7XHJcbiAgICAkbWVudS5vbignY2xpY2snLCBmdW5jdGlvbiAoZSkge1xyXG4gICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xyXG4gICAgfSk7XHJcblx0XHRcclxuICAgICQod2luZG93KS5yZXNpemUoZnVuY3Rpb24gKCkge1xyXG4gICAgICB2YXIgbWVkaWEgPSB3aW5kb3cubWF0Y2hNZWRpYShcIm9ubHkgc2NyZWVuIGFuZCAobWF4LXdpZHRoOiBcIiArIHN0YXJ0QnJlYWtwb2ludCArIFwiKVwiKS5tYXRjaGVzO1xyXG4gICAgICBpZiAoIW1lZGlhKSB7XHJcbiAgICAgICAgaGlkZU1lbnUoKTtcclxuICAgICAgfVxyXG4gICAgfSk7XHJcbiAgfSkoKTtcclxuICAvLyBvbiBjYW52YXMgbWVudSBlbmRcclxufSk7IiwiXHJcblxyXG4oZnVuY3Rpb24gKCQpIHtcclxuXHQvLyBwcml2ZWQgbWV0aG9kc1xyXG5cdFxyXG5cdHZhciBpc0VtcHR5ID0gZnVuY3Rpb24odmFsdWUpIHtcclxuXHRcdGlmICggdmFsdWUgPT09IFwiXCIgKSB7XHJcblx0XHRcdHJldHVybiB0cnVlO1xyXG5cdFx0fSBlbHNlIHtcclxuXHRcdFx0cmV0dXJuIGZhbHNlO1xyXG5cdFx0fSBcclxuXHR9O1xyXG5cdHZhciBpc0VtYWlsID0gZnVuY3Rpb24oKSB7XHJcblx0XHRyZXR1cm4gdHJ1ZTtcclxuXHR9O1xyXG5cdHZhciBpc1Bob25lID0gZnVuY3Rpb24oKSB7XHJcblx0XHRyZXR1cm4gdHJ1ZTtcclxuXHR9O1xyXG5cdHZhciB0b2dnbGVNYXJrZXIgPSBmdW5jdGlvbigpIHtcclxuXHRcdGlmIChpc0VtcHR5KCAkKHRoaXMpLnZhbCgpICkgKSB7XHJcblx0XHRcdCQodGhpcykuYWRkQ2xhc3MoXCJpcy1pbnZhbGlkXCIpO1xyXG5cdFx0fSBlbHNlIHtcclxuXHRcdFx0JCh0aGlzKS5yZW1vdmVDbGFzcyhcImlzLWludmFsaWRcIik7XHJcblx0XHR9XHJcblx0fTtcclxuXHQvLyBwcml2ZWQgbWV0aG9kcyBlbmRcclxuXHR2YXIgbWV0aG9kcyA9IHtcclxuXHRcdGluaXQ6IGZ1bmN0aW9uIChvcHRpb25zKSB7XHJcblxyXG5cdFx0XHQvLyBkZWZhdWx0IG9wdGlvblxyXG5cdFx0XHR2YXIgc2V0dGluZ3MgPSAkLmV4dGVuZCh7XHJcblx0XHRcdFx0cmVxdWlyZWQ6IFwiXCIsIFxyXG5cdFx0XHRcdGNhbGxiYWNrOiBmdW5jdGlvbigpIHt9XHJcblx0XHRcdH0sIG9wdGlvbnMpO1xyXG5cdFx0XHRcclxuXHRcdFx0cmV0dXJuIHRoaXMuZWFjaChmdW5jdGlvbiAoKSB7XHJcblx0XHRcdFx0dmFyICRmb3JtID0gJCh0aGlzKSxcclxuXHRcdFx0XHRcdCRlcnJvciA9ICRmb3JtLmZpbmQoXCIuanMtZXJyb3JcIiksXHJcblx0XHRcdFx0XHQkaW5wdXRzID0gJGZvcm0uZmluZChcIi5qcy1mb3JtLXJlcVwiKSxcclxuXHRcdFx0XHRcdGluaXQgPSBcImluaXRcIixcclxuXHRcdFx0XHRcdGRhdGEgPSAkZm9ybS5kYXRhKFwidmFsaWRhdGlvblwiKTtcclxuXHJcblx0XHRcdFx0Ly8g0JXRgdC70Lgg0L/Qu9Cw0LPQuNC9INC10YnRkSDQvdC1INC/0YDQvtC40L3QuNGG0LjQsNC70LjQt9C40YDQvtCy0LDQvVxyXG5cdFx0XHRcdGlmICghZGF0YSkge1xyXG5cdFx0XHRcdFx0JGZvcm0ub24oXCJzdWJtaXRcIiwgZnVuY3Rpb24oZSkge1xyXG5cdFx0XHRcdFx0XHR2YXIgdmFsaWRhdGlvbkVycm9yID0gZmFsc2U7XHJcblx0XHRcdFx0XHRcdCRpbnB1dHMuZWFjaChmdW5jdGlvbigpIHtcclxuXHRcdFx0XHRcdFx0XHRpZiAoIGlzRW1wdHkoICQodGhpcykudmFsKCkgKSApIHtcclxuXHRcdFx0XHRcdFx0XHRcdFxyXG5cdFx0XHRcdFx0XHRcdFx0aWYgKCRlcnJvcikge1xyXG5cdFx0XHRcdFx0XHRcdFx0XHQvLyBzaG93IGVycm9yXHJcblx0XHRcdFx0XHRcdFx0XHRcdCRlcnJvci5odG1sKCAkKHRoaXMpLmF0dHIoXCJwbGFjZWhvbGRlclwiKSApO1xyXG5cdFx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHRcdFx0XHJcblx0XHRcdFx0XHRcdFx0XHQkKHRoaXMpLmZvY3VzKCk7XHJcblx0XHRcdFx0XHRcdFx0XHR0b2dnbGVNYXJrZXIuYXBwbHkodGhpcyk7XHJcblx0XHRcdFx0XHRcdFx0XHRlLnByZXZlbnREZWZhdWx0KCk7XHJcblx0XHRcdFx0XHRcdFx0XHR2YWxpZGF0aW9uRXJyb3IgPSB0cnVlO1xyXG5cdFx0XHRcdFx0XHRcdFx0cmV0dXJuIGZhbHNlO1xyXG5cdFx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdFx0fSk7XHJcblx0XHRcdFx0XHRcdFxyXG5cdFx0XHRcdFx0XHQvLyBjaGVjayB2YWxpZGF0aW9uIGVycm9yXHJcblx0XHRcdFx0XHRcdGlmICghdmFsaWRhdGlvbkVycm9yKSB7XHJcblx0XHRcdFx0XHRcdFx0aWYgKCBzZXR0aW5ncy5jYWxsYmFjayApIHtcclxuXHRcdFx0XHRcdFx0XHRcdC8vIHByZXZlbnQgZm9ybSBzdWJtaXQgaWYgY2FsbGJhY2sgZXhpc3RzXHJcblx0XHRcdFx0XHRcdFx0XHRzZXR0aW5ncy5jYWxsYmFjaygkZm9ybSk7XHJcblx0XHRcdFx0XHRcdFx0XHRyZXR1cm4gZmFsc2U7XHJcblx0XHRcdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0XHRcdHJldHVybiB0cnVlO1xyXG5cdFx0XHRcdFx0XHR9IGVsc2Uge1xyXG5cdFx0XHRcdFx0XHRcdC8vIHByZXZlbnQgZm9ybSBzdWJtaXQgaWYgdmFsaWRhdGlvbiBpcyBmYWlsZWRcclxuXHRcdFx0XHRcdFx0XHRyZXR1cm4gZmFsc2U7XHJcblx0XHRcdFx0XHRcdH1cclxuXHRcdFx0XHRcdH0pO1xyXG5cdFx0XHRcdFx0JGlucHV0cy5vbihcImNoYW5nZVwiLCB0b2dnbGVNYXJrZXIpO1xyXG5cdFx0XHRcdFx0XHJcblx0XHRcdFx0XHQkKHRoaXMpLmRhdGEoXCJ2YWxpZGF0aW9uXCIsIGluaXQpO1xyXG5cdFx0XHRcdH1cclxuXHRcdFx0fSk7XHJcblx0XHR9XHJcblx0XHRcclxuXHR9O1xyXG5cdCQuZm4uaW5tZXJWYWxpZGF0aW9uID0gZnVuY3Rpb24gKG1ldGhvZCkge1xyXG5cdFx0aWYgKG1ldGhvZHNbbWV0aG9kXSkge1xyXG5cdFx0XHRyZXR1cm4gbWV0aG9kc1ttZXRob2RdLmFwcGx5KHRoaXMsIEFycmF5LnByb3RvdHlwZS5zbGljZS5jYWxsKGFyZ3VtZW50cywgMSkpO1xyXG5cdFx0fSBlbHNlIGlmICh0eXBlb2YgbWV0aG9kID09PSAnb2JqZWN0JyB8fCAhbWV0aG9kKSB7XHJcblx0XHRcdHJldHVybiBtZXRob2RzLmluaXQuYXBwbHkodGhpcywgYXJndW1lbnRzKTtcclxuXHRcdH0gZWxzZSB7XHJcblx0XHRcdCQuZXJyb3IoJ9Cc0LXRgtC+0LQg0YEg0LjQvNC10L3QtdC8ICcgKyBtZXRob2QgKyAnINC90LUg0YHRg9GJ0LXRgdGC0LLRg9C10YIg0LTQu9GPIGpRdWVyeS5udW1iZXJJbnB1dCcpO1xyXG5cdFx0fVxyXG5cdH07XHJcblxyXG59KShqUXVlcnkpO1xyXG5cclxuJChmdW5jdGlvbiAoKSB7XHJcblx0dmFyICRmb3JtID0gJChcIi5qcy12YWxpZGF0aW9uXCIpO1xyXG5cdCRmb3JtLmlubWVyVmFsaWRhdGlvbih7XHJcblx0XHRjYWxsYmFjazogZnVuY3Rpb24oJGZvcm1JbnN0YW5jZSkge1xyXG5cdFx0XHRzdWJtaXRGb3JtLmFwcGx5KCRmb3JtSW5zdGFuY2UpO1xyXG5cdFx0fVxyXG5cdH0pO1xyXG59KTsgLy9yZWFkeSJdLCJzb3VyY2VSb290IjoiL3NvdXJjZS8ifQ==