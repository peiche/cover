<?php
/**
 * @package Cover
 */
?>

<?php
    $class = '';

    if ( '' != get_the_post_thumbnail() ) {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        $height = $img[2];
		
		$class = 'featured-image';
		
        if ( $height <= 300 ) {
            $class = $class . ' auto';
        } else if ( $height <= 600 ) {
            $class = $class . ' half';
        }
    }
?>

<div class="cover <?php echo $class; ?>">
	<?php if ( '' != get_the_post_thumbnail() ) { ?>
		<div class="background" style="background-image: url('<?php echo $img[0]; ?>');" data-0-top="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;"></div>
	<?php } ?>
	<header class="cover-header">
		<?php if (is_page() && $post->post_parent) { ?>
			<?php
				$parent_permalink = get_permalink($post->post_parent);
				$parent_title = get_the_title($post->post_parent);
			?>
			<h2><a href="<?php echo $parent_permalink; ?>"><i class="fa fa-angle-left"></i> <?php echo $parent_title; ?></a></h2>
		<?php } ?>
		<h1><?php the_title(); ?></h1>
	</header>
</div>