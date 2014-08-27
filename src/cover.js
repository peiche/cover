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
    
    // waypoints
    
    /*
    jQuery('.header').waypoint({
        handler: function(direction) {
            jQuery('.header').toggleClass('header--not-top');
        }
    });
    */
    
    // headroom
    
    var headroom = new Headroom(jQuery('.header')[0]);
    headroom.init();
    
    // skrollr
    
    if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
		skrollr.init({
			forceHeight: false
		});
	}
    
    // add dropdown buttons to menus with children
    
    jQuery('.menu .menu-item-has-children').append('<div class="sub-menu-toggle"><i class="fa fa-angle-down"></i></div>');
    
    jQuery('.menu .menu-item-has-children .sub-menu').addClass('hide');
    
    jQuery('.menu .menu-item-has-children').on('click', '.sub-menu-toggle', function() {
        var $this = jQuery(this);
        
        $this.children('.fa-angle-down').toggleClass('fa-flip-vertical');
        $this.siblings('.sub-menu').toggleClass('hide');
    });
    
});