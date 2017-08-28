<!-- Widget video -->
<aside id="WPlookCD-185" class="widget WPlookCD cd-playlist">
	<header class="entry-header">
		<h1 class="entry-title">Latest Playlist</h1>
		<div class="more-options">
			<a href="<?=site_url("home/playlists");?>" title="View all cd"><i class="icon-ellipsis-horizontal"></i></a>
		</div>
		<div class="clear"></div>
	</header>
	<?php
	$playlist_sql = "SELECT a.*, b.first_name, b.last_name, b.stage_name, (select count(*) from playlist_item where playlist_id = a.playlist_id) as total_items
	FROM `playlist` a
	join users b on (a.created_by = b.id) where a.accepted_file_type = 1 order by total_items DESC limit 1";
	$playlist = $this->my_database->passSQL($playlist_sql);
	
	if($playlist) {
		$name = "";
		if($playlist->stage_name) $name = $playlist->stage_name;
		else $name = $playlist->first_name." ".$playlist->last_name;
		
		$image_url = base_url()."front_assets/img/cover-300x300.jpg";
		if($playlist->image_url) $image_url = base_url()."uploads/playlists/".$playlist->image_url;
		?>
		<ul class="playlist-nomargin">
			<li>
				<a href="#" title="The Brazz Brothers">
					<img width="300" height="300" src="<?=$image_url;?>" class="attachment-medium-thumb wp-post-image" alt="<?=$playlist->title;?>" />
					<h1 class="entry-title"><?=$playlist->title;?></h1>
					<h2 class="entry-description">Compiled by, <?=$name;?></h2>
					<h3 class="entry-description"><i class="icon icon-clock"></i> <?=$this->my_database->get_time_ago(strtotime($playlist->created_on));?></h3>
					<div class="clear"></div>
				</a>
			</li>
		</ul>
		<?php
	}
	?>
	<?php
	if($playlist) {
		$playlist_items = $this->my_database->passSQLAll("select b.*
		from playlist_item a
		join items b on (a.item_id = b.item_id)
		where a.playlist_id = ".$playlist->playlist_id);
		?>
		<audio class="audio" preload></audio>
		<ol class="audio-list">
			<?php
			foreach($playlist_items as $pi) {
				?>
				<li><span class="icon-music"></span><a href="#" data-src="<?=base_url();?>uploads/items/<?=$pi->item_url;?>"><?=$pi->item_title." - ".$pi->artiste_str;?></a></li>
				<?php
			}
			?>
		</ol>
		<?php
	}
	?>
	
</aside>


			

		
<!-- Widget video -->
<aside id="WPlookCD-185" class="widget WPlookCD">
	<header class="entry-header">
		<h1 class="entry-title">New Videos</h1>
		<div class="more-options">
			<a href="<?=site_url("home/videos");?>" title="View all cd"><i class="icon-ellipsis-horizontal"></i></a>
		</div>
		<div class="clear"></div>
	</header>
	<ul>
		<?php
		$latest_vids = $this->my_database->passSQLAll("select * from view_items_details where file_type_id = 2 order by item_id DESC limit 3");
		if($latest_vids) {
			foreach($latest_vids as $lv) {
				$image_url = base_url()."assets/images/ic_myraydio_new.png";
				if($lv->image_url) $image_url = base_url()."uploads/items_image/".$lv->image_url;
				?>
				<li>
					<a href="#" title="Sketches Of Africa">
						<img width="300" height="300" src="<?=$image_url;?>" class="attachment-medium-thumb wp-post-image" alt="<?=$lv->item_title;?>" />
						<h1 class="entry-title"><?=$lv->item_title;?></h1>
						<h2 class="entry-description">By <?=$lv->artiste_str;?></h2>
						<h3 class="entry-description"><i class="icon icon-clock"></i> <?=$this->my_database->get_time_ago($lv->uploaded_on);?></h3>
						<div class="clear"></div>
					</a>
				</li>
				<?php
			}
		}
		?>
	</ul>
</aside>

<aside id="text-2" class="widget widget_text">
	<div class="entry-header">
		<h1 class="entry-title">Get the App</h1>
		<div class="clear"></div>
	</div>
	<div class="textwidget">
		<p>
			<a href="#">
				<img class="alignnone size-full wp-image-592" alt="wimp-logo-vertical-150x150" src="<?=base_url();?>front_assets/img/playstore_logo.png" width="200" />
			</a>
		</p>
	</div>
</aside>