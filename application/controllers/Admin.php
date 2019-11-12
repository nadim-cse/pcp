<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Teacher_model');
        $this->load->model('Student_model');
        $this->load->model('Admin_model');

		
    }

	public function index()
	{
		$data['totalStudents'] = $this->Admin_model->GetTotalStudents();
		$data['totalTeachers'] = $this->Admin_model->GetTotalTeachers();
		$data['totalProjects'] = $this->Admin_model->GetTotalProjects();
		//echo "<pre>"; var_dump($data['totalStudents']); exit;
		$this->load->view('include/header');
		$this->load->view('admin/admin-home',$data);
		$this->load->view('include/footer');
	}
	
	public function CreateTeacher(){

		$this->load->view('include/header');
		$this->load->view('admin/create-teacher');
		$this->load->view('include/footer');
	}

	public function CreateStudent(){
		
		$this->load->view('include/header');
		$this->load->view('admin/create-student');
		$this->load->view('include/footer');
	}

	public function ListStudent(){
		
		$data['students'] = $this->Student_model->GetStudentList();
		//echo "<pre>"; print_r($data['students']);exit;
		$this->load->view('include/header');
		$this->load->view('admin/list-student',$data);
		$this->load->view('include/footer');
	}

	public function InsertStudentData(){
		
				
				 $email = $this->input->post('email');
				 $id = $this->input->post('id'); 
				 $Query = $this->Student_model->GetEmailDetails($email,$id);
				// echo "<pre>"; print_r($Query); exit;
				$Query2 = $this->Student_model->CheckEmailFronTeacher($email);
				 if($Query2)
				 {
					echo "0";
				 }
				 else{

				 if(empty($Query))
				 {
					
					$data = array(
		
						'student_id' => $id,
						'student_email' => $email,
		
					);
					//echo "<pre>"; print_r($data); exit;
					$result  = $this->Student_model->InsertStudentData($data);

		

						$data['token'] = base_url('student-account-registration/'.urlencode($email).'/'.$id);
						
					   $this->load->library('email');
					   $this->email->set_newline("\r\n");
					   $this->email->from('testphpmaileremail@gmail.com', 'Account Activation');
					   $this->email->to($email);
					   $this->email->subject('Active your account'); 
					   
					   $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
						   
					   $this->email->set_header('Content-type', 'text/html');
					   
					   $body = $this->load->view('email/account-activation-std',$data,TRUE);
					       //$this->load->view('email/account-activation-std',$data);
		   
					   $this->email->message($body);  
		   
					   $this->email->send();
	   
						echo "1";
					
				 }
				 else
				 {

						//echo "Check if these data ar availble";
						$EmailAndID = $this->Student_model->GetEmailAndIdDetails($email,$id);
						if($EmailAndID)
						{

							echo "0";

						}else
						{

							$data = array(
		
								'student_id' => $id,
								'student_email' => $email,
				
							);
							//echo "<pre>"; print_r($data); exit;
							$result  = $this->Student_model->InsertStudentData($data);
		
				
		
								$data['token'] = base_url('student-account-registration/'.urlencode($email).'/'.$id);
								
							   $this->load->library('email');
							   $this->email->set_newline("\r\n");
							   $this->email->from('testphpmaileremail@gmail.com', 'Account Activation');
							   $this->email->to($email);
							   $this->email->subject('Active your account'); 
							   
							   $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
								   
							   $this->email->set_header('Content-type', 'text/html');
							   
							   $body = $this->load->view('email/account-activation-std',$data,TRUE);
							   
							 //  $this->load->view('email/account-activation-std',$data);
				   
							   $this->email->message($body);  
				   
							   $this->email->send();
			   
								echo "1";
						}
			     }
				 }
				
		
	}
	public function CreateTeacherRequest(){

		$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[teachers.t_email]');
		if($this->form_validation->run() == FALSE){
			
			echo "0";
		}
		else{

			$name = $this->input->post('name');
			$email = $this->input->post('email');
			
			// Generate Invitation Link
			
			//$encrypted_email = $this->encrypt->encode($email);
			$link = base_url('Teacher/AccountComplitition/'.urlencode($email)); 
			//$link = base_url('Teacher/AccountComplitition/'.$email); 
			//echo $link;

			$this->load->library('email');
			$this->email->set_newline("\r\n");
			$this->email->from('testphpmaileremail@gmail.com', 'Account Activation');
			$data = array(
				'name'=> 'value',
				'token' => $link
				
			);
			//echo $link;
			$this->email->to($email); 
			
			$this->email->subject('Active your account'); 
			
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			
			$this->email->set_header('Content-type', 'text/html');
			
			$body = $this->load->view('email/account-activation',$data,TRUE);
			
			$this->email->message($body);   
			
			if($this->email->send()){
				echo "1";
			}else{
				echo "3";
			}
			
   
		}

		
	

	} 

	public function DeleteStudent($id){
		
		$delete = $this->Student_model->DeleteStudentFromStudemEmail($id);
		if($delete){

			$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>Student Data Deleted successfully</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function ListTeacher(){
		
		
		
		$data['tdetails'] = $this->Teacher_model->GetTeachersList();
		if(!empty($data['tdetails'] ))
		{

			$myCustomArray = array();
			
				
				foreach($data['tdetails'] as $result){
					$t_id = $result->t_id;
					$data['AssignedStudent'] = $this->Teacher_model->GetStudentBelongsToTeacher($t_id);
					
					$total_std= $data['AssignedStudent'];
					if(array_key_exists($total_std,$myCustomArray)){
						array_push($myCustomArray[$total_std], (array) $result);
					
					
					}
					
					else{
						$myCustomArray[$total_std] = array();
						array_push($myCustomArray[$total_std], (array) $result);
					}
				
			}
		 
			$data['resultOBJ'] = json_decode(json_encode($myCustomArray));
			//echo "<pre>"; print_r($data['resultOBJ']);exit;
			
			$this->load->view('include/header');
			$this->load->view('teacher/teacher-list',$data);
			$this->load->view('include/footer');
			
		}else
		{

			$data['resultOBJ'] = ''; //json_decode(json_encode($myCustomArray));
			//echo "<pre>"; print_r($data['resultOBJ']);
			
			$this->load->view('include/header');
			$this->load->view('teacher/teacher-list',$data);
			$this->load->view('include/footer');
			
		}
		   
		
		
		
	}


	public function GetTeacherDetails(){

		$t_id =  $this->input->get('TeacherID');
		$query = $this->db->query("SELECT * FROM teachers where t_id = '$t_id'");
		$result = $query->result();
		echo json_encode($result);
		
		
	}

	public function UpdateTeacherDetails(){

		$t_name = $this->input->post('teacher_name');
		$t_id = $this->input->post('teacher_id');
		$t_mob = $this->input->post('t_mobile');
		$t_post = $this->input->post('t_post');
		$project_limit = $this->input->post('project_limit');

		$data = array(


			't_name'=> $t_name,
			't_post'=>$t_post,
			't_mobile'=>$t_mob,
			'project_limit'=>$project_limit,

		);
		$this->db->where('t_id', $t_id);
		$this->db->update('teachers', $data);
		if($this->db->affected_rows() > 0){
			echo "1";
		}else{
			echo "2";
		}
		
	}

	public function DeactiveTeacher($t_id){

		$data = array(
			
			
						'status'=> 0,
					
					);
					$this->db->where('t_id', $t_id);
					$this->db->update('teachers', $data);
					if($this->db->affected_rows() > 0){
						redirect($_SERVER['HTTP_REFERER']);
					}else{
						redirect($_SERVER['HTTP_REFERER']);
					}
		
	}
	public function ActiveTeacher($t_id){
		
				$data = array(
					
					
								'status'=> 1,
							
							);
							$this->db->where('t_id', $t_id);
							$this->db->update('teachers', $data);
							if($this->db->affected_rows() > 0){
								redirect($_SERVER['HTTP_REFERER']);
							}else{
								redirect($_SERVER['HTTP_REFERER']);
							}
				
			}

	
}
