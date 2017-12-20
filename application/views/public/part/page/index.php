<style type="text/css">
	
.page-wrapper
{
	width: 100%;
	padding:10px;
}

.page-wrapper
h1
{
    border-bottom: 2px solid#2f2e52
}

.page-wrapper span
{
    font-style: italic;
    font-size: 12px;

}

.page-wrapper .content
{
	margin-top: 29px
}

</style>

<?php foreach($page_data as $pd){}?>

<div class="page-wrapper">

	<h1><?php echo $pd->name_page;?></h1>
	<span>Diperbarui <?php echo exDate($pd->date_page);?></span>


	<div class="content">
		<?php echo $pd->desc_page;?>
	</div>

</div>