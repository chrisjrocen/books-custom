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
function register_chrx_books_shortcode() {
	add_shortcode( 'chrx-books', 'render_books_page' );
}

add_action( 'init', 'register_chrx_books_shortcode' );

// add_action( 'wp_enqueue_scripts', 'enqueue_scripts', 10 );
// function enqueue_scripts() {
// 	wp_enqueue_style( 'movies-css', plugin_dir_url( dirname( __FILE__, 2 ) ) . 'assets/build/css/base.css', array(), '0.1.0', 'all' );
// 	wp_enqueue_script( 'movies-js', plugin_dir_url( dirname( __FILE__, 2 ) ) . 'assets/build/js/base.js', ['jquery'], '0.1.0', true );
// 	wp_localize_script(
// 		'books-js',
// 		'books_ajax',
// 		array(
// 			'ajax_url' => admin_url( 'admin-ajax.php' ),
// 		)
// 	);
// }

// add_action( 'wp_ajax_filter_movies', 'leisure_tym_filter_movies' );
// add_action( 'wp_ajax_nopriv_filter_movies', 'leisure_tym_filter_movies' );
// function leisure_tym_filter_movies() {
// 	echo wp_send_json('yes it works');

// 	wp_die();
// }

/**
 * Query and display movies
 *
 * @param array $atts Attributes passed from the Shortcode. Default empty.
 *
 * @return void
 */
function render_books_page( $atts ) {

	ob_start();
		include plugin_dir_path( dirname( __FILE__, 2 ) ) . 'template-parts/loop-book.php';
	echo ob_get_clean();

	$args = array(
		'post_type'   => 'chrx_book',
		'post_status' => 'publish',
		'orderby'     => 'title',
		'order'       => 'ASC',
	);

	// Query for movies.
	$the_query = new WP_Query( $args );

	if ( $the_query->have_posts() ) {
		echo '<ul>';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			echo '<li>' . esc_attr( get_the_title() ) . '</li>';
		}
		echo '</ul>';
	} else {
		printf( 'No books found' );
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}
