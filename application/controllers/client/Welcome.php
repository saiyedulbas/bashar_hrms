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

class Welcome extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model('Login_model');
			$this->load->model('Employees_model');
			$this->load->model('Users_model');
			$this->load->library('email');
			$this->load->model("Xin_model");
			$this->load->model("Designation_model");
			$this->load->model("Department_model");
			$this->load->model("Location_model");
			$this->load->model("Clients_model");
	}
	
	public function index()
	{		
		$data['title'] = 'HR Software';
		$this->load->view('client/auth/login', $data);	
	}
}