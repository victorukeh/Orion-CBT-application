<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	protected $table = 'students';

	public function __construct()
	{
		$this->load->database();
	}

	//Login
	// public function check_user_login_info($username, $password)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('students');
	// 	$this->db->where('user_username', $username);
	// 	$this->db->where('user_password', md5($password));
	// 	$query = $this->db->get();
	// 	$result = $this->$query->row();
	// 	return $result;
	// }

	// public function get_users($id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('users');
	// 	$this->db->get(['user_id' => $id]);
	// }

	public function user_update()
	{
		$pass = $this->input->post('user_password');
		$user_pass = md5($pass);

		$data = array(
			'user_name' => $this->input->post('user_name'),
			'user_username' => $this->input->post('user_username'),
			'user_email' => $this->input->post('user_email'),
			'user_password' => $user_pass,
		);
		// 'user_type' => $this->input->post('user_type'));
		// 'user_name' => $this->input->post('user_name'));

		$this->db->where('user_id', $this->input->post('id'));
		// $this->db->get('user_id', $id);
		$this->db->update('users', $data);
	}
	public function get_users($id)
	{
		$query = $this->db->get_where('users', array('user_id' => $id));
		return $query->row_array();
	}

	public function get_exams_for_edit($id)
	{
		$query = $this->db->get_where('examinations', array('exam_id' => $id));
		return $query->row_array();
	}

	public function insert_student($data)
	{
		$this->db->select('*');
		$this->db->from('users');
		return	$this->db->insert('users', $data);
	}

	public function deleteUser($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('users');
		return true;
	}

	public function deleteExam($id)
	{
		$this->db->where('exam_id', $id);
		$this->db->delete('examinations');
		return true;
	}

	public function getexamnum($name)
	{
		$sql = "SELECT * FROM marks WHERE user_username='$name'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getquestionnum($questions)
	{
		$sql = "SELECT * FROM questions WHERE user_username='$questions'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function login($username, $password)
	{
		// Validate
		$this->db->where('user_username', $username);
		$this->db->where('user_password', $password);

		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			return $result->row_array();
		} else {
			return false;
		}
	}


	public function userInfo($data)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where($data);
		$result = $this->db->get();
		return $user = $result->row_array();
	}

	//Check if username exists
	public function check_username_exists($username)
	{
		$query = $this->db->get_where('students', array('user_username' => $username));
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	//Check if email exists
	public function check_email_exists($email)
	{
		$query = $this->db->get_where('students', array('user_email' => $email));
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	public function getById($id)
	{
		$sql = "SELECT * FROM users WHERE user_id = '$id'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getById2($semi)
	{
		$sql = "SELECT * FROM examinations WHERE user_id = '$semi'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getById3($exam_id)
	{
		$sql = "SELECT * FROM examinations WHERE exam_id = '$exam_id'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getById4($id)
	{
		$sql = "SELECT * FROM examinations WHERE exam_id = '$id'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getById5($sname)
	{
		$sql = "SELECT * FROM users WHERE user_id = '$sname'";
		$result = $this->db->query($sql);
		return $result->row();
	}


	public function getExamByUserID($sname)
	{
		$sql = "SELECT * FROM examinations WHERE user_id = '$sname'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getTestNameByExam($name)
	{
		
		$query = $this->db->get_where('users', array('user_username' => $name));
		$query = $query->row_array(); 
		$result = $query['user_id'];
		return $result;
	
		// $sql = "SELECT * FROM users WHERE user_username = '$name'";
		// $result = $this->db->query($sql);
		// return $result->row_array();
	}

	public function getByName($name)
	{
		$sql = "SELECT * FROM users WHERE user_username= '$name'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getByExamID($exam_id)
	{
		$sql = "SELECT user_username FROM examinations WHERE exam_id = '$exam_id'";
		$result = $this->db->query($sql);
		return $result->get();
	}

	public function getAll($name)
	{
		$sql = "SELECT * FROM users WHERE user_name='$name'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getAll2($name)
	{
		$sql = "SELECT * FROM users WHERE user_username='$name'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getHistoryByName($name)
	{
		$sql = "SELECT * FROM marks WHERE user_username='$name'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}



	public function get_exams($sname)
	{
		$sql = "SELECT * FROM examinations WHERE user_id='$sname'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function get_questions($sname)
	{
		$sql = "SELECT * FROM questions WHERE user_id='$sname'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getalluser()
	{
		$sql = "SELECT * FROM marks";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAllStudents()
	{
		$sql = "SELECT * FROM users WHERE user_type ='student'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAllLecturers()
	{
		$sql = "SELECT * FROM users WHERE user_type ='lecturer'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function gettotal()
	{
		$sql = "SELECT * FROM users WHERE user_type !='admin'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function gettotal1()
	{
		$sql = "SELECT * FROM users WHERE user_type ='student'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function gettotal2()
	{
		$sql = "SELECT * FROM users WHERE user_type ='lecturer'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function gettotal3()
	{
		$sql = "SELECT * FROM examinations";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getmauser($name)
	{
		$sql = "SELECT * FROM marks WHERE user_username='$name'";
		$result = $this->db->query($sql);
		return sizeof($result->result_array());
	}

	public function getmgexam($name)
	{
		$sql = "SELECT * FROM marks WHERE test_name='$name'";
		$result = $this->db->query($sql);
		return sizeof($result->result_array());
	}
}

	// public function get_ex1ams($name)
	// {
	// 	if ($name == FALSE) {
	// 		$this->db->order_by('examinations.id', 'DESC');
	// 		$this->db->join('categories', 'users.user_id = examinations.user_id');
	// 		$query = $this->db->get('examinations');
	// 		return $query->result_array();
	// 	}

	// 	$query = $this->db->get_where('examinations', array('user_id' => $name));
	// 	return $query->row_array();
	// }

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

	// public function getExamsLecturerCreated($name)
	// {
	// 	$sql = "SELECT * FROM marks WHERE user_username='$name'";
	// 	$result = $this->db->query($sql);
	// 	return $result->result_array();
	// }