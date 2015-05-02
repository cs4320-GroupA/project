<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Change Timeline</title>
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
				<h2>Change Timeline</h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php
					if ($status_title == "APPLICATION")
					{
						echo '<h3>Move this Semester\'s Timeline</h3>';
						echo '<div class ="col-md-12">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Application mode</b>. Here, applicants can submit applications to be a TA/PLA for the upcoming semester. Upon moving the application to the Selection mode, no applications will be allowed to be submitted and instructors will begin to be able to preference applicants.';
							echo '</p>';
                            echo "\n<form>\n";
                            echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminTemporalModificationController/set/2">Move Forward to Selection <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>';
                            echo "\n<form>";
						echo '</div>';
					}
					else if ($status_title == "SELECTION")
					{
						echo '<h3>Move this Semester\'s Timeline</h3>';
						echo '<div class ="col-md-6">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Selection mode</b>. Here, instructors will preference applicants for each of their classes. Upon moving back to the Application mode, applicant submissions are reopened.';
							echo '</p>';
							echo "\n<form>\n\t\t";
                            echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminTemporalModificationController/set/1"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Move Back to Application</button>';
                            echo "\n</form>";
						echo '</div>';
						echo '<div class ="col-md-6">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Selection mode</b>. Here, instructors will preference applicants for each of their classes. Upon moving to the Notification mode, applicants are notified of their potential appointment as a TA/PLA of a course.';
							echo '</p>';
                            echo "\n<form>\n\t\t";
                            echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminTemporalModificationController/set/3">Move Forward to Notification <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></button>';
                            echo "\n</form>";
						echo '</div>';
					}
					else if ($status_title == "NOTIFICATION")
					{
						echo '<h3>Move this Semester\'s Timeline</h3>';
						echo '<div class ="col-md-6">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Notification mode</b>. Here, instructors will preference applicants for each of their classes. Upon moving the application to the Selection mode, no applications will be allowed to be submitted and instructors will begin to be able to preference applicants.';
							echo '</p>';
                            echo "\n<form>\n";
                            echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminTemporalModificationController/set/2"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Move Back to Selection</button>';
                            echo "\n</form>";
						echo '</div>';
						echo '<div class ="col-md-6">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Notification mode</b>. Here, instructors will preference applicants for each of their classes. Upon moving back to the Application mode, applicant submissions are reopened.';
							echo '</p>';
                            echo '<form>';
                            echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminTemporalModificationController/set/1"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Move Back to Application</button>';
                            echo '</form>';
						echo '</div>';
					}
					else
					{
						echo '<h3>Move this Semester\'s Timeline</h3>';
						echo '<div class ="col-md-4">';
							echo '<p>';
							echo 'Move to the Application mode. Here, applicants can submit applications to be a TA/PLA for the upcoming semester. Upon moving the application to the Selection mode, no applications will be allowed to be submitted and instructors will begin to be able to preference applicants.';
							echo '</p>';
                            echo '<form>';
                            echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminTemporalModificationController/set/1">Move to Application</button>';
                            echo '</form>';
						echo '</div>';
						echo '<div class ="col-md-4">';
							echo '<p>';
							echo 'Move to the Selection mode. Here, instructors will preference applicants for each of their classes. Upon moving to the Notification mode, applicants are notified of their potential appointment as a TA/PLA of a course.';
							echo '</p>';
                            echo '<form>';
                            echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminTemporalModificationController/set/2">Move to Selection</button>';
                            echo '</form>';
						echo '</div>';
						echo '<div class ="col-md-4">';
							echo '<p>';
							echo 'Move to the Notification mode. Here, the applicants are notified of their potential appointment as a TA/PLA of a course.';
							echo '</p>';
                            echo '<form>';
                            echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminTemporalModificationController/set/3">Move to Notification</button>';
                            echo '</form>';
						echo '</div>';
					}
				?>				
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>