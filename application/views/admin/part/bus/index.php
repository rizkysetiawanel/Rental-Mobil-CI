<button class="btn btn-default cnw">Tambah Kendaraan</button>

<div class="datalist">

	<table data-toggle="table"
       data-url="<?php echo base_url();?>admin/bus/bus_data"
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
            <th data-field="title">Nama Kendaraan</th>
            <th data-field="price">Harga(Hari)</th>
            <th data-field="date">Tanggal</th>
            <th data-field="action">Aksi</th>
        </tr>
    </thead>
</table>

</div>

<script src="<?php echo base_url();?>assets/hadmin/js/hotel/hotel.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).on('click', '#edit', function(){

  var id = $(this).attr('idcontent');

  $('#jqContent').load(bu+'admin/bus/bus_edit/'+id);
  $('#jqContent').slideDown('400');

});

$(document).on('click', '#delete', function(){

  var id = $(this).attr('idcontent');

  $.get(bu+'admin/bus/bus_delete/'+id, function(data){
    alert(data);
  });

});
</script>