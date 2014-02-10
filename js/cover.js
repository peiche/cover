jQuery(document).ready(function() {
	
	var homeSwiper = jQuery('#cover-home').swiper({
		mode: 'horizontal',
		loop: true,
		//autoPlay: 1000,
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