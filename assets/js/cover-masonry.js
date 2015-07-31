jQuery(document).ready(function() {

  /**
   * Masonry grid for items in blog or archive view.
   **/

  var $grid = jQuery('.site-main .grid');
  $grid.masonry({
    itemSelector: '.hentry',
    columnWidth: '.hentry',
    percentPosition: true
  });

  var infinite_count = 0;
  jQuery( document.body ).on('post-load', function () {
    var $elements = jQuery('.infinite-wrap').find('.hentry');
    $grid.append($elements).masonry('appended', $elements);
  });
});
