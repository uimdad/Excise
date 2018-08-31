<!-- Jquery Core Js -->
   
   

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script>

</script>
    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url();?>assets/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url();?>assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
    <script src="<?php echo base_url();?>assets/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url();?>assets/js/demo.js"></script>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
		      <!-- Input Mask Plugin Js -->
			 <script src="<?php echo base_url();?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			
			   <script src="<?php echo base_url();?>assets/plugins/dropzone/dropzone.js"></script>
			
    <script src="<?php echo base_url();?>assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
		  <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.js"></script>
		
		 <script src="<?php echo base_url();?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
			     <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>
		    <script src="<?php echo base_url();?>assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
 <script src="<?php echo base_url();?>assets/plugins/jquery-countto/jquery.countTo.js"></script>

    <script src="<?php echo base_url();?>assets/js/admin.js"></script>
	 <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	 <script type="text/javascript" src="<?php echo base_url();?>assets/js/lightslider.min.js"></script>
	 

 
	<script>
	
	
     $(document).ready(function(){  
      var dataTable = $('#example').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/show_vechicles_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });  
	  
	      var dataTable = $('#warehouse').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/warehouse_checkin_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });   
	  var dataTable = $('#warehouse_dispatched').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/fsl_report_dispatched_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      }); 


 var dataTable = $('#warehouse_received').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/fsl_report_received_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      }); var dataTable = $('#confiscated_vechicle').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/warehouse_confiscations_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });   
	  var dataTable = $('#allot').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/allot_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });   
	  var dataTable = $('#sized_history').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/Eto_seized_vechicle_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });     
	  var dataTable = $('#confiscated_history').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/confiscated_history_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });    
	  var dataTable = $('#alloted').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/alloted_vechicles_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });  
	  var dataTable = $('#returned_vechicle').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'Vechicles/returned_vechicles_list'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });     
	 
 });

 $('#image-gallery').lightSlider({
                gallery:true,
                item:1,
                thumbItem:5,
                slideMargin: 0,
                speed:500,
                auto:false,
                loop:false,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }  
            }); $('#image-gallery1').lightSlider({
                gallery:true,
                item:1,
                thumbItem:5,
                slideMargin: 0,
                speed:500,
                auto:false,
                loop:false,
                onSliderLoad: function() {
                    $('#image-gallery1').removeClass('cS-hidden');
                }  
            });
			
/* 		$("#show_val").click(function(){   
			console.log("working");  
		}) */
/*
   $(document).ready(function(){  
      var dataTable = $('#user_data').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url() . 'admin/captain_datatable'; ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0, 3, 4],  
                     "orderable":false,  
                },  
           ],  
      });  
 });  
 */

 
	</script>
	  		 <script>
		
		  $(document).on('submit','#fslreportdispatched',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/sendtofsl", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Sent To fsl ')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#largeModal").modal("hide");      
}
			});
			}); 
			$(document).on('submit','#allotvechicle',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/allot_vechicle_form", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Alloted ')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#largeModal").modal("hide");      
}
			});
			}); 
			
			
			$(document).on('submit','#sendtoeto',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/sendtoeto", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Sent To ETO')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#largeModal").modal("hide");      
}
			});
			});
			
			$(document).on('submit','#aknoweledge',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/warehouse_confiscations_acknowledge", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Aknoweledge')  

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#largeModal").modal("hide");      
}
			});
			});
			$(document).on('submit','#received',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/receive_vechicle", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Received')  

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#largeModal").modal("hide");      
}
			});
			});$(document).on('submit','#return',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/return_vechicle", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Returned To Owner')  

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#largeModal").modal("hide");      
}
			});
			});
			$(document).on('submit','#fslreceived',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/receivedfromfsl", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Received From Fsl')  

toastr.options = {
 "closeButton": false,  
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#largeModal").modal("hide");      
}
			});
			});
			$(document).on('submit','#sentbackbyeto',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/sendbackbyeto", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Received From Fsl')  

toastr.options = {
 "closeButton": false,  
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#largeModal").modal("hide");      
}
			});
			});
			
			$("#refresh").click(function(){
				
				document.location.reload(); 
			});
			
			
			
			/** ajax code for send to mra**/
			$(document).on('submit','#sendtomra',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/sendtomra", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully sent To Mra')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#defaultModal").modal("hide");      
}
			});
			}); 
			/** ajax code for receive from mra**/
			$(document).on('submit','#mrareceive',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/mra_receive_form", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Received From Mra')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#defaultModal").modal("hide");      
}
			});
			}); /** cleared vehicle **/
			$(document).on('submit','#release_vehicle',function(event){
				event.preventDefault();
			
					$.ajax({
url: "<?php echo base_url();?>/Vechicles/Release_vehicle", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function()   // A function to be called if request succeeds
{ 
	
	 
	     Command: toastr["success"]('Successfully Released Vehicle')

toastr.options = {
 "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-center",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",  
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
} 
        $("#defaultModal").modal("hide");      
}
			});
			}); 
		  </script>
	
</body>

</html>
