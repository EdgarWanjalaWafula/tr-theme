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
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');
					}
				?>
				
			</header><!-- .page-header -->
		</div>
	</div>
				
	<div class="row">
	  <div class="col-md-9 col-md-push-3">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				
					<?php
					
					$i = 1;
					
					?>
					<div class="row">
						
						<?php
					
							/* Start the Loop */
							while ( have_posts() ) : the_post();
				
								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'businesstype' );
				
							// if multiple of 3 close div and open a new div
							if($i % 3 == 0) {
								 echo '</div><div class="row">';
							}
										
							$i++;
							
							endwhile;
				
							the_posts_navigation();
						
						?>
						
					</div>
				<?php
								
				else :
		
					get_template_part( 'template-parts/content', 'none' );
		
				endif; ?>
	
			</main><!-- #main -->
		</div><!-- #primary -->
		
	</div>
	<div class="col-md-3 col-md-pull-9 sidebar">
	  		<?php get_sidebar( 'listings' ); ?>
	</div>
	</div>
<?php
get_footer();
