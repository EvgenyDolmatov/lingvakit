(function ($) {

    'use strict';
	
    // ------------------------------------------------------- //
    // Datepicker
    // ------------------------------------------------------ //	
	$(function () {
		$('#date').daterangepicker({
			singleDatePicker: true,
			locale: {
				format: 'DD/MM/YYYY'
			}
		});
	});
	
})(jQuery);