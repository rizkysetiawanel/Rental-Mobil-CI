$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_user');


$('.cnw').on('click', function(){

	$('#jqContent').load(baseurl+'gsadmin/input_user');
	$('#jqContent').slideDown('400');

});