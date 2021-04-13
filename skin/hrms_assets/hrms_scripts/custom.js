$(document).ready(function(){	
	
	$('.policy').on('show.bs.modal', function (event) {
	$.ajax({
		url: site_url+'settings/policy_read/',
		type: "GET",
		data: 'jd=1&is_ajax=1&mode=modal&data=policy&type=policy&p=1',
		success: function (response) {
			if(response) {
				$("#policy_modal").html(response);
			}
		}
		});
	});
	
	jQuery(".hrms_layout").change(function(){
		if($('#fixed_layout_hrms').is(':checked')){
			var fixed_layout_hrms = $("#fixed_layout_hrms").val();
			
		} else {
			var fixed_layout_hrms = '';
		}
		if($('#boxed_layout_hrms').is(':checked')){
			var boxed_layout_hrms = $("#boxed_layout_hrms").val();
		} else {
			var boxed_layout_hrms = '';
		}
		if($('#sidebar_layout_hrms').is(':checked')){
			var sidebar_layout_hrms = $("#sidebar_layout_hrms").val();
		} else {
			var sidebar_layout_hrms = '';
		}
	
		$.ajax({
			type: "GET",  url: site_url+"settings/layout_skin_info/?is_ajax=2&type=hrms_layout_info&form=2&fixed_layout_hrms="+fixed_layout_hrms+"&boxed_layout_hrms="+boxed_layout_hrms+"&sidebar_layout_hrms="+sidebar_layout_hrms+"&user_session_id="+user_session_id,
			//data: order,
			success: function(response) {
				if (response.error != '') {
					toastr.error(response.error);
				} else {
					toastr.success(response.result);	
				}
			}
		});
	});
	//
	jQuery("#fixed_layout_hrms").click(function(){
		if($('#fixed_layout_hrms').is(':checked')){
			//$('#boxed_layout_hrms').prop('checked', false);
		}
	});
	jQuery("#boxed_layout_hrms").click(function(){
		if($('#boxed_layout_hrms').is(':checked')){
			$('.hrms-layout').removeClass('fixed');
			$('#fixed_layout_hrms').prop('checked', false);
		}
	});
});