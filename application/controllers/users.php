<?php 
//defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller{

	public function show(){

		//$data['users'] = $this->user_model->get_users('1');
		//$this->insert();
		return $this->user_model->get_users('1');
		
		//$this->load->view('users/login_view', $data);

	}


	public function insert(){
		$username = "Djalel";
		$password ="123";
		$this->user_model->create_users([
						"username" => $username,
						"password" =>$password
						]);

	}


	public function update(){
		$id = 28;
		$username = "Djalelou";
		$password ="1234";
		$this->user_model->update_users([
						"username" => $username,
						"password" =>$password
						], $id);

	}


	public function delete(){
		$id = 28;
		$this->user_model->delete_users($id);

	}


	public function register(){

		$this->form_validation->set_rules('first_name','Firstname','trim|required|min_length[3]');
		$this->form_validation->set_rules('last_name','Lastname','trim|required|min_length[3]');
		$this->form_validation->set_rules('email','Lastname','trim|required|valid_email');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password','Confirm password','matches[password]');

		if($this->form_validation->run() == false){
			
			$data['main_view'] = "users/register_view";
			$this->load->view('layouts/main', $data);
		} else {
			$firstname = $this->input->post('first_name');
			$lastname = $this->input->post('last_name');
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$options = ['cost' => 12];
			$user_data = array(
				'first_name' => $firstname,
				'last_name'  => $lastname,
				'username'   => $username,
				'password'   => password_hash($password, PASSWORD_BCRYPT, $options)
				);
			$insert_data = $this->user_model->create_user($user_data);
			if($insert_data){
				$this->session->set_flashdata('user_registered','User has been registered');
				redirect('home');
			}
			
		}
		
	}


	public function login(){

		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
		$this->form_validation->set_rules('confirm_password','Confirm password','matches[password]');

		if($this->form_validation->run() == FALSE){
			$data = array(
				'errors' => validation_errors()
				);

			$this->session->set_flashdata($data);
			redirect("home");
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->user_model->login_user($username, $password);

			if($user_id){

				$user_data = array(
						'user_id' => $user_id,
						'user_name' => $username,
						'logged_in' => 'true'
					);

				$this->session->set_userdata($user_data);
				$this->session->set_flashdata("login_success", "You are now logged in");
				//$data['main_view'] = "admin_view";
				//$this->load->view('layouts/main',$data);
				redirect('home');


			} else{
				$this->session->set_flashdata("login_failed", "You are not logged in");
				redirect('home');
			}
		}
	}


	public function logout(){
		$this->session->sess_destroy();
		redirect("home");
	}
}
?>