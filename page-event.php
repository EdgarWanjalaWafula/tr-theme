<?php
/**
 * Template Name: Events Page
 *
 * @package Two_Rivers
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="tr-pad-right">
				<?php
				while ( have_posts() ) : the_post();
	
					get_template_part( 'template-parts/content', 'eventpage' );
	
				endwhile; // End of the loop.
				?>
			</div>
			
			<!-- Start Footer Advert -->
			<div class="row">
				<div class="col-md-12 text-center footer-ad">
					<?php get_sidebar( 'footeradvert' ); ?>
				</div>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
