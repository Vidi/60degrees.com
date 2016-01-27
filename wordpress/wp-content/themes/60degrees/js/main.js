
/* $(document).ready
---------------------------------------- */

$(document).ready(function(){
	
	"use strict";


	// ----- No JS
	// ---------------------------------------------
	$('html').removeClass('no-js');


    // ----- FlexSlider
    // ---------------------------------------------
	$('.js-flexslider--carousel').flexslider({
		animation: 'fade',
		controlNav: false,
		directionNav: false,
		keyboard: true,
		pauseOnHover: false,
		start: function(){
			$('.carousel__image').show();
			$('.carousel__content').show();
		},
		slideshowSpeed:7500,
		animationSpeed:750
	});

	$('.js-flexslider--quotes').flexslider({
		animation: 'fade',
		controlNav: true,
		directionNav: false,
		keyboard: true,
		pauseOnHover: false,
		start: function(){
			$('.quotes__content').show();
		},
		slideshowSpeed:7500,
		animationSpeed:750
	});


});