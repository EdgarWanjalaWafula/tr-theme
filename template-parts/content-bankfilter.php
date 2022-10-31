<?php
/**
 * Template part for displaying page content in page-home.php for the today time filter.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

	$args = array(
		'post_type' => array( 'listing' ),
		'posts_per_page' => 8,
		'orderby' => 'rand',
		'post_status' => 'publish',
		'tax_query' => array(
			array(
				'taxonomy' => 'business-type',
				'field' => 'slug',
				'terms' => 'financial-services',
				)
		)
	);
	
	$query = new WP_Query( $args );
	
	// The Loop
	if ( $query->have_posts() ) :
		
		while ( $query->have_posts() ) : $query->the_post();
		
			get_template_part('template-parts/content', 'singlelisting');
			
		endwhile; // End of the loop.
	
	endif;
		
	/* Restore original Post Data */
	wp_reset_postdata();	
	
	die();	




