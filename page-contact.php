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

		?>

		<section class="map">
			<?php
			if (function_exists('get_field') && get_field('contact_map')) {
			the_field('contact_map');
			} else {
			echo '<p>Map not available.</p>';
			}
			?>
		</section>

		<section class="contact-locations">
		<?php
			if ( have_rows( 'contact_locations' ) ) :
				while ( have_rows( 'contact_locations' ) ) : the_row();
					// Output your repeater field values here

					echo "<p>"; 
					the_sub_field( 'location_name' );
					 echo "</p>";
					 echo "<p>"; 
					the_sub_field( 'location_address' );
					echo "</p>";
					 echo "<p>"; 
					the_sub_field( 'location_hours' );
					echo "</p>";					
					echo "<p>";  
					the_sub_field( 'location_phone' );
					echo "</p>";

				endwhile;
			else :
				// No rows found
			endif;
			?>
		</section>
		


		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKZLg1ui8iNibodZ3MqgT0Pd3gY5ZEc0U&callback=initMap"></script>
