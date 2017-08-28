<?php
if(isset($js_files)) {
	foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach;
	?>
	<script>$(document).ready(function() {$('#FormLoading').hide();});</script>
	<?php
	if(!$this->uri->segment(3)) {
		$this->load->view('includes/js/datatables');
	}
} else {
	?>
	<!--Load JQuery-->
	<script src="<?=base_url();?>assets/js/jquery.min.js"></script>
	<script src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>assets/js/plugins/metismenu/jquery.metisMenu.js"></script>
	<script src="<?=base_url();?>assets/js/plugins/blockui-master/jquery-ui.js"></script>
	<script src="<?=base_url();?>assets/js/plugins/blockui-master/jquery.blockUI.js"></script>
<?php
	if($this->uri->segment(2) == "dashboard") {
		$this->load->view('includes/js/analytics');
	} else {
		?>
		<script src="<?=base_url();?>assets/js/functions.js"></script>

		<script src="<?=base_url();?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="<?=base_url();?>assets/js/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?=base_url();?>assets/js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
		<script src="<?=base_url();?>assets/js/plugins/datatables/jszip.min.js"></script>
		<script src="<?=base_url();?>assets/js/plugins/datatables/pdfmake.min.js"></script>
		<script src="<?=base_url();?>assets/js/plugins/datatables/vfs_fonts.js"></script>
		<script src="<?=base_url();?>assets/js/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
		<script src="<?=base_url();?>assets/js/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>


		<!-- Select2-->
		<script src="<?=base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>
		<!--Bootstrap ColorPicker-->
		<script src="<?=base_url();?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
		<!--Bootstrap DatePicker-->
		<script src="<?=base_url();?>assets/js/plugins/datepicker/bootstrap-datepicker.js"></script>

		<script src="<?=base_url();?>assets/js/mouldifi-functions.js"></script>
		<?php
	}
}

if(in_array($this->uri->segment(3), ["add", "edit"])) {
	?>
	<script>
	$(document).ready(function() {
		$(".select2").select2();
		$(".select2-placeholer").select2({
			allowClear: true
		});
	});
	</script>
	<?php
}
?>

<script>
$(document).ready(function() {
	$('#FormLoading').hide();
	$('.datepicker-input').datepicker({
		keyboardNavigation: false,
		forceParse: false,
		todayHighlight: true
	});
});
</script>

</body>
</html>
