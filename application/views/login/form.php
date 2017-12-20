<form id="loginForm">
	
	<div class="login-wrapper">

		<label class="fir"><?php echo $title_web;?></label>
		<label class="sec">Admin Login</label>
			<div class="alert alert-warning" style="display: none;">
				<strong>Username atau password salah !</strong>
			</div>
		<div class="login-component">
			<input type="text" name="username" class="ipt-login" placeholder="Username">
			<input type="password" name="password" class="ipt-login" placeholder="Password">
			<br>
			<br>
			<button type="submit" class="ipt-submit">Login</button>
		</div>
	</div>

</form>

<script type="text/javascript">
	
$('#loginForm').on('submit', function(){

	$.ajax({

		url:bu+'login/process',
		type:'POST',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data)
		{
			$('#loginForm').append(data);
		}

	});

	return false;

});

</script>