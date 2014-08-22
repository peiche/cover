var homeSwiper, gallerySwiper, relatedSwiper;

jQuery(document).ready(function() {
	
    // overlays
    
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
    
	// aesop
	
	jQuery('.aesop-stacked-img').height(jQuery(window).height());
    
    // back to top
    
    jQuery('.header').click(function(e) {
        if (jQuery(e.target).closest('a').length == 0) {
            jQuery('html, body').animate({ scrollTop: jQuery('html').offset().top });
        }
    });
    
    // headroom
    
    var headroom = new Headroom(jQuery('.header')[0]);
    headroom.init();
    
    // skrollr
    
    skrollr.init({
        forceHeight: false
    });
    
});