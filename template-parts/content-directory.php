<?php
/**
 * Template part for displaying page content in page-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

$i = 1;
 
?>
<div class="row">

<?php
	$args = array(
		'post_type' => 'listing',
		'posts_per_page' => 8,
		'orderby' => 'rand',
	);
	
	$query = new WP_Query( $args );
	
	// The Loop
	if ( $query->have_posts() ) :
		
		while ( $query->have_posts() ) : $query->the_post();
		
			get_template_part('template-parts/content', 'singlelisting');
			
			// if multiple of 4 close div and open a new div
     		if($i % 4 == 0) {
     			 echo '</div><div class="row">';
			}
						
			$i++;
			
		endwhile; // End of the loop.
	
	endif;
		
	/* Restore original Post Data */
	wp_reset_postdata();	
	
		
?>

</div>

