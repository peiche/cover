<?php
/**
 * The template for displaying Author bios
 *
 * Called from parts/cover-author and content-single
 *
 * @package Cover
 */
?>

<div class="postprofile">
	
	<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
	
	<div class="info">
		<?php if (is_author()) { ?>
			<h2><?php echo get_the_author(); ?></h2>
		<?php } else { ?>
			<h4><?php echo get_the_author(); ?></h4>
		<?php } ?>
		
		<p>
			<?php the_author_meta( 'description' ); ?>
		</p>
		<?php if (!is_author()) { ?>
			<p>
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php printf( __( 'View all posts by %s', 'cover' ), get_the_author() ); ?>
				</a>
			</p>
		<?php } ?>
	</div>
</div>