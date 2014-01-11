var Login = function() {

    var handleLogin = function() {
        $('.login-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                _username: {
                    required: true
                },
                _password: {
                    required: true
                },
                _remember_me: {
                    required: false
                }
            },
            messages: {
                _username: {
                    required: Translator.trans('login.error.username.required', {}, 'WSPACL')
                },
                _password: {
                    required: Translator.trans('login.error.password.required', {}, 'WSPACL')
                }
            },
            invalidHandler: function(event, validator) { //display error alert on form submit   
                $('.alert-danger', $('.login-form')).show();
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
                error.insertAfter(element.closest('.input-icon'));
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.login-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.login-form').validate().form()) {
                    $('.login-form').submit();
                }
                return false;
            }
        });
    };

    var handleForgetPassword = function() {
        $('.forget-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                username: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: Translator.trans('forget.error.username.required', {}, 'WSPACL')
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
                error.insertAfter(element.closest('.input-icon'));
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.forget-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.forget-form').validate().form()) {
                    $('.forget-form').submit();
                }
                return false;
            }
        });

        jQuery('#forget-password').click(function() {
            jQuery('.login-form').hide();
            jQuery('.forget-form').show();
        });

        jQuery('#back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.forget-form').hide();
        });

    };

    var handleRegister = function() {

        $('.register-form').validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",
            rules: {
                "fos_user_registration_form[email]": {
                    required: true,
                    email: true
                },
                "fos_user_registration_form[username]": {
                    required: true
                },
                "fos_user_registration_form[plainPassword][first]": {
                    required: true
                },
                "fos_user_registration_form[plainPassword][second]": {
                    equalTo: "#fos_user_registration_form_plainPassword_first"
                },
                "fos_user_registration_form[agree]": {
                    required: true
                }
            },
            messages: {// custom messages for radio buttons and checkboxes
                "fos_user_registration_form[email]": {
                    email: Translator.trans('register.error.email.email', {}, 'WSPACL'),
                    required: Translator.trans('register.error.email.required', {}, 'WSPACL')
                },
                "fos_user_registration_form[username]": {
                    required: Translator.trans('register.error.username.required', {}, 'WSPACL')
                },
                "fos_user_registration_form[plainPassword][first]": {
                    required: Translator.trans('register.error.password.required', {}, 'WSPACL')
                },
                "fos_user_registration_form[plainPassword][second]": {
                    required: Translator.trans('register.error.password_confirmation.required', {}, 'WSPACL')
                },
                "fos_user_registration_form[agree]": {
                    required: Translator.trans('register.error.agree.required', {}, 'WSPACL')
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
                if (element.attr("name") == "fos_user_registration_form[agree]") { // insert checkbox errors after the container                  
                    error.insertAfter($('#register_tnc_error'));
                } else if (element.closest('.input-icon').size() === 1) {
                    error.insertAfter(element.closest('.input-icon'));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('.register-form input').keypress(function(e) {
            if (e.which == 13) {
                if ($('.register-form').validate().form()) {
                    submit();
                }
                return false;
            }
        });

        $('#register-submit-btn').click(function(e) {
            if ($('.register-form').validate().form()) {
                submit();
            }
            return false;
        });

        function submit() {
            var form = $('.register-form');
            $.post(form.attr('action'), form.serialize(), function(response) {
                $('#reg').html(response);
                $('.register-form').show();
            });
        }

        jQuery('#register-btn').click(function() {
            jQuery('.login-form').hide();
            jQuery('.register-form').show();
        });

        jQuery('#register-back-btn').click(function() {
            jQuery('.login-form').show();
            jQuery('.register-form').hide();
        });
    };

    return {
        //main function to initiate the module
        init: function() {

            handleLogin();
            handleForgetPassword();
            handleRegister();

        }

    };

}();

function openTds() {
    alert('Qui si apre un popup con i termini di servizio');
}
function openTdp() {
    alert('Qui si apre un popup con il trattamento dei dati personali');
}