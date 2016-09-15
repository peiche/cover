var KEYCODE_ESCAPE = 27;

var header_headroom;

function closeOverlay() {
	jQuery('html').removeClass('noscroll');
	jQuery('.overlay.show').removeClass('show');
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
