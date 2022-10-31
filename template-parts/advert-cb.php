<?php
/**
 * Template part for displaying the first tile of the ads section in page-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

 					
	$args = array(
		'post_type' => 'adverts',
		'posts_per_page' => 1,
		'order' => 'DESC',
		'tax_query' => array(
			array(
					'taxonomy' => 'ad-categories',
					'field'    => 'slug',
					'terms'    => 'center-bottom',
				),
			),
		);
	
	$query = new WP_Query( $args );
	
	
	// The Loop
	if ( $query->have_posts() ) :
							
		while ( $query->have_posts() ) : $query->the_post();
		
				?>
					<!-- fourth Tile - Center Bottom -->
					<div class="col-md-3 col-sm-3 hidden-xs tile">
						<?php if( get_field('link') ) : ?><a href="<?php the_field('link'); ?>"><?php endif; ?>
						<div class="trm-4" style="background-image: url(<?php the_post_thumbnail_url( 'center-bottom' ); ?>);">
							<?php if( get_field('choose_your_advert_type') == 'static' ): ?>
								
							<?php else: ?>
								<div class="overlay"></div>
								<div class="caption">
									<?php the_title( '<h5>', '</h5>' ); ?>
									
									<?php if( get_field('sub_title') ) : ?>
									<h4><?php the_field('sub_title'); ?></h4>
									<?php endif; ?>
									
								</div>
							<?php endif; ?>
							
						</div>
						<?php if( get_field('link') ) : ?></a><?php endif; ?>
					</div>
					
				<?php
			
			
		endwhile; // End of the loop.
	
	endif;
		
	/* Restore original Post Data */
	wp_reset_postdata();	
	
?>
				
			