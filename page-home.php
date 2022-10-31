<?php
/**
 * Template Name: Home Page
 *
 * @package Two_Rivers
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		
			<?php
				get_template_part( 'template-parts/content', 'homeslider' );
			?>
			
			<!-- Sort Products Area or Filtering -->
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					
			        <div id="tagged-listings-filter" class="dropdown">
					  <button class="btn btn-default dropdown-toggle directory-filter" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    <h1><?php the_field('choices_button_text'); ?> <i class="fa fa-angle-down"></i></h1>
					  </button>
					  
					  <ul class="dropdown-menu directory-filter" aria-labelledby="dropdownMenu1">
					  		<?php listing_tags_filter(); ?>
					  </ul>
					</div>
					
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					
			        <div id="eo-time-filter" class="dropdown">
					  <button class="btn btn-default dropdown-toggle directory-filter" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					    <h1><?php the_field('time_button_text'); ?> <i class="fa fa-angle-down"></i></h1>
					  </button>
					  
					  <ul class="dropdown-menu directory-filter" aria-labelledby="dropdownMenu1">
					  		<?php eo_time_filter(); ?>
					  </ul>
					</div>
					
				</div>
			</div>
			
			<?php if( get_field('directory_tagline') ): ?>
			<!-- filter tagline -->
			<div class="row">
				<div class="col-md-12 text-center directory-cta">
					<p><?php the_field('directory_tagline'); ?></p>
				</div>
			</div>
			<?php endif; ?>
			
			<!-- Get the tagged listings data -->
			<div class="tagged-listings tr-pad-right">
				
				<!-- Get the directory data -->
				 <?php get_template_part('template-parts/ajax-home-directory'); ?>
				 
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
