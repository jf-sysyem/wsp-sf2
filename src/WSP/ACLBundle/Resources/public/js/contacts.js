jQuery.validator.addMethod("telefono", function(value) { 
  // espressione migliorabile... ma sufficiente per il nostro esempio
  var regex = /^([\(]?(00|\+)[0-9]{1,5}[\)]?[ ]?)?[0-9 \-.]{3,19}[0-9]$/;   
  return value ? value.match(regex) : true;  
}, "Please insert a valid phone number");

var Form = function() {

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
                    required: Translator.trans('negozio.error.emailNegozio.required', {}, 'WSPACL'),
                    email: Translator.trans('negozio.error.emailNegozio.email', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[sito]": {
                    url: Translator.trans('negozio.error.sito.url', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[telefono]": {
                    telefono: Translator.trans('negozio.error.telefono.telefono', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[cellulare]": {
                    telefono: Translator.trans('negozio.error.cellulare.telefono', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[fax]": {
                    telefono: Translator.trans('negozio.error.fax.telefono')
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
                formSubmit();
            }
        });

        $('.step-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.step-form').validate().form()) {
                    formSubmit();
                }
                return false;
            }
        });

        $('#wsp_aclbundle_negozio_button').click(function(e) {
            if ($('.step-form').validate().form()) {
                formSubmit();
            }
        });
        
        function formSubmit() {
            $form = $($('.step-form')[0]);
            $.post($form.attr('action'), $form.serialize(), function(html){
                $('#contacts').html(html);
                $('#wsp_aclbundle_negozio_close').click();
            });
        }
    };


    return {
        //main function to initiate map samples
        init: function() {
            handleForm();
        }

    };

}();