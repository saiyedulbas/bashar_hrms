$(document).ready(function(){						
	// get departments
	
	/* Add data */ /*Form Submit*/
	$("#xin-form").submit(function(e){
		var fd = new FormData(this);
                
                //alert(fd);
		var obj = $(this), action = obj.attr('name');
		fd.append("is_ajax", 3);
		fd.append("type", 'imp_payslip');
		fd.append("form", action);
		e.preventDefault();
		$('.save').prop('disabled', true);
		//$('#hrload-img').show();
		//toastr.info(processing_request);
		$.ajax({
			url: e.target.action,
			type: "POST",
			data:  fd,
			contentType: false,
			cache: false,
			processData:false,
			success: function(JSON)
			{
                            console.log(JSON);
				if (JSON.error != '') {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.error(JSON.error);
					$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
					$('.save').prop('disabled', false);
					Ladda.stopAll();
				} else {
					//toastr.clear();
					//$('#hrload-img').hide();
					toastr.success(JSON.result);
					$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
					$('#xin-form')[0].reset(); // To reset form fields
					$('.select2-selection__rendered').html('--Select--');
					$('.save').prop('disabled', false);
					Ladda.stopAll();
				}
			},
			error: function() 
			{
				//toastr.clear();
				//$('#hrload-img').hide();
				toastr.error(JSON.error);
				$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
				$('.save').prop('disabled', false);
				Ladda.stopAll();
			} 	        
	   });
	});
});