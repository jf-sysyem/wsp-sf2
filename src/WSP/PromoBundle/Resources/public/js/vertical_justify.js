var VerticalJustify = function() {

    var windows_height = 0;
    var tot_height = 0;

    return {
        //main function to initiate the module
        init: function() {
            this._giustifica();
            $(window).resize(this._giustifica);
        },
        _giustifica: function() {
            windows_height = $(window).height();
            tot_height = $('#logo').height() + $('#content').height() + $('#countdown').height() + 50;
            if(tot_height < windows_height) {
                $('#content').css('margin-top', (windows_height - tot_height) + 'px');
            }
        }
    };

}();