<?php

$this->set_css($this->default_theme_path.'/mouldifi/css/entypo.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/font-awesome.min.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/bootstrap.min.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/mouldifi-core.css');

$this->set_css($this->default_theme_path.'/mouldifi/css/plugins/datepicker/bootstrap-datepicker.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/plugins/select2/select2.css');

$this->set_css($this->default_theme_path.'/mouldifi/css/plugins/toastr/toastr.min.css');

$this->set_css($this->default_theme_path.'/mouldifi/css/mouldifi-forms.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/plugins/datatables/jquery.dataTables.css');
$this->set_css($this->default_theme_path.'/mouldifi/js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css');

$this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);

if (!$this->is_IE7()) {
	$this->set_js_lib($this->default_theme_path.'/mouldifi/js/html5shiv.min.js');
	$this->set_js_lib($this->default_theme_path.'/mouldifi/js/respond.min.js');
}

$this->set_js_lib($this->default_theme_path.'/mouldifi/js/bootstrap.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/metismenu/jquery.metisMenu.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/blockui-master/jquery-ui.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/blockui-master/jquery.blockUI.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/functions.js');


$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/datatables/jquery.dataTables.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/datatables/dataTables.bootstrap.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/datatables/jszip.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/datatables/pdfmake.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/datatables/vfs_fonts.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/datatables/extensions/Buttons/js/buttons.html5.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/datatables/extensions/Buttons/js/buttons.colVis.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/toastr/toastr.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/mouldifi-functions.js');

?>
<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';
	var subject = '<?php echo addslashes($subject); ?>';

	var unique_hash = '<?php echo $unique_hash; ?>';

	var displaying_paging_string = "<?php echo str_replace( array('{start}','{end}','{results}'),
		array('_START_', '_END_', '_TOTAL_'),
		$this->l('list_displaying')
	   ); ?>";
	var filtered_from_string 	= "<?php echo str_replace('{total_results}','_MAX_',$this->l('list_filtered_from') ); ?>";
	var show_entries_string 	= "<?php echo str_replace('{paging}','_MENU_',$this->l('list_show_entries') ); ?>";
	var search_string 			= "<?php echo $this->l('list_search'); ?>";
	var list_no_items 			= "<?php echo $this->l('list_no_items'); ?>";
	var list_zero_entries 			= "<?php echo $this->l('list_zero_entries'); ?>";

	var list_loading 			= "<?php echo $this->l('list_loading'); ?>";

	var paging_first 	= "<?php echo $this->l('list_paging_first'); ?>";
	var paging_previous = "<?php echo $this->l('list_paging_previous'); ?>";
	var paging_next 	= "<?php echo $this->l('list_paging_next'); ?>";
	var paging_last 	= "<?php echo $this->l('list_paging_last'); ?>";

	var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

	var default_per_page = <?php echo $default_per_page;?>;

	var unset_export = <?php echo ($unset_export ? 'true' : 'false'); ?>;
	var unset_print = <?php echo ($unset_print ? 'true' : 'false'); ?>;

	var export_text = '<?php echo $this->l('list_export');?>';
	var print_text = '<?php echo $this->l('list_print');?>';

	<?php
	//A work around for method order_by that doesn't work correctly on datatables theme
	//@todo remove PHP logic from the view to the basic library
	$ordering = 0;
	$sorting = 'asc';
	if(!empty($order_by))
	{
		foreach($columns as $num => $column) {
			if($column->field_name == $order_by[0]) {
				$ordering = $num;
				$sorting = isset($order_by[1]) && $order_by[1] == 'asc' || $order_by[1] == 'desc' ? $order_by[1] : $sorting ;
			}
		}
	}
	?>

	var datatables_aaSorting = [[ <?php echo $ordering; ?>, "<?php echo $sorting;?>" ]];

</script>
<?php
	if(!empty($actions)){
?>
	<style type="text/css">
		<?php foreach($actions as $action_unique_id => $action){?>
			<?php if(!empty($action->image_url)){ ?>
				.<?php echo $action_unique_id; ?>{
					background: url('<?php echo $action->image_url; ?>') !important;
				}
			<?php }?>
		<?php }?>
	</style>
<?php
	}
?>
<?php if($unset_export && $unset_print){?>
<style type="text/css">
	.datatables-add-button
	{
		position: static !important;
	}
</style>
<?php }?>
<h1 class="page-title"><?=$subject;?></h1>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<ul class="panel-tool-options">
					<?php if(!$unset_add){?>
						<li><a href="<?php echo $add_url?>"><span class="label label-success"><i class="icon-plus"></i> <?php echo $this->l('list_add'); ?> <?php echo $subject?></span></a></li>
					<?php }?>
					<li><a data-rel="collapse" href="<?=base_url();?>assets/#"><i class="icon-down-open"></i></a></li>
					<li><a data-rel="reload" href="<?=base_url();?>assets/#"><i class="icon-arrows-ccw"></i></a></li>
					<li><a data-rel="close" href="<?=base_url();?>assets/#"><i class="icon-cancel"></i></a></li>
				</ul>
			</div>
			<div class="panel-body">
				<div id='list-report-success' class='report-div success report-list' <?php if($success_message !== null){?>style="display:block"<?php }?>><?php
				 if($success_message !== null){?>
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
								<strong>Success!</strong> <?php echo $success_message; ?>
							</div>
						</div>
					</div>
				<?php }
				?>
				</div>
				<div class="table-responsive">
				
					<?php echo $list_view?>
					
				</div>
			</div>
		</div>
	</div>
</div>