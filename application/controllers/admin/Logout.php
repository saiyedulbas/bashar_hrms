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
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MY_Controller
{

   /*Function to set JSON output*/
	public function output($Return=array()){
		/*Set response header*/
		header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		/*Final JSON response*/
		exit(json_encode($Return));
	}
	
	public function __construct()
     {
          parent::__construct();
          //load the login model
          $this->load->model('Login_model');
		  $this->load->model('Employees_model');
		  date_default_timezone_set("Asia/Jakarta");
     }
	 
	// Logout from admin page
	public function index() {
	
		$session = $this->session->userdata('username');
		$last_data = array(
			'is_logged_in' => '0',
			'last_logout_date' => date('d-m-Y H:i:s')
		); 
		$this->Employees_model->update_record($last_data, $session['user_id']);
				
		// Removing session data
		$data['title'] = 'HR Software';
		$sess_array = array('username' => '');
		$this->session->sess_destroy();
		$Return['result'] = 'Successfully Logout.';
		redirect('admin/', 'refresh');
	}
} 
?>