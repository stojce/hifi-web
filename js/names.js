var names = {
    options: {
        unsupported_warning: false
    },

    profanity: [],

    MAX_TEXT_HEIGHT: 30,
    MAX_PLACE_NAMES: 25,
    // TAG_START_DIST needs to be large enough to avoid collision
    // with other tags
    TAG_START_DIST: 800,
    TAG_MARGIN: [3, 3],
    TAG_PADDING: [16, 8],
    TAG_COLOUR: '96, 148, 197',

    tagCloud: null,

    init: function () {
        names.loadProfanity(function() {
            tagCloud = new TagCloud(
                $('#recentnames > canvas')[0],
                names.TAG_START_DIST,
                names.TAG_MARGIN,
                names.TAG_PADDING,
                names.TAG_COLOUR
            );
            names.displayNewPlaceNames();
        });
    },

    displayNewPlaceNames: function () {
        var url = 'https://metaverse.highfidelity.io/api/v1/new_place_names';
        $.getJSON(url, function (data) {
            var placeNames = String(data['data']['new_place_names']).split(',');
            placeNames.shuffle();
            if (placeNames.length > names.MAX_PLACE_NAMES) {
                placeNames.slice(0, names.MAX_PLACE_NAMES);
            }

            tagCloud.clear();

            var tmp, textHeight;
            for (var i = 0; i < placeNames.length; i++) {
                tmp = i / placeNames.length;
                if (tmp < 0.2) {
                    textHeight = Math.round(names.MAX_TEXT_HEIGHT * 0.8);
                } else if (tmp < 0.4) {
                    textHeight = Math.round(names.MAX_TEXT_HEIGHT * 0.6);
                } else {
                    textHeight = Math.round(names.MAX_TEXT_HEIGHT * 0.4);
                }
                tagCloud.createTag(placeNames[i], textHeight);
            }
            setTimeout(names.displayNewPlaceNames, 10000);
        });
    },

    hasProfanity: function (word) {
        var regex = new RegExp(names.profanity.join('|'));
        return word.search(regex) > -1;
    },

    loadProfanity: function(fAfter) {
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

/**
 * Compares two arrays
 * Returns true if equal
 * false otherwise
 */
Array.prototype.equals = function (array) {
    if (!array) {
        return false;
    }

    if (this.length != array.length) {
        return false;
    }

    for (var i = 0; i < this.length; i++) {
        if (this[i] != array[i]) {
            return false;
        }
    }
    return true;
};

/**
 * Randomly resorts array
 */
Array.prototype.shuffle = function () {
    var j, tmp;
    for (var i = 0; i < this.length; i++) {
        // Random Integer between 0 and array length - 1
        j = Math.round(Math.random() * (this.length - 1));

        // If i and j are equal no point swaping
        if (i != j) {
            tmp = this[j];
            this[j] = this[i];
            this[i] = tmp;
        }
    }
};

/**
 * Returns the last element of an array
 */
Array.prototype.last = function () {
    if (this.length == 0) {
        return null;
    }
    return this[this.length - 1];
};

/******************** Tag ********************/
function Tag (tagCloud, text, textHeight, pos) {
    this.tagCloud = tagCloud;
    this.text = text;
    this.textHeight = textHeight;
    this.pos = pos;

    if (tagCloud.context.font.split(' ')[0] != textHeight + 'px') {
        tagCloud.context.font = textHeight + 'px proxima-nova, sans-serif';
    }
    this.textWidth = tagCloud.context.measureText(text).width;
};

/**
 * Returns the angle in radians from Tag to pos
 */
Tag.prototype.getAngleTo = function (pos) {
    var x = this.pos[0] - pos[0];
    var y = this.pos[1] - pos[1];

    return Math.atan2(y, x);
};

/**
 * Checks this Tag against another Tag
 * Returns true if collision is detected
 * false otherwise
 */
Tag.prototype.hasCollision = function (tag) {
    // Find distance in the y between center of this and center of supplied placename
    var yDist = Math.abs(this.pos[1] - tag.pos[1]);
    // Subtract the minimum distance in the y to disallow collision
    yDist -= (this.textHeight + tag.textHeight) / 2 + (this.tagCloud.tagPadding[1] + this.tagCloud.tagMargin[1]) * 2;

    // If positive or zero then no collision
    // If negative need to check x
    if (yDist >= 0) {
        return false;
    }

    // Repeat for x
    var xDist = Math.abs(this.pos[0] - tag.pos[0]);
    xDist -= (this.textWidth + tag.textWidth) / 2 + (this.tagCloud.tagPadding[0] + this.tagCloud.tagMargin[0]) * 2;

    // If negative collision detected
    if (xDist < 0) {
        return true;
    }
    // Otherwise no collision
    return false;
};

/**
 * Returns coordinates of top left corner and bottom right corner (Canvas origin is top left)
 * as array [topLeftX, topLeftY, BottomRightX, BottomRightY]
 */
Tag.prototype.getBoundingBox = function () {
    var box = [
        Math.floor(this.pos[0] - (this.textWidth / 2 + this.tagCloud.tagPadding[0])),
        Math.floor(this.pos[1] - (this.textHeight / 2 + this.tagCloud.tagPadding[1])),
        Math.ceil(this.pos[0] + (this.textWidth / 2 + this.tagCloud.tagPadding[0])),
        Math.ceil(this.pos[1] + (this.textHeight / 2 + this.tagCloud.tagPadding[1]))
    ];

    return box;
};

/******************** TagCloud ********************/
function TagCloud (canvas, tagStartDist, tagMargin, tagPadding, tagColour) {
    this.canvas = canvas;
    this.tagStartDist = tagStartDist;
    this.tagMargin = tagMargin;
    this.tagPadding = tagPadding;
    this.tagColour = tagColour;

    this.tags = new Array();

    this.context = canvas.getContext('2d');
    this.center = [canvas.width/2, canvas.height/2];

    this.angles = [
        Math.PI / 6,
        5 * Math.PI / 6,
        7 * Math.PI / 6,
        11 * Math.PI / 6,
        Math.PI / 9,
        8 * Math.PI / 9,
        10 * Math.PI / 9,
        17 * Math.PI / 9
    ];

    this.context.textAlign = 'center';
    this.context.textBaseline = 'middle';
};

TagCloud.prototype.clear = function () {
    //Clear the canvas
    this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);

    // Empth the tags array
    while (this.tags.length != 0) {
        this.tags.pop();
    }
};

TagCloud.prototype.createTag = function (text, textHeight) {
    if (names.hasProfanity(text)) {
        return;
    }

    var tag;
    if (this.tags.length == 0) {
        tag = new Tag(
            this,
            text,
            names.MAX_TEXT_HEIGHT,
            this.center
        );
    } else {
        var angle = this.angles[this.tags.length % this.angles.length];
        var pos = this.center.slice();
        pos[0] += this.tagStartDist * Math.cos(angle);
        pos[1] += this.tagStartDist * Math.sin(angle);

        tag = new Tag(this, text, textHeight, pos);
        this.applyGravity(tag);
    }
    this.drawTag(tag);
    this.tags.push(tag);
};

TagCloud.prototype.applyGravity = function (tag) {
    var dist = 32;
    var theta, dx, dy;
    var previousPositions = new Array();
    var stillMoving, bouncing = false;

    // Had an issue in which the Tag was
    // bouncing between two or three positions
    do {
        // Record of previous positions
        previousPositions.push(tag.pos.slice());

        // Get angle to center
        theta = tag.getAngleTo(this.center);
        // Break into components
        dx = Math.round(-dist*Math.cos(theta));
        dy = Math.round(-dist*Math.sin(theta));

        // Move tag
        this.moveTag(tag, 1, dy);
        this.moveTag(tag, 0, dx);

        // Check if Tag actually moved
        stillMoving = !tag.pos.equals(previousPositions.last());
        // Check if revisiting old positions (bouncing)
        for (var i = previousPositions.length - 2; i >= 0; i--) {
            if (tag.pos.equals(previousPositions[i])) {
                bouncing = true;
                break;
            }
        }

        // If no movement occured and dist is greater than one
        if (!stillMoving && dist > 1) {
            // Attempt a smaller movement next time
            dist /= 2;
            // Prevent do-while loop ending
            stillMoving = true;
            bouncing = false;
        }
    } while (stillMoving && !bouncing);
};

/**
 * Attempts to move Tag dist in axis direction (0=x, 1=y)
 * Fails if the move would cause collision
 */
TagCloud.prototype.moveTag = function (tag, axis, dist) {
    // No point wasting processor time if dist is zero
    if (dist == 0) {
        return false;
    }

    // Add dist to center's coordinate
    tag.pos[axis] += dist;

    // If collision results, revert change and return false
    if (this.hasCollision(tag)) {
        tag.pos[axis] -= dist;
        return false;
    }
    return true;
};

TagCloud.prototype.hasCollision = function (tag) {
    for (var i = 0; i < this.tags.length; i++) {
        if (tag.hasCollision(this.tags[i])) {
            return true;
        }
    }
    return false;
};

/**
 * Draws Tag on canvas
 */
TagCloud.prototype.drawTag = function (tag) {
    // Radius of corners
    var radius = 3;

    var box = tag.getBoundingBox();
    if (!box) {
        return;
    }

    // Check if Tag is outside of canvas
    // Don't want to display if Tag is cut off
    if (box[0] < 0 || box[1] < 0 || box[2] > this.canvas.width || box[3] > this.canvas.height) {
        return;
    }

    // Find transparency based on text height
    var alpha = tag.textHeight / names.MAX_TEXT_HEIGHT;

    // Set colour and transparency
    this.context.fillStyle = "rgba(" + this.tagColour + "," + alpha + ")";
    this.context.strokeStyle = this.context.fillStyle;

    // Draw the text
    this.context.fillText(tag.text, tag.pos[0], tag.pos[1]);

    // Draw the box
    this.context.beginPath();
    this.context.moveTo(box[0] + radius, box[1]);
    this.context.lineTo(box[2] - radius, box[1]);
    this.context.arcTo(box[2], box[1], box[2], box[1] + radius, radius);
    this.context.lineTo(box[2], box[3] - radius);
    this.context.arcTo(box[2], box[3], box[2] - radius, box[3], radius);
    this.context.lineTo(box[0] + radius, box[3]);
    this.context.arcTo(box[0], box[3], box[0], box[3] - radius, radius);
    this.context.lineTo(box[0], box[1] + radius);
    this.context.arcTo(box[0], box[1], box[0] + radius, box[1], radius);
    this.context.stroke();
};
