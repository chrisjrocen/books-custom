<?php
/**
 * Add Movie custom Post Type.
 *
 * @package chrxbooks.
 */

/**
 * Add Movie custom Post Type.
 *
 * @return void
 */
/*****************************************************************************
Register an extra post type for content with taxonomy
 *****************************************************************************/
function chrx_register_post_type() {

	// book 
	$labels = array(
		'name' => __('Books'),
		'singular_name' => __('Book'),
		'add_new' => __('New Book'),
		'add_new_item' => __('Add New Book'),
		'edit_item' => __('Edit Book'),
		'new_item' => __('New Book'),
		'view_item' => __('View Book'),
		'search_items' => __('Search Books'),
		'not_found' =>  __('No Book Found'),
		'not_found_in_trash' => __('No Book found in Trash'),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'thumbnail',
			'page-attributes'
		),
		'taxonomies' => array('rmcc_book', 'category'),
		'rewrite'   => array('slug' => 'books'),

	);
	register_post_type('chrx_book', $args);
}
add_action('init', 'chrx_register_post_type');


