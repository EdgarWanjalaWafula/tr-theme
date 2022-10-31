<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

?>

<div class="col-md-4 col-sm-4 col-xs-12 home-directory">
	<div class="thumbnail">
		<div class="store-header">
			
			<?php
				if (has_post_thumbnail()) {
					echo '<div class="post-thumbnail clear">';
					echo '<a href="' . get_permalink() . '" title="' . __('Learn more about ', 'tworivers') . get_the_title() . '" rel="bookmark">';
					echo the_post_thumbnail('feature-thumb');
					echo '</a>';
					echo '</div>';
				}
			?>
			
			<?php 
				
				// Check busines types taxonomy
				$bt_terms = wp_get_object_terms( $post->ID,  'business-type' );
				
				if ( ! empty( $bt_terms ) ) {
					if ( ! is_wp_error( $bt_terms ) ) {
						$category_name = $bt_terms[0]->name;
						$category_id = $bt_terms[0]->term_id;
						$taxonomy = 'business-type';
						$btn_text = 'Learn More';
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
			<a class="cat-name" href="<?php print get_term_link( $category_id, $taxonomy ); ?>" alt="<?php echo $category_name; ?>" title="<?php echo $category_name; ?>" >						
				<div class="store-icon" style="background-image:url('<?php the_field( 'business_type_icon', $taxonomy .'_' . $category_id ); ?>')";></div>
			</a>
		</div>
		
		<div class="caption">
			
			<a class="cat-name" href="<?php print get_term_link( $category_id, 'business-type' ); ?>" alt="<?php echo $category_name; ?>" title="<?php echo $category_name; ?>" >
				<?php echo $category_name; ?>
			</a>	
			
			<a href="<?php the_permalink(); ?>" alt="<?php the_title( ); ?>" ><?php the_title( '<h6>', '</h6>' ); ?></a>
										
			<?php echo wp_trim_words( get_the_content(), 17, '...' ); ?>
									
		</div><!-- .caption -->
		
		<div class="thumbnail-footer">
			<a href="<?php the_permalink(); ?>" class="btn btn-success" role="button" title="<?php echo $btn_text; ?> on <?php the_title( ); ?>" alt="<?php echo $btn_text; ?> on <?php the_title( ); ?>" >
				<?php echo $btn_text; ?>
			</a>
		</div>						
	</div>
</div>


