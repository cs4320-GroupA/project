!DOCTYPE html
<html>
	<head>
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
				echo'<div class = "container">';
					echo'<div class = "row">';					
						echo'<div class="col-md-6 col-md-offset-3">';
							echo'<a href="#"class="thumbnail" alt = "application"></a>';
							echo'<h3>Application</h3>';
							echo'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
							echo '<a class = "btn btn-primary" href="'.base_url().'index.php/form">Application</a>';
						echo'</div>';
					echo'</div>';
				echo'</div>';
			}
			else if($this->session->userdata('user_type') == 'instructor')
			{
				echo'<div class="container">';
			    	echo'<div class="row">';
				        echo'<div class="col-md-4">';
				             echo'<h3>Test 1</h3>';
								echo'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
				            echo'<button class="btn btn-primary">Text</button>';
				        echo'</div>';
				        echo'<div class="col-md-4">';
				             echo'<h3>Test 2</h3>';
								echo'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
				            echo'<button class="btn btn-warning">Text</button>';
				        echo'</div>';
				        echo'<div class="col-md-4">';
				             echo'<h3>Test 3</h3>';
								echo'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
				            echo'<button class="btn btn-info">Text</button>';
				        echo'</div>';
				    echo'</div>';
				echo'</div>';
			}
			else if($this->session->userdata('user_type') == 'admin')
			{
				echo'<div class="container">';
			    	echo'<div class="row">';
				        echo'<div class="col-md-3">';
				             echo'<h3>Test 1</h3>';
								echo'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
				            echo'<button class="btn btn-primary">Text</button>';
				        echo'</div>';
				        echo'<div class="col-md-3">';
				             echo'<h3>Test 2</h3>';
								echo'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
				            echo'<button class="btn btn-warning">Text</button>';
				        echo'</div>';
				        echo'<div class="col-md-3">';
				             echo'<h3>Test 3</h3>';
								echo'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
				            echo'<button class="btn btn-info">Text</button>';
				        echo'</div>';
				      	echo'<div class="col-md-3">';
				             echo'<h3>Test 4</h3>';
								echo'<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
											tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
											quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
											consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
											cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
											proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>';
				            echo'<button class="btn btn-danger">Text</button>';
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