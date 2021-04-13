<?php
 /**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the TFORCEHRMS License
 * that is bundled with this package in the file license.txt.
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to tforcehrms.com so we can send you a copy immediately.
 *
 * @author   TForce
 * @author-email  razib@consultant.com
 * @copyright  Copyright © tforcehrms.com. All Rights Reserved
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends MY_Controller {
	
	 public function __construct() {
        parent::__construct();
		//load the model
		$this->load->model("Job_post_model");
		//$this->load->model("Xin_model");
		$this->load->model("Designation_model");
		$this->load->model("Department_model");
	}
	
	/*Function to set JSON output*/
	public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	}
	
	 public function index()
     {
		//$data['title'] = $this->Xin_model->site_title();
		//$data['all_designations'] = $this->Designation_model->all_designations();
		//$data['all_job_types'] = $this->Job_post_model->all_job_types();
		//$data['all_jobs'] = $this->Job_post_model->all_jobs();
		//	$data['all_jobs_by_designation'] = $this->Job_post_model->read_all_jobs_by_designation();
		$session = $this->session->userdata('username');
	//	$role_resources_ids = $this->Xin_model->user_role_resource();
		$this->load->view("frontend/hrms/my_account", $data);
     }
}
