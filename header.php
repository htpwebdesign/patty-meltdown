<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Patty_Meltdown
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'patty-meltdown'); ?></a>

		<header id="masthead" class="site-header full-bleed">
			<div class="header-content">
				<div class="site-branding">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
						<?php
					endif;
					?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="header-menu" aria-expanded="false" aria-label="Menu Toggle">
						<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24">
							<title>Menu icon</title>
							<path d="M2 7h20"></path>
							<path d="M2 12h20"></path>
							<path d="M2 17h20"></path>
						</svg>
					</button>
					<div class="header-nav">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'header',
								'menu_id'        => 'header-menu',
							)
						);
						if (function_exists('patty_meltdown_woocommerce_header_cart')) {
							patty_meltdown_woocommerce_header_cart();
						}
						?>
					</div>
				</nav><!-- #site-navigation -->
			</div>
		</header><!-- #masthead -->