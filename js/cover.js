var homeSwiper, relatedSwiper;

jQuery(document).ready(function() {
	
	// menu button
	jQuery('#header .mobile-menu a.burger').click(function(e) {
		e.preventDefault();
		jQuery('#header').removeClass('show-search').addClass('show-nav');
	});
	jQuery('#header .mobile-menu a.close').click(function(e) {
		e.preventDefault();
		jQuery('#header').removeClass('show-nav show-search');
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
	
	// back to top link
    jQuery('#page').waypoint({
		handler: function(event, direction) {
		  jQuery('.backtotop').toggleClass('show');
		}
	});
	
});