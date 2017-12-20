<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<style type="text/css">
#line-cart
{
    width: 70%;
    display: block;
    margin: auto;
    margin-top: 20px;
}

#testimoni
{
    width: 28%;
    display: inline-block;
    vertical-align: top;
    margin-left: 11px;
}

/* dashboard */

#gs-ds-wrapper
{
    text-align: center;
}

#gs-ds-wrapper .gs-ds
{
    width: 300px;
    height: 86px;
    background: #fff;
    position: relative;
    overflow: hidden;
    display: inline-block;
    vertical-align: top;
}

#gs-ds-wrapper .gs-ds .content
{
    width: 40%;
    text-align: center;
    font-family: karla;
    font-weight: bold;
    color: #fff;
    display: inline-block;
    vertical-align: top;
    height: 100%;
}

#gs-ds-wrapper .gs-ds .order
{
    background: #009688;
}

#gs-ds-wrapper .gs-ds .content
span
{
    display: block;
    margin-top: 22%;
}

#gs-ds-wrapper .gs-ds .res
{
    display: inline-block;
    vertical-align: top;
    height: 100%;
    width: 58%;
    background: #175b91;
    margin-left: -4px;
}

#gs-ds-wrapper .gs-ds .res span
{
    font-family: karla;
    color: #fff;
    font-weight: bold;
    margin-top: 17px;
    display: block;
    text-align: center;
    font-size: 36px;
}



</style>


<div id="gs-ds-wrapper">

	<div class="gs-ds">
		<div class="content order">
			<span>Pemesanan Pending</span>
		</div>
		<div class="res">
			<span><?php echo $pend;?></span>
		</div>
	</div>

	<div class="gs-ds">
		<div class="content order">
			<span>Konfirmasi Pemesanan</span>
		</div>
		<div class="res">
			<span><?php echo $conf;?></span>
		</div>
	</div>

	<div class="gs-ds">
		<div class="content order">
			<span>Pemesanan Dibatalkan</span>
		</div>
		<div class="res">
			<span><?php echo $cancel;?></span>
		</div>
	</div>

</div>



<div id="line-cart">
	<div id="element-title">
		Grafik Pemesanan
	</div>

	<div id="carts">
	</div>
</div>

<script type="text/javascript">

Morris.Area({
  element: 'carts',
  data: [<?php  foreach($graphic_data as $row)
		{
			$chart_data = '{date:"'.$row->date_time_inv.'", total:"'.$row->total_inv.'"},';
			$cart = $chart_data;
			echo $cart;
		}
		?>
],
  xkey: 'date',
  ykeys: ['total'],
  labels: ['Total Invoice']
});

</script>