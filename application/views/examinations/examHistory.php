<!-- MAIN CONTENT-->
<div class="main-content" style="padding-top:80px;">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
<div class="row m-t-30">
	<div class="col-md-12">
		<!-- DATA TABLE-->
		<div class="table-responsive m-b-40">
			<table class="table table-borderless table-data3">
				<thead>
					<tr>
						<th>Examination</th>
						<th>Time</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($history as $exam) { ?>
						<tr>
							<td><?php echo $exam['course']; ?> <?php echo $exam['test_name']; ?></td>
							<td><?php echo $exam['time']; ?></td>
							<td><?php echo $exam['date']; ?></td>
						</tr>

					<?php } ?>
				</tbody>
			</table>

		</div>
	</div>
</div>
