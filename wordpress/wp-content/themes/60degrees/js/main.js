
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
		controlNav: true,
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



	// ----- Menu Button
	// ---------------------------------------------
	$('.js-menu-open').click(function(e){
		e.preventDefault();
		// $('body').addClass('js-stopScrolling');
		$('.js-header-navigation').stop().slideDown('fast');
	});
	$('.js-menu-close').click(function(e){
		e.preventDefault();
		// $('body').removeClass('js-stopScrolling');
		$('.js-header-navigation').stop().slideUp('fast');
	});
	
	// Window Size Calculation
	$(window).resize(function() {
		$(window).height();
		$(window).width();
	});

	// Resize Actions
	window.onresize = function(){
		if (window.innerWidth > 767){
			// console.log('More that 991px');
			$('body').removeClass('js-stopScrolling');
			$('.js-header-navigation').show();
		}
		if (window.innerWidth <= 767){
			//console.log('Less that 991px');
			$('body').removeClass('js-stopScrolling');
			$('.js-header-navigation').hide();
		}
	}

	
	
	// ----- Google Maps
	// ---------------------------------------------
	
	if($('body').hasClass('page-id-13')){

		function initialize() {

			var dataLat = $( "#google_map" ).data( "lat" )
			var dataLng = $( "#google_map" ).data( "lng" )
			var dataURL = $( "#google_map" ).data( "url" )


			// console.log(dataLat);
			// console.log(dataLng);
			// console.log(dataURL);

			var myLatlng = new google.maps.LatLng( dataLat, dataLng );
			
			var mapOptions = {
				zoom: 16,
				center: myLatlng,
				scrollwheel: false,
				draggable: false,
				zoomControl: true,
				disableDoubleClickZoom: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			}
					
			var map = new google.maps.Map(document.getElementById('google_map'), mapOptions);

			var stylez = [
				{
				  featureType: "all",
				  elementType: "all",
				  stylers: [
					{ saturation: -50 } // <-- THIS
				  ]
				}
			];
			
			var mapType = new google.maps.StyledMapType(stylez, { name:"Grayscale" });    
			map.mapTypes.set('tehgrayz', mapType);
			map.setMapTypeId('tehgrayz');
			
	        var interval = setTimeout(function () {
				var marker = new google.maps.Marker({
					draggable: false,
					animation: google.maps.Animation.DROP,
					raiseOnDrag: false,
					position: myLatlng, 
					map: map,
					title: 'Tourist',
					icon: new google.maps.MarkerImage(
						dataURL, // my 16x48 sprite with 3 circular icons
						null,
						null,
						null,
						new google.maps.Size(40, 60) // scaled size of the entire sprite
					)
				});
	        }, 1500);

			var center;
			function calculateCenter() {
			  center = map.getCenter();
			}

			google.maps.event.addDomListener(map, 'idle', function() {
			  calculateCenter();
			});

			google.maps.event.addDomListener(window, 'resize', function() {
			    map.setCenter(center);
			});
		}
			
		google.maps.event.addDomListener(window, 'load', initialize);
	
	}


});