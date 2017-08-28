<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		$this->load->library('Grocery_CRUD');
		$this->load->library(array('ion_auth'));
		$this->load->model(array('my_database'));
		
		if(!$this->ion_auth->logged_in()) {
			redirect(base_url().'admin.php/auth/login');
			die;
		}
	}
	
	public function api()
    {
        $this->load->view('restapi/rest_server');
    }
	
	public function _mouldifi($output = null)
	{
		$this->load->view('includes/gcrud_template',(array)$output);
	}

	public function index()
	{
		redirect("admin/job_applications");
		/*$data['body_content'] = "table";
		$this->load->view("includes/template", $data);*/
	}
	
	public function jobs() {
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_table('jobs');
			$crud->set_subject('Jobs');
			
			$crud->columns("title", "category_id", "type_id", "valid_through", "sal_range_id");
			
			$crud->set_relation("sal_range_id", "salary_ranges", "title");
			$crud->set_relation("type_id", "employments_types", "type_name");
			$crud->set_relation("category_id", "categories", "category_name");
			
			$crud->display_as("sal_range_id", "Salary Range");
			$crud->display_as("type_id", "Employment Type");
			$crud->display_as("category_id", "Category");
			
			$crud->set_relation_n_n('skills', 'job_skills', 'skills', 'job_id', 'skill_id', 'name');
			
			if($this->uri->segment(3) == "add") {
				$crud->field_type("date_posted", "hidden", date('Y-m-d H:i:s'));
			}
			
			if($this->uri->segment(3) == "edit") {
				$crud->field_type("date_posted", "hidden");
			}
			
			$output = $crud->render();

			$this->_mouldifi($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function job_applications() {
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_table('job_applications');
			$crud->set_subject('Job Applications');
			
			$crud->columns("surname", "other_names", "job_id", "attachment");
			
			$crud->set_relation("job_id", "jobs", "title");
			$crud->set_relation("status_id", "status", "status_name");
			
			$crud->set_field_upload('attachment','uploads/attachments');
			
			$crud->add_action('View Application', '', 'admin/view_application', 'label label-warning');
			
			$crud->unset_read();
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			
			$output = $crud->render();

			$this->_mouldifi($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function view_application() {
		$data["job"] = $this->my_database->passSQL("select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = ".$this->uri->segment(3));
		$data['body_content'] = 'view_application';
		$data['page_title'] = "View Application";
		$this->load->view("includes/template", $data);
	}
	
	public function invite_for_interview() {
		$data["job"] = $this->my_database->passSQL("select a.*, b.title as job_title, b.date_posted
		from job_applications a
		join jobs b on (a.job_id = b.job_id) where a.application_id = ".$this->uri->segment(3));
		$data['body_content'] = 'invite';
		$data['page_title'] = "Invite for Interview";
		$this->load->view("includes/template", $data);
	}
	
	public function send_invite() {
		print_r($this->input->post());
		//Array ( [job_id] => 1 [application_id] => 1 [message_body] => Test test test )
		?>
		<p>Remaining Steps</p>
		<ol>
			<li>Update the job application to "Interviewing".</li>
			<li>Send an email to the user with the message above to notify them of their application status</li>
			<li>Load the applications page to enable the user see other applications</li>
		</ol>
		<?php
	}
	
	public function decline_application() {
		//decline_application/1/1
		//site_url("admin/decline_application/".$job->application_id."/".$job->job_id)
		//Array ( [job_id] => 1 [message_body] => Test ) Email is to be sent at this point to the applicant with the content.
		echo "application id = ".$this->uri->segment(3)."</br>";
		?>
		<p>Remaining Steps</p>
		<ol>
			<li>Update the job application to "Rejected".</li>
			<li>Send an email to the user with a system generated email to notify them of their application status.</li>
			<li>Load the applications page to enable the user see other applications</li>
		</ol>
		<?php
	}
	
	public function system_users()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_table('users');
			$crud->set_subject('System Users');
			
			//$crud->field_type('active', 'dropdown', array('1' => 'Active', '2' => 'Inactive'));
			$crud->set_relation_n_n('user_group', 'users_groups', 'groups', 'user_id', 'group_id', 'name');
			
			$crud->columns("first_name", "last_name", "phone", "email", "user_group", "active");
			
			$crud->display_as("active", "Is Active");
			
			$crud->field_type('active','dropdown', array('1' => 'YES', '0' => 'NO'));
			
			$crud->field_type('salt', 'hidden', "");
			$crud->field_type('password', 'hidden', "");
			$crud->field_type('activation_code', 'hidden', "");
			$crud->field_type('created_on', 'hidden', "");
			$crud->field_type('forgotten_password_code', 'hidden', "");
			$crud->field_type('forgotten_password_time', 'hidden', "");
			$crud->field_type('ip_address', 'hidden', "");
			$crud->field_type('last_login', 'hidden', "");
			$crud->field_type('remember_code', 'hidden', "");
			$crud->field_type('username', 'readonly', "");
			
			$output = $crud->render();

			$this->_mouldifi($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function dashboard()
	{
		//$data['total_subscribers'] = $this->my_database->passSQL("select count(*) as total from contacts1");
		//print_r($this->get_analytical_data());
		//$data['analytical_data'] = $this->get_analytical_data();
		$data['downloads'] = $this->my_database->passSQL("SELECT count(*) as d_count FROM `downloads` where status = 'COMPLETE' and YEAR(date) = '".date('Y')."'");
		$data['downloads_last_month'] = $this->my_database->passSQLAll("select a.amount_paid, a.status as payment_status, a.payment_date, b.item_id, b.status as download_status
		from payments a
		join downloads b on (a.payment_id = b.payment_id) where a.payment_date like '".date("Y-m",strtotime("-1 month"))."%'");
		$data['uploads'] = $this->my_database->passSQL("select count(*) as uploads, (select count(*) from items where uploaded_on like '".date('Y-m')."%') as this_month_uploads from items");
		$data['pending_uploads'] = $this->my_database->passSQLAll("select a.item_id, a.item_title, a.uploaded_by, a.uploaded_on, a.artiste_str, b.first_name, b.last_name
		from items a
		join users b on (a.uploaded_by = b.id) where a.approved = 0 limit 3");
		$data['downloads_this_month'] = $this->my_database->passSQL("select count(*) as downloads
		from downloads a where a.date like '".date('Y-m')."%' and a.status = 'COMPLETE'");
		$data['popular_items'] = $this->my_database->passSQLAll("SELECT item_id, item_title, item_url, image_url, artiste_str, view_count FROM `items` order by view_count desc limit 8");
		$data['body_content'] = "dashboard";
		$data['page_title'] = "Dashboard";
		$this->load->view("includes/template", $data);
	}
	
	public function get_analytical_data() {
		$all_data = $this->my_database->getAll("view_count_per_province");
		$unique_sms = $this->my_database->getAllSpecific('messages', ['status_id' => 4]);
		$result = array();
		$line_graph_data = array();
		$total = 0;
		if($all_data) {
			foreach($all_data as $data) {
				$total += $data->total;
				array_push($line_graph_data, array($data->province_name, $data->total));
			}
		}
		
		$result = ["total" => $total, "line_graph_data" => $line_graph_data, "unique_sms" => sizeof($unique_sms)];
		
		echo json_encode($result);
	}
	
	public function login()
	{
		$data['body_content'] = "login";
		$this->load->view("includes/template", $data);
	}
	
	public function reset_password()
	{
		$data['body_content'] = "reset_password";
		$this->load->view("includes/template", $data);
	}
	
	public function lock_screen()
	{
		$data['body_content'] = "lock_screen";
		$this->load->view("includes/template", $data);
	}
	
	public function forms()
	{
		$data['body_content'] = "forms";
		$this->load->view("includes/template", $data);
	}
	
	public function categories()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_table('categories');
			$crud->set_subject('Categories');
			
			$output = $crud->render();

			$this->_mouldifi($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function groups()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_table('groups');
			$crud->set_subject('Groups');
			
			$output = $crud->render();

			$this->_mouldifi($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function skills()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_table('skills');
			$crud->set_subject('Job Skills');
			
			$output = $crud->render();

			$this->_mouldifi($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function salary_ranges()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_table('salary_ranges');
			$crud->set_subject('Salary Ranges');
			
			$output = $crud->render();

			$this->_mouldifi($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function employment_types()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_table('employments_types');
			$crud->set_subject('Employments Types');
			
			$output = $crud->render();

			$this->_mouldifi($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function status()
	{
		try{
			$crud = new grocery_CRUD();
			
			$crud->set_table('status');
			$crud->set_subject('Status');
			
			$output = $crud->render();

			$this->_mouldifi($output);

		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
}
