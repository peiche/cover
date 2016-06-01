jQuery(document).ready(function() {

  /**
   * Slider for featured items on the homepage.
   */

  // init unslider
  var unslider = jQuery('.featured-container').unslider({
		infinite: true,
		autoplay: false,
    animateHeight: true,
    arrows: {
      prev: '<a class="featured-arrow prev"><i class="fa fa-angle-left"></i></a>',
      next: '<a class="featured-arrow next"><i class="fa fa-angle-right"></i></a>'
    }
	});

});
