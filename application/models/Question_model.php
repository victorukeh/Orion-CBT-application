<?php

class Question_model extends CI_model
{

	protected $table = 'questions';

	public function __construct()
	{
		$this->load->database();
	}


	public function get_questions_by_examination($exam_id)
	{
		$this->db->order_by('questions.question_id');
		$this->db->join('examinations', 'examinations.exam_id = questions.examination_id');
		$query = $this->db->get_where('questions', array('examination_id' => $exam_id));
		return $query->result_array();
		$num_data_returned = $query->result_array();
		if ($num_data_returned < 1) {
			echo "No questions found";
			exit();
		}
	}



	public function add_a_question($superdata)
	{
		$this->db->select('*');
		$this->db->from('questions');
		return $this->db->insert('questions', $superdata);
	}

	public function select_question_details_by_test_name($name)
	{
		$this->db->select('*');
		$this->db->from('questions');
		$this->db->order_by('rand()');
		$this->db->limit(30);
		$this->db->where('test_name', $name);
		$query_result = $this->db->get()->result_array();
		return $query_result;
	}


	// public function calculate_score()
	// {
	// 	$query = $this->db->query("SELECT * FROM questions");
	// 	$questions = $query->result();
	// 	$score = 0;

	// 	foreach ($questions as $question) {
	// 		if ($question->answer == $this->input->post($question->question_id)) {
	// 			$score++;
	// 		}
	// 	}
	// 	return $score;
	// }
	
	public function insert_score($sdata)
	{
		$this->db->select('*');
		$this->db->from('marks');
		return $this->db->insert('marks', $sdata);
	}
}
