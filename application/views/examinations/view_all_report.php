!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">





			<?php
			if (isset($message)) {
				echo "<p class='alert alert-danger'>" . $message . "</p>";
			}
			?>




			<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						Students Exam History Across All <strong>Examinations</strong>
					</div>
					<div class="card-body card-block">
						<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>examinations/searchResult1/<?php echo $udata['user_id'] ?>">
							<div class="row form-group">
								<div class="col col-md-12">
									<div class="input-group">
										<input class="chosen-select form-control" type="text" id="user_id" name="users_name" placeholder="Matric NO" required /><br>
									</div>
									<br>
									<div class="card-footer">
										<input type="submit" class="btn btn-success" name="submit_form" value="Search"> &nbsp;
										<input type="reset" class="btn btn-danger" value="Reset">
									</div>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div><br>

			<div class="row">
				<div class="col-md-12">
					<!-- DATA TABLE-->
					<div class="table-responsive m-b-40">
						<table class="table table-borderless table-data3">


							<br>
						
								<?php
								// foreach ($exams as $exam) {   ?>
									<?php if (isset($all_mark)) {    ?>
										<thead>
											<tr>
												<th>User Name</th>
												<th>Score</th>
												<th>Date</th>
												<th>Time</th>
												<th>Test Name</th>
											</tr>
										</thead>
										<?php foreach ($all_mark as $mark) {   ?>
											<tbody>
												<tr>
													<td><?php echo $mark['user_username'] ?></td>
													<td><?php echo $mark['score'] ?></td>
													<td><?php echo $mark['date'] ?></td>
													<td><?php echo $mark['time'] ?></td>
													<td><?php echo $mark['test_name'] ?></td>
												</tr>
											</tbody>
									<?php }
									} ?>
							


						</table>
					</div>

				</div>



			</div>

		</div>

		<h2 align="center" class="text-info">All Students Score History</h2><br>

		<?php foreach ($all_marks as $marks) : ?>

			<div class="row">
				<div class="col-md-12">
					<!-- DATA TABLE-->
					<div class="table-responsive m-b-40">
						<table class="table table-borderless table-data3">
							<div class="row">
								<div class="col-md-12">
									<div class="overview-wrap">
										<h3 class="text-primary"><?php echo $marks['course'] ?> <?php echo $marks['test_name'] ?></h3>
									</div>
								</div>
							</div>
							<br>
							<thead>
								<tr>
									<th>User Name</th>
									<th>Score</th>
									<th>Date</th>
									<th>Time</th>
									<th>Examination</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><?php echo $marks['user_username'] ?></td>
									<td><?php echo $marks['score'] ?></td>
									<td><?php echo $marks['date'] ?></td>
									<td><?php echo $marks['time'] ?></td>
									<td><?php echo $marks['course'] ?> <?php echo $marks['test_name'] ?></td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>



			</div>
			<br>
			<?php endforeach; ?>
	</div>
</div>
<br>




</div>

</div>
<!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->