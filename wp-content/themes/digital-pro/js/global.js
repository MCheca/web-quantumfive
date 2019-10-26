/**
 * This script adds the fade up to the Digital Pro theme.
 *
 * @package Digital\JS
 * @author StudioPress
 * @license GPL-2.0+
 */

(function($) {

	// Make sure JS class is added.
	document.documentElement.className = "js";

	// Run on page scroll.
	$(window).scroll( function() {

		// Toggle header class after threshold point.
		if ( $(document).scrollTop() > 50 ) {
			$(".site-header").addClass("shrink");
		} else {
			$(".site-header").removeClass("shrink");
		}

	});

})(jQuery);