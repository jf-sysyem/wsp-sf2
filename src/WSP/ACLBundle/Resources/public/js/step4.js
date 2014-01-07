jQuery.validator.addMethod("telefono", function(value) {
    // espressione migliorabile... ma sufficiente per il nostro esempio
    var regex = /^([\(]?(00|\+)[0-9]{1,5}[\)]?[ ]?)?[0-9 \-.]{3,19}[0-9]$/;
    return value ? value.match(regex) : true;
}, "Please insert a valid phone number");

jQuery.validator.addMethod("piva", function(value) {
    // espressione migliorabile... ma sufficiente per il nostro esempio
    var regex = /^([0-9]{11}|[a-zA-Z]{6}[0-9a-zA-Z]{2}[a-zA-Z]{1}[0-9a-zA-Z]{2}[a-zA-Z]{1}[0-9a-zA-Z]{3}[a-zA-Z]{1})$/;
    return value ? value.match(regex) : true;
}, "Please insert a valid P.IVA or CF");

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
                "wsp_aclbundle_negozio[nome]": {
                    required: true
                },
                "wsp_aclbundle_negozio[indirizzo]": {
                    required: true
                },
                "wsp_aclbundle_negozio[citta]": {
                    required: true
                },
                "wsp_aclbundle_negozio[cap]": {
                    required: true
                },
                "wsp_aclbundle_negozio[partitaIva]": {
                    required: true,
                    piva: true
                },
                "wsp_aclbundle_negozio[email]": {
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
                "wsp_aclbundle_negozio[nome]": {
                    required: Translator.trans('negozio.error.nome.required', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[indirizzo]": {
                    required: Translator.trans('negozio.error.indirizzo.required', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[citta]": {
                    required: Translator.trans('negozio.error.localita.required', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[cap]": {
                    required: Translator.trans('negozio.error.cap.required', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[partitaIva]": {
                    required: Translator.trans('negozio.error.partitaIva.required', {}, 'WSPACL'),
                    piva: Translator.trans('negozio.error.partitaIva.piva', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[email]": {
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
                    telefono: Translator.trans('negozio.error.fax.telefono', {}, 'WSPACL')
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