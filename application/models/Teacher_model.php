<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model
{

    public function GetTeachersList(){

        $query=$this->db->query("SELECT * FROM teachers");
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
        
    }
    // public function GetTeachersListNew(){
        
    //     $query = $this->db->query("SELECT proposal.*, teachers.* FROM proposal JOIN teachers ON proposal.t_id = teachers.t_id WHERE teachers.t_id ='$t_id'");
                
    //             if($query->result()){
    //                 return $query->result();
    //             }
    //             else{
    //                 return false;
    //             }
                
    //  }
   
    public function GetTeachersTotalProjectNumber($t_id){

        $query = $this->db->query("SELECT * FROM proposal WHERE t_id = '$t_id'");
        return $query->num_rows();
    }
    public function GetStudentBelongsToTeacher($t_id){

        $query = $this->db->query("SELECT proposal.* from proposal JOIN teachers on proposal.t_id=teachers.t_id WHERE teachers.t_id = '$t_id' and proposal.project_status='1'");
        return $query->num_rows();
        
        
        
    }
    
    public function GetReferredTeacherEmail($t_id)
    {
        # code...
        $query=$this->db->query("SELECT t_email FROM teachers WHERE t_id= '$t_id'");
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function UpdateProjectLimit($RestProjectLimit,$t_id)
    {
        
        $LimitData = array(

            'remining_limit' => $RestProjectLimit
        );

		$this->db->where('t_id',$t_id);
		$this->db->update('teachers', $LimitData);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
       
    
    }
    public function InsertReferredData($RefferDetails,$proposal_id)
    {
        # code...
        $this->db->insert('referred_proposals',$RefferDetails); 

        $PrposalData = array(

            'is_reffered' => 1
        );

		$this->db->where('proposal_id',$proposal_id);
		$this->db->update('proposal', $PrposalData);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }
    
     
}
