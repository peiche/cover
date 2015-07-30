var unslider;
var unsliderOptions = {
  delay: 0,
  dots: true,
  fluid: true
};

jQuery(document).ready(function() {

  /**
   * Slider for featured items on the homepage.
   **/

  // init unslider
  initUnslider();

  // prev/next buttons
  jQuery('.featured-arrow').bind('click', function() {
    var fn = this.className.split(' ')[1];

    // Either do unslider.data('unslider').next() or .prev() depending on the className
    unslider.data('unslider')[fn]();
  });

  if (jQuery('.featured-container li').length > 1) {
    jQuery('.featured-arrow').removeClass('hide');
  }

  /**
   * Similar to debounce. Instead of running x milliseconds,
   * this will only run after resizing has completed.
   * https://css-tricks.com/snippets/jquery/done-resizing-event/
   */
  var resizeTimer;
  jQuery(window).on('resize', function(e) {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      initUnslider();
    }, 250);
  });
});

function initUnslider() {
  unslider = jQuery('.featured-container').unslider(unsliderOptions);
}
