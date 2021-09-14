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
					<?php echo form_open('user/create_user/' . $udata['user_id']); ?>
					<form role="form">
						<div class="col-md-6">

							<div class="form-group">
								<label>Name</label>
								<input style="font-size:15px;" class="form-control" placeholder="Full Name" name="user_name">
							</div>
							<div class="form-group">
								<label>Email</label>
								<input style="font-size:15px;" type="email" class="form-control" placeholder="Email Address" name="user_email">
							</div>
							<div style="height: 50%;">
								<label name="select" id="select" class=" form-control-label">Gender</label>
								<select style="font-size:15px;" id="select" class="form-control" name="user_gender" placeholder="Select User's Gender">
									<option value="0">Please select</option>
									<option>Male</option>
									<option>Female</option>
									<option>Other</option>
								</select>
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

							<div class="form-group">
								<label>Role</label>
								<select style="font-size:15px;" class="form-control" name="user_type">
									<option value="0">Please select</option>
									<option>admin</option>
									<option>lecturer</option>
									<option>student</option>
								</select>
							</div>
							<br>


						</div>
						<div class="form-group">
							<button class="au-btn au-btn--block au-btn--blue m-b-20" type="reset">Reset</button>
						</div>
						<div class="form-group">
							<button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
						</div>
					</form>
					<?php echo form_close(); ?>
				</div>

			</div>
		</div><!-- /.panel-->
	</div><!-- /.col-->
