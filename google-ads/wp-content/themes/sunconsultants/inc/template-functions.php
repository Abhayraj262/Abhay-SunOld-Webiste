<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package sunconsultants
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sunconsultants_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'sunconsultants_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sunconsultants_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'sunconsultants_pingback_header' );

/*
 * Enqueue style and script for landing page.
*/
function add_theme_scripts() {

	wp_enqueue_style( 'slick_style', get_template_directory_uri() . '/assets/css/vendor/slick.css', array(), '1.1', 'all' );
	wp_enqueue_style( 'custom_style', get_template_directory_uri() . '/assets/css/custom.css', array(), '1.1', 'all' );
	wp_enqueue_script( 'jquery_script', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '1.1', 'all' );
	wp_enqueue_script( 'slick_script', get_template_directory_uri() . '/assets/js/slick.min.js', array(), '1.1', 'all' );
	wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/assets/js/custom-script.js', array(), '1.1', 'all' );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
