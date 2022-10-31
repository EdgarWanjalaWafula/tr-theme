<?php
/**
 * Template part for displaying the other tiles or grids of the ads section in page-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */
						
	$args = array(
		'post_type' => 'adverts',
		'posts_per_page' => 1,
		'orderby' => 'DESC',
		'tax_query' => array(
			array(
					'taxonomy' => 'ad-categories',
					'field'    => 'slug',
					'terms'    => 'right-bottom',
				),
			),
		);

	$query = new WP_Query( $args );
	
	// The Loop
	if ( $query->have_posts() ) :
							
		while ( $query->have_posts() ) : $query->the_post();
			
			if (get_field('choose_your_ad_video_type') == 'video_ad_self_hosted_bg') {
				
				?>
				
					<!-- fifth Tile - Right Bottom -->
					<div class="col-md-6 col-sm-6 col-xs-12 tile">
						<div class="trm-5 <?php if( get_field('link') ) : ?>btn-link<?php endif; ?>">
							<video class="tr-masthead-video" autoplay loop muted poster="<?php the_post_thumbnail_url( 'right-bottom' ); ?>">
								<?php if( get_field('ad_mp4_version') ): ?>
									<source src="<?php the_field('ad_mp4_version'); ?>" type="video/mp4">
								<?php endif; ?>
								
								<?php if( get_field('ad_webm_version') ): ?>
									<source src="<?php the_field('ad_webm_version'); ?>" type="video/webm">
								<?php endif; ?>
							</video>
							<a href="<?php the_field('link'); ?>"><div class="overlay"></div></a>
							<div class="caption">
								<?php the_title( '<h5>', '</h5>' ); ?>
								
								<?php if( get_field('sub_title') ) : ?>
								<h1><?php the_field('sub_title'); ?></h1>
								<?php endif; ?>
								
								<?php if( get_field('link') ) : ?>
								<a href="<?php the_field('link'); ?>" class="btn btn-success" role="button"><?php the_field('button_text'); ?></a>
								<?php endif; ?>
							</div>
						</div>
					</div>
					
				<?php
			
			} else if (get_field('choose_your_ad_video_type') == 'video_ad_self_hosted_fg') {
				
				?>
				
					<!-- fifth Tile - Right Bottom -->
					<div class="col-md-6 col-sm-6 col-xs-12 tile">
						<div class="trm-5 <?php if( get_field('link') ) : ?>btn-link<?php endif; ?>">
							<video class="tr-masthead-video" autoplay loop muted poster="<?php the_post_thumbnail_url( 'right-bottom' ); ?>">
								<?php if( get_field('ad_mp4_version') ): ?>
									<source src="<?php the_field('ad_mp4_version'); ?>" type="video/mp4">
								<?php endif; ?>
								
								<?php if( get_field('ad_webm_version') ): ?>
									<source src="<?php the_field('ad_webm_version'); ?>" type="video/webm">
								<?php endif; ?>
							</video>
							<a href="<?php the_field('link'); ?>"><div class="overlay-trans"></div></a>
						</div>
					</div>
					
				<?php
				
			} else {
				?>

					<!-- fifth Tile - Right Bottom -->
					<div class="col-md-6 col-sm-6 col-xs-12 tile">
						<?php if( get_field('link') ) : ?><a href="<?php the_field('link'); ?>"><?php endif; ?>
						<div class="trm-5 <?php if( get_field('link') ) : ?>btn-link<?php endif; ?>" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
							<video class="tr-masthead-video"></video>
							<div class="overlay"></div>
							<div class="caption">
								<?php the_title( '<h5>', '</h5>' ); ?>
								
								<?php if( get_field('sub_title') ) : ?>
								<h1><?php the_field('sub_title'); ?></h1>
								<?php endif; ?>
								
								<?php if( get_field('link') ) : ?>
								<a href="<?php the_field('link'); ?>" class="btn btn-success" role="button"><?php the_field('button_text'); ?></a>
								<?php endif; ?>
							</div>
						</div>
						<?php if( get_field('link') ) : ?></a><?php endif; ?>
					</div>
									
				<?php
			
			}
			
		endwhile; // End of the loop.
	
	endif;
		
	/* Restore original Post Data */
	wp_reset_postdata();	
	
?>
				