var ContactForm = function() {

    return {
        //main function to initiate the module
        init: function() {
            $('#contact_btn').click(this._sendRequest);
            $('#contact_email').keyup(function(e) {
                if (e.keyCode === 13) {
                    console.log(e.keyCode);
                    ContactForm._sendRequest();
                }
            });
        },
        _sendRequest: function() {
            $('#contact_btn').hide();
            var form = $('#contact_btn').closest('form');
            $.post(Routing.generate('promo_request'), form.serialize(), function(response) {
                $('#contact').html(response);
            });
        }
    };

}();