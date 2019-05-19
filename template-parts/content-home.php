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
			<div class="features-flex">

							<div class="features">
								<img src="<?php echo $icon; ?>" width="70px" />
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

						<div class="features">
							<img src="<?php echo $icon6; ?>" width="70px" />
							<div class="content">
								<p><?php echo $description6; ?></p>
							</div>
						</div>

						<div class="features">
							<img src="<?php echo $icon7; ?>" width="65px" />
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
						<img src="<?php echo $icon9; ?>" width="70px" />
						<div class="content">
							<p><?php echo $description9; ?></p>
						</div>
					</div>

			</div><!-- .features-flex -->

		<?php endwhile; ?>
	<?php endif; ?>
</div>

<div class="map-section">
		<?php if( have_rows('map_section') ):

		while( have_rows('map_section') ): the_row();

			// vars
			$mapheading = get_sub_field('map_heading');
			$mapsubheading = get_sub_field('map_subheading');

			?>
			<div>
				<h2><?php echo $mapheading; ?></h2>
				<p><?php echo $mapsubheading; ?></p>
			</div>

		<?php endwhile; ?>

	<?php endif; ?>
</div>

<div class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2599.991449345273!2d-123.07458528449531!3d49.333380679336926!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54867022aebb8be9%3A0xfa02dc9f1d3cdae3!2s2601+Lonsdale+Ave%2C+North+Vancouver%2C+BC+V7N+3H7!5e0!3m2!1sen!2sca!4v1558290780550!5m2!1sen!2sca" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

<div class="partners">
		<?php if( have_rows('partners') ):

		while( have_rows('partners') ): the_row();

			// vars
			$partnersheading = get_sub_field('partners_heading');
			$partnerssubheading = get_sub_field('partners_subheading');
			$partnerslist = get_sub_field('partners_list');

			?>
			<div class="partners-heading">
				<h2><?php echo $partnersheading; ?></h2>
				<p><?php echo $partnerssubheading; ?></p>
			</div>

			<div class="partners-list">
				<p><?php echo $partnerslist; ?></p>
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
