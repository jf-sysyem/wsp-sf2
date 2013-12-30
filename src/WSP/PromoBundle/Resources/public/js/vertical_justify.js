var VerticalJustify = function() {

    var windows_height = 0;
    var tot_height = 0;
    var margin = 0;
    var div_logo = null;

    return {
        //main function to initiate the module
        init: function() {
            div_logo = $('#logo').closest('div');
            margin = parseInt(div_logo.css('padding-top')) + parseInt(div_logo.css('margin-top'));
            tot_height = $('#logo').height() + parseInt(div_logo.css('padding-top')) + parseInt(div_logo.css('margin-top')) + 
                         $('#content').height() + parseInt($('#content').css('padding-bottom')) + parseInt($('#content').css('margin-bottom')) +
            this._giustifica();
            $(window).resize(this._giustifica);
        },
        _giustifica: function() {
            windows_height = $(window).height();
                         $('#countdown').height() + parseInt($('#countdown').css('padding-top')) + parseInt($('#countdown').css('margin-top'));
            if(tot_height + margin < windows_height) {
                $('#content').css('margin-top', (windows_height - tot_height - margin) + 'px');
            } else {
                $('#content').css('margin-top', '0px');
            }
        }
    };

}();