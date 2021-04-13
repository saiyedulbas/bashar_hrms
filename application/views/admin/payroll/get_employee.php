<?php $result = $this->Department_model->ajax_department_wise_employes($company_id,$department_id);?>
<div class="form-group">
  <label for="xin_department_head"><?php echo $this->lang->line('dashboard_single_employee');?></label>
   <select name="employee_id" id="employee_id" class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_an_employee');?>">
   <?php if(!empty($result)){?>
       <option value="0">All Employees</option>
   <?php }?>
    <?php foreach($result as $employee) {?>
    <option value="<?php echo $employee->user_id;?>"> <?php echo $employee->first_name.' '.$employee->last_name;?></option>
    <?php } ?>
  </select>             
</div>
<?php
//}
?>
<script type="text/javascript">
$(document).ready(function(){
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
});
</script>