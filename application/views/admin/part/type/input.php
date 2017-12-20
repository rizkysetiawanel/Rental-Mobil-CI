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

<div class="gs-ipt-wrapper">

<label class="ipt-title">Input Tipe Kendaraan</label>

<form id="inputForm">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input id="title" type="text" class="form-control" name="title" placeholder="Nama tipe Kendaraan" required="">
  </div>
  <br>
    <input id="desc" type="text" name="desc" placeholder="Masukan deskripsi tipe Kendaraan" class="file form-control" required="">
  <br>


  <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Tipe Kendaraan</button>
</form>


</div>

<script src="<?php echo base_url();?>assets/hadmin/js/close.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/hadmin/js/save/type_save.js" type="text/javascript"></script>