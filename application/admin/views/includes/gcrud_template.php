<?php $this->load->view("includes/header"); ?>

<?php
if($this->uri->segment(2) == "login") {
	$this->load->view("login");
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
				<?php echo $output; ?>
				
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