<?php
function ctf_get_current_time() {
	$current_time = time();

	// where to do tests
	//$current_time = strtotime( 'November 25, 2020' ) + 1;

	return $current_time;
}

// generates the html for the admin notices
function ctf_notices_html() {

	if ( function_exists( 'sbi_notices_html' ) || function_exists( 'cff_notices_html' ) ) {
		return;
	}

	$current_screen = get_current_screen();
	$is_plugins_page = isset( $current_screen->id ) && $current_screen->id === 'plugins';
	$page = isset( $_GET['page'] ) ? sanitize_text_field( $_GET['page'] ) : '';
	//Only show to admins
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$ctf_statuses_option = get_option( 'ctf_statuses', array() );
	$current_time = ctf_get_current_time();
	$ctf_bfcm_discount_code = 'happysmashgiving' . date('Y', $current_time );

	// reset everything for testing
	if ( false ) {
		global $current_user;
		$user_id = $current_user->ID;
		delete_user_meta( $user_id, 'ctf_ignore_bfcm_sale_notice' );
		//delete_user_meta( $user_id, 'ctf_ignore_new_user_sale_notice' );
		//$ctf_statuses_option = array( 'first_install' => strtotime( 'December 8, 2019' ) );
		//$ctf_statuses_option = array( 'first_install' => time() );

		//update_option( 'ctf_statuses', $ctf_statuses_option, false );
		//delete_option( 'ctf_rating_notice');
		//delete_transient( 'instagram_feed_rating_notice_waiting' );

		//set_transient( 'instagram_feed_rating_notice_waiting', 'waiting', 2 * WEEK_IN_SECONDS );
		//update_option( 'ctf_rating_notice', 'pending', false );
	}

	//$ctf_statuses_option['rating_notice_dismissed'] = time();
	//update_option( 'ctf_statuses', $ctf_statuses_option, false );
	// rating notice logic
	$ctf_rating_notice_option = get_option( 'ctf_rating_notice', false );
	$ctf_rating_notice_waiting = get_transient( 'custom_twitter_feeds_rating_notice_waiting' );
	$should_show_rating_notice = ($ctf_rating_notice_waiting !== 'waiting' && $ctf_rating_notice_option !== 'dismissed');

	// black friday cyber monday logic
	$thanksgiving_this_year = ctf_get_future_date( 11, date('Y', $current_time ), 4, 4, 1 );
	$one_week_before_black_friday_this_year = $thanksgiving_this_year - 7*24*60*60;
	$one_day_after_cyber_monday_this_year = $thanksgiving_this_year + 5*24*60*60;
	$has_been_two_days_since_rating_dismissal = isset( $ctf_statuses_option['rating_notice_dismissed'] ) ? ((int)$ctf_statuses_option['rating_notice_dismissed'] + 2*24*60*60) < $current_time : true;

	$could_show_bfcm_discount = ($current_time > $one_week_before_black_friday_this_year && $current_time < $one_day_after_cyber_monday_this_year);
	$should_show_bfcm_discount = false;
	if ( $could_show_bfcm_discount && $has_been_two_days_since_rating_dismissal ) {
		global $current_user;
		$user_id = $current_user->ID;

		$ignore_bfcm_sale_notice_meta = get_user_meta( $user_id, 'ctf_ignore_bfcm_sale_notice' );
		$ignore_bfcm_sale_notice_meta = isset( $ignore_bfcm_sale_notice_meta[0] ) ? $ignore_bfcm_sale_notice_meta[0] : '';

		/* Check that the user hasn't already clicked to ignore the message */
		$should_show_bfcm_discount = ($ignore_bfcm_sale_notice_meta !== 'always' && $ignore_bfcm_sale_notice_meta !== date( 'Y', $current_time ));
	}

	// new user discount logic
	$in_new_user_month_range = true;
	$should_show_new_user_discount = false;
	$has_been_one_month_since_rating_dismissal = isset( $ctf_statuses_option['rating_notice_dismissed'] ) ? ((int)$ctf_statuses_option['rating_notice_dismissed'] + 30*24*60*60) < $current_time + 1: true;

	if ( isset( $ctf_statuses_option['first_install'] ) && $ctf_statuses_option['first_install'] === 'from_update' ) {
		global $current_user;
		$user_id = $current_user->ID;
		$ignore_new_user_sale_notice_meta = get_user_meta( $user_id, 'ctf_ignore_new_user_sale_notice' );
		$ignore_new_user_sale_notice_meta = isset( $ignore_new_user_sale_notice_meta[0] ) ? $ignore_new_user_sale_notice_meta[0] : '';

		if ( $ignore_new_user_sale_notice_meta !== 'always' ) {
			$should_show_new_user_discount = true;
		}
	} elseif ( $in_new_user_month_range && $has_been_one_month_since_rating_dismissal ) {
		global $current_user;
		$user_id = $current_user->ID;
		$ignore_new_user_sale_notice_meta = get_user_meta( $user_id, 'ctf_ignore_new_user_sale_notice' );
		$ignore_new_user_sale_notice_meta = isset( $ignore_new_user_sale_notice_meta[0] ) ? $ignore_new_user_sale_notice_meta[0] : '';

		if ( $ignore_new_user_sale_notice_meta !== 'always'
		     && isset( $ctf_statuses_option['first_install'] )
		     && $current_time > (int)$ctf_statuses_option['first_install'] + 60*60*24*30 ) {
			$should_show_new_user_discount = true;
		}
	}

	// for debugging
	if ( false ) {
		global $current_user;
		$user_id = $current_user->ID;
		$ignore_bfcm_sale_notice_meta = get_user_meta( $user_id, 'ctf_ignore_bfcm_sale_notice' );
		$ignore_new_user_sale_notice_meta = get_user_meta( $user_id, 'ctf_ignore_new_user_sale_notice' );

		var_dump( 'new user rating option', $ctf_rating_notice_option );
		var_dump( 'new user rating transient', $ctf_rating_notice_waiting );

		var_dump( 'should show new user rating notice?', $should_show_rating_notice );

		var_dump( 'new user discount month range?', $in_new_user_month_range );
		var_dump( 'should show new user discount?', $should_show_new_user_discount );

		var_dump( 'Thanksgiving this year?', date('m/d/Y', $thanksgiving_this_year ) );

		var_dump( 'could show bfcm discount?', $could_show_bfcm_discount );
		var_dump( 'rating was dismissed?', date('m/d/Y', $ctf_statuses_option['rating_notice_dismissed']  ) );

		var_dump( 'should show bfcm discount?', $should_show_bfcm_discount );

		var_dump( 'ignore_bfcm_sale_notice_meta', $ignore_bfcm_sale_notice_meta );
		var_dump( 'ignore_new_user_sale_notice_meta', $ignore_new_user_sale_notice_meta );

		var_dump( $ctf_statuses_option );
	}


	if ( $should_show_rating_notice ) {
		$other_notice_html = '';
		$dismiss_url = add_query_arg( 'ctf_ignore_rating_notice_nag', '1' );
		$later_url = add_query_arg( 'ctf_ignore_rating_notice_nag', 'later' );
		if ( $should_show_bfcm_discount ) {
			$other_notice_html = '<p class="ctf_other_notice">' .  __( 'PS. We currently have a <a href="https://smashballoon.com/custom-twitter-feeds/?utm_source=plugin-free&utm_campaign=ctf&discount='.$ctf_bfcm_discount_code.'" target="_blank"><b style="font-weight: 700;">Black Friday deal</b></a> for 20% off the Pro version!', 'custom-twitter-feed' ) . '</p>';

			$dismiss_url = add_query_arg( array(
					'ctf_ignore_rating_notice_nag' => '1',
					'ctf_ignore_bfcm_sale_notice' => date( 'Y', $current_time )
				)
			);
			$later_url = add_query_arg( array(
					'ctf_ignore_rating_notice_nag' => 'later',
					'ctf_ignore_bfcm_sale_notice' => date( 'Y', $current_time )
				)
			);
		}

		echo "
            <div class='ctf_notice ctf_review_notice'>
                <img src='". CTF_PLUGIN_URL . 'img/ctf-icon.jpg' ."' alt='" . __( 'Custom Twitter Feed', 'custom-twitter-feed' ) . "'>
                <div class='ctf-notice-text'>
                    <p style='padding-top: 4px;'>" . __( "It's great to see that you've been using the <strong style='font-weight: 700;'>Custom Twitter Feeds</strong> plugin for a while now. Hopefully you're happy with it!&nbsp; If so, would you consider leaving a positive review? It really helps to support the plugin and helps others to discover it too!", 'custom-twitter-feed' ) . "</p>
                    <p class='links'";
              		if( $should_show_bfcm_discount ) echo " style='margin-top: 0 !important;'";
                    echo ">
                        <a class='ctf_notice_dismiss' href='https://wordpress.org/support/plugin/custom-twitter-feeds/reviews/' target='_blank'>" . __( 'Sure, I\'d love to!', 'custom-twitter-feed' ) . "</a>
                        &middot;
                        <a class='ctf_notice_dismiss' href='" .esc_url( $dismiss_url ). "'>" . __( 'No thanks', 'custom-twitter-feed' ) . "</a>
                        &middot;
                        <a class='ctf_notice_dismiss' href='" .esc_url( $dismiss_url ). "'>" . __( 'I\'ve already given a review', 'custom-twitter-feed' ) . "</a>
                        &middot;
                        <a class='ctf_notice_dismiss' href='" .esc_url( $later_url ). "'>" . __( 'Ask Me Later', 'custom-twitter-feed' ) . "</a>
                    </p>"
		    . $other_notice_html .
		    "</div>
                <a class='ctf_notice_close' href='" .esc_url( $dismiss_url ). "'><i class='fa fa-close'></i></a>
            </div>";

	} elseif ( $should_show_new_user_discount ) {
		global $current_user;
		$user_id = $current_user->ID;
		$ignore_new_user_sale_notice_meta = get_user_meta( $user_id, 'ctf_ignore_new_user_sale_notice' );
		if ( $ignore_new_user_sale_notice_meta !== 'always' ) {

			echo "
        <div class='ctf_notice ctf_review_notice ctf_new_user_sale_notice'>
            <img src='" . CTF_PLUGIN_URL . 'img/ctf-icon-offer.jpg' . "' alt='Custom Twitter Feed'>
            <div class='ctf-notice-text'>
                <p>" . __( '<b style="font-weight: 700;">Exclusive offer!</b>  We don\'t run promotions very often, but for a limited time we\'re offering <b style="font-weight: 700;">20% off</b> our Pro version to all users of our free Custom Twitter Feeds plugin.', 'custom-twitter-feed' ) . "</p>
                <p class='ctf-links'>
                    <a class='ctf_notice_dismiss ctf_offer_btn' href='https://smashballoon.com/custom-twitter-feeds/?utm_source=plugin-free&utm_campaign=ctf&discount=twitterthankyou' target='_blank'><b>" . __( 'Get this offer', 'custom-twitter-feed' ) . "</b></a>
                    <a class='ctf_notice_dismiss' style='margin-left: 5px;' href='" . esc_url( add_query_arg( 'ctf_ignore_new_user_sale_notice', 'always' ) ) . "'>" . __( 'I\'m not interested', 'custom-twitter-feed' ) . "</a>

                </p>
            </div>
            <a class='ctf_new_user_sale_notice_close' href='" . esc_url( add_query_arg( 'ctf_ignore_new_user_sale_notice', 'always' ) ) . "'><i class='fa fa-close'></i></a>
        </div>
        ";
		}

	} elseif ( $should_show_bfcm_discount ) {

		echo "
        <div class='ctf_notice ctf_review_notice ctf_bfcm_sale_notice'>
            <img src='". CTF_PLUGIN_URL . 'img/ctf-icon-offer.jpg' ."' alt='Custom Twitter Feed'>
            <div class='ctf-notice-text'>
                <p>" . __( '<b style="font-weight: 700;">Black Friday/Cyber Monday Deal!</b> Thank you for using our free Custom Twitter Feeds plugin. For a limited time, we\'re offering <b style="font-weight: 700;">20% off</b> the Pro version for all of our users.', 'custom-twitter-feed' ) . "</p>
                <p class='ctf-links'>
                    <a class='ctf_notice_dismiss ctf_offer_btn' href='https://smashballoon.com/custom-twitter-feeds/?utm_source=plugin-free&utm_campaign=ctf&discount=".$ctf_bfcm_discount_code."' target='_blank'><b>" . __( 'Get this offer', 'custom-twitter-feed' ) . "</b></a>
                    <a class='ctf_notice_dismiss' style='margin-left: 5px;' href='" .esc_url( add_query_arg( 'ctf_ignore_bfcm_sale_notice', date( 'Y', $current_time ) ) ). "'>" . __( 'I\'m not interested', 'custom-twitter-feed' ) . "</a>
                </p>
            </div>
            <a class='ctf_bfcm_sale_notice_close' href='" .esc_url( add_query_arg( 'ctf_ignore_bfcm_sale_notice', date( 'Y', $current_time ) ) ). "'><i class='fa fa-close'></i></a>
        </div>
        ";

	}

}
add_action( 'admin_notices', 'ctf_notices_html', 12 ); // priority 8 for Instagram, priority 10 for Facebook

