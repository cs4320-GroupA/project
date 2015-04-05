!DOCTYPE html
<html>
<head>
	<title>Application - infoPage</title>
</head>

<body>
	<?php
		include 'nav.php';
		session_start();
		echo "<h1>Welcome!</h1>";	
		//If statemanets that change the given message depending onwho 
		if(isset($_SESSION['applicant'])){			
			echo "<p>APPLICANT FILLER UNTIL WE KNOW WHAT'S HAPPENING</p>";
		} else if(isset($_SESSION['instructor'])){
			echo "<p>INSTRUCTOR FILLER UNTIL WE KNOW WHAT'S HAPPENING</p>"
		} else if(isset($_SESSION['admin'])){
			echo "<p>ADMIN FILLER UNTIL WE KNOW WHAT'S HAPPENING</p>";
		} else {
			echo "<p>YOU'RE NOT LOGGED IN. PLEASE LOG IN.</p>";
		};
			
	?>
</body>
</html>
