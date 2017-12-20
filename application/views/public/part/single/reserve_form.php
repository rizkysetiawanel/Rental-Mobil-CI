<?php foreach($hotel_data as $hd):?>
<?php endforeach;?>

<div class="reserve-form" style="    width: 100%;
    padding: 10px;
    border-radius: 4px;
    border: 1px solid#17b1ec;">

    <div class="left" style="    width: 47%;
    display: inline-block;
    vertical-align: top;">
    <form method="POST" action="<?php echo base_url();?>cpublic/p_process_form">
    <label>Nama pemesan / Tamu</label>
    <input type="text" name="name" class="form-control"">
    <br>
    <span style="    display: block;
    padding: 5px;
    border: 1px solid#e61919;
    color: #a2a1a1;
    border-radius: 3px;">Nama harus sama dengan KTP</span>
    <br>
    
    <input type="hidden" name="idhotel" value="<?php echo $hd->id_hotel;?>">
    <input type="hidden" name="checkin" value="<?php echo $checkin;?>"> 
    <input type="hidden" name="checkout" value="<?php echo $checkout;?>">
    <input type="hidden" name="long" value="<?php echo $long;?>">
    <input type="hidden" name="price" value="<?php echo $hd->price;?>">
    <label>No. Handphone ata Whatsapp</label>
    <input type="number" name="telp" class="form-control">
    <br>
    <label>Alamat Email</label>
    <input type="text" name="email" class="form-control">
    <br>
    <button type="submit" class="btn btn-success">Pesan</button>
    </form>
    </div>

    <div class="right" style="width: 47%;
    display: inline-block;
    vertical-align: top;
    border-radius: 3px;
    border: 1px solid#b7b6b6;
    padding: 5px;
    margin-top: 3%;
    margin-left: 18px;">

    <div class="hotel-content-resreve">
    <label style="display: block;
    border-bottom: 1px solid#ddd;
    padding-bottom: 3px;
    margin-bottom: 10px;
    text-align: center;">Detail Pemesanan</label>
    	<div class="left" style="width: 150; display: inline-block; vertical-align: top;">
    		<img src="<?php echo base_url().'assets/hpublic/img_hotel/'.$hd->image;?>" style="    width: 150px;
    border-radius: 3px;
    border: 3px solid#ddd;">
    	</div>

    	<div class="right" style="    display: inline-block;
    vertical-align: top;
    width: 63%;">
    		<h5><?php echo $hd->title;?></h5>
    		<h6><?php echo $hd->address;?></h6>
    	</div>

    	<div class="detail-reserve" style="margin: 10px;">
    		<table style="    width: 100%;">
    			<tr style="    border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 419px;">
    				<td style="    color: #8a8686;
    width: 188px;">Check in</td>
    				<td style="    font-size: 20px;
    text-align: right;
    width: 197px;"><?php echo $checkin;?></td>
    				<br>
    			</tr>
    			<tr style="    border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 419px;">
    				<td style="    color: #8a8686;
    width: 188px;">Durasi Menginap</td>
    				<td style="    font-size: 20px;
    text-align: right;
    width: 197px;">
    <?php echo $long.' Malam';?>
    <br><span style="font-size: 12px; font-weight: bold;"><?php echo '(Check Out :'.$checkout.')';?></span></td>
    			</tr>
    		</table>
<div class="total-reserver" style="width: 100%;
    background: #ddd;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;">
    				<span>Total yang harus dibayar: </span><span><?php echo 'Rp. '.rpCurrency($long*$hd->price);?></span>
    		</div>
    </div>

    </div>

    </div>


</div>