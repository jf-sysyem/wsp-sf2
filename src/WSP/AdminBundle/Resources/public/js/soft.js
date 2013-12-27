var Soft = function () {
    
    return {
        //main function to initiate the module
        init: function () {
        		       
	       	$.backstretch([
		        "/bundles/wspadmin/images/bg/1.jpg",
		        "/bundles/wspadmin/images/bg/2.jpg",
		        "/bundles/wspadmin/images/bg/3.jpg",
		        "/bundles/wspadmin/images/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		    });
        }

    };

}();