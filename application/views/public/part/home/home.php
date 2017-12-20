<div class="fac-wrapper">

	<h2>Berbagai Macam Fasilitas Hotel Kami</h2>
	<br>

	<?php foreach($fac_data as $fd):?>
		<div class="content">
			<img src="<?php echo base_url().'assets/hpublic/img_icon/'.$fd->icon;?>">
			<span><?php echo $fd->title;?></span>
		</div>
	<?php endforeach;?>

</div>
<br>
<br>
<div class="reason-wrapper">
	<div class="blue">
		<h3>Mengapa harus menginap di <?php echo $title_web;?> ?<h3>
	</div>
</div>