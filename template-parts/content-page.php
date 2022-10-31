<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12 text-left">
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
			<div class="col-md-4 col-sm-4 col-xs-12 text-right breadcrumbs-cover">
				<!-- start of breadcrumbs -->
				<?php 
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');
					}
				?>
			</div>
		</div>
		
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tworivers' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	
</article><!-- #post-## -->
