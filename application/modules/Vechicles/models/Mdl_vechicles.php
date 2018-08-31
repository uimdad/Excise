<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_vechicles extends CI_Model
{
    var $table = "tbl_vechile";  
	
    var $select_column = array("username","siezedtime","submakename","makename","formserialno","form_bno","seizedtype","datesiezeddate", "districtname", "mobilesquadno", "vechileregistrationno","vechileid");  
    var $select_column2 = array("username","siezedtime","submakename","makename","formserialno","seizedtype","datesiezeddate", "districtname", "mobilesquadno", "vechileregistrationno","vechileid");  
    var $order_column = array(null, "username", "datesiezeddate", null, null);   

	
    


var $userdistrict = "" ;

 
  
      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
		      $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
			    $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
           $this->db->join('tbl_vechile_formb','tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid ');
		   $this->db->where(array("vechiclestatus"=>0,"district_id"=>$this->userdistrict));
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
      function make_datatables($id){  
	   $this->userdistrict = $id;
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	  
	  function make_query_warehouse()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
           $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
		     $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
           $this->db->join('tbl_vechile_formb','tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid ');
		   $this->db->where(array("vechiclestatus"=>3));
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  //warehouse datatables
      function make_datatables_warehouse(){  
	
           $this->make_query_warehouse();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_warehouse(){  
           $this->make_query_warehouse();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_warehouse()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  
	  
	  
	  
	  /***** dispatcehd Vichle starts **/
	  
	  
	  function make_query_dispatcehd_warehouse()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
		        $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
           $this->db->join('tbl_vechile_formb','tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid ');
		     $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
		   $this->db->where(array("vechiclestatus"=>2));
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_dispatcehd_warehouse(){  
	
           $this->make_query_dispatcehd_warehouse();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_dispatcehd_warehouse(){  
           $this->make_query_dispatcehd_warehouse();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_dispatcehd_warehouse()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  	  /***** dispatcehd Vichle Ends **/
		  
		  
		   /***** recieved fsl Vichle starts **/
	  
	  
	  function make_query_received_warehouse()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
		        $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
           $this->db->join('tbl_vechile_formb','tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid ');
		     $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
		   $this->db->where(array("vechiclestatus"=>4));
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_received_warehouse(){  
	
           $this->make_query_received_warehouse();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_received_warehouse(){  
           $this->make_query_received_warehouse();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_received_warehouse()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  	  /***** recieved Vichle Ends **/
		  
		  
		  
		  
		  
		   /***** Confiscated Vechicles for warehouse **/
	  
	  
	  function make_query_confiscated_warehouse()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
		        $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
           $this->db->join('tbl_vechile_formb','tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid ');
		     $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
		  
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_confiscated_warehouse(){  
	
           $this->make_query_confiscated_warehouse();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_confiscated_warehouse(){  
           $this->make_query_confiscated_warehouse();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_confiscated_warehouse()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  	  /***** Confiscated Vechicles for Warehouse **/
		  
		  
		    /***** ready for allotment Vechicles **/
	  
	  
	  function make_query_allot_vechicle()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
		        $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
           $this->db->join('tbl_vechile_formb','tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid ');
		     $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
		   $this->db->where(array("vechiclestatus"=>9));
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_allot_vechicle(){  
	
           $this->make_query_allot_vechicle();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_filtered_data_allot_vechicle(){  
           $this->make_query_allot_vechicle();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_allot_vechicle()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  	  /***** ready for allotment **/
		     /*****  alloted Vechicles **/
	  
	  
	  function make_query_alloted_vechicle()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
		        $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
           $this->db->join('tbl_vechile_formb','tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid ');
		     $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
		   $this->db->where(array("vechiclestatus"=>7));
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_alloted_vechicle(){  
	
           $this->make_query_alloted_vechicle();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }    
	
      function get_filtered_data_alloted_vechicle(){  
           $this->make_query_alloted_vechicle();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_alloted_vechicle()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  	  /***** alloted vechicles **/
		  
		      /*****  returned Vechicles **/
	  
	  
	  function make_query_returned_vechicle()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
		        $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
           $this->db->join('tbl_vechile_formb','tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid ');
		     $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
		   $this->db->where(array("vechiclestatus"=>10));
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
	  
      function make_datatables_returned_vechicle(){  
	
           $this->make_query_returned_vechicle();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }    
	   
      function get_filtered_data_returned_vechicle(){  
           $this->make_query_returned_vechicle();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_returned_vechicle()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  	  /***** returned vechicles **/
	  	  /***** Eto  confiscated vechicles History**/
		  function make_confiscated_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
		     $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
		      $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
           $this->db->join('tbl_vechile_formb','tbl_vechile_formb.vechicle_id = tbl_vechile.vechileid ');
           $this->db->join('tbl_eto_approved_date','tbl_eto_approved_date.vechicle_id = tbl_vechile.vechileid ');
           $this->db->join('tbl_sendbacktowarehouse','tbl_sendbacktowarehouse.vechicle_id = tbl_vechile.vechileid ');
		   $this->db->where(array("district_id"=>$this->userdistrict));
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
      function make_confiscated_datatables($id){  
	   $this->userdistrict = $id;
           $this->make_confiscated_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_confiscated_filtered_data(){  
           $this->make_confiscated_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_confiscated()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  	  /***** Eto Confiscated History Ends**/ 
		  /***** Eto  sized vechicles History**/
		  function make_sized_query()  
      {  
           $this->db->select($this->select_column2);  
           $this->db->from($this->table);
           $this->db->join('tbl_district','tbl_district.districtid = tbl_vechile.district_id ');
           $this->db->join('tbl_user','tbl_user.userid = tbl_vechile.user_id ');
           $this->db->join('tbl_vechile_make_sub','tbl_vechile_make_sub.submakeid=tbl_vechile.vehicle_model');
           $this->db->join('tbl_vechile_make','tbl_vechile_make.makeid=tbl_vechile.vechicle_make');
		   
		      $this->db->join('tbl_vechile_seized','tbl_vechile_seized.siezedid = tbl_vechile.vehicleseize_category ');
           
		   $this->db->where(array("district_id"=>$this->userdistrict));
            if(isset($_POST["search"]["value"]) and !empty($_POST["search"]["value"]))  
           {  
                $this->db->like("username", $_POST["search"]["value"]);  
                $this->db->or_like("vechileregistrationno", $_POST["search"]["value"]);  
           }  
          
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('vechileid', 'DESC');  
           }  
      }  
      
      function make_sized_datatables($id){  
	   $this->userdistrict = $id;
           $this->make_sized_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
	
      function get_sized_filtered_data(){  
           $this->make_sized_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_sized_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 

           return $this->db->count_all_results();  
      }
	  	  /***** Eto seized History Ends**/
}
	  ?>