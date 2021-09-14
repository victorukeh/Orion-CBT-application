<?php echo validation_errors(); ?>


<div>
<h3 align="center"  style="display:flex; text-align:center; position:fixed; z-index: 21" class="control-label bolder green" style="text-align:center;" id="times"></h3>
</div>
<div align="center" class="page-header">
	<h2>
		<?php echo $questions[0]['course']; ?> <?php echo $questions[0]['test_name']; ?>
	</h2>
	<input type="hidden" name="testName" id="timeValue" value="<?php echo $all_test->duration ?>">
</div><!-- /.page-header -->
<div>

	<h3 align="center" class="text-info" id="times"></h3>

	<form action="<?php echo base_url(); ?>examinations/resultDisplay/<?php echo $questions[0]['examination_id']; ?>/<?php echo $users['user_id']; ?>" method="post">
		<!-- <form method="post" action="<?php echo base_url(); ?>examinations/resultdisplay"> -->

		<?php $i = 1;
		foreach ($questions as $question) { ?>
			<?php $ans_Array = array(
				$ans_Array[0] = $question['option_A'],
				$ans_Array[1] = $question['option_B'],
				$ans_Array[2] = $question['option_C'],
				$ans_Array[3] = $question['option_D'],
			);
			shuffle($ans_Array); ?>
			<div class="card">
				<label class="text-primary" style="color: blue">
					<b>
						<?php echo $i . ". " . $question['question']; ?>
					</b>
				</label><br>

				<input type="hidden" name="testName" value="<?php echo $question['test_name'] ?>">
				<input type="hidden" name="testName" id="timeValue" value="<?php echo $all_test->duration ?>">

				<?php if (!empty($ans_Array[0])) : ?>
					<div class="radio">
						<label style="color: black">
							<input type="hidden" name="testName" value="<?php echo $question['test_name'] ?>">
							<input name="form_option<?php echo $question['question_id'] ?>" type="radio" value="<?= $ans_Array[0] ?>" />
							<span class="lbl"><?= $ans_Array[0] ?></span>
						</label>
					</div>
				<?php endif; ?>
				<br>

				<?php if (!empty($ans_Array[1])) : ?>
				<div class="radio" style="color: black">
					<label>
						<input name="form_option<?php echo $question['question_id'] ?>" type="radio" value="<?= $ans_Array[1] ?>" />
						<span class="lbl"><?= $ans_Array[1] ?></span>
					</label>
				</div>
				<?php endif; ?><br>

				<?php if (!empty($ans_Array[2])) : ?>
				<div class="radio" style="color: black">
					<label>
						<input name="form_option<?php echo $question['question_id'] ?>" type="radio" value="<?= $ans_Array[2] ?>" />
						<span class="lbl"><?= $ans_Array[2] ?></span>
					</label>
				</div>
				<?php endif; ?><br>

				<?php if (!empty($ans_Array[3])) : ?>
				<div class="radio" style="color: black">
					<label>
						<input name="form_option<?php echo $question['question_id'] ?>" type="radio" value="<?= $ans_Array[3] ?>" />
						<span class="lbl"><?= $ans_Array[3] ?></span>
					</label>
				</div>
				<?php endif; ?><br>

			</div>
			<br>
			<?php $i++; ?>
		<?php } ?>
		<div align="center"	>
		<input  style=" width:90%;" type="submit" class="btn btn-success" name="submit_button" value="Submit">
		</div>
	</form>

</div>
