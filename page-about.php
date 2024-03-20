<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Patty_Meltdown
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();

		// get_template_part( 'template-parts/content', 'page' );			

	?>

		<section class="about-founders">
			<?php
			if (function_exists('get_field')) {
				$founders_image_id = get_field('founders_image');
				if ($founders_image_id) {
					echo wp_get_attachment_image($founders_image_id, 'full'); // 'full' is the image size
				}
			}
			?>

			<?php
			if (function_exists('get_field')) {
				if (get_field('founders_text')) {
					the_field('founders_text');
				}
			}
			?>
		</section>


		<!-- need to make titles dynamic -->
		<section class="about-company-values">
			<h2>Our mission</h2>

			<?php
			if (function_exists('get_field')) {
				if (get_field('company_values')) {
					the_field('company_values');
				}
			}
			?>
		</section>


		<nav class="about-cta-menu">

			<?php
			if (function_exists('get_field')) {
				if (get_field('cta_text') && get_field('cta_link')) {
					echo '<a href="' . esc_url(get_field('cta_link')) . '">' . get_field('cta_text') . '</a>';
				}
			}
			if (function_exists('get_field')) {
				if (get_field('cta_giftcard') && get_field('cta_giftcard_link')) {
					echo '<a href="' . esc_url(get_field('cta_giftcard_link')) . '">' . get_field('cta_giftcard') . '</a>';
				}
			}


			get_template_part("template-parts/testimonial-randomizer");

			?>
		</nav>

	<?php
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
