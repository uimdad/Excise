<?php 

class Auth extends MX_Controller{

function index()
{
	parent::__construct();
	$this->load->view("singin");
}
function auth_check()
{
	$username=$this->input->post("username");
	$password=$this->input->post("password");

	

	
	if($this->can_login($username,$password))
	{
		$redirect_fun=$this->db->where(array("role_id"=> $this->session->userdata("user_role")))->get("tbl_dashboard");
		$redirect_result = $redirect_fun->row();
	
		$redirect= $redirect_result->dasboard_controller."/".$redirect_result->dashboard_function;
		
		
				redirect($redirect);
	}else{

$this->session->set_flashdata("username",$result_ar[0]['username']);
$this->session->set_flashdata('error', '<div class="alert bg-red alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
											      Username Or password Wrong
											</div>');
redirect("Auth/index");
}
	}


private function can_login($username,$password)
{
	$result=$this->db->where(array("username"=>$username,"password"=>md5($password)))->get("tbl_user");
	
	if($result->num_rows() > 0)
	{ 	 $result_ar=$result->result_array();

		$roles=$this->db->where(array("user_id"=>$result_ar[0]['userid']))->get("user_roles");
		

		$role_id = $roles->result_array();
		
		 $this->session->set_userdata("username",$username);
		 $this->session->set_userdata("user_id",$result_ar[0]['userid']);
		 $this->session->set_userdata("user_role",$role_id[0]['role_id']);


		return true;
	}else{
		return false;
	}
}

function check_login($fun)
{    $data = select_data_join("acos","acl","acl.aco_id=acos.id",array("role_id"=>$this->session->userdata("user_role")));
    
	  $bol = "";
	
	if($this->session->userdata("user_role")== "" || $this->session->userdata("user_id") == ""  )
	{
      redirect("Auth/index");
	}else{
	foreach($data as $a ):
	
	 if($fun === $a['method'])
	 {
		 $bol = "true";
		 
		 break;
		 
	 }else{
		 $bol="false";
	 }
	 
endforeach;  



if($bol === "false"){
$redirect_fun=$this->db->where(array("role_id"=> $this->session->userdata("user_role")))->get("tbl_dashboard");
		$redirect_result = $redirect_fun->row();
	
		$redirect= $redirect_result->dasboard_controller."/".$redirect_result->dashboard_function;
		
		$this->session->set_userdata("msg",'<div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                               You are Not Authorized to access this
                            </div>');
							
				redirect($redirect);
				echo "not ";
}
	}
}
function logout()
{
	$this->session->unset_userdata('username');
	$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_role');
	$this->session->sess_destroy();

redirect("Auth/index");

}

function change_pass()
{
	$password=$this->input->post("oldpass");
	$new_pass=$this->input->post("newpass");
	$result=$this->db->where(array("password"=>$password))->get("users");
	if($result->num_rows() > 0)
	{  $this->db->where(array("password"=>$password));
$this->db->update('tbl_users',array("password"=>$new_pass)); 
	echo "Password Change successfully"; 
	}else{
		echo "Password Not Available";
	}
}
function Eto_dashboard()
{
	$data['module']="Auth";
   	     $data['file']="Eto_dashboard";
   	     $data['name'] = "Eto dashboard";

			echo Modules::run("Template/main",$data);
}
function Dg_dashboard()
{
	$data['module']="Auth";
   	     $data['file']="Dg_dashboard";
   	     $data['name'] = "";

			echo Modules::run("Template/main",$data);
}
function warehouse_dashboard()
{
	$data['module']="Auth";
   	     $data['file']="warehouse_dashboard";
   	     $data['name'] = "";

			echo Modules::run("Template/main",$data);
}
function secretary_dashboard()
{
	$data['module']="Auth";
   	     $data['file']="secretary_dashboard";
   	     $data['name'] = "";

			echo Modules::run("Template/main",$data);
}
function super_admin_dashboard()
{
	$data['module']="Auth";
   	     $data['file']="super_admin_dashboard";
   	     $data['name'] = "";

			echo Modules::run("Template/main",$data);
}

	
  
}

?>