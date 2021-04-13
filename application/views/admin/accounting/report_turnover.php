<?php
/* Accounting > Transfer Report view
*/
?>
<?php $session = $this->session->userdata('username');?>
<?php $get_animate = $this->Xin_model->get_content_animate();?>
<div class="row">
    <div class="col-md-12 <?php echo $get_animate;?>">
        <div class="ui-bordered px-4 pt-4 mb-4">
        <?php $attributes = array('name' => 'report_accounting', 'id' => 'hrm-form', 'autocomplete' => 'off');?>
		<?php $hidden = array('re_user_id' => $session['user_id']);?>
        <?php echo form_open('admin/accounting/report_accounting', $attributes, $hidden);?>
        <?php
			$data = array(
			  'name'        => 'user_id',
			  'id'          => 'user_id',
			  'type'        => 'hidden',
			  'value' => $session['user_id'],
			  'class'       => 'form-control',
			);
			
			echo form_input($data);
			?>
          <input type="hidden" name="user_id" id="user_id" value="<?php echo $session['user_id'];?>">  
          <div class="form-row">
            <div class="col-md-3">
                <div class="form-group">
                  <label for="year"><?php echo $this->lang->line('xin_tax_chalan_year');?> <span id="acc_balance" style="display:none; font-weight:600; color:#F00;"></span></label>
                  <select name="year" id="year" class="from-account form-control" data-plugin="select_hrm" >
                      <option value="">--Select Year--</option>
                      <?php 
                    $current_year=date("Y");
                    
                    foreach($years as $year) {?>
                      
                    <option <?php if($year==$current_year){echo 'selected';}?> value="<?php echo $year;?>" ><?php echo $year;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
                 <div class="col-md-3">
                <div class="form-group">
                  <label for="month"><?php echo $this->lang->line('xin_tax_chalan_month');?></label>
                  <select name="month" id="month" class="from-account form-control" data-plugin="select_hrm" >
                  <option value="">--Select Month--</option>
                    <?php
                    $month = date('m');
                        for ($i = 0; $i < 12; $i++) {
                            $time = strtotime(sprintf('%d months', $i));   
                            $label = date('F', $time);   
                            $value = date('n', $time);
                            $selected='';
                            if($value==$month){
                                $selected='selected';
                            }
                            echo "<option value='$value' $selected >$label</option>";
                        }
                    ?>
                  </select>
                </div>
              </div>
            <div class="col-md col-xl-2 mb-4">
              <label class="form-label d-none d-md-block">&nbsp;</label>
              <button type="submit" class="btn btn-secondary btn-block"><?php echo $this->lang->line('xin_get');?></button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="card <?php echo $get_animate;?>">
  <div class="card-header with-elements"> <span class="card-header-title mr-2"><strong><?php echo $this->lang->line('xin_acc_turnover_report');?></strong></span> </div>
  <div class="card-body">
    <div class="box-datatable table-responsive">
      <table class="datatables-demo table table-striped table-bordered" id="xin_table">
        <thead>
          <tr>
            <th><?php echo $this->lang->line('xin_turnover_total_employee');?></th>
            <th><?php echo $this->lang->line('xin_turnover_new_joined');?></th>
            <th><?php echo $this->lang->line('xin_turnover_male_joined');?></th>
            <th><?php echo $this->lang->line('xin_turnover_female_joined');?></th>
            <th><?php echo $this->lang->line('xin_turnover_leave_company');?></th>
            <th><?php echo $this->lang->line('xin_turnover_male_leave');?></th>
            <th><?php echo $this->lang->line('xin_turnover_female_leave');?></th>
          </tr>
        </thead>
       
      </table>
    </div>
  </div>
</div>
