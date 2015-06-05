<?php
/**
 * The Footer Sidebar
 *
 * @package Cover
 * @since 1.0.0
 */

if ( ! is_active_sidebar( 'cover-overlay' ) ) {
	return;
}
?>
    <div class="widget-area" role="complementary">
        <?php dynamic_sidebar( 'cover-overlay' ); ?>
    </div>
