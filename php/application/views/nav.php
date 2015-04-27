<!--This file is to be included at the top of each page, it's only function is to display to navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<!--Sets the Infopage button to revert to the Infopage -->
			<a class="navbar-brand active" href="<?php echo base_url(); ?>index.php/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<!-- The buttons on the navbar change depending on who the user is logged in as-->
				<?php
					//check if 'user_type' is set
					if($this->session->userdata('user_type'))
					{
						if($this->session->userdata('user_type') == 'applicant')
						{
							echo "<li><a href='".base_url()."index.php/form'>Application</a></li>";
						//Nav options for instructor
						}
						else if($this->session->userdata('user_type') == 'instructor')
						{
							echo "<li><a href='".base_url()."index.php/instructorAddCourseController'>Add Courses</a></li>";
							echo "<li><a href='".base_url()."index.php/instructorViewCoursesController'>Your Courses</a></li>";
							echo "<li><a href='".base_url()."index.php/applicantPoolController'>Applicant Pool</a></li>";
							//Nav options for admin
						}
						else if($this->session->userdata('user_type') == 'admin')
						{
							echo "<li><a href='".base_url()."index.php/adminModifyCourseController'>Modify Course</a></li>";
							echo "<li><a href='".base_url()."index.php/adminAssignApplicantController'>Assign Applicants</a></li>";
							echo "<li><a href='".base_url()."index.php/adminAccountCreationController'>Account Creation</a></li>";
							echo "<li><a href='".base_url()."index.php/adminTemporalModificationController'>Change Timeline</a></li>";
						}
					}
					else
					{
						redirect('login', 'refresh');
					}
				?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href='<?php echo base_url(); ?>index.php/login/logout'>Logout <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
			</ul>
		</div>
	</div>
</nav>