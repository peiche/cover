<?php
/**
 * The Footer Sidebar
 *
 * @package Cover
 * @since 1.0.0
 */
if ( ! is_active_sidebar( 'cover-footer' ) ) {
	return;
}
?>
    <div class="widget-area widget-column" role="complementary">
		<?php dynamic_sidebar( 'cover-footer' ); ?>
	</div>