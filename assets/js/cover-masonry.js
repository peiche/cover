jQuery(document).ready(function() {

  /**
   * Masonry grid for items in blog or archive view.
   **/

  // init
  var $container = jQuery('.site-main .grid');
  $container.masonry({
    itemSelector: '.hentry', // set itemSelector so .grid-sizer is not used in layout
    columnWidth: '.hentry', // use element for option
    percentPosition: true
  });

  var infinite_count = 0;
  jQuery( document.body ).on( 'post-load', function () {
    infinite_count = infinite_count + 1;

    var $selector = jQuery('#infinite-view-' + infinite_count);
    var $elements = $selector.find('.hentry');
    //$elements.hide();

    // ??
    $container.append($elements).masonry('appended', $elements);
    //$selector.hide();
    //$elements.fadeIn();

    //$container.trigger('masonry-items-added');
  });

});
