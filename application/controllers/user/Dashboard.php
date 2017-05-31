<?php

class Dashboard extends CI_Controller {

public function __construct()
{
    parent::__construct(); 
	//$this->load->model('user/dashboard_model');
	$this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
}

	public function index(){
		//$user_data =	$this->dashboard_model->get_user_info();			
		//$data['user_data'] = $user_data;
		$this->load->view('user/Dashboard');
	}
		
}