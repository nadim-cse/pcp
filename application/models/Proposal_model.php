<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Proposal_model extends CI_Model
{

    public function InsertProposalAndMemberData($ProjectData){

        $this->db->insert('proposal',$ProjectData); // up to here it was working
        // echo $this->db->last_query();
        // echo "<br>";		       
       
        //$parentID=$this->db->query("SELECT MAX(parent_id) FROM `parent_info`");
        $member_email = $this->input->post('member_email');
        $MemberData = array(
            

            'member_email' => $member_email,
            'project_status' => '3',
            
                        
        );
    
    
    
      
        $proposal_id = $this->db->insert_id();
        $data2 = Proposal::arrayCustomizeForProposal($MemberData, $proposal_id);
        //echo "<pre>"; print_r($data2); exit;
       // $MultipleMemberData = Proposal::arrayCustomize($MemberData, $proposal_id);
        
        $this->db->update_batch('student', $data2, 'member_email'); 
    }

    public function GetNewProposals($t_id){

        $query=$this->db->query("SELECT * FROM proposal WHERE t_id = '$t_id'");
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function GetNewStudentProposal($std_id)
    {
        # code...
        $query=$this->db->query("SELECT * FROM proposal JOIN student ON proposal.proposal_id = student.proposal_id WHERE student.member_student_id = '$std_id'");
       // echo $this->db->last_query();
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
    }

    // public function GetNewStudentProposalForProjectBoard($std_id)
    // {
    //     # code...
    //     $query=$this->db->query("SELECT * FROM proposal JOIN student ON proposal.proposal_id = student.proposal_id WHERE student.member_student_id = '$std_id' AND proposal.project_status=1");
    //    // echo $this->db->last_query();
        
    //     if($query->result()){
    //         return $query->result();
    //     }
    //     else{
    //         return false;
    //     }
    // }
    public function GetNewStudentProposalForProjectBoard($std_id)
    {
        # code...
        $query=$this->db->query("SELECT * FROM proposal JOIN student ON proposal.proposal_id = student.proposal_id WHERE student.member_student_id = '$std_id' AND proposal.project_status=1");
       // echo $this->db->last_query();
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
    }
    public function GetProposalDetailsFull($proposal_id){

        $query=$this->db->query("SELECT proposal.*, student.* from proposal JOIN student ON student.proposal_id=proposal.proposal_id WHERE proposal.proposal_id = '$proposal_id'");
        //echo $this->db->last_query();exit;
        
        if($query->result()){
            return $query->result();
        }
        else{

            return false;
        } 
    }

    public function AcceptProposalData($proposalID,$comment,$t_id){

        
		$field = array(
		'project_status' => '1',
		'accepted_at'=>date('Y-m-d H:i:s'),
		'is_reffered'=> 0,
        't_comment'=> $comment,
        't_id' => $t_id
		);
		$this->db->where('proposal_id', $proposalID);
		$this->db->update('proposal', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
    }

    public function RejectProposal($proposalID){

        $field = array(
            'project_status' => '3',
            'rejected_at'=>date('Y-m-d H:i:s'),
            );
            $this->db->where('proposal_id', $proposalID);
            $this->db->update('proposal', $field);
            if($this->db->affected_rows() > 0){

                     $field = array(
                    'project_status_student' => 0,
                    );
                    $this->db->where('proposal_id', $proposalID);
                    $this->db->update('student', $field);
                    if($this->db->affected_rows() > 0){

                        return true;
                    }else{

                        return false;
                    }
            }else{
                return false;
            }
    }

    public function TransferProposals($t_id,$proposal_id)
    {
        $field = array(

            't_id' => $t_id,
            'proposal_id' => $proposal_id,
            'refered_time' => date('Y-m-d H:i:s')
        );
        $this->db->insert('referred_proposals',$field);
        return true;

    }
    public function UpdateProposals($proposal_id)
    {
        # code...
         $field = array(

            'is_reffered' => '1',
            
         );
            $this->db->where('proposal_id', $proposal_id);
            $this->db->update('proposal', $field);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
    }
    public function TransferProposalsList($t_id) 
    {
        $query=$this->db->query("SELECT proposal_id FROM referred_proposals WHERE t_id = '$t_id'");
        
        if($query->result()){
            return $query->result();
        }
        
           
        
    }

    public function TransferProposalsListTwo($proposalID)
    {
        $query=$this->db->query("SELECT proposal.*, referred_proposals.* ,teachers.t_name from proposal JOIN referred_proposals ON referred_proposals.proposal_id=proposal.proposal_id JOIN teachers ON proposal.t_id=teachers.t_id WHERE referred_proposals.proposal_id ='$proposalID'");

       
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
       
    }

    public function GetReferredProposals($t_id)
    {
        $query=$this->db->query("SELECT * FROM referred_proposals WHERE t_id = '$t_id'");
        
        if($query->result()){
            return $query->result();
        }
        else{
            return false;
        }
    }

    public function GetReferredProposalDetailsFull($proposal_id)
    {
        $query=$this->db->query("SELECT proposal.*, referred_proposals.* ,teachers.t_name, student.* from proposal JOIN referred_proposals ON referred_proposals.proposal_id=proposal.proposal_id JOIN teachers ON proposal.t_id=teachers.t_id JOIN student ON student.proposal_id = proposal.proposal_id WHERE referred_proposals.proposal_id ='$proposal_id'");
        
        if($query->result()){
                    return $query->result();
                }
                else{
                    return false;
                }
    }
     
}
