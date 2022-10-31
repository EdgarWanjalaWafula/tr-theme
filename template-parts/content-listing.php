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
					} else {
						echo '<div class="post-thumbnail clear">';
						?>
						<img src="<?php bloginfo('template_directory'); ?>/images/no-featured-image.png" alt="<?php the_title(); ?>" />
						<?php
						echo '</div>';
					}
				?>
				
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12">
				<div class="thumbnail">
					<?php if ( get_field('brand_logo') ): ?>
						<img src="<?php the_field('brand_logo'); ?>" alt="<?php the_title(); ?>" />
					<?php else: ?>
						<img src="<?php bloginfo('template_directory'); ?>/images/no-logo-listing.png" alt="<?php the_title(); ?>" />
					<?php endif; ?>
				</div>
				<ul class="social-media">
					
					<?php if( get_field('facebook') ): ?>
						<li>
						<a href="<?php the_field('facebook'); ?>" class="facebook" target="_blank">
							<i class="fa fa-facebook-square"></i>
						</a>
						</li>
					<?php endif; ?>
					
					<?php if( get_field('twitter') ): ?>
						<li>
						<a href="<?php the_field('twitter'); ?>" class="twitter" target="_blank">
							<i class="fa fa-twitter-square"></i>
						</a>
						</li>
					<?php endif; ?>
					
					<?php if( get_field('linkedin') ): ?>
						<li>
							<a href="<?php the_field('linkedin'); ?>" class="linkedin" target="_blank">
								<i class="fa fa-linkedin-square"></i>
							</a>
						</li>
					<?php endif; ?>
					
					<?php if( get_field('youtube') ): ?>
						<li>
							<a href="<?php the_field('youtube'); ?>" class="youtube" target="_blank">
								<i class="fa fa-youtube-square"></i>
							</a>
						</li>
					<?php endif; ?>
					
					<?php if( get_field('instagram') ): ?>
						<li>
							<a href="<?php the_field('instagram'); ?>" class="instagram" target="_blank">
								<i class="fa fa-instagram"></i>
							</a>
						</li>
					<?php endif; ?>
					
				</ul>
				
				<div class="tr-weather">
					<?php echo do_shortcode("[astero id='2838']"); ?>
				</div>
				
			</div>
		</div>
		<!--the listing opening time & contact information-->
		<div class="row cs-info">
			<div class="col-md-6 text-center">
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
			<div class="col-md-6 text-center contact-info">
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
