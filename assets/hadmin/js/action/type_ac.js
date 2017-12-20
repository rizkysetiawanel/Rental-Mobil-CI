$('.cnw').on('click', function(){

	$('#jqContent').load(bu+'admin/type/type_input');
	$('#jqContent').slideDown('400');

});

// menghapus data tipe bus

// menghapus data tipe bus
$(document).on('click', '.del', function(){

	// variable
	var id		= $(this).attr('idcontent');
	var conf	= confirm('Apa anda yakin ingin menghapus tipe bus ini?');

	if(conf == true)
	{
		$.get(bu+'admin/type/type_delete/'+id, function(data)
		{
			alert(data);
			window.location.href = window.location.href;
		});
	}

});