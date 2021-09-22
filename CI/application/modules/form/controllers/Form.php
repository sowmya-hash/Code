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

		/* -Server side Form Validation using AJAX */
		/* -If validation not completed then display the error message */
		/* -If validation completed then insert data into database */
		/* -After inserted then pass the json_encode message to function	*/

		function insert()
		{
			$this->form_validation->set_rules('fname', 'FirstName','required');
			$this->form_validation->set_rules('lname', 'LastName','required');
			$this->form_validation->set_rules('dob', 'DOB','required');
			$this->form_validation->set_rules('mob', 'Mobile','required|max_length[10]');
			$this->form_validation->set_rules('mail', 'Email','required|valid_email');
			$this->form_validation->set_rules('gender', 'Gender','required');
			$this->form_validation->set_rules('dropdown', 'KeySKils','required');
			$this->form_validation->set_rules('text', 'Comments','required');
			$this->form_validation->set_rules('tick', 'Terms and condition','required');
			$this->form_validation->set_rules('Course[]', 'Course Details','required');
			$this->form_validation->set_rules('Institution[]', ' NameOfInstitution','required');
			$this->form_validation->set_rules('YearOfPassing[]', 'YearOfPassing','required');
			$this->form_validation->set_rules('Percentage[]', 'Percentage','required');
			$this->form_validation->set_error_delimiters('<div class="error">','</div>');
			$this->form_validation->set_message('required','Enter %s');

			if ($this->form_validation->run() === false)
			{
				$array = array(
					'fname_error' => form_error('fname'),
					'lname_error' => form_error('lname'),
					'dob_error' => form_error('dob'),
					'mob_error' => form_error('mob'),
					'mail_error' => form_error('mail'),
					'gender_error' => form_error('gender'),
					'skills_error' => form_error('dropdown'),
					'Comments_error' => form_error('text'),
					'checkbox_error' => form_error('tick'),
					'edu_error' => form_error('Course[]'),
					'edu1_error' => form_error('Institution[]'),
					'edu2_error' => form_error('YearOfPassing[]'),
					'edu3_error' => form_error('Percentage[]'),
					'status' => 'failed',
					'message' => 'Unable to save data'
				);
				echo json_encode($array);
			}
			else
			{
				/* Query for inserting data into 'employeedetails' */
				
				$data = array(
					'FirstName'=>$this->input->post('fname'),
					'LastName'=>$this->input->post('lname'),
					'DOB'=>$this->input->post('dob'),
					'Gender'=>$this->input->post('gender'),
					'Mobile'=>$this->input->post('mob'),
					'Mail'=>$this->input->post('mail'),
					'Skils'=>$this->input->post('dropdown'),
					'Comments'=>$this->input->post('text')
				);
				$this->db->insert('employeedetails',$data);	
				
				/* Query for inserting data into 'employeeeducationaldetails' */

				$id = $this->db->insert_id(); // Getting id from 1st table //
				$course = $this->input->post('Course');
				$institute = $this->input->post('Institution');
				$year = $this->input->post('YearOfPassing');
				$percentage = $this->input->post('Percentage');

				foreach ($course as $res => $value)
				{
					$coursedata = [];
					$coursedata["UID"] = $id;
					$coursedata["Course"] = $course[$res];
					$coursedata["NameOfInstitution"] = $institute[$res];
					$coursedata["YearOfPassing"] = $year[$res];
					$coursedata["PercentageSecured"] = $percentage[$res];

					$this->db->insert('employeeeducationaldetails',$coursedata); 
				}
				$from_email = "aravind.avanze@gmail.com"; 
                $to_email = $this->input->post('mail'); 
  
                $this->email->from($from_email, 'aravind'); 
                $this->email->to($to_email);
                $this->email->subject('Email Test'); 
                $this->email->message('Successfully Registread'); 

                //Send mail 
                if($this->email->send())
                { 
                $this->session->set_flashdata("email_sent","Email sent successfully."); 
                
            	}
                else{ 
                $this->session->set_flashdata("email_sent","Error in sending Email."); 
                // $this->load->view('email_form');
                }
				echo json_encode(["status"=>'success',"message"=>'Successfully Submitted']);
			}
		}

		/* Retrieve and Display the data from the database */
		/* Stored the retrieve in the variable */
		
		function view()
		{
			$data['content'] = 'backend';
			$this->db->select('*');	
			$this->db->from('employeedetails');	
			$retriev = $this->db->get(); 
			$data['Data']=$retriev->result();
			
			$this->db->select('*');	
			$this->db->from('employeeeducationaldetails');	
			$retriev1 = $this->db->get();
			$data['EduData']=$retriev1->result();
			$this->load->view('page',$data);
		}

		/* Query for deleting the data */

		function delete()
		{
			$id1=$this->input->post('id'); // getting id from ajax data //
			$this->db->where('UID',$id1);
			$this->db->delete('employeeeducationaldetails');
			$this->db->where('UID',$id1);
			$this->db->delete('employeedetails');
			return 'success';
		}

		/* Function for Edit the form */
		/* Get segment3 value in the parameter from edit button */
		/* Select all the data using '$id' and stored in variable */
		/* Then load the update.php file and get the data using variable */

		function edit($id)
		{
			$data['content'] = 'update_msg';
			
			$this->db->select('*');
			$this->db->from('employeedetails');	
			$this->db->where('UID',$id);
			$retriev = $this->db->get(); 
			$data['Data']=$retriev->row();

			$this->db->select('*');	
			$this->db->from('employeeeducationaldetails');	
			$this->db->where('UID',$id);
			$retriev1 = $this->db->get();
			$data['EduData']=$retriev1->result();
			$this->load->view('page',$data);

		}

		/* Function for updating the database */		
		/* Use foreach for storing multiple data */
		/* Delete and insert the data for updating education table */

		function update()
		{
			$id = $this->input->post('id');	// Get 'id' from Form //
			$data = array(
				'FirstName'=>$this->input->post('fname'),
				'LastName'=>$this->input->post('lname'),
				'DOB'=>$this->input->post('dob'),
				'Gender'=>$this->input->post('gender'),
				'Mobile'=>$this->input->post('mob'),
				'Mail'=>$this->input->post('mail'),
				'Skils'=>$this->input->post('dropdown'),
				'Comments'=>$this->input->post('text')
			);

			// Update query for employeedetails table //
			$this->db->set($data);
			$this->db->where('UID',$id);
			$this->db->update('employeedetails');
			
			// Store value in Variable //
			$course = $this->input->post('Course');
			$institute = $this->input->post('Institution');
			$year = $this->input->post('YearOfPassing');
			$percentage = $this->input->post('Percentage');

			// Update query for employeeeducationaldetails table //
			$this->db->where('UID',$id);
			$this->db->delete('employeeeducationaldetails');
			foreach ($course as $res => $value)	// $res is a key //
			{
				$coursedata = [];
				$coursedata["UID"] = $id;
				$coursedata["Course"] = $course[$res];
				$coursedata["NameOfInstitution"] = $institute[$res];
				$coursedata["YearOfPassing"] = $year[$res];
				$coursedata["PercentageSecured"] = $percentage[$res];

				$this->db->insert('employeeeducationaldetails',$coursedata); // insert value into employeeeducationaldetails //
			}
			$a = "updated";
			echo json_encode($a); // Send json format variable to AJAX //
		}

		/* Function for display the modal using bootstrap */

		function display()
		{
			$id3 = $this->input->post('id');
			$this->db->select('*');
			$this->db->from('employeedetails');	
			$this->db->where('UID',$id3);
			$retriev = $this->db->get(); 
			$data['Data']=$retriev->row();

			$this->db->select('*');	
			$this->db->from('employeeeducationaldetails');	
			$this->db->where('UID',$id3);
			$retriev1 = $this->db->get(); 
			$data['EduData']=$retriev1->result();
			echo json_encode($data);
		}
	}
?>
