<?php
/**
 * Template part for displaying video posts.
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
		
		<!-- start post cover -->
		<div class="post-cover">
		<div class="self-hosted-audio">
			<?php 
				if( get_field( 'audio_type' ) == 'self_hosted' ) :
					
					echo do_shortcode( '[audio src="'. get_field('audio_self_hosted') .'"][/audio]' );
							
				endif;
			?><!-- end of self hosted audio -->
		</div>
		
		<?php 
			if( get_field( 'audio_type' ) == 'embed_code' ) :
							
				the_field('audio_embed_code');
				
			endif;
		?><!-- end of audio embed -->
		</div>
		<!-- end post cover -->
		
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
