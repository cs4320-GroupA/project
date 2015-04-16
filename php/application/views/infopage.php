!DOCTYPE html
<html>
	<head>
		<title>Home</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include 'nav.php';
		?>
		<div class="container">
			<div class="jumbotron">
				<center>
				<h1>Welcome!</h1>
				<hr>
				<p>The timeline is currently in the following window: </p>
				<p>The applications are for *insert semester query* semester</p>
				</center>
			</div>
		</div>
		<?php
			//If statemanets that change the given message depending on who
			if($this->session->userdata('user_type') == 'applicant')
			{
				echo "<p>APPLICANT FILLER UNTIL WE KNOW WHAT'S HAPPENING</p>";
			}
			else if($this->session->userdata('user_type') == 'instructor')
			{
				echo "<p>INSTRUCTOR FILLER UNTIL WE KNOW WHAT'S HAPPENING</p>";
			}
			else if($this->session->userdata('user_type') == 'admin')
			{
				echo "<p>ADMIN FILLER UNTIL WE KNOW WHAT'S HAPPENING</p>";
			}
			else
			{
				echo "<p>YOU'RE NOT LOGGED IN. PLEASE LOG IN.</p>";
			};
				
		?>
	</body>
</html>