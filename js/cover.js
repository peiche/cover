jQuery(document).ready(function() {
	
	var homeSwiper = jQuery('#cover-home').swiper({
		loop: true,
		noSwiping: true,
		simulateTouch: false,
		calculateHeight: true
	});
	
	jQuery('#cover-home-left').click(function() {
		homeSwiper.swipePrev();
	});
	
	jQuery('#cover-home-right').click(function() {
		homeSwiper.swipeNext();
	});
	
});