<div class="navbar navbar-inverse navbar-fixed-top navbar-collapse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<?php
					//check if 'user_type' is set
					if($this->session->userdata('user_type'))
					{
						if($this->session->userdata('user_type') == 'applicant')
						{
							echo "<li><a href='".base_url()."index.php/form'>Application</a></li>";
							echo "<li><a href='".base_url()."index.php/form'>Notifications<span class="badge">1</span></a></li>"; 
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
			</div><!--/.nav-collapse -->
		</div>
	</div>
