<?php

$this->set_css($this->default_theme_path.'/mouldifi/css/entypo.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/font-awesome.min.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/bootstrap.min.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/mouldifi-core.css');

$this->set_css($this->default_theme_path.'/mouldifi/css/plugins/datepicker/bootstrap-datepicker.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/plugins/select2/select2.css');

$this->set_css($this->default_theme_path.'/mouldifi/css/mouldifi-forms.css');
$this->set_css($this->default_theme_path.'/mouldifi/css/plugins/toastr/toastr.min.css');

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
$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/mouldifi-edit.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/toastr/toastr.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/select2/select2.full.min.js');
$this->set_js_lib($this->default_theme_path.'/mouldifi/js/plugins/datepicker/bootstrap-datepicker.js');
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<h3 class="panel-title"><?php echo $this->l('form_edit'); ?> <?php echo $subject?></h3>
				<ul class="panel-tool-options"> 
					<li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
					<li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
					<li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
				</ul>
			</div>
			<div class="panel-body">
				<?php echo form_open( $update_url, 'method="post" id="crudForm" enctype="multipart/form-data" class="form-horizontal"'); ?>
				<?php
					$counter = 0;
						foreach($fields as $field)
						{
							$even_odd = $counter % 2 == 0 ? 'odd' : 'even';
							$counter++;
				?>
				
				
				
				<div class="form-group" id="<?php echo $field->field_name; ?>_input_box"> 
					<label class="col-sm-2 control-label"><?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<code class='required'>*</code> " : ""?></label> 
					<div class="col-sm-10"> 
						<?php echo $input_fields[$field->field_name]->input?>
					</div> 
				</div>
				
				<div class="line-dashed"></div>
				
				<?php }?>
				
				<!-- Start of hidden inputs -->
					<?php
						foreach($hidden_fields as $hidden_field){
							echo $hidden_field->input;
						}
					?>
				<!-- End of hidden inputs -->
				
				<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
				<div class='line-1px'></div>
				<div id='report-error' class='report-div error'></div>
				<div id='report-success' class='report-div success'></div>
				
				<!-- End of hidden inputs -->
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<button class="btn btn-primary" id="form-button-save" type="submit"><?php echo $this->l('form_update_changes'); ?></button>
							<?php 	if(!$this->unset_back_to_list) { ?>
							<button class="btn btn-primary" id="save-and-go-back-button" type="button"><?php echo $this->l('form_update_and_go_back'); ?></button>
							<button class="btn btn-white" id="cancel-button" type="button"><?php echo $this->l('form_cancel'); ?></button>
							<?php }?>
							<div class='form-button-box loading-box'>
								<div class='small-loading' id='FormLoading'><?php echo $this->l('form_update_loading'); ?></div>
							</div>
						</div>
					</div>
				
				<?php echo form_close(); ?>




			</div>
		</div>
	</div>
</div>


<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
</script>