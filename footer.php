<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Patty_Meltdown
 */

?>

<footer id="colophon" class="site-footer full-bleed">
	<div class="site-info">
		<nav class="footer-left">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-left',
				)
			);
			?>
		</nav>

		<nav class="footer-right">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-right',
				)
			);
			?>
		</nav>

	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>