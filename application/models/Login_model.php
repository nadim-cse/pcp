<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function AuthenticateAdminLoginCredentials($AdminData)
    {
          
            $QueryResult = $this->db->get_where('admin_table', $AdminData); // select query for code igniter
			
			if($QueryResult -> num_rows() == 1){

				

				$attribute_session = array(

					'current_admin_id'  => $QueryResult->row(0)->admin_id,
					'current_user_name'  => $QueryResult->row(1)->admin_username,
					'session_role' => $QueryResult->row(4)->role,
				);
				
                
            

				$this->session->set_userdata($attribute_session); // session set afte login succeess
				return TRUE;

			}
			else
			{
				return FALSE;
				
			}
	}
	public function is_admin_logged_in(){
		return $this->session->userdata('session_role')!= FALSE;
	}

	public function AuthenticateTeacherLoginCredentials($TeacherData){

		$QueryResult = $this->db->get_where('teachers', $TeacherData); // select query for code igniter
		
		if($QueryResult -> num_rows() == 1){

			

			$attribute_session = array(

				'current_teacher_id'  => $QueryResult->row(0)->t_id,
				'current_user_name'  => $QueryResult->row(1)->t_name,
				'session_role' => $QueryResult->row(4)->role,
			);
			
			
		

			$this->session->set_userdata($attribute_session); // session set afte login succeess
			return TRUE;

		}
		else
		{
			return FALSE;
			
		}
	}
	public function is_teacher_logged_in(){
		return $this->session->userdata('session_role')!= FALSE;
	}

	public function AuthenticateStudentLoginCredentials($StudentData)
	{
		$QueryResult = $this->db->get_where('student', $StudentData); // select query for code igniter
		
		if($QueryResult -> num_rows() == 1){

			

			$attribute_session = array(

				'current_member_id'  => $QueryResult->row(0)->m_id,
				'current_member_email'  => $QueryResult->row(0)->member_email,
				'current_memeber_student_id' => $QueryResult->row(4)->member_student_id,
				'current_user_name'  => $QueryResult->row(2)->member_name,
				'session_role' => $QueryResult->row(8)->role,
			);
			
			//echo "<pre>"; print_r($attribute_session);exit;
		

			$this->session->set_userdata($attribute_session); // session set afte login succeess
			return TRUE;

		}
		else
		{
			return FALSE;
			
		}
	}


	

}
