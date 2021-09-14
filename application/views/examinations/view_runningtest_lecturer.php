
<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			
		<div class="col-lg-6">
				<div class="card">
					<div class="card-header">
						Search for Examinations By <strong>Exam Name</strong>
					</div>
					<div class="card-body card-block">
						<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>examinations/searchResult2/<?php echo $udata['user_id'] ?>">
							<div class="row form-group">
								<div class="col col-md-12">
									<div class="input-group">
										<input class="chosen-select form-control" type="text" id="user_id" name="users_name" placeholder="Exam Name" required /><br>
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

	

	<?php foreach ($examlist as $exam) { ?>

		<div class="media search-media">
			<div class="media-left">
				<a href="#">
					<img class="media-object" data-src="holder.js/72x72" />
				</a>
			</div>

			<div style="background:white; border-radius:10px; max-width:90%;" class="media-body">
			<div class="card-header" style="background:teal;  border-radius: 5px;">
			<div style="padding-left:10px;">
					<h4 class="media-heading">
						<a href="#" style="color:white;"><?php echo $exam['course']; ?> <?php echo $exam['test_name']; ?></a>
					</h4>
				</div>
					</div>
				<br>
				<p style="padding-left:10px;"> <?php echo $exam['instruction']; ?> </p>

				<div style="padding-left:300px;"class="search-actions text-center">
					<!-- <span class="text-info"><?php echo $no ?></span> -->
					<span style="color:darkcyan" class="blue bolder bigger-150"><?php echo $exam['duration']; ?> Minutes</span><br>
					
					<form>
					<button class="btn btn-warning" style="height:38px;"><a style="color:#fff; padding-top:1px"class="btn btn-default pull-left" href="<?php echo base_url(); ?>examinations/edit_exam/<?php echo $udata['user_id'] ?>/<?php echo $exam['exam_id'] ?>">Edit</a></button>
					<button class="btn btn-primary" style="height:38px;"><a style="color:#fff; padding-top:1px"class="btn btn-default pull-left" href="<?php echo base_url(); ?>examinations/add_question/<?php echo $exam['exam_id']; ?>">Add Question</a></button>
					<button class="btn btn-info" style="height:38px;"><a style="color:#fff; padding-top:1px"class="btn btn-default pull-left" href="<?php echo base_url(); ?>examinations/view_Questions/<?php echo $exam['exam_id'] ?>/<?php echo $udata['user_id'] ?>">View Questions</a></button>
						
						<?php echo form_open('/examinaions/delete_exam/' . $exam['exam_id']); ?>
						<input type="submit" value="Delete" class="btn btn-danger">
					</form>
					<br>

				</div>
			</div><br>
		</div><br>
	<?php } ?>

</div>




</div>
</div>
	</div>
</div>
