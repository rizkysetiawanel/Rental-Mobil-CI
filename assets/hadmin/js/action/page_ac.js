$('.cnw').on('click', function(){

	$('#jqContent').load(bu+'admin/page/page_input');
	$('#jqContent').slideDown('400');

});


// untuk mengedit data halaman
$(document).on('click', '.edit', function()
{

	var id 		= $(this).attr('idcontent');
	var conf 	= confirm('Apa anda ingin mengedit halaman ini ?');

	if(conf == true)
	{
		$('#jqContent').load(bu+'admin/page/page_edit/'+id);
		$('#jqContent').slideDown('400');
	}

});

// untuk menghapus data halaman
$(document).on('click', '.del', function(){

	var id		= $(this).attr('idcontent');
	var conf 	= confirm('Apa anda yakin ingin menghapus halaman ini ?');

	if(conf == true)
	{
		$.get(bu+'admin/page/page_delete/'+id, function(data)
		{
			alert(data);
			window.location.href = window.location.href;
		});
	}

});