<?php
$this->load->library("taxcalculatorlib");
    if (!empty($payslips)) {
        ?>
<style>
    #salary_statement td{border-color:#000;padding:5px}
    #salary_statement th{border-color:#000;padding:5px}
    .summary th{padding:5px}
    .summary td{padding:5px}
    .table-responsive .summary td{border-color:#000 !important}
    .table-responsive .summary th{border-color:#000 !important}
    .summary{border:1px solid #000 !important}
</style>
<style media="print" type="text/css">
    #salary_statement td{padding:5px}
    #salary_statement th{padding:5px}
   body {
       background-color: white !important;
       height:100%
      }
      #DivIdToPrint{height:100vh}



</style>

<div class="card" style="margin-top:10px;background-color:#fff;" id='DivIdToPrintCreditcard'>
    <div class="text-right" style="border-right: 30px solid #f58524;width:100%;background: #fff;">
        <img style="height:100px;margin-top: 15px;padding: 5px" src="<?php echo base_url(); ?>/images/logo.jpg">
    </div>
    <p style="font-size:24px;color:#f58524;text-align:right;-moz-transform: rotate(270deg); -o-transform: rotate(270deg);-webkit-transform: rotate(-90deg);-moz-transform-origin: 100% 100%;-o-transform-origin: 100% 100%;-webkit-transform-origin: 100% 100%;margin-top:-18px;margin-right:-2px">We are Integrating Your Ideas</p>
    <div class="card-body" style="background-color:#fff;padding: 0px 55px;width:100%;margin-top:-2%;">

        <div class="row">

            <div class="col-md-12 text-center">
               <input style="float:left;margin-top:-8%" type='button' id='btn-DivIdToPrintCreditcard' value='Print' onclick="printDiv('DivIdToPrintCreditcard')">
            </div>
             <div class="col-md-12">
                 <strong><?php echo $this->lang->line('salary_statement_date').': '. date('d-m-Y'); ?> </strong>
            </div>
             <div class="col-md-12 text-center" >
                <strong style="font-size:20px;line-height:3"><u><?php echo $this->lang->line('salary_statement_annual_report'); ?></u></strong>
            </div>
            <?php
                $designation=$this->Designation_model->read_designation_information($user->designation_id);
        $department=$this->Department_model->read_department_information($user->department_id);
        $relation='';
        $last_name='';
        $first_name='';
        $father_name='';
        $pre_house_no='';
        $pre_street1='';
        $pre_street2='';
        $n_id='';
        $date_of_birth='';
        $date_of_joining='';
        $dob='';
        $doj='';
        if ($user->gender=='Male') {
            $relation='son ';
        } elseif ($user->gender=='Female') {
            $relation='daughter ';
        } else {
            $relation='relative ';
        }
        if ($user->last_name) {
            $last_name=$user->last_name;
        } else {
            $last_name='';
        }
        if ($user->date_of_joining) {
            $doj=strtotime($user->date_of_joining);
            $date_of_joining=date('M d, Y', $doj);
        } else {
            $date_of_joining='--';
        }
        if ($user->date_of_birth) {
            $dob=strtotime($user->date_of_birth);
            $date_of_birth= date('M d, Y', $dob);
        } else {
            $date_of_birth='';
        }
        if ($user->n_id) {
            $n_id=$user->n_id;
        } else {
            $n_id='';
        }
        if ($user->first_name) {
            $first_name=$user->first_name;
        } else {
            $first_name='';
        }
        if ($additional_details) {
            $father_name=$additional_details->father_name;
        } else {
            $father_name='';
        }
        if ($additional_details) {
            $pre_house_no=$additional_details->pre_house_no;
        } else {
            $pre_house_no='';
        }
        if ($additional_details) {
            $pre_street1=$additional_details->pre_street1;
        } else {
            $pre_street1='';
        }
        if ($additional_details) {
            $pre_street2=$additional_details->pre_street2;
        } else {
            $pre_street2='';
        } ?>
            <div class="col-md-12" style="float:left">
                <p><?php echo $this->lang->line('xin_salary_statement_credit_1').'<strong>'.$first_name.' '.$last_name.'</strong>, '.'having NID:'.' '.$n_id.', '.$this->lang->line('xin_salary_statement_credit_4').' '.$company->name.' '.$first_name.' '.$last_name."'s ".$this->lang->line('xin_salary_statement_credit_5').' <strong>'.$period.'</strong>'.$this->lang->line('xin_salary_statement_credit_6'); ?></p>

            </div>

            <hr>
            <div class="col-md-12" style="margin-top:20px;background-color:none">
                <div class="box-datatable table-responsive">
                    <div class="col-md-6" style="float:left;width:50%;padding:0">
                    <table class="datatables-demo table table-striped table-bordered" id="salary_statement" >
                        <thead>
                            <tr>
                                <th class="text-center" colspan="2"><?php echo $this->lang->line('xin_salary_statement_table_header_1'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $this->lang->line('xin_basic_salary'); ?></td>
                                <td style="text-align:right;"><?php echo number_format(ceil($basicSalary)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('xin_house_rent_allowance'); ?></td>
                                <td style="text-align:right;"><?php echo number_format(ceil($houseRent)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('xin_medical_allowance'); ?></td>
                                <td style="text-align:right;"><?php echo number_format(ceil($medicalAllowance)); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $this->lang->line('xin_conveyance_allowance'); ?></td>
                                <td style="text-align:right;"><?php echo number_format(ceil($totalConveyence)); ?></td>
                            </tr>

                             <tr>
                                <td><?php echo $this->lang->line('xin_festival_bonus'); ?></td>
                                <td style="text-align:right;"><?php echo number_format(ceil($total_bonous)); ?></td>
                            </tr>

                             <tr>
                                <td><strong><?php echo $this->lang->line('salary_statement_total_payment'); ?></strong></td>
                                <td style="text-align:right;"><strong><?php echo number_format(ceil($basic_salary+$total_bonous)); ?></strong></td>
                            </tr>

                        </tbody>
                    </table>
                    </div>
                    <div class="col-md-6" style="float:right;width:50%;padding:0">
                    <table class="datatables-demo table table-striped table-bordered" id="salary_statement" >
                        <thead>
                            <tr>
                                <th class="text-center" colspan="2"><?php echo $this->lang->line('xin_salary_loan_deduction'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                             <tr>
                                <td>Tax</td>
                                <td style="text-align:right;"><?php echo number_format(ceil($tax_deduction)); ?></td>
                            </tr>

                           <?php
                                $total_loan=0;
        if (!empty($loans)) {
            foreach ($loans as $loan) {
                $total_loan+=$loan->loan_amount; ?>
                            <tr>
                                <td><?php echo $loan->loan_title; ?></td>
                                <td style="text-align:right;"><?php echo number_format(ceil($loan->loan_amount)); ?></td>
                            </tr>
                           <?php
            }
        } else {?>

                            <tr>
                                <td>Loan / Advance</td>
                                <td style="text-align:right;">0</td>
                            </tr>
                           <?php } ?>

                             <?php
                                $total_deduction=0;
        $other_deduction=0;

        foreach ($saturary_deductions as $saturary_deduction) {
            $total_deduction+=$saturary_deduction->deduct_amount;
            if ($saturary_deduction->ordering==1) {
                ?>
                            <tr>
                                <td><?php echo $saturary_deduction->deduction_title; ?></td>
                                <td style="text-align:right;"><?php echo number_format(ceil($saturary_deduction->deduct_amount)); ?></td>
                            </tr>
                           <?php
            }
            if ($saturary_deduction->ordering==2) {
                ?>
                            <tr>
                                <td><?php echo $saturary_deduction->deduction_title; ?></td>
                                <td style="text-align:right;"><?php echo number_format(ceil($saturary_deduction->deduct_amount)); ?></td>
                            </tr>
                           <?php
            } else {
                $other_deduction+= $saturary_deduction->deduct_amount;
            }
        } ?>

                            <tr>
                                <td>Other Deduction</td>
                                <td style="text-align:right;"><?php echo number_format(ceil($other_deduction)); ?></td>
                            </tr>


                            <tr>
                                <td><strong><?php echo $this->lang->line('xin_acc_total_deduction'); ?></strong></td>
                                <td style="text-align:right;"><strong><?php echo number_format(ceil($total_loan+$tax_deduction+$total_deduction)); ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>

                </div>
            </div>

             <div class="col-md-12 box-datatable table-responsive" style="margin-top:-17px;">
                 <div class="col-md-12"style="padding:0">
                <table class="datatables-demo table  summary">
                    <tr>
                        <td style="padding:0px">

                        <table class="summary-table">
                            <tr>
                                <th style="border:none"><?php echo $this->lang->line('salary_statement_summary_title'); ?></th>
                            </tr>
                            <tr>
                                <th style="border:none"><?php echo $this->lang->line('salary_statement_total_payment'); ?></th>
                                <td style="border:none">= <strong><?php echo $this->lang->line('xin_currency') ?></strong><?php echo number_format(ceil($basic_salary+$total_bonous)) ; ?></td>
                            </tr>
                            <tr>
                                <th style="border:none"><?php echo $this->lang->line('salary_statement_deduction'); ?></th>
                                <td style="border:none">= <strong><?php echo $this->lang->line('xin_currency') ?></strong><?php echo number_format(ceil($total_loan+$tax_deduction+$total_deduction)) ; ?></td>
                            </tr>
                            <tr>
                                <th style="border:none"><?php echo $this->lang->line('salary_statement_net_total_payment'); ?></th>
                                <td style="border:none">= <strong><?php echo $this->lang->line('xin_currency') ?></strong><?php echo number_format(ceil($basic_salary+$total_bonous)-ceil($total_loan+$tax_deduction+$total_deduction)) ; ?></td>
                            </tr>
                            <tr>
                                <th style="border:none"><?php echo $this->lang->line('xin_acc_total_payment_bdt_loan'); ?></th>
                                <td style="border:none"><strong>= BDT </strong><?php echo $this->taxcalculatorlib->numberTowords(ceil($basic_salary+$total_bonous)-ceil($total_loan+$tax_deduction+$total_deduction)) ; ?></td>
                            </tr>
                        </table>


                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                </table>
                    <table>
                        <tbody>
                            <tr>
                                <td style="padding:5px"><strong>Date of birth</strong></td>
                                <td style="padding-left:15px"><strong>:</strong> <?php echo $date_of_birth; ?></td>
                            </tr>
                            <tr>
                                <td style="padding:5px"><strong>Date of joining in the present employment</strong></td>
                                <td style="padding-left:15px"><strong>:</strong> <?php echo $date_of_joining; ?></td>
                            </tr>
                            <tr>
                                <td style="padding:5px"><strong>Present designation</strong></td>
                                <td style="padding-left:15px"><strong>:</strong> <?php echo $designation[0]->designation_name; ?></td>
                            </tr>
                            <tr>
                                <td style="padding:5px"><strong>Employee ID</strong></td>
                                <td style="padding-left:15px"><strong>:</strong> <?php echo $user->employee_id; ?></td>
                            </tr>
                        </tbody>
                    </table>

            </div>
            </div>
<!--            <div class="col-md-12" style="margin-top:20px;">

                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <p ><?php echo $this->lang->line('xin_computer_generate_certificate'); ?></p>
                <br />
            </div>-->


        </div>


    </div>
    <div class="row" style="background-color:#fff;margin:0px">
        <div class="col-md-12">
            <div style="margin-left:45px">
                <img style="height:120px;" src="<?php echo base_url(); ?>/images/seal.png">
                <br/>
                <br/>
                <p style="border-top:1px solid #000;width:16%">Md. Sumon Pandit<br />
                Accounts Officer<br />
                ULKASEMI Pvt. Limited</p>
            </div>


        </div>
    </div>
    <div class="row" style="background-color:#fff;margin:0px">
        <div class="col-md-12">
            <div style="float:right;margin-left:15px;margin-right:10px">
                <p>20045 Stevens Creek Blvd. Suite 2B,<br />
                Cupertino, CA 95014, USA<br />
                Phone: (925) 963 7255<br />
                Fax: (925) 369 7167<br />
                Web: info@ulkasemi.com</p>
            </div>
            <div style="float:right;">
                <p>House# 434 Road# 7<br />
                Baridhara DOHS, Dhaka - 1206<br />
               Bangladesh<br />
               Phone: (880) 2 8412321<br />
               Email: info@ulkasemi.com</p>
            </div>

        </div>
    </div>
    <div>
     <div style="background: #FDE4DA;height: 50px;width:25%;float:left"></div>
     <div style="background: #f9bb85;height: 50px;width:25%;float:left"></div>
     <div style="background:#f58524;height: 50px;width:50%;float:left"></div>
    </div>
</div>

    <?php
    } else {?>
<p>No data found.</p>

    <?php } ?>
