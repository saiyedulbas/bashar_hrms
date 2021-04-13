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
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        //load the model
        $this->load->model("Job_post_model");
        $this->load->model("Xin_model");
        $this->load->model("Designation_model");
        $this->load->model("Department_model");
        $this->load->model("Recruitment_model");
        $this->load->model('Employees_model');
        $this->load->library('email');
    }

    /*Function to set JSON output*/
    public function output($Return=array())
    {
        /*Set response header*/
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        /*Final JSON response*/
        exit(json_encode($Return));
    }

    public function index()
    {
        $system = $this->Xin_model->read_setting_info(1);
        if ($system[0]->module_recruitment=='true') {
            $data['title'] = 'HOME';
            $data['path_url'] = 'job_home';
            $data['all_jobs'] = $this->Recruitment_model->get_all_jobs_last_desc();
            $data['all_featured_jobs'] = $this->Recruitment_model->get_featured_jobs_last_desc();
            $data['all_job_categories'] = $this->Recruitment_model->all_job_categories();
            $data['subview'] = $this->load->view("frontend/hrms/home-2", $data, true);
            $this->load->view('frontend/hrms/job_layout/job_layout', $data); //page load
        } else {
            $data['title'] = $this->Xin_model->site_title().' | Log in';
            $theme = $this->Xin_model->read_theme_info(1);
            if ($theme[0]->login_page_options == 'login_page_1'):
                $this->load->view('admin/auth/login-1', $data); elseif ($theme[0]->login_page_options == 'login_page_2'):
                $this->load->view('admin/auth/login-2', $data); elseif ($theme[0]->login_page_options == 'login_page_3'):
                $this->load->view('admin/auth/login-3', $data); elseif ($theme[0]->login_page_options == 'login_page_4'):
                $this->load->view('admin/auth/login-4', $data); elseif ($theme[0]->login_page_options == 'login_page_5'):
                $this->load->view('admin/auth/login-5', $data); else:
                $this->load->view('admin/auth/login-1', $data);
            endif;
        }
    }
    public function sendEmployeeDurationNotification()
    {
        $employees = $this->Employees_model->get_employees();

        foreach ($employees->result() as $employee) {
            if ($employee->date_of_joining!=null) {
                $date1=date_create(date('Y-m-d H:i:s', strtotime($employee->date_of_joining)));
                $date2=date_create(date('Y-m-d H:i:s'));
                $diff=date_diff($date1, $date2);
                //$job_duration = $diff->m . " Months " . $diff->y . " Years";
                //sendMail($employee, $job_duration);

                //echo $diff->format("%R%m months");
                if ($employee->date_of_leaving == "") {
                    if ($diff->y == 0) {
                        if (($diff->m == 3 || $diff->m == 6) && $diff->d == 0) {
                            // Send mail for 3 - 6 month
                            $job_duration = $diff->m . " months";
                            $this->sendMail($employee, $job_duration);
                        }
                    } elseif ($diff->y > 0 && $diff->m == 0 && $diff->d == 0) {
                        // Send mail for one year or More
                        $job_duration = $diff->y . " years";
                        $this->sendMail($employee, $job_duration);
                    }
                }
            }
        }

        print_r(array('status'=> true, 'message'=> 'Mail Sent Successfully'));
    }

    /**
    * Send Email function for Employee duration notifications
    **/
    private function sendMail($employee, $job_duration)
    {
        $this->email->set_mailtype("html");
        //get company info
        $cinfo = $this->Xin_model->read_branch_setting_info($employee->company_id);
        //print_r($cinfo[0]->name);
        $cinfo1 = $this->Xin_model->read_company_setting_info(1);

        //get email template
        $template = $this->Xin_model->read_email_template(18);


        $full_name = 'ID: '.$employee->employee_id.', Name:'. $employee->first_name.' '.$employee->last_name;

        $subject = str_replace(array("{employee_name}","{duration}"), array($full_name, $job_duration), $template[0]->subject);
        $logo = base_url().'uploads/logo/signin/'.$cinfo1[0]->sign_in_logo;

        $message = '
        <div style="background:#f6f6f6;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;padding: 20px;">
        <img src="'.$logo.'" title="'.$cinfo[0]->name.'"><br>'.str_replace(array("{employee_name}","{duration}","{company}","{join_date}","{site_name}"), array($full_name, $job_duration,$cinfo[0]->name, $employee->date_of_joining,$cinfo[0]->name), htmlspecialchars_decode(stripslashes($template[0]->message))).'</div>';

        $emailEmployees = $this->Employees_model->fetch_all_company_employees_by_role(100, 0, $employee->company_id, 6);
        $to_email=array();
        foreach ($emailEmployees as $emailRecipient) {
            $to_email[]=$emailRecipient->email;
            //hrms_mail($cinfo[0]->email, "Ulkasemi HRMS", $emailRecipient->email, $subject, $message);
        }
        if (!empty($to_email)) {
            hrms_mail($cinfo1[0]->email, $cinfo[0]->name, implode(', ', $to_email), $subject, $message);
        }
    }
}
