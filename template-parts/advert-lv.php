<?php
/**
 * Template part for displaying the first tile of the ads section in page-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */
?>

<div class="tr-left-vertical">

<?php
 					
	$args = array(
		'post_type' => 'adverts',
		'posts_per_page' => -1,
		'order' => 'DESC',
		'tax_query' => array(
			array(
					'taxonomy' => 'ad-categories',
					'field'    => 'slug',
					'terms'    => 'left-vertical',
				),
			),
		);
	
	$query = new WP_Query( $args );
	
	
	// The Loop
	if ( $query->have_posts() ) :
		
		$count = $query->found_posts;
		
		if ( $count > 1 ): 
		
		echo '<ul class="bxslider">';
			
		while ( $query->have_posts() ) : $query->the_post();
		
				
				?>
					<!-- First Tile - Left Vertical -->
					<li class="col-md-3 col-sm-3 hidden-xs tile">
						<?php if( get_field('link') ) : ?><a href="<?php the_field('link'); ?>"><?php endif; ?>
						<div class="trm-1" style="background-image: url(<?php the_post_thumbnail_url( 'left-vertical' ); ?>);">
							<div class="overlay"></div>
							<div class="caption">
								<?php the_title( '<h3>', '</h3>' ); ?>
								
								<?php if( get_field('sub_title') ) : ?>
								<h5><?php the_field('sub_title'); ?></h5>
								<?php endif; ?>
								
								<?php if( get_field('link') ) : ?>
								<a href="<?php the_field('link'); ?>" class="btn btn-success" role="button"><?php the_field('button_text'); ?></a>
								<?php endif; ?>
							</div>
						</div>
						<?php if( get_field('link') ) : ?></a><?php endif; ?>
					</li>	
									
				<?php
				
			
		endwhile; // End of the loop.
		
		echo '</ul>';
		
		else:
			
		while ( $query->have_posts() ) : $query->the_post();	
		?>	
			<div class="col-md-3 col-sm-3 hidden-xs tile">
				<?php if( get_field('link') ) : ?><a href="<?php the_field('link'); ?>"><?php endif; ?>
				<div class="trm-1" style="background-image: url(<?php the_post_thumbnail_url( 'left-vertical' ); ?>);">
					<div class="overlay"></div>
					<div class="caption">
						<?php the_title( '<h3>', '</h3>' ); ?>
						
						<?php if( get_field('sub_title') ) : ?>
						<h5><?php the_field('sub_title'); ?></h5>
						<?php endif; ?>
						
						<?php if( get_field('link') ) : ?>
						<a href="<?php the_field('link'); ?>" class="btn btn-success" role="button"><?php the_field('button_text'); ?></a>
						<?php endif; ?>
					</div>
				</div>
				<?php if( get_field('link') ) : ?></a><?php endif; ?>
			</div>	
					
		<?php	
		endwhile; // End of the loop.
		endif;
				
	
	endif;
		
	/* Restore original Post Data */
	wp_reset_postdata();	
	
?>
</div>				
			