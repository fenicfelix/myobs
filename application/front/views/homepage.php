			<!-- Main -->
			<div id="main" class="site-main container_12">
			
				<!-- Left column -->
				
				<!-- First Widget Area -->
				<div id="secondary" class="grid_8 widget-area" role="complementary">
					<aside id="WPlookCD-185" class="widget WPlookCD cd-playlist">
						<header class="entry-header">
							<h1 class="entry-title">Latest Jobs</h1>
							<div class="clear"></div>
						</header>
						<?php
						if($jobs) {
							?>
							<ol class="audio-list">
								<?php
								foreach($jobs as $job) {
									?>
									<li><a href="<?=site_url('home/jobs/'.$job->job_id);?>"><?=$job->job_title;?></a></li>
									<?php
								}
								?>
							</ol>
							<?php
						}
						?>
						
					</aside>
				</div>
				
				<div id="secondary" class="grid_4 widget-area" role="complementary">
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
			
			