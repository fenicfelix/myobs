<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Api extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->model('my_database');

        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['users_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['users_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['users_delete']['limit'] = 50; // 50 requests per hour per user/key
    }
	
	//-----------------------------------   Items -----------------------------------------------
	public function items_get() {
		$sql = "select * from view_items_details";
		$items = [];
		if($this->input->get('item_id')) {
			$items = $this->my_database->getSpecific('view_items_details', ['item_id' => $this->input->get('item_id')]);
		} else {
			$sql .= " where item_id > 0";
			if($this->input->get('type_id')) $sql .= " and type_id = ".$this->input->get('type_id');
			if($this->input->get('file_type_id')) $sql .= " and file_type_id = ".$this->input->get('file_type_id');
			if($this->input->get('category_id')) $sql .= " and category_id = ".$this->input->get('category_id');
			if($this->input->get('sub_category_id')) $sql .= " and sub_category_id = ".$this->input->get('sub_category_id');
			if($this->input->get('item_title')) $sql .= " and item_title like '%".$this->input->get('item_title')."%'";
			if($this->input->get('search_term')) $sql .= " and item_title like '%".$this->input->get('search_term')."%' or description like '%".$this->input->get('search_term')."%'";
			$sql .= " ORDER BY item_id DESC";
			if($this->input->get('limit') && $this->input->get('offset')) {
				$sql .= " limit ".$this->input->get('limit')." offset ".$this->input->get('offset');
			}
			$items = $this->my_database->passSQLAll($sql);
		}
		if($items) {
			$this->set_response(['status' => "1", 'data' => $items]);
			//$items['uploaded_on'] = strtotime($items->uploaded_on);
			//$this->set_response($items);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function items_post() {
		$sql = "select * from view_items_details";
		$items = [];
		if($this->input->post('item_id')) {
			$items = $this->my_database->getSpecific('view_items_details', ['item_id' => $this->input->post('item_id')]);
		} else {
			$sql .= " where item_id > 0";
			if($this->input->post('type_id')) $sql .= " and type_id = ".$this->input->post('type_id');
			if($this->input->post('file_type_id')) $sql .= " and file_type_id = ".$this->input->post('file_type_id');
			if($this->input->post('category_id')) $sql .= " and category_id = ".$this->input->post('category_id');
			if($this->input->post('sub_category_id')) $sql .= " and sub_category_id = ".$this->input->post('sub_category_id');
			if($this->input->post('item_title')) $sql .= " and item_title like '%".$this->input->post('item_title')."%'";
			$sql .= " ORDER BY item_id DESC";
			if($this->input->post('limit') && $this->input->post('offset')) {
				$sql .= " limit ".$this->input->post('limit')." offset ".$this->input->post('offset');
			}
			$items = $this->my_database->passSQLAll($sql);
		}
		if($items) {
			$this->set_response(['status' => "1", 'data' => $items]);
			//$items['uploaded_on'] = strtotime($items->uploaded_on);
			//$this->set_response($items);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /Items -----------------------------------------------
	
	//-----------------------------------   Item Types -----------------------------------------------
	
	public function item_types_get() {
		if($this->input->get('item_type_id')) $item_types = $this->my_database->getSpecific('item_type', ['item_type_id' => $this->input->get('item_type_id')]);
		else $item_types = $this->my_database->getAll('item_type');
		if($item_types) {
			$this->set_response(['status' => "1", 'data' => $item_types]);
		} else {
			//$this->response([''], 404);
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function item_types_post() {
		if($this->input->post('item_type_id')) $item_types = $this->my_database->getSpecific('item_type', ['item_type_id' => $this->input->post('item_type_id')]);
		else $item_types = $this->my_database->getAll('item_type');
		if($item_types) {
			$this->set_response(['status' => "1", 'data' => $item_types]);
		} else {
			//$this->response([''], 404);
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /Item Types -----------------------------------------------
	
	//-----------------------------------   File Types -----------------------------------------------
	
	public function file_types_get() {
		if($this->input->get('file_type_id')) $file_types = $this->my_database->getSpecific('file_type', ['file_type_id' => $this->input->get('file_type_id')]);
		else $file_types = $this->my_database->getAll('file_type');
		if($file_types) {
			$this->set_response(['status' => "1", 'data' => $file_types]);
		} else {
			//$this->response([''], 404);
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function file_types_post() {
		if($this->input->post('file_type_id')) $file_types = $this->my_database->getSpecific('file_type', ['file_type_id' => $this->input->post('file_type_id')]);
		else $file_types = $this->my_database->getAll('file_type');
		if($file_types) {
			$this->set_response(['status' => "1", 'data' => $file_types]);
		} else {
			//$this->response([''], 404);
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /File Types -----------------------------------------------
	
	//-----------------------------------   Categories -----------------------------------------------
	
	public function categories_get() {
		$sql = 'select a.*, (select count(*) from items where items.category_id = a.category_id) as count from categories a';
		if($this->input->get('category_id')) $categories = $this->my_database->passSQL($sql .= 'where a.category_id = '.$this->input->get('category_id'));
		else $categories = $this->my_database->passSQLAll($sql);
		if($categories) {
			$this->set_response(['status' => "1", 'data' => $categories]);
		} else {
			//$this->response([''], 404);
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function categories_post() {
		$sql = 'select a.*, (select count(*) from items where items.category_id = a.category_id) as count from categories a';
		if($this->input->post('category_id')) $categories = $this->my_database->passSQL($sql .= 'where a.category_id = '.$this->input->post('category_id'));
		else $categories = $this->my_database->passSQLAll($sql);
		if($categories) {
			$this->set_response(['status' => "1", 'data' => $categories]);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /Categories -----------------------------------------------
	
	//-----------------------------------   Sub-Categories -----------------------------------------------
	
	public function sub_categories_get() {
		if($this->input->get('sub_category_id')) {
			$sub_categories = $this->my_database->getSpecific('sub_categories', ['sub_category_id' => $this->input->get('sub_category_id')]);
		} else if($this->input->get('category')) {
			$sub_categories = $this->my_database->passSQLAll('select * from sub_categories where category_id in (select category_id from categories where category = "'.$this->input->get('category').'")');
		} else {
			$sub_categories = $this->my_database->getAll('sub_categories');
		}
		if($sub_categories) {
			$this->set_response(['status' => "1", 'data' => $sub_categories]);
		} else {
			//$this->response([''], 404);
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function sub_categories_post() {
		if($this->input->post('sub_category_id')) {
			$sub_categories = $this->my_database->getSpecific('sub_categories', ['sub_category_id' => $this->input->post('sub_category_id')]);
		} else if($this->input->post('category')) {
			$sub_categories = $this->my_database->passSQLAll('select * from sub_categories where category_id in (select category_id from categories where category = "'.$this->input->post('category').'")');
		} else {
			$sub_categories = $this->my_database->getAll('sub_categories');
		}
		if($sub_categories) {
			$this->set_response(['status' => "1", 'data' => $sub_categories]);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /Sub-Categories -----------------------------------------------
	
	//-----------------------------------   Playlists -----------------------------------------------
	
	public function playlists_get() {
		$sql = "select a.*, b.first_name, b.last_name, b.stage_name,  (select count(*) from playlist_item where playlist_id = a.playlist_id) as no_of_items, c.file_type_name
			from playlist a
			join users b on (a.created_by = b.id)
			join file_type c on (a.accepted_file_type = c.file_type_id) where a.playlist_id > 0";
		$my_list_sql = "";
		$my_playlists = [];
		$other_playlists = [];
		if($this->input->get('created_by') && $this->input->get('created_by') > 0) {
			$my_list_sql = $sql;
			$sql .= " and a.created_by != ".$this->input->get('created_by');
		}
		
		if($this->input->get('limit') && $this->input->get('offset')) {
			$sql." limit ".$this->input->get('limit')." offset ".$this->input->get('offset');
		}
		
		if($this->input->get('offset') > 0) {
			$playlists = [
				'my_playlists' => "no_data",
				'other_playlists' => $this->my_database->passSQLAll($sql)
			];
		} else if($this->input->get('created_by') && $this->input->get('created_by') > 0) {
			$playlists = [
				'my_playlists' => $this->my_database->passSQLAll($my_list_sql ." and a.created_by = ".$this->input->get('created_by')),
				'other_playlists' => $this->my_database->passSQLAll($sql)
			];
		} else {
			$playlists = [
				'my_playlists' => "no_data",
				'other_playlists' => $this->my_database->passSQLAll($sql)
			];
		}
		
		if($playlists) {
			$this->set_response(['status' => "1", 'data' => $playlists]);
		} else {
			//$this->response([''], 404);
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /Playlists -----------------------------------------------
	
	//-----------------------------------   Playlist Items -----------------------------------------------
	
	public function playlist_items_get() {
		if($this->input->get('playlist_id')) {
			$sql = "select a.playlist_id, a.item_id, b.item_title, b.slug, b.description, b.item_url, b.file_size, b.image_url, UNIX_TIMESTAMP(b.uploaded_on) as uploaded_on, b.artiste_str from playlist_item a join items b on (a.item_id = b.item_id) where playlist_id = ".$this->input->get('playlist_id');
			$playlist_items = $this->my_database->passSQLAll($sql);
			if($playlist_items) {
				$this->set_response(['status' => "1", 'data' => $playlist_items]);
			} else {
				$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function playlist_items_post() {
		if($this->input->post('playlist_id')) {
			$sql = "select a.playlist_id, a.item_id, b.item_title, b.slug, b.description, b.item_url, b.file_size, b.image_url, UNIX_TIMESTAMP(b.uploaded_on) as uploaded_on, b.artiste_str from playlist_item a join items b on (a.item_id = b.item_id) where playlist_id = ".$this->input->post('playlist_id');
			$playlist_items = $this->my_database->passSQLAll($sql);
			if($playlist_items) {
				$this->set_response(['status' => "1", 'data' => $playlist_items]);
			} else {
				$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /Playlist Items -----------------------------------------------
	
	//-----------------------------------   Category Items -----------------------------------------------
	
	public function category_items_get() {
		if($this->input->get('category')) {
			$sql = "select a.item_id, a.item_title, a.slug, a.description, a.item_url, a.file_size, a.image_url, UNIX_TIMESTAMP(a.uploaded_on) as uploaded_on, a.artiste_str
			from items a where a.category_id = (select category_id from categories where category = '".$this->input->get('category')."')";
			$sql .= " ORDER BY a.item_id DESC";
			$items = $this->my_database->passSQLAll($sql);
			if($items) {
				$this->set_response(['status' => "1", 'data' => $items]);
			} else {
				$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function category_items_post() {
		if($this->input->post('category')) {
			$sql = "select a.item_id, a.item_title, a.slug, a.description, a.item_url, a.file_size, a.image_url, UNIX_TIMESTAMP(a.uploaded_on) as uploaded_on, a.artiste_str
			from items a where a.category_id = (select category_id from categories where category = '".$this->input->post('category')."')";
			$sql .= " ORDER BY a.item_id DESC";
			$items = $this->my_database->passSQLAll($sql);
			if($items) {
				$this->set_response(['status' => "1", 'data' => $items]);
			} else {
				$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /Category Items -----------------------------------------------
	
	//-----------------------------------   Category Page Content -----------------------------------------------
	
	public function category_page_get() {
		$categories_sql = 'select a.category_id, a.category, a.category_image from categories a where (select count(*) from items where a.category_id = items.category_id) > 0';
		$categories = $this->my_database->passSQLAll($categories_sql);
		$result = [];
		if($categories) {
			foreach($categories as $cat) {
				$items_sql = 'select a.item_id, a.item_title, a.file_size, a.item_url, a.artiste_str, a.image_url, UNIX_TIMESTAMP(a.uploaded_on) as uploaded_on from items a where a.category_id = '.$cat->category_id.' limit 5';
				$data = [
					'category_id' => $cat->category_id,
					'category_title' => $cat->category,
					'category_image' => $cat->category_image,
					'category_items' => $this->my_database->passSQLAll($items_sql)
				];
				array_push($result, $data);
			}
			$this->set_response(['status' => "1", 'data' => $result]);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 200);
		}
	}
	
	public function category_page_post() {
		$categories_sql = 'select a.category_id, a.category, a.category_image from categories a where (select count(*) from items where a.category_id = items.category_id) > 0';
		$categories = $this->my_database->passSQLAll($categories_sql);
		$result = [];
		if($categories) {
			foreach($categories as $cat) {
				$items_sql = 'select a.item_id, a.item_title, a.file_size, a.item_url, a.image_url from items a where a.category_id = 1 limit 5';
				$result[$cat->category] = $this->my_database->passSQLAll($items_sql);
			}
			$this->set_response(['status' => "1", 'data' => $result]);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 200);
		}
	}
	
	//-----------------------------------   /Category Page Content -----------------------------------------------
	
	//-----------------------------------   Subscription Costs -----------------------------------------------
	
	public function subscription_costs_get() {
		$sql = 'select a.*, b.abbreviation, b.description from cost a join currency b on (a.currency_id = b.currency_id)';
		if($this->input->get('cost_id')) {
			$sql .= ' where cost_id = '.$this->input->get('cost_id');
			$subscription_costs = $this->my_database->passSQL($sql);
		} else {
			$subscription_costs = $this->my_database->passSQLAll($sql);
		}
		if($subscription_costs) {
			$this->set_response(['status' => "1", 'data' => $subscription_costs]);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function subscription_costs_post() {
		$sql = 'select a.*, b.abbreviation, b.description from cost a join currency b on (a.currency_id = b.currency_id)';
		if($this->input->post('cost_id')) {
			$sql .= ' where cost_id = '.$this->input->post('cost_id');
			$subscription_costs = $this->my_database->passSQL($sql);
		} else {
			$subscription_costs = $this->my_database->passSQLAll($sql);
		}
		if($subscription_costs) {
			$this->set_response(['status' => "1", 'data' => $subscription_costs]);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /Subscription Costs -----------------------------------------------
	
	//-----------------------------------   My Payments -----------------------------------------------
	
	public function my_payments_get() {
		if($this->input->get('paid_by')) {
			$sql = 'select a.*, b.cost_title, b.no_of_downloads, b.amount as required_amount, c.abbreviation as currency_abbr, c.description as currency_desc
			from payments a
			join cost b on (a.cost_id = b.cost_id)
			join currency c on (b.currency_id = c.currency_id)';
			$sql .= ' where a.paid_by = '.$this->input->get('paid_by');
			$payments = $this->my_database->passSQLAll($sql);
			if($payments) {
				$this->set_response(['status' => "1", 'data' => $payments]);
			} else {
				$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
		
	}
	
	public function my_payments_post() {
		if($this->input->post('paid_by')) {
			$sql = 'select a.*, b.cost_title, b.no_of_downloads, b.amount as required_amount, c.abbreviation as currency_abbr, c.description as currency_desc
			from payments a
			join cost b on (a.cost_id = b.cost_id)
			join currency c on (b.currency_id = c.currency_id)';
			$sql .= ' where a.paid_by = '.$this->input->post('paid_by');
			$payments = $this->my_database->passSQLAll($sql);
			if($payments) {
				$this->set_response(['status' => "1", 'data' => $payments]);
			} else {
				$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
		
	}
	
	//-----------------------------------   /My Payments -----------------------------------------------
	
	//-----------------------------------   Users -----------------------------------------------
	
	public function users_get() {
		$sql = 'select a.id, a.first_name, a.last_name, a.stage_name, a.email, a.phone, a.active, c.name, c.description
		from users a
		join users_groups b on (a.id = b.user_id)
		join groups c on (b.group_id = c.id)';
		$users = $this->my_database->passSQLAll($sql);
		if($users) {
			$this->set_response(['status' => "1", 'data' => $users]);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
		
	}
	
	public function users_post() {
		$sql = 'select a.id, a.first_name, a.last_name, a.stage_name, a.email, a.phone, a.active, c.name, c.description
		from users a
		join users_groups b on (a.id = b.user_id)
		join groups c on (b.group_id = c.id)';
		$users = $this->my_database->passSQLAll($sql);
		if($users) {
			$this->set_response(['status' => "1", 'data' => $users]);
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
		
	}
	
	//-----------------------------------   /Users -----------------------------------------------
	
	//-----------------------------------   User -----------------------------------------------
	
	public function user_get() {
		if($this->input->get('user_id') || $this->input->get('email')) {
			$sql = 'select a.id, a.first_name, a.last_name, a.stage_name, a.email, a.phone, a.active, c.name, c.description
			from users a
			join users_groups b on (a.id = b.user_id)
			join groups c on (b.group_id = c.id) where a.id > 0';
			if($this->input->get('user_id')) $sql .= " and a.id = ".$this->input->get('user_id');
			if($this->input->get('email')) $sql .= " and a.email = ".$this->input->get('email');
			$users = $this->my_database->passSQL($sql);
			if($users) {
				$this->set_response(['status' => "1", 'data' => $users]);
			} else {
				$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function user_post() {
		if($this->input->post('user_id') || $this->input->post('email')) {
			$sql = 'select a.id, a.first_name, a.last_name, a.stage_name, a.email, a.phone, a.active, c.name, c.description
			from users a
			join users_groups b on (a.id = b.user_id)
			join groups c on (b.group_id = c.id) where a.id > 0';
			if($this->input->post('user_id')) $sql .= " and a.id = ".$this->input->post('user_id');
			if($this->input->post('email')) $sql .= " and a.email = ".$this->input->post('email');
			$users = $this->my_database->passSQL($sql);
			if($users) {
				$this->set_response(['status' => "1", 'data' => $users]);
			} else {
				$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//-----------------------------------   /User -----------------------------------------------
	
	public function search_items_get() {
		$categories = $this->my_database->getAll('categories');
		$item_types = $this->my_database->getAll('item_type');
		$result = [
			'categories' => $categories,
			'item_types' => $item_types
		];
		$this->set_response(['status' => "1", 'data' => $result]);
	}
	
	public function search_items_post() {
		$categories = $this->my_database->getAll('categories');
		$item_types = $this->my_database->getAll('item_type');
		$result = [
			'categories' => $categories,
			'item_types' => $item_types
		];
		$this->set_response(['status' => "1", 'data' => $result]);
	}
	
	//------------------------------------------- Create new user account --------------------------------------
	
	public function create_user_get() {
		//first_name, last_name, stage_name, email, phone, username, created_on, password
		//if()
		$this->set_response(['status' => "1", 'data' => $this->input->get()]);
	}

	public function create_user_post() {
		$this->load->library(array('ion_auth','form_validation')); // load validation and auth libraries
		$this->load->model('ion_auth_model');
		if($this->input->post('email') && $this->input->post('password')) {
			$exists = $this->my_database->getAllSpecific('users', ['email' => $this->input->post('email')]);
			if($exists) {
				$this->set_response(['status' => "1", 'data' => "email_exists"]);
			} else {
				$identity = $this->input->post('email');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$additional_data = [
					'stage_name' => $this->input->post('email')
				];
				$user_id = $this->register->register($identity, $password, $email, $additional_data);
				if($user_id) {
					$user = $this->my_database->getAllSpecific('users', ['email' => $this->input->post('email')]);
					if($user) {
						//$user_id = $user->id;
						$user_group = $this->my_database->dbInsert('users_groups', ['user_id' => $user_id, 'group_id' => 4]);
						if($user_group) $this->set_response(['status' => "1", 'data' => "Y", "user_id" => $user_id]);
						else $this->set_response(['status' => "1", 'data' => "N"]);
					}
				} else {
					$this->set_response(['status' => "1", 'data' => "Y", "user_id" => $user_id]);
				}
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	//------------------------------------------- /Create new user account --------------------------------------
	
	//------------------------------------------- Login --------------------------------------
	
	public function social_login_get() {
		if($this->input->get('identity')) {
			$user = $this->my_database->getSpecific('users', ['email' => $this->input->get('identity')]);
			if($user) {
				$today = strtotime(date('Y-m-d H:i:s'));
				$updateData = ['last_login' => $today];
				$update_last_login = $this->my_database->updateData('users', 'id', $user->id, $updateData);
				$user_group = $this->my_database->getSpecific("users_groups", ['user_id' => $user->id]);
				$user_data = [
					'user_id' => $user->id,
					'group_id' => $user_group->group_id,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'stage_name' => $user->stage_name,
					'email' => $user->email,
					'phone' => $user->phone,
					'is_public' => $user->is_public,
				];
				$this->set_response(['status' => "1", 'message' => "Y", "data" => $user_data]);
			} else {
				//create account
				$this->social_create_account($this->input->get('identity'), $this->input->get('name'));
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	public function social_login_post() {
		if($this->input->post('identity')) {
			$user = $this->my_database->getSpecific('users', ['email' => $this->input->post('identity')]);
			if($user) {
				$today = strtotime(date('Y-m-d H:i:s'));
				$updateData = ['last_login' => $today];
				$update_last_login = $this->my_database->updateData('users', 'id', $user->id, $updateData);
				$user_group = $this->my_database->getSpecific("users_groups", ['user_id' => $user->id]);
				$user_data = [
					'user_id' => $user->id,
					'group_id' => $user_group->group_id,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'stage_name' => $user->stage_name,
					'email' => $user->email,
					'phone' => $user->phone,
					'is_public' => $user->is_public,
				];
				$this->set_response(['status' => "1", 'message' => "Y", "data" => $user_data]);
			} else {
				//create account
				//$this->set_response(['status' => "1", 'data' => "invalid"]);
				$this->social_create_account($this->input->post('identity'), $this->input->post('name'));
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 404);
		}
	}
	
	private function social_create_account($email, $name) {
		$name_arr = explode("", $name);
		$insert_data = [
			'email' => $email,
			'first_name' => $name_arr[0],
			'last_name' => $name_arr[1],
		];
		$insert = $this->my_database->dbInsert('users', $insert_data);
		if($insert()) {
			$user = $this->my_database->getSpecific('users', ['email' => $this->input->get('identity')]);
			if($user) {
				$today = strtotime(date('Y-m-d H:i:s'));
				$updateData = ['last_login' => $today];
				$update_last_login = $this->my_database->updateData('users', 'id', $user->id, $updateData);
				$user_group = $this->my_database->getSpecific("users_groups", ['user_id' => $user->id]);
				$user_data = [
					'user_id' => $user->id,
					'group_id' => $user_group->group_id,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'stage_name' => $user->stage_name,
					'email' => $user->email,
					'phone' => $user->phone,
					'is_public' => $user->is_public,
				];
				$this->set_response(['status' => "1", 'message' => "Y", "data" => $user_data]);
			} 
		}
	}
	
	//------------------------------------------- /Login --------------------------------------
	
	//-----------------------------------   Update Profile --------------------------------------
	
	public function update_profile_get() {
		if($this->input->get('user_id')) {
			$is_public = "0";
			if($this->input->get('is_public') == "Y") $is_public = "1";
			$user_data = [
				'stage_name' => $this->input->get('stage_name'),
				'first_name' => $this->input->get('first_name'),
				'last_name' => $this->input->get('last_name'),
				'phone' => $this->input->get('phone'),
				'is_public' => $is_public,
			];
			$update = $this->my_database->updateData('users', 'id', $this->input->get('user_id'), $user_data);
			if($update) {
				$sql = 'select a.*, b.group_id from users a join users_groups b on (a.id = b.user_id) where a.id = "'.$this->input->get('user_id').'"';
				$user = $this->my_database->passSQL($sql);
				$user_data = [
					'user_id' => $user->id,
					'group_id' => $user->group_id,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'stage_name' => $user->stage_name,
					'email' => $user->email,
					'phone' => $user->phone,
					'is_public' => $user->is_public,
				];
				$this->set_response(['status' => "1", 'message' => 'Y', 'data' => $user_data]);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 200);
		}
	}
	
	public function update_profile_post() {
		if($this->input->post('user_id')) {
			$is_public = "0";
			if($this->input->post('is_public') == "Y") $is_public = "1";
			$user_data = [
				'stage_name' => $this->input->post('stage_name'),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'phone' => $this->input->post('phone'),
				'is_public' => $is_public,
			];
			$update = $this->my_database->updateData('users', 'id', $this->input->post('user_id'), $user_data);
			if($update) {
				$sql = 'select a.*, b.group_id from users a join users_groups b on (a.id = b.user_id) where a.id = "'.$this->input->post('user_id').'"';
				$user = $this->my_database->passSQL($sql);
				$user_data = [
					'user_id' => $user->id,
					'group_id' => $user->group_id,
					'first_name' => $user->first_name,
					'last_name' => $user->last_name,
					'stage_name' => $user->stage_name,
					'email' => $user->email,
					'phone' => $user->phone,
					'is_public' => $user->is_public,
				];
				$this->set_response(['status' => "1", 'message' => 'Y', 'data' => $user_data]);
			}
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 200);
		}
	}
	
	//-----------------------------------   /Update Profile --------------------------------------
	
	public function upload_image_get() {
		if($this->input->get('user_id')) {
			//upload files'
			$config['file_name']			= $this->input->get('file_name');
			$config['upload_path']          = './uploads/profiles/';
			$config['allowed_types']        = 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG';
			$this->load->library('upload', $config);
			
			$featured_image_file = "";
			
			if($this->upload->do_upload('profile_image')) {
				$upload_result = $this->upload->data();
				log_message('error', json_encode($upload_result));
				log_message('error', $upload_result['file_name']);
				$featured_image_file = $upload_result['file_name'];
				$this->generate_thumbnails($upload_result['file_name']);
			} else {
				log_message('error', json_encode($this->upload->display_errors()));
				$this->response(['status' => "0", 'message' => 'not_uploaded', 'data' => []], 200);
			}
			//end upload files
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 200);
		}
	}
	
	//-----------------------------------   /Update Profile --------------------------------------
	
	//---
	
	public function upload_image_post() {
		log_message('error', json_encode($this->input->post()));
		if($this->input->post('user_id')) {
			//upload files'
			$config['file_name']			= $this->input->post('file_name');
			$config['upload_path']          = './uploads/profiles/';
			$config['allowed_types']        = 'jpg|jpeg|gif|png|JPG|JPEG|GIF|PNG';
			$this->load->library('upload', $config);
			
			$featured_image_file = "";
			
			if($this->upload->do_upload('profile_image')) {
				$upload_result = $this->upload->data();
				log_message('error', json_encode($upload_result));
				log_message('error', $upload_result['file_name']);
				$featured_image_file = $upload_result['file_name'];
				$this->generate_thumbnails($upload_result['file_name']);
			} else {
				log_message('error', json_encode($this->upload->display_errors()));
				$this->response(['status' => "0", 'message' => 'not_uploaded', 'data' => []], 200);
			}
			//end upload files
		} else {
			$this->response(['status' => "0", 'message' => 'Not Found', 'data' => []], 200);
		}
	}
	
	public function generate_thumbnails($file_name) {
		$file = $file_name;
		$result = true;
		$sizes = array("360", "40");
		for($i = 0; $i < sizeof($sizes); $i++) {
			$create_thumb = $this->do_create_thumbnails($file, $sizes[$i]);
			if(!$create_thumb) $result = false;
		}
		return $result;
	}
	
	public function do_create_thumbnails($file, $width) {
		$this->load->library('image_lib');
		
		$return = true;
		if($file && $width) {
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/profiles/'.$file;
			$config['new_image'] = './uploads/profiles/thumbs/';
			$config['create_thumb'] = TRUE;
			$config['thumb_marker'] = $width.'-';
			$config['overwrite'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = $width;
			
			$this->image_lib->initialize($config);

			if ( ! $this->image_lib->resize())
			{
				$return = false;
			}
		} else {
			$return = false;
		}
		
		return $return;
	}
	
	//--

	
}
