


<!-- MAIN CONTENT-->
<br>
<div class="main-content" style="padding-top:80px;">
	<div class="section__content section__content--p30">
		<div class="container-fluid">

			<div class="panel panel-default">
				<?php echo validation_errors(); ?>
				<div class="panel-heading" style="background:white;" style="font-family: Montserrat, Helvetica Neue, Helvetica, Arial, sans-serif;"><label>Examination Details</label></div>
				<div class="panel-body">
				<?php echo form_open_multipart('examinations/create_exam/'.$udata['user_username'].'/'.$udata['user_id']); ?>
					<form role="form">
						<div class="col-md-6">

							<div class="form-group">
								<label>Course Code</label>
								<input style="font-size:15px;" class="form-control" placeholder="Course Code" name="course">
							</div>
							<div class="form-group">
								<label>Date</label>
								<input style="font-size:15px;" type="date" class="form-control" placeholder="Email Address" name="date">
							</div>
							<div class="form-group">
								<label>Duration</label>
								<input style="font-size:15px;" type="text" class="form-control" placeholder="Time duration to complete the exam" name="duration">
							</div>
							<br>

						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Assessment Name</label>
								<input style="font-size:15px;" class="form-control" placeholder="Name of Examination" name="test_name">
							</div>

							<div class="form-group">
								<label>Exam Password</label>
								<input style="font-size:15px;" type="password" class="form-control" placeholder="Password" name="password">
							</div>
							<div class="form-group">
								<label>Instruction</label>
								<textarea style="font-size:15px;" name="instruction" placeholder="Examination Instructions"class="chosen-select form-control" rows="3" cols="40"></textarea>
							</div>
							<br>


						</div>
						<div class="form-group">
							<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Create</button>
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
