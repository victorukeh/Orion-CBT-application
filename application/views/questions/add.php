
<!-- MAIN CONTENT-->
<br>
<div class="main-content" style="padding-top:80px;">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<?php if ($this->session->flashdata('user_loggedin')) : ?>
				<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
			<?php endif; ?>
			<?php unset($_SESSION['user_loggedin']); ?>

			<?php if ($this->session->flashdata('user_registered')) : ?>
				<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
			<?php endif; ?>
			<?php unset($_SESSION['user_registered']); ?>

			<?php if ($this->session->flashdata('lecturer_deleted')) : ?>
				<?php echo '<p class="alert alert-success">' . $this->session->flashdata('lecturer_deleted') . '</p>'; ?>
			<?php endif; ?>
			<?php unset($_SESSION['lecturer_deleted']); ?>




			<div class="panel panel-default">
				<?php echo validation_errors(); ?>
				<div class="panel-heading" style="background:white;" style="font-family: Montserrat, Helvetica Neue, Helvetica, Arial, sans-serif;"><label>User Registeration</label></div>
				<div class="panel-body">
					<?php echo form_open('examinations/add_question/' . $exam['exam_id']); ?>
					<form role="form">
						<div class="col-md-6">

							<div class="form-group">
								<label>Question</label>
								<textarea style="font-size:15px;" id="editor1" class="form-control" name="question" placeholder="Enter Question"></textarea>
							</div>
							<div class="form-group">
								<label>Answer</label>
								<input style="font-size:15px;" type="text" class="form-control" name="answer" placeholder="Enter the correct Answer">
							</div>
							<br>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Option A</label>
								<input style="font-size:15px;" type="text" class="form-control" name="option_a" placeholder="Enter the first option">
							</div>

							<div class="form-group">
								<label>Option B</label>
								<input style="font-size:15px;" type="text" class="form-control" name="option_b" placeholder="Enter the second option">
							</div>

							<div class="form-group">
								<label>Option C</label>
								<input style="font-size:15px;" type="text" class="form-control" name="option_c" placeholder="Enter the third option">
							</div>
							<div class="form-group">
								<label>Option D</label>
								<input style="font-size:15px;" type="text" class="form-control" name="option_d" placeholder="Enter the fourth option">
							</div>
							<br>


						</div>
						<div class="form-group">
							<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Add Question</button>
						</div>
						<div class="form-group">
							<button class="au-btn au-btn--block au-btn--blue m-b-20" type="reset">Reset</button>
						</div>
						
					</form>
					<?php echo form_close(); ?>
				</div>

			</div>
		</div><!-- /.panel-->
	</div><!-- /.col-->
