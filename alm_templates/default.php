<div class="col-md-3 col-sm-4 col-xs-12 home-directory">
	<?php 
		global $post;
				
		// Check busines types taxonomy
		$bt_terms = wp_get_object_terms( $post->ID,  'business-type' );
		
		if ( ! empty( $bt_terms ) ) {
			if ( ! is_wp_error( $bt_terms ) ) {
				$category_name = $bt_terms[0]->name;
				$category_id = $bt_terms[0]->term_id;
				$taxonomy = 'business-type';
				$btn_text = 'Learn More';
				$offer_status = '';
			}
		}
		
		// Check event types taxonomy
		$et_terms = wp_get_object_terms( $post->ID,  'types-of-events' );
		
		if ( ! empty( $et_terms ) ) {
			if ( ! is_wp_error( $et_terms ) ) {
				$category_name = $et_terms[0]->name;
				$category_id = $et_terms[0]->term_id;
				$taxonomy = 'types-of-events';
				$btn_text = 'See Details';
				$offer_status = 'event';
			}
		}
		
		// Check offer types taxonomy
		$ot_terms = wp_get_object_terms( $post->ID,  'type-of-offers' );
		
		if ( ! empty( $ot_terms ) ) {
			if ( ! is_wp_error( $ot_terms ) ) {
				$category_name = $ot_terms[0]->name;
				$category_id = $ot_terms[0]->term_id;
				$taxonomy = 'type-of-offers';
				$btn_text = 'View Offer';
				$offer_status = 'offer';
			}
		}
		
		// Check food and beverage types taxonomy
		$ft_terms = wp_get_object_terms( $post->ID,  'food-type' );
		
		if ( ! empty( $ft_terms ) ) {
			if ( ! is_wp_error( $ft_terms ) ) {
				$category_name = $ft_terms[0]->name;
				$category_id = $ft_terms[0]->term_id;
				$taxonomy = 'food-type';
				$btn_text = 'View Restaurant';
				$offer_status = '';
			}
		}
	?>
	
	<?php if ( ( ! empty( $offer_status ) ) && ( $offer_status == 'offer' ) ): ?>
		
		<div class="ribbon-wrapper"><div class="ribbon ribbon-red">Offer</div></div>
		
	<?php endif; ?>
	
	<?php if( ( ! empty( $offer_status ) ) && ( $offer_status == 'event' ) ): ?>
		
		<div class="ribbon-wrapper"><div class="ribbon ribbon-orange">Event</div></div>
		
	<?php endif; ?>
	
	<div class="thumbnail">
		
		<div class="store-header">
			
			<a href="<?php the_permalink(); ?>" alt="<?php the_title( ); ?>" title="<?php the_title( ); ?>" >
				<?php if ( has_post_thumbnail() ): ?>
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				<?php else: ?>
					<img src="<?php bloginfo('template_directory'); ?>/images/no-featured-image.png" alt="<?php the_title(); ?>" />
				<?php endif; ?>
			</a>
			
			<a class="cat-name" href="<?php print get_term_link( $category_id, $taxonomy ); ?>" alt="<?php echo $category_name; ?>" title="<?php echo $category_name; ?>" >						
				<div class="store-icon" style="background-image:url('<?php the_field( 'business_type_icon', $taxonomy .'_' . $category_id ); ?>')";></div>
			</a>
			
		</div>
		
		<div class="caption">
					
			<a class="cat-name" href="<?php print get_term_link( $category_id, $taxonomy ); ?>" alt="<?php echo $category_name; ?>" title="<?php echo $category_name; ?>" >
				<?php echo $category_name; ?>
			</a>	
			
			<a href="<?php the_permalink(); ?>" alt="<?php the_title( ); ?>" ><?php the_title( '<h6>', '</h6>' ); ?></a>
										
			<?php echo wp_trim_words( get_the_content(), 15, '...' ); ?>
									
		</div><!-- .caption -->
		
		<div class="thumbnail-footer">
			<a href="<?php the_permalink(); ?>" class="btn btn-success" role="button" title="<?php echo $btn_text; ?> on <?php the_title( ); ?>" alt="<?php echo $btn_text; ?> on <?php the_title( ); ?>" >
				<?php echo $btn_text; ?>
			</a>
		</div>						
	</div>
</div>