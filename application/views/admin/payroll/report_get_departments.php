<?php $result = $this->Company_model->ajax_company_departments_info($company_id);?>

<div class="form-group">
  <label for="designation"><?php echo $this->lang->line('xin_department');?></label>
  <select class="form-control" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_select_department');?>" name="department_id" id="aj_department" >
    <option value="0"><?php echo $this->lang->line('xin_acc_all');?></option>
    <?php foreach($result as $deparment) {?>
    <option value="<?php echo $deparment->department_id?>"><?php echo $deparment->department_name?></option>
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
 jQuery("#department_ajax").change(function(){
            //alert(jQuery(this).val());
	jQuery.get(base_url+"/get_department_employee/"+jQuery('#aj_company').val()+"/"+jQuery(this).find('option:selected').val(), function(data, status){
            console.log(data);
            jQuery('#employee_ajax').html(data);
	});
});
</script>