<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div>
				<div class="row">
					<div class="col-md-12">
						<div class="overview-wrap">
							<h2 class="title-1">All Questions</h2>
						</div>
					</div>
				</div>
				<br>

				<div class="row">
					<div class="col-md-12">
					<!-- <div class="col-lg-13"> -->
				<!-- <div class="table-responsive table--no-card m-b-40"> -->
						<!-- DATA TABLE-->
						<div class="table-responsive m-b-40">
							<table class="table table-borderless table-data3">
								<!-- <table class="table"> -->

								<?php if (isset($questions)) {    ?>
									<thead >
										<tr>
											<th>S/N</th>
											<th>Question</th>
											<th>a</th>
											<th> b</th>
											<th> c</th>
											<th>d</th>
											<th>Answer</th>
										</tr>
									</thead>
									<?php $i = 1;
									foreach ($questions as $question) {   ?>
										<tbody>
											<tr>
												<td style="color:#333;"><?= $i ?></td>
												<td style="color:#333;"><?php echo $question['question'] ?></td>
												<td style="color:#333;"><?php echo $question['option_A'] ?></td>
												<td style="color:#333;"><?php echo $question['option_B'] ?></td>
												<td style="color:#333;"><?php echo $question['option_C'] ?></td>
												<td style="color:#333;"><?php echo $question['option_D'] ?></td>
												<td style="color:#333;"><?php echo $question['answer'] ?></td>
												<!-- <td>
										<a href="<?php echo base_url(); ?>examinations/edit_question/<?php echo $udata['user_id'] ?>/<?php echo $exam['exam_id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i>Edit </a>
										<a href="<?php echo base_url(); ?>examinations/delete_question/<?php echo $udata['user_id'] ?>/<?php echo $exam['exam_id'] ?>" onclick="return confirm('Are you sure?')" ; class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>Delete</a>
									</td> -->
											</tr>
											<?php $i++; ?>
										</tbody>
								<?php }
								} ?>

							</table>

						</div>
					</div>

				</div>



			</div>

		</div><!-- /.page-content -->
		<!-- </div>
</div>/.main-content -->