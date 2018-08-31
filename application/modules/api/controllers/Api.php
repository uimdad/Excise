<?php  
class APi extends MX_Controller{
	
/**
** @param usercnic,password
**@return api_token,userid,account status
**/	
	function login()
	{
		$data=array("usercnic"=>$this->input->post("usercnic"),
					"password"=>md5($this->input->post("password")));
		$data_select="*";
		$login_status =get_num("tbl_user",$data,$data_select);
		if(!empty($this->input->post("usercnic")) && !empty($this->input->post("password")))
		{
			if( $login_status > 0 )
			{
					$selected_data = "api_token,userid,isactive,usermobile,username";
					$select_data= "role_id";
					$result = get_where("tbl_user",$data,$selected_data,"array");  
          
					$user_id =$result[0]['userid'];
					$role = get_where("user_roles",array("user_id"=>$user_id),$select_data,"array"); 
					$returneddistrict = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
					$userdistrict="";
					foreach($returneddistrict as $district){ $userdistrict=$district->district_id; }			
					if($result[0]['isactive'] == 1)
					{  
						echo json_encode(array("success"=>1,"logindata"=>$result,"role"=>$role[0]['role_id'],"district_id"=>$userdistrict));
				
						}else{
							echo json_encode(array("success"=>2,"message"=>"Your Account is Disabled"));
					}
			
			}
			else
			{
			echo json_encode(array("success"=>0,"message"=>"Password or Username Wrong"));
			
			}
		}
		else
		{      
				echo json_encode(array("success"=>0,"message"=>"Password or Username Should not be Empty"));

		
		}
		
		
	}
	
	
/**
**@return all districts
**/
function get_districts() 
{
		$districts =get_all_order("tbl_district","districtname","ASC");
		
		echo json_encode(array("success"=>1,"districts"=>$districts));
		
}
	
/**
** @return all vechile_seized categories
**/
function get_seized_vechicle()
{
	$seized_vechicle =get_all("tbl_vechile_seized");
		
		echo json_encode(array("success"=>1,"seized_vechicle"=>$seized_vechicle));
		
}  





/**
** @return engine capacity
**/
function get_engine_capacity()
{
	$tbl_engine_type =get_all("tbl_engine_capacity");

	echo json_encode(array("success"=>1,"engine_type"=>$tbl_engine_type));	
}
/**
** @return All colors
**/
function get_color()
{
	$tbl_color =get_all("tbl_color");

	echo json_encode(array("success"=>1,"colors"=>$tbl_color));	
}
/**
** @return body build
**/
function get_body_build()
{
	$tbl_bodybuild =get_all("tbl_bodybuild");

	echo json_encode(array("success"=>1,"bodybuild"=>$tbl_bodybuild));	
}
	
	
/*
** @param  
**/
	function post_seized_vechicle()
	{
		$seized_category = array();
		
	foreach($this->input->post("vehicleseize_category") as $cheked)
	{
		$seized_category[] = $cheked;
	}
	$comma_separated = implode(",", $seized_category);
	
		 $data=array("formserialno"=>$this->input->post("formserialno"),
				"vehicleseize_category"=>$comma_separated,
				"district_id"=>$this->input->post("district_id"),
				"drivername"=>$this->input->post("drivername"),
				"drivercnicno"=>$this->input->post("drivercnicno"),
				"drivermobileno"=>$this->input->post("drivermobileno"),
				"driveraddress"=>$this->input->post("driveraddress"),
				"vechileownername"=>$this->input->post("vechileownername"),
				"vechileownercnic"=>$this->input->post("vechileownercnic"),
				"vechileownermobileno"=>$this->input->post("vechileownermobileno"),
				"mobilesquadno"=>$this->input->post("mobilesquadno"),
				"chasisno"=>$this->input->post("chasisno"),
				"engineno"=>$this->input->post("engineno"),
				"vechileregistrationno"=>$this->input->post("vechileregistrationno"),
				"vechicle_make"=>$this->input->post("vechicle_make"),
				"vehicle_model"=>$this->input->post("vehicle_model"),                       
				"vechiclemodelyear"=>$this->input->post("vechiclemodelyear"),
				"vehicletype"=>$this->input->post("vehicletype"),
				"build_id"=>$this->input->post("build_id"),
				"color_id"=>$this->input->post("color_id"),
				"transmission"=>$this->input->post("transmission"),
				"assembely"=>$this->input->post("assembely"),
				"vechilewheels"=>$this->input->post("vechilewheels"),    
				"enginetype"=>$this->input->post("enginetype"), 
				"siezedtime"=>$this->input->post("siezedtime"),
				"datesiezeddate"=>$this->input->post("datesiezeddate"),
				"vehicleengine_capcaity"=>$this->input->post("vehicleengine_capcaity"),
				"mileage"=>$this->input->post("mileage"),
				"vechicledescription"=>$this->input->post("vechicledescription"),
				"user_id"=>$this->input->post("user_id"), 
				"seizedlocationlong"=>$this->input->post("seizedlocationlong"),
				"seizedlocationlat"=>$this->input->post("seizedlocationlat") 
				);
				
					
				$last_vechile_id = get_last_insert("tbl_vechile",$data);     
				        
			if($last_vechile_id){    
				// echo json_encode(array("success"=>1,"vechicle_siezed_message"=>"Vechicle Registerd Successfully"));
			
			foreach($this->input->post("access") as $access)
			{
				insert_data("tbl_vechile_accessories",array("vechicle_id"=>$last_vechile_id,"accessories_id"=>$access));
		
			
			}
        if(isset($_FILES['files'])){  
                   $path = './uploads';
                   
                   $files = $_FILES['files']; 
                   $uploads = $this->upload_files($path,$files);
				  
				   
                   // end upload process
                   foreach($uploads as $upload => $value){
                       
					
					   insert_data("tbl_vechile_images",array("vechile_id"=>$last_vechile_id,"imagepath"=>$value));
					   
                   }
				echo json_encode(array(array("success"=>1)));
		  } 
		
			}
		  else{
			    echo json_encode(array(array("success"=>0)));
		  }
				   
					
		
	}
	function seized_vechicle_user()
	{
		
		$tbl_seized =get_where("tbl_vechile",array("user_id"=>$this->input->post("user_id")),"*","array");

	echo json_encode(array("seized_vechile"=>$tbl_seized,"success"=>1));
	}
	
