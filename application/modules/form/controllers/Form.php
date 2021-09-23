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

			$this->db->select('UserName');	
			$this->db->from('users');
			$this->db->order_by('UserName', 'desc');
			$this->db->limit(1);	
			$retriev1 = $this->db->get();
			$Data['EduData']=$retriev1->result();
			$this->db->select('Player_Name');	
			$this->db->from('users');
			$this->db->order_by('Player_Name', 'desc');
			$this->db->limit(1);	
			$retriev1 = $this->db->get();
			$Data['some']=$retriev1->result();
			$this->db->select('ColorName');	
			$this->db->from('color');
			$this->db->order_by('id', 'desc');
			$this->db->limit(1);	
			$retriev1 = $this->db->get();
			$Data['color']=$retriev1->result();


			$this->load->view('summary',$Data);

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
		return redirect('Form/multicheck'); 
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
	
		$result=$this->model_query->savecolors($data);
		return redirect('Form/summary'); 
	


	}
        
  

		/* Retrieve and Display the data from the database */
		/* Stored the retrieve in the variable */
		
		
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
				return redirect('Form/summary'); 
			}
			
		  

		}
		public function History()
		{ 
			$this->db->where('id IS NOT NULL', null, false);
            $this->db->select('*');	
			$this->db->from('users');
			
			$retriev1 = $this->db->get();
			$Data['user']=$retriev1->result();
			
			$this->load->view('History',$Data);
		  
		}
		
	}
?>
