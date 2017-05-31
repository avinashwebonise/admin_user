<?php

class Dashboard extends CI_Controller {

public function __construct()
{
    parent::__construct(); 
	$this->load->model('admin/dashboard_model');
	$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
}

	public function index(){
		$list =	$this->dashboard_model->get_list();			
		$data['list'] = $list;
		$this->load->view('admin/Dashboard', $data);
	}
	
	public function add_user(){
		$this->form_validation->set_rules('Username', 'Username', 'required');
	    $this->form_validation->set_rules('Password', 'Password', 'required');
	
	if ($this->form_validation->run() == FALSE)
          {
             $this->load->view('admin/User_Registration');
          }
    else
          {
		    $success = $this->dashboard_model->add_user();
			if($success == true){
				$this->session->set_flashdata('msg', 'Success: User added successfully');
				$formaction = site_url() . "/admin/dashboard";
				header("location: $formaction");
			}else{
				$this->session->set_flashdata('msg', 'Error: User not added');
				header("location: $formaction");
			}			             
          }
		
	}
	
	public function edit_user($id){
		$user_info = $this->dashboard_model->get_user_data($id);
		$data['user_info'] = $user_info;		
		$this->form_validation->set_rules('Username', 'Username', 'required');
	    $this->form_validation->set_rules('Password', 'Password', 'required');
	
	if ($this->form_validation->run() == FALSE)
          {
             $this->load->view('admin/Edit_User',$data);
          }
    else
          {
		    $success = $this->dashboard_model->edit_user();
			if($success == true){
				$this->session->set_flashdata('msg', 'Success: User updated successfully');
				$formaction = site_url() . "/admin/dashboard";
				header("location: $formaction");
			}else{
				$this->session->set_flashdata('msg', 'Error: User not updated');
				header("location: $formaction");
			}			             
          }
		
	}
	
	public function delete_user($id){
		$success = $this->dashboard_model->delete_user($id);
		if($success == true){
				$this->session->set_flashdata('msg', 'Success: User deleted successfully');
				$formaction = site_url() . "/admin/dashboard";
				header("location: $formaction");
		 }else{
				$this->session->set_flashdata('msg', 'Error: User not deleted');
				header("location: $formaction");
			}			   
	}

}