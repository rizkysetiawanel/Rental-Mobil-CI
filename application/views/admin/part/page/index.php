<button class="btn btn-default cnw">Tambah Halaman</button>

<div class="datalist">

	<table data-toggle="table"
       data-url="<?php echo base_url();?>admin/page/page_data"
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
            <th data-field="title">Judul Halaman</th>
            <th data-field="desc">Deskripsi</th>
            <th data-field="date">Tanggal</th>
            <th data-field="action">Aksi</th>
        </tr>
    </thead>
</table>

</div>

<script src="<?php echo base_url();?>assets/hadmin/js/action/page_ac.js" type="text/javascript"></script>