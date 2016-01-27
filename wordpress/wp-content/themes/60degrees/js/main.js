
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
		slideshowSpeed:5000,
		animationSpeed:500
	});


});