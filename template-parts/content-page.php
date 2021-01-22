<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package womazing
 */

?>

<article class="container " id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="basket-page">
	<?php womazing_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'womazing' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</div>
</article><!-- #post-<?php the_ID(); ?> -->
