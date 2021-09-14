<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div>
				<div class="row">
					<div class="col-md-12">
						<div class="overview-wrap">
							<h2 class="title-1">Student Examination History</h2>
							<button onclick="window.print()" class="au-btn au-btn-icon au-btn--blue">
								<i class="fa fa-download"></i>Download</button>
						</div>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-md-12">
						<!-- DATA TABLE-->
						<div class="table-responsive m-b-40">
							<table class="table table-borderless table-data3">
								<!-- <table class="table"> -->

								<?php if (isset($all_mark)) {    ?>
									<thead>
										<tr>
											<th>User Name</th>
											<th>Mark</th>
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

			</div><!-- /.page-content -->
			<!-- </div>
</div>/.main-content -->