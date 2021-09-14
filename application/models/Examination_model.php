<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Examination_model extends CI_Model
{
	protected $table = 'examinations';

	public function __construct()
	{
		// parent::__construct();
		$this->load->database();
	}

public function getQuestionsByExamID($examID){
	$query = $this->db->get_where('questions', array('examination_id' => $examID));
	
		return $query->result_array();
}

	public function get_examination($exam_id)
	{
		$query = $this->db->get_where('examinations', array('exam_id' => $exam_id));
		return $query->row();
	}

	public function get_test_name($examID){
		$query = $this->db->get_where('examinations', array('exam_id' => $examID));
		$query = $query->row_array(); 
		$result = $query['test_name'];
		return $result;
	}

	public function getByIdAndExamID($sdata, $exam_id){
		$sql = "SELECT * FROM marks WHERE user_username='$sdata' && exam_id ='$exam_id'";
		$result = $this->db->query($sql);
		if($result->row_array() != null){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function get_course_code($examID)
	{
		$query = $this->db->get_where('examinations', array('exam_id' => $examID));
		$query = $query->row_array(); 
		$result = $query['course'];
		return $result;
	}

	public function get_lecturer_id($examID)
	{
		$query = $this->db->get_where('examinations', array('exam_id' => $examID));
		$query = $query->row_array(); 
		$result = $query['user_id'];
		return $result;
	}

	public function get_exam($id)
	{
		// $sql = "SELECT * FROM users WHERE user_id = '$id'";
		// $result = $this->db->query($sql);
		// return $result->row_array();
		$query = $this->db->get_where('examinations', array('exam_id' => $id));
		return $query->row_array();
	}

	public function get_exam2($id)
	{
		// $sql = "SELECT * FROM users WHERE user_id = '$id'";
		// $result = $this->db->query($sql);
		// return $result->row_array();
		$query = $this->db->get_where('examinations', array('exam_id' => $id));
		return $query->row();
	}

	public function get_examination2($new_id)
	{
		$query = $this->db->get_where('examinations', array('exam_id' => $new_id));
		return $query->row();
	}



	public function get_examination_instruction($instruction)
	{
		$query = $this->db->get_where('examinations', array('instruction' => $instruction));
		return $query->row();
	}

	public function get_examinations()
	{
		$this->db->order_by('test_name');
		$query = $this->db->get('examinations');
		return $query->result_Array();
	}

	public function get_particular_exam()
	{
		$this->db->join('', 'categories.id = posts.category_id');
		$sql = "SELECT user_username FROM marks";
		$result = $this->db->query($sql);
		return $result->result_array();
		$this->db->order_by('test_name');
		$query = $this->db->get('examinations');
		return $query->result_Array();
	}
	public function get_questions()
	{
		$this->db->order_by('question');
		$query = $this->db->get('questions');
		return $query->result_Array();
		// $query = $this->db->get_where('examinations', array('exam_id' => $exam_id));
	}

	public function create_exam($id)
	{
		// $this->db->where('user_id', $id);
		$data = array(
			'user_id' => $id,
			'instruction' => $this->input->post('instruction'),
			'password' => $this->input->post('password'),
			'course' => $this->input->post('course'),
			'test_name' => $this->input->post('test_name'),
			'date' => $this->input->post('date'),
			'duration' => $this->input->post('duration'),
		);
		return $this->db->insert('examinations', $data);
	}

	public function delete_examination($exam_id)
	{
		$this->db->where('exam_id', $exam_id);
		$this->db->delete('examinations');
		return true;
	}

	public function select_examination_details_by_test_name($exam_id)
	{
		$this->db->select('*');
		$this->db->from('examinations');
		$this->db->where('exam_id', $exam_id);
		$query_result = $this->db->get();
		$result = $query_result->row();

		return $result;
	}

	public function getHistoryByName($name)
	{
		$sql = "SELECT * FROM marks WHERE user_name='$name'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getAll($name)
	{
		$sql = "SELECT * FROM users WHERE user_username='$name'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getAll2($name)
	{
		$sql = "SELECT * FROM users WHERE user_username='$name'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getById($id)
	{
		$sql = "SELECT * FROM users WHERE user_id ='$id'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getexambyId($id)
	{
		$sql = "SELECT * FROM examinations WHERE exam_id ='$id'";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function get_all_Exams()
	{
		$sql = "SELECT * FROM examinations";
		$result = $this->db->query($sql);
		return $result->row_array();
	}

	public function getallexam()
	{
		$sql = "SELECT * FROM examinations";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getallexam2($sname)
	{
		$sql = "SELECT * FROM examinations WHERE user_id='$sname'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}


	public function getsrcexam($txt)
	{
		$sql = "SELECT * FROM examinations WHERE test_name='$txt'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function getMarksByExam($semi)
	{
		$sql = "SELECT * FROM marks WHERE lecturer_id = '$semi'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function allUserMarks()
	{
		$sql = "SELECT * FROM marks";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function LecturerStudentMarks()
	{
		$sql = "SELECT * FROM marks WHERE ";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function studentGrades(){

	}
	public function searchUserMarks($name)
	{
		$sql = "SELECT * FROM marks WHERE user_username='$name'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function searchUserMarks1($name, $id)
	{
		$sql = "SELECT * FROM marks WHERE user_username='$name' && lecturer_id ='$id'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function searchExams($name, $id)
	{
		$sql = "SELECT * FROM examinations WHERE course='$name' AND user_id ='$id'";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	

	public function userName()
	{
		$sql = "SELECT user_username FROM marks";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function examName()
	{
		$sql = "SELECT course FROM examinations";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function testName()
	{
		$sql = "SELECT test_name FROM marks";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function exam_update()
	{
		$data = array(
			'course' => $this->input->post('course'),
			'test_name' => $this->input->post('test_name'),
			'instruction' => $this->input->post('instruction'),
			'password' => $this->input->post('password'),
			'duration' => $this->input->post('duration'),
			'date' => $this->input->post('date'),
		);

		$this->db->where('exam_id', $this->input->post('exam_id'));
		// $this->db->get('user_id', $id);
		$this->db->update('examinations', $data);
	}
}
