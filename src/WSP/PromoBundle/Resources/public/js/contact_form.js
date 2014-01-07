var ContactForm = function() {

    return {
        //main function to initiate the module
        init: function() {
            var form = $('#contact_btn').closest('form');
            var error = $('.alert-danger', form);
            var success = $('.alert-success', form);

            form.validate({
                doNotHideMessage: true, //this option enables to show the error/success messages on tab switch.
                errorElement: 'p', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // focus the last invalid input
                rules: {
                    contact: {
                        required: true,
                        email: true
                    }
                },
                messages: {// custom messages for radio buttons and checkboxes
                    'contact': {
                        required: Translator.trans('contact.error.contact.required', {}, 'WSPPromo'),
                        email: Translator.trans('contact.error.contact.email', {}, 'WSPPromo')
                    }
                },
                invalidHandler: function(event, validator) { //display error alert on form submit   
                    success.hide();
                    error.show();
                },
                highlight: function(element) { // hightlight error inputs
                    $(element)
                            .closest('.form-group').removeClass('has-success').addClass('has-error'); // set error class to the control group
                },
                unhighlight: function(element) { // revert the change done by hightlight
                    $(element)
                            .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },
                success: function(label) {
                    label
                            .addClass('valid') // mark the current input as valid and display OK icon
                            .closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                },
                submitHandler: function(form) {
                    success.show();
                    error.hide();
                    ContactForm._sendRequest();
                    return false;
                }

            });
        },
        _sendRequest: function() {
            var form = $('#contact_btn').closest('form');

            $('#contact_btn').hide();
            $.post(Routing.generate('promo_request'), form.serialize(), function(response) {
                $('#contact').html(response);
            });
        }
    };

}();