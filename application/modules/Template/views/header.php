<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
  
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
 
    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="<?php echo base_url();?>assets/plugins/morrisjs/morris.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/lightslider.min.css" rel="stylesheet" />   

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="<?php echo base_url();?>assets/css/themes/all-themes.css" rel="stylesheet" />
    <link  href="<?php echo base_url();?>assets/css/themes/theme-indigo.css" rel="stylesheet">
   
	<style>
	.icon-pos{
		    padding-right: 16px;
    color: white;
    position: relative;
    top: 7px;
	}
	.mgr-top-10{
		margin-top:10px;
	}
	.lin-height{
		line-height:40px;
	}
	.card .header {  
                                     
    background: #7f8c8d;                                 
	padding:14px;

}
.card .header h2{
    position: relative;
    top: 5px;
	color:white !important;  
}
#refresh{
    color: white;
    font-size: 32px;
    position: relative;
    
    top: -8px;
}
#refresh:hover{
	cursor:pointer;
}
.panel-heading{
	    height: 42px;
    
    padding: 4px;
}
	</style>

	
		<script>
		 
	function clicked(id){
				var id="#"+$(id).attr("id");
			var vechicle_id=$(id).attr("custom");
			
				$("#vechicle_id").val(vechicle_id);
				console.log(vechicle_id); 
				$("#largeModal").modal('show');
		
		
			} 
			
		

		</script>
		
		<script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
				
	 
		   <script src="<?php echo base_url();?>assets/js/pages/forms/advanced-form-elements.js"></script>
			  <script src="<?php echo base_url();?>assets/js/admin.js"></script>
			 
	
	  <!-- Bootstrap Core Js -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>assets/js/lightslider.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<style>
 .brder_botom{
	 border-bottom:1px solid #D3D3D3;
 }
 .text-left{
	    padding: 6px;
 }
</style>
</head>

<body class="theme-deep-purple">
  
 
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-brand"> <img src="<?php echo base_url();?>assets/images/logo.png" width="55" height="55" alt="" style="position: relative;top:-19px;">  </a>
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">Excise Motor vehicle Seize And Confiscation</a>
                
     
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                   
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                      <li><a href="#"><?php echo $this->session->userdata("username"); ?></a></li>
                       <li class="dropdown">
                        <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="material-icons dropdown-toggle" >keyboard_arrow_down</i>
                            
                        </a>
                         <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            
                            <li role="separator" class="divider"></li>
                            <li><a href="<?php echo base_url();?>Auth/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->