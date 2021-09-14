<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Orion User Dashboard</title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/fontawesome-free-5.15.3-web/css/font-awesome.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap.css" />
	<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap.min.css" /> -->

<!-- other css-->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/index.css" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
            <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
          <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/ace-ie.min.css" />
        <![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="<?php echo base_url() ?>assets/js/ace-extra.min.js"></script>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
        <script src="<?php echo base_url() ?>assets/js/html5shiv.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/respond.min.js"></script>
        <![endif]-->
</head>

<body class="no-skin">
	<div id="navbar" class="navbar navbar-default          ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">


			<div class="navbar-header pull-left">
				<a href="<?php echo base_url(); ?>students/index/<?php echo $users['user_id']; ?>" class="navbar-brand">
					<small>
						<i class="fa fa-leaf"></i>
						User
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">



					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<!-- <img class="nav-user-photo" src="<?php echo base_url() ?>assets/images/avatars/a.png" alt="Jason's Photo" /> -->
							<span class="user-info">
								<small>Welcome,</small>
								<?php $name = $this->session->userdata('usernames');
								if (isset($name)) {
									echo $name;
								} ?>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

							<li>
								<a href="<?php echo base_url(); ?>userController/logOut">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try {
				ace.settings.loadState('main-container')
			} catch (e) {}
		</script>

		<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
			<script type="text/javascript">
				try {
					ace.settings.loadState('sidebar')
				} catch (e) {}
			</script>

			<!-- /.sidebar-shortcuts -->

			<ul class="nav nav-list">
				<li class="active">
					<a href="<?php echo base_url(); ?>students/index/<?php echo $users['user_id']; ?>">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> User Panel </span>
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-caret-right"></i>

						Tests
						<b class="arrow fa fa-angle-down"></b>
					</a>

					<b class="arrow"></b>

					<ul class="submenu">

						<li class="">
							<a href="<?php echo base_url(); ?>userController/examHistory/<?php echo $users['user_username'] ?>">
							<i class="menu-icon fa fa-plus purple"></i>
							View Test History
							</a>

							<b class="arrow"></b>
						</li>

						<li class="">
							<a href="<?php echo base_url(); ?>examinations/viewExams/<?php echo $users['user_username'] ?>">
								<i class="menu-icon fa fa-plus purple"></i>
								Take Assessment
							</a>

							<b class="arrow"></b>
						</li>

					</ul>
				</li>

			</ul><!-- /.nav-list -->
			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>

		<div class="main-content">
			<div class="main-content-inner">
			<div class="page-content">
	<!-- /.ace-settings-container -->