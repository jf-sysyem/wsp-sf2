var ComingSoon = function () {

    return {
        //main function to initiate the module
        init: function () {

            var austDay = new Date(2014, 6, 1, 0, 0, 0, 0);
            $('#countdown').countdown({
                date: austDay,
                format: 'on'
            });
            $('#year').text(austDay.getFullYear());
        }

    };

}();