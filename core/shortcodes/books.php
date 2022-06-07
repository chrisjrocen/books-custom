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

/**
 * Query and display movies
 *
 * @param array $atts Attributes passed from the Shortcode. Default empty.
 *
 * @return void
 */
function render_books_page( $atts ) {

	// ob_start();
	// 	include plugin_dir_path( dirname( __FILE__, 2 ) ) . 'template-parts/loop-book.php';
	// echo ob_get_clean();

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

			// chrx_book_loop_book();
		}



		echo '</ul>';




	} else {
		printf( 'No books found' );
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}
