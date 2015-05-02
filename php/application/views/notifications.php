<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Notifications</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href="<?php echo base_url(); ?>css/bespoke.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include 'nav.php';
		?>
		<div class="container">
			<div class="page-header">
				<h2>Notifications</h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php				
						if (isset($))
						{
							echo '<p></p>';
							echo'<table class="table table-hover table-striped">';
			                    echo'<thead>';
			                    	echo'<tr>';
			                    		echo'<th>Course Name</th>';
			                    		echo'<th>Instructor</th>';
			                    		echo'<th>Semester</th>';
			                    	echo'</tr>';
			                    echo'</thead>';
			                    echo'<tbody>';
																		
								echo'</tbody>';
		                    echo'</table>';
						}

						else 
						{
							echo'<p>You have no notifications to display</p>';
						}
					?>
				</div>
			</div>
		</div>
	</body>
</html>