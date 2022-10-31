<?php
/**
 * Template part for displaying page content in listings A - Z.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header tr-listinaz-title-filter">
		
		<div class="row">
			<div class="col-md-4 col-sm-6 col-xs-12 text-left">
			<h1 class="entry-title">
				<span class="font-backend">
				<?php
					$title = get_the_title();
					$title_array = explode(' ', $title);
					$first_word = $title_array[0];
					
					echo $first_word;
				?>
				</span>
				<?php the_title( ); ?>
			</h1>
			</div>
			<div class="col-md-8 col-sm-6 col-xs-12 text-right listingaz-cover">
				<!-- start of breadcrumbs -->
				<?php 
					
					// if ( function_exists('yoast_breadcrumb') ) {
						// yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');
					// }
					
					get_template_part('template-parts/listingsaz-filter');
					
				?>
				
			</div>
		</div>
		
	</header><!-- .entry-header -->
	
	<div class="row">
		<div class="col-md-12">
			<div class="entry-content">	
				<?php
					the_content();
		
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tworivers' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div> <!-- end of search and header image and intro -->
	
	
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="tr-listing-az">
			
			<?php
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
					
					echo '<div class="row"><div class="col-md-12"><ul class="tr-results-az">';
					
					while ( $query->have_posts() ) : $query->the_post();
						
						$first_letter = strtoupper(substr(apply_filters('the_title',$post->post_title),0,1));
						
						if ($first_letter != $curr_letter) {
						  	echo '<li class="col-md-12 tr-results-heading"><h6 id="'.$first_letter.'list">' . $first_letter . '</h6></li>';
							
							$curr_letter = $first_letter;
						}
					?>
						<li class="col-md-3 col-sm-6 col-xs-12">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
						</li>
					<?php	
					endwhile;
					
					echo '</div></div></ul>';
					
				endif;
				
				/* Restore original Post Data */
				wp_reset_postdata();
         	?>
			
			</div>
		</div>
		
	</div><!-- end of listings and sidebar area -->
		

	
</article><!-- #post-## -->