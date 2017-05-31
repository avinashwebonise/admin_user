<?php
class Dashboard_model extends CI_Model {		
	
	public function get_list(){		
		$sql = "SELECT * FROM tbl_user WHERE status = '1'";		
		$result = $this->db->query($sql);
		
		$list = array();		
			foreach ($result->result() as $row)
				{
					$temp = array();
					
					$temp['id'] = $row->id;
					$temp['firstname'] = $row->firstname;
					$temp['lastname'] = $row->lastname;
					$temp['city'] = $row->city;
					$temp['address'] = $row->address;
					$temp['username'] = $row->username;
					$temp['user_type'] = $row->user_type;					
					$temp['status'] = $row->status;
					$temp['created_on'] = $row->created_on;
					$temp['modified_on'] = $row->modified_on;
					$list[] = $temp;
						
				}		
			return $list;					
	}	
	
	public function add_user(){
		
		$data = array(
        'firstname' => $this->input->post('Firstname'),
        'lastname' => $this->input->post('Lastname'),
        'city' => $this->input->post('City'),
		'address' => $this->input->post('Address'),
		'user_type' => '2',
		'username' => $this->input->post('Username'),
		'password' => md5($this->input->post('Password')),
		'created_on' => date('Y-m-d H:i:s')
		);

		 if($this->db->insert('tbl_user', $data)){
			 return true;
		 }else{
			 return false;
		 }
	}
	
	public function get_user_data($id){
		$sql = "SELECT * FROM tbl_user WHERE id = $id";	
		$result = $this->db->query($sql);
		$row = $result->row_array();
		return $row;
	}
	
	public function delete_user($id){
		$data = array('status'=> '0');
		$this->db->where('id', $id);
		if($this->db->update('tbl_user', $data))
			return true;
		else
			return false;
	}
}
?>