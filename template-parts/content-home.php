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
							<p>' . wp_trim_words($recent["post_content"], 30) . '</p>
							<br>
							<a href="' . get_permalink($recent["ID"]) . '">Read More <i class="fas fa-arrow-right"></i></a>
							</div>';
			}
			wp_reset_query();
		?>
	</div>

	</div><!-- .entry-content -->


	<div class="full-width-image"><!-- full-width image -->
			<div class="image-overlay"></div>
			<?php
				$image = get_field('full-width_image');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)
				if( $image ) {
					echo wp_get_attachment_image( $image, $size );
				}
			?>
	</div>

<div class="features-wrapper">
	<h2><?php the_field('building_features_heading'); ?></h2>

	<?php if( have_rows('building_features') ):

		while( have_rows('building_features') ): the_row();

			// vars
			$icon = get_sub_field('bedroom_icon');
			$description = get_sub_field('bedroom_description');

			$icon2 = get_sub_field('studio_icon');
			$description2 = get_sub_field('studio_description');

			$icon3 = get_sub_field('one-bedroom_icon');
			$description3 = get_sub_field('one-bedroom_description');

			$icon4 = get_sub_field('two-bedroom_icon');
			$description4 = get_sub_field('two-bedroom_description');

			$icon5 = get_sub_field('three-bedroom_icon');
			$description5 = get_sub_field('three-bedroom_description');

			$icon6 = get_sub_field('suites_total_icon');
			$description6 = get_sub_field('suites_total_description');

			$icon7 = get_sub_field('storage_lockers_icon');
			$description7 = get_sub_field('storage_lockers_description');

			$icon8 = get_sub_field('bike_storage_icon');
			$description8 = get_sub_field('bike_storage_description');

			$icon9 = get_sub_field('underground_parking_icon');
			$description9 = get_sub_field('underground_parking_Description');

			?>
			<div class="row1">
					<div class="features">
						<img src="<?php echo $icon; ?>" width="80px" />
						<div class="content">
							<p><?php echo $description; ?></p>
						</div>
					</div>

					<div class="features">
						<div class="content">
							<p class="number"><?php echo $icon2; ?></p>
							<p><?php echo $description2; ?></p>
						</div>
					</div>

					<div class="features">
						<div class="content">
							<p class="number"><?php echo $icon3; ?></p>
							<p><?php echo $description3; ?></p>
						</div>
					</div>

					<div class="features">
						<div class="content">
							<p class="number"><?php echo $icon4; ?></p>
							<p><?php echo $description4; ?></p>
						</div>
					</div>

					<div class="features">
						<p class="number"><?php echo $icon5; ?></p>
						<div class="content">
							<p><?php echo $description5; ?></p>
						</div>
					</div>
			</div>

			<div class="row2">
					<div class="features">
						<img src="<?php echo $icon6; ?>" width="80px" />
						<div class="content">
							<p><?php echo $description6; ?></p>
						</div>
					</div>

					<div class="features">
						<img src="<?php echo $icon7; ?>" width="80px" />
						<div class="content">
							<p><?php echo $description7; ?></p>
						</div>
					</div>

					<div class="features">
						<img src="<?php echo $icon8; ?>" width="80px" />
						<div class="content">
							<p><?php echo $description8; ?></p>
						</div>
					</div>

					<div class="features">
						<img src="<?php echo $icon9; ?>" width="80px" />
						<div class="content">
							<p><?php echo $description9; ?></p>
						</div>
					</div>
			</div>

		<?php endwhile; ?>
	<?php endif; ?>
</div>

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
