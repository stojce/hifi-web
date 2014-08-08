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
        home.initDeviceNetwork();
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

    initDeviceNetwork: function() {
        home.currentDevicesFrame = (Math.floor((Math.random() * 4) + 1));
        home.renderDeviceNetwork();
    },

    toggleDevicesFrame: function() {
        home.currentDevicesFrame = home.currentDevicesFrame +1 > 4 ? 1 : home.currentDevicesFrame +1;
        setTimeout(function() {
            home.toggleDevicesFrame();
        }, 100);
    },

    renderDeviceNetwork: function() {
        var devices_filter = ':nth-child(4n+' + home.currentDevicesFrame + ')';
        var devices = $('#device-network svg path' + devices_filter);
        Utils.processLargeArrayAsync(devices, home.processNetworkDevice, 50);
        setTimeout(function() {
            home.animationFrame = Utils.requestAnimationFrame(home.renderDeviceNetwork);
        }, 25);
    },

    processNetworkDevice: function(device) {
        if ($(device).css('display') == 'none') {
            if ($(device).attr('showAt') < Date.now()) {
                $(device).removeAttr('showAt');
                $(device).fadeIn();
                $(device).attr('hideAt', Date.now() + Math.floor((Math.random() * 8000) + 5000));
            }
        } else {
            if ($(device).attr('hideAt') && $(device).attr('hideAt') < Date.now()) {
                $(device).removeAttr('hideAt');
                $(device).attr('showAt', Date.now() + Math.floor((Math.random() * 2000) + 1000));
                $(device).fadeOut();
            } else {
                if (!$(device).attr('hideAt')) {
                    $(device).attr('hideAt', Date.now() + Math.floor((Math.random() * 8000) + 5000));
                }
            }
        }
    },

    isCompatible: function() {
        return true;
    }
};
