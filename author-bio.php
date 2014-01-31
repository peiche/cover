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
		<a href="<?php echo the_author_url(); ?>"><?php echo the_author_url(); ?></a>
		<p>
			<?php the_author_meta( 'description' ); ?>
		</p>
		<p>
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
				<?php printf( __( 'View all posts by %s <i class="fa fa-chevron-right"></i>', 'beats' ), get_the_author() ); ?>
			</a>
		</p>
		<?php /*
		<ul class="social">
			<li><a href="http://twitter.com/" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
			<li><a href="http://facebook.com/" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
			<li><a href="http://github.com/" class="github" target="_blank"><i class="fa fa-github-alt"></i></a></li>
			<li><a href="http://astro.ecko.me/rss/" class="rss" target="_blank"><i class="fa fa-rss"></i></a></li>
			<li><a href="http://youtube.com/" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
			<li><a href="http://dribbble.com/" class="dribbble" target="_blank"><i class="fa fa-dribbble"></i></a></li>
			<li><a href="http://plus.google.com/" class="googleplus" target="_blank"><i class="fa fa-google-plus"></i></a></li>
			<li><a href="http://instagram.com/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
			<li><a href="http://linkedin.com/" class="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li> 
		</ul>
		*/ ?>
	</div>
</div>