<!--This file is to be included at the top of each page, it's only function is to display to navbar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
	  <!--Sets the Infopage button to revert to the Infopage -->
          <a class="navbar-brand active" href="home">Infopage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			<!-- The buttons on the navbar change depending on who the user is logged in as-->
			<?php
				//check if 'user_type' is set
				if($this->session->userdata('user_type')) {
					if($this->session->userdata('user_type') == 'applicant'){ 
						echo "<li><a href='#'>Applicant Profile</a></li>";
						echo "<li><a href='".base_url()."index.php/form'>Application</a></li>";
					//Nav options for instructor
					} else if($this->session->userdata('user_type') == 'instructor'){ 
						echo "<li><a href='#'>Instructor Profile</a></li>";
					//Nav options for admin
					} else if($this->session->userdata('user_type') == 'admin'){
						echo "<li><a href='#'>Admin profile</a></li>";
					}

					echo '<p class="navbar-text navbar-right">Current Semester: '.$this->session->userdata('semester_title')).'</p>'; 
				}
				else {
					redirect('login', 'refresh');
				}			
			?>
		<li><a href='login/logout'>Logout</a></li>
          </ul>
        </div>
      </div>
</nav>
	<br>
	<br>

