<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Login_model');
        $this->load->database();
		
    }
	public function index()
	{   
        $this->load->view('login/login-header');
        $this->load->view('login/afs-login');
        $this->load->view('login/login-footer');
    }
    public function CheckRoleBYEmail()
    {
        # code...
         $email = $this->input->post('email');
         //echo json_encode($email);
         $query1 = $this->db->query("SELECT role FROM  admin_table  WHERE admin_email ='$email'");
         //$data = json_encode($query1->result());
         //echo $data;
         if($query1->result() == 'admin'){
            json_encode($query1->result());
            // echo $data;
         }
		
    }
    public function GetAndCheckLoginData(){

        // Reveice Login Credentials
         $role = '';
         $password = md5($this->input->post('password'));
         $newPassword = $password;
         $email = $this->input->post('email');
         $QueryAdmin = $this->db->query("SELECT role FROM admin_table WHERE admin_email = '$email'");
         if($QueryAdmin->result() == true){

                foreach($QueryAdmin->result() as $adminROle){

                    $role = $adminROle->role;
                }
                $AdminData = array(
                
                    'admin_email' => $email,
                    'role' => $role,
                    'admin_password' => $newPassword
                 );

                $result = $this->Login_model->AuthenticateAdminLoginCredentials($AdminData);
                    // // if validation is completed and result is true 
                if($result){
                    
                    redirect('Admin');
                }
                else{

                    $this->session->set_flashdata('error','<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>Email or Password is not matched</div>');
                    redirect('Login');
                }
                
         }

         $QueryTeacher = $this->db->query("SELECT role FROM teachers WHERE t_email = '$email'");
         if($QueryTeacher->result() == true){

                foreach($QueryTeacher->result() as $teachersROle){

                    $role = $teachersROle->role;
                }
                $TeacherData = array(
                
                    't_email' => $email,
                    'role' => $role,
                    't_password' => $newPassword,
                    'status' => 1
                );
               //echo "<pre>"; print_r($TeacherData); exit;
               $result = $this->Login_model->AuthenticateTeacherLoginCredentials($TeacherData);
              //$this->session->userdata('session_role');
              if($result){
                
                    redirect('Teacher');
               }
               else{
                
                     $this->session->set_flashdata('error','<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>Email or Password is not matched</div>');
                      redirect('Login');
                }
                
         }
         $QueryStudent = $this->db->query("SELECT role FROM student WHERE member_email = '$email'");
         if($QueryStudent->result() == true){

                foreach($QueryStudent->result() as $studentROle){

                    $role = $studentROle->role;
                }
                $StudentData = array(
                
                    'member_email' => $email,
                    'role' => $role,
                    'password' => $newPassword
                );
              // echo "<pre>"; print_r($StudentData); exit;
               $result = $this->Login_model->AuthenticateStudentLoginCredentials($StudentData);
             // echo $this->session->userdata('session_role'); exit;
              if($result){
                
                    redirect('Student');
               }
               else{
                
                     $this->session->set_flashdata('error','<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>Email or Password is not matched</div>');
                      redirect('Login');
                }
                
         }
      
        
       
    }

    public function logout($user){
        
        if($user == 'admin'){
            $this->session->unset_userdata('current_admin_id');
            $this->session->unset_userdata('current_user_name');
            $this->session->unset_userdata('session_role');
        
             $this->session->sess_destroy();
        
                 redirect('Login?logout=success');
        }
        if($user == 'teacher'){
        
            $this->session->unset_userdata('current_teacher_id');
            $this->session->unset_userdata('current_user_name');
            $this->session->unset_userdata('session_role');
        
            $this->session->sess_destroy();
        
                redirect('Login?logout=success');
        }
        if($user == 'student'){
            
                $this->session->unset_userdata('current_member_id');
                $this->session->unset_userdata('current_user_name');
                $this->session->unset_userdata('session_role');
            
                $this->session->sess_destroy();
            
                    redirect('Login?logout=success');
        }
                        
                            
    }
}
