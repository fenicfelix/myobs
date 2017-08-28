<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading clearfix">
						<h3 class="panel-title">Job Title: <?=$job->job_title;?></h3>
						<ul class="panel-tool-options"> 
							<li><a href="<?=site_url("admin/invite_for_interview/".$job->application_id);?>" class="btn btn-success color-white" type="submit">Invite for an Interview</a> </li>
						</ul>
					</div>
					<div class="panel-body">
						 <form class="form-horizontal">
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
								<label class="col-sm-2 control-label">Cover Letter :</label> 
								<div class="col-sm-10"> 
									<?=$job->cover_letter;?>
								</div> 
							</div>
							<div class="line-dashed"></div>
							<div class="form-group"> 
								<label class="col-sm-2 control-label">Attachment :</label> 
								<div class="col-sm-10"> 
									<a href="<?=base_url().'uploads/attachments/'.$job->attachment;?>"><?=$job->attachment;?></a>
								</div> 
							</div>
							<div class="line-dashed"></div>
							<div class="form-group"> 
								<label class="col-sm-2 control-label">Date Applied :</label> 
								<div class="col-sm-5"> 
									<?=date('d M, Y', strtotime($job->date_applied));?>
								</div> 
							</div>
							<div class="line-dashed"></div>
							<div class="form-group"> 
								<div class="col-sm-offset-2 col-sm-10"> 
									<a href="<?=site_url("admin/invite_for_interview/".$job->application_id);?>" class="btn btn-success" type="submit">Invite for an Interview</a> 
									<a href="<?=site_url("admin/decline_application/".$job->application_id."/");?>" class="btn btn-danger" type="submit">Decline Application</a> 
								</div> 
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>