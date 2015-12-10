<?php
/**
 * The Search Sidebar
 *
 * @package Cover
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'cover-search' ) ) {
	return;
}
?>
<div class="widget-area" role="complementary">
  <?php dynamic_sidebar( 'cover-search' ); ?>
</div>
