var names = {
    SHOWN_PLACES_COUNT: 23,
    RESORT_INTERVAL: 1, // seconds
    UPDATE_INTERVAL: 300, // seconds

    options: {
        unsupported_warning: false
    },

    profanity: [],
    places: [],
    lastUpdate: 0,
    updating: false,
    shownPlacesFrom: 0,
    sortedPlaces: [],
    lastResort: 0,

    init: function () {
        names.loadProfanity(function () {
            names.render();
        });
    },

    render: function () {
        if (!names.updating && (!names.lastUpdate || names.UPDATE_INTERVAL < (new Date().getTime() / 1000) - names.lastUpdate)) {
            names.update();
        }
        var resorted = false;
        if (names.places.length && (!names.lastResort || names.RESORT_INTERVAL < (new Date().getTime() / 1000) - names.lastResort)) {
            names.resort();
            resorted = true;
        }
        if ((names.places.length && !names.sortedPlaces.length) || resorted) {
            if (!$('#recentnames').length) {
                $('<section>').attr('id', 'recentnames').insertBefore('#container');
                $('<ul>').appendTo('#recentnames');
            }
            names.sortedPlaces = names.sortPlaces(names.shownPlacesFrom, names.SHOWN_PLACES_COUNT);
            $('#recentnames > ul > li').remove();
            for (var i = 0; i < names.sortedPlaces.length; i++) {
                $('<li>').html(names.sortedPlaces[i]).appendTo('#recentnames > ul');
            }
        }
        setTimeout(names.render, 1000);
    },

    resort: function () {
        names.shownPlacesFrom++;
        if (names.shownPlacesFrom > names.places.length) {
            names.shownPlacesFrom = 0;
        }
        names.lastResort = new Date().getTime() / 1000;
    },

    sortPlaces: function (from, count) {
        var i = 0;
        var sorted = [];
        var middlePlace = parseInt(count / 2);
        var sortIndex = middlePlace;
        var namesOffset = from + count;
        var namesIndex = namesOffset - (namesOffset >= names.places.length ? names.places.length : 0);
        sorted[sortIndex] = names.places[namesIndex];
        for (var i = 0; i < count -1; i++) {
            namesOffset = from + count - i -1;
            namesIndex = namesOffset - (namesOffset >= names.places.length ? names.places.length : 0);
            sortIndex = middlePlace + parseInt(((i+1) / 2) + ((i+1) % 2)) * ((namesIndex + 2) % 2 ? 1 : -1);
            sorted[sortIndex] = names.places[namesIndex];
        }
        return sorted;
    },

    needsUpdate: function (places) {
        return places.filter(function (i) {
            return names.places.indexOf(i) < 0;
        });
    },

    needsUpdate: function (places) {
        return places.filter(function (i) {
            return names.places.indexOf(i) < 0;
        });
    },

    update: function (fAfter) {
        if (names.updating) {
            return false;
        }
        names.updating = true;
        var url = 'https://metaverse.highfidelity.io/api/v1/new_place_names';
        $.getJSON(url, function (json) {
            var updated_places = json.data.new_place_names;
            if (diff = names.needsUpdate(updated_places)) {
                names.places = names.places.concat(diff);
            }
            names.lastUpdate = new Date().getTime() / 1000;
            names.updating = false;
        });
    },

    hasProfanity: function (word) {
        var regex = new RegExp(names.profanity.join('|'));
        return word.search(regex) > -1;
    },

    loadProfanity: function (fAfter) {
        $.get('./profanity.txt', function(data) {
            names.profanity = data.split("\n");
            if (fAfter) {
                fAfter();
            }
        });
    },

    isCompatible: function () {
        return true;
    }
};
