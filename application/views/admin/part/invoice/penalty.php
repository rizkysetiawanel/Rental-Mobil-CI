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

<label class="ipt-title">Masukan Denda</label>

<form id="pForm">
  <div class="input-group">
    <input type="hidden" name="idinv" value="<?php echo $idinv;?>">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input id="title" type="Number" class="form-control" name="penalty" placeholder="Masukan Denda" required="">
  </div>
  <br>

  <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Denda</button>
</form>


</div>

<script src="<?php echo base_url();?>assets/hadmin/js/close.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/hadmin/js/action/invoice_ac.js" type="text/javascript"></script>