<style type="text/css">

.gs-ipt-wrapper
{
    width: 40%;
    height: 200px;
    margin: auto;
    margin-top: 3%;
}

</style>

<?php foreach($type_data as $td){}?>

<div class="close-jqContent">
	X
</div>

<div class="gs-ipt-wrapper">

<label class="ipt-title">Input Tipe Bus</label>

<form id="editForm">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input type="hidden" name="titlef" value="<?php echo $td->name_cat;?>">
    <input type="hidden" name="id" value="<?php echo $td->id_cat;?>">
    <input id="title" type="text" class="form-control" name="title" placeholder="Nama tipe bus" value="<?php echo $td->name_cat;?>" required="">
  </div>
  <br>
    <input id="desc" type="text" name="desc" placeholder="Masukan deskripsi tipe bus" class="file form-control" value="<?php echo $td->desc_cat;?>" required="">
  <br>


  <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Tipe Bus</button>
</form>


</div>

<script src="<?php echo base_url();?>assets/hadmin/js/close.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/hadmin/js/save/type_save.js" type="text/javascript"></script>

<script type="text/javascript">
// menyimpan data tipe bus
$('#editForm').on('submit', function(){

  $.ajax({

    url:bu+'admin/type/save_type_edit',
    type:'POST',
    data:new FormData(this),
    contentType:false,
    processData:false,
    success:function(data)
    {
      alert(data);
    }

  });

  return false;

});

</script>