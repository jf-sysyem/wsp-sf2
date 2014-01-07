jQuery.validator.addMethod("telefono", function(value) {
    // espressione migliorabile... ma sufficiente per il nostro esempio
    var regex = /^([\(]?(00|\+)[0-9]{1,5}[\)]?[ ]?)?[0-9 \-.]{3,19}[0-9]$/;
    return value ? value.match(regex) : true;
}, "Please insert a valid phone number");

var Step = function() {

    var handleForm = function() {
        
        if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                showAnim: 'blind',
                autoclose: true,
                language: 'it'
            });
            
            $('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }


        $('.step-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                "wsp_aclbundle_negozio[firstname]": {
                    required: true
                },
                "wsp_aclbundle_negozio[lastname]": {
                    required: true
                },
                "wsp_aclbundle_negozio[telefono]": {
                    required: true,
                    telefono: true
                },
                "wsp_aclbundle_negozio[birthday]": {
                    required: true
                },
                "wsp_aclbundle_negozio[gender]": {
                    required: true
                }
            },
            messages: {// custom messages for radio buttons and checkboxes
                "wsp_aclbundle_negozio[firstname]": {
                    required: Translator.trans('negozio.error.emailNegozio.required', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[lastname]": {
                    required: Translator.trans('negozio.error.sito.required', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[telefono]": {
                    required: Translator.trans('negozio.error.recapitoTelefonico.required', {}, 'WSPACL'),
                    telefono: Translator.trans('negozio.error.recapitoTelefonico.telefono', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[birthday]": {
                    required: Translator.trans('negozio.error.birthday.required', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[gender]": {
                    required: Translator.trans('negozio.error.gender.required', {}, 'WSPACL')
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit   

            },
            highlight: function(element) { // hightlight error inputs
                $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
            },
            success: function(label) {
                label.closest('.form-group').removeClass('has-error');
                label.remove();
            },
            errorPlacement: function(error, element) {
                if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.step-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.step-form').validate().form()) {
                    $('.step-form').submit();
                }
                return false;
            }
        });

        $('#wsp_aclbundle_negozio_submit').click(function(e) {
            if ($('.step-form').validate().form()) {
                $('.step-form').submit();
            }
        });
    };


    return {
        //main function to initiate map samples
        init: function() {
            handleForm();
        }

    };

}();