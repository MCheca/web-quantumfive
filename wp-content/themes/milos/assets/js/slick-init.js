jQuery(function( $ ) {
	'use strict';

	/* -----------------------------------------
	 Slideshow
	 ----------------------------------------- */
	var $slideshow = $( '.page-slideshow' );

	if ( $slideshow.length ) {
		var animation     = $slideshow.data( 'animation' ); // fade or slide
		var autoplay      = $slideshow.data( 'autoplay' );
		var autoplaySpeed = $slideshow.data( 'autoplayspeed' ); // slide transition speed
		var speed         = $slideshow.data( 'speed' ); // slide/fade animation speed

		$slideshow.slick( {
			fade: animation === 'fade',
			autoplay: !! autoplay,
			autoplaySpeed: autoplaySpeed,
			speed: speed,
			dots: true,
			prevArrow: '<button type="button" class="slick-prev"><span class="genericon genericon-previous"></span></button>',
			nextArrow: '<button type="button" class="slick-next"><span class="genericon genericon-next"></span></button>'
		} );
	}
});