var homeSwiper, gallerySwiper, relatedSwiper;

jQuery(document).ready(function() {
	
    jQuery('.toggle-overlay').click(function(e) {
        e.preventDefault();
        
        var overlay_class = jQuery(this).attr('data-overlay-class');
        jQuery('html').addClass('show-overlay');
        jQuery('#' + overlay_class).addClass('show');
    });
    
    jQuery('.overlay-close').click(function(e) {
        e.preventDefault();
        
        jQuery('html').removeClass('show-overlay');
        jQuery('.overlay').removeClass('show');
    });
    
	// waypoints
    
    jQuery('img[alt="Fork me on GitHub"]').hide();
    
    jQuery('#page').waypoint({
        handler: function(direction) {
            jQuery('.backtotop').toggleClass('show');
            jQuery('img[alt="Fork me on GitHub"]').fadeToggle(200);
        }
    });
    
    // aesop
	
	jQuery('.aesop-stacked-img').height(jQuery(window).height());
    
});