<!-- MAIN CONTENT-->
<div class="main-content" style="padding-top:10%;">
	<!-- <br><br>
<br><br> -->
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- <div class="row"> -->
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

			<h2 class="text-info">All Students</h2>
			<br>
			<div class="col-lg-12">
				<div class="table-responsive table--no-card m-b-40">
					<table class="table table-borderless table-striped table-earning">
						<thead>
							<tr style="background: black; color:light-grey;">
								<!-- <th>ID</th> -->
								<th>S/N</th>
								<th>Name</th>
								<th>User Name</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Department</th>
								<th>Actions</th>
							</tr>
						</thead>

						<?php $i = 1;
						if (isset($students)) {
							foreach ($students  as $student) {   ?>
								<tr>
									<td><?= $i ?></td>
									<td><?php echo $student['user_name'] ?></td>
									<td><?php echo $student['user_username'] ?></td>
									<td><?php echo $student['user_email'] ?></td>
									<td><?php echo $student['user_gender'] ?></td>
									<td></td>
									<!-- <td><?php echo $student['user_department'] ?></td> -->
									<td>
										<!-- <a href="<?= site_url('user/view_user/') . $student['user_id']; ?>" class="btn btn-primary btn-sm">View</a> -->
										<a href="<?php echo base_url(); ?>user/edit_student/<?php echo $udata['user_id'] ?>/<?php echo $student['user_id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>Edit</a>
										<a href="<?php echo base_url(); ?>user/delete_student/<?php echo $udata['user_id'] ?>/<?php echo $student['user_id'] ?>" onclick="return confirm('Are you sure?')" ; class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>
									</td>


								</tr>
								<?php $i++; ?>
						<?php }
						} ?>

					</table>
				</div>
			</div>

		</div>