<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Registration extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Registration_model');
        $this->load->database();
		
    }
	public function index()
	{   
        $this->load->view('login/login-header');
        $this->load->view('login/afs-login');
        $this->load->view('login/login-footer');
    }
    
    public function GetAndCheckRegistrationData(){

        // Reveice Login Credentials
        
        $this->form_validation->set_rules('t_email', 'teacher email', 'required|is_unique[teachers.t_email]');
         $email = $this->input->post('t_email');
        // $status = $this->Registration_model->GetTeacherStatus($email);
         if($this->form_validation->run() == FALSE){
            
            echo "3";
         }  
        else{
           
            $name = $this->input->post('t_name');
            $post = $this->input->post('t_post');
            $mob = $this->input->post('t_mobile');
            $role = "teacher";
            $password = $this->input->post('password');
            $cpassword = $this->input->post('c_password');
            if($password != $cpassword){
   
                echo '5';
            }
            else{
                
               $Password = md5($password);
               $newPassword =  $Password;
   
               $RegistrationData = array(
   
                   't_email' => $email,
                   't_name' => $name,
                   't_password' => $newPassword,
                   'role' => $role,
                   't_post' => $post,
                   't_mobile' => $mob,
                   'status' => 1,
                   'created_at' => date('Y-m-d H:i:s'),
   
               );
               //echo "<pre>"; print_r($RegistrationData);
               $res = $this->Registration_model->InsertTeacherData($RegistrationData);
               if($res){
                   
                   echo "1";
               }
               else{
                   echo "0";
               }
            }
        }
         

         

         
        
      
       
        
       
    }
    
    public function GetAndCheckStudentRegistrationData(){
        
                // Reveice Login Credentials
                $current_status = '';
                $email = $this->input->post('member_email');
                $id = $this->input->post('student_id');
                $data['status'] = $this->Registration_model->GetStudentStatus($email,$id);
                foreach($data['status'] as $status){

                   $current_status = $status->status;
                }
               if($current_status == '1'){

                 echo "3";
               }
                
                else{

                    $email = $this->input->post('member_email');
                    $role = "student";
                    $password = $this->input->post('password');
                    $student_name = $this->input->post('student_name');
                    $student_id = $this->input->post('student_id');
                    $phone_number = $this->input->post('phone_number');
                    $password = $this->input->post('password');
                    $cpassword = $this->input->post('c_password');
                    if($password != $cpassword){
           
                        echo '5';
                    }
                    else{
                       $Password = md5($password);
                      
           
                       $RegistrationData = array(
           
                          
                   
                           'password' => $Password,
                           'role' => $role,
                           'member_name' => $student_name,
                           'member_email' => $email ,
                           'member_student_id' => $student_id ,
                           'member_mobile_no' => $phone_number,
                           'role' => $role,
                           'status' => 1,
                           'created_at' => date('Y-m-d H:i:s')
           
                       );
                     // echo "<pre>"; print_r($RegistrationData);exit;
                       $res = $this->Registration_model->InsertStudentData($RegistrationData,$email);
                       if($res){
                           
                           echo "1";
                       }
                       else{
                           echo "0";
                       }
                    }
                }
               
            }

             
                            
 
}
