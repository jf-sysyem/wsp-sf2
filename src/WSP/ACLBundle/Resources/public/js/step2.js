jQuery.validator.addMethod("telefono", function(value) { 
  // espressione migliorabile... ma sufficiente per il nostro esempio
  var regex = /^([\(]?(00|\+)[0-9]{1,5}[\)]?[ ]?)?[0-9 \-.]{3,19}[0-9]$/;   
  return value ? value.match(regex) : true;  
}, "Please insert a valid phone number");

var Step = function() {

    var handleForm = function() {

        $('.step-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                "wsp_aclbundle_negozio[emailNegozio]": {
                    required: true,
                    email: true
                },
                "wsp_aclbundle_negozio[sito]": {
                    url: true
                },
                "wsp_aclbundle_negozio[telefono]": {
                    telefono: true
                },
                "wsp_aclbundle_negozio[cellulare]": {
                    telefono: true
                },
                "wsp_aclbundle_negozio[fax]": {
                    telefono: true
                }
            },
            messages: {// custom messages for radio buttons and checkboxes
                "wsp_aclbundle_negozio[emailNegozio]": {
                    required: Translator.get('WSPACL:negozio.error.emailNegozio.required'),
                    email: Translator.get('WSPACL:negozio.error.emailNegozio.email')
                },
                "wsp_aclbundle_negozio[sito]": {
                    url: Translator.get('WSPACL:negozio.error.sito.url')
                },
                "wsp_aclbundle_negozio[telefono]": {
                    telefono: Translator.get('WSPACL:negozio.error.telefono.telefono')
                },
                "wsp_aclbundle_negozio[cellulare]": {
                    telefono: Translator.get('WSPACL:negozio.error.cellulare.telefono')
                },
                "wsp_aclbundle_negozio[fax]": {
                    telefono: Translator.get('WSPACL:negozio.error.fax.telefono')
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