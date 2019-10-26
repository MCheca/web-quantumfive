jQuery(function( $ ) {
	'use strict';

	var $window = $(window);

	/* -----------------------------------------
	First letter content styling
	----------------------------------------- */
	(function () {
		var $entries = $('.entry');
		var $content = $('.entry-content');
		var lineHeight;

		if (!$content.length) {
			return;
		}

		lineHeight = window.getComputedStyle($content.get(0), null).getPropertyValue('line-height');

		$entries.each(function () {
			var $this = $(this);
			var $p0 = $this.find('.entry-content').find('p:first-of-type').first();

			// Only apply stylized first letter if the first
			// paragraph spans 4 lines or more.
			if (!$p0.length || $p0.height() < 4 * parseInt(lineHeight, 10)) {
				return;
			}

			var $letter = $('<span />', {
				class: 'letter-stylized',
				text: $p0.text().charAt(0).toUpperCase(),
			});
			$p0.prepend($letter);
		});
	})();

	/* -----------------------------------------
	Sticky Header
	----------------------------------------- */
	if ($window.width() > 991) {
		$('.header-sticky').stick_in_parent({
			offset_top: -1
		});
	}

	$window.on('load', function() {
		/* -----------------------------------------
		 Video Backgrounds
		 ----------------------------------------- */
		var $videoWrap = $('.ci-video-wrap');
		var $videoBg = $('.ci-video-background');

		// YouTube videos
		function onYouTubeAPIReady() {
			if (typeof YT === 'undefined' || typeof YT.Player === 'undefined') {
				return setTimeout(onYouTubeAPIReady, 333);
			}

			var ytPlayer = new YT.Player('youtube-vid', {
				videoId: $videoBg.data('video-id'),
				playerVars: {
					autoplay: 1,
					controls: 0,
					showinfo: 0,
					modestbranding: 1,
					loop: 1,
					playlist: $videoBg.data('video-id'),
					fs: 0,
					cc_load_policy: 0,
					iv_load_policy: 3,
					autohide: 0
				},
				events: {
					onReady: function (event) {
						event.target.mute();
					},
					onStateChange: function (event) {
						if (YT.PlayerState.PLAYING) {
							$videoWrap.addClass('visible');
						}
					}
				}
			});
		}

		function onVimeoAPIReady() {
			if (typeof Vimeo === 'undefined' || typeof Vimeo.Player === 'undefined') {
				return setTimeout(onVimeoAPIReady, 333);
			}

			var player = new Vimeo.Player($videoBg, {
				id: $videoBg.data('video-id'),
				loop: true,
				autoplay: true,
				byline: false,
				title: false,
			});

			player.setVolume(0);

			// Cuepoints seem to be the best way to determine
			// if the video is actually playing or not
			player.addCuePoint(.1).catch(function () {
				$videoWrap.addClass('visible');
			});

			player.on('cuepoint', function () {
				$videoWrap.addClass('visible');
			});
		}

		var videoType = $videoBg.data('video-type');

		if ($videoBg.length && window.innerWidth > 1080) {
			var tag = document.createElement('script');
			var firstScript = $('script');

			if (videoType === 'youtube') {
				tag.src = 'https://www.youtube.com/player_api';
				firstScript.parent().prepend(tag);
				onYouTubeAPIReady();
			} else if (videoType === 'vimeo') {
				tag.src = 'https://player.vimeo.com/api/player.js';
				firstScript.parent().prepend(tag);
				onVimeoAPIReady();
			}
		}
	});
});
