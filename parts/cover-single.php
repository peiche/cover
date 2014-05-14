<?php
/**
 * @package Cover
 */
?>

<?php if ('' != get_the_post_thumbnail()) { ?>
	
	<?php
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	?>
	
	<div class="cover featured-image">
		<div class="background" style="background-image: url('<?php echo $img[0]; ?>');"></div>
		<header>
			<h1><?php the_title(); ?></h1>
			<span>
				<?php cover_posted_on(); ?>
			</span>
		</header>
		<i class="fa fa-angle-down"></i>
	</div>
<?php } ?>