var code = {
    options: {
        unsupported_warning: false
    },
    pckry: null,
    
    init: function() {
        code.initCloud();
    },

    initCloud: function() {
        code.pckry = new Packery($('.cloud > ul')[0], {
            gutter: 5,
            itemSelector: 'li'
        });
        // the way stams are styled enables cloud words to appear as they 
        // were inside an elliptical container instead of a common squared 
        // dom block, something like http://cdpn.io/oLygd
        $('.stamp').each(function() {
            code.pckry.stamp(this);
            code.pckry.layout();
        });

        // popover on word click
        $('.cloud > ul > li').on('click', function(e) {
            e.stopPropagation();
            $('.cloud > ul > li').popover('destroy');
            $(this).popover({
                content: code.handleCloudWordClick,
                placement: 'bottom',
                html: true,
                container: 'body'
            });
            $(this).popover('show');
        });
        // destroys any popover when clicking outside of them
        $('body').on('click', function() {
            $('.cloud > ul > li').popover('destroy');
        });
    },

    /**
     * Returns the content for a popover according to the clicked word on the cloud
     */
    handleCloudWordClick: function() {
        var items = $.parseJSON($(this).attr('related'));
        var k, out = [];
        for (var k in items) {
            var exists = false;
            for (var i in out) {
                if (out[i]['title'] == items[k]['title']) {
                    exists = true;
                    break;
                }
            }
            if (!exists) {
                out.push(items[k]);
            }
        }
        var html = '';
        for (k in out) {
            html += 
                '<li>' +
                '  <a target="_blank" href="' + out[k]['url'] + '">' + out[k]['title'] + '</a>' +
                '  by <a  target="_blank"href="' + out[k]['user']['url'] + '">' + out[k]['user']['name'] + '</a>' + 
                '</li>';
        }
        return html;
    },

    isCompatible: function() {
        return true;
    }
};
