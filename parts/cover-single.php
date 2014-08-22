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
    <?php if ('' != get_the_post_thumbnail()) { ?>
		<div class="background" style="background-image: url('<?php echo $img[0]; ?>');" data-0-top="background-position: 50% 0%;" data-top-bottom="background-position: 50% 100%;"></div>
	<?php } ?>
    <header>
        
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'cover' ) );
			if ( $categories_list && cover_categorized_blog() ) :
		?>
			<h2><?php echo $categories_list; ?></h2>
		<?php endif; ?>
		<h1><?php the_title(); ?></h1>
    </header>
</div>