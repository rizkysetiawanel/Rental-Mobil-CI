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

<label class="ipt-title">Input Kendaraan</label>

<form id="inputForm">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input id="hotel" type="text" class="form-control" name="hotel" placeholder="Nama Kendaraan" required="">
  </div>
  <br>
 	<div id="texte"></div>
 	<textarea name="desc" id="desc" style="display:none;"></textarea>
  <br>
  <div id="textf"></div>
  <textarea name="info" id="info" style="display:none;"></textarea>
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-yen"></i></span>
    <input id="price" type="number" class="form-control" name="price" placeholder="Harga(hari)" required="">
  </div>
  <br>

  <br>
  <!-- TYPE HOTEL -->
  <label class="ipt-title" >Tipe Kendaraan</label>
  <div class="fd-scroll">
  <?php foreach($troom_data as $td):?>

    <div class="fd-content" style="height: auto;width: auto;padding-left: 5px;padding-right: 5px;">

        <div class="content" style="display: block;width: 100%;padding: 5px;">
          <label style="display: block;width: 100%;text-align: center; font-size: 11px;">
            <?php echo $td->name_cat;?>
          </label>
          <input type="checkbox" name="troom[]" id="troom" value="<?php echo $td->id_cat;?>" style="display: none;" >
        </div>

    </div>

  <?php endforeach;?>
  </div>
  <!-- END TYPE HOTEL -->

  <br>
  <!-- FAC HOTEL -->
  <label class="ipt-title" >Seat Kendaraan</label>

  <div class="fd-scroll">
  <?php foreach($facility_data as $fd):?>

    <div class="fd-content">
        <div class="content" style="display: block;width: 100%;padding: 5px;">
          <label style="display: block;width: 100%;text-align: center; font-size: 11px;">
            <?php echo $fd->total_seat;?>
          </label>
          <input type="checkbox" name="facility[]" id="facility" value="<?php echo $fd->id_seat;?>" style="display: none;" >
        </div>

    </div>

  <?php endforeach;?>
  </div>
  <!-- ENDFAC HOTEL -->

  <br>
  	<label for="imgn" class="btn btn-success" style="display: block; width: 100%;">Gambar Kendaraan</label>
    <input id="imgn" type="file" name="img" class="file form-control" required="" style="margin-left: 2000px; position: fixed;">
  <br>

  <div class="left">
  </div>


  <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Kendaraan</button>
</form>


</div>

<script src="<?php echo base_url();?>assets/hadmin/js/close.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/hadmin/js/save/hotel_save.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {
  $('#texte').summernote();

  var string = 'Deskripsi Kendaraan . . .';
  $('#texte').summernote('code', string);
});

$('.fd-content').on('click', function(){

    var checkbox = $(this).find("input[type='checkbox']");

    if( checkbox.attr("checked") == "" ){
        checkbox.attr("checked","true");
    } else {
        checkbox.attr("checked","");
    }
  $(this).toggleClass('active');

});

</script>