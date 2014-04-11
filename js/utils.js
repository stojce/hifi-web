/**
 * General purposes client-side methods for HighFidelity's website
 */

var Utils = {
    mustaches: [],
    
    /**
     * Returns true when the passed mustache has already loaded, 
     * false otherwise
     */
    mustacheLoaded: function(mustacheTemplate) {
        for(var i=0; i < Utils.mustaches.length; i++) {
            if (Utils.mustaches[i].name == mustacheTemplate) {
                return true;
            }
        }
        return false;
    },
    
    /**
     * Loads the mustache from the server and stores it locally 
     */
    loadMustache: function(mustacheTemplate, fAfter) {
        if (Utils.mustacheLoaded(mustacheTemplate)) {
            return;
        }
        var tpath = 'views/mustache/' + mustacheTemplate + '.mustache.phtml';
        $.get(tpath, function(template) {
            Utils.mustaches.push({name: mustacheTemplate, template: template});
            if (typeof fAfter == 'function') {
                fAfter(template);
            }
        });
    },
    
    /**
     * Returns the mustache template if it's loaded, 
     * otherwise will return an empty string
     */
    getMustache: function(mustacheTemplate) {
        for(var i=0; i < Utils.mustaches.length; i++) {
            if (Utils.mustaches[i].name == mustacheTemplate) {
                return Utils.mustaches[i].template;
            }
        }
        return '';
    },
    
    /**
     * Parses a mustache and calls to a specified callback 
     * onced parsed if present
     */
    parseMustache: function(mustacheTemplate, data, fAfter) {
        var parsed = '';
        if (Utils.mustacheLoaded(mustacheTemplate)) {
            // faster way, requires the mustache to be previusly loaded loaded
            // will only render and then run callback
            parsed = Mustache.render(Utils.getMustache(mustacheTemplate), data);
            if (typeof fAfter == 'function') {
                fAfter(parsed);
            }
            return;
        }
        // sends an ajax request when the mustache is not yet in memory
        // will parse after response and run callback at the end
        Utils.loadMustache(mustacheTemplate, function(template) {
            parsed = Mustache.render(template, data);
            if (typeof fAfter == 'function') {
                fAfter(parsed);
            }
        });
    },

    isWebGLSupported: function () {
        try {
            return !!window.WebGLRenderingContext 
                && !!document.createElement('canvas').getContext('experimental-webgl');
        } catch(e) {
            return false;
        }
    },
    
    isCanvasSupported: function() {
        return !!window.CanvasRenderingContext2D;
    },
    
    isClientCompatible: function(view) {
        if (view && typeof view.isCompatible != 'undefined') {
            return view.isCompatible();
        } else {
            return null;
        }
    },

    now: function() {
        return Date.now ? Date.now() : new Date();
    },

    /**
     * Tries to guess whether it's running on a mobile device or not.
     *
     * Returns true if browser has a window.orientation property, otherwise will
     * compare against a regular expresion that matches most used mobile browsers.
     */
    isMobile: function() {
        var reMobile = /Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i;

        return (typeof window.orientation != 'undefined') 
            || (reMobile).test(navigator.userAgent || navigator.vendor || window.opera);
    },

    /**
     * Determines prefixes for non-standarized (or currenlty in
     * standarization) css rules, such as 'moz-' or 'webkit-'.
     */
    getStylePrefix: function() {
        if (! window.getComputedStyle) {
            return '';
        }

        var rePrefixes = /^(?:O|Moz|webkit|ms)|(?:-(?:o|moz|webkit|ms)-)/,
            cssPrefix = '';

        var styles = window.getComputedStyle(document.body, true);
        for (var i in styles) {
            cssPrefix = (i.match(rePrefixes) || (+i == i && styles[i].match(rePrefixes)));
            if (cssPrefix) {
                break;
            }
        }

        if(! cssPrefix) {
            return '';
        }

        cssPrefix = cssPrefix[0];
        if (cssPrefix.slice(0, 1) === '-') {
            return ({'-webkit-': 'webkit', '-moz-': 'Moz', '-ms-': 'ms', '-o-': 'O'})[cssPrefix];
        } else {
            return cssPrefix;
        }
    },

    /**
     * Polyfill function for requestAnimationFrame (cross-browser support)
     */
    requestAnimationFrame: function(fn) {
        var prefix = Utils.getStylePrefix().toLowerCase();
        var raf = window.requestAnimationFrame || window[prefix + 'RequestAnimationFrame'];
        var lastTime = Utils.now();
        if (Utils.isMobile() || !raf) {
            // support for most current mobile and older browsers
            raf = function(callback) {
                // how long did it take to render?
                var deltaTime = Utils.now() - lastTime;
                var delay = Math.max(0, 1000 / 60 - deltaTime);

                return window.setTimeout(function() {
                        lastTime = Utils.now();
                        callback();
                }, delay);
            };
        }
        return raf(fn);
    },

    /**
     * Polyfill function for cancelAnimationFrame (cross-browser support)
     */
    cancelAnimationFrame: function(animationFrame) {
        var prefix = Utils.getStylePrefix().toLowerCase();
        var caf = window.cancelAnimationFrame || window[prefix + 'CancelAnimationFrame'];
        if (Utils.isMobile() || !caf) {
            caf = function(timeout) {
                return window.clearTimeout(timeout);
            };
        }
        return caf(animationFrame);        
    },

};
