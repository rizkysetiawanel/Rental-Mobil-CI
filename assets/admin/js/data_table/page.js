$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_page');


$('.cnw').on('click', function(){

	$('#jqContent').load(baseurl+'gsadmin/input_page');
	$('#jqContent').slideDown('400');

});