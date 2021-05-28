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

class Api extends MY_Controller {

	public function __construct()
     {
          parent::__construct();
          //load the models
          $this->load->model('Login_model');
		  $this->load->model('Designation_model');
		  $this->load->model('Department_model');
		  $this->load->model('Employees_model');
		  $this->load->model('Xin_model');
		  $this->load->model('Exin_model');
		  $this->load->model('Expense_model');
		  $this->load->model('Timesheet_model');
		  $this->load->model('Travel_model');
		  $this->load->model('Training_model');
		  $this->load->model('Project_model');
		  $this->load->model('Job_post_model');
		  $this->load->model('Goal_tracking_model');
		  $this->load->model('Events_model');
		  $this->load->model('Meetings_model');
		  $this->load->model('Announcement_model');
		  $this->load->model('Clients_model');
		  $this->load->model("Recruitment_model");
		  $this->load->model('Tickets_model');
		  $this->load->model('Assets_model');
		  $this->load->model('Awards_model');
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
		$this->load->view('admin/Api/api');
	}
}