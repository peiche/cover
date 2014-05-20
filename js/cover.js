var homeSwiper, gallerySwiper, relatedSwiper;

jQuery(document).ready(function() {
	
	// menu button
	jQuery('#header .mobile-menu a.burger').click(function(e) {
		e.preventDefault();
		jQuery('body').addClass('show-nav');
	});
    jQuery('#overlay').click(function() {
		jQuery('body').removeClass('show-nav');
	});
	
	// search
	jQuery('.searchopen').click(function() {
		jQuery('.searchopen, .searchbar').addClass('active');
		jQuery('.searchbar .search-field').focus();
		return false;
	});
	jQuery('.searchbar .search-field').focusout(function() {
		jQuery('.searchopen, .searchbar').removeClass('active');
	});
	
	// back to top
	jQuery('.backtotop').click(function() {
		jQuery('html, body').animate({ scrollTop: jQuery('body').offset().top });
		return false;
	});
	
	// home slider
	if (jQuery('#cover-home').length > 0) {
		var homeSlides = jQuery('#cover-home .cover').length;
		homeSwiper = jQuery('#cover-home').swiper({
			loop: true,
			noSwiping: (homeSlides > 1 ? false : true),
			simulateTouch: false
		});
		jQuery('#cover-home-left').click(function() {
			homeSwiper.swipePrev();
		});
		jQuery('#cover-home-right').click(function() {
			homeSwiper.swipeNext();
		});
	}
    
    // gallery slider
    if (jQuery('#cover-gallery').length > 0) {
        var gallerySlides = jQuery('#cover-gallery .cover').length;
		var fading = setTimeout(function() {
            // do nothing yet
        }, 0);
        gallerySwiper = jQuery('#cover-gallery').swiper({
			loop: true,
			noSwiping: (gallerySlides > 1 ? false : true),
			simulateTouch: true, // false
            onSlideChangeStart: function(swiper, direction) {
                
                // fade out post content to view images
                // fade back in after 5 seconds of inactivity
                
                clearTimeout(fading);
                
                jQuery('.cover.featured-image .background').addClass('lighten');
                fading = setTimeout(function() {
                    jQuery('.cover.featured-image .background').removeClass('lighten');
                }, 5000);
                
            }
		});
        
		jQuery('#cover-gallery-left').click(function() {
			gallerySwiper.swipePrev();
		});
		jQuery('#cover-gallery-right').click(function() {
			gallerySwiper.swipeNext();
		});
    }
	
	// cover scroller
	jQuery('.cover .fa-angle-down').click(function() {
		var top = jQuery('.cover').height();
		jQuery('html, body').animate({
			scrollTop: top
		}, 500);
	});
	
	// related slider
	if (jQuery('#related').length > 0) {
		var relatedSlides = jQuery('#related .cover').length;
		relatedSwiper = jQuery('#related').swiper({
			loop: true,
			noSwiping: (relatedSlides > 1 ? false : true),
			simulateTouch: false
		});
		jQuery('#related-left').click(function() {
			relatedSwiper.swipePrev();
		});
		jQuery('#related-right').click(function() {
			relatedSwiper.swipeNext();
		});
	}
	
	// waypoints
    
    jQuery('img[alt="Fork me on GitHub"]').hide();
    
    jQuery('#page').waypoint({
        handler: function(direction) {
            jQuery('.backtotop').toggleClass('show');
            jQuery('img[alt="Fork me on GitHub"]').fadeToggle(200);
        }
    });
    
    jQuery('.entry-content').waypoint({
        handler: function(direction) {
            jQuery('.profile').toggleClass('show');
        },
        offset: 50
    });
    jQuery('.postprofile').waypoint({
        handler: function(direction) {
            jQuery('.profile').toggleClass('force-hide');
        },
        offset: '100%'
    });
    
});