<?php
/**
 * The template for displaying all business listing single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Two_Rivers
 */

get_header(); ?>

	<?php
		while ( have_posts() ) : the_post();
	?>
	
	<div class="row">
	<div class="col-md-12">
		<header class="entry-header text-center">
			<?php
				if ( is_single() ) {
					the_title( '<h1 class="entry-title">', '</h1>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
			
			
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php tworivers_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
						
			<?php 
							
				//Do something if a specific array value exists within a post
				$term_list = wp_get_post_terms($post->ID, 'types-of-events', array("fields" => "all"));
				
				foreach($term_list as $term_single) {
						
					$category_name =  $term_single->name;
					$category_id = $term_single->term_id;
					?>
					
						<a class="cat-name" href="<?php print get_term_link( $category_id, 'types-of-events' ); ?>" alt="<?php echo $category_name; ?>" title="<?php echo $category_name; ?>" >
							<p class="cat-title"><?php echo $category_name; ?></p>
						</a>
					
					<?php					
				}
				
			?>
		</header><!-- .entry-header -->
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-9 col-md-push-3">
	
		<?php
			get_template_part( 'template-parts/content', 'events' );
			
			
			endwhile; // End of the loop.
		?>
	
	</div>
		
	<div class="col-md-3 col-md-pull-9 sidebar">
	  	
		<?php get_sidebar( 'listings' ); ?>
		
	</div>
	</div>

	<!-- Start Footer Advert -->
	<div class="row">
		<div class="col-md-12 text-center footer-ad">
			<?php get_sidebar( 'footeradvert' ); ?>
		</div>
	</div>
<?php
get_footer();
