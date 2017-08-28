			<!-- Main -->
			<div id="main" class="site-main container_12">
			
				<!-- Left column -->
				
				<!-- First Widget Area -->
				<div id="secondary" class="grid_8 widget-area" role="complementary">
					<article id="post-121" class="single-post post-121 post type-post status-publish format-status has-post-thumbnail hentry category-club tag-tag3 tag-tag5 post_format-post-format-status">
						<header class="entry-header">
							<h1 class="entry-title">Job Details</h1>
							<div class="more-options share-bt">
								<a class="share-click" title="Share"><i class="icon-share"></i></a>
							</div>
							
							<div class="clear"></div>
						</header>
						
						<div class="entry-meta">
							<time datetime="2010-03-20" class="fleft"><?=$job->job_title;?></time>
							<span class="likes fright">
								<span class="post-like">
									<span class="count"><?=date("M d, Y", strtotime($job->date_posted));?></span>
								</span>
							</span>
							<!-- span class="views fright"><i class="icon-eye"></i> 28014 Views</span -->
							
							<div class="clear"></div>
						</div>
						
						<div class="entry-content-list">
							<div class="entry-content-post"> </br>
							
							
							
								<?php
								if($this->uri->segment(4)) {
									if($this->uri->segment(4) == "success") {
										echo '<p class="success-alert">Success! You have successfully applied for the above position.</p>';
									} else {
										echo '<p class="error-alert">Sorry! An error occured. Please try again later.</p>';
									}
									?><p class="view-application fright"><a target="_blank" href="<?=site_url("home/jobs/".$job->job_id);?>">View Job Application</a></p><?php
								} else {
									?>
									<h3>Fill in the form to apply</h3> </br>
								
									<p class="view-application fright"><a target="_blank" href="<?=site_url("home/jobs/".$job->job_id);?>">View Job Application</a></p>
									
									<?php
									$attributes = array('class' => 'wpcf7-form', 'method' => 'POST');
									echo form_open_multipart('home/submit_application',  $attributes);
									?>
										<input type="hidden" value="<?=$job->job_id;?>" name="job_id" id="job_id">
										<p>Surname / Family Name <span class="required">(Required)</span><br> <span class="wpcf7-form-control-wrap">
											<input class="wpcf7-form-control wpcf7-text" type="text" id="surname" name="surname" value="" size="40" required></span>
										</p>
										
										<p>Other Names <span class="required">(Required)<br> <span class="wpcf7-form-control-wrap">
											<input class="wpcf7-form-control wpcf7-text" type="text" id="other_names" name="other_names" value="" size="40" required></span>
										</p>
										
										<p>Phone Number <span class="required">(Required)<br> <span class="wpcf7-form-control-wrap">
											<input class="wpcf7-form-control wpcf7-text" type="text" id="phone_number" name="phone_number" value="" size="40" required></span>
										</p>
										
										<p>Official E-mail <span class="required">(Required)<br> <span class="wpcf7-form-control-wrap">
											<input class="wpcf7-form-control wpcf7-text" type="email" id="email" name="email" value="" size="40" required></span>
										</p>
										
										<p>Cover Letter <span class="required">(Required)<br> <span class="wpcf7-form-control-wrap your-message">
											<textarea id="summernote" name="cover_letter" cols="40" rows="10" class="wform-control wpcf7-form-control wpcf7-text" required></textarea></span>
										</p>
										
										<p>Attach Resume <span class="required">(Required)<br> <span class="wpcf7-form-control-wrap">
											<input class="" type="file" id="attachment" name="attachment" required></span>
											</br><code><i>Only word or pdf documents will be accepted.</i></code>
										</p>
										
										<p>Skills <span class="required">(Required)<br> <span class="wpcf7-form-control-wrap">
											<select class="wpcf7-form-control wpcf7-text" id="skill_id" name="skill_id" multiselect>
												<option value="">Select Your Skills</option>
												<option value="">Select Your Skills 1</option>
											</select>
										</p>
										
										
										
										<p><input type="submit" value="Send Application" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></p>
										
									</form>
									<?php
								}
								?>
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
									<li><a href="#"><?=$job->job_title;?></a></li>
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
			
			
			
			