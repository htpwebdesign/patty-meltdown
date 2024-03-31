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
		<h1 class="page-title"><?php esc_html_e('Contact', 'patty-meltdown'); ?></h1>
	</header><!-- .page-header -->

	<?php
	while (have_posts()) :
		the_post();

	?>
		<?php
		get_template_part("template-parts/location");
		?>


	<?php
	endwhile; // End of the loop.
	?>

</main><!-- #main -->

<?php
get_footer();
?>