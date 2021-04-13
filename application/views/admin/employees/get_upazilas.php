<?php $result = $this->Location_model->get_upazilas($district_id);?>
<div class="form-group">
  <label class="form-label"><?php echo $label;?><i class="hrms-asterisk">*</i></label>
  <select class="form-control" name="<?php echo $name;?>" id="<?php echo $upazila_id;?>" data-plugin="select_hrm" data-placeholder="<?php echo $label;?>">
    <option value=""><?php echo $label;?></option>
    <?php foreach($result as $upazila) {?>
    <option value="<?php echo $upazila->id?>"><?php echo $upazila->name;?></option>
    <?php } ?>
  </select>
</div>
<?php
//}
?>
