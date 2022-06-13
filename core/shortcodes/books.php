<?php

/**
 * Display books page.
 *
 * @package chrxbooks.
 */

/**
 * Register movies shortcode [chrx-books].
 *
 * @return void
 */
function register_chrx_books_shortcode()
{
	add_shortcode('chrx-books', 'render_books_page');
}

add_action('init', 'register_chrx_books_shortcode');


/**
 * Enqueue Styles and Scripts for Slider shortcode.
 *
 * @return void
 */
function chrx_enqueue_scripts() {
	wp_enqueue_style( 'base.css', BOOKS_CUSTOM_URL . 'assets/build/css/base.css' , array(), '1.0.0', 'all' );

}

add_action( 'wp_enqueue_scripts', 'chrx_enqueue_scripts', 10 );



/**
 * Query and display books
 *
 * @param array $atts Attributes passed from the Shortcode. Default empty.
 *
 * @return void
 */
function render_books_page($atts)
{
	$args = array(
		'post_type'   => 'chrx_book',
		'post_status' => 'publish',
		'orderby'     => 'title',
		'order'       => 'ASC',
	);

	// Query for movies.
	$the_query = new WP_Query($args);

	if ($the_query->have_posts()) {

		while ($the_query->have_posts()) {
			$the_query->the_post();
			
			chrx_loop();
			

		}
		
	} else {
		printf('No books found');
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}

/**
 * ob_start();
 * include LEISURE_TYM_PLUGIN_PATH . 'template-parts/leisuretym-slider.php';
 * $output = ob_get_clean();
 * return $output;
 */
