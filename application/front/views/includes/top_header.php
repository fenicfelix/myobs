<body class="home page page-id-185 page-template page-template-template-home-page page-template-template-home-page-php">
	<!-- Progress Bar -->					
	<div id="progress-back" class="load-item">
		<div id="progress-bar"></div>
	</div>
	<div id="page">
		<div id="header-bg"></div>
		<div id="patern"></div>
		<div id="page-view">
		
			<!-- Header -->
			<header id="branding" class="site-header" role="banner">
				<div class="container_12">
					<!-- Site title and description -->
					<div class="fleft grid_4 branding">
						<h1 id="site-title">
							<a href="<?=site_url("home/index");?>" title="The Brazz Brothers &#8211; English - " rel="home">
								<img src="<?=base_url();?>front_assets/img/myjobs_logo.png" width="200">
							</a>
						</h1>
						<h2 id="site-description">Latest Jobs | Busara Center</h2>
					</div>
					<!-- Search and Share icons -->
					<div class="grid_8 socialnetworking">
						<ul class="share-items">
							<li class="share-item-icon-search">
								<a target="_blank" title="Search"><i class="icon-search"></i></a>
								<!-- Search Form -->
								<div class="header-search-form">
									<form method="get" id="header-searchform" action="<?=site_url("home/index/");?>">
										<div>
											<input class="radius" type="text" size="" name="s" id="s" value="Type your searching word" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
											<input type="submit" class="search-button" id="searchsubmit" value="Search" />
										</div>
									</form>
								</div>
							</li>
							<li class="share-item-icon-facebook"><a target="_blank" title="Facebook" href="#"><i class="icon-facebook"></i></a></li>
							<li class="share-item-icon-twitter"><a target="_blank" title="Twitter" href="#"><i class="icon-twitter"></i></a></li>
							<!-- li class="share-item-icon-gmail"><a target="_blank" title="Mail" href="mailto:myraydio@gmail.com"><i class="icon-gmail"></i></a></li -->
						</ul>
					</div>
					<div class="clear"></div>
				</div>
			</header>
			
			<!-- Main Menu -->
			<?php $this->load->view("includes/menus");?>
			
			<?php
			
			/*if(!in_array($content, ["homepage"])) {
				?>
				<!-- Teaser Text -->
				<div class="container_12 teaser">

					<div id="slidecaption" class="grid_12"></div>

					<div class="grid_12 margin-battom slider-arrow">
						<a id="prevslide" class="load-item"></a>
						<a id="nextslide" class="load-item"></a>
						<div class="clear"></div>
					</div>
					<div class="celar"></div>
				</div>
				<?php
			}*/
			?>