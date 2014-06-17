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

        $class = '';
        if ( $height <= 300 ) {
            $class = 'auto';
        } else if ($height <= 600) {
            $class = 'half';
        }
	?>
	
	<div class="cover featured-image <?php echo $class; ?>">
		<div class="background" style="background-image: url('<?php echo $img[0]; ?>');"></div>
		<header>
			<h1><?php the_title(); ?></h1>
			<span>
				<?php cover_posted_on(); ?>
			</span>
		</header>
        <?php if ( $class == '' ) { ?>
		  <i class="fa fa-angle-down"></i>
        <?php } ?>
	</div>
<?php } ?>