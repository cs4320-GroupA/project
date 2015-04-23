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

                /*
                 * need to give out different user options based on current semester status
                 * if:  application - can go to selection (2)
                 *      selection - can go to application or to notification (1, 3)
                 *      notification - can go to application or to selection (1, 2)
                 *      closed - can go to any of the first three (1, 2, 3)
                 */
					if ($this->session->userdata("status_title") == "APPLICATION")
					{
						echo '<div class ="col-md-12">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Application mode</b>. Here, applicants can submit applications to be a TA/PLA for the upcoming semester. Upon moving the application to the Selection mode, no applications will be allowed to be submitted and instructors will begin to be able to preference applicants.';
							echo '</p>';
							//echo '<button type="button" class="btn btn-primary">Move Forward to Selection</button>';
                        // might need to use 's href' for the function calls here
                            echo '<a href='.base_url().'index.php/adminTemporalModificationController/set/2>Move Forward to Selection</a>';
						echo '</div>';
					}// end application if
					else if ($this->session->userdata("status_title") == "SELECTION")
					{
						echo '<div class ="col-md-6">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Selection mode</b>. Here, instructors will preference applicants for each of their classes. Upon moving back to the Application mode, applicant submissions are reopened.';
							echo '</p>';
							//echo '<button type="button" class="btn btn-primary">Move Back to Application</button>';
                            echo '<a href='.base_url().'index.php/adminTemporalModificationController/set/1>Move Back to Application</a>';
						echo '</div>';
						echo '<div class ="col-md-6">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Selection mode</b>. Here, instructors will preference applicants for each of their classes. Upon moving to the Notification mode, applicants are notified of their potential appointment as a TA/PLA of a course.';
							echo '</p>';
							//echo '<button type="button" class="btn btn-primary">Move Forward to Notification</button>';
                            echo '<a href='.base_url().'index.php/adminTemporalModificationController/set/3>Move Forward to Notification</a>';                  
						echo '</div>';
					}// end selection else if
					else if ($this->session->userdata("status_title") == "Notification")
					{
						echo '<div class ="col-md-6">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Notification mode</b>. Here, instructors will preference applicants for each of their classes. Upon moving the application to the Selection mode, no applications will be allowed to be submitted and instructors will begin to be able to preference applicants.';
							echo '</p>';
							//echo '<button type="button" class="btn btn-primary">Move Back to Selection</button>';
                            echo '<a href='.base_url().'index.php/adminTemporalModificationController/set/2>Move Back to Selection</a>';
						echo '</div>';
						echo '<div class ="col-md-6">';
							echo '<p>';
							echo 'The application timeline is currently in the <b>Notification mode</b>. Here, instructors will preference applicants for each of their classes. Upon moving back to the Application mode, applicant submissions are reopened.';
							echo '</p>';
							//echo '<button type="button" class="btn btn-primary">Move Back to Application</button>';
                            echo '<a href='.base_url().'index.php/adminTemporalModificationController/set/1>Move Back to Application</a>';
						echo '</div>';
					}// end notification else if
					else
					{
						echo '<div class ="col-md-4">';
							echo '<p>';
							echo 'Move to the Application mode. Here, applicants can submit applications to be a TA/PLA for the upcoming semester. Upon moving the application to the Selection mode, no applications will be allowed to be submitted and instructors will begin to be able to preference applicants.';
							echo '</p>';
							//echo '<button type="button" class="btn btn-primary">Move to Application</button>';
                            echo '<a href='.base_url().'index.php/adminTemporalModificationController/set/1>Move to Application</a>';
						echo '</div>';
						echo '<div class ="col-md-4">';
							echo '<p>';
							echo 'Move to the Selection mode. Here, instructors will preference applicants for each of their classes. Upon moving to the Notification mode, applicants are notified of their potential appointment as a TA/PLA of a course.';
							echo '</p>';
							//echo '<button type="button" class="btn btn-primary">Move to Selection</button>';
                            echo '<a href='.base_url().'index.php/adminTemporalModificationController/set/2>Move to Selection</a>';
						echo '</div>';
						echo '<div class ="col-md-4">';
							echo '<p>';
							echo 'Move to the Notification mode. Here, the applicants are notified of their potential appointment as a TA/PLA of a course.';
							echo '</p>';
							//echo '<button type="button" class="btn btn-primary">Move to Notification</button>';
                            echo '<a href='.base_url().'index.php/adminTemporalModificationController/set/3>Move to Notification</a>';
						echo '</div>';
					}// end closed else if
				?>				
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>