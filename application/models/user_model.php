<?php 

class User_model extends CI_Model {

	public function get_users($user_id){

		//$query = $this->db->get('users'); //Select all user
		$query = $this->db->where(['id' => $user_id]);
		
		$query = $this->db->get('users');
		return $query->result();

		
	}


	public function create_user($data){
		$insert_data = $this->db->insert('users', $data);
		return $insert_data;

	}


	public function update_users($data, $id){
		$this->db->where(['id' => $id]);
		$this->db->update('users', $data);
		
	}


	public function delete_users($id){
		$this->db->where(['id' => $id]);
		$this->db->delete('users');
		
	}


	public function login_user($username, $password){

		$this->db->where('username', $username);
		$result = $this->db->get('users');
		$db_password = $result->row(2)->password; //Puisque le password a été haché on doit utiliser cette procedure pour comparer
		if(password_verify($password, $db_password)){
			return $result->row(0)->id;

		} else {
			return false;
		}
	}
}
?>