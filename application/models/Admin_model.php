<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function GetTotalStudents(){

        $query=$this->db->query("SELECT * FROM student  WHERE status = '1' ");
        
        if($query->result()){

            return $query->num_rows();
        }
        else{

            return false;
        } 
    }

    public function GetTotalTeachers(){

        $query=$this->db->query("SELECT * FROM teachers  WHERE status = 1 ");
        
        if($query->result()){

            return $query->num_rows();
        }
        else{

            return false;
        }     

    }

    public function GetTotalProjects(){
        
                $query=$this->db->query("SELECT * FROM proposal  WHERE project_status = 1 ");
                
                if($query->result()){
        
                    return $query->num_rows();
                }
                else{
        
                    return false;
                }     
        
    }

    public function CheckStudentID($id)
    {
        # code...
        $query=$this->db->query("SELECT student_id FROM student_email  WHERE student_id = '$id' ");
                
        if($query->result()){

            return true;
        }
        else{

            return false;
        }   
    }

    
   
     
}
