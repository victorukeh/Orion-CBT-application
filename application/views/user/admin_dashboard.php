<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
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

			<div class="row">
				<div class="col-md-12">
					<div class="overview-wrap">
						<h2 class="text-info" style="font-family: Helvetica, sans-serif;">Overview</h2>
					</div>
				</div>
			</div>
			<div class="row m-t-25">
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c1">
						<div class="overview__inner">
							<div class="overview-box clearfix">
								<div class="icon">
									<i class="zmdi zmdi-account"></i>
								</div>
								<div class="text">
									<h2><?php echo $total; ?></h2>
									<span>Total Users</span>
								</div>
							</div>
							<div class="overview-chart">
								<!-- <canvas id="widgetChart1"></canvas> -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c2">
						<div class="overview__inner">
							<div class="overview-box clearfix">
								<div class="icon">
								<i class="zmdi zmdi-accounts-alt"></i>
								</div>
								<div class="text">
									<h2><?php echo $total1; ?></h2>
									<span>Total Students </span>
								</div>
							</div>
							<div class="overview-chart">
								<!-- <canvas id="widgetChart2"></canvas> -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c3">
						<div class="overview__inner">
							<div class="overview-box clearfix">
								<div class="icon">
									<i class="zmdi zmdi-account-box"></i>
								</div>
								<div class="text">
									<h2><?php echo $total2; ?></h2>
									<span>Total Lecturers</span>
								</div>
							</div>
							<div class="overview-chart">
								<!-- <canvas id="widgetChart3"></canvas> -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-lg-3">
					<div class="overview-item overview-item--c4">
						<div class="overview__inner">
							<div class="overview-box clearfix">
								<div class="icon">
									<i class="zmdi zmdi-folder-star"></i>
								</div>
								<div class="text">
									<h2><?php echo $total3; ?></h2>
									<span>Total Exams</span>
								</div>
							</div>
							<div class="overview-chart">
								<!-- <canvas id="widgetChart4"></canvas> -->
							</div>
						</div>
					</div>
				</div>
			</div>

			
				<div class="col-lg-6">
					<!-- //Width not resizable when on small screen -->
					<div class="au-card chart" style="width: 140vh">
						<div class="au-card-inner">
							<h3 class="title-2 tm-b-5">chart by %</h3>
							<div class="row no-gutters">
								<div class="col-xl-6">
									<div class="chart-note-wrap">
										<div class="chart-note mr-0 d-block">
											<span class="dot dot--blue"></span>
											<span>students</span>
										</div>
										<div class="chart-note mr-0 d-block">
											<span class="dot dot--red"></span>
											<span>lecturers</span>
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="percent-chart">
										<canvas id="percent-chart"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
