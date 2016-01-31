<?php
class task_model extends CI_Model {


	public function get_task($id){
		$this->db->where('id', $id);
		$query = $this->db->get('tasks');
		return $query->row();
	}


	public function get_all_tasks(){
		$query = $this->db->get('tasks');
		return $query->result();

	}


	public function create_task($data){
		$query = $this->db->insert('tasks',$data);
		return $query;
	}


	public function edit_task($data, $task_id){
		$this->db->where('id', $task_id);
		$query = $this->db->update('tasks', $data);
		return $query;
	}


	public function get_project_tasks($project_id){
		$this->db->where('project_id', $project_id);
		$query = $this->db->get('tasks');
		return $query->result();
	}


	public function delete_task($task_id){
		$this->db->where('id', $task_id);
		$query = $this->db->delete('tasks');
		return $query;
	}
}
?>