<h4>Website Setting</h4>
<br>

<?php foreach($web_setting as $ws){} ?>

<form id="wsForm">

<label>Nama Website</label>
<input type="text" name="title" maxlength="35" class="form-control" value="<?php echo $ws->name_ws;?>" required="">

<br>

<label>Slogan Website</label>
<input type="text" name="slogan" maxlength="55" class="form-control" value="<?php echo $ws->slogan_ws;?>" required="">

<br>

<input type="hidden" name="logo" class="form-control">

<br>

<label>No. Telp</label>
<input type="number" name="telp" class="form-control" value="<?php echo $ws->telp_ws;?>" max="999999999999" required="">

<br>

<label>Email</label>
<input type="email" name="email" class="form-control" maxlength="45" value="<?php echo $ws->email_ws;?>"  required="">

<br>

<label>Alamat</label>
<textarea name="address" class="form-control" required=""><?php echo $ws->address_ws;?></textarea>

<br>

<button type="submit" class="btn btn-success">Simpan</button>

<br>
<br>

</form>

<script type="text/javascript">
	
// menyimpan data tipe bus
$('#wsForm').on('submit', function(){

	$.ajax({

		url:bu+'admin/setting/save_setting_ws',
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


</script>