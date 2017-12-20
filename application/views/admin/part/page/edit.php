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

<?php foreach($page_data as $pd):?>
<?php endforeach;?>

<div class="gs-ipt-wrapper">

<label class="ipt-title">Input Halaman</label>

<form id="editForm">
  <div class="input-group">
    <input type="hidden" id="namef" name="namef" value="<?php echo $pd->name_page;?>">
    <input type="hidden" id="idcontent" name="idcontent" value="<?php echo $pd->id_page;?>">
    <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
    <input id="title" type="text" class="form-control" name="title" value="<?php echo $pd->name_page;?>" placeholder="Masukan Judul Halaman" required="">
  </div>
  <br>
  <div id="texte"></div>

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
  var string = '<?php echo $pd->desc_page;?>';
  $('#texte').summernote('code', string);
});

</script>