<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div>
				<div class="row">
					<div class="col-md-12">
						<div class="overview-wrap">
							<h2 class="title-1">Find Examination</h2>
						</div>
					</div>
				</div>
				<br>

				<div class="col-lg-12">
				<div class="table-responsive table--no-card m-b-40">
					<table class="table table-borderless table-striped table-earning">
						<thead>
							<tr style="background: black; color:light-grey;">
								<!-- <table class="table"> -->

								<?php if (isset($exams)) {    ?>
									<thead>
										<tr>
											<th>S/N</th>
											<th>Course Code</th>
											<th>Examination</th>
											<th>Instruction</th>
											<th>Duration</th>
											<th>Password</th>
											<th>Date</th>
											<th>Actions</th>
										</tr>
									</thead>
									<?php $i = 1;
									foreach ($exams as $exam) {   ?>
										<tbody>
											<tr>
											<td><?= $i ?></td>
												<td><?php echo $exam['course'] ?></td>
												<td><?php echo $exam['test_name'] ?></td>
												<td><?php echo $exam['instruction'] ?></td>
												<td><?php echo $exam['duration'] ?></td>
												<td><?php echo $exam['password'] ?></td>
												<td><?php echo $exam['date'] ?></td>
												<td>
										<a href="<?= site_url('examinations/add_question/') . $exam['exam_id']; ?>" class="btn btn-primary btn-sm">Add Questions</a>
										<a href="<?php echo base_url(); ?>examinations/view_Questions/<?php echo $exam['exam_id'] ?>/<?php echo $udata['user_id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i>View Questions</a>
										<a href="<?php echo base_url(); ?>examinations/edit_exam/<?php echo $udata['user_id'] ?>/<?php echo $exam['exam_id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>Edit </a>
										<a href="<?php echo base_url(); ?>examinations/delete_exam/<?php echo $udata['user_id'] ?>/<?php echo $exam['exam_id'] ?>" onclick="return confirm('Are you sure?')" ; class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>
									</td>
											</tr>
											<?php $i++; ?>
										</tbody>
								<?php }
								} ?>

							</table>


						</div>

					</div>



				</div>

			</div><!-- /.page-content -->
			<!-- </div>
</div>/.main-content -->
