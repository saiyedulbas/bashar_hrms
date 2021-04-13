<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(isset($_GET['jd']) && isset($_GET['bonous_type_id']) && $_GET['data']=='bonous_type'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_edit_bonous_type');?></h4>
</div>
<?php $attributes = array('name' => 'update_bonous_type', 'id' => 'update_bonous_type', 'autocomplete' => 'off', 'class'=>'m-b-1');?>
<?php $hidden = array('_method' => 'EDIT', '_token' => $bonous_type_id, 'ext_name' => $bonous_type_id);?>
<?php echo form_open('admin/payroll/update_bonous_type/'.$bonous_type_id, $attributes, $hidden);?>
  <div class="modal-body">
    
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="company_id"><?php echo $this->lang->line('module_company_title');?></label>
            <select class="form-control" name="company_id"  data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>">
              <option value=""><?php echo $this->lang->line('xin_select_one');?></option>
              <?php foreach($get_all_companies as $company) {?>
              <option value="<?php echo $company->company_id;?>" <?php if($company->company_id==$company_id):?> selected="selected"<?php endif; ?>> <?php echo $company->name;?></option>
              <?php } ?>
            </select>
          </div>
         </div> 
          <div class="col-md-6">
            <div class="form-group">
               <label for="bonous_type"><?php echo $this->lang->line('xin_bonous_type');?></label>
              <input class="form-control" placeholder="<?php echo $this->lang->line('xin_bonous_type');?>" name="bonous_type" type="text" value="<?php echo $bonous_type;?>">
            </div>
          </div>
        <div class="col-md-6">
            <div class="form-group">
              <label for="status"><?php echo $this->lang->line('dashboard_xin_status');?></label>
              <select name="status" class="select2" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('xin_choose_status');?>">
                <option value="0" <?php if($status==0):?> selected="selected"<?php endif; ?>><?php echo $this->lang->line('xin_employees_inactive');?></option>
                <option value="1" <?php if($status==1):?> selected="selected"<?php endif; ?>><?php echo $this->lang->line('xin_employees_active');?></option>
              </select>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
    <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('xin_update');?></button>
  </div>
<?php echo form_close(); ?>
<script type="text/javascript">
 $(document).ready(function(){
					
		
		Ladda.bind('button[type=submit]');
		$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
		$('[data-plugin="select_hrm"]').select2({ width:'100%' });	 
			
		

		/* Edit data */
		$("#update_bonous_type").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&edit_type=bonous_type&form="+action,
				cache: false,
				success: function (JSON) {
					if (JSON.error != '') {
						toastr.error(JSON.error);
						$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
						$('.save').prop('disabled', false);
						Ladda.stopAll();
					} else {
						// On page load: datatable
						var xin_table = $('#xin_table').dataTable({
						"bDestroy": true,
						"ajax": {
							url : "<?php echo site_url("admin/payroll/bonous_type_list") ?>",
							type : 'GET'
						},
						"fnDrawCallback": function(settings){
						$('[data-toggle="tooltip"]').tooltip();          
						}
						});
						xin_table.api().ajax.reload(function(){ 
							toastr.success(JSON.result);
							Ladda.stopAll();
						}, true);
						$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
						$('.edit-modal-data').modal('toggle');
						$('.save').prop('disabled', false);
					}
				}
			});
		});
	});	
  </script>
<?php } else if(isset($_GET['jd']) && isset($_GET['bonous_type_id']) && $_GET['data']=='view_bonous_type'){
?>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
  <h4 class="modal-title" id="edit-modal-data"><?php echo $this->lang->line('xin_view_bonous_type');?></h4>
</div>
  <div class="modal-body">
  <div class="table-responsive" data-pattern="priority-columns">
    <table class="footable-details table table-striped table-hover toggle-circle">
      <tbody>
        <tr>
          <th><?php echo $this->lang->line('module_company_title');?></th>
          <td style="display: table-cell;"><?php foreach($get_all_companies as $company) {?>
            <?php if($company_id==$company->company_id):?>
            <?php echo $company->name;?>
            <?php endif;?>
            <?php } ?></td>
        </tr>
       <tr>
          <th><?php echo $this->lang->line('xin_bonous_type');?></th>
          <td style="display: table-cell;"><?php echo $bonous_type;?></td>
        </tr>
        <tr>
          <th><?php echo $this->lang->line('dashboard_xin_status');?></th>
          <td style="display: table-cell;"><?php if($status==1){ echo 'Active';}else{echo 'Inactive';}?></td>
        </tr>
       
      </tbody>
    </table>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line('xin_close');?></button>
  </div>
<?php } 
?>
