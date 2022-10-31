<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

get_header(); ?>
	
	<?php
						
	if ( have_posts() ) : ?>
	<div class="row">
		<div class="col-md-12">
			<header class="page-header text-center">
				
				<h1><?php printf( __( '%s', 'tworivers' ), single_cat_title( '', false ) ); ?></h1>
				<?php
					
					// Check busines types taxonomy
					$bt_slug = wp_get_object_terms( $post->ID,  'business-type' );
					
					if ( ! empty( $bt_slug ) ) {
						if ( ! is_wp_error( $bt_slug ) ) {
							$category_slug = $bt_slug[0]->slug;
						}
					}
				 
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');
					}
				?>
				
			</header><!-- .page-header -->
		</div>
	</div>
	<?php endif; ?>			
	<div class="row">
	  <div class="col-md-9 col-md-push-3">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				
			<?php
			 	echo do_shortcode('[ajax_load_more theme_repeater="shop.php" post_type="listing" taxonomy="business-type" taxonomy_terms=" ' . $category_slug . ' " taxonomy_operator="IN" posts_per_page="9" scroll="false" images_loaded="true" button_label="Load More" button_loading_label="Loading More..." container_type="div"]');
			 ?>
	
			</main><!-- #main -->
		</div><!-- #primary -->
		
	</div>
	<div class="col-md-3 col-md-pull-9 sidebar">
	  		<?php get_sidebar( 'listings' ); ?>
	</div>
	</div>
<?php
get_footer();
