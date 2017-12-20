$('#inputForm').on('submit', function(){

	$.ajax({

			url:baseurl+'gsadmin/save_category',
			type:'POST',
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data)
			{
				$('.gs-ipt-wrapper').append(data);
				$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_category');
			}



	});
	return false;

});

$('#editForm').on('submit', function(){

	$.ajax({

			url:baseurl+'gsadmin/save_edit_category',
			type:'POST',
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data)
			{
				$('.gs-ipt-wrapper').append(data);
				$('.gs-page-data-wrapper').load(baseurl+'gsadmin/data_category');
				$('#jqContent').slideUp('400');
				$('#jqContent').html('');
			}



	});
	return false;

});