// edit category
$('a.edit').on('click', function(){

	var id = $(this).attr('href');

	$('#jqContent').slideDown('400');
	$('#jqContent').load(baseurl+'gsadmin/edit_page/'+id);
	return false;

});

// delete category

$('a.del').on('click', function(){

	var id = $(this).attr('href');
	var c  = confirm('Apa kamu yakin ingin menghapus kategori ini ?');

	if(c == true)
	{
		$.get( baseurl+'gsadmin/delete_category/'+id , function(data) {
		  alert(data);
		  $('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_category');
		});
	}
	else
	{

	}


	return false;

});