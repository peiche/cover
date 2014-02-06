<?php
/**
 * The template for displaying Author bios
 *
 * @package Beats
 */
?>

<div class="postprofile">
	
	<?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
	
	<div class="info">
		<h4><?php echo get_the_author(); ?></h4>
		<a href="<?php echo the_author_meta('url'); ?>"><?php echo the_author_meta('url'); ?></a>
		<p>
			<?php the_author_meta( 'description' ); ?>
		</p>
		<p>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <i class="fa fa-chevron-right"></i>', 'beats' ), get_the_author() ); ?>
			</a>
		</p>
		
		<ul class="social">
			
			<?php
				$fb = get_the_author_meta( 'facebook' );	// full facebook profile url
				$tw = get_the_author_meta( 'twitter' );		// twitter username
				$gp = get_the_author_meta( 'googleplus' );	// full g+ profile url
				$jb = get_the_author_meta( 'jabber' );
			?>
			
			<?php if ('' != $fb) { ?>
				<li><a href="<?php echo $fb; ?>" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<?php } ?>
			<?php if ('' != $tw) { ?>
				<li><a href="http://twitter.com/<?php echo $tw; ?>" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<?php } ?>
			<?php if ('' != $gp) { ?>
				<li><a href="<?php echo $gp; ?>" class="google-plus" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			<?php } ?>
			
		</ul>
	</div>
</div>