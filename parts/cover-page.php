<?php
/**
 * @package Cover
 */
?>

<?php if ('' != get_the_post_thumbnail()) { ?>
	
	<?php
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$width = $img[1]; // unused
		$height = $img[2];
		
		$half = false;
		if ($height <= 600) {
			$half = true;
		}
	?>
	
	<div class="cover featured-image <?php if ( $half ) { echo 'half'; } ?>">
		<div class="background" style="background-image: url('<?php echo $img[0]; ?>');"></div>
		<header>
			<?php if (is_page() && $post->post_parent) { ?>
				<?php
					$parent_permalink = get_permalink($post->post_parent);
					$parent_title = get_the_title($post->post_parent);
				?>
				<h2><a href="<?php echo $parent_permalink; ?>"><?php echo $parent_title; ?></a></h2>
			<?php } ?>
			<h1><a href="#"><?php the_title(); ?></a></h1>
		</header>
		<i class="fa fa-angle-down"></i>
	</div>
<?php } ?>