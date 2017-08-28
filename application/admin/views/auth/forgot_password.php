<?php $this->load->view("includes/header"); ?>

	<body class="login-page">
	<div class="login-container">
		<div class="login-branding">
			<a href="#"><span class="brand-start"><img src="<?=base_url().'assets/images/myjobs_logo.png'?>" alt="MyJobs Logo" width="200"></span></a>
		</div>
		<div class="login-content">
			<h2>Forgot your password?</h2>
			<p>Don't worry, we'll send you an email to reset your password.</p>
			<div id="infoMessage"><?php echo $message;?></div>
			
			<?php echo form_open("auth/forgot_password");?>
			
				<div class="form-group">
					<?php echo form_input($identity);?>
				</div>
				
				<p>Don't remember your email? <a href="#">Contact Support</a>.</p>
				
				<div class="form-group">
					<button class="btn btn-primary btn-block">Reset Password</button>
				</div>
				
			</form>
			
			<p class="text-center"><a href="<?=site_url('auth/login');?>">Back to Login</a></p>                        
			
		</div>
		
		
<?php $this->load->view("includes/footer"); ?>