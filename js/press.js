var press = {
    options: {
        unsupported_warning: false
    },

    init: function() {
        var zoomLevel = press.zoomLevelForCurrentScreenSize();
        if (zoomLevel) {
            press.initGameOfLife(zoomLevel);
        }
        window.addEventListener('resize', press.handleResize, false);
    },

    initGameOfLife: function(zoomLevel) {
        press.zoomLevel = zoomLevel;
        GOL.init({
            zoom: zoomLevel
        });
    },

    handleResize: function() {
        var zoomLevel = press.zoomLevelForCurrentScreenSize();
        if (zoomLevel != press.zoomLevel) {
            if (!zoomLevel) {
                press.stopGameOfLife();
            } else {
                press.restartGameOfLife(zoomLevel, press.zoomLevel);
            }
        }
    },

    restartGameOfLife: function(zoomLevel, prevZoom) {
        if (typeof prevZoom != 'undefined' && prevZoom) {
            press.stopGameOfLife();
        }
        setTimeout(function() {
            GOL.autoplay = true;
            press.initGameOfLife(zoomLevel);
        }, 10);
    },

    stopGameOfLife: function() {
        GOL.handlers.buttons.clear();
    },

    zoomLevelForCurrentScreenSize: function() {
        return window.matchMedia('only screen and (max-width: 530px)').matches ? 0
              : window.matchMedia('only screen and (max-width: 770px)').matches ? 3
                : 2;
    },

    isCompatible: function() {
        return true;
    }
};
