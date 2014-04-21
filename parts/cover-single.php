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
		<div class="background" style="background-image: url('<?php echo $img[0]; ?>');" <?php if ( !$half ) { ?> <?php // data-0-top="background-position: 50% 50%;" data-top-bottom="background-position: 50% 100%;" ?> <?php } ?> ></div>
		<header>
			<h2>
				<?php the_category(', ') ?>
				
				<? /*
				<span class="post-format pull-right">
					<?php get_template_part( 'parts/postformat' ); ?>
				</span>
				*/ ?>
			</h2>
			<h1><a href="#"><?php the_title(); ?></a></h1>
			<span>
				<?php cover_posted_on(); ?>
			</span>
		</header>
		<?php if ( !$half ) { ?>
			<i class="fa fa-angle-down"></i>
		<?php } ?>
	</div>
<?php } ?>