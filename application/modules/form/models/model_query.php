<?php
class model_query extends CI_Model 
{  
    public function saveData($data,$last_id='') 
  
	{
	
		$this->db->insert('users',$data);
  $last_id=$this->db->insert_id();
  return  $last_id;

    return false;
}
     public function savePlayer($data) 
	{
		if($this->db->insert('Cricket',$data))
		{
		return 1;	
		}
		else
		{
		return 0;	
		}
    }
     public function savecolors($data) 
	{
		if($this->db->insert('users',$data))
		{
		return 1;	
		}
		else
		{
		return 0;	
		}
    }
    public function User_List()
	{
	
		return $this->db->select('s.*, as.student_id')
			->from('users as s')
			->join('addedcolors as as','as.student_id = s.id','left')
		    ->get()
			->result();
	}
	function multisave($user_id,$category)
	{
		$query="insert into color values($user_id,$category)";
		$this->db->query($query);
	}
	
}
?>