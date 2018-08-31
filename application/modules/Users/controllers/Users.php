<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller 
{

	function show_users()
	{
		 
  
	 $data['module']="Users";
   	 $data['file']="show_all_users";
   	 $data['name'] = "All Users";
   	 $data['all_users'] = custom_query("select * from tbl_user
   	 	join user_roles on user_roles.user_id = tbl_user.userid 
   	 	join roles on  roles.id = user_roles.role_id ");

   	 echo Modules::run("Template/main",$data);
   	
	}

	function add_users()
	{
		if($this->input->post())
		{
			$data=array("username"=>$this->input->post("username"),
				"password"=>md5($this->input->post("password")),
				"usermobile"=>$this->input->post("usermobile"),
				"usercnic"=>$this->input->post("usercnic"),
				
		);
		//print_r($data);
		
			$last_id=get_last_insert("tbl_user",$data);

		insert_data("user_roles",array("user_id"=>$last_id,"role_id"=>$this->input->post("userrole")));
		insert_data("tbl_user_district",array("user_id"=>$last_id,"district_id"=>$this->input->post("userdistrict")));

		}else{
			$data['module']="Users";
   	 $data['file']="add_users";
   	 $data['name'] = "Add Users";
   	$data['all_roles'] =get_all("roles");
   	$data['all_districts'] =get_all("tbl_district");

   	 echo Modules::run("Template/main",$data);
		}
	}
	
	function edit_user($user_id)
	{
		
		if($this->input->post())
		{
			$data=array("usermobile"=>$this->input->post("usermobile"),
				"usercnic"=>$this->input->post("usercnic"),
				"username"=>$this->input->post("username"));
			$last_id=get_last_insert("tbl_user",$data);
            update_where("tbl_user",$data,"userid",$user_id);
            update_where("user_roles",array("user_id"=>$user_id,"role_id"=>$this->input->post("userrole")),"user_id",$user_id);
		   insert_data("tbl_user_district",array("user_id"=>$user_id,"district_id"=>$this->input->post("userdistrict")));

		}else{
			$data['module']="Users";
   	 $data['file']="edit_users";
   	 $data['name'] = "Edit Users";
   	$data['all_roles'] =get_all("roles");
   	$data['specific_user'] = get_where("tbl_user",array("userid"=>$user_id),"*","row");
   	$data['user_role'] = get_where("user_roles",array("user_id"=>$user_id),"*","row");
   	$data['all_districts'] =get_all("tbl_district");
     $data['user_district'] = custom_query("select * from tbl_user_district where user_id={$user_id} order by udid DESC limit 0,1");
       echo Modules::run("Template/main",$data);
		}
	}
	
	
	
	
	
}
 

?>