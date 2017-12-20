$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_product');


$('.cnw').on('click', function(){

	$('#jqContent').load(baseurl+'gsadmin/input_product');
	$('#jqContent').slideDown('400');

});