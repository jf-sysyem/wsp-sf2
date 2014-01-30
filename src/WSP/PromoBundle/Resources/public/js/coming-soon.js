var ComingSoon = function () {

    return {
        //main function to initiate the module
        init: function () {
            var austDay = new Date(2014, 5, 9);
            $('#defaultCountdown').countdown({until: austDay});
            $('#year').text(austDay.getFullYear());
        }

    };

}();