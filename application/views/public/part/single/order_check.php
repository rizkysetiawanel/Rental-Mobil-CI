<div class="order-check-wrapper">

	<div class="left">

		<form method="POST" action="<?php echo base_url();?>ordercheck/process">
		<h2>Cek Pemesanan</h2>
		<br>
		<br>
		<div class="ipt-content">
			<input type="number" name="orderId" required>
			<span class="placeholder">ID Pemesanan</span>
	    </div>
    	<span style="color: #a7a4a4;">Masukan ID Pemesanan anda disini</span>
    	<br>
    	<br>
    	<br>
    	<br>
    	<br>
    	<div class="ipt-content">
			<input type="number" name="noHp" required>
			<span class="placeholder">Masukan no Handphone(WhatsApp)</span>
		</div>
    	<span style="color: #a7a4a4;">Masukan No.Handphone pada saat pemesanan</span>
    	<br>
    	<br>
    	<br>
    	<button class="hbtn" type="submit">Cek Pemesanan</button>

    	</form>

	</div>

	<div class="right">

		<p>
			Lengkapi isian di samping untuk melakukan pengecekan pemesanan bus Anda.
		</p>

		<p>
			<strong>ID Pemesanan</strong> adalah 13 digit angka yang terdapat di email pemesanan atau voucher memesan / booking <?php echo $title_web;?> yang dikirim ke alamat email Anda.
		</p>

		<p>
			<strong>No.Handphone</strong> adalah nomor telepon / handphone yang digunakan ketika melakukan pemesanan bus di <?php echo $title_web;?>.
		</p>

	</div>

</div>