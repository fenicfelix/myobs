<!-- Main content -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="MyJobs - Busara Center">
<meta name="keywords" content="MyJobs">
<link rel="shortcut icon" href="<?=base_url()?>favicon/favicon.ico" type="image/x-icon">
<title>MyJobs | Busara Center</title>
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
<!-- /site favicon -->

<!-- Google Fonts -->
<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Amarante' />
<!-- /Google Fonts -->
<style>
.brand-start{
	font-family: 'Amarante';
	font-size: 22px;
	color: #fff;
}
.brand-end{
	font-size: 12px;
	color: $fff;
}
</style>

<?php
if(isset($css_files)) {
	foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach;
} else {
	?>
	<!-- Entypo font stylesheet -->
	<link href="<?=base_url();?>assets/css/entypo.css" rel="stylesheet">
	<!-- /entypo font stylesheet -->

	<!-- Font awesome stylesheet -->
	<link href="<?=base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
	<!-- /font awesome stylesheet -->

	<!-- Bootstrap stylesheet min version -->
	<link href="<?=base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- /bootstrap stylesheet min version -->

	<!-- Mouldifi core stylesheet -->
	<link href="<?=base_url();?>assets/css/mouldifi-core.css" rel="stylesheet">
	<!-- /mouldifi core stylesheet -->

	<link href="<?=base_url();?>assets/css/plugins/datepicker/bootstrap-datepicker.css" rel="stylesheet">
	<link href="<?=base_url();?>assets/css/plugins/select2/select2.css" rel="stylesheet">

	<link href="<?=base_url();?>assets/css/mouldifi-forms.css" rel="stylesheet">
	<link href="<?=base_url();?>assets/css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
	<link href="<?=base_url();?>assets/js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet">
	
	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="<?=base_url();?>assets/js/html5shiv.min.js"></script>
		  <script src="<?=base_url();?>assets/js/respond.min.js"></script>
	<![endif]-->
	<?php
}

?>
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<script src="<?=base_url();?>assets/grocery_crud/js/jquery-1.11.1.min.js"></script>
</head>