	public function upload_files($path,$files)
   {
       $config = array(
           'upload_path'   => $path,
           'allowed_types' => 'jpg|gif|png',
           'overwrite'     => 1,                      
       );

       $this->load->library('upload', $config);

       $images = array();

       foreach ($files['name'] as $key => $image) {
           $_FILES['images[]']['name']= $files['name'][$key];
           $_FILES['images[]']['type']= $files['type'][$key];
           $_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
           $_FILES['images[]']['error']= $files['error'][$key];
           $_FILES['images[]']['size']= $files['size'][$key];
 $fileName = $image;

           $images[] = $fileName;

           $config['file_name'] = $fileName;
           $this->upload->initialize($config);

           if ($this->upload->do_upload('images[]')) {
               $this->upload->data();
           } else {
               return false;
           }
       }

       return $images;
   }
   
   
   function get_assecories()
   {
	   //$assecories=get_all("tbl_accesories");   
	    $assecories=custom_query("SELECT accessoryname,accessoryid FROM tbl_accesories");
	   if($assecories)  
	   {
		   echo json_encode(array("assecories"=>$assecories,'success'=>1));
	   }                      
   }        
   
   function get_proceeded_vechicles()
   {
	   $proceeded_vechicles = custom_query("SELECT * FROM `tbl_vechile` JOIN tbl_district on tbl_district.districtid = tbl_vechile.district_id
JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id where vechiclestatus = 1 order by vechileid DESC;");
if($proceeded_vechicles)
{
	echo json_encode(array("proceeded_vechicles"=>$proceeded_vechicles,"success"=>1));
}else{
	echo json_encode(array("success"=>0));
}
   }
   
   
   function get_make()
   {
	   $make=get_all("tbl_vechile_make");
	   if($make)
	   {
		   echo json_encode(array("make"=>$make,"success"=>1));
	   }
	   
   }
   function get_model()
   {
	   $model=get_all("tbl_vechile_make_sub");
	   if($model)
	   {
		   echo json_encode(array("model"=>$model,"success"=>1));
	   }
   }
   function get_model_year()
   {
	   $model_year=get_all("tbl_vechile_model");
	   if($model_year)
	   {
		   echo json_encode(array("model_year"=>$model_year,"success"=>1));
	   }
	   
   }
   function get_wheels()
   {
	   $wheels=get_all("tbl_wheels");
	   if($wheels)
	   {
		   echo json_encode(array("wheel_number"=>$wheels,"success"=>1));
		   //echo json_encode(array("wheel_number"=>array(array("success"=>1))));
	   }
	   
   }
   
   function post_formb()
   {
	   $vechicle_id=$this->input->post("vechicle_id");
	   $data=array("description"=>$this->input->post("description"),
				"date"=>$this->input->post("date"),
				"time"=>$this->input->post("time"),
				"lat"=>$this->input->post("lat"),
				"long"=>$this->input->post("long"),
				"user_id"=>$this->input->post("user_id"),
				"vechicle_id"=>$vechicle_id,
				"form_bno"=>$this->input->post("form_bno"));
				update_where("tbl_vechile",array("vechiclestatus"=>3),"vechileid",$vechicle_id);
			
					
				
				   
				 if(isset($_FILES['files'])){  
                   $path = './uploads';
                   
                   $files = $_FILES['files'];     
                   $uploads = $this->upload_files($path,$files);
				  
				   if(insert_data("tbl_vechile_formb",$data))
				   {
                   // end upload process
                   foreach($uploads as $upload => $value){
                          
					
					   insert_data("tbl_warehouse_images",array("vechicle_id"=>$vechicle_id,"imagepath"=>$value));
					   
                   }
				   update_where("tbl_vechile",array("vechiclestatus"=>3),"vechileid",$vechicle_id);
				   echo json_encode(array(array("success"=>1)));
				   }
				 }else{
				echo json_encode(array(array("success"=>0)));
				}
				

}
function Eto_approved_vechicles()
{
	 
		  $result = $this->db->query("SELECT mobilesquadno,username,districtname,seizedtype
		 ,datesiezeddate,siezedtime,formserialno,seizedlocationlat,drivername
,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
 ,submakename,modelyear,vehicletype,drivercnicno
,drivermobileno,driveraddress,
vechileownername,vechileownercnic, vechileownermobileno,vechileid,
bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription,
approved_date,approved_time
 FROM `tbl_vechile` 
		 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vechile.district_id 
		LEFT JOIN tbl_vechile_make on tbl_vechile_make.makeid=tbl_vechile.vechicle_make 
		 LEFT JOIN tbl_vechile_make_sub on tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model
		 LEFT JOIN tbl_vechile_model on tbl_vechile_model.modelid = tbl_vechile.vechiclemodelyear	
		 LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vechile.build_id	
		 LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vechile.vechilewheels	
		 LEFT JOIN tbl_eto_approved_date on tbl_eto_approved_date.vechicle_id = tbl_vechile.vechileid	
		 LEFT JOIN tbl_color on tbl_color.colorid = tbl_vechile.color_id	
		 LEFT JOIN tbl_vechile_seized on tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category	
		 LEFT JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id where vechiclestatus=1");
		 $seized_vechicles_data= $result->result(); 
		 $id=0;
		  $data=array();
		foreach($seized_vechicles_data as $seized){
			  $id=$seized->vechileid;
		
			    $results =  $this->db->query("SELECT * FROM `tbl_vechile_images` 
		  where vechile_id ={$id}");   
		  $all_images=$results->result();
		  $seized->vehicle_images= $all_images;
		  		    $data =  $this->db->query("SELECT accessoryname,accessories_id FROM `tbl_accesories` 
		 join tbl_vechile_accessories on tbl_vechile_accessories.accessories_id=tbl_accesories.accessoryid
		 where tbl_vechile_accessories.vechicle_id ={$id}");
		 $vehicle_accessories= $data->result();
		 $seized->vehicle_accessories= $vehicle_accessories;
		 }
	        
		

		
		  
		
		
        
		 
		   /* $all_data=array_merge(array("seized_data"=>$seized_vechicles_data,"vechicle_image"=>$all_images,"accessories"=>$all_accessories)); */
		  
		  
	
		 echo json_encode(array("seized_vechicles_data"=> $seized_vechicles_data ,"success"=>1));       
}
function inspector_seized_vechicles()   
{
	$result = $this->db->query("SELECT mobilesquadno,username,districtname,seizedtype
		 ,datesiezeddate,siezedtime,formserialno,seizedlocationlat,drivername
,seizedlocationlong,chasisno,engineno,vechileregistrationno,makename
 ,submakename,modelyear,vehicletype,drivercnicno
,drivermobileno,driveraddress,
vechileownername,vechileownercnic,vechileownermobileno,vechileid,
bodybuildname,colorname,transmission,assembely,wheelnumber,enginetype,vehicleengine_capcaity,mileage,vechicledescription,
approved_date,approved_time
 FROM `tbl_vechile` 
		 LEFT JOIN tbl_district on tbl_district.districtid = tbl_vechile.district_id 
		LEFT JOIN tbl_vechile_make on tbl_vechile_make.makeid=tbl_vechile.vechicle_make 
		 LEFT JOIN tbl_vechile_make_sub on tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model
		 LEFT JOIN tbl_vechile_model on tbl_vechile_model.modelid = tbl_vechile.vechiclemodelyear	
		 LEFT JOIN tbl_bodybuild on tbl_bodybuild.bodybuild = tbl_vechile.build_id	
		 LEFT JOIN tbl_wheels on tbl_wheels.wheelid = tbl_vechile.vechilewheels	
		 LEFT JOIN tbl_eto_approved_date on tbl_eto_approved_date.vechicle_id = tbl_vechile.vechileid	
		 LEFT JOIN tbl_color on tbl_color.colorid = tbl_vechile.color_id	
		 LEFT JOIN tbl_vechile_seized on tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category	
		 LEFT JOIN tbl_user on tbl_user.userid=tbl_vechile.user_id where vechiclestatus=0");
		 $seized_vechicles_data= $result->result(); 
		 $id=0;
		  $data=array();
		foreach($seized_vechicles_data as $seized){
			  $id=$seized->vechileid;
		
			    $results =  $this->db->query("SELECT * FROM `tbl_vechile_images` 
		  where vechile_id ={$id}");   
		  $all_images=$results->result();
		  $seized->vehicle_images= $all_images;
		  		    $data =  $this->db->query("SELECT * FROM `tbl_accesories` 
		 join tbl_vechile_accessories on tbl_vechile_accessories.accessories_id=tbl_accesories.accessoryid
		 where tbl_vechile_accessories.vechicle_id ={$id}");
		 $vehicle_accessories= $data->result();
		 $seized->vehicle_accessories= $vehicle_accessories;
	
		}
		 echo json_encode(array("seized_data"=>$seized_vechicles_data,"success"=>1));
}

}
       

  















?>