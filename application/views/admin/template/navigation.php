<div id="nav-wrapper">
	<label>Navigasi</label>
	<nav>
		<ul>
			<li>
				<a href="<?php echo base_url();?>admin/beranda">
				    <span class="glyphicon glyphicon-home"> </span>	Beranda
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>admin/halaman">
					<span class="glyphicon glyphicon-th-list"></span> Halaman
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>admin/bus">
					<span class="glyphicon glyphicon-book"></span> Kendaraan
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>admin/tipe">
					<span class="glyphicon glyphicon-folder-close"></span> Tipe Kendaraan
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>admin/seat">
					<span class="glyphicon glyphicon-tag"></span> Seat
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>admin/tagihan">
					<span class="glyphicon glyphicon-barcode"></span> Tagihan
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>admin/setting">
					<span class="	glyphicon glyphicon-cog"></span> Setting
				</a>
			</li>
			<li>
				<a href="<?php echo base_url();?>logout">
					<span class="glyphicon glyphicon-off"></span> Logout
				</a>
			</li>
		</ul>
	</nav>
</div>


<script type="text/javascript">
$('#nav-wrapper a').filter(function(){
	if($(this).attr('href') == window.location.href)
	{
		$(this).css({'background':'#1b62a0'});
	}
});
</script>