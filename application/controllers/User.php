<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

	public function index($id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		if ($id == 0 || $id != $this->session->userdata('userids')) {
			redirect('user/login');
		}

		$this->load->model('User_model', 'usermodel');
		$name = $this->usermodel->getById($id);
		$data = array('udata' => $this->usermodel->getById($id), 'no' => sizeof($this->usermodel->getexamnum($name['user_username'])));
		$this->load->view('templates/user_navbars', $data, $name);
		$this->load->view('user/studentdashboard', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function lecturer($id = 0)
	{

		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		if ($id == 0 || $id != $this->session->userdata('userids')) {
			redirect('user/login');
		}

		$this->load->model('User_model', 'usermodel');
		$name = $this->usermodel->getById($id);
		$data = array(
			'udata' => $this->usermodel->getById($id),
			'no' => sizeof($this->usermodel->get_exams($name['user_id']))
		);
		$this->load->view('templates/lecturer_navbars', $data);
		$this->load->view('user/lecturer_dashboard', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function admin($id = 0)
	{

		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		if ($id == 0 || $id != $this->session->userdata('userids')) {
			redirect('user/login');
		}

		$this->load->model('User_model', 'user_model');
		$countname = 0;
		$countexam = 0;
		$mstactiveuser = '';
		$mstgivenexam = '';

		$user = $this->user_model->getalluser();
		$totaluser = sizeof($this->user_model->gettotal());
		$totalstudents = sizeof($this->user_model->gettotal1());
		$totallecturers = sizeof($this->user_model->gettotal2());
		$totalexaminations = sizeof($this->user_model->gettotal3());
		foreach ($user as $name) {
			if ($this->user_model->getmauser($name["user_username"]) > $countname) {
				$countname = $this->user_model->getmauser($name["user_username"]);
				$mstactiveuser = $name["user_username"];
			}

			if ($this->user_model->getmgexam($name["test_name"]) > $countexam) {
				$countexam = $this->user_model->getmauser($name["test_name"]);
				$mstgivenexam = $name["test_name"];
			}
		}

		$arr = array(
			'mau' => $mstactiveuser, 'mge' => $mstgivenexam, 'total' => $totaluser,
			'total1' => $totalstudents, 	'total2' => $totallecturers, 'total3' => $totalexaminations
		);
		$name = $this->user_model->getById($id);
		$data = array(
			'udata' => $this->user_model->getById($id),
			'no' => sizeof($this->user_model->get_exams($name['user_id']))
		);
		$this->load->view('templates/admin/admin_dashboard_header', $data);
		$this->load->view('user/admin_dashboard', $arr);
		$this->load->view('templates/admin_navbars_footer', $data);
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('user/login');
		} else {
			// Get username
			$username = $this->input->post('username');
			// Get and encrypt the password
			$password = md5($this->input->post('password'));
			$this->load->model('User_model', 'user_model');
			$user_id = $this->user_model->login($username, $password);
			// if($user_id != null){
			// 	echo 'error';
			// }

			if ($user_id) {
				// Create session
				$sdata['logged_in'] = TRUE;
				$sdata['usernames'] = $user_id['user_username'];
				$sdata['userids'] = $user_id['user_id'];

				if ($user_id['user_type'] == "admin") {
					$this->session->set_userdata($sdata);
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					redirect("user/admin/" . $user_id['user_id']);
				} else if ($user_id['user_type'] == "student") {
					$this->session->set_userdata($sdata);
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					redirect("user/index/" . $user_id['user_id'], "refresh");
				} else if ($user_id['user_type'] == "lecturer") {
					$this->session->set_userdata($sdata);
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');
					redirect("user/lecturer/" . $user_id['user_id'], "refresh");
				}
			} else {
				// echo 'error';
				$this->session->set_flashdata('login_failed', 'Invalid credentials');
				redirect('user/login');
			}
		}
	}

	public function create_user($id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		} else if ($id == 0 || $id != $this->session->userdata('userids')) {
			redirect('user/login');
		}

		$this->load->model('User_model', 'user_model');
		$sdata = array(
			'udata' => $this->user_model->getById($id)
		);
		$this->form_validation->set_rules('user_name', 'Name', 'required');
		$this->form_validation->set_rules('user_email', 'Email', 'is_unique|required');
		$this->form_validation->set_rules('user_username', 'Username', 'required');
		$this->form_validation->set_rules('user_password', 'Password', 'required');
		$this->form_validation->set_rules('user_gender', 'Gender', 'required');
		$this->form_validation->set_rules('user_type', 'Role', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/admin/admin_CreateUser', $sdata);
			$this->load->view('user/user_registration');
			$this->load->view('templates/admin_navbars_footer');
		} else {
			$data = array();
			$pass = $this->input->post('user_password');
			$user_pass = md5($pass);

			$data = array(
				'user_name' => $this->input->post('user_name'),
				'user_username' => $this->input->post('user_username'),
				'user_email' => $this->input->post('user_email'),
				'user_password' => $user_pass,
				'user_gender' => $this->input->post('user_gender'),
				'user_type' => $this->input->post('user_type')
			);

			$this->load->model('User_model', 'u_model');
			$this->u_model->insert_student($data);

			$this->session->set_flashdata('user_registered', 'User has been successfully registerd');
			redirect('user/admin/' . $id);
		}
	}

	public function edit_user($id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		} 
		$this->load->model('User_model', 'user_model');
		$data['user'] = $this->user_model->get_users($id);
		// print_r($query);
		// $data['categories'] = $this->post_model->get_categories();
		$sdata = array(
			'udata' => $this->user_model->getById($id)
		);
		$data['lecturers'] = $this->user_model->getAllLecturers();
		if (empty($data['user'])) {
			show_404();
		}

		$this->load->view('templates/admin/admin_EditUser', $sdata);
		$this->load->view('user/edit_user', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function edit_student($id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		} 
		$this->load->model('User_model', 'user_model');
		$data['user'] = $this->user_model->get_users($id);
		// print_r($query);
		// $data['categories'] = $this->post_model->get_categories();
		$sdata = array(
			'udata' => $this->user_model->getById($id)
		);
		$data['students'] = $this->user_model->getAllStudents();
		if (empty($data['user'])) {
			show_404();
		}

		$this->load->view('templates/admin/admin_EditStudent', $sdata);
		$this->load->view('user/edit_student', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function update_user($user_id = 0){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$this->load->model('User_model', 'user_model');
		$this->user_model->user_update();

		// Set message
		$this->session->set_flashdata('user_updated', 'The User has been updated');

		redirect(site_url('user/get_all_lecturers/' . $user_id));
	}

	public function update_student($user_id = 0){
		// Check login
		if(!$this->session->userdata('logged_in')){
			redirect('users/login');
		}
		$this->load->model('User_model', 'user_model');
		$this->user_model->user_update();

		// Set message
		$this->session->set_flashdata('user_updated', 'The User has been updated');

		redirect(site_url('user/get_all_students/' . $user_id));
	}

	public function get_all_students($id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		} else if ($id == 0 || $id != $this->session->userdata('userids')) {
			redirect('user/login');
		}
		$this->load->model('Examination_model', 'examination_model');
		$this->load->model('User_model', 'user_model');
		$data['students'] = $this->user_model->getAllStudents();
		// print_r($data);
		// $data['all'] = $this->examination_model->getAll($name);
		// $this->load->model('User_model', 'user_model');

		$sdata = array(
			'udata' => $this->user_model->getById($id)
		);
		// print_r($sdata);
		$this->load->view('templates/admin/getallstudents', $sdata);
		$this->load->view('examinations/view_students', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function get_all_lecturers($id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		} else if ($id == 0 || $id != $this->session->userdata('userids')) {
			redirect('user/login');
		}
		$this->load->model('Examination_model', 'examination_model');
		$this->load->model('User_model', 'user_model');
		$data['lecturers'] = $this->user_model->getAllLecturers();
		// $data['all'] = $this->examination_model->getAll($name);
		// $this->load->model('User_model', 'user_model');

		$sdata = array(
			'udata' => $this->user_model->getById($id)
		);
		$this->load->view('templates/admin/getalllecturers', $sdata);
		$this->load->view('examinations/view_lecturers', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function delete_user($user_id, $id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$this->load->model('User_model', 'user_model');

		$query = $this->user_model->deleteUser($id);
		if ($query) {
			$this->session->set_flashdata('lecturer_deleted', 'The User has been deleted successfully');
			redirect(site_url('user/get_all_lecturers/' . $user_id));
		} else {
			echo "error";
		}
	}

	public function delete_student($user_id, $id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$this->load->model('User_model', 'user_model');

		$query = $this->user_model->deleteUser($id);
		if ($query) {
			$this->session->set_flashdata('lecturer_deleted', 'The User has been deleted successfully');
			redirect(site_url('user/get_all_students/' . $user_id));
		} else {
			echo "error";
		}
	}

	// Log user out
	public function logout()
	{
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('userids');
		$this->session->unset_userdata('usernames');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'You are now logged out');

		redirect('user/login');
	}
}
