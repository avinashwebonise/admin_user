<?php
class Login_model extends CI_Model {		
	
	public function check_credentials(){
		$uname = $this->input->post('Username');
		$pwd = md5($this->input->post('Password'));
		$sql = "SELECT * FROM tbl_user WHERE username = '$uname' AND password = '$pwd'";
		
		$result = $this->db->query($sql);
		
		if($result->num_rows() > 0){
			$row = $result->row();			
			$this->session->set_userdata('login', '1');
			$this->session->set_userdata('id', $row->id);
			$this->session->set_userdata('utype', $row->user_type);
			$this->session->set_userdata('username', $row->username);
			return true;
		}else{
			return false;
		}		
		
	}	
}
?>