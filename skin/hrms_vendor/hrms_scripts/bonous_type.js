$(document).ready(function() {
var employee_id = jQuery('#employee_id').val();
var month_year = jQuery('#month_year').val();
var company_id = jQuery('#aj_company').val();
var xin_table = $('#xin_table').dataTable({
"bDestroy": true,
"ajax": {
	url : site_url+"payroll/bonous_type_list",
	type : 'GET'
},
"fnDrawCallback": function(settings){
$('[data-toggle="tooltip"]').tooltip();
}
});

$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' }); 
	
	
	
	/* Delete data */
	$("#delete_record").submit(function(e){
	/*Form Submit*/
	e.preventDefault();
		var obj = $(this), action = obj.attr('name');
		$.ajax({
			type: "POST",
			url: e.target.action,
			data: obj.serialize()+"&is_ajax=2&form="+action,
			cache: false,
			success: function (JSON) {
				if (JSON.error != '') {
					toastr.error(JSON.error);
					Ladda.stopAll();
					$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
				} else {
					$('.delete-modal').modal('toggle');
					xin_table.api().ajax.reload(function(){ 
						toastr.success(JSON.result);
						Ladda.stopAll();
					}, true);		
					$('input[name="csrf_hrms"]').val(JSON.csrf_hash);					
				}
			}
		});
	});
	
	// edit
	$('.edit-modal-data').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var bonous_type_id = button.data('bonous_type_id');
		var modal = $(this);
	$.ajax({
		url :  base_url+"/bonous_type_read/",
		type: "GET",
		data: 'jd=1&is_ajax=1&mode=modal&data=bonous_type&bonous_type_id='+bonous_type_id,
		success: function (response) {
			if(response) {
				$("#ajax_modal").html(response);
			}
		}
		});
	});
	
	$('#modals-slide').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var bonous_type_id = button.data('bonous_type_id');
		var modal = $(this);
	$.ajax({
		url :  base_url+"/bonous_type_read/",
		type: "GET",
		data: 'jd=1&is_ajax=1&mode=modal&data=view_bonous_type&bonous_type_id='+bonous_type_id,
		success: function (response) {
			if(response) {
				$("#ajax_modal_view").html(response);
			}
		}
		});
	});
		/* Add data */ /*Form Submit*/
		$("#xin-form").submit(function(e){
		e.preventDefault();
			var obj = $(this), action = obj.attr('name');
			$('.save').prop('disabled', true);
			$('.icon-spinner3').show();
			$.ajax({
				type: "POST",
				url: e.target.action,
				data: obj.serialize()+"&is_ajax=1&add_type=bonous_type&form="+action,
				cache: false,
				success: function (JSON) {
					if (JSON.error != '') {
						toastr.error(JSON.error);
						$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
						$('.save').prop('disabled', false);
						$('.icon-spinner3').hide();
						Ladda.stopAll();
					} else {
						xin_table.api().ajax.reload(function(){ 
							toastr.success(JSON.result);
						}, true);
						$('input[name="csrf_hrms"]').val(JSON.csrf_hash);
						$('.icon-spinner3').hide();
						$('.add-form').removeClass('show');
						$('#xin-form')[0].reset(); // To reset form fields
						$('.save').prop('disabled', false);
						Ladda.stopAll();
					}
				}
			});
		});
		
/* Add data */ /*Form Submit*/
//	$("#xin-form").submit(function(e){});
});
$( document ).on( "click", ".delete", function() {
	$('input[name=_token]').val($(this).data('record-id'));
	$('#delete_record').attr('action',base_url+'/delete_bonous_type/'+$(this).data('record-id'));
});