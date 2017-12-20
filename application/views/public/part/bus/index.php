<div class="hcontent-wrapper" style="text-align: center;">



	<?php foreach($bus_data as $rhotel):?>
		<div class="hotel-content">


			<img src="<?php echo base_url().'assets/hpublic/img_hotel/'.$rhotel->image_vh;?>" style="    width: 100%;
    border-radius: 3px;
    margin-top: 10px;
    margin-bottom: 10px;">

                <div class="price" style="        display: inline-block;
    vertical-align: top;
    margin-top: -240px;">
                    <div class="hbtn-price" style="      background: #383838;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    padding: 4px;
    padding-right: 18px;
    padding-bottom: 10px;
    padding-left: 18px;">   
    <span style="font-size: 12px;">Mulai Dari</span>
    <br>
                        <?php echo 'Rp. '.rpCurrency($rhotel->price_vh);?>
                        <br>
                        <span style="font-size: 12px;">/hari</span>
                    </div>
                </div>

    		<div class="info" style="     display: inline-block;
    vertical-align: top;
    padding: 10px;
    width: 100%;
    margin-top: -50px;
    background: #4e4b4b;">

            <a href="<?php echo base_url().'kendaraan/'.$rhotel->slug_vh;?>">
                    <div class="title" style="color: #fff;
    
    font-size: 16px;">
                        <?php echo $rhotel->name_vh;?>
                    </div>
                </a>

   			<a href="<?php echo base_url().'kendaraan/'.$rhotel->slug_vh;?>">
		    		<div class="title" style="color: #fff;
    
    font-size: 19px;">
		    			<?php echo $rhotel->name_cat;?>
		    		</div>
	    		</a>
 


    		</div>

		</div>
	<?php endforeach;?>



</div>