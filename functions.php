<?php

/**
 * Patty Meltdown functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Patty_Meltdown
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function patty_meltdown_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Patty Meltdown, use a find and replace
		* to change 'patty-meltdown' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('patty-meltdown', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header' => esc_html__('Header Menu Location', 'patty-meltdown'),
			'footer-left' => esc_html__('Footer - Left', 'patty-meltdown'),
			'footer-right' => esc_html__('Footer - Right', 'patty-meltdown'),

		)
	);


	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'patty_meltdown_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'patty_meltdown_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function patty_meltdown_content_width()
{
	$GLOBALS['content_width'] = apply_filters('patty_meltdown_content_width', 640);
}
add_action('after_setup_theme', 'patty_meltdown_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function patty_meltdown_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'patty-meltdown'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'patty-meltdown'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'patty_meltdown_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function patty_meltdown_scripts()
{
	wp_enqueue_style(
		'patty-meltdown-style',
		get_stylesheet_uri(),
		array(),
		_S_VERSION
	);
	wp_style_add_data('patty-meltdown-style', 'rtl', 'replace');

	wp_enqueue_script(
		'patty-meltdown-navigation',
		get_template_directory_uri() . '/js/navigation.js',
		array(),
		_S_VERSION,
		true
	);

	if (is_front_page()) {
		wp_enqueue_style(
			'swiper-styles',
			get_template_directory_uri() . '/css/swiper-bundle.css',
			array(),
			'11.0.5'
		);

		wp_enqueue_script(
			'swiper-scripts',
			get_template_directory_uri() . '/js/swiper-bundle.min.js',
			array(),
			'11.0.5',
			array('strategy' => 'defer'),
		);

		wp_enqueue_script(
			'swiper-settings',
			get_template_directory_uri() . '/js/swiper-settings.js',
			array('swiper-scripts'),
			_S_VERSION,
			array('strategy' => 'defer'),
		);
	}

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'patty_meltdown_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}


function pmd_register_custom_post_types()
{
	$args = array(
		'public' => true,
		'label'  => 'Testimonials'
	);
	register_post_type('testimonials', $args);
}
add_action('init', 'pmd_register_custom_post_types');

function my_acf_google_map_api($api)
{
	$api['key'] = 'AIzaSyC5TXwEkIUMHlP-UzWM3vZQl87IL5CmJZM';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


add_action('woocommerce_single_product_summary', 'display_product_specifications', 25);
function display_product_specifications() {
//ACF field in here
$field_value = get_field('dietary_allergen_info');

    // Check if the field has a value
    if ($field_value) {
        echo '<div class="product-dietary-allergen-info">';
        echo '<h3>Dietary and allergen information</h3>';
        echo '<p>' . $field_value . '</p>';
        echo '</div>';
    }

}