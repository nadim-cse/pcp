<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model
{

    public function GetStudentEmail($proposalID){

        $query=$this->db->query("SELECT * FROM student WHERE proposal_id = '$proposalID'");
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
        
    }
    public function GetProjectDetails($student_id)
    {
        # code...
        $query=$this->db->query("SELECT * FROM student WHERE member_student_id = '$student_id'");
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function GetAuthentication(){

        $query=$this->db->query("SELECT * FROM student");
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function InsertStudentData($data){
        
                 # code...
                 $this->db->insert('student_email',$data); 
                 return true;
     }

     public function GetEmailDetails($email,$student_id){
        
                $query=$this->db->query("SELECT student_email,student_id FROM student_email WHERE student_email = '$email' OR student_id = '$student_id'");
                
                if($query->result()){
                    return $query->result();
                }
                else{
                    return false;
                }
    }
     public function GetEmailAndIdDetails($email,$student_id){
        
                $query=$this->db->query("SELECT student_email,student_id FROM student_email WHERE student_email = '$email' OR student_id = '$student_id'");
                
                if($query->result()){
                    return $query->result();
                }
                else{
                    return false;
                }
    }

    public function GetStudentList(){

        $query=$this->db->query("SELECT * FROM student_email");
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function DeleteStudentFromStudemEmail($id){

        $this->db->delete('student_email', array('id' => $id));
        return true;
    }

    public function CheckEmailFronTeacher($email)
    {
        # code...
        $query=$this->db->query("SELECT * FROM teachers WHERE t_email='$email'");
        //echo $this->db->last_query(); exit;
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
    }
    
     
}
