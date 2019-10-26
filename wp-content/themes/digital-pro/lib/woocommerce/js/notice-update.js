/**
 * This script adds notice dismissal to the Digital Pro theme.
 *
 * @package Digital\JS
 * @author StudioPress
 * @license GPL-2.0+
 */

jQuery(document).on( 'click', '.digital-woocommerce-notice .notice-dismiss', function() {

	jQuery.ajax({
		url: ajaxurl,
		data: {
			action: 'digital_dismiss_woocommerce_notice'
		}
	});

});