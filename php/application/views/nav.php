<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<?php
					//check if 'user_type' is set
					if($this->session->userdata('user_type')) {
						if($this->session->userdata('user_type') == 'applicant') {
							echo "<li><a href='".base_url()."index.php/form'>Application</a></li>";

							if($this->session->userdata('assigned_count')) {
								echo "<li><a href='".base_url()."index.php/notificationsController'>Notifications <span class=\"badge\">".$this->session->userdata('assigned_count')."</span></a></li>";
							} else {
								echo "<li><a href='".base_url()."index.php/notificationsController'>Notifications</a></li>";
							}
						}
						else if($this->session->userdata('user_type') == 'instructor') {
							echo "<li><a href='".base_url()."index.php/instructorAddCourseController'>Add Courses</a></li>";
							
							if($this->session->userdata('assigned_count')) {
								echo "<li><a href='".base_url()."index.php/instructorViewCoursesController'>Your Courses <span class=\"badge\">".$this->session->userdata('assigned_count')."</span></a></li>";
							} else {
								echo "<li><a href='".base_url()."index.php/instructorViewCoursesController'>Your Courses</a></li>";
							}

							echo "<li><a href='".base_url()."index.php/applicantPoolController'>Applicant Pool</a></li>";
						}
						else if($this->session->userdata('user_type') == 'admin') {
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
			</div><!--/.nav-collapse -->
	</div>
</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>