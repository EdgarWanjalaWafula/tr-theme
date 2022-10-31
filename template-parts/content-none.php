<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

?>

<section class="no-results not-found">
	<div class="row">
		<div class="col-md-12">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( '404', 'tworivers' ); ?></h1>
			</header><!-- .page-header -->
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="page-content">
				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
		
					<h4><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'tworivers' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></h4>
		
				<?php elseif ( is_404() ) : ?>
					
					<h4><?php _e( 'You seem to be lost. To find what you are looking for try searching below:', 'tworivers' ); ?></h4>
		             
		             <?php get_search_form(); ?>
				
				<?php elseif ( is_search() ) : ?>
		
					<h4><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'tworivers' ); ?></h4>
					<h4><?php esc_html_e( 'Please try again with some different keywords.', 'tworivers' ); ?></h4>
					<?php
						get_search_form();
		
				else : ?>
		
					<h4><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'tworivers' ); ?></h4>
					<h4><?php esc_html_e( 'Perhaps searching can help.', 'tworivers' ); ?></h4>
					<?php
						get_search_form();
		
				endif; ?>
			</div><!-- .page-content -->
		</div>
	</div>
</section><!-- .no-results -->
