jQuery(document).ready(function() {

  /**
   * Slider for featured items on the homepage.
   **/

  // init unslider
  var unslider = jQuery('.featured-container').unslider({
    speed: 500,
    delay: 3000,
    complete: function() {},
    keys: true,
    dots: true, // ehhh
    fluid: true
  });

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
