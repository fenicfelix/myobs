			<!-- Main -->
			<div id="main" class="site-main container_12">
			
				<!-- Left column -->
				
				<!-- First Widget Area -->
				<div id="secondary" class="grid_8 widget-area" role="complementary">
					<article id="post-121" class="single-post post-121 post type-post status-publish format-status has-post-thumbnail hentry category-club tag-tag3 tag-tag5 post_format-post-format-status">
						<header class="entry-header">
							<h1 class="entry-title">Job Details</h1>
							<div class="clear"></div>
						</header>
						
						<div class="entry-meta">
							<time datetime="2010-03-20" class="fleft"><?=$job->job_title;?></time>
							<span class="likes fright">
								<span class="post-like">
									<span class="count time-published">Published <?=$this->my_database->get_time_ago(strtotime($job->date_posted));?></span>
								</span>
							</span>
							<!-- span class="views fright"><i class="icon-eye"></i> 28014 Views</span -->
							
							<div class="clear"></div>
						</div>
						
						<div class="entry-content-list">
							<div class="entry-content-post"> </br>
								<h3>Job Description</h3> </br>
								<?=$job->description;?>
								<div class="tag-i">
									Key Skills: 
									<?php
										if($skills) {
											$i = 1;
											foreach($skills as $skill) {
												echo '<a href="#" rel="tag">'.$skill->skill_name.'</a>';
												if($i < sizeof($skills)) echo ", ";
												$i++;
											}
										}
									?>
								</div>
								
								<div class="app-deadline">
									Application Deadline: <?=date("M d, Y", strtotime($job->date_posted));?>
								</div>
							</div>
							
							<div class="apply-for-job">
								<a href="<?=site_url("home/apply/".$job->job_id);?>">Appy for this job</a>
							</div>
							
							<div class="clear"></div>
						</div>
					
					</article>
				</div>
				
				<div id="secondary" class="grid_4 widget-area" role="complementary">
					<aside id="WPlookCD-185" class="widget WPlookCD cd-playlist">
						<header class="entry-header">
							<h1 class="entry-title">Other Jobs</h1>
							<div class="clear"></div>
						</header>
						<?php
						if($jobs) {
							?>
							<ol class="audio-list">
								<?php
								foreach($jobs as $job) {
									?>
									<li><a href="<?=site_url("home/jobs/".$job->job_id);?>"><?=$job->job_title;?></a></li>
									<?php
								}
								?>
							</ol>
							<?php
						}
						?>
						
					</aside>
					
					<aside id="WPlookCD-185" class="widget WPlookCD cd-playlist">
						<header class="entry-header">
							<h1 class="entry-title">Leading Categories</h1>
							<div class="clear"></div>
						</header>
						<?php
						if($categories) {
							?>
							<ul class="jobs-list">
								<?php
								foreach($categories as $cat) {
									?>
									<li><a href="<?=site_url("home/index/?cat=".$cat->category_id);?>"><?=$cat->category_name;?></a></li>
									<?php
								}
								?>
							</ul>
							<?php
						}
						?>
						
					</aside>
				</div>
						
				<div class="clear"></div>
			</div><!-- / #main -->
			
			