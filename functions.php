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

// Regenerate Thumbnails
add_image_size("banner-image", 900, 360, true);


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
/**
 * Enqueue scripts and styles.
 */
function patty_meltdown_scripts()
{
	wp_enqueue_style(
		'pmd-googlefonts',
		'https://fonts.googleapis.com/css2?family=Protest+Strike&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap',
		array(),
		null
	);

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

	if (is_single(191) && is_product()) {
		wp_enqueue_script(
			'build-your-own-burger',
			get_template_directory_uri() . '/js/byob.js',
			array(),
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
	$labels = array(
		'name'               => _x('Testimonials', 'post type general name'),
		'singular_name'      => _x('Testimonial', 'post type singular name'),
		'menu_name'          => _x('Testimonials', 'admin menu'),
		'name_admin_bar'     => _x('Testimonial', 'add new on admin bar'),
		'add_new'            => _x('Add New', 'testimonial'),
		'add_new_item'       => __('Add New Testimonial'),
		'new_item'           => __('New Testimonial'),
		'edit_item'          => __('Edit Testimonial'),
		'view_item'          => __('View Testimonial'),
		'all_items'          => __('All Testimonials'),
		'search_items'       => __('Search Testimonials'),
		'parent_item_colon'  => __('Parent Testimonials:'),
		'not_found'          => __('No testimonials found.'),
		'not_found_in_trash' => __('No testimonials found in Trash.'),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'testimonials'),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'menu_icon'          => 'dashicons-heart',
		'supports'           => array('title', 'editor'),
		'template'           => array(array('core/quote')),
		'template_lock' => 'all'

	);
	register_post_type('testimonials', $args);
}
add_action('init', 'pmd_register_custom_post_types');

//register google map
function my_acf_google_map_api($api)
{
	$api['key'] = 'AIzaSyC5TXwEkIUMHlP-UzWM3vZQl87IL5CmJZM';

	$api['map_id'] = '56bccdd894bdd9d3';

	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


/**
 * Enqueue scripts and styles
 */
function wpdocs_map_scripts()
{

	if (is_page('23')) {

		// Enqueue JavaScript
		wp_enqueue_script(
			'google-map-script',
			'https://maps.googleapis.com/maps/api/js?key=AIzaSyC5TXwEkIUMHlP-UzWM3vZQl87IL5CmJZM&callback=Function.prototype',
			array(),
			'1.0.0',
			true
		);

		wp_enqueue_script(
			'map-script',
			get_template_directory_uri() . '/js/map.js',
			array('jquery', 'google-map-script'),
			'1.0.0',
			true
		);
	}
}
add_action('wp_enqueue_scripts', 'wpdocs_map_scripts');

// login
get_template_part('template-parts/login');
