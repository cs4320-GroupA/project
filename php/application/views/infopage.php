<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
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
					echo '<p>Current Window: '.$this->session->userdata("status_title").'</p>';
					echo '<p>Current Semester: '.$this->session->userdata("semester_title").'</p>';
					echo '</center>';
				echo '</div>';
			echo'</div>';
			//If statemanets that change the given message depending on who
			if($this->session->userdata('user_type') == 'applicant')
			{
				echo'<div class="container">';
			    	echo'<div class="row">';
				        echo'<div class="col-md-6 col-md-offset-3">';
				             echo'<h3>Application</h3>';
								echo'<p>Fill out an application to apply to be a Teaching Assistant (for graduate students) or a Peer Learning Assistant (for undergraduate students). TAs and PLAs assist an instructor with the courses they teach. Common responsibilities are grading assignments, teaching lab sections, and holding office hours.</p>';
				            echo '<a class = "btn btn-success" href="'.base_url().'index.php/form">Application</a>';
				        echo'</div>';
				    echo'</div>';
				echo'</div>';
			}
			else if($this->session->userdata('user_type') == 'instructor')
			{
				echo'<div class="container">';
			    	echo'<div class="row">';
				        echo'<div class="col-md-4">';
				             echo'<h3>Add Courses</h3>';
								echo'<p>View the pool of CS/IT courses and add those that you teach. After adding courses, you will be able to preference applicants and leave comments on them. After preferencing applicants, the admin will assign TA/PLAs to your courses!</p>';
				            echo '<a class = "btn btn-success" href="'.base_url().'index.php/instructorAddCourseController">Add Courses</a>';
				        echo'</div>';
				        echo'<div class="col-md-4">';
				             echo'<h3>Your Courses</h3>';
								echo'<p>View your courses and the TA/PLAs that are assigned to them. If you mistakenly added a course, please contact the admin to remove the erroneously added course.</p>';
				            echo '<a class = "btn btn-primary" href="'.base_url().'index.php/instructorViewCoursesController">Your Courses</a>';
				        echo'</div>';
				        echo'<div class="col-md-4">';
				             echo'<h3>Applicant Pool</h3>';
								echo'<p>View the portion of the applicant pool that requested to teach one of your courses. Be sure to go through each of your courses to preference and comment on applicants!</p>';
				            echo '<a class = "btn btn-warning" href="'.base_url().'index.php/applicantPoolController">Applicant Pool</a>';
				        echo'</div>';
				    echo'</div>';
				echo'</div>';
			}
			else if($this->session->userdata('user_type') == 'admin')
			{
				echo'<div class="container">';
			    	echo'<div class="row">';
				        echo'<div class="col-md-3">';
				             echo'<h3>Modify Course</h3>';
								echo'<p>Add, edit, or remove courses. Do so with caution.</p>';
				            echo '<a class = "btn btn-primary" href="'.base_url().'index.php/adminModifyCourseController">Modify Course</a>';
				        echo'</div>';
				        echo'<div class="col-md-3">';
				             echo'<h3>Assign Applicants</h3>';
								echo'<p>Assign applicants to instructor courses. Be sure to consider both applicant and instructor preferences, as well as instructor comments.</p>';
				            echo '<a class = "btn btn-warning" href="'.base_url().'index.php/adminAssignApplicantController">Assign Applicants</a>';
				        echo'</div>';
				        echo'<div class="col-md-3">';
				             echo'<h3>Account Creation</h3>';
								echo'<p>Add another admin account. Do so with extreme caution.</p>';
				            echo '<a class = "btn btn-success" href="'.base_url().'index.php/adminAccountCreationController">Account Creation</a>';
				        echo'</div>';
				      	echo'<div class="col-md-3">';
				             echo'<h3>Change Timeline</h3>';
								echo'<p>Move the timeline of the application. Be careful moving the application timeline backwards -- doing so can have unintended consequences.</p>';
				            echo '<a class = "btn btn-danger" href="'.base_url().'index.php/adminTemporalModificationController">Change Timeline</a>';
				        echo'</div>';
				    echo'</div>';
				echo'</div>';
			}
			else
			{
				echo 'ERROR';
			};
		?>
	</body>
</html>