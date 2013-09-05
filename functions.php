<?php
/**
 * Functions
 * @package      Code Like Pirates
 * @author      @Amit_Kolambikar <amit@codelikepirates.com>
 * @copyright    Copyright (c) 2013,Captain Theme 
 */
 
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );
 
// Definte child theme
define( 'CHILD_THEME_NAME', 'Captain Theme' );
define( 'CHILD_THEME_URL', 'http://captain.codelikepirates.com/' );



//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );


//* Display author box on single posts
add_filter( 'get_the_author_genesis_author_box_single', '__return_true' );

function my_scripts_method() {
    wp_enqueue_script( 'fittext-script', get_stylesheet_directory_uri() . '/js/jquery.fittext.js', array( 'jquery' ) );
}
 
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
/** Support for various Image sizes */
add_image_size('home', 220, 180, TRUE);
add_image_size('home-featured', 580, 300, TRUE);


/** Support for different color style options */
add_theme_support( 'genesis-style-selector', array(
	'captain-red'=> 'Red',
	'captain-green'	=> 'Green',
	'captain-black'	=> 'Black',
	'captain-white'=> 'White',
) );
// Add theme color body class for demoing colors
add_filter( 'body_class', 'latent_add_category_class_single' );
function latent_add_category_class_single( $classes ) {
   $classes[] = 'captain-' . $_GET['color'];
   return $classes;
}


/** Reposition the breadcrumbs */
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
add_action( 'genesis_entry_header', 'genesis_do_breadcrumbs',7 );

add_filter( 'genesis_comment_list_args', 'childtheme_comment_list_args' );
function childtheme_comment_list_args( $args ) {
    $args['avatar_size'] = 40;
	return $args;
}

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_header', 'genesis_do_subnav' );


//* Load Arvo and Open Sans Google fonts
add_action( 'wp_enqueue_scripts', 'custom_load_google_fonts' );
function custom_load_google_fonts() {
	wp_enqueue_style( 'google-font', 'http://fonts.googleapis.com/css?family=Arvo|Open+Sans:600', array(), PARENT_THEME_VERSION );
}
