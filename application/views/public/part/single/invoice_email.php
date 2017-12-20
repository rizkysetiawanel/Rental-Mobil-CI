
<?php foreach($hotel_data as $hd):?>
<?php endforeach;?>

<?php foreach($inv_data as $ivd):?>
<?php endforeach;?>

<style type="text/css">
    
.pend
{
    color: #E91E63;
}

.proses
{
    color: blue;
}

.selesai
{
    color:#5cb85c ;
}

</style>


    <div class="hotel-content-resreve">
    <label style="display: block;
    border-bottom: 1px solid#ddd;
    padding-bottom: 3px;
    margin-bottom: 10px;
    text-align: center;">Detail Pemesanan</label>
    	<div class="left" style="width: 150; display: inline-block; vertical-align: top;">
    		<img src="<?php echo base_url().'assets/hpublic/img_hotel/'.$hd->image_vh;?>" style="    width: 150px;
    border-radius: 3px;
    border: 3px solid#ddd;">
    	</div>

    	<div class="right" style="    display: inline-block;
    vertical-align: top;
    width: 63%;">
    		<h5><?php echo $hd->name_vh;?></h5>
    	</div>

    	<div class="detail-reserve" style="margin: 10px;">
    		<table style="    width: 100%;">
<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">Status</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php 

        $status = $ivd->status_inv;

        if($status == 0)
        {
            echo "<span class='pend'>Menunggu Pembayaran</span>";
        }
        elseif($status == 1)
        {
            echo "<span class='proses'>Proses Konfirmasi</span>";
        }
        elseif($status == 2)
        {
            echo "<span class='selesai'>Pembayaran Selesai</span>";
        }
        elseif($status == 9)
        {
            echo "<span class='pend'>Dibatalkan</span>";
        }

    ?>
        
    </td>
                </tr>
<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">ID Pemesanan</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->code_inv;?></td>
                </tr>
<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">Nama Pemesan</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->name_inv;?></td>
                </tr>
<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">No. Telp / Whatsapp</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->handphone_inv;?></td>
                </tr>
    			<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
    				<td style="    color: #8a8686;
    width: 188px;">Berangkat</td>
    				<td style="    font-size: 20px;
    text-align: right;
    width: 81%;"><?php echo exDate($ivd->start_date);?></td>
    				<br>
    			</tr>
    			<tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
    				<td style="    color: #8a8686;
    width: 188px;">Durasi Sewa</td>
    				<td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->long_inv.' Hari';?>
    <br><span style="font-size: 12px; font-weight: bold;"><?php echo '(Selesai Sewa :'.exDate($ivd->finish_date).')';?></span></td>
    			</tr>
                <tr style="     border-bottom: 1px solid#ddd;
    padding-bottom: 11px;
    display: block;
    width: 100%;">
                    <td style="    color: #8a8686;
    width: 188px;">Tujuan</td>
                    <td style="    font-size: 20px;
    text-align: right;
    width: 81%;">
    <?php echo $ivd->destination_inv;?></td>
                </tr>
    		</table>
<div class="total-reserver" style="width: 100%;
    background: #ddd;
    padding: 10px;
    margin-top: 10px;
    border-radius: 3px;">
    				<span>Total yang harus dibayar: </span><span><?php echo 'Rp. '.rpCurrency($ivd->total_inv);?></span>
    		</div>

    </div>


<script type="text/javascript">


function timer()
{
    $('#timer').load(bu+'public/invoice/timer/<?php echo $ivd->code_inv;?>');
}

setInterval(timer, 1000 );

// confirmation payment
$(document).on('click', '.conf', function(){

    $('#jqContent').load(bu+'public/invoice/conf_invoice/<?php echo $ivd->code_inv;?>');
    $('#jqContent').slideDown('400');

});

$(document).on('submit', '#confForm', function(){

    $.ajax({

        url:bu+'public/invoice/process_invoice',
        type:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
            alert(data);
            window.location.href=window.location.href;
        }

    });

    return false;

});


</script>