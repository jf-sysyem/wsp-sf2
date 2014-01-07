var Step = function() {

    var insertMap = function() {
        $('#wsp_aclbundle_negozio_cap').after($('#html_map').html());
    };

    var mapInit = function() {

        var map = new GMaps({
            div: '#gmap',
            panControl: false,
            rotateControl: false,
            streetViewControl: false,
            overviewMapControl: false,
            lat: 41.913519,
            lng: 12.481635
        });

        var marker = map.addMarker({
            lat: 41.913519,
            lng: 12.481635,
            title: 'Your position',
            draggable: true,
            dragend: function(event) {
                var pos = this.getPosition();
                GMaps.geocode({
                    location: pos,
                    callback: function(results, status) {
                        map.setCenter(pos.lat(), pos.lng());
                        var indirizzo = '';
                        var localita = '';
                        var cap = '';
                        if (status == 'OK') {
                            $.each(results[0].address_components, function(index, element) {
                                if (element.types[0] == 'street_number') {
                                    indirizzo += ', ' + element.long_name;
                                }
                                if (element.types[0] == 'route') {
                                    indirizzo = element.long_name + indirizzo;
                                }
                                if (element.types[0] == 'locality') {
                                    localita = element.long_name + localita;
                                }
                                if (element.types[0] == 'administrative_area_level_2' && localita != element.long_name) {
                                    localita += ' (' + element.short_name + ')';
                                }
                                if (element.types[0] == 'postal_code') {
                                    cap = element.long_name;
                                }
                            });
                            if (confirm('Il nuovo indirizzo risulta ' + results[0].formatted_address + '. Vuoi cambiare?')) {
                                $('#wsp_aclbundle_negozio_indirizzo').val(indirizzo);
                                $('#wsp_aclbundle_negozio_localita').val(localita);
                                $('#wsp_aclbundle_negozio_cap').val(cap);
                            }
                        }
                    }
                });
                App.scrollTo($('#gmap'));
            },
            click: function(e) {
                if (console.log)
                    console.log(e);
                alert('You clicked in this marker');
            }
        });

        $('#wsp_aclbundle_negozio_latitudine').val(41.913519);
        $('#wsp_aclbundle_negozio_longitudine').val(12.481635);

        GMaps.geolocate({
            success: function(position) {
                var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.setCenter(position.coords.latitude, position.coords.longitude);
                marker.setPosition(pos);
                $('#wsp_aclbundle_negozio_latitudine').val(position.coords.latitude);
                $('#wsp_aclbundle_negozio_longitudine').val(position.coords.longitude);
                GMaps.geocode({
                    location: pos,
                    callback: function(results, status) {
                        var indirizzo = '';
                        var localita = '';
                        var cap = '';
                        if (status == 'OK') {
                            $.each(results[0].address_components, function(index, element) {
                                if (element.types[0] == 'street_number') {
                                    indirizzo += ', ' + element.long_name;
                                }
                                if (element.types[0] == 'route') {
                                    indirizzo = element.long_name + indirizzo;
                                }
                                if (element.types[0] == 'locality') {
                                    localita = element.long_name + localita;
                                }
                                if (element.types[0] == 'administrative_area_level_2' && localita != element.long_name) {
                                    localita += ' (' + element.short_name + ')';
                                }
                                if (element.types[0] == 'postal_code') {
                                    cap = element.long_name;
                                }
                            });
                            $('#wsp_aclbundle_negozio_indirizzo').val(indirizzo);
                            $('#wsp_aclbundle_negozio_localita').val(localita);
                            $('#wsp_aclbundle_negozio_cap').val(cap);
                        }
                    }
                });
                App.scrollTo($('#gmap'));
            },
            error: function(error) {
                alert('Geolocation failed: ' + error.message);
            },
            not_supported: function() {
                alert("Your browser does not support geolocation");
            },
            always: function() {
                //alert("Geolocation Done!");
            }
        });

        var handleAction = function() {
            if ($.trim($('#wsp_aclbundle_negozio_indirizzo').val()) !== '' && $.trim($('#wsp_aclbundle_negozio_localita').val()) !== '') {
                var text = $.trim($('#wsp_aclbundle_negozio_indirizzo').val() + ' ' + $('#wsp_aclbundle_negozio_localita').val());
                GMaps.geocode({
                    address: text,
                    callback: function(results, status) {
                        if (status == 'OK') {
                            var latlng = results[0].geometry.location;
                            var pos = new google.maps.LatLng(latlng.lat(), latlng.lng());
                            marker.setPosition(pos);
                            map.setCenter(latlng.lat(), latlng.lng());
                            $('#wsp_aclbundle_negozio_latitudine').val(latlng.lat());
                            $('#wsp_aclbundle_negozio_longitudine').val(latlng.lng());
                            App.scrollTo($('#gmap'));
                        }
                    }
                });
            }
        };

        $('#wsp_aclbundle_negozio_indirizzo').blur(function(e) {
            e.preventDefault();
            handleAction();
        });

        $("#wsp_aclbundle_negozio_localita").blur(function(e) {
            e.preventDefault();
            handleAction();
        });

    };

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
                "wsp_aclbundle_negozio[indirizzo]": {
                    required: true
                },
                "wsp_aclbundle_negozio[localita]": {
                    required: true
                },
                "wsp_aclbundle_negozio[cap]": {
                    required: true
                },
                "wsp_aclbundle_negozio[categoria]": {
                    required: true
                }
            },
            messages: {// custom messages for radio buttons and checkboxes
                "wsp_aclbundle_negozio[nome]": {
                    required: Translator.get('WSPACL:negozio.error.nome.required')
                },
                "wsp_aclbundle_negozio[indirizzo]": {
                    required: Translator.get('WSPACL:negozio.error.indirizzo.required')
                },
                "wsp_aclbundle_negozio[localita]": {
                    required: Translator.get('WSPACL:negozio.error.localita.required')
                },
                "wsp_aclbundle_negozio[cap]": {
                    required: Translator.get('WSPACL:negozio.error.cap.required')
                },
                "wsp_aclbundle_negozio[categoria]": {
                    required: Translator.get('WSPACL:negozio.error.categoria.required')
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

    };


    return {
        //main function to initiate map samples
        init: function() {
            insertMap();
            mapInit();
            handleForm();
        }

    };

}();