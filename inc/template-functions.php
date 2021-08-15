<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package joshwaymanV4
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function joshwayman_body_classes( $classes ) {
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
add_filter( 'body_class', 'joshwayman_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function joshwayman_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'joshwayman_pingback_header' );



// Generate Pretty Menu
function site_menu( $name = '', $depth = 1 ) {
	if( $name ) {
		$menu = wp_nav_menu( "container_class=menu&echo=0&menu=$name&depth=$depth" );
	} else {
		$menu = wp_nav_menu( "container_class=menu&echo=0&depth=$depth" );
	}

	/* Remove the wrapper and the poorly used title element */
	$menu = str_replace( '<div class="menu">', '', $menu );
	$menu = str_replace( '<ul>', '', $menu );
	$menu = str_replace( '</ul></div>', '', $menu );
	$menu = preg_replace( '/<ul id=\"(.*?)\" class=\"(.*?)\">/', '', $menu );
	$menu = preg_replace( '/title=\"(.*?)\"/', '', $menu );

	echo $menu;
}


// Disable auto-linking to full size images
update_option( 'image_default_link_type', 'none' );

// Adds a class of hfeed to non-singular pages.
function mr_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'mr_body_classes' );

add_theme_support( 'post-thumbnails' );

// Image Sizes
set_post_thumbnail_size( 150, 150, true );
add_image_size( 'square', 1200, 1200, true );
add_image_size( 'tall', 600, 1200, true );
add_image_size( 'square-small', 600, 600, array('center', 'center') );
add_image_size( 'banner', 1440, 600, true );