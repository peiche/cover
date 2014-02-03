<?php
/**
 * @package Beats
 */
?>

<?php 
	if (is_single()) {
		get_template_part( 'cover', 'post' );
	} else if (is_page()) {
		get_template_part( 'cover', 'page' );
	} else if (is_author()) {
		get_template_part( 'cover', 'author' );
	} else if (is_category()) {
		get_template_part( 'cover', 'category' );
	}
?>