!DOCTYPE html
<html>
<head>
	<title>Application - infoPage</title>
</head>

<body>
	<?php
		include 'nav.php';

		echo "<h1>Welcome!</h1>";	
		//If statemanets that change the given message depending onwho 
		if($this->session->userdata('applicant')){			
			echo "<p>APPLICANT FILLER UNTIL WE KNOW WHAT'S HAPPENING</p>";
		} else if($this->session->userdata('instructor')){
			echo "<p>INSTRUCTOR FILLER UNTIL WE KNOW WHAT'S HAPPENING</p>";
		} else if($this->session->userdata('admin')){
			echo "<p>ADMIN FILLER UNTIL WE KNOW WHAT'S HAPPENING</p>";
		} else {
			echo "<p>YOU'RE NOT LOGGED IN. PLEASE LOG IN.</p>";
		};
			
	?>
</body>
</html>
