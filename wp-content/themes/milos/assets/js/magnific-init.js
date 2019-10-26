jQuery(function( $ ) {
	'use strict';

	/* -----------------------------------------
	Image Lightbox
	----------------------------------------- */
	$( ".milos-lightbox, a[data-lightbox^='gal'], .zoom" ).magnificPopup({
		type: 'image',
		mainClass: 'mfp-with-zoom',
		gallery: {
			enabled: true
		},
		zoom: {
			enabled: true
		}
	} );

});