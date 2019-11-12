<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Teacher extends CI_Controller {

	public function index()
	{
		
		$this->load->view('include/header');
		$this->load->view('teacher/teacher-home');
		$this->load->view('include/footer');
	}
	public function AccountComplitition($encryptemEmail){

			$data['email'] =  urldecode($encryptemEmail);
			$this->load->view('login/login-header');
			$this->load->view('registration/teacher-registration',$data);
			$this->load->view('login/login-footer');


	}

	
}
