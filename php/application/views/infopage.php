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
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    	<link href="<?php echo base_url(); ?>css/bespoke.css" rel="stylesheet">
	</head>
	<body>
	<div class="navbar-wrapper">
  <div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
        <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href ="#">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div>

    </div>
  </div><!-- /container -->
</div>
		<?php
			//include 'navTest.php';
			echo '<div class="container">';
				echo '<div class="jumbotron">';
					echo '<center>';
					echo '<h1>Welcome!</h1>';
					echo '<p>Current Window: '.$status_title.'</p>';
					echo '<p>Current Semester: '.$semester_title.'</p>';
					echo '</center>';
				echo '</div>';
			echo'</div>';
			//If statemanets that change the given message depending on who
			if($this->session->userdata('user_type') == 'applicant')
			{
				echo'<div class="container text-center">';
			    	echo'<div class="row">';
				        echo'<div class="col-md-6 col-md-offset-3">';
				        echo'<img class="img-circle" width = "140" height = "140" id="thumbnail" src="../../img/application.jpg">';
				             echo'<h3>Application</h3>';
								echo'<p>Fill out an application to apply to be a Teaching Assistant (for graduate students) or a Peer Learning Assistant (for undergraduate students). TAs and PLAs assist an instructor with the courses they teach. Common responsibilities are grading assignments, teaching lab sections, and holding office hours.</p>';
				            echo '<a class = "btn btn-default" href="'.base_url().'index.php/form">Application <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
				        echo'</div>';
				    echo'</div>';
				echo'</div>';
			}
			else if($this->session->userdata('user_type') == 'instructor')
			{
				echo'<div class="container text-center">';
			    	echo'<div class="row">';
				        echo'<div class="col-md-4">';
				        echo'<img class="img-circle" width = "140" height = "140" id="thumbnail" src="../../img/lecturehall.jpg"">';
				             echo'<h3>Add Courses</h3>';
								echo'<p>View the pool of CS/IT courses and add those that you teach. After adding courses, you will be able to preference applicants and leave comments on them. After preferencing applicants, the admin will assign TA/PLAs to your courses!</p>';
				            echo '<a class = "btn btn-default" href="'.base_url().'index.php/instructorAddCourseController">Add Courses <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
				        echo'</div>';
				        echo'<div class="col-md-4">';
				        echo'<img class="img-circle" width = "140" height = "140" id="thumbnail" src="../../img/equation.jpg"">';
				             echo'<h3>Your Courses</h3>';
								echo'<p>View your courses and the TA/PLAs that are assigned to them. If you mistakenly added a course, please contact the admin to remove the erroneously added course.</p>';
				            echo '<a class = "btn btn-default" href="'.base_url().'index.php/instructorViewCoursesController">Your Courses <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
				        echo'</div>';
				        echo'<div class="col-md-4">';
				        echo'<img class="img-circle" width = "140" height = "140" id="thumbnail" src="../../img/applicantpool.jpg"">';
				             echo'<h3>Applicant Pool</h3>';
								echo'<p>View the portion of the applicant pool that requested to teach one of your courses. Be sure to go through each of your courses to preference and comment on applicants!</p>';
				            echo '<a class = "btn btn-default" href="'.base_url().'index.php/applicantPoolController">Applicant Pool <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
				        echo'</div>';
				    echo'</div>';
				echo'</div>';
			}
			else if($this->session->userdata('user_type') == 'admin')
			{
				echo'<div class="container text-center">';
			    	echo'<div class="row">';
				        echo'<div class="col-md-3">';
				        echo'<img class="img-circle" width = "140" height = "140" id="thumbnail" src="../../img/mouse.jpg"">';
				             echo'<h3>Modify Course</h3>';
								echo'<p>Add, edit, or remove courses. Do so with caution.</p>';
				            echo '<a class = "btn btn-default" href="'.base_url().'index.php/adminModifyCourseController">Modify Course <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
				        echo'</div>';
				        echo'<div class="col-md-3">';
				        echo'<img class="img-circle" width = "140" height = "140" id="thumbnail" src="../../img/assign.jpg"">';
				             echo'<h3>Assign Applicants</h3>';
								echo'<p>Assign applicants to instructor courses -- consider preferences & comments.</p>';
				            echo '<a class = "btn btn-default" href="'.base_url().'index.php/adminAssignApplicantController">Assign Applicants <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
				        echo'</div>';
				        echo'<div class="col-md-3">';
				        echo'<img class="img-circle" width = "140" height = "140" id="thumbnail" src="../../img/accountcreation.jpg"">';
				             echo'<h3>Account Creation</h3>';
								echo'<p>Add another admin account. Do so with extreme caution.</p>';
				            echo '<a class = "btn btn-default" href="'.base_url().'index.php/adminAccountCreationController">Account Creation <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
				        echo'</div>';
				      	echo'<div class="col-md-3">';
				      	echo'<img class="img-circle" width = "140" height = "140" id="thumbnail" src="../../img/timeline.jpg"">';
				             echo'<h3>Change Timeline</h3>';
								echo'<p>Move the timeline of the application either forwards or backwards.</p>';
				            echo '<a class = "btn btn-default" href="'.base_url().'index.php/adminTemporalModificationController">Change Timeline <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>';
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