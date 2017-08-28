<!-- Page sidebar -->
	<div class="page-sidebar">
	
		<!-- Site header  -->
		<header class="site-header">
		  <div class="site-logo"><a href="#"><span class="brand-start"><img src="<?=base_url().'assets/images/myjobs_logo.png'?>" alt="MyJobs Logo" width="140"></span></a></div>
		  <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="<?=base_url();?>assets/#"><i class="icon-menu"></i></a></div>
		  <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="<?=base_url();?>assets/#"><i class="icon-menu"></i></a></div>
		</header>
		<!-- /site header -->
		
		<!-- Main navigation -->
		<ul id="side-nav" class="main-menu navbar-collapse collapse">
			<!-- li <?php if($this->uri->segment(2) == "dashboard") echo 'class="active"'; ?>><a href="<?=site_url("admin/dashboard");?>"><i class="icon-gauge"></i><span class="title">Dashboard</span></a></li -->
			<li <?php if($this->uri->segment(2) == "jobs") echo 'class="active"'; ?>><a href="<?=site_url("admin/jobs");?>"><i class="icon-list"></i><span class="title">Jobs</span></a></li>
			<li <?php if($this->uri->segment(2) == "job_applications") echo 'class="active"'; ?>><a href="<?=site_url("admin/job_applications");?>"><i class="icon-list"></i><span class="title">Job Applications</span></a></li>
			<li <?php if($this->uri->segment(2) == "system_users") echo 'class="active"'; ?>><a href="<?=site_url("admin/system_users");?>"><i class="icon-users"></i><span class="title">System Users</span></a></li>
			<li class="has-sub <?php if(in_array($this->uri->segment(2), ["categories", "groups", "status", "skills", "salary_ranges", "employment_types"])) echo "active";?>"><a href="<?=site_url("admin/settings");?>"><i class="icon-layout"></i><span class="title">Settings</span></a>
				<ul class="nav collapse">
					<li <?php if($this->uri->segment(2) == "categories") echo 'class="active"'; ?>><a href="<?=site_url("admin/categories");?>"><span class="title">Categories</span></a></li>
					<li <?php if($this->uri->segment(2) == "groups") echo 'class="active"'; ?>><a href="<?=site_url("admin/groups");?>"><span class="title">Groups</span></a></li>
					<li <?php if($this->uri->segment(2) == "status") echo 'class="active"'; ?>><a href="<?=site_url("admin/status");?>"><span class="title">Status</span></a></li>
					<li <?php if($this->uri->segment(2) == "skills") echo 'class="active"'; ?>><a href="<?=site_url("admin/skills");?>"><span class="title">Skills</span></a></li>
					<li <?php if($this->uri->segment(2) == "salary_ranges") echo 'class="active"'; ?>><a href="<?=site_url("admin/salary_ranges");?>"><span class="title">Salary Ranges</span></a></li>
					<li <?php if($this->uri->segment(2) == "employment_types") echo 'class="active"'; ?>><a href="<?=site_url("admin/employment_types");?>"><span class="title">Employment Type</span></a></li>
				</ul>
			</li>
		</ul>
		<!-- /main navigation -->		
  </div>
  <!-- /page sidebar -->