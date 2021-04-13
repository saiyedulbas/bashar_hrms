<?php $session = $this->session->userdata('username');?>
<?php $user = $this->Xin_model->read_employee_info($session['user_id']); ?>
<?php if($user[0]->user_role_id==1) {?>
<?php $result = $this->Department_model->ajax_company_employee_info($company_id);?>
<?php } else {?>
<?php $dep_data = $this->Xin_model->get_company_department_employees($company_id);?>
<?php $result = $this->Xin_model->get_department_employees($user[0]->department_id);?>
<?php } ?>
<div class="form-group">
   <label for="employee_alternate"><?php echo $this->lang->line('xin_employee');?></label>
   <select name="employee_alternate" id="employee_alternate" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>" required>
    <option value=""></option>
    <?php foreach($result as $employee) {?>
    <option value="<?php echo $employee->user_id;?>"> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
    <?php } ?>
  </select>  
  <span id="remaining_leave" style="display:none; font-weight:600; color:#F00;">&nbsp;</span>           
</div>
<?php
//}
?>
