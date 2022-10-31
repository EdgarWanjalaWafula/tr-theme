<?php
/**
 * Template part for displaying listing posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Two_Rivers
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="entry-content">
		<div class="row  cs-info-header">
			
			<!--the listing featured image-->
			<div class="col-md-8 col-sm-8 col-xs-12">
				<?php
					if (has_post_thumbnail()) {
						echo '<div class="post-thumbnail clear">';
						echo the_post_thumbnail('feature-thumb');
						echo '</div>';
					}
				?>
				
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				
				<div class="tr-badge">				
					<?php if( get_field('discount_percentage') ) : ?>
					<!-- Start Discount -->
					<div class="tr-discount text-center">
						<h1><?php the_field('discount_percentage')?>%</h1>
					</div>
					<!-- End Discount -->
					<?php endif; ?>
					
					<?php if( get_field('cta_text') ) : ?>
					<!-- Start CTA -->
					<div class="tr-cta text-center">
						<h3><?php the_field('cta_text')?></h3>
					</div>
					<!-- End CTA -->
					<?php endif; ?>
				</div>
				
				<?php if( get_field('sale_price') ) : ?>
				<!-- Start the price hold -->
				<div class="tr-price text-center">
					<?php if( get_field('regular_price') ) : ?>
					<h3 class="reg-price"><?php the_field('regular_price')?></h3>
					<?php endif; ?>
					<h3><?php the_field('sale_price')?></h3>
				</div>
				<!-- End the price hold -->
				<?php endif; ?>
				
				<!--start validity-->
				<div class="row info-row">
					<div class="col-md-2 col-sm-2 col-xs-2 text-center icon-holder">
						<i class="fa fa-calendar"></i>
					</div>
					<div class="col-md-10 col-sm-10 col-xs-10 text-holder">
						<?php 
						
							$from = strtotime( get_field( "from" ) );
						
							echo date('d M, Y', $from); 
							
						?> - 
						<?php 
						
							$to = strtotime( get_field( "to" ) );
						
							echo date('d M, Y', $to);  
							
						?>
					</div>
				</div>
				<!--end validity-->
				
				<?php

				$post_object = get_field('shop');
				
				if( $post_object ): 
				
					// override $post
					$post = $post_object;
					setup_postdata( $post ); 
				
					?>
				    <div>
				    	<div class="thumbnail">
							<a href="<?php the_permalink(); ?>" title="Go to <?php the_title(); ?> lisitng page" alt="<?php the_title(); ?>">
								<?php if ( get_field('brand_logo') ): ?>
									<img src="<?php the_field('brand_logo'); ?>" alt="<?php the_title(); ?>" />
								<?php else: ?>
									<img src="<?php bloginfo('template_directory'); ?>/images/no-logo-listing.png" alt="<?php the_title(); ?>" />
								<?php endif; ?>
							</a>
						</div>
				    </div>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				
				<?php endif; ?>
				
				
					
			</div>
		</div>
		<!--the listing opening time & contact information-->
		<?php

		$post_object = get_field('shop');
		
		if( $post_object ): 
		
		// override $post
		$post = $post_object;
		setup_postdata( $post ); 
		
		?>
		<div class="row cs-info">
			<div class="col-md-6 col-sm-12 col-xs-12 text-center">
				<i class="fa fa-clock-o"></i>
				<div class="inner-heading">
					<h6>Opening & Closing Time</h6>
					<hr />
				</div>
				<div class="inner-text">
					<p>
						<span class="text-bold">Sunday & Public Holidays</span>
						<?php if( get_field('sunday_public_holidays') ): ?>
						<span class="text-content"><?php the_field('sunday_public_holidays'); ?></span>
						<?php else: ?>
						<span class="text-content no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
						<?php endif; ?>
					</p>
					<p>
						<span class="text-bold">Weekdays</span> 
						<?php if( get_field('weekdays') ): ?>
						<span class="text-content"><?php the_field('weekdays'); ?></span>
						<?php else: ?>
						<span class="text-content no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
						<?php endif; ?>
					</p>
					<p>
						<span class="text-bold">Saturday</span> 
						<?php if( get_field('saturday') ): ?>
						<span class="text-content"><?php the_field('saturday'); ?></span>
						<?php else: ?>
						<span class="text-content no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
						<?php endif; ?>
					</p>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 col-xs-12  text-center contact-info">
				<i class="fa fa-phone"></i>
				<div class="inner-heading">
					<h6>Contact Information</h6>
					<hr />
				</div>
				<div class="inner-text">
					<p>
						<span class="text-bold">Telephone</span> 
						<?php if( get_field('tel') ): ?>
						<span class="text-content"><?php the_field('tel'); ?></span>
						<?php else: ?>
						<span class="text-content no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
						<?php endif; ?>
					</p>
					<p>
						<span class="text-bold">Email</span>
						<?php if( get_field('email') ): ?>
						<span class="text-content"><?php the_field('email'); ?></span>
						<?php else: ?>
						<span class="text-content no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
						<?php endif; ?>
					</p>
					<p>
						<span class="text-bold">Website</span>
						<?php if( get_field('website') ): ?>
						<span class="text-content">
							<a href="<?php the_field('website'); ?>" target="_blank">
							<?php 
								 
								$input = get_field('website');

								// in case scheme relative URI is passed, e.g., //www.google.com/
								$input = trim($input, '/');
								
								// If scheme not included, prepend it
								if (!preg_match('#^http(s)?://#', $input)) {
								    $input = 'http://' . $input;
								}
								
								$urlParts = parse_url($input);
								
								// remove www
								$domain = preg_replace('/^www\./', '', $urlParts['host']);
								
								echo $domain;
								
							?>
							</a>
						</span>
						<?php else: ?>
						<span class="text-content no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
						<?php endif; ?>
					</p>
				</div>
			</div>
		</div>
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
		<!-- end of listing opening time & contact information-->
		
		<div class="row">
			<div class="col-md-12">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tworivers' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );
		
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tworivers' ),
						'after'  => '</div>',
					) );
				?>
			</div>
		</div>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php tworivers_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
