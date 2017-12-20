<div id="menu-head-wrapper" href="<?php echo base_url();?>">

	<a href="<?php echo base_url();?>">
		<div class="logo" style="color: #fff;" href="<?php echo base_url();?>">
			<?php echo title_web();?>
		</div>
	</a>

	<div class="menu">
		<nav>
			<ul>
				<li>
					<a href="<?php echo base_url();?>kendaraan">
						Kendaraan
					</a>
				</li>
				<li>
					<a href="<?php echo base_url();?>ordercheck">
						Cek Pemesanan
					</a>
				</li>
				<?php foreach($menu as $md):?>
				<?php if(count($menu)>0):?>
				<li>
					<a href="<?php echo base_url().'/page/'.url_title($md->name_page, '-', TRUE);?>">
						<?php echo $md->name_page;?>
					</a>
				</li>
				<?php else:?>
				<?php endif;?>
				<?php endforeach;?>
			</ul>
		</nav>
	</div>

</div>
