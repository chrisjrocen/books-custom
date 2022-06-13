<?php
/**
 * Plugin Name: Books
 * Plugin URI:  https://ocenchris.com
 * Description: Books custom post type
 * Author:      chrx
 * Author URI:  https://ocenchris.com
 * Version:     1.0.0
 * License:     1.0.0
 * text-domain: chrx_books
 *
 * @package chrxbooks.
 */

// If this file is called directly, abort!!!
defined( 'ABSPATH' ) || die( 'No Access!' );

if ( 'BOOKS_CUSTOM_URL' ) {
	define( 'BOOKS_CUSTOM_URL', plugin_dir_url( __FILE__ ) );
}

require_once( plugin_dir_path( __FILE__ ) . '/core/post-types/books.php' );
require_once( plugin_dir_path( __FILE__ ) . '/core/shortcodes/books.php' );
require_once( plugin_dir_path( __FILE__ ) . '/core/acf/acf-fields.php' );
require_once( plugin_dir_path( __FILE__ ) . '/helpers/functions.php' );
require_once( plugin_dir_path( __FILE__ ) . '/core/taxonomies/genres.php' );
require( plugin_dir_path( __FILE__ ) . '/template-parts/loop-book.php' );


// require_once BOOKS_CUSTOM_URL . 'assets/build/css/base.css';
