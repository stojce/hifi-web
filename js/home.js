var home = {
    options: {
        // unsupported warning is enabled by default altought it's
        // disabled for mobile devices (check isCompatible method)
        unsupported_warning: true
    },

    PARALLAX_MIN_WIDTH: 770,
    skrollr: null,

    init: function() {
        if (skrollr) {
            home.initParallax();
        }
    },

    initParallax: function() {
        if ($(document).outerWidth() >= home.PARALLAX_MIN_WIDTH) {
            home.startParallax();
        }
        window.addEventListener('resize', home.handleResize, false);
    },


    /**
    * Starts parallax scrolling and do some previous needed dom changes
    */
    startParallax: function() {
        if (home.skrollr) {
            home.stopParallax();
        }
        var skrollrDiv = $('<div>').attr('id', 'skrollr-body').css({
            width: '100%',
            height: '100%'
        });
        $('#navbar, #container').wrapAll(skrollrDiv);
        home.skrollr = skrollr.init();
    },

    /**
    * Destroys changes/resources made by startParallax
    */
    stopParallax: function() {
        if (home.skrollr) {
            home.skrollr.destroy();
        }
        $('#skrollr-body > #navbar').unwrap();
    },
    /**
    * Parallax scrolling tweaks on resize, it's actually re-starting
    */
    handleResize: function() {
        if ($(document).outerWidth() < home.PARALLAX_MIN_WIDTH) {
            home.stopParallax();
        } else {
            home.startParallax();
        }
    },

    isCompatible: function() {
        return true;
    }
};
