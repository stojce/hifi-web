var home = {
    options: {
        // unsupported warning is enabled by default altought it's
        // disabled for mobile devices (check isCompatible method)
        unsupported_warning: true
    },

    processedDevices: [],

    init: function() {
        smoothScroll.init();
        $('#placenames select').bind('change', home.refreshRequirements).chosen({disable_search_threshold: 100});
        window.addEventListener('resize', function() {
            $('#placenames select').chosen('destroy').chosen({disable_search_threshold: 100});
        }, false);
        home.suggestPackage();
        home.refreshRequirements();

        $('#placenames form button[type="submit"], #placenames a[href="./subscribe"]').bind('click', function (event) {
            if ($(this).attr('name') != 'subscribe' || $(this).attr('href') == './subscribe') {
                $('#placenames form').addClass('submitted');
                return false;
            }
        });
        $('#downloadfade, #downloadfade button.close, #downloadfade button.close span').bind('click', function(event) {
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

        $('#placenames > article:first-child ul + button').bind('click', function (event) {
            $('#placenames').addClass('expanded');
        });

        $('#owl-carousel a[href^="hifi://"]').bind('click', function(event) {
            event.preventDefault();
            var options = {
                img: $('img', this).attr('src'),
                bigImg: $('img', this).attr('hdsrc'),
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

        $('#email-signup')
            .on('focus', function () {
                this.placeholder = 'email address';
            })
            .on('blur', function () {
                this.placeholder = 'Subscribe to us';
            });

        $("#owl-carousel").owlCarousel({
            items: 3.2,
            itemsDesktop : [1199, 3],
            itemsDesktopSmall : [991, 2.7],
            itemsTablet : [768, 1.4],
            itemsTabletSmall : false,
            itemsMobile : [479, 1.3],
        });

    },

    refreshRequirements: function() {
        $('#placenames select').each(function () {
            $(this).trigger('chosen:updated');
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
            $('#placenames form select').val('exe').change();
            return;
        }
        if (ua.match("Mac")) {
            $('#placenames form select').val('pkg').change();
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

    isCompatible: function() {
        return true;
    }
};
