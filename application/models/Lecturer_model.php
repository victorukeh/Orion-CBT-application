<?php defined('BASEPATH') or exit('No direct script access allowed');

class Lecturer_model extends CI_Model
{
	//Login
	public function check_lecturer_login_info($username, $password)
	{
		$this->db->select('*');
		$this->db->from('lecturers');
		$this->db->where('lecturer_username', $username);
		$this->db->where('lecturer_password', md5($password));
		$query = $this->db->get();
		$result = $this->$query->row();
		return $result;
	}

	public function insert_lecturer($data)
	{
		$this->db->insert('lecturers', $data);
	}

	//Check if username exists
	public function check_username_exists($username)
	{
		$query = $this->db->get_where('lecturers', array('lecturer_username' => $username));
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	//Check if email exists
	public function check_email_exists($email)
	{
		$query = $this->db->get_where('lecturers', array('lecturer_email' => $email));
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}
}

// / function __construct()
	// {
	// 	parent::__construct();
	// 	date_default_timezone_set('Africa/Lagos');
	// 	// $this->load->database();
	// }

	// public function register($enc_password)
	// {
	// 	//User data array
	// 	$data = array(
	// 		'firstname' => $this->input->post('firstname'),
	// 		'lastname' => $this->input->post('lastname'),
	// 		'username' => $this->input->post('username'),
	// 		'email' => $this->input->post('email'),
	// 		'role' => $this->input->post('role'),
	// 		'password' => $enc_password
	// 		// 'firstname' => $this->input->post('firstname'),
	// 	);

	// 	//Insert User
	// 	return $this->db->insert('users', $data);
	// }
