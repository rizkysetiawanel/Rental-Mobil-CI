<style type="text/css">

.gs-ipt-wrapper
{
    width: 40%;
    margin: auto;
    margin-top: 3%;
    margin-bottom: 20px;
}

</style>

<div class="close-jqContent">
  X
</div>

<div class="gs-ipt-wrapper">

<label class="ipt-title">Edit Akun Bank</label>
<?php foreach($bank_data as $bd){}?>

<form id="edittBankForm">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input type="hidden" id='idbank' name="idbank" value="<?php echo $bd->id_bank;?>">
    <input id="title" type="text" class="form-control" name="hotel" value="<?php echo $bd->name_bank;?>" placeholder="Nama Bank" required="">
  </div>
  <br>

  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
    <input id="noAcc" type="number" class="form-control" value="<?php echo $bd->acc_bank;?>" name="hotel" placeholder="Nomor Rekening" required="">
  </div>
  <br>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input id="owner" type="text" class="form-control" value="<?php echo $bd->owner_bank;?>" name="price" placeholder="Nama Pemilik" required="">
  </div>
  <br>
    <label for="imgn" class="btn btn-success" style="display: block; width: 100%;">Gambar Bank</label>
    <input id="imgn" type="file" name="img" class="file form-control" style="margin-left: 2000px; position: fixed;">
  <br>

  <div class="left">
  </div>


  <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Bank</button>
</form>


</div>

<script src="<?php echo base_url();?>assets/hadmin/js/close.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/hadmin/js/save/setting_save.js" type="text/javascript"></script>

<script type="text/javascript">

</script>