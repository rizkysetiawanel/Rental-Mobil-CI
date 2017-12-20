// default load

$('.datalist').load(bu+'admin/setting/web_setting');

// fungsi tombol

// tombol web setting
$('.ws').on('click', function()
{

	// load
	$('.datalist').load(bu+'admin/setting/web_setting');

});

// tombol bank setting
$('.bs').on('click', function()
{

	// load
	$('.datalist').load(bu+'admin/setting/bank_setting');

});

// tombol menu setting
$('.ms').on('click', function(){

	// load
	$('.datalist').load(bu+'admin/setting/menu_setting');

});

// membuat bank account
$(document).on('click', '.cnw', function(){

	$('#jqContent').load(bu+'admin/setting/bank_setting_input');
	$('#jqContent').slideDown('400');

});