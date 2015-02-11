var home = {
    options: {
        // unsupported warning is enabled by default altought it's
        // disabled for mobile devices (check isCompatible method)
        unsupported_warning: true
    },

    PARALLAX_MIN_WIDTH: 770,
    skrollr: null,

    processedDevices: [],

    init: function() {
        // let's delay parallax initialization a bit in order to let it calculate 
        // the content height better once it's fully loaded
        setTimeout(function() {
            home.initParallax();
            window.addEventListener('resize', home.handleResize, false);
        }, 2000);

        $('#placenames select').bind('change', home.refreshRequirements).chosen({
            disable_search_threshold: 100
        });
        home.suggestPackage();
        home.refreshRequirements();

        $('#placenames ul').scrollTop(0);

        $('#placenames form button[type="submit"], #placenames a[href="./subscribe"]').click(function (event) {
            if ($(this).attr('name') != 'subscribe' || $(this).attr('href') == './subscribe') {
                $('#placenames form').addClass('submitted');
                return false;
            } else {

            }
        });
        $('#downloadfade, #downloadfade button.close').bind('click', function(event) {
            if (this == event.target) {
                $(this).parents('form').removeClass('submitted');
                return false;
            }
        });

        $('#placenames form').bind('submit', function () {
            if ($('#placenames form input:invalid').length) {
                $('<label>').html(
                    '<strong>Your email looks funny,</strong> please double check its formatting.'
                ).insertAfter('#placenames form input + button');
                return false;
            }
        });

        $('#placenames > article:first-child ul > li:nth-child(5)').click(function (event) {
            $('#placenames').addClass('expanded');
        });

        $('#placenames ul > li > a').bind('click', function(event) {
            event.preventDefault();
            var options = {
                img: $('img', this).attr('src'),
                bigImg: $('img', this).attr('src').replace('/small/', '/'),
                url: $(this).attr('href')
            };
            Utils.parseMustache('place-modal', options, function(parsed) {
                $('body').append(parsed);
                $('#place-modal').modal().on('hidden.bs.modal', function () {
                    $(this).remove();
                });
                $('#place-modal a[href="#subscribe"]').bind('click', function() {
                    $('#place-modal').modal('hide');
                    $('#placenames form').addClass('submitted');
                    $(document).scrollTop($('#placenames form').offset().top);
                    return false;
                });
            });            
            return false;
        });
    },

    refreshRequirements: function() {
        $('#placenames select').each(function () {
            var value = $(this).val();
            var text = (value.match(/pkg|exe/i) ? $('h4', $(this).parent()).text() : '') + (
                value.match(/pkg/i)
                    ? ' requires Mountain Lion (10.8) or newer'
                    : (
                        (value.match(/exe/i)) 
                            ? ' requires Windows 7 or newer'
                            : ''
                    )
            );
            $('p', $(this).parent()).html(text);        
        });
    },

    suggestPackage: function() {
        $('#placenames form select').val('');
        var ua = navigator.userAgent;
        var appVersion = navigator.appVersion;
        if (ua.match("Win")) {
            $('#placenames form select').val('exe');
            return;
        }
        if (ua.match("Mac")) {
            $('#placenames form select').val('pkg');
            return;
        }
        /*
        if (ua.match("Linux") || appVersion.match("X11")) {
            var rpmRegex = /CentOS|Fedora|Mandriva|Red Hat/i;
            var debRegex = /Debian|Ubuntu|Kubuntu/i;
            if (ua.match(rpmRegex)) {
                $('#placenames form select').val('rpm').change();
                return;
            }
            if (ua.match(debRegex)) {
                $('#placenames form select').val('deb').change();
                return;
            }
            $('#placenames form select').val('tgz').change();
            return;
        }
        */
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

    isCompatible: function() {
        return true;
    }
};
