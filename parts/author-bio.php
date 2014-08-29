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
		
		<?php if (!is_author()) { ?>
			<a href="<?php echo the_author_meta('url'); ?>"><?php echo the_author_meta('url'); ?></a>
		<?php } ?>
		<p>
			<?php the_author_meta( 'description' ); ?>
		</p>
		<?php if (!is_author()) { ?>
			<p>
				<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
					<?php printf( __( 'View all posts by %s <i class="fa fa-chevron-right"></i>', 'cover' ), get_the_author() ); ?>
				</a>
			</p>
		<?php } ?>
		
		<ul class="social">
			
			<?php
				$fb = get_the_author_meta( 'facebook' );	// full facebook profile url
				$tw = get_the_author_meta( 'twitter' );		// twitter username
				$gp = get_the_author_meta( 'googleplus' );	// full g+ profile url
				$jb = get_the_author_meta( 'jabber' );
			?>
			
			<?php if ('' != $fb) { ?>
				<li><a href="<?php echo $fb; ?>" target="_blank"></i></a></li>
			<?php } ?>
			<?php if ('' != $tw) { ?>
				<li><a href="http://twitter.com/<?php echo $tw; ?>" target="_blank"></a></li>
			<?php } ?>
			<?php if ('' != $gp) { ?>
				<li><a href="<?php echo $gp; ?>" target="_blank"></a></li>
			<?php } ?>
			
		</ul>
	</div>
</div>