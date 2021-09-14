<!-- MAIN CONTENT-->
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
		
			<section class="statistic statistic2">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-lg-3">
							<div class="statistic__item statistic__item--green"  style="border-radius:10px;">
								<h2 style="font-size:26px;" class="number">Name</h2>
								<span class="desc"><?php echo $udata['user_name'] ?></span>
								<div class="icon">
									<i class="zmdi zmdi-account-o"></i>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="statistic__item statistic__item--orange"  style="border-radius:10px;">
								<h2 style="font-size:26px;" class="number">Matric Number</h2>
								<span class="desc"><?php echo $udata['user_username'] ?></span>
								<div class="icon">
									<i class="zmdi zmdi-shopping-cart"></i>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="statistic__item statistic__item--red"  style="border-radius:10px;">
								<h2 style="font-size:26px;" class="number">Gender</h2>
								<span class="desc"><?php echo $udata['user_gender'] ?></span>
								<div class="icon">
								<i class="zmdi zmdi-account"></i>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3">
							<div class="statistic__item statistic__item--blue"  style="border-radius:10px;">
								<h2 style="font-size:26px;" class="number">Total Given Exams </h2>
								<span class="desc"></b><?php echo $no ?></span>
								<div class="icon">
									<i class="zmdi zmdi-calendar-note"></i>
								</div>
							</div>
						</div>
					</div>
						<div class="col-md-12 col-lg-12">
							<div class="statistic__item statistic__item--blue"  style="border-radius:10px;">
								<h2 style="font-size:26px;" class="number">Email</h2>
								<span class="desc"><?php echo $udata['user_email'] ?></span>
								<div class="icon">
									<i class="zmdi zmdi-calendar-note"></i>
								</div>
							</div>
						</div>
						
					
				</div>
			</section>



		</div>


	</div>
</div>
