<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MyRaydio | API's</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	li {
		font-size: 15px;
		padding: 5px 0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>MyRaydio API's</h1>

	<div id="body">
		
		<code>Click on the links below to view data</code>
		<ol>
			<li><a href="<?=site_url('api/items');?>">Items</a> - Get All Items. (Accepts several arguments; type_id, file_type_id, category_id, sub_category_id, item_title)</li>
			<li><a href="<?=site_url('api/item_types');?>">Item Types</a> - Get All Item Types</li>
			<li><a href="<?=site_url('api/item_types/?item_type_id=1');?>">Item Type</a> - Get A Specific Item Type</li>
			<li><a href="<?=site_url('api/file_types');?>">File Types</a> - Get All File Types</li>
			<li><a href="<?=site_url('api/file_types/?file_type_id=1');?>">File Type</a> - Get A Specific File Type</li>
			<li><a href="<?=site_url('api/playlists');?>">Playlists</a> - Get All Playlists</li>
			<li><a href="<?=site_url('api/playlists/?playlist_id=1');?>">Playlist</a> - Get A Specific Playlists</li>
			<li><a href="<?=site_url('api/playlist_items/?playlist_id=1');?>">Playlist Items</a> - Get All Playlist Items</li>
			<li><a href="<?=site_url('api/categories');?>">Categories</a> - Get All Categories</li>
			<li><a href="<?=site_url('api/category_items/?category=music');?>">Category Items by category name</a> - Example Music.</li>
			<li><a href="<?=site_url('api/categories/?category_id=1');?>">Category Items by category_id</a> - Get Specific Category</li>
			<li><a href="<?=site_url('api/sub_categories');?>">Sub-categories</a> - Get All Sub-categories</li>
			<li><a href="<?=site_url('api/sub_categories/?sub_category_id=1');?>">Sub-category</a> - Get Specific Sub-category</li>
			<li><a href="<?=site_url('api/subscription_costs');?>">Subscription Costs</a> - Get All Subscription Costs</li>
			<li><a href="<?=site_url('api/subscription_costs/?cost_id=1');?>">Subscription Cost</a> - Get Specific Subscription Costs</li>
			<li><a href="<?=site_url('api/my_payments/?paid_by=2');?>">My Payments</a> - Get All Payments i have made.</li>
			<li><a href="<?=site_url('api/users/');?>">Users</a> - Get All System Users or Artistes</li>
			<li><a href="<?=site_url('api/user/?user_id=1');?>">My Profile</a> - Gets user's profile based on user_id or email and not both</li>
			<li><a href="<?=site_url('api/search_items/');?>">Search Items</a> - Populates required data for search form.</li>
			<li><a href="<?=site_url('api/category_page/');?>">Populate Category Page</a> - Populates the category page.</li>
			
		</ol>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>