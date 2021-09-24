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
		public function question_1(){
			$Data['content'] = 'update_msg';
			$this->load->view('page',$Data);
		}
		
		public function summary(){

			
			$this->db->select('*');	
			$this->db->from('users');
			$this->db->where("users.id",$this->uri->segment(3));
			$result['data']=$this->db->get()->result();
			$this->load->view('summary',$result);

		}
		


		

		function insert()
		{
			   $this->load->helper(array('form', 'url'));
			
         /* Load form validation library */ 
         $this->load->library('form_validation');
			
         /* Set validation rule for name field in the form */ 
       
			
       
  $this->form_validation->set_rules('name', 'UserName', 'required');
               
                        array('required' => 'You must provide a %s.');
if ($this->form_validation->run() == false)
			{
				$config = array(
        array(
                'field' => 'name',
                'label' => 'Username',
                'rules' => 'required'
        )
    );
        $this->form_validation->set_rules($config);
    }
			else{
		$data = array(

	'UserName' => $this->input->post('name')
	
	
		);
		
		$this->load->model('model_query');
		$result=$this->model_query->saveData($data);
		
		if($result)
		{
		echo  $result;	
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
		
		// $this->load->model('model_query');
	$query="UPDATE `users` SET `Player_Name`='".$this->input->post('Question1')."' WHERE id='".$this->input->post('userId')."' ";
		$result=$this->db->query($query);
		if($result)
		{
		return redirect('Form/multicheck/'.$this->input->post('userId')); 
		}
		else
		{
		echo  0;	
		}
    }
  function Color(){
  
		$data = array(
	
	'ColorName' =>implode(",", $this->input->post('check'))
	
		);

		
		$this->load->model('model_query');
	
		$result=$this->model_query->saveData($data);
		return redirect('Form/summary'); 
	


	}
    
		/* Retrieve and Display the data from the database */
		/* Stored the retrieve in the variable */
		
		
		 public function multicheck()
		{ 
			$this->load->view('update_msg');
			
			}
			
		  function colorinsert(){
		  	$color='';
		  	foreach($this->input->post('check') as $key =>$value){
		  		$color.=$value." , ";		  		
		  	}
		  	
		  		$query="UPDATE `users` SET `ColorName`='".$color."' WHERE id='".$this->input->post('userId')."' ";
		$result=$this->db->query($query);
		  	return redirect('Form/summary/'.$this->input->post('userId'));
		  }

		
		public function History()
		{ 
			
			$this->db->select('*');	
			$this->db->from('users');
			$this->db->join("colour","colour.userId=users.id","left");
			$Data['data']=$this->db->get()->result();
			
			$this->load->view('History',$Data);
		  
		}
		
	}
?>
