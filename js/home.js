var home = {
    options: {
        // unsupported warning is enabled by default altought it's
        // disabled for mobile devices (check isCompatible method)
        unsupported_warning: true
    },

    PARALLAX_MIN_WIDTH: 770,
    skrollr: null,
    networkDevices: [],
    networkDevicesFrames: 4,
    networkDevicesCurrentFrame: 0,
    networkDevicesFrameWidth: null,

    init: function() {
        home.initDeviceNetwork();

        // let's delay parallax initialization a bit in order to let it calculate 
        // the content height better once it's fully loaded
        setTimeout(function() {
            home.initParallax();
            home.initVimeoPlayer();
            window.addEventListener('resize', home.handleResize, false);
        }, 2000);
    },

    initVimeoPlayer: function() {
        $('#main ul a').click(function() {
            $('#main ul li.current').removeClass('current');
            home.playVideo($(this).attr('href'), true);
            $(this).parent().addClass('current');
            return false;
        });
        home.playVideo($('#main ul a:eq(0)').attr('href'), false);
    },

    playVideo: function(url, autoplay) {
        var id = url.substr(url.lastIndexOf('/') + 1);
        var src = '//player.vimeo.com/video/' + id + '?title=0&amp;byline=0&amp;portrait=0&autoplay=' + autoplay;
        $('#main iframe').attr('src', src);
        return false;
    },

    initParallax: function() {
        if (!skrollr) {
            return;
        }
        if ($(window).outerWidth() >= home.PARALLAX_MIN_WIDTH) {
            home.startParallax();
        }
    },


    /**
    * Starts parallax scrolling and do some previous needed dom changes
    */
    startParallax: function() {
        if (home.skrollr) {
            return;
        }
        home.skrollr = skrollr.init();
    },

    /**
    * Destroys changes/resources made by startParallax
    */
    stopParallax: function() {
        if (home.skrollr) {
            home.skrollr.destroy();
        }
        home.skrollr = null;
    },
    /**
    * Parallax scrolling tweaks on resize, it's actually re-starting
    */
    handleResize: function() {
        if ($(window).outerWidth() < home.PARALLAX_MIN_WIDTH) {
            home.stopParallax();
        } else {
            home.startParallax();
        }
    },

    initDeviceNetwork: function() {
        // intialize network devices array
        home.networkDevices = [];
        var deviceElements = $('#device-network svg path');
        for (var i = 0; i < deviceElements.length; i++) {
            var element = deviceElements[i];
            var device = {
                hidden: false,
                element: element,
                hideAt: Date.now() + Math.floor((Math.random() * 8000) + 5000),
                showAt: null,
                siblings: []
            };
            home.networkDevices.push(device);
        }
        home.networkDevicesFrameWidth = home.networkDevices.length / home.networkDevicesFrames;

        // find device sibling paths
        for (var i = 0; i < home.networkDevices.length; i++) {
            var device = home.networkDevices[i];
            var element = device.element;
            var siblings = $(element).siblings('path');
            var notPathSiblingsCount = $(element).siblings(':not(path)').length;
            if (notPathSiblingsCount == 0) {
                for (var s = 0; s < siblings.length; s++) {
                    siblingDevice = home.findDeviceFromPathElement(siblings[s]);
                    device.siblings.push(siblingDevice);
                }
            }
        }

        home.toggleGetworkDevicesFrame();
        home.renderDeviceNetwork();
    },

    findDeviceFromPathElement: function(element) {
        for (var i = 0; i < home.networkDevices.length; i++) {
            if (home.networkDevices[i].element == element) {
                return home.networkDevices[i];
            }
        }
        return null;
    },

    toggleGetworkDevicesFrame: function() {
        home.networkDevicesCurrentFrame = home.networkDevicesCurrentFrame + 1 >= home.networkDevicesFrames ? 0 : home.networkDevicesCurrentFrame + 1;
        setTimeout(home.toggleGetworkDevicesFrame, 50);
    },

    renderDeviceNetwork: function() {
        var start = home.networkDevicesCurrentFrame * home.networkDevicesFrameWidth;
        var end = start + home.networkDevicesFrameWidth;
        var devices = home.networkDevices.slice(start, end);
        Utils.processLargeArrayAsync(devices, home.processNetworkDevice, 50);
        setTimeout(function() {
            home.animationFrame = Utils.requestAnimationFrame(home.renderDeviceNetwork);
        }, 100);
    },

    processNetworkDevice: function(device) {
        if (device.hidden) {
            if (device.showAt < Date.now()) {
                home.showDevice(device, true);
            }
        } else {
            if (device.hideAt && device.hideAt < Date.now()) {
                home.hideDevice(device, true);
            } else if (!device.hideAt) {
                device.hideAt = Date.now() + Math.floor((Math.random() * 8000) + 5000);
            }
        }
    },

    hideDevice: function(device, recurse) {
        device.hideAt = null;
        $(device.element).attr('idle', true);
        device.hidden = true;
        device.showAt =  Date.now() + Math.floor((Math.random() * 2000) + 1000);
        if (recurse && device.siblings.length) {
            for (var i = 0; i < device.siblings.length; i++) {
                var siblingDevice = device.siblings[i];
                home.hideDevice(siblingDevice, false);
            }
        }
    },

    showDevice: function(device, recurse) {
        device.showAt = null;
        $(device.element).removeAttr('idle');
        device.hidden = false;
        device.hideAt = Date.now() + Math.floor((Math.random() * 8000) + 5000);
        if (recurse && device.siblings.length) {
            for (var i = 0; i < device.siblings.length; i++) {
                var siblingDevice = device.siblings[i];
                home.showDevice(siblingDevice, false);
            }
        }
    },

    isCompatible: function() {
        return true;
    }
};
