<style type="text/css">
	
h4
{
    padding-left: 6px;
    border-bottom: 1px solid#d7dbdc;
    padding-bottom: 7px;
}

thead
{
background: #71acde;
    color: #fff;
    border-bottom: 3px solid#041a25;
}

.datalist
img
{
width: 84px;
height: 59px;
cursor: pointer;
}

</style>

<button class="btn btn-default tp"><span class="glyphicon glyphicon-retweet"></span> Pending</button>
<button class="btn btn-default kt"><span class="glyphicon glyphicon-check"></span> Konfirmasi</button>
<button class="btn btn-success ts"><span class="glyphicon glyphicon-book"></span> Selesai</button>
<button class="btn btn-danger tb"><span class="glyphicon glyphicon-remove"></span> Dibatalkan</button>



<div class="datalist" style="margin-top: 15px;">

	

</div>

<script src="<?php echo base_url();?>assets/hadmin/js/action/invoice_ac.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).on('click', '.tb', function(){

	// load
	$('.datalist').load(bu+'admin/invoice/invoice_draff_view');

});

$(document).on('click', 'img', function(){

	var src = $(this).attr('invimg');

	$('#jqContent').slideDown('400');
	$('#jqContent').load(bu+'admin/invoice/invoice_prev/'+src);
});

$(document).on('click', '#conf', function(){

	var id = $(this).attr('idbus');
	var conf 	= confirm('Apa anda ingin konfirmasi tagihan ini ?');

	if(conf == true)
	{
		$.get(bu+'admin/invoice/invoice_confirm/'+id, function(data)
		{
			alert(data);
		});
	}

});
</script>
