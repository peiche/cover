var homeSwiper, gallerySwiper, relatedSwiper;

jQuery(document).ready(function() {
	
    // overlay
    jQuery('#toggle-overlay').click(function(e) {
        e.preventDefault();
        var overlay_id = jQuery(this).attr('data-overlay-id');
		
		if (jQuery('html').hasClass('show-overlay')) {
			jQuery('html').removeClass('show-overlay');
		} else {
			jQuery('html').addClass('show-overlay');
		}
    });
    
	// aesop stacked images have a default height of 500px, this matches them to window height
	jQuery('.aesop-stacked-img').height(jQuery(window).height());
    
    // clicking on header acts as "back to top" link
    jQuery('.header').click(function(e) {
        if (jQuery(e.target).closest('a').length == 0) {
            jQuery('html, body').animate({ scrollTop: jQuery('html').offset().top });
        }
    });
    
    // headroom init
    var elem = jQuery('.header')[0];
    var headroom = new Headroom(elem);
    headroom.init();
    
    // skrollr init, if the user agent isn't a touch device (this is an imperfect solution)
    if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
		skrollr.init({
			forceHeight: false
		});
	}
    
    // add dropdown buttons to menus with children
    jQuery('.menu .menu-item-has-children').append('<div class="sub-menu-toggle"><i class="fa fa-angle-down fa-animate"></i></div>');
    
    // hide submenus
    jQuery('.menu .menu-item-has-children .sub-menu').addClass('hide');
    
    // click event on submenu toggles
    jQuery('.menu .menu-item-has-children').on('click', '.sub-menu-toggle', function() {
        var $this = jQuery(this);
        
        $this.children('.fa-angle-down').toggleClass('fa-rotate-180');
        $this.siblings('.sub-menu').toggleClass('hide');
    });
    
});