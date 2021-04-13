<?php
/* Payroll > Advance Salary view
 */
?>
<?php $session = $this->session->userdata('username'); ?>
<?php $user_info = $this->Xin_model->read_user_info($session['user_id']); ?>
<?php $role_resources_ids = $this->Xin_model->user_role_resource(); ?>

<div class="card mb-4">
    <div id="accordion">
        <div class="card-header with-elements"> <span class="card-header-title mr-2"><strong><?php echo $this->lang->line('xin_request'); ?></strong> <?php echo $this->lang->line('xin_bonous_type'); ?></span>
            <div class="card-header-elements ml-md-auto"> <a class="text-dark collapsed" data-toggle="collapse" href="#add_form" aria-expanded="false">
                    <button type="button" class="btn btn-xs btn-outline-primary"> <span class="ion ion-md-add"></span> <?php echo $this->lang->line('xin_add_new'); ?></button>
                </a> </div>
        </div>
        <div id="add_form" class="collapse add-form" data-parent="#accordion" style="">
            <div class="card-body">
                <?php $attributes = array('name' => 'add_bonous_type', 'id' => 'xin-form', 'autocomplete' => 'off', 'class' => 'm-b-1'); ?>
                <?php $hidden = array('user_id' => $session['user_id']); ?>
                <?php echo form_open('admin/payroll/add_bonous_type', $attributes, $hidden); ?>
                <div class="bg-white">
                    <div class="box-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name"><?php echo $this->lang->line('module_company_title'); ?></label>
                                    <select class="form-control" name="company_id" id="filter_company" data-plugin="select_hrm" data-placeholder="<?php echo $this->lang->line('left_company'); ?>">
                                       <?php foreach ($all_companies as $company) { ?>
                                            <option value="<?php echo $company->company_id ?>"><?php echo $company->name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md mb-3">
                                    <label class="form-label"><?php echo $this->lang->line('xin_bonous_type'); ?></label>
                                    <input required="required" class="form-control" placeholder="<?php echo $this->lang->line('xin_bonous_type');?>" name="bonous_type" type="text" value="" id="bonous_type">
                                </div>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status"><?php echo $this->lang->line('xin_choose_status'); ?><i class="hrms-asterisk">*</i></label>
                                    <select name="status" class="form-control" data-plugin="select_hrm">
                                        <option value="0"><?php echo $this->lang->line('xin_employees_inactive'); ?></option>
                                        <option value="1"><?php echo $this->lang->line('xin_employees_active'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary"> <i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('xin_save'); ?> </button>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?> </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header with-elements"> <span class="card-header-title mr-2"><strong><?php echo $this->lang->line('xin_list_all'); ?></strong> <?php echo $this->lang->line('xin_bonous_type'); ?></span>

    </div>

    <div class="card-datatable table-responsive">
        <table class="datatables-demo table table-striped table-bordered" id="xin_table">
            <thead>
                <tr>
                    <th style="width:97px;"><?php echo $this->lang->line('xin_action'); ?></th>
                    <th><?php echo $this->lang->line('left_company'); ?></th>
                    <th><?php echo $this->lang->line('xin_bonous_type'); ?></th>
                    <th><?php echo $this->lang->line('dashboard_xin_status'); ?></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<style type="text/css">
    .hide-calendar .ui-datepicker-calendar { display:none !important; }
    .hide-calendar .ui-priority-secondary { display:none !important; }
</style>
