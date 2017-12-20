<style type="text/css">

.gs-ipt-wrapper
{
    width: 40%;
    height: 200px;
    margin: auto;
    margin-top: 3%;
}

</style>

<div class="close-jqContent">
	X
</div>

<?php foreach($seat_data as $sd):?>
<?php endforeach;?>

<div class="gs-ipt-wrapper">

<label class="ipt-title">Input Seat</label>

<form id="editForm">
  <div class="input-group">
    <input type="hidden" name="id" value="<?php echo $sd->id_seat;?>">
    <input type="hidden" value="<?php echo $sd->total_seat;?>" name="titlef">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input id="title" type="number" class="form-control" name="title" value="<?php echo $sd->total_seat;?>" required="">
  </div>
  <br>

  <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Seat</button>
</form>


</div>

<script src="<?php echo base_url();?>assets/hadmin/js/close.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/hadmin/js/save/seat_save.js" type="text/javascript"></script>