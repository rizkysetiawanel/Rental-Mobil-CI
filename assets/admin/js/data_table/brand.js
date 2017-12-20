$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_brand');

// create new category

$('.cnw').on('click', function(){

	$('#jqContent').load(baseurl+'gsadmin/input_brand');
	$('#jqContent').slideDown('400');

});