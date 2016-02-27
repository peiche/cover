<?php
/**
 * The template used for displaying post listings
 *
 * @package Cover
 */

?>

<?php if ( have_posts() ) : ?>

	<?php
	$list_style = esc_attr( get_theme_mod( 'cover_list_style', 'minimal' ) );
	$number_of_columns = esc_attr( get_theme_mod( 'cover_number_of_columns', 1 ) );
	?>

	<div id="posts" class="<?php echo $list_style; ?> <?php if ( 'grid' == $list_style && $number_of_columns > 1 ) { echo 'card-' . $number_of_columns; } ?>">
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'summary' ); ?>

		<?php endwhile; ?>
	</div>

	<?php the_posts_navigation(); ?>

<?php else : ?>

	<?php get_template_part( 'template-parts/content', 'none' ); ?>

<?php endif; ?>
