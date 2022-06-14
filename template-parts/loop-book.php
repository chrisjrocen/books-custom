<?php
/**
 * The Loop for the books archive page
 *
 * @package chrxbooks.
 */

/**
 * To display one book
 *
 * @return void
 */
function chrx_loop_through_books() {

	echo '<article class="card-container"><h2>' . esc_attr(get_the_title()) . '</h2>';

if (has_post_thumbnail()) {

		echo '<a href="">';
		
		the_post_thumbnail('medium', array(
			'class' => 'book-card',
			'alt'   => get_the_title()
		));

		//get_the_post_thumbnail(null, 'post-thumbnail', '');

		echo '</a>';
}

	the_excerpt();

	echo '<a href="' . get_permalink() .'">';
	
	echo '<button class="chrx-button">More</button></a>';
	
	echo '</article>';
}
