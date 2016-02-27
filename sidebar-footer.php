<?php
/**
 * The Footer Sidebar
 *
 * @package Cover
 * @since 1.7.0
 */

if ( ! is_active_sidebar( 'cover-footer' ) ) {
	return;
}
?>
<div class="widget-area" role="complementary">
  <?php dynamic_sidebar( 'cover-footer' ); ?>
</div>
