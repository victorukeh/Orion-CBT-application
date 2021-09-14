<!DOCTYPE html>
<html>

<head>
	<title>Orion</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/auth.css">
</head>

<body>
		<div class="container"> 
				<!-- Flash messages -->
		<?php if ($this->session->set_flashdata('login_failed')) :?>
			<?php echo '<p class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</p>'; ?>
			<?php endif; ?>
			<?php unset($_SESSION['login_failed']);?>

		<?php if ($this->session->set_flashdata('user_loggedin')) { ?>
			<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
		<?php } ?>
		<?php unset($_SESSION['user_loggedin']);?>

		<?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>
	  <?php unset($_SESSION['user_loggedout']);?>
			<div class="myCard">

				<div class="row">
					<div class="col-md-6">
						<div class="myLeftCtn">
							<?php echo form_open('user/login'); ?>
							<div class='myForm text-center'>
								<header>Login to Orion</header>

								<div class="form-group">
									<i class="fas fa-user"></i>
									<input class="myInput" type="text" placeholder="Username" id="username" name="username" required autofocus>
								</div>

								<div class="form-group">
									<i class="fas fa-lock"></i>
									<input class="myInput" type="password" id="password" placeholder="Password" name="password" required autofocus>
								</div>
								<button type="submit" class="butt">Login</button>
							</div>
							<?php echo form_close(); ?>

						</div>
					</div>

					<div class="col-md-6">
						<div class="myRightCtn">
							<!-- <?php echo base_url('users/login'); ?> -->
							<div class="box">
								<header><h2>What is Orion? </h2></header>

								<p style="display:flex; justify-items:center; align-items:center;">Orion is a Computer Based Testing Plugin which is developed
									using the CodeIgniter Framework. It provides a structure 
									where lecturers can creat exams for their respective students.
									Students can then take the exams and see their results while the admin manages the users 
									of the system.
								</p>
								<input type="button" class="butt_out" value="Learn More" />
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		setTimeout(function(){
			
			let alert = document.querySelector(".alert");
			alert.remove();
		}, 1000);

		
	</script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
