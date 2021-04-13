<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php $role_resources_ids = $this->Xin_model->user_role_resource(); ?>
<?php $session = $this->session->userdata('username');?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_tax_chalan');?></h4>
</div>
<?php $attributes = array('name' => 'expense_tax_chalan', 'id' => 'tax_chalan_update', 'autocomplete' => 'off');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $tax_chalan_id, 'ext_name' => $tax_chalan_id);?>
<?php echo form_open('admin/accounting/tax_chalan_update/'.$tax_chalan_id, $attributes, $hidden);?>
<div class="modal-body">
  <div class="row">
   <div class="col-md-3">
                 <?php if($user_info[0]->user_role_id==1){ ?>
                 <div class="form-group">
                   <label for="company_id"><?php echo $this->lang->line('module_company_title');?></label>
                   <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>" required>
                     <option value=""><?php echo $this->lang->line('module_company_title');?></option>
                     <?php foreach($all_companies as $company) {?>
                     <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$company_id){echo 'selected';}?>> <?php echo $company->name;?></option>
                     <?php } ?>
                   </select>
                 </div>
                 <?php } else {?>
                 <?php $ecompany_id = $user_info[0]->company_id;?>
                 <div class="form-group">
                   <label for="company_id"><?php echo $this->lang->line('module_company_title');?></label>
                   <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>" required>
                     <option value=""><?php echo $this->lang->line('module_company_title');?></option>
                     <?php foreach($all_companies as $company) {?>
                     <?php if($ecompany_id == $company->company_id):?>
                     <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$company_id){echo 'selected';}?>> <?php echo $company->name;?></option>
                     <?php endif;?>
                     <?php } ?>
                   </select>
                 </div>
                 <?php } ?>
               </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="year"><?php echo $this->lang->line('xin_tax_chalan_year');?> <span id="acc_balance" style="display:none; font-weight:600; color:#F00;"></span></label>
                  <select name="year" class="from-account form-control" data-plugin="select_hrm" >
                    <?php 
                    foreach($chalan_years as $year) {?>
                    <option <?php if($year==$current_year){echo 'selected';}?> value="<?php echo $year;?>" ><?php echo $year;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label for="month"><?php echo $this->lang->line('xin_tax_chalan_month');?> <span id="acc_balance" style="display:none; font-weight:600; color:#F00;"></span></label>
                  <select name="month" class="from-account form-control" data-plugin="select_hrm" >
                   <?php
                        for ($i = 0; $i < 12; $i++) {
                            $time = strtotime(sprintf('%d months', $i));   
                            $label = date('F', $time);   
                            $value = date('n', $time);
                            $selected='';
                            if($value==$month){
                                $selected='selected';
                            }
                            echo "<option value='$value' selected='$selected' >$label</option>";
                        }
                    ?>
                  </select>
                </div>
              </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="chalan_no"><?php echo $this->lang->line('xin_tax_chalan_no');?></label>
                      <input class="form-control" name="chalan_no" type="text" value="<?php echo $chalan_no;?>" placeholder="<?php echo $this->lang->line('xin_tax_chalan_no');?>">
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="bank_name"><?php echo $this->lang->line('xin_tax_bank_name');?></label>
                      <input class="form-control" name="bank_name" type="text" value="<?php echo $bank_name;?>" placeholder="<?php echo $this->lang->line('xin_tax_bank_name');?>">
                    </div>
                  </div>
                 <div class="col-md-3">
                    <div class="form-group">
                      <label for="total_amount"><?php echo $this->lang->line('xin_tax_chalan_total_amount');?></label>
                      <input class="form-control" name="total_amount" type="text" value="<?php echo $total_amount;?>" placeholder="<?php echo $this->lang->line('xin_tax_chalan_total_amount');?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="submit_date"><?php echo $this->lang->line('xin_tax_submit_date');?></label>
                      <input class="form-control date" value="<?php echo $submit_date;?>" placeholder="<?php echo date('Y-m-d');?>" readonly name="submit_date" type="text">
                    </div>
                  </div>
                <div class="col-md-3">
                 <div class='form-group'>
                    <fieldset class="form-group">
                      <label for="logo"><?php echo $this->lang->line('xin_acc_attach_file');?></label>
                      <input type="file" class="form-control-file" id="chalan_file" name="chalan_file">
                       <?php if($chalan_file!='' && $chalan_file!='no_file'):?>
                        <br>
                        <a href="<?php echo site_url('admin/download')?>?type=tax_chalan&filename=<?php echo $chalan_file;?>"><?php echo $this->lang->line('xin_download');?></a>
                        <?php endif;?>
                    </fieldset>
                  </div>
                </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-check-square"></i> <?php echo $this->lang->line('xin_close');?></button>
  <button type="submit" class="btn btn-primary"><i class="fas fa-check-square"></i> <?php echo $this->lang->line('xin_update');?></button>
</div>
<?php echo form_close(); ?> 
<script type="text/javascript">
 $(document).ready(function(){ 

		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 
		
		$('.date').bootstrapMaterialDatePicker({
			weekStart: 0,
			time: false,
			clearButton: false,
			format: 'YYYY-MM-DD'
		});
		Ladda.bind('button[type=submit]');
		
		
		/* Edit data */
		$("#tax_chalan_update").submit(function(e){
		var fd = new FormData(this);
		var obj = $(this), action = obj.attr('name');
		fd.append("is_ajax", 1);
		fd.append("edit_type", 'tax_chalan');
		fd.append("form", action);
		e.preventDefault();
		$('.icon-spinner3').show();
		$('.save').prop('disabled', true);
		$.ajax({
			url: e.target.action,
			type: "POST",
			data:  fd,
			contentType: false,
			cache: false,
			processData:false,
			success: function(JSON)
			{
				if (JSON.error != '') {
					toastr.error(JSON.error);
					$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
						$('.save').prop('disabled', false);
						Ladda.stopAll();
				} else {
					var xin_table = $('#xin_table').dataTable({
						"bDestroy": true,
						"ajax": {
							url : "<?php echo site_url("admin/accounting/chalan_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}
					});
					xin_table.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
					}, true);
					$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
					$('.icon-spinner3').hide();
					$('.edit-modal-data').modal('toggle');
					$('.save').prop('disabled', false);
					Ladda.stopAll();
				}
			},
			error: function() 
			{
				toastr.error(JSON.error);
				$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
				$('.icon-spinner3').hide();
				$('.save').prop('disabled', false);
				Ladda.stopAll();
			} 	        
	   });
	});
	});	
  </script>
