<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 26west
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php twentysixwest_post_thumbnail(); ?>

	<div class="home-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'twentysixwest' ),
			'after'  => '</div>',
		) );
		?>

		<div class="custom-padding"></div>
		<h2>The latest updates <br>on <strong>26WEST.</strong></h2>
		<div class="notice-wrapper">
		<?php
			$args = array( 'numberposts' => '3' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				echo '<div class="notices">
							<h4>' . $recent["post_title"] . '</h4>
							<p>' .  get_the_date('F j, Y', $recent["ID"]) . '</p>
							<p>' . wp_trim_words($recent["post_content"], 30) . '</p>
							<br>
							<a href="' . get_permalink($recent["ID"]) . '">Read More <i class="fas fa-arrow-right"></i></a>
							</div>';
			}
			wp_reset_query();
		?>
		</div>


		<div id="container">
			<div id="content" role="main">



				<h2>Past notices.</h2>
				<br>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
			<br>
			<br>
			</div><!-- #content -->
		</div><!-- #container -->


	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'twentysixwest' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
