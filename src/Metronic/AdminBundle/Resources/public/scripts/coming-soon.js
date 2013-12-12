var ComingSoon = function () {

    return {
        //main function to initiate the module
        init: function () {

            var austDay = new Date(2014, 5, 1, 0, 0, 0, 0);
            //austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
            $('#defaultCountdown').countdown({until: austDay});
            $('#year').text(austDay.getFullYear());
        }

    };

}();