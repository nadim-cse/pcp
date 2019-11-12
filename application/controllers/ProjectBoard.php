<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Dhaka');

class ProjectBoard extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
	    
	    $this->load->model('Login_model');
		$this->load->model('Proposal_model');
        $this->load->model('Teacher_model');
        $this->load->model('Board_model');
	   
		    
	}

	public function index($t_id)
	{
        $data['proposalLists'] = $this->Board_model->GetAcceptedProposals($t_id);
        $myCustomArray = array();
		
		if(!empty($data['proposalLists'])){

			foreach($data['proposalLists'] as $result){
				
				$project_name = $result->project_name;
				if(array_key_exists($project_name, $myCustomArray)){
					array_push($myCustomArray[$project_name], (array) $result);
				
				
				}
				else{
					$myCustomArray[$project_name] = array();
					array_push($myCustomArray[$project_name], (array) $result);
				}
			
         }
         $data['BoardResOBJ'] = json_decode(json_encode($myCustomArray));
         

        //echo "<pre>"; print_r($data['BoardResOBJ']); exit;
        $this->load->view('include/header');
		$this->load->view('board/project-board-home',$data);
		$this->load->view('include/footer');

		}else{

			$data['BoardResOBJ'] = json_decode(json_encode($myCustomArray));
			
			//echo "<pre>"; print_r($data['BoardResOBJ']); exit;
			$this->load->view('include/header');
			$this->load->view('board/project-board-home',$data);
			$this->load->view('include/footer');
			
		}
			 
       		 
       
    }
    
	public function ManageProject($proposal_id,$t_id,$m_id){
		
				//echo $proposal_id." ".$t_id." ".$m_id;
				$data['proposal_id'] = $proposal_id;
				$task_id = 0;
				$data['tasks'] = $this->Board_model->GetTasks($proposal_id,$t_id);
				$data['Links'] = $this->Board_model->GetLinksForTeacher($proposal_id);
				$data['Files'] = $this->Board_model->GetFilesForTeacher($proposal_id);
				//echo "<pre>"; print_r($data['Files']); exit;
				
				$myCustomArray = array();
				if(!empty($data['Files']) || !empty($data['Links']) || !empty($data['tasks']))
				{
				if(!empty($data['tasks'])){

					foreach($data['tasks'] as $result)
					{
						$create_at = date("d F, Y ", strtotime($result->create_at));
						$task_id = $result->task_id;
						if(array_key_exists($create_at, $myCustomArray)){
							array_push($myCustomArray[$create_at], (array) $result);
						
						
						}
						
						else{
							$myCustomArray[$create_at] = array();
							array_push($myCustomArray[$create_at], (array) $result);
						}
					
					}

				}	 
			
					
					 
					 
					 $myCustomArrayTwo = array();	 
					 if(!empty($data['Links'])){

						foreach($data['Links'] as $result)
						{
							
												$link_create_at = date("d F, Y ", strtotime($result->link_create_at));
												if(array_key_exists($link_create_at, $myCustomArrayTwo)){
													array_push($myCustomArrayTwo[$link_create_at], (array) $result);
												
												
												}
												
												else{
													$myCustomArrayTwo[$link_create_at] = array();
													array_push($myCustomArrayTwo[$link_create_at], (array) $result);
												}
							
											 }
											 
					 }
					 
					 
					 $myCustomArrayThree = array();	 
					 if(!empty( $data['Files'])){

						foreach($data['Files'] as $result){
							
												$file_create_at = date("d F, Y ", strtotime($result->create_at));
												if(array_key_exists($file_create_at, $myCustomArrayThree)){
													array_push($myCustomArrayThree[$file_create_at], (array) $result);
												
												
												}
												
												else{
													$myCustomArrayThree[$file_create_at] = array();
													array_push($myCustomArrayThree[$file_create_at], (array) $result);
												}
							
						}
						
					 }
					

					$data['BoardResOBJ'] = json_decode(json_encode($myCustomArray));
					$data['LinkResOBJ'] = json_decode(json_encode($myCustomArrayTwo));
					$data['FileResOBJ'] = json_decode(json_encode($myCustomArrayThree));
					
					//echo "<pre>"; print_r($data['FileResOBJ']); exit;
					$this->load->view('include/header');
					$this->load->view('board/project-manage',$data);
					$this->load->view('include/footer');

				}else{

					$data['BoardResOBJ'] = json_decode(json_encode($myCustomArray));
					
					//echo "<pre>"; print_r($data['BoardResOBJ']); exit;
					$this->load->view('include/header');
					$this->load->view('board/project-manage',$data);
					$this->load->view('include/footer');

				}	
					
		
	}
	public function DeleteSubTask($subtask_id)
	{
		# code...
		$this->db->delete('sub_task', array('subtask_id' => $subtask_id));
		
		redirect($_SERVER['HTTP_REFERER']);

	}
	
	public function GetTaskDetails()
	{
		$task_headline = $this->input->post('task_headline');
		$task_details = $this->input->post('task_details');
		$t_id = $this->input->post('t_id');
		$proposal_id = $this->input->post('proposal_id');

		$TaskData = array(

				  't_id' => $t_id, 	
				  'proposal_id' => $proposal_id,
				  'task_headline' => $task_headline,
				  'task_details' => $task_details,
				  'create_at' => date('Y-m-d H:i:s'),
				  'task_status' => '0',
			
					  
		);
		//echo "<pre>"; print_r($TaskData);
		$result = $this->Board_model->InsertTaskData($TaskData);
		if($result){
			echo "1";
		}
		else{
			echo "2";
		}
	}

	
	public function GetTasksForStudent($student_id)
	{
		# code...
		// echo $student_id;
		$proposalID =0 ; $t_id =0;
		$data['proposalDetails'] = $this->Proposal_model->GetNewStudentProposalForProjectBoard($student_id);
		
		//echo "<pre>"; print_r($data['proposalDetails']); exit;
		
		if(!empty($data['proposalDetails'])){

			foreach($data['proposalDetails'] as $pdata){

				$proposalID =  $pdata->proposal_id;
				$t_id = $pdata->t_id;
			}
	
		

			$data['tasks'] = $this->Board_model->GetTasks($proposalID,$t_id);
			$data['Links'] = $this->Board_model->GetLinks($proposalID,$student_id);
			$data['Files'] = $this->Board_model->GetFiles($proposalID,$student_id);
			$data['proposal_id'] = $proposalID;
			$myCustomArray = array();
			$myCustomArrayThree = array();	 
			$myCustomArrayTwo = array();
			//echo $t_id;
			//echo "<pre>"; print_r($data['Files']); exit;
			if(!empty($data['Files']) || !empty($data['Links']) || !empty($data['tasks']))
			{
							
						
					if(!empty($data['tasks'])){

						foreach($data['tasks'] as $result){
							$create_at = date("d F, Y ", strtotime($result->create_at));
							if(array_key_exists($create_at, $myCustomArray)){
								array_push($myCustomArray[$create_at], (array) $result);
							
							}
											
			
							else{
								$myCustomArray[$create_at] = array();
								array_push($myCustomArray[$create_at], (array) $result);
							}
						
						}
					}		
					
				
					if(!empty($data['Links'])){
						foreach($data['Links'] as $result){
	
						$link_create_at = date("d F, Y ", strtotime($result->link_create_at));
						if(array_key_exists($link_create_at, $myCustomArrayTwo)){
							array_push($myCustomArrayTwo[$link_create_at], (array) $result);
						
						
						}
						
						else{
							$myCustomArrayTwo[$link_create_at] = array();
							array_push($myCustomArrayTwo[$link_create_at], (array) $result);
						}
	
						}
					
					}	
					
					if(!empty($data['Files'])){  
						foreach($data['Files'] as $result){
		
							$file_create_at = date("d F, Y ", strtotime($result->create_at));
							if(array_key_exists($file_create_at, $myCustomArrayThree)){
								array_push($myCustomArrayThree[$file_create_at], (array) $result);
							
							
							}
							
							else{
								$myCustomArrayThree[$file_create_at] = array();
								array_push($myCustomArrayThree[$file_create_at], (array) $result);
							}
		
						}
					
						}	
					
					
					
					
				

						$data['BoardResOBJ'] = json_decode(json_encode($myCustomArray));
						$data['LinkResOBJ'] = json_decode(json_encode($myCustomArrayTwo));
						$data['FileResOBJ'] = json_decode(json_encode($myCustomArrayThree));
						//echo "<pre>"; print_r($data['FileResOBJ']); exit;
						$this->load->view('include/header');
						$this->load->view('board/project-manage-student',$data);
						$this->load->view('include/footer');
			}		
			else
			{
				$data['proposal_id'] = 0;
				$data['BoardResOBJ'] = "";
				$this->load->view('include/header');
				$this->load->view('board/project-manage-student',$data);
				$this->load->view('include/footer');
			}
		}
		else{
				$data['proposal_id'] = 0;
				$data['BoardResOBJ'] = "";
				$data['student_id'] =  $student_id;
				$this->load->view('include/header');
				$this->load->view('board/project-manage-student',$data);
				$this->load->view('include/footer');

		}
				
		
		 
				//echo "<pre>"; print_r($data['BoardResOBJ']); exit;

	}

	public function CompleteTask($task_id)
	{
		# code...
		$result = $this->Board_model->MarkCompeletedTask($task_id);
		if($result){
			
			$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>This task is completed successfully</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			echo "2";
		}

	}
	public function RejectTask($task_id)
	{
		# code...
		$result = $this->Board_model->MarkRejectedTask($task_id);
		if($result){
			
			$this->session->set_flashdata('success','<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>This task is rejected successfully</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
		else{
			echo "2";
		}
	}

	public function GetLinkDetails(){

		$title = $this->input->post('link_title');
		$url = $this->input->post('link_url');
		$studentID = $this->input->post('student_id');
		$proposal_id = $this->input->post('proposal_id');

		$data = array(

			'link_title' => $title,
			'link_url' => $url,
			'student_id' => $studentID,
			'proposal_id' => $proposal_id,
			'link_create_at' => date('Y-m-d H:i:s'),
			
		);
		//echo "<pre>"; print_r($data); exit;
		$result = $this->Board_model->InsertLinkData($data);
		if($result){
			echo "1";
		}else{
			echo "3";
		}
	}

	public function GetFileDetails(){

		// Receive input data

		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|jpeg|png|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|exe|sql'; 
        $config['max_size']             = 5000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['encrypt_name']         = true;
        $config['file_ext_tolower']     = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file'))
        {
                $error = array('error' => $this->upload->display_errors());

				echo "3";
				echo "<pre>"; print_r($error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

              
                $path = $data['upload_data']['full_path'];
                $string = (explode("/",$path));
                
                $str = $string[5].'';
                //$str .= $string[6];
                 $fullpath =  base_url().'uploads/'.$str;

                $file_name = $this->input->post('file_name');
                $file_details = $this->input->post('file_details');
                $studentID = (int)$this->input->post('student_id');
                $proposal_id = (int)$this->input->post('proposal_id');

                 $filename= $data["upload_data"]["full_path"];
                $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

                $FileData = array(
                    
                 'file_title' => $file_name,
                 'file_path' => $fullpath,
                 'file_details' => $file_details,
                 'uploaded_by' => $studentID,
                 'create_at' => date('Y-m-d H:i:s'),
                 'proposal_id' => $proposal_id,
                 'file_type' => $file_ext,
                 
                     
               );

              //echo "<pre>"; print_r($FileData); exit;
			   $result = $this->Board_model->InsertFileData($FileData);
			   if($result == TRUE){
					echo "1";
			   }else{
					echo "0";
			   }
			//echo "1";

		}
	}

}
