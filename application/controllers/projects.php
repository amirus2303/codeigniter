<?php 
class Projects extends CI_Controller{

	public function __construct(){

		parent::__construct();
		if(!$this->session->userdata('logged_in')){
			$this->session->set_flashdata('no_access', 'Sorry, you are not logged in');
			redirect('home');
		}
	}


	

	public function index(){
		$data['projects'] = $this->project_model->get_projects();
		if($data['projects']){
			$data['main_view'] = "projects/index";
			$this->load->view('layouts/main',$data);
		}
		
	}


	public function display($project_id){
		$data['project_data'] = $this->project_model->get_project($project_id);
		$data['tasks'] =$this->task_model->get_project_tasks($project_id);
		$data['main_view'] = "projects/display";
		$this->load->view('layouts/main',$data);
	}


	public function create(){
		$this->form_validation->set_rules('project_name','Project name','trim|required');
		$this->form_validation->set_rules('project_body','Project Description','trim|required');

		if($this->form_validation->run() == false){
			$data['project_error'] = validation_errors();
			$this->session->set_flashdata($data);
			$data['main_view'] = "projects/create_project";
			$this->load->view('layouts/main', $data);

		} else{
			$data = array(
				'project_user_id' => $this->session->userdata('user_id'),
				'project_name' => $this->input->post('project_name'),
				'project_body' => $this->input->post('project_body')
				);

			if($this->project_model->create_project($data)){
				$this->session->set_flashdata('project_created','You project has been created');
				redirect('projects');
			}
		}
	}


	public function edit($project_id){
		$this->form_validation->set_rules('project_name','Project name','trim|required');
		$this->form_validation->set_rules('project_body','Project Description','trim|required');

		if($this->form_validation->run() == false){
			$data['project_error'] = validation_errors();
			$this->session->set_flashdata($data);
			$data['project_data'] = $this->project_model->get_project($project_id);
			$data['main_view'] = "projects/edit_project";
			$this->load->view('layouts/main', $data);

		} else{
			$data = array(
				'project_user_id' => $this->session->userdata('user_id'),
				'project_name' => $this->input->post('project_name'),
				'project_body' => $this->input->post('project_body')
				);

			if($this->project_model->edit_project($data,$project_id)){
				$this->session->set_flashdata('project_updated','You project has been updated');
				redirect('projects');
			}
		}
	}


	public function delete($project_id){
		$delete = $this->project_model->delete_project($project_id);

		if($delete){
			
			$this->session->set_flashdata('project_deleted', 'The project has been deleted');
			redirect('projects');
		}
	}

}
?>