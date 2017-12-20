// edit category
$('a.edit').on('click', function(){

	var id = $(this).attr('href');

	$('#jqContent').slideDown('400');
	$('#jqContent').load(baseurl+'gsadmin/edit_product/'+id);
	return false;

});

// delete category

$('a.del').on('click', function(){

	var id = $(this).attr('href');
	var c  = confirm('Apa kamu yakin ingin menghapus Brand ini ?');

	if(c == true)
	{
		$.get( baseurl+'gsadmin/delete_product/'+id , function(data) {
		  alert(data);
		  $('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_product');
		});
	}
	else
	{

	}


	return false;

});