var ajax_url = './wp-admin/admin-ajax.php';

jQuery(document).ready(function() {

	/**
	 * This will handle any and all overlays,
	 * as long as the clicked item's data-action
	 * attribute is "toggle-overlay" and the
	 * data-overlay-id value matches the id
	 * of the container with the overlay class.
	 **/
	jQuery('[data-action="toggle-overlay"]').click(function(e) {
		e.preventDefault();
		var overlay_id = jQuery(this).attr('data-overlay-id');

		if (jQuery('html').hasClass('noscroll')) {
			jQuery('html').removeClass('noscroll');
			jQuery('.overlay.show').removeClass('show');

      setTimeout(function() {
				jQuery('.overlay').scrollTop(0);
			}, 200);
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
	 **/
	jQuery(document).keyup(function(e) {
		if (e.keyCode === 27) {
			jQuery('html.noscroll').removeClass('noscroll');
			jQuery('.overlay.show').removeClass('show');
		}
	});

	/**
	 * Clicking on header acts as "back to top" link.
	 **/
	jQuery('.header').click(function(e) {
		if (jQuery(e.target).closest('a').length === 0) {
			jQuery('html, body').animate({
				scrollTop: jQuery('html').offset().top
			});
    }
  });

  /**
   * Headroom.
   **/
  var header_headroom = new Headroom(jQuery('.header')[0]);
  header_headroom.init();

	/**
	 * Skrollr.
	 * Don't load if the user agent is a touch device.
	 **/
  if (!isTouchDevice() && jQuery('.cover').length > 0) {
    skrollr.init({
      forceHeight: false
    });
	}

  /**
	 * Menu logic.
	 **/

	// Add dropdown buttons to menus with children.
  jQuery('.menu .menu-item-has-children').append('<div class="sub-menu-toggle"><i class="fa fa-angle-down"></i></div>');

  // hide submenus
  jQuery('.menu .menu-item-has-children .sub-menu').addClass('hide');

  // click event on submenu toggles
  jQuery('.menu .menu-item-has-children').on('click', '.sub-menu-toggle', function(e) {
		e.stopPropagation();
		var $this = jQuery(this);

		$this.children('.fa-angle-down').toggleClass('fa-rotate-180');
    $this.siblings('.sub-menu').toggleClass('hide');
  });
	
});

/**
 * Helper function to detect touch devices.
 * Much better solution than user agent detection,
 * which is a futile attempt at an arms race.
 */
function isTouchDevice() {
	return !!('ontouchstart' in window || navigator.msMaxTouchPoints);
}
