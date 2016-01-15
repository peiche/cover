jQuery(document).ready(function() {

  /**
   * Slider for featured items on the homepage.
   */

  // init unslider
  var unslider = jQuery('.featured-container').unslider({
		fluid: true,
		dots: true,
		autoplay: false
	});

  /**
   * We need to make sure the slides' width is a percentage,
   * not a pixel value. Supposedly setting 'fluid: true' does this,
   * but we're going to fix it here. Otherwise, we have to reset
   * the slider on resize, and that's a slippery slope.
   */
  var $slides = jQuery('.featured-container li:not(.dot)'); // ignore the dots, which unslider has already created
  var slide_num = $slides.length;
  $slides.width((100 / slide_num) + '%');

  // prev/next buttons
  jQuery('.featured-arrow').bind('click', function() {
    var fn = this.className.split(' ')[1];

    // Either do unslider.data('unslider').next() or .prev() depending on the className
    unslider.data('unslider')[fn]();
  });

  if (jQuery('.featured-container li').length > 1) {
    jQuery('.featured-arrow').removeClass('hide');
  }
});
