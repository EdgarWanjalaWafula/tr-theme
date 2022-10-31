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
					echo '<a href="' . get_permalink() . '" title="' . __('Find out more about ', 'tworivers') . get_the_title() . '" rel="bookmark">';
					echo the_post_thumbnail('feature-thumb');
					echo '</a>';
					echo '</div>';
				}
			?>
			
			<?php 
				
				$terms = wp_get_post_terms($post->ID, 'types-of-events');

				$category_name = $terms[0]->name;
				$category_id = $terms[0]->term_id;
				$btn_text = 'Learn More';
				
			?>
			<a class="cat-name" href="<?php print get_term_link( $category_id, $taxonomy ); ?>" alt="<?php echo $category_name; ?>" title="<?php echo $category_name; ?>" >						
				<div class="store-icon" style="background-image:url('<?php the_field( 'business_type_icon', $taxonomy .'_' . $category_id ); ?>')";></div>
			</a>
		</div>
		
		<div class="caption">
			
			<a class="cat-name" href="<?php print get_term_link( $category_id, 'types-of-events' ); ?>" alt="<?php echo $category_name; ?>" title="<?php echo $category_name; ?>" >
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


