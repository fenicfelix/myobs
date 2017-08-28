<?php $this->load->view("includes/header"); ?>

<?php
if(in_array($this->uri->segment(2), ["login", "reset_password", "lock_screen"])) {
	$this->load->view($this->uri->segment(2));
} else {
	?>
	<body>
		<!-- Page container -->
		<div class="page-container">

			<?php $this->load->view("includes/sidebar"); ?>
		  
		  <!-- Main container -->
		  <div class="main-container">
		  
				<?php $this->load->view("includes/top_header"); ?>
			
			 <!-- Main content -->
			 <div class="main-content">
				<h1 class="page-title"><?=$page_title?></h1>
				<?php $this->load->view($body_content);?>
				
				<?php $this->load->view("includes/static_footer"); ?>
				
			  </div>
			  <!-- /main content -->
			  
		  </div>
		  <!-- /main container -->
		  
		 </div>
		<!-- /page container -->
	<?php
}
?>
  
<?php $this->load->view("includes/footer"); ?>