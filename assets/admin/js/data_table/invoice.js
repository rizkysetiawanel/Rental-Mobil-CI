$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_invoice_pending');

// button menu

$('.pending').on('click', function(){

	$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_invoice_pending');

});

$('.confirm').on('click', function(){

	$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_invoice_confirm');

});

$('.clear').on('click', function(){

	$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_invoice_clear');

});