function ctf_process_nags() {

	global $current_user;
	$user_id = $current_user->ID;
	$ctf_statuses_option = get_option( 'ctf_statuses', array() );

	if ( isset( $_GET['ctf_ignore_rating_notice_nag'] ) ) {
		if ( (int)$_GET['ctf_ignore_rating_notice_nag'] === 1 ) {
			update_option( 'ctf_rating_notice', 'dismissed', false );
			$ctf_statuses_option['rating_notice_dismissed'] = ctf_get_current_time();
			update_option( 'ctf_statuses', $ctf_statuses_option, false );

		} elseif ( $_GET['ctf_ignore_rating_notice_nag'] === 'later' ) {
			set_transient( 'custom_twitter_feeds_rating_notice_waiting', 'waiting', 2 * WEEK_IN_SECONDS );
			update_option( 'ctf_rating_notice', 'pending', false );
		}
	}

	if ( isset( $_GET['ctf_ignore_new_user_sale_notice'] ) ) {
		$response = sanitize_text_field( $_GET['ctf_ignore_new_user_sale_notice'] );
		if ( $response === 'always' ) {
			update_user_meta( $user_id, 'ctf_ignore_new_user_sale_notice', 'always' );

			$current_month_number = (int)date('n', ctf_get_current_time() );
			$not_early_in_the_year = ($current_month_number > 5);

			if ( $not_early_in_the_year ) {
				update_user_meta( $user_id, 'ctf_ignore_bfcm_sale_notice', date( 'Y', ctf_get_current_time() ) );
			}

		}
	}

	if ( isset( $_GET['ctf_ignore_bfcm_sale_notice'] ) ) {
		$response = sanitize_text_field( $_GET['ctf_ignore_bfcm_sale_notice'] );
		if ( $response === 'always' ) {
			update_user_meta( $user_id, 'ctf_ignore_bfcm_sale_notice', 'always' );
		} elseif ( $response === date( 'Y', ctf_get_current_time() ) ) {
			update_user_meta( $user_id, 'ctf_ignore_bfcm_sale_notice', date( 'Y', ctf_get_current_time() ) );
		}
		update_user_meta( $user_id, 'ctf_ignore_new_user_sale_notice', 'always' );
	}

}
add_action( 'admin_init', 'ctf_process_nags' );

function ctf_get_future_date( $month, $year, $week, $day, $direction ) {
	if ( $direction > 0 ) {
		$startday = 1;
	} else {
		$startday = date( 't', mktime(0, 0, 0, $month, 1, $year ) );
	}

	$start = mktime( 0, 0, 0, $month, $startday, $year );
	$weekday = date( 'N', $start );

	$offset = 0;
	if ( $direction * $day >= $direction * $weekday ) {
		$offset = -$direction * 7;
	}

	$offset += $direction * ($week * 7) + ($day - $weekday);
	return mktime( 0, 0, 0, $month, $startday + $offset, $year );
}