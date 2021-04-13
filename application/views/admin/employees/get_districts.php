<?php $result = $this->Location_model->get_districts($division_id);?>
<div class="form-group">
  <label class="form-label"><?php echo $label;?><i class="hrms-asterisk">*</i></label>
  <select class="form-control" name="<?php echo $name;?>" id="<?php echo $district_id;?>" data-plugin="select_hrm" data-placeholder="<?php echo $label;?>">
    <option value=""><?php echo $this->lang->line('xin_e_pre_district');?></option>
    <?php foreach($result as $district) {?>
    <option value="<?php echo $district->id?>"><?php echo $district->name;?></option>
    <?php } ?>
  </select>
</div>
<?php
//}
?>
<script>
     jQuery("#per_district").change(function(){
		jQuery.get(base_url+"/get_pupazila/"+jQuery(this).val(), function(data, status){
			jQuery('#eper_police_station').html(data);
		});
		
	});
</script>