<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<!-- <div style="height:300px;"> -->
			<div class="col-lg-12">
					<div class="card">
						<div class="card-header">
							Search For Your <strong>Examinations</strong>
						</div>
						<div class="card-body card-block">
							<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>examinations/searchResult/<?php echo $udata['user_id'] ?>">
								<div class="row form-group">
									<div class="col col-md-12">
										<div class="input-group">
											<input style="font-size:15px;" class="chosen-select form-control" type="text" name="search" placeholder="write the examination name" required /><br>
										</div>
										<br>
										<div class="card-footer">
											<input style="font-size:15px;" type="submit" class="btn btn-success" name="srcbutton" value="Search"> &nbsp;
											<input style="font-size:15px;" type="reset" class="btn btn-danger" value="Reset">
										</div>
									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			<!-- </div> -->
<div>
				<?php foreach ($examlist as $exam) { ?>

					<div class="col-md-4">
						<div class="panel panel-primary">
							<div class="panel-heading"><?php echo $exam['course']; ?> <?php echo $exam['test_name']; ?></div>
							<div class="panel-body">
								<p> <?php echo $exam['instruction']; ?> </p>
								<br>

								<div class="search-actions text-center">
									<span class="text-info"></span>

									<span style="color:green;" class="blue bolder bigger-150"><?php echo $exam['duration']; ?> Minutes</span><br>

									<a style="width: 90%; height: 30px;" href="<?php echo base_url(); ?>examinations/questions/<?php echo $all['user_id']; ?>/<?php echo $exam['exam_id']; ?>/<?php echo $users['user_id']; ?>" onclick="return confirm('Are you sure?')" ; class="btn btn-info btn-sm">
										<h5 style="color:white">Take it!</h5>
									</a>
								</div>
							</div>
						</div>
					</div>

				<?php } ?>

			</div>
			</div>


		</div>



	</div>


</div>