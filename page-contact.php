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

		<section class="map">
		<?php
			if ( function_exists( 'get_field' ) ) {
				if ( get_field( 'contact_map' ) ) {
					the_field( 'contact_map' );
				}
			}
		?>
		</section>

		<section class="contact-locations">
		<?php
			if ( have_rows( 'contact_locations' ) ) :
				while ( have_rows( 'contact_locations' ) ) : the_row();
					// Output your repeater field values here
					the_sub_field( 'location_name' );
					the_sub_field( 'location_hours' );
					the_sub_field( 'location_address' );
					the_sub_field( 'location_phone' );
				endwhile;
			else :
				// No rows found
			endif;
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


		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();