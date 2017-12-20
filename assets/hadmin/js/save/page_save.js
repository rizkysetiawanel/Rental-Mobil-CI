/**
 *
 *	@package		Jquery, Ajax
 *  @author			Yulius
 *
 *	menyimpan data halaman
*/

// menyimpan data halaman
$('#inputForm').on('submit', function(){

	// menetapkan variable
	var fd = new FormData();

	// menetapkan variable untuk isi FormData
	var title = $('#title').val();
	var desc  = $('#texte').summernote('code');

	// append data ke FormData
	fd.append('title', title);
	fd.append('desc', desc);

	// passing data ajax ke php
	$.ajax({

		url:bu+'admin/page/page_save',
		type:'POST',
		data:fd,
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

// menyimpan data edit halaman
$('#editForm').on('submit', function(){

	// menetapkan variable
	var fd = new FormData();

	// menetapkan variable untuk isi FormData
	var title = $('#title').val();
	var desc  = $('#texte').summernote('code');
	var id	  = $('#idcontent').val();
	var namef = $('#namef').val();

	// append data ke FormData
	fd.append('title', title);
	fd.append('desc', desc);
	fd.append('id',	id);
	fd.append('namef', namef);

	// passing data ajax ke php
	$.ajax({

		url:bu+'admin/page/page_edit_save',
		type:'POST',
		data:fd,
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

