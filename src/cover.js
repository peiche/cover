var homeSwiper, gallerySwiper, relatedSwiper;

jQuery(document).ready(function() {
	
    // overlay
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
    
	// aesop stacked images have a default height of 500px, this matches them to window height
	jQuery('.aesop-stacked-img').height(jQuery(window).height());
    
    // clicking on header acts as "back to top" link
    jQuery('.header').click(function(e) {
        if (jQuery(e.target).closest('a').length == 0) {
            jQuery('html, body').animate({ scrollTop: jQuery('html').offset().top });
        }
    });
    
    // waypoints
    /*
    jQuery('.header').addClass('smart'); // inital class addition to make it sticky
    
    jQuery('.header').waypoint(function() {
        jQuery(this).toggleClass('smart--not-top')
    }, {
        offset: function() {
            return -(jQuery('.header').outerHeight());
        }
    });
    
    jQuery('.header').waypoint(function(direction) {
        if (direction === 'up') {
            jQuery(this).toggleClass('smart--pinned');
        } else if (direction === 'down') {
            jQuery(this).toggleClass('smart--unpinned');
        }
    }, {
        offset: function() {
            return -(jQuery('.header').outerHeight());
        }
    });
    */
    
    // headroom init
    /*
    var elem = jQuery('.header')[0];
    var headroom = new Headroom(elem, {
        //tolerance: 5,
        //offset: (jQuery('.cover').outerHeight() / 2)
        tolerance: {
            up: 0,
            down: (jQuery('.cover').outerHeight() / 2)
        }
    });
    headroom.init();
    */
    
    // skrollr init, if the user agent isn't a touch device (this is an imperfect solution)
    if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
		skrollr.init({
			forceHeight: false
		});
	}
    
    // add dropdown buttons to menus with children
    jQuery('.menu .menu-item-has-children').append('<div class="sub-menu-toggle"><i class="fa fa-angle-down"></i></div>');
    
    // hide submenus
    jQuery('.menu .menu-item-has-children .sub-menu').addClass('hide');
    
    // click event on submenu toggles
    jQuery('.menu .menu-item-has-children').on('click', '.sub-menu-toggle', function() {
        var $this = jQuery(this);
        
        $this.children('.fa-angle-down').toggleClass('fa-flip-vertical');
        $this.siblings('.sub-menu').toggleClass('hide');
    });
    
});