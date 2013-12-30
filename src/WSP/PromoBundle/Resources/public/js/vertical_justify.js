var VerticalJustify = function() {

    var windows_height = 0;
    var tot_height = 0;
    var margin = 0;
    var div_logo = null;
    var logo_top_margin = 30;

    return {
        //main function to initiate the module
        init: function() {
            div_logo = $('#logo').closest('div');
            margin = parseInt(div_logo.css('padding-top')) + parseInt(div_logo.css('margin-top')) + 10;
            tot_height = $('#logo').height() + parseInt(div_logo.css('padding-top')) + parseInt(div_logo.css('margin-top')) + 
                         $('#content').height() + parseInt($('#content').css('padding-bottom')) + parseInt($('#content').css('margin-bottom')) +
                         $('#countdown').height() + parseInt($('#countdown').css('padding-top')) + parseInt($('#countdown').css('margin-top'));
            this._giustifica();
            $(window).resize(this._giustifica);
        },
        _giustifica: function() {
            windows_height = $(window).height();
            if(tot_height + margin < windows_height) {
                var _tot, _margin, _area = 0;
                _tot = windows_height - tot_height + margin - 10;
                _margin = _tot / 4;
                if(_margin > margin) {
                    _area = _tot - 2 * _margin - 10;
                    div_logo.css('margin-top', _margin + 'px');
                    $('#content').css('margin-top', _area + 'px');
                } else {
                    $('#content').css('margin-top', (windows_height - tot_height - margin) + 'px');
                    div_logo.css('margin-top', logo_top_margin + 'px');
                }
            } else {
                $('#content').css('margin-top', '0px');
                div_logo.css('margin-top', logo_top_margin + 'px');
            }
        }
    };

}();