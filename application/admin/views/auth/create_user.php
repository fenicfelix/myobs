<?php $this->load->view("includes/header"); ?>

<body class="login-page">
	<div class="login-container">
		<div class="login-branding">
			<a href="#"><span class="brand-start"><img src="<?=base_url().'assets/images/myjobs_logo.png'?>" alt="MyJobs Logo" width="200"></span></a>
		</div>
		<div class="login-content">
			<h1><?php echo lang('create_user_heading');?></h1>
			<p><?php echo lang('create_user_subheading');?></p>
			<div id="infoMessage"><?php echo $message;?></div>
			
			<?php echo form_open("auth/create_user");?>
			
				<div class="form-group">
					<?php echo form_input($stage_name);?>
				</div>
			
				<!-- div class="form-group">
					<?php echo form_input($first_name);?>
				</div>
				
				<div class="form-group">
					<?php echo form_input($last_name);?>
				</div -->
				
				<?php
				  if($identity_column!=='email') {
					  echo '<p>';
					  echo lang('create_user_identity_label', 'identity');
					  echo '<br />';
					  echo form_error('identity');
					  echo form_input($identity);
					  echo '</p>';
				  }
				  ?>
				
				<div class="form-group">
					<?php echo form_input($email);?>
				</div>
				
				<!-- div class="form-group">
					<?php echo form_input($company);?>
				</div -->
				
				<!-- div class="form-group">
					<?php echo form_input($phone);?>
				</div -->
				
				<div class="form-group">
					<?php echo form_input($password);?>
				</div>
				
				<div class="form-group">
					<?php echo form_input($password_confirm);?>
				</div>
				
				<div class="form-group">
					<input type="text" name="fromMobile" class="form-control" value="Y" />
				</div>
				
				
				<div class="form-group">
					<button class="btn btn-primary btn-block"><?=lang('create_user_submit_btn');?></button>
				</div>
				
			</form>                        
		
		
<?php $this->load->view("includes/footer"); ?>