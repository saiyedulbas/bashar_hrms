<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH.'libraries/Rest_Controller.php';

class Notification extends Rest_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('api');
        $this->load->model("Xin_model");
        $this->load->library('email');
        $this->load->model("Employees_model");
        $this->load->model("Roles_model");

        //Configure limits on our controller methods
        //Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        //$this->methods['users_get']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['user_post']['limit'] = 100; // 100 requests per hour per user/key
        //$this->methods['user_delete']['limit'] = 50; // 50 requests per hour per user/key
    }

    /**
    * Send notification email to HR staff regarding the employee working $duration
    * Like HR will get notification for following criterias:
    * - New employee complete 3 months
    * - New employee complete 6 months
    * - Any employee complete 1 or more years
    */
    public function sendEmployeeDurationNotification_get()
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
        $cinfo = $this->Xin_model->read_company_setting_info(1);

        //get email template
        $template = $this->Xin_model->read_email_template(18);


        $full_name = 'ID: '.$employee->employee_id.', Name:'. $employee->first_name.' '.$employee->last_name;

        $subject = str_replace(array("{employee_name}","{duration}"), array($full_name, $job_duration), $template[0]->subject);
        $logo = base_url().'uploads/logo/signin/'.$cinfo[0]->sign_in_logo;

        $message = '
        <div style="background:#f6f6f6;font-family:Verdana,Arial,Helvetica,sans-serif;font-size:12px;margin:0;padding:0;padding: 20px;">
        <img src="'.$logo.'" title="'.$cinfo[0]->company_name.'"><br>'.str_replace(array("{employee_name}","{duration}","{company}","{join_date}","{site_name}"), array($full_name, $job_duration, $employee->date_of_joining, $cinfo[0]->company_name,site_url()), htmlspecialchars_decode(stripslashes($template[0]->message))).'</div>';

        $emailEmployees = $this->Employees_model->fetch_all_company_employees_by_role(100, 0, 2, 4);
        foreach ($emailEmployees as $emailRecipient) {
            //hrms_mail($cinfo[0]->email, "Ulkasemi HRMS", $emailRecipient->email, $subject, $message);
            hrms_mail('amirul1313.diu@gmail.com', "Ulkasemi HRMS", 'amirul1313.diu@gmail.com', $subject, $message);
        }
    }
}
