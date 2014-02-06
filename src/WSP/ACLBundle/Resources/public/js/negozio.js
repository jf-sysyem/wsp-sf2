var Negozio = function() {
    var tooltip = function() {
        $('#actions').find('.sale-num').tooltip({
            delay: 200
        });
    };
    return {
        //main function to initiate map samples
        init: function() {
            tooltip();
        }
    };
}();

