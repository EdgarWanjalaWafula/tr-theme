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
			<div class="col-md-8 col-sm-12 col-xs-12 single-cover">
				<?php
					
					if (has_post_thumbnail()) :
						echo '<div class="post-thumbnail">';
						echo the_post_thumbnail('feature-thumb');
						echo '</div>';
					endif;
				
				?>
				
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<!-- start event details -->
				<div class="tr-event-details">
					<div class="row">
						<div class="col-md-3 text-left title no-gutters-left">
							Cost
						</div>
						<div class="col-md-9 text-right detail no-gutters-right">
							<?php if( get_field('ticket_cost') ): ?>
							<?php the_field('ticket_cost'); ?>
							<?php else: ?>
							<span class="no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
							<?php endif; ?>
						</div>
					</div><!-- end of cost -->
					
					<div class="row">
						<div class="col-md-3 text-left title no-gutters-left">
							Date
						</div>
						<div class="col-md-9 text-right detail no-gutters-right">
							
							<?php 
								if( get_field('date_of_event') ):
								$date_of_event = strtotime( get_field( "date_of_event" ) );
								echo date('D, j M, Y', $date_of_event); 
								else:
							?> 
							<span class="no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
							<?php endif; ?>
						</div>
					</div><!-- end of date -->
					
					<div class="row">
						<div class="col-md-3 text-left title no-gutters-left">
							Time
						</div>
						<div class="col-md-9 text-right detail no-gutters-right">
							<?php 
								if( get_field('time_of_event') ):
								the_field('time_of_event'); 
								else:
							?>
							<span class="no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
							<?php endif; ?>
						</div>
					</div><!-- time of the event -->
					
					<div class="row">
						<div class="col-md-3 text-left title no-gutters-left">
							Location
						</div>
						<div class="col-md-9 text-right detail no-gutters-right">
							<?php 
								if( get_field('location_of_event') ):
								the_field('location_of_event'); 
								else:
							?>
							<span class="no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
							<?php endif; ?>							
						</div>
					</div><!-- location of event -->
					
					<div class="row no-border">
						<div class="col-md-12 event-title-query text-center">
							<h5>Have Questions?</h5>
						</div>
					</div><!-- questions title -->
					
					<div class="row">
						<div class="col-md-3 text-left title no-gutters-left">
							Call
						</div>
						<div class="col-md-9 text-right detail no-gutters-right">
							<?php 
								if( get_field('event_phone') ):
								the_field('event_phone'); 
								else:
							?>
							<span class="no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
							<?php endif; ?>
						</div>
					</div><!-- end of event mobile -->
					
					<div class="row no-border">
						<div class="col-md-3 text-left title no-gutters-left">
							Email
						</div>
						<div class="col-md-9 text-right detail no-gutters-right">
							<?php 
								if( get_field('event_email') ):
								the_field('event_email'); 
								else:
							?>
							<span class="no-listing-info"><a href="?page_id=2103">Ask for this info <i class="fa fa-question-circle"></i></a></span>
							<?php endif; ?>
						</div>
					</div><!-- end of event email -->
										
				</div>
				<!-- end event details -->
				
				<div class="row btn-ticket">
					<div class="col-md-12 text-center">
						<?php if( get_field('buy_ticket') ) : ?>
						<!--start buy ticket btn -->
						
							<a href="<?php the_field('buy_ticket') ?>" type="button" class="btn btn-success" alt="<?php the_title(); ?>" title="Buy ticket's for the <?php the_title(); ?>" >Buy Ticket</a>
						
						<!--end buy ticket btn -->
						<?php endif; ?>
					</div>
				</div><!-- end of event btn -->
				
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12 tr-event-more-details post-cover">
				<?php
					if ( get_field('event_video') ) :
						
						the_field('event_video');
						
					endif;
					
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

	<div class="entry-footer text-center tr-event-footer">
		<h5>Share the Event</h5>
		<?php get_template_part('template-parts/social-share'); ?>
	</div><!-- .event-footer -->
</article><!-- #post-## -->
