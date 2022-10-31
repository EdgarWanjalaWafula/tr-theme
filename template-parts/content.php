<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php
			if ( is_single() ) {
				the_title( '<h2 class="entry-title">', '</h2>' );
			} else {
				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php tworivers_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
		
		<a href="<?php the_permalink(); ?>" alt="<?php the_title( ); ?>" title="<?php the_title( ); ?>" >
			<?php 
				if ( is_single() ) {
					
					if ( has_post_thumbnail() ): 
				
					echo '<div class="post-thumbnail clear">';
					echo the_post_thumbnail('feature-thumb');
					echo '</div>';
					
				 	else: 
						
					?>
						<img src="<?php bloginfo('template_directory'); ?>/images/no-featured-image.png" alt="<?php the_title(); ?>" />
					<?php endif;
					
				} else {
					
					if ( has_post_thumbnail() ): 
				
					echo '<div class="post-thumbnail clear">';
					echo '<a href="' . get_permalink() . '" title="' . __('Read more about ', 'tworivers') . get_the_title() . '" rel="bookmark">';
					echo the_post_thumbnail('feature-thumb');
					echo '</a>';
					echo '</div>';
					
				 	else: 
						
					?>
						<img src="<?php bloginfo('template_directory'); ?>/images/no-featured-image.png" alt="<?php the_title(); ?>" />
					<?php endif;
					
				}
				
				?>			
			
		</a><!-- end of featured image -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( is_single() ):
				
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tworivers' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
				
			else:
			
				
				the_excerpt();
				
			endif;
			
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tworivers' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php tworivers_entry_footer(); ?>
	</footer><!-- .entry-footer -->
		
</article><!-- #post-## -->
