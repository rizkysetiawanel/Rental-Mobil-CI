<button class="btn btn-default cnw">Tambah Tipe Kendaraan</button>

<div class="datalist" style="margin-top: 15px;">

	<table data-toggle="table"
       data-url="<?php echo base_url();?>admin/type/type_data"
       data-pagination="true"
       data-side-pagination="server"
       data-page-list="[5, 10, 20, 50, 100, 200]"
       data-search="true"

       data-show-refresh="true"
       data-show-toggle="true"
       data-show-columns="true"
       >
    <thead>
        <tr>
            <th data-field="title">Tipe Kendaraan</th>
            <th data-field="date">Tanggal</th>
            <th data-field="action">Aksi</th>
        </tr>
    </thead>
</table>

</div>

<script src="<?php echo base_url();?>assets/hadmin/js/action/type_ac.js" type="text/javascript"></script>

<script type="text/javascript">
// edit data tipe bus
$(document).on('click', '.edit', function(){

  // variable
  var id    = $(this).attr('idcontent');
  
  $('#jqContent').slideDown('400');
  $('#jqContent').load(bu+'admin/type/type_edit/'+id);

});
</script>
