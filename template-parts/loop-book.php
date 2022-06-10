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
function chrx_loop() {

		echo '<article class"book-card"><h2>' . esc_attr(get_the_title()) . '</h2>';

		if (has_post_thumbnail()) {
			echo '<a href="' . the_permalink() . ';">';
			the_post_thumbnail('medium', array(
				'class' => 'book-card',
				'alt'	=> get_the_title()
			));

			get_the_post_thumbnail(null, 'post-thumbnail', '');

			echo '</a>';
		}

		the_excerpt();

		echo '<div><a class="chrx-button" href="' . the_permalink() . '; Explore the Book' . '</a></div>';

		echo '</article>';
}
