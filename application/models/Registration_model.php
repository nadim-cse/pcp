<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Registration_model extends CI_Model
{

    public function InsertTeacherData($RegistrationData)
    {
        $this->db->insert('teachers',$RegistrationData); 
        return true;
        
    }

    public function GetStudentStatus($email,$id)
    {
        # code...
        $query=$this->db->query("SELECT status FROM student WHERE member_email = '$email' and member_student_id = '$id'");
        
        return $query->result();
       
    }
    public function GetTeacherStatus($email)
    {
        # code...
        $query=$this->db->query("SELECT status FROM teachers WHERE t_email = '$email'");
        
        return $query->result();
       
    }

    
    // public function UpdateStudentData($RegistrationData,$email,$id)
    // {
    //     # code...

	// 	$this->db->where('member_email','', $email,$id);
	// 	$this->db->update('student', $RegistrationData);
	// 	if($this->db->affected_rows() > 0){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
       
    // }
    public function InsertStudentData($RegistrationData,$email)
    {
        $this->db->insert('student',$RegistrationData); 

        $StudentEmailData = array(

            'status' =>1
        );

            
        
        	$this->db->where('student_email',$email);
        	$this->db->update('student_email', $StudentEmailData);
        	if($this->db->affected_rows() > 0){
        		return true;
        	}else{
        		return false;
        	}
       
        
    }
	

     

}
