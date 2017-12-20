$('.cnw').on('click', function(){

	$('#jqContent').load(bu+'admin/seat/seat_input');
	$('#jqContent').slideDown('400');

});


// mengedit seat data
$(document).on('click', '.edit', function(){

	// variable
	var id 		= $(this).attr('idcontent');

	// show edit
	$('#jqContent').load(bu+'admin/seat/seat_edit/'+id);
	$('#jqContent').slideDown('400');

});

// menghapus seat data
$(document).on('click', '.del', function(){

	// variable
	var id 		= $(this).attr('idcontent');
	var conf 	= confirm('Apa anda yakin ingin menghapus seat ini ?');

	// kondisi jika ya / tidak 
	if(conf == true)
	{
		$.get(bu+'admin/seat/seat_delete/'+id, function(data)
		{
			alert(data);
			window.location.href = window.location.href;
		});
	}

});