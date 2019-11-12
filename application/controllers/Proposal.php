<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class Proposal extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	    $this->load->model('Login_model');
		$this->load->model('Proposal_model');
		$this->load->model('Teacher_model');
		$this->load->model('Student_model');
	  
		    
	}
	public function CheckEmails(){

		$this->load->view('include/header');
		$this->load->view('student/email-check');
		$this->load->view('include/footer');
	}
	static function arrayCustomizing($myArray){
		
	  	$countRow = count($myArray['member_email']);
		
		$customArray = array();
		
		for($counter=0; $counter<$countRow; $counter++){
		// if(!empty($myArray["team_leader"][$counter])){

			$customSingleArray = array
			(
			   'member_email' => $myArray["member_email"][$counter],
			  
			);
	
		
		   array_push($customArray, $customSingleArray);
	    }
		
		   return $customArray;
		
	}
	public function CheckEmail(){

		 $emails = $this->input->post('emails');

		$data = array(

			'member_email'=> $emails
		);
		echo "<pre>"; print_r($data); exit;

	
	}
	public function Submit(){
		
		 $data['emails'] = $this->input->post('fetchedemails');
		 $data['GetEmails']  = json_decode($data['emails']);
		
		 $this->index($data['GetEmails']);

	}
	public function index($data)
	{	
	
		$data['student_email']  = $data ;
	
		foreach ($data['student_email'] as $value) 
		{
			 $email = $value;

				$query = $this->db->query("SELECT * FROM student WHERE member_email ='$email'");
				$result = $query->result();
				if($result){

					//echo "<pre>";var_dump($result);exit;
					foreach($result as $emailAddress){

						
						$data['NewEmails'][] = array(
							
							'emails' => $emailAddress->member_email,
							'ids' => $emailAddress->member_student_id,
							'names' => $emailAddress->member_name,
							
						  );
						 
					}
					
					
					

				}
			}

				$t_id = 0;
				$data['tdetails'] = $this->Teacher_model->GetTeachersList();
				if(!empty($data['tdetails'])){
   
				   $myCustomArray = array();
				   
					   
					   foreach($data['tdetails'] as $result){
						   $t_id = $result->t_id;
						   $data['tpn'] = $this->Teacher_model->GetTeachersTotalProjectNumber($t_id);
						   
						   $total_pro = $data['tpn'];
						   if(array_key_exists($total_pro, $myCustomArray)){
							   array_push($myCustomArray[$total_pro], (array) $result);
						   
						   
						   }
						   
						   else{
							   $myCustomArray[$total_pro] = array();
							   array_push($myCustomArray[$total_pro], (array) $result);
						   }
					   
					}
					$data['resObj'] = json_decode(json_encode($myCustomArray));
						
					
					 $this->load->view('include/header');
					  $this->load->view('student/proposal-view',$data);
					  $this->load->view('include/footer');
				}
				else{
   
				   $data['resObj'] = json_decode(json_encode(""));
				   
				   //echo "<pre>"; print_r($data['resObj']);
		  
					 $this->load->view('proposal/proposal-home',$data);
				}	 


			
		   
			

		
			
			
			
	} 

	public function CheckNonLoggedInEmailAddress(Type $var = null)
	{
		# code...
		$email = $this->input->get('NonLoggedInEmail');
		$CurrentEmail = $this->input->get('CurrentStudentEmail');
		if($email == $CurrentEmail){

			echo json_encode("3");
		}else{

			$Query1 = $this->db->query("SELECT student_email FROM student_email WHERE student_email = '$email' AND status = 1");
		
		if($Query1->result() == true){

			$Query2 = $this->db->query("SELECT member_email FROM student WHERE member_email = '$email' AND project_status_student = 1 ");
			if($Query2->result() == true){

				
				
				//echo json_encode("This ".$email." could not be your partner");
				echo json_encode("0");

			}else{

				//echo json_encode("This email could be your partner");
				echo json_encode("1");
			}
			//echo json_encode("Registered Email ".$email);
		}
		else{

			//echo json_encode($email);
			echo json_encode("2");
		}
	}
		
		
	}
	public function ProposalDataGeneration(Type $var = null)
	{
		# code...
		$data = array();
		//$LoggedINEmail = $this->input->post('LoggedInEmail');
		$NonLoggedINEmail = '';
		if(isset($_POST['NonLoggedInEmail'])){
			
			$NonLoggedINEmail = $this->input->post('NonLoggedInEmail');
			
			array_push($data,$NonLoggedINEmail,$this->input->post('LoggedInEmail'));

			$this->index($data);

			
			

		}else{

			array_push($data,$this->input->post('LoggedInEmail'));

			$this->index($data);

		}

	}
       
    static function arrayCustomizeForProposal($myArray, $proposal_id)
	{
		
		$countRow = count($myArray['member_email']);
	  
	  $customArray = array();	
	  
	  for($counter=0; $counter<$countRow; $counter++){
	  // if(!empty($myArray["team_leader"][$counter])){

		  $customSingleArray = array
		  (
			 'member_email' => $myArray["member_email"][$counter],
			 'project_status_student' => 1,
			 
			 'proposal_id' => $proposal_id
			
		  );
		  
	  
		 array_push($customArray, $customSingleArray);
	  }
	  
		 return $customArray;
	  
     }
	public function GetProposalData(){

	

					$projectName = $this->input->post('project_name');
					$projectCategory = $this->input->post('project_cat');
					$courseCode = $this->input->post('course_code');
					$projectAbstract = $this->input->post('abstract');
					$projectFeatures = $this->input->post('features');
					$projectModules = $this->input->post('modules');
					$projectTools = $this->input->post('tools');
					$projectConclusion = $this->input->post('conclusion');
			

			
					// Teacher Details
					$TeacherId = $this->input->post('t_id');
			
					$ProjectData = array(
					  't_id' => $TeacherId, 	
					  'project_name' => $projectName,
					  'project_cat' => $projectCategory,
					  'course_code' => $courseCode,
					  'project_abstract' => $projectAbstract,
					  'project_features' => $projectFeatures,
					  'project_modules' => $projectModules,
					  'project_tools' => $projectTools,
					  'project_conclusion' => $projectConclusion,
					  'request_time' => date('Y-m-d H:i:s'),
					  'project_status' => 0
						  
					);
					
					$result = $this->Proposal_model->InsertProposalAndMemberData($ProjectData);
					$this->ProposalSuccess();
				//}
				
		//}
		
		



	}
	
	public function ProposalSuccess(){

		$this->load->view('include/header');
		$this->load->view('login/proposal-success');
		$this->load->view('include/footer');
	}

	public function viewNewProposals($t_id){
		
		$data['proposalLists'] = $this->Proposal_model->GetNewProposals($t_id);
		//echo "<pre>"; print_r($data); exit;
		$this->load->view('include/header');
		$this->load->view('teacher/teacher-proposal-list',$data);
		$this->load->view('include/footer-datatable');
		
		
	}

	public function viewProposalFullDetails($proposal_id){
		//echo $proposal_id;

		
		$data['pdetails'] = $this->Proposal_model->GetProposalDetailsFull($proposal_id);
		//echo "<pre>"; print_r($data['pdetails']); exit;

		if(!empty($data['pdetails'])){

			$myCustomArray = array();
			
			foreach($data['pdetails'] as $result){
				$project_name = $result->project_name;
				if(array_key_exists($project_name, $myCustomArray)){
					array_push($myCustomArray[$project_name], (array) $result);
				
				
				}
				
				else{
					$myCustomArray[$project_name] = array();
					array_push($myCustomArray[$project_name], (array) $result);
				}
			
		 }

		 $t_id = 0;
		 $data['tdetails'] = $this->Teacher_model->GetTeachersList();
		
			$myCustomArrayNew = array();
			
				
				foreach($data['tdetails'] as $result){
					$t_id = $result->t_id;
					$data['tpn'] = $this->Teacher_model->GetTeachersTotalProjectNumber($t_id);
					
					$total_pro = $data['tpn'];
					if(array_key_exists($total_pro,$myCustomArrayNew)){
						array_push($myCustomArrayNew[$total_pro], (array) $result);
					
					
					}
					
					else{
						$myCustomArrayNew[$total_pro] = array();
						array_push($myCustomArrayNew[$total_pro], (array) $result);
					}
				
			 }
			 $data['resultObj'] = json_decode(json_encode($myCustomArrayNew));

		 	$data['resObj'] = json_decode(json_encode($myCustomArray));
			// echo "<pre>"; print_r($data['resultObj'] ); exit;
			$this->load->view('include/header');
			$this->load->view('teacher/teacher-proposal-view',$data);
			$this->load->view('include/footer');

		}else{
					$data['resultObj'] = "";
					//$data['resultObj'] = "";
			
					//$data['resObj'] = json_decode(json_encode($myCustomArray));
					// $data['resObj'] = "";
					//echo "<pre>"; print_r($data['resultObj'] );
					$this->load->view('include/header');
					$this->load->view('teacher/teacher-proposal-view',$data);
					$this->load->view('include/footer');
		}
		
		
	}
	public function AcceptProposal(){

		$comment =  $this->input->post('teacher_comment');
		$proposalID =  $this->input->post('proposal_id');
		$projectname =  $this->input->post('project_name');
		$t_id =  $this->input->post('t_id');
		$ProjectLimit = 0;
		$RestProjectLimit = 0;

		$query = $this->db->query("SELECT remining_limit FROM teachers WHERE t_id ='$t_id'");
		$result = $query->result();
		foreach($result as $project_limit){

			$ProjectLimit = $project_limit->project_limit;
		}
		
		 
		$RestProjectLimit = $ProjectLimit + 1 ;
		
		$result = $this->Proposal_model->AcceptProposalData($proposalID,$comment,$t_id);
		if($result){

			$UpdateProjectLimit = $this->Teacher_model->UpdateProjectLimit($RestProjectLimit,$t_id);
			if($UpdateProjectLimit){


				$MemberEmail = '';
			$data['emails'] = [];
			
			$res2 = $this->Student_model->GetStudentEmail($proposalID);
			
			foreach($res2 as $res){
	
				// $MemberEmail = $res->member_email;
	
				  $MemberEmail= array(
	
					  'emails' => $res->member_email.','
					  
				  );
				array_push($data['emails'],$MemberEmail);
				
			}
	
		
			$myCustomArray = array();
			
				
				foreach($res2 as $result){
					$emails = $result->member_email;
					if(array_key_exists($emails, $myCustomArray)){
						array_push($myCustomArray[$emails], (array) $result);
					
					
					}
					
					else{
						$myCustomArray[$emails] = array();
						array_push($myCustomArray[$emails], (array) $result);
					}
				
			 }
			 $data['resObj'] = json_decode(json_encode($myCustomArray));
			// echo "<pre>"; print_r( $data['resObj']); 
			 foreach($data['resObj']  as $emails => $value){
				 
				 //echo $emails;
				 $link = base_url('student-account-registration/'.urlencode($emails));
				 $data['links'] = array(
	
					'token' => $link,
	
				 );
				 $data['AcceptTime'] = date('Y-M-d | h:i');
				 $data['ProjectName'] = $projectname;

				 
	
				 $data['tokenOBJ'] = json_decode(json_encode($data['links']));
				
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->from('testphpmaileremail@gmail.com', 'Proposal Has Been Accepted');
				$this->email->to($emails);
				$this->email->subject('Proposal Has Been Accepted'); 
				
				$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
					
				$this->email->set_header('Content-type', 'text/html');
				
				$body = $this->load->view('email/account-activation-student',$data,TRUE);
	
				$this->email->message($body);  
	
				$this->email->send();


					
			 }

			 
			}
			$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>Proposal Accepted Successfully</div>');
			 redirect($_SERVER['HTTP_REFERER']);
			
		}
		
		 
		
		
	}

	function RejectProposal($proposalID,$project_name){

		$result = $this->Proposal_model->RejectProposal($proposalID);
		//$result = $proposalID;
		if($result){
		
			$MemberEmail = '';
			$data['emails'] = [];
			
			$res2 = $this->Student_model->GetStudentEmail($proposalID);
			
			foreach($res2 as $res){
	
				// $MemberEmail = $res->member_email;
	
				  $MemberEmail= array(
	
					  'emails' => $res->member_email
					  
				  );
				array_push($data['emails'],$MemberEmail);
				
			}
	
		
			$myCustomArray = array();
			
				
				foreach($res2 as $result){
					$emails = $result->member_email;
					if(array_key_exists($emails, $myCustomArray)){
						array_push($myCustomArray[$emails], (array) $result);
					
					
					}
					
					else{
						$myCustomArray[$emails] = array();
						array_push($myCustomArray[$emails], (array) $result);
					}
				
			 }
			 $data['resObj'] = json_decode(json_encode($myCustomArray));
	
			 foreach($data['resObj']  as $emails => $value){
				 
				 //echo $emails;
				 $link = base_url('student-proposal-view/'.$proposalID);
				 $data['links'] = array(
	
					'token' => $link,
	
				 );
				 $data['projectName'] = urldecode($project_name);
	
				 $data['tokenOBJ'] = json_decode(json_encode($data['links']));
	
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->from('testphpmaileremail@gmail.com', 'Project Proposal Rejection');
				$this->email->to($emails);
				$this->email->subject('Project Proposal Rejection'); 
				
				$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
					
				$this->email->set_header('Content-type', 'text/html');
				
				$body = $this->load->view('email/proposal-deny',$data,TRUE);
	
				$this->email->message($body);  
				 //$this->email->message("Hello");  
	
				$this->email->send();

				
				
			}
			$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>Proposal Rejected Successfully</div>');
			redirect($_SERVER['HTTP_REFERER']);
					
		}
	}


	public function TransferProposal(){

		 $transferList = $this->input->post('proposaldetails');
		 $pieces = explode(",", $transferList);
		 $t_id = $pieces[0]; 
		 $proposal_id = $pieces[1]; 
		 $current_name = $pieces[2]; 
		 $ReferredFrom = $pieces[3]; 

		 $RefferDetails = array(

			't_id' => $t_id,
			'referred_from' => $ReferredFrom,
			'referred_from_name' => $current_name,
			'proposal_id' =>  $proposal_id,
			'referred_time' =>  date('Y-m-d H:i:s')
		 );
		 //echo "<pre>"; print_r($RefferDetails); exit;
		 $res = $this->Teacher_model->InsertReferredData($RefferDetails,$proposal_id);
		 

		
	
		
	}

	public function ViewReferredProposalDetails($proposal_id)
	{
		# code...
		$data['pdetails'] = $this->Proposal_model->GetProposalDetailsFull($proposal_id);
		
				
				$myCustomArray = array();
					
					foreach($data['pdetails'] as $result){
						$project_name = $result->project_name;
						if(array_key_exists($project_name, $myCustomArray)){
							array_push($myCustomArray[$project_name], (array) $result);
						
						
						}
						
						else{
							$myCustomArray[$project_name] = array();
							array_push($myCustomArray[$project_name], (array) $result);
						}
					
				 }
		
				 $t_id = 0;
				 $data['tdetails'] = $this->Teacher_model->GetTeachersList();
				
					$myCustomArrayNew = array();
					
						
						foreach($data['tdetails'] as $result){
							$t_id = $result->t_id;
							$data['tpn'] = $this->Teacher_model->GetTeachersTotalProjectNumber($t_id);
							
							$total_pro = $data['tpn'];
							if(array_key_exists($total_pro,$myCustomArrayNew)){
								array_push($myCustomArrayNew[$total_pro], (array) $result);
							
							
							}
							
							else{
								$myCustomArrayNew[$total_pro] = array();
								array_push($myCustomArrayNew[$total_pro], (array) $result);
							}
						
					 }
					 $data['resultObj'] = json_decode(json_encode($myCustomArrayNew));
		
				 $data['resObj'] = json_decode(json_encode($myCustomArray));
				echo "<pre>"; print_r($data['resultObj'] );
				$this->load->view('login/login-header');
				$this->load->view('proposal/referred-proposal-view',$data);
				$this->load->view('login/login-footer');
				
	}

	public function viewReferredProposals($t_id){
		$proposalID = 0 ;
		$result1 = $this->Proposal_model->TransferProposalsList($t_id);
		if(!empty($result1)){

			foreach($result1 as $p){
				$proposalID = $p->proposal_id;
			}
			$data['proposalLists'] = $this->Proposal_model->TransferProposalsListTwo($proposalID);
			//echo "<pre>"; print_r($data['proposalLists']); exit;
			$this->load->view('include/header');
			$this->load->view('teacher/teacher-referred-proposal-list',$data);
			$this->load->view('include/footer-datatable');

		}else{

			$data['proposalLists'] = $this->Proposal_model->TransferProposalsListTwo($proposalID);
			$this->load->view('include/header');
			$this->load->view('teacher/teacher-referred-proposal-list',$data);
			$this->load->view('include/footer-datatable');
		}
		

		
	}

	public function viewMemberProposal($std_id)
	{
		//echo $std_id;
		$proposal_id = 0;
		$data['proposalDetails'] = $this->Proposal_model->GetNewStudentProposal($std_id);
		//echo "<pre>"; print_r($data['proposalDetails']); exit;
		if(!empty($data['proposalDetails']))
		{
			foreach($data['proposalDetails'] as $pdata){
				$proposal_id =  $pdata->proposal_id;
			}
			$data['pdetails'] = $this->Proposal_model->GetProposalDetailsFull($proposal_id);
			//echo "<pre>"; print_r($data['pdetails']); exit;
			$myCustomArray = array();
			
				
				foreach($data['pdetails'] as $result){
					$project_name = $result->project_name;
					if(array_key_exists($project_name, $myCustomArray)){
						array_push($myCustomArray[$project_name], (array) $result);
					
					
					}
					
					else{
						$myCustomArray[$project_name] = array();
						array_push($myCustomArray[$project_name], (array) $result);
					}
				
			 }
			 $data['resObj'] = json_decode(json_encode($myCustomArray));
			//echo "<pre>"; print_r($data['resObj']); exit;
			$this->load->view('include/header');
			$this->load->view('student/student-proposal-details',$data);
			$this->load->view('include/footer-datatable');
			
		}else{

			$data['resObj'] = "";
			//echo "<pre>"; print_r($data['resObj']); exit;
			$this->load->view('include/header');
			$this->load->view('student/student-proposal-details',$data);
			$this->load->view('include/footer-datatable');

		}
	}
	public function viewReferredProposalFullDetails($proposal_id)
	{
		$data['pdetails'] = $this->Proposal_model->GetReferredProposalDetailsFull($proposal_id);
		$myCustomArray = array();
		
			
			foreach($data['pdetails'] as $result){
				$project_name = $result->project_name;
				if(array_key_exists($project_name, $myCustomArray)){
					array_push($myCustomArray[$project_name], (array) $result);
				
				
				}
				
				else{
					$myCustomArray[$project_name] = array();
					array_push($myCustomArray[$project_name], (array) $result);
				}
			
		 }
		 $t_id = 0;
		 $data['tdetails'] = $this->Teacher_model->GetTeachersList();
		
			$myCustomArrayNew = array();
			
				
				foreach($data['tdetails'] as $result){
					$t_id = $result->t_id;
					$data['tpn'] = $this->Teacher_model->GetTeachersTotalProjectNumber($t_id);
					
					$total_pro = $data['tpn'];
					if(array_key_exists($total_pro,$myCustomArrayNew)){
						array_push($myCustomArrayNew[$total_pro], (array) $result);
					
					
					}
					
					else{
						$myCustomArrayNew[$total_pro] = array();
						array_push($myCustomArrayNew[$total_pro], (array) $result);
					}
				
			 }
			 $data['resultObj'] = json_decode(json_encode($myCustomArrayNew));
		 $data['resObj'] = json_decode(json_encode($myCustomArray));
		// echo "<pre>"; print_r($data['resObj'] );
		$this->load->view('include/header');
		$this->load->view('teacher/teacher-referred-proposal-view',$data);
		$this->load->view('include/footer');

	}
}
