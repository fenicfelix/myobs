<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="panel minimal panel-default">
					<div class="panel-heading clearfix"> 
						<div class="panel-title">Downloads</div> 
					</div> 
					<!-- panel body --> 
					<div class="panel-body">
						<div class="stack-order"> 
							<h1 class="no-margins"><?php if($downloads) echo number_format($downloads->d_count); else echo "0";?></h1>
							<small>Downloads since January</small>
						</div>
						<div class="bar-chart-icon"></div>
					</div> 
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel minimal panel-default">
					<div class="panel-heading clearfix"> 
						<div class="panel-title">Last month sale</div> 
					</div> 
					<!-- panel body --> 
					<div class="panel-body"> 
						<div class="stack-order">
							<?php
							$total_amount = 0;
							$downloads = 0;
							if($downloads_last_month) {
								$downloads = sizeof($downloads_last_month);
								foreach($downloads_last_month as $dlm) {
									$total_amount += $dlm->amount_paid;
								}
							} 
							?>
							<h1 class="no-margins">KSh. <?=number_format($total_amount);?></h1>
							<small>From <?=number_format($downloads);?> transactions.</small>
						</div>
						<div class="bar-chart-icon"></div>
					</div> 
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel minimal panel-default">
					<div class="panel-heading clearfix"> 
						<div class="panel-title">This month sales</div> 
					</div> 
					<!-- panel body --> 
					<div class="panel-body"> 
						<div class="stack-order">
							<?php
							$this_month_downloads = 0;
							$avg_downloads = 0;
							$days = date('d');
							if($downloads_this_month->downloads > 0) {
								$this_month_downloads = $downloads_this_month->downloads;
								$avg_downloads = round(($this_month_downloads/$days), 2);
							}
							?>
							<h1 class="no-margins"><?=number_format($this_month_downloads);?></h1>
							<small><?=number_format($avg_downloads);?> average daily downloads.</small>
						</div>
						<div class="bar-chart-icon"></div>
					</div> 
				</div>
			</div>
			<div class="col-lg-3 col-md-6">
				<div class="panel minimal panel-default">
					<div class="panel-heading clearfix"> 
						<div class="panel-title">Uploads</div> 
					</div> 
					<!-- panel body --> 
					<div class="panel-body"> 
						<div class="stack-order">
							<?php
							$total_uploads = 0;
							if($uploads) {
								$total_uploads = $uploads->uploads;
								$this_month_uploads = $uploads->this_month_uploads;
							}
							?>
							<h1 class="no-margins"><?=number_format($total_uploads);?></h1>
							<small><?=number_format($this_month_uploads);?> new uploads this month</small>
						</div>
						<div class="bar-chart-icon"></div>
					</div> 
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel-group">
					<div class="panel panel-invert">
						<div class="panel-heading no-border clearfix"> 
							<h2 class="panel-title">Revenue</h2>
							<ul class="panel-tool-options">
								<li><a href="#" id="Revenuelines"><i class="icon-chart-line icon-2x"></i></a></li>
								<li class="dropdown">
									<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog icon-2x"></i></a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
										<li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
										<li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
										<li class="divider"></li>
										<li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
									</ul>
								 </li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="flot-chart float-chart-lg">
								<div id="Revenue-lines" class="flot-chart-content"></div>
							</div>
							<div id="placeholder_overview" style="width:100%; height: 65px;"></div>
						</div>
					</div>
					<div class="panel">
						<div class="panel-body">
							<div class="panel-update-content">
								<div class="row-revenue clearfix">
									<div class="col-xs-6">
										<h5>Gross Revenue</h5>
										<h1>9,362.74</h1>
									</div>
									<div class="col-xs-6">
										<h5>Net Revenue</h5>
										<h1>6,734.89</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>Pending Uploads</h2>
						<div class="row">
							<div id="working-gif" class="col-md-12"> 
								<center><img src="<?=base_url();?>assets/images/loading.gif" /> Working. Please wait...</center>
							</div>
						</div>
						<ul class="feed-item-list removeable-list">
							<?php
							if($pending_uploads) {
								foreach($pending_uploads as $pu) {
									?>
									<li>
										<div class="feed-element">
											<div class="feed-title"><?=$pu->item_title;?></div>
											<div class="feed-content">
												<p>By <?php if($pu->artiste_str) echo $pu->artiste_str; else echo "---";?></p>
											</div>
											<div class="feed-meta">Uploaded by <?=$pu->first_name." ".$pu->last_name;?></div>
										</div>
										<div class="feed-footer">
											<a href="<?=site_url("admin/items_not_approved/read/".$pu->item_id);?>" class="btn btn-sm btn-warning">VIEW</a>
											<a href="<?=site_url("admin/items_not_approved/edit/".$pu->item_id);?>" class="btn btn-sm btn-success">EDIT</a>
											<a data-id="<?=$pu->item_id;?>" class="btn btn-sm btn-primary approve-link">APPROVE</a>
											<a href="<?=site_url("admin/items_not_approved/delete/".$pu->item_id);?>" class="btn btn-sm btn-red">DELETE</a>
										</div>
										<a class="remove" href="#/"><img title="Remove" alt="Remove" src="<?=base_url();?>assets/images/icon-close.png"></a>
									</li>
									<?php
								}
							} else {
								?>
								<li>
									<center>No pending items.</center>
								</li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading no-border clearfix"> 
						<h3 class="panel-title">VISIT STATS</h3>
						<ul class="panel-tool-options"> 
							<li class="dropdown">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog icon-2x"></i></a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="#"><i class="icon-arrows-ccw"></i> Update data</a></li>
									<li><a href="#"><i class="icon-list"></i> Detailed log</a></li>
									<li><a href="#"><i class="icon-chart-pie"></i> Statistics</a></li>
									<li class="divider"></li>
									<li><a href="#"><i class="icon-cancel"></i> Clear list</a></li>
								</ul>
							 </li>
						</ul> 
					</div> 
					<!-- panel body --> 
					<div class="panel-body"> 
						<div class="canvas-chart has-doughnut-legend">
							<canvas id="doughnutChart" height="325" width="365"></canvas>
						</div>
						<div class="height-15"></div>
					</div> 
				</div>
			</div>
			<div class="col-lg-6">
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading no-border clearfix"> 
								<h2 class="panel-title">All Time Most Popular Items</h2>
							</div>
							<div class="panel-body">
								<div class="carousel slide" id="carousel3">
									<div class="carousel-inner">
										<?php
										if($popular_items) {
											$i = 1;
											foreach($popular_items as $pi) {
												?>
												<div class="col-sm-6">
													<div class="product-view">
														<div class="product-thumb">
															<?php
															if($pi->image_url) {
																?>
																<img title="" alt="" src="<?=base_url();?>uploads/items_image/<?=$pi->image_url;?>">
																<?php
															} else {
																?>
																<img title="" alt="" src="<?=base_url();?>assets/images/ic_myraydio_new.png">
																<?php
															}
															?>
														</div>
														<div class="product-detail">
															<h5><?=$pi->item_title;?></h5>
															<p><?=$pi->artiste_str;?></p>
															<p><?=number_format($pi->view_count);?> views</p>
														</div>
													</div>
												</div>
												<?php
												$i++;
											}
										}
										?>
										<div class="carousel-footer">
											<div class="carousel-controller">	
												<a data-slide="prev" href="#carousel3" class="btn-carousel"><i class="icon-left-open-big"></i></a>
												<a data-slide="next" href="#carousel3" class="btn-carousel"><i class="icon-right-open-big"></i></a>
											</div>
											<strong><a href="#/" class="link uppercase">show all items</a></strong>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
<script>
	$(document).ready(function() {
		$('#working-gif').hide();
	});
	$('.approve-link').on('click', function() {
		if(confirm('Are you sure you want to approve the item?')) {
			$('#working-gif').show();
			var values = {
				ajax: 1,
				item_id: $(this).data('id')
			};
			console.log(values);
			$.ajax({
				type: 'POST',
				url: '<?=site_url('ajaxfunctions/do_approve_item');?>',
				data: values,
				success: function (msg) {
					console.log(msg);
				  if(msg != 'n' && msg != "nd") {
						alert('Success! The item has been approved.');
						window.location.href = '<?=site_url('admin/dashboard');?>';
				   } else {
					   alert("Sorry! please try again.");
				   }
				}
			  });
		};
		return false;
	});
</script>