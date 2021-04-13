$(document).ready(function() {
    var year = $('#year option:selected').val();
    var month = $('#month').val();
    
	var xin_table = $('#xin_table').dataTable({
		"bDestroy": true,
		"ajax": {
			url : site_url+"accounting/report_turnover_list/?year="+year+"&month="+month,
			type : 'GET'
		},
		dom: 'lBfrtip',
		"buttons": ['copy', 'csv', 'excel', 'pdf', 'print'], // colvis > if needed
		"fnDrawCallback": function(settings){
		$('[data-toggle="tooltip"]').tooltip();          
		}
	});
	
	$('[data-plugin="select_hrm"]').select2($(this).attr('data-options'));
	$('[data-plugin="select_hrm"]').select2({ width:'100%' });
	
	/* report */
	$("#hrm-form").submit(function(e){
		/*Form Submit*/
		e.preventDefault();
		var year = $('#year option:selected').val();
		var month = $('#month option:selected').val();
		var xin_table2 = $('#xin_table').dataTable({
			"bDestroy": true,
			"ajax": {
				url : site_url+"accounting/report_turnover_list/?year="+year+"&month="+month,
				type : 'GET'
			},
			dom: 'lBfrtip',
        	"buttons": ['copy', 'csv', 'excel', 'pdf', 'print'], // colvis > if needed
			"fnDrawCallback": function(settings){
			$('[data-toggle="tooltip"]').tooltip();          
			}
		});
		Ladda.stopAll();
	});
});