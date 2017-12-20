<div id="footer">

	<div class="footer-wrapper">

		<div class="pay-wrapper" style="text-align: center;">
			<h4>Kami Menerima Pembayaran Melalui</h4>
			<br>
			<div class="pay-content">
			
			<?php foreach($bank_data as $bd):?>
				<div class="pay" style="width: 67px;
    height: 38px;
    background: #fff;
    margin: auto;
    text-align: center;
    display: inline-block;
    vertical-align: top;
    padding: 4px;
    border-radius: 4px;">
					<img src="<?php echo base_url().'assets/hpublic/img_bank/'.$bd->logo_bank;?>" style="width: 100%;">
				</div>
			<?php endforeach;?>

			</div>
		</div>
		<br>
	</div>

	<div class="footer-border"></div>

	<div class="footer-wrapper">
		<span style="text-align: center; display: block;">Copyright @ 2016 - 2017. All right reserved</span>
	</div>

</div>