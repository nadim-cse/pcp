<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Board_model extends CI_Model
{

    public function GetAcceptedProposals($t_id){

        $query=$this->db->query("SELECT proposal.*, student.* , teachers.* from proposal 
        JOIN student ON student.proposal_id=proposal.proposal_id
        JOIN teachers ON teachers.t_id = proposal.t_id
         WHERE teachers.t_id ='$t_id' and  project_status = 1 ");
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }

    public function InsertTaskData($TaskData)
    {
        # code...
        $this->db->insert('task',$TaskData); 
        return true;

    }

    public function InsertSubTaskData($SubTaskData){

        # code...
        $this->db->insert('sub_task',$SubTaskData); 
        return true;
    }
    public function GetTasks($proposal_id,$t_id)
    {
        # code...
        $query = $this->db->query("SELECT * FROM task WHERE proposal_id = '$proposal_id' and t_id = '$t_id' ORDER BY create_at ASC");
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }

    }

    public function GetSubTasks($task_id){

        $query = $this->db->query("SELECT * FROM sub_task WHERE task_id = '$task_id' ORDER BY subcreate_at ASC");
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        }
    }
    public function MarkCompeletedTask($task_id)
    {
        # code...
        $field = array(
            'task_status' => '1',
            'completed_at'=>date('Y-m-d H:i:s')
            );
         $this->db->where('task_id', $task_id);
         $this->db->update('task', $field);
        if($this->db->affected_rows() > 0){
                return true;
         }else{
                return false;
         }

    }
    public function MarkRejectedTask($task_id)
    {
        # code...
        $field = array(
            'task_status' => '2',
            'completed_at'=>date('Y-m-d H:i:s')
            );
         $this->db->where('task_id', $task_id);
         $this->db->update('task', $field);
        if($this->db->affected_rows() > 0){
                return true;
         }else{
                return false;
         }

    }

    public function InsertLinkData($data){

        $this->db->insert('link',$data); 
        return true;
    }

    public function GetLinks($proposal_id,$student_id){

         # code...
         $query = $this->db->query("SELECT * FROM link WHERE proposal_id = '$proposal_id'  ORDER BY link_create_at ASC");
        // echo $this->db->last_query();
         if($query->result()){
             return $query->result();
         }
         else{
            return false;
         }  
    }

    public function GetLinksForTeacher($proposal_id){

         # code...
         $query = $this->db->query("SELECT * FROM link WHERE proposal_id = '$proposal_id' ORDER BY link_create_at ASC");
         if($query->result()){
             return $query->result();
         }
         else{
            return false;
         }  

    }

    public function InsertFileData($FileData){

        $this->db->insert('files',$FileData); 
        return true;
    }

    // public function GetFiles($proposal_id,$student_id){

    //     # code...
    //     $query = $this->db->query("SELECT * FROM files WHERE proposal_id = '$proposal_id' and uploaded_by = '$student_id' ORDER BY create_at ASC");
    //     if($query->result()){
    //         return $query->result();
    //     }
    //     else{
    //        return false;
    //     }  
    // }

    public function GetFiles($proposal_id,$student_id){

        # code...
        $query = $this->db->query("SELECT * FROM files WHERE proposal_id = '$proposal_id'  ORDER BY create_at ASC");
        if($query->result()){
            return $query->result();
        }
        else{
           return false;
        }  
    }

    public function GetFilesForTeacher($proposal_id){

       # code...
       $query = $this->db->query("SELECT * FROM files WHERE proposal_id = '$proposal_id' ORDER BY create_at ASC");
       if($query->result()){
           return $query->result();
       }
       else{
          return false;
       }  
    }
    
   
     
}
