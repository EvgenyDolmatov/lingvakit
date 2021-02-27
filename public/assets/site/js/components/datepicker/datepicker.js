(function ($) {

    'use strict';

    // ------------------------------------------------------- //
    // Datepicker
    // ------------------------------------------------------ //
	$(function () {

		$('#date_start, #date_end').daterangepicker({
			singleDatePicker: true,
            locale: {
                format: 'DD/MM/YYYY'
            }
		});
	});

})(jQuery);
