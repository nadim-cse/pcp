<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Student extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	    $this->load->model('Login_model');
		$this->load->model('Proposal_model');
        $this->load->model('Teacher_model');
		$this->load->model('Board_model');
		$this->load->model('Student_model');
		$this->load->library('session');
	   
		    
	}


	public function index()
	{	
		
		$student_id = $this->session->userdata('current_memeber_student_id');
		$data['projectDetails'] = $this->Student_model->GetProjectDetails($student_id);
		//echo "<pre>"; print_r($data['projectDetails']); exit;
		//echo "nadim"; 
		$this->load->view('include/header');
		$this->load->view('student/student-home',$data);
		$this->load->view('include/footer');
	}

	public function StudentAccountRegistration($email,$student_id)
	{
		# code...
		// echo $email;
		$data['email'] =  urldecode($email);
		$email =  urldecode($email);
		$data['student_id'] = $student_id;
		$link_validity = $this->db->query("SELECT member_email,member_student_id FROM student WHERE member_email ='$email' AND member_student_id = '$student_id' AND status = '1'");
		if($link_validity->result()){

			$this->load->view('login/login-header');
			$this->load->view('registration/student-registration-link-invalid');
			$this->load->view('login/login-footer');

		}else{

			$this->load->view('login/login-header');
			$this->load->view('registration/student-registration',$data);
			$this->load->view('login/login-footer');
		}
		
		
	}
}
