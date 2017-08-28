<body class="login-page">
<div class="login-container">
	<div class="login-branding">
		<a href="index.html"><img src="<?=base_url();?>assets/images/logo.png" alt="Mouldifi" title="Mouldifi"></a>
	</div>
	<div class="login-content">
		<div class="login-avatar">
			<img class="img-circle" src="<?=base_url();?>assets/images/man-3.jpg" alt="" title="">
		</div>
		<div class="text-center">
			<h4><strong>John Smith</strong></h4>
			<p>Enter your password to unlock the screen!</p>
		</div>
		<form method="post" action="index.html">                        
			<div class="form-group">
				<input type="password" placeholder="Password" class="form-control">
			</div>
			<div class="form-group">
				<button class="btn btn-primary btn-block">Unlock</button>
			</div>
		</form>
		<p class="text-center"><a href="login.html">Sign in using different account <i class="icon-right-open"></i></a></p>
	</div>

