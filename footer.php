<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 26west
 */

?>
	<div id="#contact">
	</div><!-- #content -->
	<footer id="colophon" class="site-footer">
		<div class="col-1 contact">
			<?php echo do_shortcode('[ninja_form id=1]'); ?>
		</div>
		<div class="col-2">
			<div class="logo">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"></a></>
				<?php endif; ?>
			</div>
			<div class="site-info">
				<p class="footer-links"><a href="/privacy-policy/">Privacy policy</a>&nbsp; | &nbsp;<a href="/credits/">Site credits</a></p>
				<p class="copy">&copy; <?php echo date('Y'); ?> Pezzente Holdings Inc.</p>
			</div><!-- .site-info -->
		</div><!-- .col-2 -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
