/**
 * @author Legibra
 *
 * 
 * Website integration scripts
 */

jQuery(document).ready(function($){
    
     'use strict';   
    
    //Sidebar Social Menu display off
    $( "#menu-social-menu li a" ).wrapInner( "<span class='screen-reader-text'></span>");
    
    //Fit Vids Init
    $(".post-cover").fitVids();
    
	//Activate BX Slider for Left Vertical Ad
	$('.tr-left-vertical .bxslider').bxSlider({
          mode: 'fade',
          pager: false,
          captions: true,
          auto: true,
          controls: false
    });
    
        
    //Activate BX Slider for Posts
    $('.post-cover .bxslider').bxSlider({
          adaptiveHeight: true,
          mode: 'fade',
          pager: false,
          captions: false,
          auto: true,
          controls: true,
    });
    
    //Activate BX Slider for Shop Categories
    $('.shop-categories .bxslider').bxSlider({
          pager: false,
          minSlides: 4,
          maxSlides: 4,
          moveSlides: 1,
          slideWidth: 260,
          slideMargin: 25,
          nextSelector: '.post-next',
          prevSelector: '.post-prev',
          nextText: '<i class="fa fa-chevron-right"></i>',
          prevText: '<i class="fa fa-chevron-left"></i>',
    });
    
    // Scroll to top
    $(window).scroll(function () {
		if ($(this)
				.scrollTop() > 100) {
			$('.scrollToTop')
					.fadeIn();
		} else {
			$('.scrollToTop')
					.fadeOut();
		}
	});

	//Click event to scroll to top
	$('.scrollToTop').click(function () {
		$('html, body').animate({
			scrollTop: 0
		}, 1000);
		return false;
	});
    
    
    // Smooth Scroll
    var hash = window.location.hash.substr(1);
    if (hash != "") {
        var scrollAnimationTime = 1200,
                scrollAnimation = 'easeInOutExpo';

        var target = '#' + hash;
        $('html, body').stop()
                .animate({
                    'scrollTop': $(target)
                            .offset()
                            .top
                }, scrollAnimationTime, scrollAnimation, function () {
                    window.location.hash = target;
                });
    }



    var scrollAnimationTime = 1200,
            scrollAnimation = 'easeInOutExpo';
    $('a.scrollto').bind('click.smoothscroll', function (event) {
        event.preventDefault();
        var target = this.hash;
        $('html, body').stop()
                .animate({
                    'scrollTop': $(target)
                            .offset()
                            .top
                }, scrollAnimationTime, scrollAnimation, function () {
                    window.location.hash = target;
                });
    });
    
    // Letter Navigation A - Z Toggle
    $('.tr-titles-az').onePageNav({
		scrollSpeed: 900,
		scrollThreshold: 0.2, // Adjust if Navigation highlights too early or too late
		currentClass: 'active'
	});
    
    // Inner links
    $('.section-link').smoothScroll({
        speed: 900,
        offset: -150
    });
    
    

});
