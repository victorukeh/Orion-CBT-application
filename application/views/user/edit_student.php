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

			<?php if ($this->session->flashdata('user_edited')) : ?>
				<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_edited') . '</p>'; ?>
			<?php endif; ?>
			<?php unset($_SESSION['user_edited']); ?>

		
				<div class="panel panel-default">
					<?php echo validation_errors(); ?>
					<div class="panel-heading" style="background:white;" style="font-family: Montserrat, Helvetica Neue, Helvetica, Arial, sans-serif;"><label>User Registeration</label></div>
					<div class="panel-body">

						<?php echo form_open('user/update_student/'. $udata['user_id']); ?>
						
						<form role="form">
							<div class="col-md-6">
							<?php foreach ($students as $student) {   ?>
							<input type="hidden" name="id" value="<?php echo $student['user_id']; ?>">
							<?php
			} ?>
								<div class="form-group">
									<label>Name</label>
									<input style="font-size:15px;" class="form-control" placeholder="Full Name" name="user_name">
								</div>
								<div class="form-group">
									<label>Email</label>
									<input style="font-size:15px;" type="email" class="form-control" placeholder="Email Address" name="user_email">
								</div>
								<br>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Username</label>
									<input style="font-size:15px;" class="form-control" placeholder="Matric No or Staff ID" name="user_username">
								</div>

								<div class="form-group">
									<label>Password</label>
									<input style="font-size:15px;" type="password" class="form-control" placeholder="Password" name="user_password">
								</div>
								<br>

							</div>
							<div class="form-group">
								<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Update</button>
							</div>
							<div class="form-group">
								<button class="au-btn au-btn--block au-btn--blue m-b-20" type="reset">Reset</button>
							</div>
							
						</form>


					</div>
					<?php echo form_close(); ?>
				</div>
			
		</div><!-- /.panel-->
	</div><!-- /.col-->