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
          <a class="navbar-brand active" href="infopage.php">Infopage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			<!-- The buttons on the navbar change depending on who the user is logged in as-->
			<?php
					session_start();
					//codeigniter grabbing the user type from the current sessions
					$user_type = $this->session->userdata('user_type');
					//Nav options for applicant
					if(strcmp($user_type,"applicant"){
						echo "<li><a href='#'>Applicant Profile</a></li>";
					//Nav options for instructor
					} else if(strcmp($user_type,"instructor"){
						echo "<li><a href='#'>Instructor Profile</a></li>";
					//Nav options for admin
					} else if(strcmp($user_type,"admin"){
						echo "<li><a href='#'>Admin profile</a></li>";
					} else {
						echo "<li><a href='#'>Not Logged In</a></li>";
					};
						
			?>
          </ul>
        </div>
      </div>
</nav>
	<br>
	<br>

