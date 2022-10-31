<?php
/**
 * The template for displaying Ajax Home Directory Items
 *
 * @package Two Rivers
 */
 
 	$numbers = range(1, 8);
	shuffle($numbers);
	
	$num = $numbers[0];
		
	$list1 = do_shortcode('[ajax_load_more theme_repeater="default.php" post_type="listing, event, offers, food-beverage" posts_per_page="8" scroll="false" images_loaded="true" button_label="+ load more experiences" button_loading_label="Loading experiences..." container_type="div"]');
		
	$list2 = do_shortcode('[ajax_load_more theme_repeater="default.php" post_type="listing, event, offers, food-beverage" orderby="title" posts_per_page="8" scroll="false" images_loaded="true" button_label="+ load more experiences" button_loading_label="Loading experiences..." container_type="div"]');
	
	$list3 = do_shortcode('[ajax_load_more theme_repeater="default.php" post_type="listing, event, offers, food-beverage" orderby="menu_order" posts_per_page="8" scroll="false" images_loaded="true" button_label="+ load more experiences" button_loading_label="Loading experiences..." container_type="div"]');
	
	$list4 = do_shortcode('[ajax_load_more theme_repeater="default.php" post_type="listing, event, offers, food-beverage" orderby="ID" posts_per_page="8" scroll="false" images_loaded="true" button_label="+ load more experiences" button_loading_label="Loading experiences..." container_type="div"]');
	
	$list5 = do_shortcode('[ajax_load_more theme_repeater="default.php" post_type="listing, event, offers, food-beverage" order="ASC" posts_per_page="8" scroll="false" images_loaded="true" button_label="+ load more experiences" button_loading_label="Loading experiences..." container_type="div"]');
	
	$list6 = do_shortcode('[ajax_load_more theme_repeater="default.php" post_type="listing, event, offers, food-beverage" order="ASC" orderby="title" posts_per_page="8" scroll="false" images_loaded="true" button_label="+ load more experiences" button_loading_label="Loading experiences..." container_type="div"]');
	
	$list7 = do_shortcode('[ajax_load_more theme_repeater="default.php" post_type="listing, event, offers, food-beverage" order="ASC" orderby="menu_order" posts_per_page="8" scroll="false" images_loaded="true" button_label="+ load more experiences" button_loading_label="Loading experiences..." container_type="div"]');
	
	$list8 = do_shortcode('[ajax_load_more theme_repeater="default.php" post_type="listing, event, offers, food-beverage" order="ASC" orderby="ID" posts_per_page="8" scroll="false" images_loaded="true" button_label="+ load more experiences" button_loading_label="Loading experiences..." container_type="div"]');
	
	
	$lists = array( $list1, $list2, $list3, $list4, $list5, $list6, $list7, $list8 );
	
	shuffle($lists);
	
	if ( array_key_exists( $num, $numbers ) ) {
	    echo $lists[$num];
	} else {
		echo $lists[4];
	}
	
	
