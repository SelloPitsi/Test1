
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Cache-Control: no cache");

session_cache_limiter("private_no_expire");

class Test_c extends CI_Controller {

	function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('Main_m');
			
	}
	public function index(){
  		
  		$data['action'] = "Test_c/saveUser";
  		$data['message'] = '';
  		$data['reset'] = FALSE;
		$this->load->view('form_v',$data);
	}


	/**
	* Save user information
	* 
	*
	* @param  name, surname, ID no, Date of Birth
	* @return user ID
	**/
	public function saveUser(){


		$rules = array(
	        array(
	                'field' => 'name',
	                'label' => 'name',
	                'rules' => 'required|min_length[3]',
	                'errors' => array(
	                        'required' => 'You must provide a %s.',
	                        'min_length' => 'You must provide a %s.',
	                ),
	        ),
	        array(
	                'field' => 'surname',
	                'label' => 'Surname',
	                'rules' => 'required|min_length[3]',
	                'errors' => array(
	                        'required' => 'You must provide a %s.',
	                        'min_length' => 'You must provide a %s.',
	                ),
	        ),
	        array(
	                'field' => 'id_no',
	                'label' => 'Surname',
	                'rules' => 'required|min_length[3]',
	                'errors' => array(
	                        'required' => 'You must provide a %s.',
	                        'min_length' => 'You must provide a %s.',
	                ),
	        ),
		);

		$this->form_validation->set_rules($rules);
		$this->form_validation->set_rules('id_no', 'ID No', 'numeric|trim|required|min_length[13]|max_length[13]');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required|max_length[10]|callback_is_start_date_valid');
		$data['reset'] = FALSE;


		if ($this->form_validation->run() == FALSE) {

			$data['action'] = "saveUser";
			$data['message'] = '';
			$this->load->view('form_v',$data);

		}else{
			$id_no =  $this->input->post('id_no'); 
			//Check For Duplicate
			
			//Save Information
			$account_data  = array(
				'name' =>  $this->input->post('name'), 
				'surname' =>  $this->input->post('surname'), 
				'id_no' => $id_no , 
				'dob' =>  $this->input->post('dob'), 

			);

			$acount = $this->Main_m->check_if_exists($id_no);

			if($acount == FALSE){
				$data['message'] = 'The user has been added successfully!';
				$this->Main_m->insertAccount($account_data);
				$data['reset'] = TRUE;
			}else{
				$data['message'] = 'The user already exists!';

			}
			//Send Success Message
			
			$data['action'] = "saveUser";
			$this->load->view('form_v',$data);

		}

	}
	

	function is_start_date_valid($date) {

		if (date('Y-m-d', strtotime($date)) == $date) {
			return TRUE;
		} else {
			$this->form_validation->set_message('is_start_date_valid', 'The {field} must be in format "dd/mm/yyyy"');
			return FALSE;
		}
		
	}



	
}
