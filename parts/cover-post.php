<?php
/**
 * @package Cover
 */
?>

<?php

    $header_outside_cover = true;
    $class = '';

    if ( '' != get_the_post_thumbnail() ) {
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        $width = $img[1];
        $height = $img[2];
		
		$class = 'featured-image';
        $header_outside_cover = false;
		
        if ( $height <= 300 ) {
            $class = $class . ' auto';
        } else if ( $height <= 600 ) {
            $class = $class . ' half';
            $header_outside_cover = true;
        }
    }

?>

<?php if ( '' != get_the_post_thumbnail() ) { ?>
    <div class="cover <?php echo $class; ?>">
        <div class="background" style="background-image: url('<?php echo $img[0]; ?>');" data-0-top="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;"></div>
        <?php if ( !$header_outside_cover ) { ?>
            <?php get_template_part( 'parts/cover', 'header' ); ?>
        <?php } ?>
    </div>

    <?php if ( $header_outside_cover ) { ?>
        <?php get_template_part( 'parts/cover', 'header' ); ?>
    <?php } ?>
<?php } ?>
