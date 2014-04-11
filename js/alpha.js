var alpha = {
    options: {
        unsupported_warning: false
    },
    
    init: function() {
        $('select[name="country"] > option:first-child').text('');
        $('select[name="country"]').chosen().change(function() {
            $('select[name="country"]').removeClass('error');
        });

        // jquery validation
        // @todo: include all rules using this plugin if possible and remove custom
        //        validation fields shown on code below this block
        var validator = $("#alpha").validate({
            errorLabelContainer: "#errors",
            wrapper: "p",
            rules: {
                // country field doesn't seem to be working when using chosen, 
                // added simple check at custom validation
                country: "required", 
                city: "required", 
                fname: "required",
                lname: "required",
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                country: "Please select your country.",
                city: "Please enter your city & state/province.",
                fname: "Please specify your first name.",
                lname: "Please specify your last name.",
                email: {
                    required: "We need your email address to contact you.",
                    email: "<strong>Oops!</strong> Your email looks funny, please double check its formatting."
                }
            }
        });

        // Customized validation rules
        // @todo: code them using the jquery validation as well as above lines  
        $("#alpha").on("submit", function() {
            $('fieldset.error').removeClass('error');
            if (! $('select[name="country"]').val()) {
                validator.showErrors({
                    'country': 'Please select your country.'
                });
                submiting = false;
                return false;
            }

            var isSomeDeviceChecked = false;
            $('input[type="checkbox"][name]').each(function() {
                 isSomeDeviceChecked = this.checked ? true : isSomeDeviceChecked;
            });
            if (! isSomeDeviceChecked) {
                $('fieldset:first-child').addClass('error');
                validator.showErrors({
                    'group[Devices][Android]': 'Please check your devices.'
                });
                submiting = false;
                return false;
            }
        });
        // when non-jquery validated field changes lets remove their .error class
        $('input[type="checkbox"]').on('change', function() {
            $('fieldset:first-child').removeClass('error');
        });
    },

    isCompatible: function() {
        return true;
    }
};
