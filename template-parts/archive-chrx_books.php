<?php
/**
 * The template for displaying Books Archive pages.
 *
 * @package chrxbooks.
 */

get_header(); ?>

<h2>Books</h2>

<?php

$count = 0;

// first loop
while( have_posts() ) : the_post();

	if ( has_term( 'main', 'chrx_genre' ) ) {

		$count +=1;
	}

endwhile;

//second loop
if ( $count > 0 ) {

	rewind_posts(); ?>
	<section class="series">
		<h3>Main</h3>

		<?php while( have_posts() ) : the_post();

			if( has_term( 'main', 'chrx_genre' )) {

				get_template_part( 'loop', 'book' );

			}

		endwhile; ?>

	</section>

<?php }


// third loop
rewind_posts();
$count = 0;

while( have_posts() ) : the_post();

	if ( has_term( 'minor', 'chrx_genre' ) ) {

		$count +=1;
	}

endwhile;


//fourth loop
if ( $count > 0 ) {

	rewind_posts(); ?>
	<section class="series">
		<h3>Minor</h3>

		<?php while( have_posts() ) : the_post();

			if( has_term( 'minor', 'chrx_genre' )) {

				get_template_part( 'loop', 'book' );

			}

		endwhile; ?>

	</section>

<?php get_sidebar( 'full' ); ?>
<?php get_footer(); ?>
