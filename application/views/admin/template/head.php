<!DOCTYPE html>
<html>
<head>
	<title>
			<?php 
			// memanggil judul web
				echo $title_web.' | '.$page_web;
		   	?>
	</title>

	<!-- css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/hadmin/css/style.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Karla|Work+Sans" rel="stylesheet">
	<!-- js -->
	<script src="<?php echo base_url();?>assets/hadmin/js/jquery-3.2.1.js" type="text/javascript"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.js"></script>

<!-- Latest compiled and minified Locales -->
<script src="<?php echo base_url();?>assets/hadmin/js/b-table-cn.js"></script>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/crop/croppie.js"></script>
<link href="<?php echo base_url();?>assets/crop/croppie.css" rel="stylesheet" type="text/css">

	<script type="text/javascript">
		var bu = '<?php echo base_url();?>';
	</script>

	<script src="<?php echo base_url();?>assets/hpublic/js/auto_chinv.js" type="text/javascript"></script>

</head>
<body>
<div id="jqContent">
</div>