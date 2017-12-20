$('#inputForm').on('submit', function(){

	var desc = $('#texte').summernote('code');
	var fd    = new FormData();

	fd.append('title', $('input#title').val());
	fd.append('desc', desc);

	$.ajax({

			url:baseurl+'gsadmin/save_page',
			type:'POST',
			data:fd,
			contentType:false,
			cache:false,
			processData:false,
			success:function(data)
			{
				alert(data);
				$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_page');
			}



	});
	return false;

});

$('#editForm').on('submit', function(){

	var idpage = $('#idpage').val();
	var desc   = $('#texte').summernote('code');
	var fd     = new FormData();

	fd.append('title', $('input#title').val());
	fd.append('desc', desc);

	$.ajax({

			url:baseurl+'gsadmin/save_edit_page/'+idpage,
			type:'POST',
			data:fd,
			contentType:false,
			cache:false,
			processData:false,
			success:function(data)
			{
				$('.gs-ipt-wrapper').append(data);
				$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_page');
				$('#jqContent').slideUp('400');
				$('#jqContent').html('');
			}



	});
	return false;

});