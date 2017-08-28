<?php $this->load->view("includes/header"); ?>

	<body class="login-page">
	<div class="login-container">
		<div class="login-branding">
			<a href="#"><span class="brand-start"><img src="<?=base_url().'assets/images/myjobs_logo.png'?>" alt="MyJobs Logo" width="200"></span></a>
		</div>
		<div class="login-content">
			<h1><?php echo lang('change_password_heading');?></h1>
			<div id="infoMessage"><?php echo $message;?></div>
			
			<?php echo form_open("auth/change_password");?>
			
				<div class="form-group">
					<?php echo form_input($old_password);?>
				</div>
				
				<div class="form-group">
					<?php echo form_input($new_password);?>
					<span class="input-info">(at least <?=$min_password_length;?> characters long)</span>
				</div>
				
				<div class="form-group">
					<?php echo form_input($new_password_confirm);?>
				</div>
				
				<?php echo form_input($user_id);?>
				
				<div class="form-group">
					<button class="btn btn-primary btn-block"><?=lang('change_password_submit_btn');?></button>
				</div>
				
			</form>
			
		</div>
		
		
<?php $this->load->view("includes/footer"); ?>