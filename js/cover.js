var homeSwiper, relatedSwiper;

jQuery(document).ready(function() {
	
	// home slider
	if (jQuery('#cover-home').length > 0) {
		var homeSlides = jQuery('#cover-home .cover').length;
		homeSwiper = jQuery('#cover-home').swiper({
			loop: true,
			noSwiping: (homeSlides > 1 ? false : true),
			simulateTouch: (homeSlides > 1 ? true : false),
			calculateHeight: true
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
			simulateTouch: (relatedSlides > 1 ? true : false),
			calculateHeight: true
		});
		jQuery('#related-left').click(function() {
			relatedSwiper.swipePrev();
		});
		jQuery('#related-right').click(function() {
			relatedSwiper.swipeNext();
		});
	}
});