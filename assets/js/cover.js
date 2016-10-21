var KEYCODE_ESCAPE = 27;

var VIDEO_ID = 'video-overlay-video';

var header_headroom;
var player;

var playButton = document.getElementById('video-overlay-play-button');
var $featured_video = document.querySelector('#video-overlay iframe');

if ($featured_video === null) {
  $featured_video = document.querySelector('#video-overlay video');
}

function closeOverlay() {
	jQuery('html').removeClass('noscroll');
	jQuery('.overlay.show').removeClass('show');

	// Stop playing embedded featured video, if it exists
	if (typeof player !== 'undefined') {
		// Youtube
		if (player.pauseVideo) {
			player.pauseVideo();
		}

		// Vimeo and <video> tag
		if (player.pause) {
			player.pause();
		}
	}
}

jQuery(document).ready(function() {

	/**
	 * This will handle any and all overlays,
	 * as long as the clicked item's data-action
	 * attribute is "toggle-overlay" and the
	 * data-overlay-id value matches the id
	 * of the container with the overlay class.
	 */

	jQuery('[data-action="toggle-overlay"]').click(function(e) {
		e.preventDefault();
		var overlay_id = jQuery(this).attr('data-overlay-id');

		if (jQuery('html').hasClass('noscroll')) {
			closeOverlay();
		} else {
			jQuery('html').addClass('noscroll');
			jQuery('#' + overlay_id).addClass('show');

			/**
			 * Focus the search if there is a search field.
			 * This will work for the pre-built search and widgets.
			 */
			jQuery('#' + overlay_id + ' .search-field').focus();
		}
	});

	/**
	 * Hitting the escape key will close an open overlay
	 */
	jQuery(document).keyup(function(e) {
		if (e.keyCode === KEYCODE_ESCAPE) {
			closeOverlay();
		}
	});

	/**
	 * Clicking on header acts as "back to top" link.
	 */
	jQuery('.header').click(function(e) {
		if (jQuery(e.target).closest('a').length === 0) {
			jQuery('html, body').animate({
				scrollTop: jQuery('html').offset().top
			});
    }
  });

	/**
   * Headroom.
   */
  header_headroom = new Headroom(jQuery('.header')[0]);
  header_headroom.init();
	header_headroom.onTop = function() {
		header_headroom.tolerance = Headroom.options.tolerance;
		header_headroom.pin();
	};

	// Control backdrop opacity on scroll.
	// http://codepen.io/michaeldoyle/details/Bhsif/
	var $cover = jQuery('.cover');
	var $backdrop = jQuery('.header .backdrop');
	var range = 200;

	if ($cover.length > 0 && $backdrop.lenth > 0) {
		jQuery(window).on('scroll', function () {
			var scrollTop = jQuery(this).scrollTop();
			var offset = $cover.offset().top;
			var height = $cover.outerHeight();
			offset = offset + height / 2;
			var calc = 0 + ( scrollTop - offset + range ) / range;

			$backdrop.css({ 'opacity': calc });

			if ( calc > '1' ) {
				$backdrop.css({ 'opacity': 1 });
			} else if ( calc < '0' ) {
				$backdrop.css({ 'opacity': 0 });
			}
		});
	}

  /**
	 * Menu logic.
	 */

	/**
	 * Find children by traversing up.
	 * Not all menus or heirarchy widgets' parents has a class indicating so.
	 */
	jQuery('.widget .sub-menu, .widget .children, .menu .children, .menu .sub-menu').addClass('hide').closest('li').addClass('menu-has-child').append('<div class="menu-toggle"><i class="fa fa-angle-down"></i></div>');

  // click event on submenu toggles
  jQuery('body').on('click', '.menu-toggle', function(e) {
		e.stopPropagation();
		var $this = jQuery(this);

		$this.children('.fa-angle-down').toggleClass('fa-rotate-180');
    $this.siblings('.sub-menu, .children').toggleClass('hide');
  });

	// General-use swipebox class
	jQuery('a.swipebox[href]:not([href*="#"])').click(function(e) {
		var $this = jQuery(this);

		// Aesop comes with the Swipebox plugin.
		// Let's use that, if we have it.
		if (jQuery.swipebox !== undefined) {
			e.preventDefault();

			jQuery.swipebox([
				{ href: $this.attr('href') }
			]);
		}

	});

	/**
	 * Performs a smooth page scroll to an anchor on the same page.
	 * Ignore overlay actions, ASE ids, and comment paging.
	 * https://css-tricks.com/snippets/jquery/smooth-scrolling/
	 */
	jQuery('a[href*="#"]:not([href="#"]):not([href*="#comments"]):not([data-action="toggle-overlay"]):not([id^="aesop"])').click(function() {
    if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {

				header_headroom.tolerance = Number.MAX_SAFE_INTEGER;
				header_headroom.unpin();

				jQuery('html,body').animate({
          scrollTop: target.offset().top
        }, 500);

				setTimeout(function() {
					header_headroom.tolerance = Headroom.options.tolerance;
				}, 1000);

				return false;
      }
    }
  });

	/**
	 * Aesop enhancements.
	 */

	// disable headroom while we're scrolling to a chapter point
	if (jQuery('.aesop-chapter-menu').length > 0) {
		jQuery(document).on('click', '.aesop-chapter-menu .scroll-nav__item a', function() {
			header_headroom.tolerance = Number.MAX_SAFE_INTEGER;
			header_headroom.unpin();
			setTimeout(function() {
				header_headroom.tolerance = Headroom.options.tolerance;
			}, 1000);
		});
	}

});

/**
 * Helper function to detect touch devices.
 * Much better solution than user agent detection,
 * which is a futile attempt at an arms race.
 */
function isTouchDevice() {
	return !!('ontouchstart' in window || navigator.msMaxTouchPoints);
}

if ($featured_video && $featured_video !== null) {
  $featured_video.id = VIDEO_ID;

  var sep = '?';
  if ($featured_video.src.indexOf('?') !== -1) {
    sep = '&';
  }

  if ($featured_video.src.indexOf('youtube.com') !== -1) {
    // Append the embed url with the api param
    $featured_video.src += sep + 'enablejsapi=1';

    /**
     * Inject YouTube API script
     */
    var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/player_api';
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  } else if ($featured_video.src.indexOf('vimeo.com') !== -1 && typeof Vimeo !== 'undefined') {
    // Append the embed url with the api param
    $featured_video.src += sep + 'api=1';

    /* jshint ignore:start */
    player = new Vimeo.Player($featured_video);
    /* jshint ignore:end */

    // Click listener for play button
    playButton.addEventListener('click', function() {
      /* jshint ignore:start */
      player.play();
      /* jshint ignore:end */
    });
  } else if ($featured_video.play) {
    // Click listener for play button
    playButton.addEventListener('click', function() {
      $featured_video.play();
    });
  }
}

/**
 * Function called once the Youtube API loads.
 * This is dependent on checking the "Enable JavaScript API"
 * checkbox in the plugin options (/wp-admin/options-media.php).
 */
function onYouTubePlayerAPIReady() {
  // Define player as Youtube player
  /* jshint ignore:start */
  player = new YT.Player(VIDEO_ID, {
    events: {
      'onReady': onPlayerReady
    }
  });
  /* jshint ignore:end */
}

/**
 * Function to be called once the player is ready
 */
function onPlayerReady(event) {
  // Get play button element
  var playButton = document.getElementById('video-overlay-play-button');

  // Click listener for play button
  playButton.addEventListener('click', function() {
    /* jshint ignore:start */
    player.playVideo();
    /* jshint ignore:end */
  });
}
