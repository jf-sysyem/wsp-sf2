var Negozio = function() {
    var tooltip = function() {
        $('#actions').find('.sale-num').tooltip({
            delay: 200
        });
    };
    var form = function() {
        $('.open-form').click(function(){
            id = $(this).attr('form');
            $.get(Routing.generate('negozio_form_'+id), function(html) {
                $('#'+id).html(html);
                $('.button-next').click(function(){
                    ids = $(this).attr('form');
                    $form = $(this).closest('form');
                    $btn = $(this);
                    $btn.hide();
                    $.post(Routing.generate('negozio_save_'+id), $form.serialize(), function(html) {
                        $('#'+id).html(html);
                    }).error(function(){
                        $btn.show();
                    });
                });
            });
        });
    };
    return {
        //main function to initiate map samples
        init: function() {
            tooltip();
            form();
        },
        form: function() {
            form();
        }
    };
}();

