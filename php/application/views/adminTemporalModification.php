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
					if ($this->session->userdata("status_title") == "APPLICATION")
					{
						echo '<div class ="col-md-12">';
							echo '<p>';
							echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel augue ex. Nunc lobortis convallis cursus. Donec vestibulum eleifend felis eu ultricies. Sed mattis ornare pharetra. Curabitur vitae nunc fringilla, eleifend turpis sed, ullamcorper odio. Aenean enim est, aliquam vitae laoreet a, ultrices eu eros. Nulla massa dolor, pulvinar sed tellus at, gravida consequat mi. In fringilla, purus ac gravida pharetra, tortor urna viverra massa, id tincidunt nisi magna eget dolor. In scelerisque vitae diam quis tempus.';
							echo '</p>';
							echo '<button type="button" class="btn btn-primary">Move to Selection</button>';
						echo '</div>';
					}
					else if ($this->session->userdata("status_title") == "SELECTION")
					{
						echo '<div class ="col-md-12">';
							echo '<p>';
							echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel augue ex. Nunc lobortis convallis cursus. Donec vestibulum eleifend felis eu ultricies. Sed mattis ornare pharetra. Curabitur vitae nunc fringilla, eleifend turpis sed, ullamcorper odio. Aenean enim est, aliquam vitae laoreet a, ultrices eu eros. Nulla massa dolor, pulvinar sed tellus at, gravida consequat mi. In fringilla, purus ac gravida pharetra, tortor urna viverra massa, id tincidunt nisi magna eget dolor. In scelerisque vitae diam quis tempus.';
							echo '</p>';
							echo '<button type="button" class="btn btn-primary">Move to Notification</button>';
						echo '</div>';
					}
					else
					{
						echo '<div class ="col-md-12">';
							echo '<p>';
							echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vel augue ex. Nunc lobortis convallis cursus. Donec vestibulum eleifend felis eu ultricies. Sed mattis ornare pharetra. Curabitur vitae nunc fringilla, eleifend turpis sed, ullamcorper odio. Aenean enim est, aliquam vitae laoreet a, ultrices eu eros. Nulla massa dolor, pulvinar sed tellus at, gravida consequat mi. In fringilla, purus ac gravida pharetra, tortor urna viverra massa, id tincidunt nisi magna eget dolor. In scelerisque vitae diam quis tempus.';
							echo '</p>';
							echo '<button type="button" class="btn btn-primary">Move to Application</button>';
						echo '</div>';
					}
				?>				
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>