<?php if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading clearfix">
				<!-- h3 class="panel-title"><?=$list_title;?></h3 -->
				<ul class="panel-tool-options">
					<?php
					$download_url = "#";
					if($this->input->get('term')) {
						$download_url = site_url("admin/items_xls/?term=".$this->input->get('term'));
						?>
						<li><a href="<?=$download_url;?>"><img width="32" src="<?=base_url()."assets/images/excel_download.png"?>"></a></li>
						<?php
					}
					?>
					<?php if($is_add) { ?>
						<li><a href="<?=site_url('admin/'.$this->uri->segment(2).'/add/');?>"><span class="label label-success"><i class="icon-plus"></i> Add item</span></a></li>
					<?php } ?>
					<li><a data-rel="collapse" href="<?=base_url();?>assets/#"><i class="icon-down-open"></i></a></li>
					<li><a data-rel="reload" href="<?=base_url();?>assets/#"><i class="icon-arrows-ccw"></i></a></li>
					<li><a data-rel="close" href="<?=base_url();?>assets/#"><i class="icon-cancel"></i></a></li>
				</ul>
			</div>
			<div class="panel-body">
				<div class="row">
					<form>
					<form method="get" action="<?=site_url($this->uri->segment(1).'/'.$this->uri->segment(2).'/');?>">
						<div class="form-group"> 
							<div class="col-md-4 col-sm-8"> 
								<div class="input-group"> 
									<input type="text" class="form-control" id="term" name="term" value="<?php if($this->input->get('term')) echo $this->input->get('term');?>"> 
									<span class="input-group-btn"><button type="submit" class="btn btn-success" type="button">Go!</button></span>
								</div>
							</div>
							<div id="working-gif" class="col-md-4 col-sm-4"> 
								<img src="<?=base_url();?>assets/images/loading.gif" /> Working. Please wait...
							</div>							
						</div>
					</form>
				</div>
				
				<br/>
				
				<div class="table-responsive">
					<table class="table table-striped" >
						<thead>
							<tr>
								<th>#</th>
								<th>Item Image</th>
								<th>Item Title</th>
								<!-- th>Description</th -->
								<th>Category</th>
								<th>Item Type</th>
								<th>Play</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if($items) {
								$i=1;
								foreach($items as $item) {
									?>
									<tr class="gradeX">
										<td><?=$i;?></td>
										<td>
											<?php
											if($item->image_url) {
												?><img src="<?=base_url()."uploads/items_image/".$item->image_url;?>" width="50px" alt="<?=$item->item_title;?> thumbnail"><?php
											} else {
												?><img src="<?=base_url()."uploads/items_image/myraydio_icon.png";?>" width="50px" alt="<?=$item->item_title;?> thumbnail"><?php
											}
											?>
										</td>
										<td><?=$item->item_title;?></td>
										<td><?=$item->category;?></td>
										<td><?=$item->item_type;?></td>
										<td>
											<?php
											if($item->item_url) {
												?><a target="_blank" href="<?=base_url()."uploads/items/".$item->item_url;?>"><i class="icon-play"></i></a><?php
											} else {
												?><a target="_blank" href="<?=site_url("admin/".$this->uri->segment(2)."/edit/".$item->item_id);?>"><span class="label label-danger">Edit</span></i></a><?php
											}
											?>
										</td>
										<td class="actions">
											<?php if($do_approve) { ?>
												<a href="#" data-id="<?=$item->item_id;?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary approve-link" role="button">
													<span class="ui-button-icon-primary ui-icon ui-icon-document"></span>
													<span class="label label-warning"><i class="fa fa-check"></i>&nbsp;Approve</span>
												</a>	
											<?php } ?>
											<?php if($is_read) { ?>
												<a href="<?=site_url("admin/".$this->uri->segment(2)."/read/".$item->item_id);?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
													<span class="ui-button-icon-primary ui-icon ui-icon-document"></span>
													<span class="label label-warning"><i class="fa fa-eye"></i>&nbsp;View</span>
												</a>
											<?php } ?>
				
											<?php if($is_edit) { ?>
												<a href="<?=site_url("admin/".$this->uri->segment(2)."/edit/".$item->item_id);?>" class="edit_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
													<span class="ui-button-icon-primary ui-icon ui-icon-pencil"></span>
													<span class="label label-primary"><i class="fa fa-edit"></i>&nbsp;Edit</span>
												</a>
											<?php } ?>
											<?php if($is_delete) { ?>
												<a onclick="javascript: return delete_row('<?=site_url("admin/".$this->uri->segment(2)."/delete/".$item->item_id);?>', '<?=$i;?>')" href="javascript:void(0)" class="delete_button ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" role="button">
													<span class="ui-button-icon-primary ui-icon ui-icon-circle-minus"></span>
													<span class="label label-secondary"><i class="fa fa-trash"></i>&nbsp;Delete</span>
												</a>
											<?php } ?>
										</td>
									</tr>
									<?php
									$i++;
								}
							} else {
								?>
								<tr class="gradeX">
									<td colspan="6"><center>No matching records found</center></td>
								</tr>
								<?php
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Item Image</th>
								<th>Item Title</th>
								<!-- th>Description</th -->
								<th>Category</th>
								<th>Item Type</th>
								<th>Play</th>
								<th>Actions</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<div>
					<p>
						<?php
						$start_row = 0;
						$end_row = 0;
						$total_items = 0;
						if($all_items) {
							$start_row = ((($num_rec_per_page*$page)+1)-$num_rec_per_page);
							if($all_items->total > $num_rec_per_page*$page) $end_row = (($start_row+$num_rec_per_page)-1);
							else $end_row = $all_items->total;
							$total_items = $all_items->total;
						}
						echo "Showing ".number_format($start_row)." to ".number_format($end_row)." of ".number_format($total_items)." entries.";
						?>
					</p>
				</div>
				<div class="">
					<?php
						$total_records = $all_items->total;  //count number of records
						$total_pages = ceil($total_records / $num_rec_per_page);
						
						$pagination_limit = 6;

						$current_page = $page;
						$prev_page = $page-=1;
						$next_page = $page+=2;
						
						echo '<ul class="pagination">';
							$base_url = "";
							if($this->input->get('term')) $base_url = site_url('admin/'.$this->uri->segment(2).'/')."?term=".$this->input->get('term')."&";
							else $base_url = $base_url = site_url('admin/'.$this->uri->segment(2).'/')."?";
						
							if($current_page != 1) echo "<li><a href='".$base_url."page=1'>".'First'."</a></li>"; // Goto 1st page
							if($prev_page >= 0) echo "<li><a href='".$base_url."page=$prev_page'>".'Previous'."</a></li>"; // Goto 1st page

							for ($i=1; $i <= $total_pages; $i++) {
								if($next_page < $pagination_limit && $i <= $pagination_limit) {
									if((!$this->input->get('page') && $i == 1) || ($this->input->get('page') == $i)) echo "<li class='active'><a href='".$base_url."page=".$i."'>".$i."</a></li>";
									else echo "<li><a href='".$base_url."page=".$i."'>".$i."</a></li>";
								} else {
									if(($next_page-$i) < $pagination_limit && ($i <= $next_page)) {
										if((!$this->input->get('page') && $i == 1) || ($this->input->get('page') == $i)) echo "<li class='active'><a href='".$base_url."page=".$i."'>".$i."</a></li>";
										else echo "<li><a href='".$base_url."page=".$i."'>".$i."</a></li>";
									}
								}
							}

							if($page < $total_pages) echo "<li><a href='".$base_url."page=$next_page'>".'Next'."</a></li>"; // Goto last page
							if($current_page < $total_pages) echo "<li><a href='".$base_url."page=$total_pages'>".'Last'."</a></li>"; // Goto last page
						
						echo '</ul>';
					?>
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
				url: '<?=site_url("ajaxfunctions/do_approve_item");?>',
				data: values,
				success: function (msg) {
					console.log(msg);
				  if(msg != 'n' && msg != "nd") {
						alert('Success! The item has been approved.');
						window.location.href = '<?=site_url("admin/items_not_approved");?>';
				   } else {
					   alert("Sorry! please try again.");
				   }
				}
			  });
		};
		return false;
	});
</script>