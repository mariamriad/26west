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
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php twentysixwest_post_thumbnail(); ?>

	<div class="hero-wrapper">

		<div>
				<div class="hero-overlay"></div>
				<?php
					$image = get_field('hero');
					$size = 'full'; // (thumbnail, medium, large, full or custom size)
					if( $image ) {
						echo wp_get_attachment_image( $image, $size );
					}
				?>
		</div>

		<div class="hero-text">
					<p class="hero-address"><?php the_field('hero_address'); ?></p>
					<h1 class="hero-heading"><?php the_field('hero_heading'); ?></h1>
					<?php
					$link = get_field('hero_cta');
					if( $link ): ?>
						<a class="hero-cta" href="<?php echo $link; ?>">See our latest notices <i class="fas fa-arrow-right"></i></a>
					<?php endif; ?>
		</div>
	</div><!-- .hero-wrapper -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'twentysixwest' ),
			'after'  => '</div>',
		) );
		?>

		<h2>The latest updates <br>on <strong>26WEST.</strong></h2>
		<div class="notice-wrapper">
		<?php
			$args = array( 'numberposts' => '3' );
			$recent_posts = wp_get_recent_posts( $args );
			foreach( $recent_posts as $recent ){
				echo '<div class="notices">
							<h4>' . $recent["post_title"] . '</h4>
							<p>' .  get_the_date('F j, Y', $recent["ID"]) . '</p>
							<p>' . wp_trim_excerpt($recent["post_content"]) . '</p>
							<br>
							<a href="' . get_permalink($recent["ID"]) . '">Read More <i class="fas fa-arrow-right"></i></a>
							</div>';
			}
			wp_reset_query();
		?>
	</div>
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
