var homeSwiper, relatedSwiper;

jQuery(document).ready(function() {
	
	// menu button
	jQuery('#header a.burger').click(function(e) {
		e.preventDefault();
		jQuery('#header').addClass('show-nav');
	});
	jQuery('#header a.close').click(function(e) {
		e.preventDefault();
		jQuery('#header').removeClass('show-nav');
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
			scrollTop: top + jQuery('#header').height();
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
	
	// cover parallax
	if (!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)) {
		skrollr.init({
			forceHeight: false
		});
	}
	
});