var home = {
    options: {
        // unsupported warning is enabled by default altought it's
        // disabled for mobile devices (check isCompatible method)
        unsupported_warning: true
    },

    PARALLAX_MIN_WIDTH: 770,
    skrollr: null,
    networkDevices: [],

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
        // intialize network devices array
        home.networkDevices = [];
        var deviceElements = $('#device-network svg path');
        for(var i = 0; i < deviceElements.length; i++) {
            home.networkDevices.push({
                hidden: false,
                element: deviceElements[i],
                hideAt: Date.now() + Math.floor((Math.random() * 8000) + 5000),
                showAt: null
            });
        }

        home.renderDeviceNetwork();
    },

    renderDeviceNetwork: function() {
        Utils.processLargeArrayAsync(home.networkDevices, home.processNetworkDevice, 100);
        setTimeout(function() {
            home.animationFrame = Utils.requestAnimationFrame(home.renderDeviceNetwork);
        }, 100);
    },

    processNetworkDevice: function(device) {
        if (device.hidden) {
            if (device.showAt < Date.now()) {
                device.showAt = null;
                $(device.element).removeAttr('idle');
                device.hidden = false;
                device.hideAt = Date.now() + Math.floor((Math.random() * 8000) + 5000);
            }
        } else {
            if (device.hideAt && device.hideAt < Date.now()) {
                device.hideAt = null;
                $(device.element).attr('idle', true);
                device.hidden = true;
                device.showAt =  Date.now() + Math.floor((Math.random() * 2000) + 1000);
            } else if (!device.hideAt) {
                device.hideAt = Date.now() + Math.floor((Math.random() * 8000) + 5000);
            }
        }
    },

    isCompatible: function() {
        return true;
    }
};
