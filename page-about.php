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
		while ( have_posts() ) :
			the_post();

			// get_template_part( 'template-parts/content', 'page' );			

		?>

		<section class="about-intro">
		<?php
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'founders_text' ) ) {
					the_field( 'founders_text' );
				}
			}
		?>
		</section>

		<section class="founders-image">
		<?php
			if ( function_exists( 'get_field' ) ) {
			$founders_image_id = get_field( 'founders_image' );
			if ( $founders_image_id ) {
				echo wp_get_attachment_image( $founders_image_id, 'full' ); // 'full' is the image size
				}
			}
		?>
		</section>


		<h2>Our mission</h2>
		<!-- need to make titles dynamic -->
		<section class="company-values">
		<?php
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'company_values' ) ) {
					the_field( 'company_values' );
				}
			}
		?>
		</section>


		<section class="cta-1">
			<h3>Menu</h3>
			<?php
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'cta_text' ) ) {
					the_field( 'cta_text' );
				}
			}
		?>
		</section>
			


		<section class="cta-1-link">
		<?php
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'cta_link' ) ) {
					the_field( 'cta_link' );
				}
			}
		?>
		</section>

		<section class="cta-2">
			<h3>Gift card</h3>
			<?php
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'cta_giftcard' ) ) {
					the_field( 'cta_giftcard' );
				}
			}
		?>
		</section>
			


		<section class="cta-1-link">
		<?php
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'cta_giftcard_link' ) ) {
					the_field( 'cta_giftcard_link' );
				}
			}
		?>
		</section>

		<!-- <section class="cta-2">

		<section class="cta-2-link"> -->

		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();