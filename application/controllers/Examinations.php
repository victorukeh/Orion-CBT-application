<?php

class Examinations extends CI_Controller
{

	public function index()
	{
		//Check Login
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}

		$this->load->model('Examination_model', 'examination_model');
		$data['title'] = 'Examinations';
		$data['examinations'] = $this->examination_model->get_examinations();

		$this->load->view('templates/header');
		$this->load->view('examinations/index', $data);
		$this->load->view('templates/footer');
	}

	public function create_exam($name = null, $id = 0)
	{
		// Check Login
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$this->load->model('User_model', 'user_model');
		$this->load->model('Examination_model', 'examination_model');
		$asdata = array('udata' => $this->user_model->getById($id));
		$data['udata'] = $this->user_model->getById($id);

		// print_r($data);

		$data['title'] = 'Create Exam';

		$this->form_validation->set_rules('course', 'Course', 'required|min_length[4]|is_unique[examinations.course]');
		$this->form_validation->set_rules('test_name', 'TestName', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('duration', 'Duration', 'required');
		$this->form_validation->set_rules('instruction', 'Instruction', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/lecturer_createExam_navbar', $asdata);
			$this->load->view('examinations/create_exam', $data);
			$this->load->view('templates/admin_navbars_footer');
		} else {
			$this->examination_model->create_exam($id);
			$this->session->set_flashdata('exam_created', 'Exam has been successfully registerd');
			redirect('examinations/viewExamsCreated/' . $name);
		}
	}

	public function examHistory($name = null)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		} else if ($name == null || $name != $this->session->userdata('usernames')) {
			echo "No Data Found";
			return;
		}

		$this->load->model('User_model', 'user_model');
		$data['history'] = $this->user_model->getHistoryByName($name);
		$data['all'] = $this->user_model->getAll2($name);
		$sdata = array('udata' => $this->user_model->getAll2($name));
		$this->load->view('templates/user_examsHistory_navbar', $sdata);
		$this->load->view('examinations/examHistory', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	// QUESTIONS //

	public function questions($id, $exam_id)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		if ($id == 0 ||  $id != $this->session->userdata('userids') || $exam_id == null) {
			// echo "No Data Found";
			// return;
			redirect('user/login');
		}
		$this->load->model('User_model', 'user_model');
		$sdata = $this->user_model->getById($id);
		$this->load->model('Examination_model', 'examination_model');
		if ($this->examination_model->getByIdAndExamID($sdata['user_username'], $exam_id) == true) {
			echo "You have already attempted this course";
		} else {
			$data = array();
			$this->load->model('Examination_model', 'examination_model');
			$this->load->model('Question_model', 'question_model');
			$this->load->model('User_model', 'user_model');
			$data['users'] = $this->user_model->getById($id);
			$data['title'] = $this->examination_model->get_examination($exam_id)->course;
			$data['exam'] = $this->examination_model->get_examination($exam_id);
			$data['questions'] = $this->question_model->get_questions_by_examination($exam_id);
			$data['all_test'] = $this->examination_model->select_examination_details_by_test_name($exam_id);

			$this->load->view('templates/user_questions_header', $data);
			$this->load->view('questions/index', $data);
			$this->load->view('templates/user_footer');
		}
	}

	public function add_question($id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$this->load->model('Examination_model', 'examination_model');
		$data['title'] = 'Add Question';
		$this->load->model('User_model', 'user_model');
		$sname = $this->examination_model->getexambyId($id);
		$asdata = array('udata' => $this->examination_model->getById($sname['user_id']));
		// $name = $this->user_model->getById5($sname['user_id'])->user_username;
		// print_r($name);
		$data['examinations'] = $this->examination_model->get_examinations();
		$data['exam'] = $this->examination_model->get_exam($id);
		$testname = $this->examination_model->get_exam2($id)->test_name;
		// print_r($testname);
		$superdata = array(
			'examination_id' => $id,
			'test_name' => $testname,
			'question' => $this->input->post('question'),
			'option_a' => $this->input->post('option_a'),
			'option_b' => $this->input->post('option_b'),
			'option_c' => $this->input->post('option_c'),
			'option_d' => $this->input->post('option_d'),
			'answer' => $this->input->post('answer'),
		);
		// print_r($superdata['test_name']);
		// print_r($data['exam']);
		$this->form_validation->set_rules('question', 'Question', 'required|min_length[4]');
		$this->form_validation->set_rules('option_a', 'Option A', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/add_ques', $asdata);
			$this->load->view('questions/add', $data);
			$this->load->view('templates/admin_navbars_footer');
		} else {

			$superdata = array(
				'examination_id' => $id,
				'test_name' => $testname,
				'question' => $this->input->post('question'),
				'option_a' => $this->input->post('option_a'),
				'option_b' => $this->input->post('option_b'),
				'option_c' => $this->input->post('option_c'),
				'option_d' => $this->input->post('option_d'),
				'answer' => $this->input->post('answer'),
			);
			$this->load->model('Examination_model', 'examination_model');
			$this->load->model('Question_model', 'question_model');

			$this->question_model->add_a_question($superdata);
			redirect('examinations/add_question/' . $id);

			$this->session->set_flashdata('question_created', 'Your Question has been created');
		}
	}

	public function edit_question($question_id, $exam_id)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$this->form_validation->set_rules('question', 'Question', 'required|min_length[4]');
		$this->form_validation->set_rules('option_a', 'Option A', 'required');
		$this->form_validation->set_rules('option_b', 'Option B', 'required');
		$this->form_validation->set_rules('option_c', 'Option C', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('questions/edit');
			$this->load->view('templates/footer');
		} else {
			$this->load->model('Question_model', 'question_model');
			$this->load->model('Examination_model', 'examination_model');

			$this->question_model->update(
				['question_id' => $question_id],
				[
					'Examination_id' => $exam_id,
					'question' => $this->input->post('obj_question'),
					'option_A' => $this->input->post('obj_a'),
					'option_B' => $this->input->post('obj_b'),
					'option_C' => $this->input->post('obj_c'),
					'answer' => $this->input->post('answer'),
				]
			);
		}
	}


	public function delete_question($question_id)
	{
		$this->load->model('Question_model', 'question_model');
		$this->question_model->delete_post($question_id);
	}



	public function resultDisplay($examID, $id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		} else if ($id == 0 || $id != $this->session->userdata('userids') || $examID == 0) {
			redirect('user/login');
		}

		$score = 0;
		date_default_timezone_set("Africa/Lagos");
		// $asdata = array();
		$sdata['date'] = date("d/m/Y");
		$sdata['time'] = date("h:i:sa");
		$sdata['intTime'] = date("his");
		$this->load->model('User_model', 'user_model');
		$this->load->model('Examination_model', 'examination_model');
		$sdata['exam_id'] = $examID;
		$sdata['test_name'] = $this->examination_model->get_test_name($examID);
		$sdata['course'] = $this->examination_model->get_course_code($examID);
		$sdata['lecturer_id'] = $this->examination_model->get_lecturer_id($examID);
		$data = $this->user_model->getById($id);
		$sdata['user_username'] = $data['user_username'];
		$this->load->model('User_model', 'user_model');
		$asdata = array('udata' => $this->user_model->getById($id));
		$this->load->model('Question_model', 'question_model');
		$datas = $this->question_model->select_question_details_by_test_name($this->input->post('testName'));

		foreach ($datas as $test) {

			if ($this->input->post('form_option' . $test['question_id']) == $test['answer']) {
				$score = $score + 1;
			} else {
				$score = $score + 0;
			}
			if ($id == 0 || $id != $this->session->userdata('userids') || $examID == null) {
				echo "No Data Found";
				return;
			}
		}
		$sdata['score'] = $score;
		$this->load->model('Question_model', 'question_model');
		$this->question_model->insert_score($sdata);
		$this->load->view('templates/user_result_navbar', $asdata,);
		$this->load->view('questions/result_display', $sdata);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function viewExams($name = null)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		} else if ($name == null || $name != $this->session->userdata('usernames')) {
			redirect('user/login');
		}

		// Search Bar is not working well
		if (!$this->input->get_post("srcbutton")) {
			$this->load->model('Examination_model', 'examination_model');
			// $this->load->model('User_model', 'usermodel');
			$data['users'] = $this->examination_model->getAll($name);
			$data['examlist'] = $this->examination_model->getallexam();
			$data['all'] = $this->examination_model->getAll($name);
			// $this->load->model('User_model', 'user_model');
			$sdata = array('udata' => $this->examination_model->getAll($name));
			$this->load->view('templates/user_runningtest_navbar', $sdata);
			$this->load->view('examinations/view_runningtest', $data);
			$this->load->view('templates/admin_navbars_footer');
		}

		// $this->load->model('Examination_model', 'examination_model');
		// $data['examlist'] = $this->examination_model->getsrcexam($this->input->get_post("search"));
		// $data['all'] = $this->examination_model->getAll($name);
		// $sdata = array('udata' => $this->examination_model->getAll($name));
		// $this->load->view('templates/user_runningtest_navbar', $sdata);
		// $this->load->view('examinations/view_runningtest', $data);
		// $this->load->view('templates/user_navbars_footer');
	}

	public function viewExamsCreated($name = null)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		} else if ($name == null || $name != $this->session->userdata('usernames')) {
			redirect('user/login');
		}

		$this->load->model('Examination_model', 'examination_model');
		$this->load->model('User_model', 'user_model');
		$sname = $this->user_model->getByName($name);
		// print_r($sname );
		$data['examlist'] = $this->user_model->get_exams($sname['user_id']);
		$data['all'] = $this->examination_model->getAll($name);
		$sdata = array(
			'udata' => $this->examination_model->getAll($name)
			// ,'no' => sizeof($this->user_model->getexamnum($questions['examination_id']))
		);
		$this->load->view('templates/lecturer_runningtest_navbar', $sdata);
		$this->load->view('examinations/view_runningtest_lecturer', $data);
		$this->load->view('templates/admin_navbars_footer');


		if ($this->input->get_post("srcbutton")) {
			// Search Bar is not working well
			$this->load->model('Examination_model', 'examination_model');
			$this->load->model('User_model', 'user_model');
			$sname = $this->user_model->getByName($name);
			$data['examlist'] = $this->examination_model->getsrcexam($this->input->get_post("search"));
			// print_r($data['examlist'] );
			$examinations = $this->user_model->get_exams($sname['user_id']);
			$questions = $this->user_model->get_questions($examinations['exam_id']);
			$data['all'] = $this->examination_model->getAll($name);
			$sdata = array('udata' => $this->examination_model->getAll($name), 'no' => sizeof($this->usermodel->getexamnum($questions['exam_id'])));
			$this->load->view('templates/lecturer_runningtest_navbar', $sdata);
			$this->load->view('examinations/view_runningtest_lecturer', $data);
			$this->load->view('templates/admin_navbars_footer');
		}
	}


	public function view_Questions($examID, $id = 0)
	{
		$this->load->model('Examination_model', 'examination_model');
		$this->load->model('User_model', 'user_model');
		$data['questions'] = $this->examination_model->getQuestionsByExamID($examID);
		$sdata = array(
			'udata' => $this->user_model->getById($id)
		);
		$this->load->view('templates/lecturer_examsearch', $sdata);
		$this->load->view('examinations/view_questions', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function viewResult($name)
	{
		$this->load->model('User_model', 'usermodel');
		$semi = $this->usermodel->getTestNameByExam($name);
		// $demi = $this->usermodel->getExamByUserID($semi['user_id']);
		$this->load->model('Examination_model', 'examination_model');
		$data['all_marks'] = $this->examination_model->getMarksByExam($semi);
		$this->load->library('parser');
		$adata = array('udata' => $this->examination_model->getAll($name));
		$this->load->view('templates/lecturer_view_navbar', $adata);
		$this->parser->parse('examinations/view_exam_report', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function adminviewResult($name)
	{
		$this->load->model('Examination_model', 'examination_model');
		$adata = array('udata' => $this->examination_model->getAll($name));
		$data['all_marks'] = $this->examination_model->allUserMarks();
		// $data['exams'] = $this->examination_model->get_examinations();
		$this->load->library('parser');
		$this->load->view('templates/admin/admin_viewResult', $adata);
		$this->parser->parse('examinations/view_all_report', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function searchResult($id = 0)
	{
		$all = "";
		$name = $this->input->post('users_name');
		$this->load->model('Examination_model', 'examination_model');
		$data['all_mark'] = $this->examination_model->searchUserMarks1($name, $id);
		$data['all_marks'] = $this->examination_model->allUserMarks();
		$userName = $this->examination_model->userName();

		foreach ($userName as $users) {
			$all .= $users['user_username'];
		}
		$this->load->model('User_model', 'user_model');
		$sdata = array(
			'student_username' => $this->examination_model->searchUserMarks($name),
			'udata' => $this->user_model->getById($id)
		);
		if ($this->input->post('submit_form')) {
			if (strpos($all, $name) !== false) {
				$this->load->view('templates/lecturer_runningtest_navbar', $sdata);
				$this->load->view('examinations/view_student_reports', $data);
				$this->load->view('templates/admin_navbars_footer');
			} else {
				$data['message'] = 'No Data Found';
				$this->load->view('templates/lecturer_runningtest_navbar', $sdata);
				$this->load->view('examinations/view_reports', $data);
				$this->load->view('templates/admin_navbars_footer');
			}
		} else {
			// redirect('http://localhost/MidAtp/admin/viewResult', 'refresh');
			//     $this->load->view('templates/lecturer_runningtest_navbar', $adata);
			// 	$this->load->view('examinations/view_runningtest_lecturer', $data);
			// 	$this->load->view('templates/user_navbars_footer');
		}
	}

	public function searchResult2($id = 0)
	{
		$all = "";
		$name = $this->input->post('users_name');
		$this->load->model('Examination_model', 'examination_model');
		$this->load->model('User_model', 'user_model');
		$data['exams'] = $this->examination_model->searchExams($name, $id);
		$data['all_marks'] = $this->examination_model->allUserMarks();
		$userName = $this->examination_model->examName();

		foreach ($userName as $users) {
			$all .= $users['course'];
		}
		$sdata = array(
			'student_username' => $this->examination_model->searchUserMarks($name),
			'udata' => $this->user_model->getById($id)
		);
		if ($this->input->post('submit_form')) {
			if (strpos($all, $name) !== false) {
				$this->load->view('templates/lecturer_examsearch', $sdata);
				$this->load->view('examinations/view_exam', $data);;
				$this->load->view('templates/admin_navbars_footer');
			} else {
				$data['message'] = 'No Data Found';
				$this->load->view('templates/lecturer_examsearch', $sdata);
				$this->load->view('examinations/view_exam', $data);
				$this->load->view('templates/admin_navbars_footer');
			}
		} else {
			// redirect('http://localhost/MidAtp/admin/viewResult', 'refresh');
			//     $this->load->view('templates/lecturer_runningtest_navbar', $adata);
			// 	$this->load->view('examinations/view_runningtest_lecturer', $data);
			// 	$this->load->view('templates/user_navbars_footer');
		}
	}
	public function searchResult1($id = 0)
	{
		$all = "";
		$name = $this->input->post('users_name');
		$this->load->model('Examination_model', 'examination_model');
		$this->load->model('User_model', 'user_model');
		$data['all_mark'] = $this->examination_model->searchUserMarks($name);
		$data['all_marks'] = $this->examination_model->allUserMarks();

		$userName = $this->examination_model->userName();
		$sdata = array(
			'student_username' => $this->examination_model->searchUserMarks($name),
			'udata' => $this->user_model->getById($id)
		);
		foreach ($userName as $users) {
			$all .= $users['user_username'];
		}

		if ($this->input->post('submit_form')) {
			if (strpos($all, $name) !== false) {
				$this->load->view('templates/admin/admin_viewResult', $sdata);
				$this->load->view('examinations/view_reports', $data);
				$this->load->view('templates/admin_navbars_footer');
			} else {
				$data['message'] = 'No Data Found';
				$this->load->view('templates/admin/admin_viewResult', $sdata);
				$this->load->view('examinations/view_reports', $data);
				$this->load->view('templates/admin_navbars_footer');
			}
		} else {
			// redirect('http://localhost/MidAtp/admin/viewResult', 'refresh');
			//     $this->load->view('templates/lecturer_runningtest_navbar', $adata);
			// 	$this->load->view('examinations/view_runningtest_lecturer', $data);
			// 	$this->load->view('templates/user_navbars_footer');
		}
	}


	public function edit_exam($user_id, $id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$this->load->model('User_model', 'user_model');
		$this->load->model('Examination_model', 'examination_model');
		$data['exam'] = $this->user_model->get_exams_for_edit($id);
		$sdata = array(
			'udata' => $this->user_model->getById($user_id)
		);
		$data['exams'] = $this->examination_model->get_all_Exams();
		if (empty($data['exam'])) {
			show_404();
		}

		$this->load->view('templates/lecturer_Edit_Exam', $sdata);
		$this->load->view('examinations/edit_exam', $data);
		$this->load->view('templates/admin_navbars_footer');
	}

	public function delete_exam($id = 0)
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$this->load->model('User_model', 'user_model');

		$query = $this->user_model->deleteExam($id);
		if ($query) {
			$this->session->set_flashdata('exam_deleted', 'The Exam has been deleted successfully');
			redirect('examinations/viewExamsCreated/' . $id);
		} else {
			echo "error";
		}
	}

	public function update_exam($user_id)
	{
		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}
		$this->load->model('Examination_model', 'examination_model');
		$this->examination_model->exam_update();

		// Set message
		$this->session->set_flashdata('user_updated', 'The User has been updated');

		redirect(site_url('examination/get_all_lecturers/' . $user_id));
	}
}
