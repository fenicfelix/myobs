<body class="login-page">
<div class="login-container">
	<div class="login-branding">
		<a href="index.html"><img src="<?=base_url();?>assets/images/logo.png" alt="Mouldifi" title="Mouldifi"></a>
	</div>
	<div class="login-content">
		<h2><strong>Welcome</strong>, please login</h2>
		<form method="post" action="#">                        
			<div class="form-group">
				<input type="text" placeholder="Username" class="form-control">
			</div>                        
			<div class="form-group">
				<input type="password" placeholder="Password" class="form-control">
			</div>
			<div class="form-group">
				 <div class="checkbox checkbox-replace">
					<input type="checkbox" id="remeber">
					<label for="remeber">Remeber me</label>
				  </div>
			 </div>
			<div class="form-group">
				<button class="btn btn-primary btn-block">Login</button>
			</div>
			<p class="text-center"><a href="forgot-password.html">Forgot your password?</a></p>                        
		</form>
	</div>

