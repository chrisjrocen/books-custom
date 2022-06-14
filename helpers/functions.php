<?php
/**
 * Add the new helper functions here.
 * These are specific to this project.
 *
 * @packagechrxbooks.
 *
 * TODO: Document all the methods well.
 *
 * @package chrxbooks.
 */

/**
 * Adds imported ACF Fields
 *
 * @return void
 */
function chrx_acf_add_local_field_groups() {
	
	acf_add_local_field_group(array(
		'key' => 'group_1',
		'title' => 'My Group',
		'fields' => array (
			array (
				'key' => 'field_1',
				'label' => 'Sub Title',
				'name' => 'sub_title',
				'type' => 'text',
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
		),
	));
	
}

add_action('acf/init', 'chrx_acf_add_local_field_groups');
