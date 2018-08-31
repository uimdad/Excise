<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vechicles extends MX_Controller 
{
  function index()
{
parent::__construct();

}
function  show_vechicles()
{   echo Modules::run("Auth/check_login","show_vechicles");
	  	 $data['module']="Vechicles";
   	 $data['file']="show_vechicles";
   	 $data['name'] = "Vechicles";
    echo Modules::run("Template/main",$data);
}
   function show_vechicles_list()
   {
echo Modules::run("Auth/check_login","show_vechicles_list");
 $user_id=$this->session->userdata("user_id");
	$returneddistrict = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
	$userdistrict="";
	foreach($returneddistrict as $district){ $userdistrict=$district->district_id; }
			$this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_datatables($userdistrict);  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                $sub_array[] = $row->username;  
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->districtname;  
                $sub_array[] = $row->mobilesquadno;
                $sub_array[] = $row->vechileregistrationno;   
                
                $sub_array[] = '<a href="Vechicles/change_proceed_status/'.$row->vechileid.'" click="return confirm(Do you want to Proceeded.);" class="btn bg-indigo waves-effect">Proceed</a>';  
                  
                $data[] = $sub_array;  
           }     
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Mdl_vechicles->get_all_data(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 

           }
  

   
   function show_vechicles_all(){
	  echo Modules::run("Auth/check_login","show_vechicles_all");
   		 $data['module']="Vechicles";
   	 $data['file']="show_vechicles_all";
   	 $data['name'] = "";
	 //$user_id=$this->session->userdata("user_id");
	//$returneddistrict = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
	//$userdistrict="";
	//foreach($returneddistrict as $district){ $userdistrict=$district->district_id; }
	$user_id=$this->session->userdata("user_id");
	$returneddistrict = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
	$userdistrict="";
	foreach($returneddistrict as $district){ $userdistrict=$district->district_id; }
     $data['all_vechicle'] = $this->db->query("SELECT * FROM `tbl_vechile` 
JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id where vechiclestatus = 5 and district_id={$userdistrict} order by vechileid DESC;
");  
   
  
   	 echo Modules::run("Template/main",$data);
   }
   function show_specific_vechicle($id)
   {   echo Modules::run("Auth/check_login","show_specific_vechicle");
	    $data['module']="Vechicles";
   	 $data['file']="show_specific_vechicle";
   	 $data['name'] = " ";   
	 	 $data['all_vechicle_specific'] = $this->db->query("SELECT mobilesquadno,username,districtname,seizedtype
		 ,datesiezeddate,siezedtime,formserialno,seizedlocationlat,drivername
,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
 ,submakename,modelyear,vehicletype,drivercnicno
,drivermobileno,driveraddress,
vechileownername,vechileownercnic,vechileownermobileno
bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription
 FROM `tbl_vechile` 
		 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vechile.district_id 
		LEFT JOIN tbl_vechile_make on tbl_vechile_make.makeid=tbl_vechile.vechicle_make 
		 LEFT JOIN tbl_vechile_make_sub on tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model
		 LEFT JOIN tbl_vechile_model on tbl_vechile_model.modelid = tbl_vechile.vechiclemodelyear	
		 LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vechile.build_id	
		 LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vechile.vechilewheels	
		 LEFT JOIN tbl_color on tbl_color.colorid = tbl_vechile.color_id	
		 LEFT JOIN tbl_vechile_seized on tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category	
		 LEFT JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id where vechileid ={$id}"); 
		  $data['all_vechicle_images'] =  $this->db->query("SELECT * FROM `tbl_vechile_images` 
		  where vechile_id ={$id}");
		    $data['all_vechicle_accesories'] =  $this->db->query("SELECT * FROM `tbl_accesories` 
		 join tbl_vechile_accessories on tbl_vechile_accessories.accessories_id=tbl_accesories.accessoryid
		 where tbl_vechile_accessories.vechicle_id ={$id}");
		  echo Modules::run("Template/main",$data);
   }
   //vecchicles which have sent to fsl and got back report
   function show_vechicle_report($id)
   {  echo Modules::run("Auth/check_login","show_vechicle_report");
	    $data['module']="Vechicles";  
   	 $data['file']="vechicle_complete_report";
   	 $data['name'] = "";   
	 	 $data['all_vechicle_specific'] = $this->db->query("SELECT mobilesquadno,username,districtname,seizedtype
		 ,datesiezeddate,siezedtime,formserialno,seizedlocationlat,drivername
,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
 ,submakename,modelyear,vehicletype,drivercnicno
,drivermobileno,driveraddress,
vechileownername,vechileownercnic,vechileownermobileno,tbl_vechile_formb.description,tbl_vechile_formb.date,tbl_vechile_formb.time,
tbl_vechile_formb.lat,tbl_vechile_formb.long,tbl_vechile_formb.form_bno,
bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription
 FROM `tbl_vechile` 
		 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vechile.district_id 
		LEFT JOIN tbl_vechile_make on tbl_vechile_make.makeid=tbl_vechile.vechicle_make 
		 LEFT JOIN tbl_vechile_make_sub on tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model
		 LEFT JOIN tbl_vechile_model on tbl_vechile_model.modelid = tbl_vechile.vechiclemodelyear	
		 LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vechile.build_id	
		 LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vechile.vechilewheels	
		 LEFT JOIN tbl_color on tbl_color.colorid = tbl_vechile.color_id	
		 LEFT JOIN tbl_vechile_formb on tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid	
		 LEFT JOIN tbl_vechile_seized on tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category	
		 LEFT JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id where vechileid ={$id}"); 
		  $data['all_vechicle_images'] =  $this->db->query("SELECT * FROM `tbl_vechile_images` 
		  where vechile_id ={$id}");
		  $data['all_vechicle_formb_images'] =  $this->db->query("SELECT * FROM `tbl_warehouse_images` 
		  where vechicle_id ={$id}");
		    $data['all_vechicle_accesories'] =  $this->db->query("SELECT * FROM `tbl_accesories` 
		 join tbl_vechile_accessories on tbl_vechile_accessories.accessories_id=tbl_accesories.accessoryid
		 where tbl_vechile_accessories.vechicle_id ={$id}");
		  echo Modules::run("Template/main",$data);
   }
   
   function seized_vechicles() 
   {         echo Modules::run("Auth/check_login","seized_vechicles");
	    $data['module']="Vechicles";
   	 $data['file']="seized_vechicles";
   	 $data['name'] = "";
	 $user_id=$this->session->userdata("user_id");
$returneddistrict = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
	$userdistrict="";
	foreach($returneddistrict as $district){ $userdistrict=$district->district_id; }
   	 $data['seized_vechicles'] = $this->db->query("
SELECT mobilesquadno,username,districtname,seizedtype
		 ,datesiezeddate,siezedtime,formserialno,seizedlocationlat,drivername
,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
 ,submakename,modelyear,vehicletype,drivercnicno
,drivermobileno,driveraddress,vechileid,   
vechileownername,vechileownercnic,vechileownermobileno,tbl_vechile_formb.description,tbl_vechile_formb.date,tbl_vechile_formb.time,
tbl_vechile_formb.lat,tbl_vechile_formb.long,tbl_vechile_formb.form_bno,
bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription
 FROM `tbl_vechile` 
		 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vechile.district_id 
		LEFT JOIN tbl_vechile_make on tbl_vechile_make.makeid=tbl_vechile.vechicle_make 
		 LEFT JOIN tbl_vechile_make_sub on tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model
		 LEFT JOIN tbl_vechile_model on tbl_vechile_model.modelid = tbl_vechile.vechiclemodelyear	
		 LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vechile.build_id	
		 LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vechile.vechilewheels	
		 LEFT JOIN tbl_color on tbl_color.colorid = tbl_vechile.color_id	
		 LEFT JOIN tbl_vechile_formb on tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid	
		 LEFT JOIN tbl_vechile_seized on tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category	
		 LEFT JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id
		 where vechiclestatus=0 and district_id={$userdistrict} order by vechileid DESC
"); 

	     echo Modules::run("Template/main",$data);
		 if($this->session->flashdata("msg")){unset($_SESSION["msg"]);}
   }

   function change_proceed_status($vechicle_id)
   { 
   echo Modules::run("Auth/check_login","change_proceed_status");
   $data = array("vechiclestatus"=>1);
        date_default_timezone_set("Asia/Karachi");
	   if(update_where("tbl_vechile",$data,"vechileid",$vechicle_id))   
	   {   $time=date("h:i:A");
			$seized_date = date("d-M-Y");
           	insert_data("tbl_eto_approved_date",array("vechicle_id"=>$vechicle_id,"approved_date"=>$seized_date,"approved_time"=>$time));
		   $this->session->set_flashdata("msg","Vechicle Proceeded Successfully");
		   		   redirect("Vechicles/seized_vechicles");
		   
	   }   
   }          
       
   
   
   function warehouse_checkin_list()
   { 
	     
			$this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_datatables_warehouse();  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->siezedtime;  
                $sub_array[] = $row->formserialno;  
                $sub_array[] = $row->form_bno; 
                $sub_array[] = $row->seizedtype; 
                $sub_array[] = $row->vechileregistrationno;   
                
                $sub_array[] = '<a href="Vechicles/checkedin_details/'.$row->vechileid.'"  class="btn bg-indigo waves-effect">Details</a>';  
                $sub_array[] = '<button type="button" class="btn bg-green waves-effect m-r-20 m-r-1" id="show_val'.$row->vechileid.'"  onclick="clicked(this);" custom="'.$row->vechileid.'">Send to Fsl</button>';  
                  
                $data[] = $sub_array;  
           }     
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Mdl_vechicles->get_all_data_warehouse(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_filtered_data_warehouse(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 

   }
   function warehouse_checkin()
   {   echo Modules::run("Auth/check_login","warehouse_checkin");
	   $data['module']="Vechicles";
   	     $data['file']="warehouse_checkedin";
   	     $data['name'] = "Checked in Vechicles";

			echo Modules::run("Template/main",$data);
   }

   function fsl_report_dispatched_list()
   {
	
           
			$this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_datatables_dispatcehd_warehouse();  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                $sub_array[] = $row->username;  
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->districtname;  
                $sub_array[] = $row->mobilesquadno;
                $sub_array[] = $row->vechileregistrationno;   
                
                $sub_array[] = '<a href="Vechicles/show_specific_vechicle/'.$row->vechileid.'"  class="btn bg-indigo waves-effect">Details</a>';  
                $sub_array[] = '<button type="button" class="btn btn-success waves-effect  m-r-20 m-r-1" id="show_val'.$row->vechileid.'"  onclick="clicked(this);" custom="'.$row->vechileid.'">Received From Fsl</button>';  
                  
                $data[] = $sub_array;  
           }     
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Mdl_vechicles->get_all_data_dispatcehd_warehouse(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_filtered_data_dispatcehd_warehouse(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 	
   }
   function fsl_report_dispatched()
   {
	   echo Modules::run("Auth/check_login","fsl_report_dispatched");
	    $data['module']="Vechicles";
   	     $data['file']="warehouse_dispatched";
   	     $data['name'] = "";
		
			echo Modules::run("Template/main",$data);
   }
   function sendtofsl()
   { 
   echo Modules::run("Auth/check_login","sendtofsl");
   if(isset($_FILES['userfile']))
    {
        $document = explode('.', $_FILES['userfile']['name']);
        $new_name = rand().'.'.$document[1];
       // $destination = 'vendor_images'.$new_name;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/'.$new_name);
		
       
    }
	  $data=array(
	  "letterno"=>$this->input->post("letterno"),
    "vechicle_id"=>$this->input->post("vechicle_id"),
	  "time"=>$this->input->post("time"),
	  
	  "description"=>$this->input->post("description"),
	  "date"=>$this->input->post("date"),
	  "fslcheckin"=>1,
	  "	upload"=>$new_name  
	  );
	   if(insert_data("tbl_fsl_report",$data))
	   {
     update_where("tbl_vechile",array("vechiclestatus"=>2),"vechileid",$this->input->post("vechicle_id"));
	   }
	   
	   

	     
	   
   }
    function receivedfromfsl()
   { 
  echo Modules::run("Auth/check_login","receivedfromfsl");
   if(isset($_FILES['userfile']))
    {
        $document = explode('.', $_FILES['userfile']['name']);
        $new_name = rand().'.'.$document[1];
       // $destination = 'vendor_images'.$new_name;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/'.$new_name);
		
       
    }
	  $data=array(
	  "letterno"=>$this->input->post("letterno"),
    "vechicle_id"=>$this->input->post("vechicle_id"),
	  "time"=>$this->input->post("time"),
	  "description"=>$this->input->post("description"),
	  "date"=>$this->input->post("date"),
	  "fslcheckout"=>1,
	  "	upload"=>$new_name  
	  );
	   if(insert_data("tbl_fsl_report",$data))
	   {
     update_where("tbl_vechile",array("vechiclestatus"=>4),"vechileid",$this->input->post("vechicle_id"));
	   }    
	   
   }
   
   function fsl_report_received_list()
   {  
	   
			$this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_datatables_received_warehouse();  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                $sub_array[] = $row->username;  
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->districtname;  
                $sub_array[] = $row->mobilesquadno;
                $sub_array[] = $row->vechileregistrationno;   
                
                $sub_array[] = '<a href="Vechicles/show_vechicle_report/'.$row->vechileid.'"  class="btn bg-indigo waves-effect">Details</a>';  
                $sub_array[] = '<button type="button" class="btn bg-green waves-effect m-r-20 m-r-1" id="show_val'.$row->vechileid.'"  onclick="clicked(this);" custom="'.$row->vechileid.'">Send To Eto</button>';  
                  
                $data[] = $sub_array;  
           }     
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->Mdl_vechicles->get_all_data_received_warehouse(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_filtered_data_received_warehouse(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 	
   }
   function fsl_report_received()
   {  echo Modules::run("Auth/check_login","fsl_report_received");
	   $data['module']="Vechicles";
   	     $data['file']="warehouse_received_vechicle";
   	     $data['name'] = " ";
		 
			echo Modules::run("Template/main",$data);
   }
   function sendtoeto(){
	   echo Modules::run("Auth/check_login","sendtoeto");
	    $data=array(
	 
    "vechicle_id"=>$this->input->post("vechicle_id"),
	  "sendtoetotime"=>$this->input->post("time"),
	
	  "sendtoetodescription	"=>$this->input->post("description"),
	  "sendtoetodate"=>$this->input->post("date"),
	
	
	  );
	   if(insert_data("tbl_sendtoeto",$data))
	   {
     update_where("tbl_vechile",array("vechiclestatus"=>5),"vechileid",$this->input->post("vechicle_id"));
	   }    
   }
   function sendbackbyeto()
   {   echo Modules::run("Auth/check_login","sendbackbyeto");
	    if(isset($_FILES['userfile']))
    {
        $document = explode('.', $_FILES['userfile']['name']);
        $new_name = rand().'.'.$document[1];
       // $destination = 'vendor_images'.$new_name;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/'.$new_name);
		
       
    }
	  $data=array(
	  "	confiscationorderno"=>$this->input->post("orderno"),
    "vechicle_id"=>$this->input->post("vechicle_id"),
	  "confiscationordetime"=>$this->input->post("time"),
	  
	  "confiscationdescription"=>$this->input->post("description"),
	  "confiscationorderdate"=>$this->input->post("date"),
	  
	  "	upload"=>$new_name  
	  );
	   if(insert_data("tbl_sendbacktowarehouse",$data))
	   {
     update_where("tbl_vechile",array("vechiclestatus"=>6),"vechileid",$this->input->post("vechicle_id"));
	   }    
   }
   function warehouse_confiscations_list()
   {  
	   $this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_datatables_confiscated_warehouse();  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                $sub_array[] = $row->username;  
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->districtname;  
                $sub_array[] = $row->mobilesquadno;
                $sub_array[] = $row->vechileregistrationno;     
                
                $sub_array[] = '<a href="Vechicles/show_vechicle_report/'.$row->vechileid.'"  class="btn bg-indigo waves-effect">Details</a>';  
                $sub_array[] = '<form id="aknoweledge"> <input type="hidden" name="vechicle_id" id="vechicle_id" value="'.$row->vechileid.'"><button type="submit" id="submit" name="submit" class="btn btn-success waves-effect m-r-20 m-r-1">Aknoweledge</button></form>';  
                  
                $data[] = $sub_array;  
           }     
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),    
                "recordsTotal"          =>      $this->Mdl_vechicles->get_all_data_confiscated_warehouse(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_filtered_data_confiscated_warehouse(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 
   }
function warehouse_confiscations()
   {    echo Modules::run("Auth/check_login","warehouse_confiscations");
	    $data['module']="Vechicles";
   	     $data['file']="confiscated_vechicle";
   	     $data['name'] = "";
		 
			echo Modules::run("Template/main",$data);
   }
   
function warehouse_confiscations_acknowledge()
{   echo Modules::run("Auth/check_login","warehouse_confiscations_acknowledge");
	update_where("tbl_vechile",array("vechiclestatus"=>9),"vechileid",$this->input->post("vechicle_id"));
}
function allot_list()
{   
	$this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_datatables_allot_vechicle();  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                $sub_array[] = $row->username;  
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->districtname;  
                $sub_array[] = $row->mobilesquadno;
                $sub_array[] = $row->vechileregistrationno;   
                
                $sub_array[] = '<a href="Vechicles/show_vechicle_report/'.$row->vechileid.'"  class="btn bg-indigo waves-effect">Details</a>';  
                $sub_array[] = '<button type="button" class="btn btn-success waves-effect m-r-20 m-r-1" id="show_val'.$row->vechileid.'"  onclick="clicked(this);" custom="'.$row->vechileid.'">Allot</button>'; 
  $sub_array[] = '<form id="return"> <input type="hidden" name="vechicle_id" id="vechicle_id" value="'.$row->vechileid.'"><button type="submit" id="submit" name="submit" class="btn bg-green waves-effect m-r-20 m-r-1">Return to Owner</button></form>';  				
                  
                $data[] = $sub_array;  
           }     
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),    
                "recordsTotal"          =>      $this->Mdl_vechicles->get_all_data_allot_vechicle(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_filtered_data_allot_vechicle(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 
	
}
function warehouse_allot_vechicle()  
{ echo Modules::run("Auth/check_login","warehouse_allot_vechicle");
	 $data['module']="Vechicles";
   	     $data['file']="allotment_vechicle";
   	     $data['name'] = "Ready For Allotment";
		 
			echo Modules::run("Template/main",$data);
}
function allot_vechicle_form()
{   echo Modules::run("Auth/check_login","allot_vechicle_form");
	 if(isset($_FILES['userfile']))
    {
        $document = explode('.', $_FILES['userfile']['name']);
        $new_name = rand().'.'.$document[1];
       // $destination = 'vendor_images'.$new_name;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/'.$new_name);
		
       
    }
	  $data=array(
	  "	departmentname"=>$this->input->post("departmentname"),
    "vechicle_id"=>$this->input->post("vechicle_id"),
	  "designation"=>$this->input->post("designation"),
	  
	  "authorisedby"=>$this->input->post("authorisedby"),
	  "description"=>$this->input->post("description"),
	  
	  "	upload"=>$new_name  
	  );
	   if(insert_data("tbl_vechile_allotment",$data))
	   {
     update_where("tbl_vechile",array("vechiclestatus"=>7),"vechileid",$this->input->post("vechicle_id"));
	   }    
}
function alloted_vechicles_list()
{ 
	$this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_datatables_alloted_vechicle();  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                $sub_array[] = $row->username;  
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->districtname;  
                $sub_array[] = $row->mobilesquadno;
                $sub_array[] = $row->vechileregistrationno;   
                
                $sub_array[] = '<a href="Vechicles/show_vechicle_report/'.$row->vechileid.'"  class="btn bg-indigo waves-effect">Details</a>';  
                $sub_array[] = '<form id="received"> <input type="hidden" name="vechicle_id" id="vechicle_id" value="'.$row->vechileid.'"><button type="submit" id="submit" name="submit" class="btn btn-success waves-effect m-r-20 m-r-1">Receive</button></form>';    
                  
                $data[] = $sub_array;  
           }     
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),    
                "recordsTotal"          =>      $this->Mdl_vechicles->get_all_data_alloted_vechicle(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_filtered_data_alloted_vechicle(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 
	
	
}
function alloted_vechicles()
{   echo Modules::run("Auth/check_login","alloted_vechicles");
	 $data['module']="Vechicles";
   	     $data['file']="alloted_vechicle";
   	     $data['name'] = "Alloted Vechicles";
		 
			echo Modules::run("Template/main",$data);
}
function receive_vechicle()
{  echo Modules::run("Auth/check_login","receive_vechicle");
	update_where("tbl_vechile",array("vechiclestatus"=>9),"vechileid",$this->input->post("vechicle_id"));
}
function return_vechicle()
{  echo Modules::run("Auth/check_login","return_vechicle");
	update_where("tbl_vechile",array("vechiclestatus"=>10),"vechileid",$this->input->post("vechicle_id"));
}
function returned_vechicles_list()
{  
	$this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_datatables_returned_vechicle();  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                $sub_array[] = $row->username;  
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->districtname;  
                $sub_array[] = $row->mobilesquadno;
                $sub_array[] = $row->vechileregistrationno;   
                

                $sub_array[] = '<a href="Vechicles/show_specific_vechicle/'.$row->vechileid.'"  class="btn bg-indigo waves-effect">Details</a>';  
                $sub_array[] = '<form id="received"> <input type="hidden" name="vechicle_id" id="vechicle_id" value="'.$row->vechileid.'"><button type="submit" id="submit" name="submit" class="btn bg-green waves-effect m-r-20 m-r-1">Receive</button></form>';    
                  
                $data[] = $sub_array;  
           }     
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),    
                "recordsTotal"          =>      $this->Mdl_vechicles->get_all_data_returned_vechicle(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_filtered_data_returned_vechicle(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 
	
	
}
function returned_vechicles()
{  echo Modules::run("Auth/check_login","returned_vechicles");
	$data['module']="Vechicles";
   	     $data['file']="returned_vechicle";
   	     $data['name'] = " ";
		 
			echo Modules::run("Template/main",$data);
	   
}
function checkedin_details($id){
	echo Modules::run("Auth/check_login","checkedin_details");
	$data['module']="Vechicles";  
   	 $data['file']="checkedin_details";
   	 $data['name'] = " Vechicle  Report";   
	 	 $data['all_vechicle_specific'] = $this->db->query("SELECT * FROM `tbl_vechile` 
		 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vechile.district_id 
		LEFT JOIN tbl_vechile_make on tbl_vechile_make.makeid=tbl_vechile.vechicle_make 
		 LEFT JOIN tbl_vechile_make_sub on tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model
		 LEFT JOIN tbl_vechile_model on tbl_vechile_model.modelid = tbl_vechile.vechiclemodelyear 
		 LEFT JOIN tbl_fsl_report on tbl_fsl_report.vechicle_id = tbl_vechile.vechileid 
		 LEFT JOIN tbl_vechile_formb on tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid 	
		 LEFT JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id where vechileid ={$id}"); 
		  $data['all_vechicle_images'] =  $this->db->query("SELECT * FROM `tbl_vechile_images` 
		  where vechile_id ={$id}");
		    $data['all_vechicle_accesories'] =  $this->db->query("SELECT * FROM `tbl_accesories` 
		 join tbl_vechile_accessories on tbl_vechile_accessories.accessories_id=tbl_accesories.accessoryid
		 where tbl_vechile_accessories.vechicle_id ={$id}");
		  echo Modules::run("Template/main",$data);
}
  
  
  function Eto_seized_vechicle_list()
  { 
$user_id=$this->session->userdata("user_id");
	$returneddistrict = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
	$userdistrict="";
	foreach($returneddistrict as $district){ $userdistrict=$district->district_id; }
			$this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_sized_datatables($userdistrict);  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                 
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->siezedtime;  
                $sub_array[] = $row->formserialno;  
                $sub_array[] = $row->makename; 
                $sub_array[] = $row->submakename; 
                $sub_array[] = $row->seizedtype; 
                $sub_array[] = $row->vechileregistrationno;   
                $sub_array[] = '<a href="Vechicles/show_specific_vechicle/'.$row->vechileid.'"  class="btn bg-indigo waves-effect">Details</a>';  
                $sub_array[] = '';  
                   
                  
                $data[] = $sub_array;  
           }     
		  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),    
                "recordsTotal"          =>      $this->Mdl_vechicles->get_sized_all_data(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_sized_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 
  }
  
  function show_history_vechicles()
   {  echo Modules::run("Auth/check_login","show_history_vechicles");
	     $data['module']="Vechicles";
   	     $data['file']="show_vechicles_history";
   	     $data['name'] = "";
		 
	
  
   	 echo Modules::run("Template/main",$data);
   }
   
   function confiscated_history_list()
   {
	   $user_id=$this->session->userdata("user_id");
	$returneddistrict = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
	$userdistrict="";
	foreach($returneddistrict as $district){ $userdistrict=$district->district_id; }
			$this->load->model("Mdl_vechicles");  
           $fetch_data = $this->Mdl_vechicles->make_confiscated_datatables($userdistrict);  
	    $data = array();  
           foreach($fetch_data as $row)  
           { 
				$sub_array = array();   
                 
                $sub_array[] = $row->datesiezeddate;  
                $sub_array[] = $row->siezedtime;  
                $sub_array[] = $row->formserialno;  
                $sub_array[] = $row->makename; 
                $sub_array[] = $row->submakename; 
                $sub_array[] = $row->seizedtype; 
                $sub_array[] = $row->vechileregistrationno;   
                $sub_array[] = '<a href="Vechicles/show_vechicle_report/'.$row->vechileid.'"  class="btn bg-indigo waves-effect">Details</a>';  
                $sub_array[] = '';  
                   
                  
                $data[] = $sub_array;  
           }     
		  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),    
                "recordsTotal"          =>      $this->Mdl_vechicles->get_all_data_confiscated(),  
                "recordsFiltered"     =>     $this->Mdl_vechicles->get_confiscated_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output); 
	   
   }
   function confiscated_history()
   {echo Modules::run("Auth/check_login","confiscated_history");
	   $data['module']="Vechicles";
   	     $data['file']="eto_confiscated_vechicle";
   	     $data['name'] = "";
		 
			echo Modules::run("Template/main",$data);
   }
   function sendtomra()
   {echo Modules::run("Auth/check_login","sendtomra");
	    if(isset($_FILES['userfile']))
    {
        $document = explode('.', $_FILES['userfile']['name']);
        $new_name = rand().'.'.$document[1];
       // $destination = 'vendor_images'.$new_name;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/'.$new_name);
		
       
    }
	  $data=array(
	  "letterno"=>$this->input->post("letterno"),
    "vehicle_id"=>$this->input->post("vechicle_id"),
	  "mratime"=>$this->input->post("time"),
	  
	  "Description"=>$this->input->post("description"),
	  "mradate"=>$this->input->post("date"),
	  "mracheckin"=>1,
	  "	upload"=>$new_name  
	  );
	   if(insert_data("tbl_mra_report",$data))
	   {
     update_where("tbl_vechile",array("vechiclestatus"=>11),"vechileid",$this->input->post("vechicle_id"));
	   }
   }
   
   function mra_recieved()
   {
	 echo Modules::run("Auth/check_login","mra_recieved");
	   $data['module']="Vechicles";
   	     $data['file']="mra_received";
   	     $data['name'] = "";
		  $user_id=$this->session->userdata("user_id");
$returneddistrict = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
	$userdistrict="";
	foreach($returneddistrict as $district){ $userdistrict=$district->district_id; }
   	 $data['seized_vechicles'] = $this->db->query("
SELECT mobilesquadno,username,districtname,seizedtype
		 ,datesiezeddate,siezedtime,formserialno,seizedlocationlat,drivername
,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
 ,submakename,modelyear,vehicletype,drivercnicno
,drivermobileno,driveraddress,vechileid,   
vechileownername,vechileownercnic,vechileownermobileno,tbl_vechile_formb.description,tbl_vechile_formb.date,tbl_vechile_formb.time,
tbl_vechile_formb.lat,tbl_vechile_formb.long,tbl_vechile_formb.form_bno,
bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription
 FROM `tbl_vechile` 
		 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vechile.district_id 
		LEFT JOIN tbl_vechile_make on tbl_vechile_make.makeid=tbl_vechile.vechicle_make 
		 LEFT JOIN tbl_vechile_make_sub on tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model
		 LEFT JOIN tbl_vechile_model on tbl_vechile_model.modelid = tbl_vechile.vechiclemodelyear	
		 LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vechile.build_id	
		 LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vechile.vechilewheels	
		 LEFT JOIN tbl_color on tbl_color.colorid = tbl_vechile.color_id	
		 LEFT JOIN tbl_vechile_formb on tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid	
		 LEFT JOIN tbl_vechile_seized on tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category	
		 LEFT JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id
		 where vechiclestatus=12 and district_id={$userdistrict} order by vechileid DESC
"); 
			echo Modules::run("Template/main",$data);
   }
   function mra_dispatched()
   {   echo Modules::run("Auth/check_login","mra_dispatched");
	     $data['module']="Vechicles";
   	     $data['file']="mra_dispatched";
   	     $data['name'] = "";
		  $user_id=$this->session->userdata("user_id");
$returneddistrict = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
	$userdistrict="";
	foreach($returneddistrict as $district){ $userdistrict=$district->district_id; }
   	 $data['seized_vechicles'] = $this->db->query("
SELECT mobilesquadno,username,districtname,seizedtype
		 ,datesiezeddate,siezedtime,formserialno,seizedlocationlat,drivername
,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
 ,submakename,modelyear,vehicletype,drivercnicno
,drivermobileno,driveraddress,vechileid,   
vechileownername,vechileownercnic,vechileownermobileno,tbl_vechile_formb.description,tbl_vechile_formb.date,tbl_vechile_formb.time,
tbl_vechile_formb.lat,tbl_vechile_formb.long,tbl_vechile_formb.form_bno,
bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription
 FROM `tbl_vechile` 
		 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vechile.district_id 
		LEFT JOIN tbl_vechile_make on tbl_vechile_make.makeid=tbl_vechile.vechicle_make 
		 LEFT JOIN tbl_vechile_make_sub on tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model
		 LEFT JOIN tbl_vechile_model on tbl_vechile_model.modelid = tbl_vechile.vechiclemodelyear	
		 LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vechile.build_id	
		 LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vechile.vechilewheels	
		 LEFT JOIN tbl_color on tbl_color.colorid = tbl_vechile.color_id	
		 LEFT JOIN tbl_vechile_formb on tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid	
		 LEFT JOIN tbl_vechile_seized on tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category	
		 LEFT JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id
		 where vechiclestatus=11 and district_id={$userdistrict} order by vechileid DESC
"); 
			echo Modules::run("Template/main",$data);
   }
   function mra_receive_form()
   {  echo Modules::run("Auth/check_login","mra_receive_form");
	     if(isset($_FILES['userfile']))
    {
        $document = explode('.', $_FILES['userfile']['name']);
        $new_name = rand().'.'.$document[1];
       // $destination = 'vendor_images'.$new_name;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/'.$new_name);
		
       
    }
	  $data=array(
	  "letterno"=>$this->input->post("letterno"),
    "vehicle_id"=>$this->input->post("vechicle_id"),
	  "mratime"=>$this->input->post("time"),
	  
	  "Description"=>$this->input->post("description"),
	  "mradate"=>$this->input->post("date"),
	  "mracheckout"=>1,
	  "	upload"=>$new_name  
	  );
	   if(insert_data("tbl_mra_report",$data))
	   {
     update_where("tbl_vechile",array("vechiclestatus"=>12),"vechileid",$this->input->post("vechicle_id"));
	   }
   }
   
   function Release_vehicle()
   {  echo Modules::run("Auth/check_login","Release_vehicle");
	      if(isset($_FILES['userfile']))
    {
        $document = explode('.', $_FILES['userfile']['name']);
        $new_name = rand().'.'.$document[1];
       // $destination = 'vendor_images'.$new_name;
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/'.$new_name);
		
       
    }
	  $data=array(
	  "letterno"=>$this->input->post("letterno"),
    "vehicle_id"=>$this->input->post("vechicle_id"),
	  "releasedate"=>$this->input->post("time"),
	  
	  "receivername"=>$this->input->post("receivername"),
	  "receivercnic"=>$this->input->post("receivercnic"),
	  "receivermobileno"=>$this->input->post("receivermobileno"),
	  "description"=>$this->input->post("description"),
	  "releasetime"=>$this->input->post("date"),
	    
	  "	upload"=>$new_name  
	  );
	   if(insert_data("tbl_released_vehicle",$data))
	   {
     update_where("tbl_vechile",array("vechiclestatus"=>10),"vechileid",$this->input->post("vechicle_id"));
	   }
   }
}


?>