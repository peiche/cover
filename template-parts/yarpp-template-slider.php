<?php
/**
 * YARPP Template: Cover Slider
 *
 * Description: Related posts slider built for the Cover theme.
 * @link https://wordpress.org/themes/cover/
 * Author: Paul Eiche
 */
?>

<?php if ( have_posts() ) : ?>
<div class="yarpp-container">
	<div class="slider-container">
		<ul class="slider-list">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php $img = cover_get_featured_image( get_the_ID() ); ?>

				<li class="slider-list-item">
					<a href="<?php the_permalink(); ?>" rel="bookmark">
						<div class="cover<?php if ( '' != $img ) { ?> featured-image<?php } ?>">
							<div class="cover-background"<?php if ( '' != $img ) { ?> style="background-image: url('<?php echo $img; ?>');"<?php } ?>></div>
							<header class="cover-header">
								<h2 class="cover-subtitle">Related</h2>
								<h1 class="cover-title"><?php the_title(); ?></h1>
							</header>
						</div>
					</a>
				</li>

			<?php endwhile; ?>

		</ul>
	</div>
</div>
<?php endif; ?>
