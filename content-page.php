<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Cover
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ('' == get_the_post_thumbnail()) { ?>
		<header class="entry-header">
			<?php if ($post->post_parent) { ?>
				<?php
					$parent_permalink = get_permalink($post->post_parent);
					$parent_title = get_the_title($post->post_parent);
				?>
				<h2><a href="<?php echo $parent_permalink; ?>"><?php echo $parent_title; ?></a></h2>
			<?php } ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header><!-- .entry-header -->
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cover' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php edit_post_link( __( '<i class="fa fa-pencil"></i> Edit', 'cover' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
