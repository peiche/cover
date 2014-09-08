<?php
/**
 * @package Cover
 */
?>

<?php $count = 0; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php if ($count == 0) { ?>

		<div class="cover featured-image auto">
			<?php
                if ('' != get_the_post_thumbnail()) {
				    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
			     }
            ?>
			<div class="background<?php if ('' != get_the_post_thumbnail()) { ?><?php // darken ?>" style="background-image: url('<?php echo $image[0]; ?>');<?php } ?>" data-0-top="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;"></div>
			<header class="cover-header">
                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<!--<div class="taxonomy-description"><p><?php bloginfo( 'description' ); ?></p></div>-->
			</header>
		</div>

	<?php } else { ?>
        <!-- break out of loop, reset loop -->
    <?php } ?>
	<?php $count++; ?>
<?php endwhile; ?><!-- end of loop -->
