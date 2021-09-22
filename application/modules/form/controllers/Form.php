<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Form extends MY_Controller
	{
		/* -Storing 'form_msg' in variable '$data'.	*/
		/* -Redirected to page.php */
		
		public function index()
		{
			 $data['content'] = 'form_msg';
			
			$this->load->view('page',$data);
		}
		public function locate(){
			$Data['content'] = 'backend';
			$this->load->view('page',$Data);
		}
		// public function question_1(){
		// 	$Data['content'] = 'update_msg';
		// 	$this->load->view('page',$Data);
		// }
		public function question_2(){
			$Data['content'] = 'summary';
			$this->load->view('page',$Data);
		}
		public function summary(){

			$this->db->select('UserName');	
			$this->db->from('users');
			$this->db->order_by('UserName', 'desc');
			$this->db->limit(1);	
			$retriev1 = $this->db->get();
			$Data['EduData']=$retriev1->result();
			$this->db->select('Player_Name');	
			$this->db->from('cricket');
			$this->db->order_by('Player_Name', 'desc');
			$this->db->limit(1);	
			$retriev1 = $this->db->get();
			$Data['some']=$retriev1->result();


			$this->load->view('summary',$Data);

		}
		


		

		function insert()
		{
$this->form_validation->set_rules('name', 'UserName','required');
if ($this->form_validation->run() === false)
			{
				$array = array(
					'fname_error' => form_error('name'),
					
					
					'status' => 'failed',
					'message' => 'Unable to save data'
				);
				echo json_encode($array);
			}
			else{
		$data = array(
	'UserName' => $this->input->post('name')
	
	
		);
		
		$this->load->model('model_query');
		$result=$this->model_query->saveData($data);
		
		if($result)
		{
		echo  1;	
		}
		else
		{
		echo  0;	
		}
    }
  }
  function player_insert(){

  
		$data = array(
	
	'Player_Name' => $this->input->post('Question1')
	
		);
		
		$this->load->model('model_query');
	
		$result=$this->model_query->saveData($data);
		if($result)
		{
		echo  1;	
		}
		else
		{
		echo  0;	
		}
    }
  function Color(){
  
		$data = array(
	
	'ColorName' => $this->input->post('scales')
	
		);

		
		$this->load->model('model_query');
	
		$result=$this->model_query->savecolors($data);
		// print_r($result);
		echo json_encode(["status"=>'success',"message"=>'Successfully Submitted']);
	}
        
  

		/* Retrieve and Display the data from the database */
		/* Stored the retrieve in the variable */
		
		function view()
		{
			alert('hi');
			 $data['query']="hello";
			
			$this->load->view('summary', $data['query']);
			
		// 	$this->db->select('*');	
		// 	$this->db->from('employeeeducationaldetails');	
		// 	$retriev1 = $this->db->get();
		// 	$data['EduData']=$retriev1->result();
		// 	$this->load->view('page',$data);
		 }
		 public function multicheck()
		{ 
			$this->load->view('update_msg');
			if(isset($_POST['save']))
			{
				$user_id='id';//Pass the userid here
				$checkbox = $_POST['check']; 
				for($i=0;$i<count($checkbox);$i++){
					$category_id = $checkbox[$i];

					$this->load->model('model_query');
					$this->model_query->multisave($user_id,$category_id);//Call the modal
					
				}
				echo "Data added successfully!";
			}
		}
		
	

		
		
	}
?>
