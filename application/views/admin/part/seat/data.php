<?php foreach($seat_data as $sd):?>

	<div class="fd-content">

    	<div class="content" style=" display: inline-block; width: 100%;">
    		<label style="    display: block;
    padding-top: 10px;
    padding-bottom: 10px;
    background: #62a8e4;
    box-shadow: 1px 1px 1px 1px #ddd;
    border-radius: 4px;
    color: #fff;
">Seat <?php echo $sd->total_seat;?></label>

    		<button class="btn btn-primary edit" idcontent="<?php echo $sd->id_seat;?>" style="height: 28px;font-size: 12px;"><span class="glyphicon glyphicon-edit"></span></button> 
		    <button class="btn btn-danger del" idcontent="<?php echo $sd->id_seat;?>" style="height: 28px;font-size: 12px;"><span class="glyphicon glyphicon-trash"></span></button>
    	</div>

	</div>

<?php endforeach;?>

<script type="text/javascript">

// mengedit seat data
$(document).on('click', '.edit', function(){

    // variable
    var id      = $(this).attr('idcontent');

    // show edit
    $('#jqContent').load(bu+'admin/seat/seat_edit/'+id);
    $('#jqContent').slideDown('400');

});

</script>