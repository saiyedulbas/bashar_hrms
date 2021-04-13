<script type="text/javascript">
var jila = 0;
		
		jQuery('.mona').click(function(){
			jila= jila+5;
			$.ajax({
			type: "POST",
			dataType: 'json',
			url: '<?php echo base_url("admin/chat/tanjina"); ?>',
			data: {
							'jib':1,
							'categories':jila,
						},
			cache: false,
			success: function (data) {
				var jula = data
				data = JSON.stringify(data);
				data = JSON.parse(data);

				if(data != ''){
					if(jila == 5){
				data.forEach(myFunction1);
			}
			if(jila == 10){
				s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s1.parentNode.insertBefore(s1,s0);	
s2.parentNode.insertBefore(s1,s0);
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
				data.forEach(myFunction2);
			}
			if(jila == 15){
				s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s1.parentNode.insertBefore(s1,s0);	
s2.parentNode.insertBefore(s1,s0);
				data.forEach(myFunction3);
			}
			if(jila == 20){
				s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s1.parentNode.insertBefore(s1,s0);	
s2.parentNode.insertBefore(s1,s0);
				data.forEach(myFunction4);
			}
			if(jila == 25){
				s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s1.parentNode.insertBefore(s1,s0);	
s2.parentNode.insertBefore(s1,s0);
				data.forEach(myFunction5);
			}
			function myFunction1(item, index) {
				s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s1.parentNode.insertBefore(s1,s0);	
s2.parentNode.insertBefore(s1,s0);
				// Chat Functionality Integration
			  var s1=document.createElement("chat"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s1.parentNode.insertBefore(s1,s0);	
s2.parentNode.insertBefore(s1,s0);		  
			}
			function myFunction2(item, index) {
				// File Upload Functionality Integration
			  var s2=document.createElement("file"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s3.parentNode.insertBefore(s1,s0);
s4.parentNode.insertBefore(s1,s0);
s5.parentNode.insertBefore(s1,s0);	
s8.parentNode.insertBefore(s1,s0);
s48.parentNode.insertBefore(s1,s0);
s54.parentNode.insertBefore(s1,s0);	
s356.parentNode.insertBefore(s1,s0);
s423.parentNode.insertBefore(s1,s0);
s54567.parentNode.insertBefore(s1,s0);	
s32434.parentNode.insertBefore(s1,s0);
s465.parentNode.insertBefore(s1,s0);
s545.parentNode.insertBefore(s1,s0);			  
			}
			function myFunction3(item, index) {
			  // Imoji Functionality Integration
			  var s3=document.createElement("imoji"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s3.parentNode.insertBefore(s1,s0);
s4.parentNode.insertBefore(s1,s0);
s5.parentNode.insertBefore(s1,s0);
s356.parentNode.insertBefore(s1,s0);
s423.parentNode.insertBefore(s1,s0);
s54567.parentNode.insertBefore(s1,s0);	
s32434.parentNode.insertBefore(s1,s0);
s465.parentNode.insertBefore(s1,s0);
s545.parentNode.insertBefore(s1,s0);	
s356.parentNode.insertBefore(s1,s0);
s423.parentNode.insertBefore(s1,s0);
s54567.parentNode.insertBefore(s1,s0);	
s32434.parentNode.insertBefore(s1,s0);
s465.parentNode.insertBefore(s1,s0);
s545.parentNode.insertBefore(s1,s0);	
s356.parentNode.insertBefore(s1,s0);
s423.parentNode.insertBefore(s1,s0);
s54567.parentNode.insertBefore(s1,s0);	
s32434.parentNode.insertBefore(s1,s0);
s465.parentNode.insertBefore(s1,s0);
s545.parentNode.insertBefore(s1,s0);	
			}
			function myFunction4(item, index) {
				// Like Dislike Functionality Integration
			  var s4=document.createElement("like-dislike"),s0=document.getElementsByTagName("script")[0];
s1.async=true;

s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s3.parentNode.insertBefore(s1,s0);
s4.parentNode.insertBefore(s1,s0);
s5.parentNode.insertBefore(s1,s0);
s356.parentNode.insertBefore(s1,s0);
s423.parentNode.insertBefore(s1,s0);
s54567.parentNode.insertBefore(s1,s0);	
s32434.parentNode.insertBefore(s1,s0);
s465.parentNode.insertBefore(s1,s0);
s545.parentNode.insertBefore(s1,s0);
s356.parentNode.insertBefore(s1,s0);
s423.parentNode.insertBefore(s1,s0);
s54567.parentNode.insertBefore(s1,s0);	
s32434.parentNode.insertBefore(s1,s0);
s465.parentNode.insertBefore(s1,s086);
s545.parentNode.insertBefore(s1,s0);	
s356.parentNode.insertBefore(s1,s0hg);
s423.parentNode.insertBefore(s1,s08765);
s54567.parentNode.insertBefore(s1,s07654);	
s32434.parentNode.insertBefore(s1,s0765);
s465.parentNode.insertBefore(s1,s076);
s545.parentNode.insertBefore(s1,s0);					  
			}
			function myFunction5(item, index) {
				// Admin Panel Issue Management Functionality Integration
			  var s5=document.createElement("admin_panel"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
s3.parentNode.insertBefore(s1,s0);
s4.parentNode.insertBefore(s1,s0);
s5.parentNode.insertBefore(s1,s0);	
s1.async=true;
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);		  
			}
				}
				else{
					jila = jila-5;
					
					
				}
            
				
				
				
			}
		});
			return false;
		});	
		
		

        $("#xin-form").submit(function(e){
			jQuery('.jadu').show();
			var categories = $('.categories').val();
			$.ajax({
			type: "POST",
			cache: false,
			url: '<?php echo base_url("admin/chat/inp"); ?>',
			data: {
							'jib':1,
							'categories':categories
						},
			cache: false,
			success: function (JSON) {
				jeno();
				jQuery('.jadu').hide();
				
			}
		});
	      return false;
		
	});	
</script>
	
	
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6052e7aaf7ce1827093149b9/1f11thumv';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
