var company = {
    PARALLAX_MIN_WIDTH: 770,
    options: {
        unsupported_warning: true
    },
    volumeValues: Array(),
    volumeValuesTimes: Array(),
    dancer: null,
    volumeKnobInitialVolume: 0.5,
    volumeKnobMaxAngel: 135,
    volumeKnobMark: null,
    volumeKnobDrag: null,
    playing: false,
    paused: false,
    skrollr: null,

    init: function() {
        try {
            $('body').removeClass('no-dancer');
            $('html').addClass('dancer');
            
            if (skrollr) {
                company.initParallax();
            }
            
            Dancer.setOptions({
                flashSWF : 'js/dancerjs/lib/soundmanager2.swf',
                flashJS  : 'js/dancerjs/lib/soundmanager2.js'
            });
            company.dancer = new Dancer();            
            company.dancer.load($('audio#HifiAmbientNoise')[0]);

            // update callback on the audio player to get a waveform and then
            // generate a volume values table readable by the vu-meter
            company.dancer.bind('update', function() {
                var waveform = company.dancer.getWaveform();
                var length = waveform.length;
                var sum = 0

                for (var i = 0; i < length; i++) {
                    sum += Math.abs(waveform[i]);
                }

                var volumeFromVolumeKnob = company.dancer.getVolume();
                var avg = (sum / length) * volumeFromVolumeKnob;
            
                var volume = 20 * Math.log(avg) / Math.log(10);
                var timestamp = Date.now();

                company.volumeValues.push(volume);
                company.volumeValuesTimes.push(timestamp);
            });
            
            var hifiAudioNeedleOrigin = {
                x: 320.5,
                y: 167.375698937719
            };
            var hifiAudioVolumeKnobOrigin = {
                x: 117.096,
                y: 114
            };
            
            var hifiAudioNeedle = d3.selectAll("#hifi-audio-needle");
            
            company.playing = false;
            company.paused = false;
            
            d3.selectAll('#hifi-audio-play-button').on("click", function () {
                if (company.playing && !company.paused) {
                    // already playing
                    return;
                }
                company.playAudio();
                company.playing = true;
                company.paused = false;
            });
            
            d3.selectAll('#hifi-audio-pause-button').on("click", function () {
                if (!company.playing && !company.paused) {
                    // stopped, nothing to pause
                    return;
                }
                if (company.paused) {
                    // paused, let's play
                    company.playAudio();
                    company.paused = false;
                } else {
                    // playing, will pause
                    company.pauseAudio();
                    company.paused = true;
                }
            });
            
            // volume knoob behavior
            company.volumeKnobMark = d3.selectAll('.hifi-audio-volume-knob-mark');
            company.volumeKnobDrag = d3.behavior
                .drag()
                .on("drag", function (d) {
                    d.hifiX += d3.event.dx;
                    d.hifiY += d3.event.dy;
                
                    var angle = d.hifiY * -1.5;
                    angle = Math.max(-company.volumeKnobMaxAngel, angle);
                    angle = Math.min(company.volumeKnobMaxAngel, angle);
                
                    var volume = (angle + company.volumeKnobMaxAngel) / (2 * company.volumeKnobMaxAngel);
                
                    company.dancer.setVolume(volume);
                
                    company.volumeKnobMark.attr(
                        "transform", "rotate(" + angle + ", " + hifiAudioVolumeKnobOrigin.x + ", " + hifiAudioVolumeKnobOrigin.y + ")"
                    );
                });
            
            if (!company.dancer.isLoaded()) {
                company.dancer.bind('loaded', company.dancerLoaded);
            } else {
                company.dancerLoaded();
            }
            
            var d = [{ hifiX: 0, hifiY: 0 }];
            d3.selectAll('.hifi-audio-volume-knob')
                .data(d)
                .call(company.volumeKnobDrag);
            
            // vu-meter animation loop
            var lastAngle = 0;
            setInterval(function() {
                var volume = company.getVolume();
                volume /= 2;
                volume -= 10;
                
                volume = Math.max(-25, volume);
                volume = Math.min(3, volume);
                
                var angle = (volume + 25) * 100. / 28;
                
                hifiAudioNeedle.transition().duration(0);
                
                hifiAudioNeedle
                    .transition()
                    .duration(100)
                    .attrTween("transform", function tween(d, i, a) {
                        return d3.interpolateString(
                            hifiAudioNeedle.attr("transform"),
                            "rotate(" + angle + ", " + hifiAudioNeedleOrigin.x + ", " + hifiAudioNeedleOrigin.y + ")"
                        );
                    });
                
                lastAngle = angle;
            }, 50);
        } catch (err) {
            console.log('hifi-audio-error:', err)
        }
    },

    /**
     * Initializes parallax scrolling (skrollr)
     */
    initParallax: function() {
        if ($(document).outerWidth() >= company.PARALLAX_MIN_WIDTH) {
            company.startParallax()
        }
        window.addEventListener('resize', company.handleResize, false);
    },

    /**
     * Starts parallax scrolling and do some previous needed dom changes
     */
    startParallax: function() {
        if (company.skrollr) {
            company.stopParallax();
        }
        $('#navbar').attr({
            "data-0": "top: 0px; display: block;",
            "data-200": "top: -150px; display: none;" 
        });
        $('footer#site-links').attr({
            "data-0": "bottom: -100%; display: block;",
            "data-250-end": "bottom: -100%; display: block;",
            "data-end": "bottom: 0px; display: block;"
        });
        var skrollrDiv = $('<div>').attr('id', 'skrollr-body').css({
            width: '100%',
            height: '100%'
        });
        $('#navbar, #container').wrapAll(skrollrDiv);
        company.skrollr = skrollr.init();
    },

    /**
     * Destroys changes/resources made by startParallax
     */
    stopParallax: function() {
        if (company.skrollr) {
            company.skrollr.destroy();
        }
        $('#skrollr-body > #navbar').unwrap();
        $('#navbar').removeAttr('data-0 data-200');
        $('footer#site-links').removeAttr('data-0 data-250-end data-end');
    },

    /**
     * Parallax scrolling tweaks on resize, it's actually re-starting
     */
    handleResize: function() {
        if ($(document).outerWidth() < company.PARALLAX_MIN_WIDTH) {
            company.stopParallax();
        } else {
            company.startParallax();
        }
    },
    
    /**
     * Get volume level from the audio player, used by the vu-meter
     */
    getVolume: function() {
        var trashHoldTime = Date.now() - 100;
        
        while (company.volumeValuesTimes[0] !== undefined && company.volumeValuesTimes[0] < trashHoldTime) {
            company.volumeValues.shift();
            company.volumeValuesTimes.shift();
        }
        
        var volumeSum = 0;
        var numberOfValues = company.volumeValues.length;
        var avgVolume = -90;
        if (numberOfValues > 0) {
            for (var i = 0; i < numberOfValues; i++) {
                volumeSum += company.volumeValues[1];
            }
            avgVolume = volumeSum / numberOfValues;
        }
        
        avgVolume += 35;
        
        if (isNaN(avgVolume)) {
            avgVolume = -10000;
        }
        return avgVolume;
    },
    
    /**
     * Rock and roll
     */
    playAudio: function() {
        company.dancer.play();
        $('#hifi-audio').removeClass('paused');
        $('#hifi-audio').addClass('playing');
        $('#hifi-greenlight').css({'animation' : 'none', '-webkit-animation' : 'none'});
    },
    
    /**
     * Pause audio wrapper
     */
    pauseAudio: function() {
        company.dancer.pause();
        $('#hifi-audio').addClass('paused');
        $('#hifi-audio').removeClass('playing');
    },
    
    /**
     * Callback method for dancer loaded
     */
    dancerLoaded: function() {
        company.dancer.setVolume(company.volumeKnobInitialVolume);
        // end audio callback
        var endAudio = function () {
            company.playing = false;
            $('#hifi-audio').removeClass('playing');
        };
        // makes sure that the audio player is stopped when the track ends
        if (typeof company.dancer.audio.onposition == 'function') {
            company.dancer.audio.onposition(company.dancer.audio.duration, endAudio);
        } else {
            $(company.dancer.audio).bind('ended', endAudio);
        }
    },
    
    isCompatible: function() {
        if (Utils.isMobile()) {
            // won't show the unsupported warning on mobile devices
            company.options.unsupported_warning = false;
            return false;
        }

        var dancerSupported = false;
        
        var dancerDriver = Dancer.isSupported();
        if (dancerDriver) {
            if (dancerDriver === 'flash') {
                dancerSupported = DetectFlashVer(11, 7, 0);
            } else {
                dancerSupported = true;
            }
        }
        
        return dancerSupported && skrollr;
    }
};