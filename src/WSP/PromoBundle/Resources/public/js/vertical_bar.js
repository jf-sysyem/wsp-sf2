var VerticalBar = function() {

    var windows_width = 0;
    var right = 0;
    var bar_height = 0;
    var bar_class = '.vertical-bar';

    return {
        //main function to initiate the module
        init: function() {
            bar_height = $(bar_class).height();
            this._posizionaBanner();
            $(window).resize(this._posizionaBanner);
        },
        _posizionaBanner: function() {
            windows_width = $(window).width();
            right = 4 * windows_width / 5 + bar_height;
            var h = 0;
            $(bar_class).each(function(n, div) {
                $div = $(div);
                $span = $div.children('span');
                $div.css('top', h + 'px');
                h += $span.width() - $div.height();
                if (n === 0) {
                    $div.width($span.width()).css('right', (right + $span.width() - windows_width) + 'px');
                } else {
                    $div.css('right', right);
                }
            });
        }
    };

}();