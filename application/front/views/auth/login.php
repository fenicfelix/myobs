<?php $this->load->view("includes/header"); ?>

	<body class="login-page">
	<div class="login-container">
		<div class="login-branding">
			<a href="#"><span class="brand-start"><img src="<?=base_url().'assets/images/myraydio_logo.png'?>" alt="MyRaydio Logo"></span></a>
		</div>
		<div class="login-content">
			<h2><strong>Login to continue</strong></h2>
			<p><?php echo lang('login_subheading');?></p>
			<div id="infoMessage"><?php echo $message;?></div>
			
			<?php echo form_open("auth/login");?>
			
				<div class="form-group">
					<?php echo form_input($identity);?>
				</div>

				<div class="form-group">
					<?php echo form_input($password);?>
				</div>

				<div class="form-group">
					<div class="checkbox checkbox-replace">
						<?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
						<label for="remeber">Remember me</label>
					</div>
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-block">Login</button>
				</div>
			</form>
			
			<p class="text-center"><a href="<?=site_url('auth/forgot_password');?>">Forgot your password?</a></p>                        
			
		</div>
		
		
<?php $this->load->view("includes/footer"); ?>