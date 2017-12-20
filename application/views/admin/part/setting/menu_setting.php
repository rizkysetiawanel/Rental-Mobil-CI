<h4>Menu Setting</h4>
<br>
  <style>
  #sortable1, #sortable2 {
    border: 1px solid #eee;
    width: 142px;
    min-height: 20px;
    list-style-type: none;
    margin: 0;
    padding: 5px 0 0 0;
    float: left;
    margin-right: 10px;
  }
  #sortable1 li, #sortable2 li {
    margin: 0 5px 5px 5px;
    padding: 5px;
    font-size: 1.2em;
    width: 120px;
        cursor: move;
  }
  #sortable2
  {
  	width: 600px;
  }

  #sortable2 li
  {
  	display: inline-block;
  	vertical-align: top;
  }
  </style>

 
<ul id="sortable1" class="connectedSortable">
<?php foreach($page as $pd):?>
  <li class="ui-state-default">
  	<span class="glyphicon glyphicon-list-alt"></span>
  	<input type="hidden" name="idmenu[]" value="<?php echo $pd->id_page;?>">
  	<?php echo $pd->name_page;?>
  </li>
<?php endforeach;?>
</ul>


<form id="menuForm">
<ul id="sortable2" class="connectedSortable">
<?php foreach($menu as $md):?>
<?php if(count($menu)>0):?>
	  <li class="ui-state-default">
  	<span class="glyphicon glyphicon-list-alt"></span>
  	<input type="hidden" name="idmenu[]" value="<?php echo $md->id_page;?>">
  	<?php echo $md->name_page;?>
  </li>
<?php else:?>
<?php endif;?>
<?php endforeach;?>
</ul>
<br>
<div class="s" style="    text-align: left;
    padding-top: 44px;">
<button class="btn btn-success save" style="    display: block;
    margin-top: 80px;">Simpan Menu</button></div>
 </form>
<script>

$( function() {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
} );


$('#menuForm').on('submit', function(){

	$.ajax({

		url:bu+'admin/setting/save_menu_web',
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