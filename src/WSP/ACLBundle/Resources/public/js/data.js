var Form = function() {

    var handleForm = function() {

        $('.step-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                "wsp_aclbundle_negozio[nome]": {
                    required: true
                },
                "wsp_aclbundle_negozio[descrizione]": {
                    required: true
                },
                "wsp_aclbundle_negozio[categoria]": {
                    required: true
                }
            },
            messages: {// custom messages for radio buttons and checkboxes
                "wsp_aclbundle_negozio[nome]": {
                    required: Translator.trans('negozio.error.nome.required', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[descrizione]": {
                    required: Translator.trans('negozio.error.descrizione.required', {}, 'WSPACL')
                },
                "wsp_aclbundle_negozio[categoria]": {
                    required: Translator.trans('negozio.error.categoria.required', {}, 'WSPACL')
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

        $('#wsp_aclbundle_negozio_categoria').change(function() {
            var $select = $(this);
            $('.form-control input').attr('checked', false).attr('readonly', false).closest('span').removeClass('checked');
            $.each($('.form-control input'), function(index, checkbox) {
                var $checkbox = $(checkbox);
                if ($checkbox.val() === $select.val()) {
                    $checkbox.attr('checked', true).attr('readonly', true).closest('span').addClass('checked');
                }
            });
        });

        $('.form-control input').change(function() {
            var $checkbox = $(this);
            var $select = $('#wsp_aclbundle_negozio_categoria');
            if ($checkbox.val() === $select.val()) {
                $checkbox.attr('checked', true).attr('readonly', true).closest('span').addClass('checked');
            }
        });
        
        function formSubmit() {
            $form = $($('.step-form')[0]);
            $.post($form.attr('action'), $form.serialize(), function(html){
                $('#data').html(html);
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