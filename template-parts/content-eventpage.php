<?php
/**
 * Template part for displaying page content in page-shop.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12 text-left">
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
			<div class="col-md-6 col-sm-6 col-xs-12 text-right breadcrumbs-cover">
				<!-- start of breadcrumbs -->
				<?php 
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');
					}
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
		<div class="col-md-9 col-md-push-3">
			<!-- Get the directory data -->
			 <?php
			 	echo do_shortcode('[ajax_load_more theme_repeater="shop.php" post_type="event" posts_per_page="6" button_label="+ Load More Events" button_loading_label="Loading Events..." container_type="div"]');
			 ?>
		</div>
		<div class="col-md-3 col-md-pull-9 sidebar">
			<?php get_sidebar( 'listings' ); ?>
		</div>
	</div><!-- end of listings and sidebar area -->
		

	
</article><!-- #post-## -->
