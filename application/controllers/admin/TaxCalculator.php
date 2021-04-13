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

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

class TaxCalculator extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Employees_model");
        $this->load->model("Designation_model");
        $this->load->helper('url_helper');
        $this->load->library("taxcalculatorlib");
        $this->load->model("Timesheet_model");
    }

    public function testTaxCalculation()
    {
        $salary=$_GET['salary'];
        //$salaryBreakDown = $this->taxcalculatorlib->salaryBreakDown($salary);
        //$salary = array(90000,90000,90000,90000,90000,90000,90000,90000,90000,90000,90000,90000);
        $salaryBreakDown = $this->taxcalculatorlib->salaryBreakDownArray($salary);
        $taxableIncome = $this->taxcalculatorlib->salaryTaxableIncome($salaryBreakDown);

        $finalSalaryTax = $this->taxcalculatorlib->salaryTaxCalculation($taxableIncome);
        print_r($finalSalaryTax);
        exit();
    }

    public function testEmployeeMethods()
    {
        var_dump($this->Timesheet_model->employee_monthly_food_allowance_calculator(8, 9, 2020));
       // var_dump($this->Employees_model->read_employee_turnover(2020, 6));
        exit();
    }

    public function downloadSalaryCertificate()
    {
        $template_file_name = 'uploads/AnnualSalaryCertificate.docx';

        $rand_no = rand(111111, 999999);
        $fileName = "salaryCertificate_" . $rand_no . ".docx";

        $folder   = "uploads/salarycertificate";
        $full_path = $folder . '/' . $fileName;

        try {
            if (!file_exists($folder)) {
                mkdir($folder);
            }

            //Copy the Template file to the Result Directory
            copy($template_file_name, $full_path);

            // add calss Zip Archive
            $zip_val = new ZipArchive;

            //Docx file is nothing but a zip file. Open this Zip File
            if ($zip_val->open($full_path) == true) {
                // In the Open XML Wordprocessing format content is stored.
                // In the document.xml file located in the word directory.

                $key_file_name = 'word/document.xml';
                $message = $zip_val->getFromName($key_file_name);

                $timestamp = date('d-M-Y H:i:s');

                // this data Replace the placeholders with actual values
                $message = str_replace("tokenName", "Alimul Islam", $message);
                $message = str_replace("parent", "Md Abdul Halim Sikder", $message);
                $message = str_replace("address", "367/A, Block H, Road 9, Bashundhara R/A, Dhaka 1229", $message);
                $message = str_replace("startMonth", "January", $message);
                $message = str_replace("endMonth", "December", $message);
                $message = str_replace("tokenYear", "2019", $message);
                $message = str_replace("basicSalary", "100,000", $message);
                $message = str_replace("houseRent", "20,000", $message);
                $message = str_replace("medicalAllowance", "5,000", $message);
                $message = str_replace("totalConveyence", "5,000", $message);
                $message = str_replace("festivalBonus", "100,000", $message);
                $message = str_replace("annualPayment", "1,400,000", $message);
                $message = str_replace("totalAnnualPayment", "1,400,000", $message);
                $message = str_replace("netAnnualPayment", "1,400,000", $message);
                $message = str_replace("amountInBDT", "Fourteen lacs BDT", $message);


                //Replace the content with the new content created above.
                $zip_val->addFromString($key_file_name, $message);
                $zip_val->close();

                header("Content-Disposition: attachment; filename=\"" . basename($full_path) . "\"");
                header("Content-Type: application/docx");
                header("Content-Length: " . filesize($full_path));
                header("Connection: close");
                readFile($full_path);
                //exit();

                // Remove the directory after download
                if (file_exists($folder)) {
                    array_map('unlink', glob("$folder/*.*"));
                    rmdir($folder);
                }
            }
        } catch (Exception $exc) {
            $error_message =  "Error creating the Word Document";
            var_dump($exc);
        }
    }

    public function downloadTaxCalculator()
    {
        $template_file_name = 'uploads/TaxCalculatorTemplate.xlsx';

        $rand_no = rand(111111, 999999);
        $fileName = "employeeTaxCalculator_" . $rand_no . ".xlsx";

        $folder   = "uploads/taxcalculator";
        $editFile = $folder . '/' . $fileName;

        try {
            if (!file_exists($folder)) {
                mkdir($folder);
            }

            //Copy the Template file to the Result Directory
            copy($template_file_name, $editFile);

            $spreadsheet = IOFactory::load($editFile);
            $worksheet = $spreadsheet->getActiveSheet();

            $employees = $this->Employees_model->fetch_all_employees(65, 0);
            $i = 9;
            foreach ($employees as $employee) {
                $worksheet->getCell('B' . $i)->setValue($employee->first_name . ' ' . $employee->last_name);
                $designation = $this->Designation_model->read_designation_information($employee->designation_id);
                $worksheet->getCell('c' . $i)->setValue($designation[0]->designation_name);
                $worksheet->getCell('D' . $i)->setValue($employee->gender);
                $worksheet->getCell('F' . $i)->setValue($employee->basic_salary);
                $i++;
            }

            $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
            $writer->save($editFile);

            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'. $editFile .'"');
            header('Cache-Control: max-age=0');
            ob_start();
            $writer->save('php://output'); // download file
            ob_end_flush();

            // Remove the directory after download
            if (file_exists($folder)) {
                array_map('unlink', glob("$folder/*.*"));
                rmdir($folder);
            }
        } catch (Exception $exc) {
            $error_message =  "Error creating the Word Document";
            var_dump($exc);
        }
    }

    public function index()
    {

        //Call the download function with file path,file name and file type
        //$this->output_file($file_path, ''.$filename.'', 'text/plain');
    }
}
