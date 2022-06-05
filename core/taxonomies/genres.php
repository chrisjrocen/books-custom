<?php
/**********************************************************************************
	 register taxonomy - genre
 **********************************************************************************/
function chrx_register_taxonomy()
{
	// genre
	$labels = array(
		'name'              => __('genres'),
		'singular_name'     => __('genre'),
		'search_items'      => __('Search genres'),
		'all_items'         => __('All genres'),
		'edit_item'         => __('Edit genre'),
		'update_item'       => __('Update genre'),
		'add_new_item'      => __('Add New genre'),
		'new_item_name'     => __('New genre Name'),
		'menu_name'         => __('genres'),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'sort' => true,
		'args' => array('orderby' => 'term_order'),
		'rewrite' => array('slug' => 'genres'),
		'show_admin_column' => true,
		'show_in_rest' => true
	);

	register_taxonomy('chrx_genre', array('chrx_book'), $args);
}
add_action('init', 'chrx_register_taxonomy');
