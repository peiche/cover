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
			simulateTouch: false,
			pagination: '.swiper-pagination',
			paginationClickable: true
		});
		jQuery('#cover-home-left').click(function() {
			homeSwiper.swipePrev();
		});
		jQuery('#cover-home-right').click(function() {
			homeSwiper.swipeNext();
		});
	}
    
	// related slider
	if (jQuery('#related').length > 0) {
		var relatedSlides = jQuery('#related .cover').length;
		relatedSwiper = jQuery('#related').swiper({
			loop: true,
			noSwiping: (relatedSlides > 1 ? false : true),
			simulateTouch: false,
			pagination: '.swiper-pagination',
			paginationClickable: true
		});
        jQuery('#related-left').click(function() {
            relatedSwiper.swipePrev();
        });
        jQuery('#related-right').click(function() {
            relatedSwiper.swipeNext();
        });
	}
	
    // cover scroller
	jQuery('.cover .fa-angle-down').click(function() {
		var top = jQuery('.cover').outerHeight();
		jQuery('html, body').animate({
			scrollTop: top
		}, 500);
	});
	
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
    
    // fluidbox
    
    jQuery('a[rel="lightbox"]').fluidbox();
    
});