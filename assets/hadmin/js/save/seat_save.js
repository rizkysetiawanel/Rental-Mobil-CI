

// menyimpan seat data
$('#inputForm').on('submit', function(){

	$.ajax({

		url:bu+'admin/seat/seat_save',
		type:'POST',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data)
		{
			alert(data);
			window.location.href = window.location.href;
		}

	});

	return false;

});

// menimpan edit seat data
$('#editForm').on('submit', function(){

	$.ajax({

		url:bu+'admin/seat/seat_save_edit',
		type:'POST',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data)
		{
			alert(data);
			window.location.href = window.location.href;
		}

	});

	return false;

});


