<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Two_Rivers
 */

if ( ! function_exists( 'tworivers_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function tworivers_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'tworivers' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'tworivers' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'tworivers_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function tworivers_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'tworivers' ) );
		if ( $categories_list && tworivers_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( '%1$s', 'tworivers' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'tworivers' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( '%1$s', 'tworivers' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'tworivers' ), esc_html__( '1 Comment', 'tworivers' ), esc_html__( '% Comments', 'tworivers' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'tworivers' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
	
	if ( is_single() ) {
		?>	
		<div class="text-right">
			<?php get_template_part('template-parts/social-share'); ?>
		</div>
		<?php
		
	} else {
		?>
        
        <div class="row continue-reading">
        	
	        	<div class="col-md-6 text-left no-gutters">
	        		<span class="read-more"><?php echo '<a href="' . get_permalink() . '" title="' . __('Continue Reading ', 'kgm_ayana') . get_the_title() . '" rel="bookmark">Continue Reading</a>'; ?></span> 
	        	</div>
	        	<div class="col-md-6 text-right no-gutters">
	        		 <?php 
	                    get_template_part('template-parts/social-share');
	                 ?>
	        	</div>
        	
        </div>
        
        <?php
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function tworivers_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'tworivers_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'tworivers_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so tworivers_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so tworivers_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in tworivers_categorized_blog.
 */
function tworivers_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'tworivers_categories' );
}
add_action( 'edit_category', 'tworivers_category_transient_flusher' );
add_action( 'save_post',     'tworivers_category_transient_flusher' );

/*
 * Top Menu
 */

 function tworivers_top_menu() {
    if ( has_nav_menu( 'top_menu' ) ) {
    wp_nav_menu(
        array(
            'theme_location'  => 'top_menu',
            'container'       => 'div',
            'container_id'    => 'menu-top',
            'container_class' => 'menu-top',
            'menu_id'         => 'menu-top-items',
            'menu_class'      => 'menu-items',
            'depth'           => 1,
            'fallback_cb'     => '',
        )
    );
    }
}

// Listing Tags Filter Setup
function listing_tags_filter() {
	?>
	
	<li><a href="javascript:void(0)" class="dclearfilter"><label>Clear Filter</label></a></li>
	<li><a href="javascript:void(0)" class="bank"><label>Bank</label></a></li>	
	<li><a href="javascript:void(0)" class="shop"><label>Shop</label></a></li>
	<li><a href="javascript:void(0)" class="eat"><label>Try a restaurant</label></a></li>
	<li><a href="javascript:void(0)" class="offers"><label>See current Offers</label></a></li>
	<!-- <li><a href="javascript:void(0)" class="events"><label>See current events</label></a></li> -->
	
	<?php
}

//Events and Offers Time Filter Setup
function eo_time_filter() {
	?>
	
	<li><a href="javascript:void(0)" class="eoclearfilter"><label>Clear Filter</label></a></li>
	<li><a href="javascript:void(0)" class="today"><label>Today</label></a></li>
	<li><a href="javascript:void(0)" class="tomorrow"><label>Tomorrow</label></a></li>
	<li><a href="javascript:void(0)" class="thisweek"><label>This Week</label></a></li>
	<li><a href="javascript:void(0)" class="nextweek"><label>Next Week</label></a></li>
	<li><a href="javascript:void(0)" class="thismonth"><label>This Month</label></a></li>
	<li><a href="javascript:void(0)" class="nextmonth"><label>Next Month</label></a></li>
	
	<?php
}

// Ajax filter for getting the listings 
function ajax_filter_get_posts( $taxonomy ) {
 
  // Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');
 
  $taxonomy = $_POST['taxonomy'];
  
  if ( ( $taxonomy == 'dclearfilter' ) || ( $taxonomy == 'eoclearfilter' )  ) {
 	
	get_template_part('template-parts/content', 'clearfilter');
  
  } elseif ( $taxonomy == 'offers' ) {
  	
	?>
	<div class="row">
	
	<?php
		$args = array(
			'post_type' => 'offers',
			'posts_per_page' => -1,
			'orderby' => 'rand',
			'post_status' => 'publish',
		);
		
		$query = new WP_Query( $args );
		
		// The Loop
		if ( $query->have_posts() ) :
			
			while ( $query->have_posts() ) : $query->the_post();
			
				get_template_part('template-parts/content', 'singlelisting');
							
			endwhile; // End of the loop.
		else:
			?>
			
				<div class="alert alert-danger text-center" role="alert">
					<p><strong>Sorry!</strong> We have no offers at the moment.</p>
				</div>
			
			<?php
		endif;
			
		/* Restore original Post Data */
		wp_reset_postdata();	
		
		die();	
	
  }  elseif ( $taxonomy == 'events' ) {
  	
		$i = 1;
		
		?>
		<div class="row">
		
		<?php
			$args = array(
				'post_type' => 'event',
				'posts_per_page' => -1,
				'orderby' => 'rand',
				'post_status' => 'publish',
			);
			
			$query = new WP_Query( $args );
			
			// The Loop
			if ( $query->have_posts() ) :
				
				while ( $query->have_posts() ) : $query->the_post();
				
					get_template_part('template-parts/content', 'singlelisting');
					
					// if multiple of 4 close div and open a new div
		     		if($i % 4 == 0) {
		     			 echo '</div><div class="row">';
					}
								
					$i++;
					
				endwhile; // End of the loop.
			
			endif;
				
			/* Restore original Post Data */
			wp_reset_postdata();	
			
			die();	
		?>
		</div>
		<?php
	
  } elseif ( $taxonomy == 'shop' ) {
  	
	get_template_part('template-parts/content', 'shopfilter');
  	
  } elseif ( $taxonomy == 'bank' ) {
  	
	get_template_part('template-parts/content', 'bankfilter');
  	
  } elseif ( $taxonomy == 'eat' ) {
  	
	get_template_part('template-parts/content', 'food_bev');
  	
  } elseif ( $taxonomy == 'today' ) {
  	
	get_template_part('template-parts/content', 'tf_today');
  	
  } elseif ( $taxonomy == 'tomorrow' ) {
  	
	get_template_part('template-parts/content', 'tf_tomorrow');
  	
  } elseif ( $taxonomy == 'thisweek' ) {
  	
	get_template_part('template-parts/content', 'tf_thisweek');
  	
  } elseif ( $taxonomy == 'nextweek' ) {
  	
	get_template_part('template-parts/content', 'tf_nextweek');
  	
  } elseif ( $taxonomy == 'thismonth' ) {
  	
	get_template_part('template-parts/content', 'tf_thismonth');
  	
  }  elseif ( $taxonomy == 'nextmonth' ) {
  	
	get_template_part('template-parts/content', 'tf_nextmonth');
  	
  } else {
	  
  $i = 1;
  
  
  ?>
  
  <div class="row">
  
  <?php
 	
  // WP Query
  $args = array(
    'post_type' => 'listing',
    'tax_query' => array(
		array(
			'taxonomy' => 'listing-tags',
			'field' => 'slug',
			'terms' => array( $taxonomy )
			)
		)
  );
 
   
  $query = new WP_Query( $args );
 
	if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
	 
	get_template_part('template-parts/content', 'singlelisting');
	
	// if multiple of 4 close div and open a new div
	if($i % 4 == 0) {
		 echo '</div><div class="row">';
	}
				
	$i++;
	endwhile;
	else: ?>
	
	<div class="alert alert-danger text-center" role="alert"><p>Sorry! We could not find experiences for you.</p></div>
	<?php endif;
	 
	/* Restore original Post Data */
	wp_reset_postdata();	
	
	die();
	
	}

}
 
add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');


/* Add Custom Styling to Visual COmposer */
if( function_exists('vc_set_as_theme') ) {
	function Tworivers_vcSetAsTheme() {
		vc_set_as_theme( $disable_updater = true );
	}
	add_action( 'vc_before_init', 'Tworivers_vcSetAsTheme' );
}

function tworivers_vc_add_extra_attr() {
	
	/**
	 * Add Style to VC Tour
	 */
	vc_add_param( 'vc_tta_tour', array(
			'type' 			=> 'dropdown',
			'param_name' 	=> 'style',
			'value' 		=> array(
				__( 'Custom Theme Style', 'tworivers' )		 => 'tpath_tour_design',
				__( 'Classic', 'tworivers' )					 => 'classic',
				__( 'Modern', 'tworivers' )					 => 'modern',
				__( 'Flat', 'tworivers' )					 => 'flat',
				__( 'Outline', 'tworivers' )					 => 'outline',
			),
			'heading' 		=> __( 'Style', 'tworivers' ),
			'description' 	=> __( 'Select tour display style.', 'tworivers' ),
	) );
	
}

add_action('init', 'tworivers_vc_add_extra_attr', 999);

// Excerpt length
function tr_excerpt_length($length) {
    return 70;
}
add_filter('excerpt_length', 'tr_excerpt_length');

/* Modify the read more link */
add_filter( 'the_content_more_link', 'modify_read_more_link' );

function modify_read_more_link() {
    return '';
}
 