$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_category');

// create new category

$('.cnw').on('click', function(){

	$('#jqContent').load(baseurl+'gsadmin/input_category');
	$('#jqContent').slideDown('400');

});