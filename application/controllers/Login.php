<?php

class Login extends CI_Controller {

public function __construct()
{
    parent::__construct(); 
	$this->load->model('login_model');	
}

public function index() {	
	$this->form_validation->set_rules('Username', 'Username', 'required');
	$this->form_validation->set_rules('Password', 'Password', 'required');
	
	if ($this->form_validation->run() == FALSE)
          {
             $this->load->view('Login');
          }
    else
          {
		    $success = $this->login_model->check_credentials();
			if($success == true){
				$utype = $this->session->userdata('utype');;
				if($utype == '1'){	
					$url = site_url() . "/admin/Dashboard";
					header("Location:$url");					
					}
				else {
					$url = site_url() . "/user/Dashboard";
					header("Location:$url");									
					}
			}else{
				$data['err']='Invalid Credentials';
				$this->load->view('login', $data);
			}			             
          }
	
}
	
	public function logout(){
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('utype');
		$this->session->unset_userdata('username');
		$url = site_url();
		header("Location:$url");
	}

}//end of class
?>