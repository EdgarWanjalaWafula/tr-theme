<?php
/**
 * Template part for displaying tiles in page-home.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

?>


<article>
	<div class="entry-content">
		
		<!-- Mosaic Home Tiles -->
		<div class="tr-mosaic"> 
			<div class="row">
			<!-- First Tile - Left Vertical -->
			<?php get_template_part('template-parts/advert-lv'); ?>			
			<!-- End of the First Tile - Left Vertical -->
			
			<!-- Second Tile - Center Top -->
			<?php get_template_part('template-parts/advert-ct'); ?>	
			
			<!-- third Tile - Right Top -->
			<?php get_template_part('template-parts/advert-rt'); ?>	
			
			<!-- fourth Tile - Center Bottom -->
			<?php get_template_part('template-parts/advert-cb'); ?>	
			
			<!-- fifth Tile - Right Bottom -->
			<?php get_template_part('template-parts/advert-rb'); ?>					
			<!-- End of Other Tiles -->		
			</div>
		</div>
		
	</div><!-- .entry-content -->

</article><!-- #post-## -->
