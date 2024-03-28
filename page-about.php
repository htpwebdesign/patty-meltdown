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

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'About', 'patty-meltdown' ); ?></h1>
	</header><!-- .page-header -->

	<?php
	while (have_posts()) :
		the_post();	
	?>

		<section class="about-founders">
			<?php
			if (function_exists('get_field')) {
				$founders_image_id = get_field('founders_image');
				if ($founders_image_id) {
					echo wp_get_attachment_image($founders_image_id, 'full'); // 'full' is the image size
				}
				if (get_field('founders_text')) {
					the_field('founders_text');
				}
			}
			?>
		</section>


		
		<section class="about-company-values">
			<?php
			if (function_exists('get_field')) {
				if ($company_values_heading = get_field('company_values_heading')) {
					echo '<h2>' .$company_values_heading.'</h2>';
				}
				if ($company_values = get_field('company_values')) {
					echo $company_values;
				}
			}
			?>
		</section>


		<nav class="about-cta-menu">

			<?php
			if (function_exists('get_field')) {
				if (get_field('cta_text') && get_field('cta_link')) {
					echo '<a class="button primary" href="' . esc_url(get_field('cta_link')) . '">' . get_field('cta_text') . '</a>';
				}
			}
			if (function_exists('get_field')) {
				if (get_field('cta_giftcard') && get_field('cta_giftcard_link')) {
					echo '<a class="button secondary" href="' . esc_url(get_field('cta_giftcard_link')) . '">' . get_field('cta_giftcard') . '</a>';
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
