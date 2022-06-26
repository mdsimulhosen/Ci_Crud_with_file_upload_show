<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function index()
	{
		$this->load->view('pages/login');
		// echo "</pre>";
		// print_r($this->session);
	}
	// view admin register page 
	public function admin_registration()
	{
		$this->load->view('pages/admin_register');
	}
	public function admin_register()
	{
		$result = $this->admin_model->admin_register();

		if ($result == true) {
			$message = array();
			$message['message'] = "Admin Registration Successful! <br> Login Now";
			$this->session->set_userdata($message);

			redirect(base_url());
			echo "uploaded";
		}
	}

	public function manage_admin()
	{
		$data = array();
		$data['manage_admin'] = $this->admin_model->admin_info();
		$this->load->view('pages/manage_admin', $data);
	}


	public function admin_login()
	{
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$this->load->model('admin_model');
		$result = $this->admin_model->admin_model_info($email, md5($pass));
		if ($result) {
			$sdata = array();
			$sdata['id'] = $result->id;
			$sdata['admin_name'] = $result->admin_name;
			$sdata['email'] = $result->admin_name;
			$sdata['password'] = $result->admin_name;
			$this->session->set_userdata($sdata);

			redirect('manage_student');
		} else {
			$sdata['message'] = "Invalid Email or Password!";
			$this->session->set_userdata($sdata);
			redirect(base_url());
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		// $sdata['message'] = "Logout Successfully!";
		// $this->session->set_userdata($sdata);
		redirect(base_url());
	}

	public function add_student()
	{
		$this->load->view('pages/add_student');
	}

	public function save_student()
	{
		$this->admin_model->save_student();
		$sdata['message'] = "Data Inserted";
		$this->session->set_userdata($sdata);
		redirect('manage_student');
	}

	public function manage_student()
	{
		$data = array();
		$data['all_student_info'] = $this->admin_model->save_student_info();
		$this->load->view('pages/manage_student', $data);
	}

	public function edit_student($id)
	{
		$data = array();
		$data['student_info'] = $this->admin_model->student_info($id);
		$this->load->view('pages/edit_student', $data);
	}
	public function update_student()
	{
		$this->admin_model->update_student();
		$sdata = array();
		$sdata['message'] = "Update Successfull!";
		if ($sdata) {
			$this->session->set_userdata($sdata);
			redirect('manage_student');
		}
	}

	public function delete_student($id)
	{
		$this->admin_model->delete_info($id);
		$sdata = array();
		$sdata['message'] = "Delete Successfull(:";
		$this->session->set_userdata($sdata);
		redirect('manage_student');
	}

	// file uplaad   
	public function file_upload_show()
	{
		$this->load->view('pages/file_upload');
	}
	//Dashboard page load
	public function upload()
	{

		$config['upload_path']          = './admin_image/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|pdf';
		$config['max_size']             = 1000;  //kb
		$config['max_width']            = 1024;  //px
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('admin_image')) {  //'file' = Input Name Value
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			die();
		} else {
			$data = array('upload_data' => $this->upload->data());
			echo "<h1>Uploaded Successfully!</h1>";
		}
	}
}
