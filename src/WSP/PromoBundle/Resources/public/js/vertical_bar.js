var VerticalBar = function() {

    var windows_width = 0;
    var right = 0;
    var bar_height = 0;
    var bar_class = '.vertical-title';
    
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
            if(windows_width < 640) {
               $(bar_class).hide(); 
            } else {
               $(bar_class).show(); 
            }
            $(bar_class).css('right', right);
        }
    };

}();