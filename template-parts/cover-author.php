<?php
/**
 * Author include, used on author page and at the bottom of single posts
 *
 * @package Cover
 */

?>

<?php
	$count = 0;
	$img = '';
	while ( have_posts() ) : the_post();
		if ( 0 == $count && '' != get_the_post_thumbnail() ) {
			$img_arr = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
      $img = $img_arr[0];
		}
		$count++;
	endwhile;
?>

<div class="cover">
	<div class="cover-background<?php if ( '' != $img ) { ?> darken" style="background-image: url('<?php echo $img; ?>');<?php } ?>"></div>
	<header class="cover-header">
		<?php get_template_part( 'template-parts/author-bio' ); ?>
	</header>
</div>
