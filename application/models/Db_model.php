<?php 
	class Db_model extends CI_Model
	{
		
		function deleterecord($id1)
		{
			$this->db->where('UID',$id1);
			$this->db->delete('employeeeducationaldetails');
			$this->db->where('UID',$id1);
			$this->db->delete('employeedetails');
			return 'success';
		}

		function updaterecord($id)
		{
			$this->db->select('*');	
			$this->db->from('employeedetails');
			$this->db->where('UID');
		}
	}
?>