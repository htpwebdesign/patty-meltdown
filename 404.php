<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Patty_Meltdown
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'patty-meltdown'); ?></h1>
		<a class="button primary" <?php echo get_home_url(); ?>">Back to Home</a>
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
