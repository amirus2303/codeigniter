<?php
class Tasks extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('no_access', 'Sorry, you are not logged in');
			redirect('home');
		}
	}




	public function index(){
		$data['tasks'] = $this->task_model->get_all_tasks();
		$data['main_view'] = "tasks/index";
		$this->load->view('layouts/main', $data);
	}



	public function display($id){

		$data['task'] = $this->task_model->get_task($id);
		if($data['task']){
			$data['main_view'] = "tasks/display";
			$this->load->view('layouts/main', $data);
		}

	}


	public function create($id){
		$this->form_validation->set_rules('task_name','Task Name', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('task_body','Task Description','trim|required|min_length[3]');

		if($this->form_validation->run() == false){
			$data['task_errors'] = validation_errors();
			$this->session->set_flashdata($data);
			$data['project_id'] = $id;
			$data['main_view'] = "tasks/create_task";
			$this->load->view('layouts/main', $data);

		} else{
			$task_name = $this->input->post('task_name');
			$task_body = $this->input->post('task_body');
			$due_date = $this->input->post('due_date');

			$task_data = array(
				'project_id' => $id,
				'task_name'  => $task_name,
				'task_body'  => $task_body,
				'due_date'   => $due_date
			);

			$query = $this->task_model->create_task($task_data);

			if($query){
				$this->session->set_flashdata('task_created', 'The task has been created');
				redirect('projects/display/'.$id);
			}
		}
	}



	public function edit($task_id){
		$this->form_validation->set_rules('task_name','Task name','trim|required|min_length[3]');
		$this->form_validation->set_rules('task_body','Task Description','trim|required|min_length[3]');

		if($this->form_validation->run() == false){
			$data['task_errors'] = validation_errors();
			$this->session->set_flashdata($data);
			$data['task_data'] = $this->task_model->get_task($task_id);
			$data['main_view'] = "tasks/edit_task";
			$this->load->view('layouts/main', $data);

		} else{
			$data = array(
				'task_name' => $this->input->post('task_name'),
				'task_body' => $this->input->post('task_body'),
				'due_date' => $this->input->post('due_date'),
				);

			$result = $this->task_model->edit_task($data,$task_id);
			if($result){

				$project_task = $this->task_model->get_task($task_id);
				if($project_task){
					$project_id = $project_task->project_id;//on recupere l'id du projet pour rediriger vers le projet qui concerne la task
				}
				
				$this->session->set_flashdata('task_updated','You task has been updated');
				redirect('projects/display/'.$project_id);
			}
		}
	}


	public function delete($task_id){
		$project_task = $this->task_model->get_task($task_id);
		if($project_task){
			$project_id = $project_task->project_id;//on recupere l'id du projet pour rediriger vers le projet qui concerne la task
		}

		$query = $this->task_model->delete_task($task_id);
		if($query){
			$this->session->set_flashdata('task_deleted','The task has been deleted');
			redirect('projects/display/'.$project_id);
		}
	}
} 
?>