<?php

/* 
Log In Customization
*/

// Load in custom login styles and scripts
function pmd_login_stylesheet() {
    wp_enqueue_style( 
		'custom-login', // unique handle
		get_stylesheet_directory_uri() . '/css/style-login.css', // URL path
		array(), // dependencies
		_S_VERSION, // version
	);
}
add_action( 'login_enqueue_scripts', 'pmd_login_stylesheet' );

// Custom login logo URL
function pmd_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'pmd_login_logo_url' );

// Custom login URL title
function pmd_login_logo_url_title() {
    return 'Patty Meltdown | Meltdowns are fine as long as it\'s cheesy!';
}
add_filter( 'login_headertext', 'pmd_login_logo_url_title' );