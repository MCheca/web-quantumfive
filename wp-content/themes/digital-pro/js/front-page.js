/**
 * This script adds the jquery effects to the front page of the Digital Pro Theme.
 *
 * @package Digital\JS
 * @author StudioPress
 * @license GPL-2.0+
 */

jQuery(function( $ ){

	// Set front page 1 height.
	var windowHeight = $( window ).height() - 90;

	$( '.front-page-1' ).css({'height': windowHeight +'px'});

	$( window ).resize(function(){

		var windowHeight = $( window ).height();

		$( '.front-page-1' ).css({'height': windowHeight +'px'});

	});

	// Run when page is loaded.
	$(document).ready( function() {

		// Run 0.25 seconds after document ready for any instances viewable on load.
		setTimeout( function() {
			animateObject();
		}, 250);

	});

	$( window ).scroll( function() {

		animateObject();

	});

	// Scroll to target function.
	$( '.front-page-1 a[href*="#"]:not([href="#"])' ).click(function() {

		if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {

			var target = $(this.hash);
			target = target.length ? target : $( '[name=' + this.hash.slice(1) + ']' );

			if (target.length) {

				$( 'html,body' ).animate({
					scrollTop: target.offset().top
				}, 750 );

				return false;

			}
		}

	});

	// Helper function to animate hidden object in with a fadeUp effect.
	function animateObject() {

		// Define your object via class.
		var object = $( '.fadeup-effect' );

		// Exit early if no objects on page.
		if ( object.length == 0 ) {
			return;
		}

		// Loop through each object in the array.
		$.each( object, function() {

			var windowHeight = $(window).height(),
				offset 		 = $(this).offset().top,
				top			 = offset - $(document).scrollTop(),
				percent 	 = Math.floor( top / windowHeight * 100 );

			if ( percent < 80 ) {

				$(this).addClass( 'fadeInUp' );

			}
		});
	}

});
