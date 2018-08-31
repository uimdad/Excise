<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 $ci=& get_instance();
if ( ! function_exists('get_all'))
{
     function get_all($table)
     {
         $ci=& get_instance();
		
         $result = $ci->db->get($table);
         return $result->result();
         
     }
}
 function getaddress($lat,$lng)
  {
     $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
       return $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }
  }
if ( ! function_exists('convert_to_address'))
{
     function convert_to_address($lat,$lng){
     $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
     $json = @file_get_contents($url);
     $data=json_decode($json);
     $status = $data->status;
     if($status=="OK")
     {
       return $data->results[0]->formatted_address;
     }
     else
     {
       return false;
     }
  }
}
if ( ! function_exists('get_all_order'))
{
     function get_all_order($table,$order_col,$order)
     {
         $ci=& get_instance();
		 $ci->db->order_by($order_col,$order);
         $result = $ci->db->get($table);
         return $result->result();
         
     }
}
if ( ! function_exists('get_last_insert'))
{//$table='comment',$table_join='blog',$column_join='comment.id=blog.id'
     function get_last_insert($table,$data)
     {
         $ci=& get_instance();
      $ci->db->insert($table,$data);
        return $ci->db->insert_id();
     }
}
if ( ! function_exists('insert_data'))
{
     function insert_data($table,$data)
     {
         $ci=& get_instance();
         $result = $ci->db->insert($table,$data);
         return true;
         
     }
}
if ( ! function_exists('select_data_join'))
{//$table='comment',$table_join='blog',$column_join='comment.id=blog.id'
     function select_data_join($table,$table_join,$column_join,$where)
     {
         $ci=& get_instance();
      $ci->db->select('*');
$ci->db->from($table);
$ci->db->join($table_join,$column_join);

$ci->db->where($where);

$result=$ci->db->get();
         return $result->result_array();
         
     }
}
if ( ! function_exists('get_where'))
{//$table='comment',$table_join='blog',$column_join='comment.id=blog.id'
     function get_where($table="",$where,$select="",$type)
     {
         $ci=& get_instance();
      $ci->db->select($select);
	  if( $where != "" ){
$ci->db->where($where); 
	  }
	  
$result=$ci->db->get($table);
	  if($type=="row"){
		   return $result->row();
	  }
	   if($type=="array"){
		   return $result->result_array();
	  }
	  if($type=="result"){
		   return $result->result();
	  }
        
         
     }
}
if ( ! function_exists('get_num'))
{//$table='comment',$table_join='blog',$column_join='comment.id=blog.id'
     function get_num($table,$where,$select)
     {
         $ci=& get_instance();
      $ci->db->select($select);
if($where != "" ){ $ci->db->where($where); }
$result=$ci->db->get($table);
         return $result->num_rows();
         
     }
}

if ( ! function_exists('get_where_both'))
{
     function get_where_both($table,$where,$value,$array)
     {
         $ci=& get_instance();
     $ci->db->where($where,$value);
     $result=$ci->db->get($table);
        if($array=="array"){return $result->result_array();}
        if($array="object"){return $result->result();}
         
     }
        }

if ( ! function_exists('get_like_where'))
{

function get_like_where($col1="",$val1="",$col2="",$val2="",$col3="",$val3="",$col4="",$val4="",$col5="",$val5="",$table,$table_join="",$column_join="",$table_join1="",$column_join1="")
    {
        $ci=& get_instance();
         if($table_join !=" " & $column_join !=""){
        $ci->db->join($table_join,$column_join);
    }
       if($table_join1 !=" " & $column_join1 !=""){
        $ci->db->join($table_join1,$column_join1);
    }
        if($col1 !=" " & $val1 !=""){
        $ci->db->like($col1, $val1);
    }
        if($col2 !=" " & $val2 !=""){
        $ci->db->like($col2, $val2); 
    } if($col3 !=" " & $val3 !=""){
        $ci->db->like($col3, $val3);
        } if($col4 !=" " & $val4 !=""){
        $ci->db->like($col4, $val4);
        } 
         if($col5 !=" " & $val5 !=""){

        $ci->db->like($col5, $val5); 
    }
        $result = $ci->db->get($table); 
        return $result->result_array();

    }

}

if ( ! function_exists('update_where'))
{
    function update_where($table,$data,$where,$value)
    {$ci=& get_instance();
    $ci->db->where($where, $value);
    $ci->db->update($table, $data); 
    return true;
    }
 
    }
if ( ! function_exists('delete_where'))
{
    function delete_where($table,$where,$value)
    {$ci=& get_instance();
    $ci->db->delete($table,array($where => $value)); 
    return true;
    }
 
    }
    if ( ! function_exists('custom_query'))
{
    function custom_query($query)
    {$ci=& get_instance();
      $result = $ci->db->query($query);

      return $result->result();
	  
	  
	  
    }
 
    }
	
	
	
	

	
   

    
?>