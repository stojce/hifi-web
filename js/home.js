var home = {
    options: {
        // unsupported warning is enabled by default altought it's
        // disabled for mobile devices (check isCompatible method)
        unsupported_warning: true
    },

    init: function() {
        // outer fade container, shown on disco mode 
        $('<div>').addClass('fade-container').prependTo('body');

        $('.person-disco-stop').on('click', function() {
            var stopButton = $(this);
            if (! stopButton.hasClass('active')) {
                // nothing to do when clicking on a disabled button
                return;
            }
            home.toggleDisco(stopButton, 'hide', true);
        });

        $('.person-disco-pause').click(function() {
            var pauseButton = $(this);
            if (! pauseButton.hasClass('active')) {
                // nothing to do when clicking on a disabled button
                return;
            }
            home.toggleDisco(pauseButton, 'hide');
        });

        $('.person-disco-play').click(function() {
            var playButton = $(this);
            if (! playButton.hasClass('active') || $('body').hasClass('shadowed')) {
                // nothing to do when either clicking on a disabled play button
                // or when also another character's audio is being played
                return;
            }
            home.toggleDisco(playButton, 'show');

            // hide disco lights when a track ends
            playButton.parent().next('audio').get(0).addEventListener("ended", function() {
                var stopButton = $('.person-disco-stop', playButton.parent());
                home.toggleDisco(stopButton, 'hide', true);
            });
        });
    },

    toggleDisco: function(button, action, ended) {
        if (action == 'hide') {
            home.hideDiscoLights();
            $('.fade-container').fadeOut(200, function() {
                // dom changes made by 'show' action are undone on 'hide' action...
                $('#main').removeClass('to-bg');
                $('#team').removeClass('on-top');
                $('body').removeClass('shadowed');
                $('.person-disco a').removeClass('disabled');
                // ... as well as audio volume 
                button.parent().next('audio').animate({volume: 0});                
                button.parent().next('audio').get(0).pause();
                if (ended) {
                    // if disco is being hidden because of a track ending we
                    // need to reset it's current position to its begining
                    // in order to be able to re-play it
                    button.parent().next('audio').get(0).currentTime = 0;
                }
            });
        } else { // action == 'show' // hey Mr. DJ, put a record on
            $('.fade-container').fadeIn(200, function() {
                button.parent().next('audio').get(0).volume = 1;
                button.parent().next('audio').get(0).play();
                $('.person-disco-play').not(button).addClass('disabled');
                $('.person-disco-pause, .person-disco-stop').not('.active').addClass('disabled');
                home.showDiscoLights();
            });
            // turn off the lights, bring da team up
            $('body').addClass('shadowed');
            $('#main').addClass('to-bg');
            $('#team').addClass('on-top');
        }
        $('a', button.parent()).toggleClass('active');
    },

    /**
     * Circles that appears to be disco lights reflectors from 
     * backside pointing to the content
     */
    showDiscoLights: function() {
        $('.disco-container').show();
        var lightColors = ['#FFFFCC', '#CCFFCC', '#FFCCCC'];
        $('.disco-circle').each(function(index) {
            // will add random coloring/positioning and speed for lights here.
            var lightColor = lightColors[Math.floor(Math.random() * lightColors.length)];
            $('.disco-circle-' + index)
                .addClass('play')
                .css('background-color', lightColor)
                .css('color', lightColor);
        });
    },

    hideDiscoLights: function() {
        $('.disco-container').hide();
        $('.disco-circle').removeClass('play');
    },
    
    isCompatible: function() {
        var audio_element = document.createElement('audio'); 
        var ret = false;
        if (audio_element.canPlayType) {
            var canPlayMp3 = !!audio_element.canPlayType 
                && "" != audio_element.canPlayType('audio/mpeg');
            var canPlayOgg = !!audio_element.canPlayType 
                && "" != audio_element.canPlayType('audio/ogg; codecs="vorbis"');
            ret = canPlayMp3 || canPlayOgg;
        }

        if (!ret && Utils.isMobile()) {
            // won't show the unsupported warning on mobile devices
            home.options.unsupported_warning = false;
        }
        return ret;
    }
};
