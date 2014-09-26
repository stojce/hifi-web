/**
 * Client side bootstrap class, attempts to run the behavior 
 * corresponding to the current page
 */

var hifi = {
    current_view: undefined,
    
    init: function() {
        // proxima-nova fonts
        if (typeof Typekit != 'undefined') {
            Typekit.load();
        }
        
        if (typeof hifi.current_view == 'undefined') {
            // no js behavior to be initialied, quiting...
            return;
        }
        
        // view-specific js behavior present
        // let's check for compatibility and then run
        if (Utils.isClientCompatible(hifi.current_view)) {
            hifi.current_view.init();

        // if not compatible show the unsupported warning only if enabled on the view
        } else if (hifi.current_view.options.unsupported_warning) {
            Utils.parseMustache('client-not-supported', {}, function(parsed) {
                $('body').append(parsed);
                $('#not-supported').modal({
                    keyboard: false,
                    backdrop: 'static'
                });
                
                // on unsupported warning, users are still enabled to run the specific
                // behavior that seems to use unsupported resources at their own risk
                $('#initialize-view').click(function(event) {
                    event.preventDefault();
                    $('#not-supported').modal('hide');
                    hifi.current_view.init();
                    return false;
                });
            });
        }
    }
};
