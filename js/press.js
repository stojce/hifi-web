var press = {
    options: {
        unsupported_warning: false
    },

    init: function() {
        var zoomLevel = press.zoomLevelForCurrentScreenSize();
        press.initGameOfLife(zoomLevel);
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
            press.restartGameOfLife(zoomLevel);
        }
    },

    restartGameOfLife: function(zoomLevel) {
        GOL.handlers.buttons.clear();
        setTimeout(function() {
            GOL.autoplay = true;
            press.initGameOfLife(zoomLevel);
        }, 10);
    },

    zoomLevelForCurrentScreenSize: function() {
        return window.matchMedia('only screen and (max-width: 530px)').matches ? 4
              : window.matchMedia('only screen and (max-width: 770px)').matches ? 3
                : 2;
    },

    isCompatible: function() {
        return true;
    }
};
