<?php
/* Accounting > New Expense view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<?php $role_resources_ids = $this->Xin_model->user_role_resource(); ?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']);?>

<?php if(in_array('469',$role_resources_ids)) {?>
<div class="card mb-4 <?php echo $get_animate;?>">
  <div id="accordion">
    <div class="card-header with-elements"> <span class="card-header-title mr-2"><strong><?php echo $this->lang->line('xin_add_new');?></strong> <?php echo $this->lang->line('xin_tax_chalan');?></span>
      <div class="card-header-elements ml-md-auto"> <a class="text-dark collapsed" data-toggle="collapse" href="#add_form" aria-expanded="false">
        <button type="button" class="btn btn-xs btn-primary"> <span class="ion ion-md-add"></span> <?php echo $this->lang->line('xin_add_new');?></button>
        </a> </div>
    </div>
    <div id="add_form" class="collapse add-form <?php echo $get_animate;?>" data-parent="#accordion" style="">
      <div class="card-body">
        <?php $attributes = array('name' => 'add_tax_chalan', 'id' => 'xin-form', 'autocomplete' => 'off');?>
        <?php $hidden = array('_user' => $session['user_id']);?>
        <?php echo form_open('admin/accounting/add_tax_chalan', $attributes, $hidden);?>
        <div class="bg-white">
          <div class="box-block">
            <div class="row">
               <div class="col-md-3">
                 <?php if($user_info[0]->user_role_id==1){ ?>
                 <div class="form-group">
                   <label for="company_id"><?php echo $this->lang->line('module_company_title');?></label>
                   <select class="form-control" name="company_id" id="aj_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('module_company_title');?>" required>
                     <option value=""><?php echo $this->lang->line('module_company_title');?></option>
                     <?php foreach($all_companies as $company) {?>
                     <option value="<?php echo $company->company_id;?>"> <?php echo $company->name;?></option>
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
                     <option value="<?php echo $company->company_id;?>"> <?php echo $company->name;?></option>
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
                    $current_year = date("Y");
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
                            echo "<option value='$value'>$label</option>";
                        }
                    ?>
                  </select>
                </div>
              </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="chalan_no"><?php echo $this->lang->line('xin_tax_chalan_no');?></label>
                      <input class="form-control" name="chalan_no" type="text" placeholder="<?php echo $this->lang->line('xin_tax_chalan_no');?>">
                    </div>
                  </div>
                <div class="col-md-3">
                    <div class="form-group">
                      <label for="bank_name"><?php echo $this->lang->line('xin_tax_bank_name');?></label>
                      <input class="form-control" name="bank_name" type="text" placeholder="<?php echo $this->lang->line('xin_tax_bank_name');?>">
                    </div>
                  </div>
                 <div class="col-md-3">
                    <div class="form-group">
                      <label for="total_amount"><?php echo $this->lang->line('xin_tax_chalan_total_amount');?></label>
                      <input class="form-control" name="total_amount" type="text" placeholder="<?php echo $this->lang->line('xin_tax_chalan_total_amount');?>">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="submit_date"><?php echo $this->lang->line('xin_tax_submit_date');?></label>
                      <input class="form-control date" placeholder="<?php echo date('Y-m-d');?>" readonly name="submit_date" type="text">
                    </div>
                  </div>
                <div class="col-md-3">
                 <div class='form-group'>
                    <fieldset class="form-group">
                      <label for="chalan_file"><?php echo $this->lang->line('xin_acc_attach_file');?></label>
                      <input type="file" class="form-control-file" id="chalan_file" name="chalan_file">
                    </fieldset>
                  </div>
                </div>
            </div>
            <div class="form-actions box-footer">
              <button type="submit" class="btn btn-primary"> <i class="fas fa-check-square"></i> <?php echo $this->lang->line('xin_save');?> </button>
            </div>
          </div>
        </div>
        <?php echo form_close(); ?> </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="card <?php echo $get_animate;?>">
  <div class="card-header with-elements"> <span class="card-header-title mr-2"><strong><?php echo $this->lang->line('xin_list_all');?></strong> <?php echo $this->lang->line('xin_tax_chalan');?></span> </div>
  <div class="card-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <thead>
          <tr>
            <th><?php echo $this->lang->line('xin_action');?></th>
            <th><?php echo $this->lang->line('xin_tax_chalan_no');?></th>
            <th><?php echo $this->lang->line('xin_tax_chalan_year');?></th>
            <th><?php echo $this->lang->line('xin_tax_chalan_month');?></th>
            <th><?php echo $this->lang->line('xin_tax_chalan_total_amount');?></th>
            <th><?php echo $this->lang->line('xin_tax_bank_name');?></th>
            <th><?php echo $this->lang->line('xin_tax_submit_date');?></th>
            <th><?php echo $this->lang->line('xin_tax_file');?></th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
