<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h3 class="panel-title">Job Title: <?=$job->job_title;?></h3>
					</div>
					<div class="panel-body">
						 <?php
							$attributes = array('class' => 'form-horizontal', 'method' => 'POST');
							echo form_open('admin/send_invite',  $attributes);
							?>
							<input type="hidden" id="job_id" name="job_id" value="<?=$job->job_id;?>">
							<input type="hidden" id="application_id" name="application_id" value="<?=$job->application_id;?>">
							<div class="form-group"> 
								<label class="col-sm-2 control-label">Full Names:</label> 
								<div class="col-sm-5"> 
									<?=$job->surname." ".$job->other_names;?>
								</div> 
							</div>
							<div class="line-dashed"></div>
							<div class="form-group"> 
								<label class="col-sm-2 control-label">Phone Number:</label> 
								<div class="col-sm-5"> 
									<?=$job->phone_number;?>
								</div> 
							</div>
							<div class="line-dashed"></div>
							<div class="form-group"> 
								<label class="col-sm-2 control-label">E-mail :</label>
								<div class="col-sm-5"> 
									<?=$job->email;?>
								</div> 
							</div>
							<div class="line-dashed"></div>
							<div class="form-group"> 
								<label class="col-sm-2 control-label">Message Body :</label> 
								<div class="col-sm-10"> 
									<textarea id="message_body" name="message_body" cols="100" rows="10"></textarea>
								</div> 
							</div>
							<div class="line-dashed"></div>
							<div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10"> 
									<button class="btn btn-success" type="submit">Send Invite</button> 
								</div> 
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>