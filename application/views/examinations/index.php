<h2><?= $title; ?></h2>
<ul class="list-group">
	<?php foreach ($examinations as $examination) : ?>
		<li class="list-group-item">
			<a href="<?php echo site_url('/examinations/questions/' . $examination['exam_id']); ?>"><?php echo $examination['course']; ?>
				<!-- <?php if ($this->session->userdata('user_id') == $examination['user_id']) : ?> -->
					<form class="cat-delete" action="examinations/delete/<?php echo $examination['exam_id']; ?>" method="POST">
						<input type="submit" class="btn-link text-danger" value="Delete">
					</form>
					<form class="cat-delete" action="examinations/edit_exam/<?php echo $examination['exam_id']; ?>" method="POST">
						<input type="submit" class="btn-link text-success" value="Edit">
					</form>
				<!-- <?php endif; ?> -->
			</a>
		</li>
	<?php endforeach; ?>
</ul>
