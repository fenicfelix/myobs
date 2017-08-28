<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct()
    {
        // Construct the parent class
        parent::__construct();
		$this->load->model('my_database');
		
		date_default_timezone_set("Africa/Nairobi");
    }

	public function index()
	{
		$jobs_sql = "SELECT * FROM view_all_jobs";
		if($this->input->get("s")) $jobs_sql .= " where job_title like '%".$this->input->get("s")."%' or category_name like '%".$this->input->get("s")."%'";
		if($this->input->get("cat")) $jobs_sql .= " where category_id = '".$this->input->get("cat")."'";
		$cats_sql = "select a.category_id, a.category_name, (select count(*) from jobs where category_id = a.category_id) as jobs_count from categories a order by jobs_count desc limit 10";
		$data["jobs"] = $this->my_database->passSQLAll($jobs_sql);
		$data["categories"] = $this->my_database->passSQLAll($cats_sql);
		$data["content"] = "homepage";
		$this->load->view('includes/template', $data);
	}
	
	public function jobs() {
		$jobs_sql = "SELECT * FROM view_all_jobs where job_id != ".$this->uri->segment(3);
		$cats_sql = "select a.category_id, a.category_name, (select count(*) from jobs where category_id = a.category_id) as jobs_count from categories a order by jobs_count desc limit 10";
		$data["jobs"] = $this->my_database->passSQLAll($jobs_sql);
		$data["categories"] = $this->my_database->passSQLAll($cats_sql);
		$data["job"] = $this->my_database->passSQL("select a.job_id, a.description, a.title as job_title, b.title as sal_range, b.min_salary, b.max_salary, a.date_posted, a.valid_through, c.type_name, d.category_name
		from jobs a
		join salary_ranges b on (a.sal_range_id = b.sal_range_id)
		join employments_types c on (a.type_id = c.type_id)
		join categories d on (a.category_id = d.category_id) WHERE a.job_id = ".$this->uri->segment(3));
		$data["skills"] = $this->my_database->passSQLAll("select a.skill_id, b.name as skill_name from job_skills a join skills b on (a.skill_id = b.skill_id) where a.job_id = ".$this->uri->segment(3));
		$data["content"] = "jobs";
		$this->load->view('includes/template', $data);
	}
	
	public function apply() {
		$jobs_sql = "SELECT * FROM view_all_jobs";
		$cats_sql = "select a.category_id, a.category_name, (select count(*) from jobs where category_id = a.category_id) as jobs_count from categories a order by jobs_count desc limit 10";
		$data["jobs"] = $this->my_database->passSQLAll($jobs_sql);
		$data["categories"] = $this->my_database->passSQLAll($cats_sql);
		$data["job"] = $this->my_database->passSQL("select a.job_id, a.description, a.title as job_title, b.title as sal_range, b.min_salary, b.max_salary, a.date_posted, a.valid_through, c.type_name, d.category_name
		from jobs a
		join salary_ranges b on (a.sal_range_id = b.sal_range_id)
		join employments_types c on (a.type_id = c.type_id)
		join categories d on (a.category_id = d.category_id) WHERE a.job_id = ".$this->uri->segment(3));
		$data["skills"] = $this->my_database->passSQLAll("select a.skill_id, b.name as skill_name from job_skills a join skills b on (a.skill_id = b.skill_id) where a.job_id = ".$this->uri->segment(3));
		$data["content"] = "apply";
		$this->load->view('includes/template', $data);
	}
	
	public function submit_application() {
		if($this->input->post()) {
			
			$config['upload_path']   = './uploads/attachments/';
			$config['allowed_types'] = 'doc|docx|pdf|DOC|DOCX|PDF';
			$this->load->library('upload', $config);
			
			
			if($this->upload->do_upload('attachment')) {
				$upload_result = $this->upload->data();
				log_message('error', json_encode($upload_result));
				log_message('error', $upload_result['file_name']);
				$attachment = $upload_result['file_name'];
				
				$data = [
					"job_id" => $this->input->post("job_id"),
					"surname" => $this->input->post("surname"),
					"other_names" => $this->input->post("other_names"),
					"phone_number" => $this->input->post("phone_number"),
					"email" => $this->input->post("email"),
					"cover_letter" => $this->input->post("cover_letter"),
					"status_id" => 1,
					"attachment" => $attachment,
					"date_applied" => date('Y-m-d H:i:s')
				];
				
				$insert = $this->my_database->dbInsert("job_applications", $data);
				if($insert) {
					redirect("home/apply/".$this->input->post("job_id")."/success");
				} else {
					redirect("home/apply/".$this->input->post("job_id")."/error");
				}
			
			} else {
				log_message('error', json_encode($this->upload->display_errors()));
				redirect("home/apply/".$this->input->post("job_id")."/error");
			}
			
		} else {
			redirect("home");
		}
	}
}
