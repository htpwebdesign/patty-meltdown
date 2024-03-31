<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<header class="woocommerce-products-header">
	<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	$categories = get_terms(array(
		'taxonomy' => 'product_cat',
		'hide_empty' => true,
	));

	// Output navigation links
	echo '<nav class="product-nav">';
	foreach ($categories as $category) {
		$image_src = wp_get_attachment_image_src(get_term_meta($category->term_id, 'thumbnail_id', true), 'medium');

		if ($image_src) {
			echo '<a href="#' . esc_attr($category->slug) . '">';
			echo '<img src="' . esc_url($image_src[0]) . '" alt="' . esc_attr($category->name) . '">';
			echo '</a>';
		} else {
			wp_get_attachment_image(11, 'medium');
		}
		echo '<a href="#' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</a>';
	}
	echo '</nav>';
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */

	do_action('woocommerce_archive_description');
	?>
</header>
<?php
if (woocommerce_product_loop()) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action('woocommerce_before_shop_loop');

	woocommerce_product_loop_start();

	$categories = get_terms(array(
		'taxonomy' => 'product_cat',
		'hide_empty' => true,
	));

	foreach ($categories as $category) {
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field' => 'id',
					'terms' => $category->term_id, // Use the category ID
				),
			),
		);
		$products = new WP_Query($args);

		if ($products->have_posts()) {
			echo '<section class="' . esc_attr($category->slug) . ' product-section">';
			echo '<h2 id="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</h2>';

			echo '<div class="' . esc_attr($category->slug) . '-grid product-grid">';
			while ($products->have_posts()) {
				$products->the_post();
				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action('woocommerce_shop_loop');

				wc_get_template_part('content', 'product');
			}
			echo '</div>'; // Closing div for products grid

			echo '</section>'; // Close the section element

			// Reset post data
			wp_reset_postdata();
		}
	}


	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
