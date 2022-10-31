<?php
/**
 * Template part for displaying page content in page-home.php for the today time filter.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

 
?>

<?php
	$args = array(
		'post_type' => array( 'offers' ),
		'posts_per_page' => -1,
		'orderby' => 'DESC',
		'post_status' => 'publish',
	);
	
	$query = new WP_Query( $args );
	
	// The Loop
	if ( $query->have_posts() ) :
		
		while ( $query->have_posts() ) : $query->the_post();
		
			//Check the date today
			$todays_date = strtotime( date('Y/m/d') );
			
			//Check date of the event
			$event_date = strtotime( get_field( "date_of_event" ) );
			
			//Check date of offer expiry
			$offer_expiry = strtotime( get_field( "to" ) );
			
			if ( ( $event_date == $todays_date ) || ( $offer_expiry >= $todays_date ) ):
			
				get_template_part('template-parts/content', 'singlelisting');
			
			endif;
				
		endwhile; // End of the loop.
	
	else:
		?>
			<div class="alert alert-danger text-center" role="alert">
				<p><strong>Sorry!</strong> We have no offers at the moment.</p>
			</div>
		<?php
	endif;
		
	/* Restore original Post Data */
	wp_reset_postdata();	
	
	die();
		
?>



