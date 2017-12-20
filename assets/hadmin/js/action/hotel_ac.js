$(document).on('click', '#edit', function(){

  var id = $(this).attr('idcontent');

  $.get(bu+'admin/bus/bus_delete/'+id, function(data){
    alert(data);
  });

});