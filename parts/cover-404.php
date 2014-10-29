<?php
/**
 * @package Cover
 */
?>

<div class="cover featured-image auto">
	<div class="background<?php if ( '' != $image ) { ?> darken" style="background-image: url('<?php echo $image[0]; ?>');<?php } ?>" data-0-top="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;"></div>
	<header class="cover-header">
		<h1 class="cover-title">404</h1>
		<p class="align-center">It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
		<?php get_search_form(); ?>
	</header>
</div>
