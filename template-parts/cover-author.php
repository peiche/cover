<?php
/**
 * Author include, used on author page and at the bottom of single posts
 *
 * @package Cover
 */

?>

<?php $img = cover_get_first_featured_image(); ?>

<div class="cover">
	<div class="cover-background<?php if ( '' != $img ) { ?> darken" style="background-image: url('<?php echo $img; ?>');<?php } ?>"></div>
	<header class="cover-header">
		<?php get_template_part( 'template-parts/author-bio' ); ?>
	</header>
</div>
