<?php
/**
 * Template part for displaying the Listings A - Z Filter
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

	$args = array (
		'post_type' => array( 'listing', 'food-beverage' ),
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);

	$query = new WP_Query( $args );
	$curr_letter = '';
	// The Loop
	if ( $query->have_posts() ) :
		
		echo '<ul class="tr-titles-az">';
		
		//echo '<span>Browse</span>';
		
		while ( $query->have_posts() ) : $query->the_post();
			
			$first_letter = strtoupper(substr(apply_filters('the_title',$post->post_title),0,1));
			
			if ($first_letter != $curr_letter) {
			  	echo '<li><a href="#'.$first_letter.'list" class="section-link">' . $first_letter . '</a></li>';
				
				$curr_letter = $first_letter;
			}
		?>
			
		<?php	
		endwhile;
		
		echo '</ul>';
		
		
	endif;
	
	/* Restore original Post Data */
	wp_reset_postdata();
	
				
			