var VerticalJustify = function() {

    var windows_height = 0;
    var tot_height = 0;
    var margin = 0;
    var div_logo = null;
    var logo_height = 0;
    var logo_top_margin = 0;
    var logo_extra_margin = 0;

    return {
        //main function to initiate the module
        init: function() {
            div_logo = $('#logo').closest('div');
            logo_extra_margin = 25; //parseInt(div_logo.css('padding-top')) + 10;
            logo_top_margin = 30; //parseInt(div_logo.css('margin-top'));
            logo_height = $('#logo').height() - 10;
            tot_height = $('#content').height() + parseInt($('#content').css('padding-bottom')) + parseInt($('#content').css('margin-bottom')) +
                         $('#countdown').height() + parseInt($('#countdown').css('padding-top')) + parseInt($('#countdown').css('margin-top'));
            this._giustifica();
            $(window).resize(this._giustifica);
        },
        _giustifica: function() {
            windows_height = $(window).height();

            var _tot, _margin, _area = 0;

            _tot = windows_height - tot_height - logo_height;
            _margin = _tot / 4;

            if(_margin < logo_top_margin + logo_extra_margin) {
                _margin = logo_top_margin + logo_extra_margin;
            }
            _area = _tot - 2 * _margin;
            if(_area < 0) {
                _area = 0;
            }
            console.log([windows_height, _margin, _area]);
            div_logo.css('margin-top', (_margin - logo_extra_margin) + 'px');
            $('#content').css('margin-top', _area + 'px');
        }
    };

}();