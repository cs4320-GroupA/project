!DOCTYPE html
<html>
	<head>
		<title>Home</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include 'nav.php';
			echo '<div class="container">';
				echo '<div class="jumbotron">';
					echo '<center>';
					echo '<h1>Welcome!</h1>';
					echo '<p>Current Window: '.$this->session->userdata("status").'</p>';
					echo '<p>Current Semester: '.$this->session->userdata("semester_title").'</p>';
					echo '</center>';
				echo '</div>';
			echo'</div>';
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