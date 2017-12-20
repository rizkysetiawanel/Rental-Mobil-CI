<style type="text/css">

.gs-ipt-wrapper
{
    width: 40%;
    height: 200px;
    margin: auto;
    margin-top: 3%;
}

</style>

<!-- close jqContent -->
<div class="close-jqContent">
	X
</div>

<div class="gs-ipt-wrapper">

<label class="ipt-title">Input Halaman</label>

<form id="inputForm">
  <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input id="title" type="text" class="form-control" name="title" placeholder="Masukan Judul Halaman" required="">
  </div>
  <br>
  <div id="texte"></div>
  <textarea name="desc" id="desc" style="display:none;"></textarea>

  <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan Halaman</button>
</form>


</div>

<script src="<?php echo base_url();?>assets/hadmin/js/close.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/hadmin/js/save/page_save.js" type="text/javascript"></script>

<script type="text/javascript">

/**
 *
 *
 *  @package      Summernote text editor
 *  @autohr       Yuilius
 *
 */

$(document).ready(function() {
  $('#texte').summernote();

  // membuat placeholder summernote
  var string = 'Deskripsi Bus . . .';
  $('#texte').summernote('code', string);
});

</script>