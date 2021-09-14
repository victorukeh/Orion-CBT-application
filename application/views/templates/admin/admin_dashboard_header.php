<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags-->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Title Page-->
	<title>Orion Admin Dashboard</title>

	<!-- Fontfaces CSS-->
	<link href="<?php echo base_url(); ?>assets/css/font-face.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url(); ?>assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url(); ?>assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url(); ?>assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

	<!-- Bootstrap CSS-->
	<link href="<?php echo base_url(); ?>assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

	<link href="<?php echo base_url(); ?>assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="<?php echo base_url(); ?>assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url(); ?>assets/vendor/wow/animate.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url(); ?>assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url(); ?>assets/vendor/slick/slick.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url(); ?>assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
	<link href="<?php echo base_url(); ?>assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

	<!-- Main CSS-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link href="<?php echo base_url(); ?>assets/css/theme.css" rel="stylesheet" media="all">
	<script src="http://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

</head>

<body class="animsition">
	<div class="page-wrapper">
		<!-- HEADER MOBILE-->
		<header class="header-mobile d-block d-lg-none">
			<div class="header-mobile__bar">
				<div class="container-fluid">
					<div class="header-mobile-inner">
						<a class="logo" href="#">
							<span> <i class="fab fa-confluence" aria-hidden="true"></i></span>
							<span>
								<h2>Orion</h2>
							</span>
						</a>
						<button class="hamburger hamburger--slider" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
			<nav class="navbar-mobile">
				<div class="container-fluid">
					<ul class="navbar-mobile__list list-unstyled">
					<li>
							<a href="<?php echo base_url(); ?>user/admin/<?php echo $udata['user_id'] ?>">
								<i class="fas fa-desktop"></i>
								Admin Dashboard
							</a>
						</li>
						<li class="has-sub">
							<a class="js-arrow" href="<?php echo base_url(); ?>user/create_user/<?php echo $udata['user_id'] ?>">
								<i class="fas fa-user-circle"></i>
								Create User
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>user/get_all_lecturers/<?php echo $udata['user_id'] ?>">
								<i class="fa fa-address-card" aria-hidden="true"></i>
								Lecturers
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>user/get_all_students/<?php echo $udata['user_id'] ?>">
								<i class="fas fa-book-reader" aria-hidden="true"></i>
								Students
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-book" aria-hidden="true"></i>
								Courses
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>examinations/adminviewResult/<?php echo $udata['user_username'] ?>">
								<i class="fa fa-graduation-cap" aria-hidden="true"></i>
								Students Reports
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-lock"></i>
								Change Password
							</a>
						</li>


						<li class="list">
							<a href="<?php echo base_url(); ?>user/logout">
								<i class="fas fa-power-off"></i>
								Sign Out
							</a>
						</li>

					</ul>
				</div>
			</nav>
		</header>
		<!-- END HEADER MOBILE-->

		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a class="logo" href="#">
					<span> <i class="fab fa-confluence" aria-hidden="true"></i></span>
					<span>
						<h2 class="title"> Orion</h2>
					</span>
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<ul class="list-unstyled navbar__list">
						<li class="active has-sub">
							<a class="js-arrow" href="<?php echo base_url(); ?>user/admin/<?php echo $udata['user_id'] ?>">
								<i class="fas fa-desktop"></i>
								Admin Dashboard
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>user/create_user/<?php echo $udata['user_id'] ?>">
								<i class="fas fa-user-circle"></i>
								Create User
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>user/get_all_lecturers/<?php echo $udata['user_id'] ?>">
								<i class="fa fa-address-card" aria-hidden="true"></i>
								Lecturers
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>user/get_all_students/<?php echo $udata['user_id'] ?>">
								<i class="fas fa-book-reader"></i>
								Students
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-book" aria-hidden="true"></i>
								Courses
							</a>
						</li>
						<li>
							<a href="<?php echo base_url(); ?>examinations/adminviewResult/<?php echo $udata['user_username'] ?>">
								<i class="fa fa-graduation-cap" aria-hidden="true"></i>
								Students Reports
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fas fa-lock"></i>
								Change Password
							</a>
						</li>
						<li class="list">
							<a href="<?php echo base_url(); ?>user/logout">
								<i class="fas fa-power-off"></i>
								Sign Out
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container">
			<!-- HEADER DESKTOP-->
			<header class="header-desktop">
				<div style="padding-top:30px;" class=" section__content--p30">
					<div class="container-fluid">
						<div class="header-wrap">
							<form class="form-header" action="" method="POST">
							</form>
							<div class="header-button">
								<div style="padding-bottom:20px;"class="noti-wrap">
									
									<div class="noti__item js-item-menu">
										<i class="zmdi zmdi-notifications"></i>
										<span class="quantity">3</span>
										<div class="notifi-dropdown js-dropdown">
											<div class="notifi__title">
												<p>You have 3 Notifications</p>
											</div>
											<div class="notifi__item">
												<div class="bg-c1 img-cir img-40">
													<i class="zmdi zmdi-email-open"></i>
												</div>
												<div class="content">
													<p>You got a email notification</p>
													<span class="date">April 12, 2018 06:50</span>
												</div>
											</div>
											<div class="notifi__item">
												<div class="bg-c2 img-cir img-40">
													<i class="zmdi zmdi-account-box"></i>
												</div>
												<div class="content">
													<p>Your account has been blocked</p>
													<span class="date">April 12, 2018 06:50</span>
												</div>
											</div>
											<div class="notifi__item">
												<div class="bg-c3 img-cir img-40">
													<i class="zmdi zmdi-file-text"></i>
												</div>
												<div class="content">
													<p>You got a new file</p>
													<span class="date">April 12, 2018 06:50</span>
												</div>
											</div>
											<div class="notifi__footer">
												<a href="#">All notifications</a>
											</div>
										</div>
									</div>
								</div>
								<div  class="account-wrap">
									<div class="account-item clearfix js-item-menu">
										<div class="image">
											<img src="<?php echo base_url(); ?>assets/images/avatar-01.png" alt="John Doe" />
										</div>
										<div  class="content">
											<a class="js-acc-btn" href="#"><?php echo $udata['user_username'] ?></a>
										</div>
										<div class="account-dropdown js-dropdown">
											<div class="info clearfix">
												<div class="image">
													<a href="#">
														<img src="<?php echo base_url(); ?>assets/images/avatar-01.png" alt="John Doe" />
													</a>
												</div>
												<div class="content">
													<h5 class="name">
														<a href="#"><?php echo $udata['user_username'] ?></a>
													</h5>
													<span class="email"><?php echo $udata['user_email'] ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- HEADER DESKTOP-->
			
     

		
