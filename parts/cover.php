<?php
/**
 * @package Cover
 */
?>

<?php 
	if (is_home()) {
		get_template_part( 'parts/cover', 'home' );
	} else if (is_single()) {
		get_template_part( 'parts/cover', 'post' );
	} else if (is_page()) {
		get_template_part( 'parts/cover', 'page' );
	} else if (is_author()) {
		get_template_part( 'parts/cover', 'author' );
	} else if (is_category()) {
		get_template_part( 'parts/cover', 'category' );
	}
?>