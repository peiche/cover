     <?php
/**
 * The template for displaying Author bios
 *
 * Called from parts/cover-author and content-single
 *
 * @package Cover
 */
?>

<div class="profile">
	<div class="avatar-container">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), ( is_author() ? 120 : 80 ) ); ?>
	</div>
	
	<?php if (is_author()) { ?>
		<h1 class="cover-title"><?php echo get_the_author(); ?></h1>
		<p>
			<?php the_author_meta( 'description' ); ?>
		</p>
	<?php } else { ?>
		<h4><a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></h4>
	<?php } ?>
	
	<div class="profile-social">
			
		<?php
			$fb = get_the_author_meta( 'facebook' );	// full facebook profile url
			$tw = get_the_author_meta( 'twitter' );		// twitter username
			$gp = get_the_author_meta( 'googleplus' );	// full g+ profile url
			$jb = get_the_author_meta( 'jabber' );
		?>

		<?php if ('' != $fb) { ?>
			<a href="<?php echo $fb; ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-stack-1x social-icon fa-facebook"></i>
				</span>
			</a>
		<?php } ?>
		<?php if ('' != $tw) { ?>
			<a href="http://twitter.com/<?php echo $tw; ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-stack-1x social-icon fa-twitter"></i>
				</span>
			</a>
		<?php } ?>
		<?php if ('' != $gp) { ?>
			<a href="<?php echo $gp; ?>" target="_blank">
				<span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-stack-1x social-icon fa-google-plus"></i>
				</span>
			</a>
		<?php } ?>
		
	</div>
</div>