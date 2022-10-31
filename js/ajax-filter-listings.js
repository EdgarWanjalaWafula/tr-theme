/**
 * @author Legibra
 *
 * 
 * Directory Tag Filter Ajax Scripts
 */

jQuery(document).ready(function($) {

	$( "#tagged-listings-filter ul li a" ).click(function() {
		
		$('ul li.active').removeClass('active');
    	$(this).parent('li').addClass('active');
		
		var selected_tag = $(this).attr("class");
		
		// After user selects a filter, fade out listings
        $('.tagged-listings').fadeOut('slow');
		
		data = {
            action: 'filter_posts', // function to execute
            afp_nonce: afp_vars.afp_nonce, // wp_nonce
            taxonomy: selected_tag, // selected tag
            };
 
        $.post( afp_vars.afp_ajax_url, data, function(response) {
 
            if( response ) {
                // Display posts on page
                $('.tagged-listings').html( response );
                // Restore div visibility
                $('.tagged-listings').fadeIn();
            };
        });		
		
	});
	
	$( "#eo-time-filter ul li a" ).click(function() {
		
		$('ul li.active').removeClass('active');
    	$(this).parent('li').addClass('active');
		
		var selected_tag = $(this).attr("class");
		
		// After user selects a filter, fade out listings
        $('.tagged-listings').fadeOut('slow');
		
		data = {
            action: 'filter_posts', // function to execute
            afp_nonce: afp_vars.afp_nonce, // wp_nonce
            taxonomy: selected_tag, // selected tag
            };
 
        $.post( afp_vars.afp_ajax_url, data, function(response) {
 
            if( response ) {
                // Display posts on page
                $('.tagged-listings').html( response );
                // Restore div visibility
                $('.tagged-listings').fadeIn();
            };
        });		
		
	});
	
});