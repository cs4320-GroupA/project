<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Preference</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href="<?php echo base_url(); ?>css/bespoke.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include 'nav.php';
		?>
		<div class="container">
			<div class="page-header">
				<h2><?php echo $course_name; ?></h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Current Preferenced Students</h3>
					<table class="table table-hover table-striped">
                    <thead>
                    	<tr>
                    		<th>Preference</th>
                    		<th>Name</th>
                    	</tr>
                    </thead>
                    <tbody>
                    	<?php 
                    		if(isset($preferenced_forms)) {
                    			foreach($preferenced_forms as $row) {
                    				echo '<tr>';
                    				echo '<td>'.$row->preference_number.'</td>'
									echo '<td>'.$row->first_name.' '.$row->last_name.'</td>';
									echo '<td><form><button type="submit" class="btn btn-default message_panel" formaction="'.base_url().'/index.php/preferenceByCourseController/'.$course_id.'/'.$row->preference_id.'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Remove</button></td>';
									echo '</tr>';
                    			}
                    		}
                    	?>
					</tbody>
                    </table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Applicants that Preferenced This Course</h3>
					<table class="table table-hover table-striped">
                    <thead>
                    	<tr>
                    		<th>Application</th>
                    		<th>Name</th>
                    		<th>GPA</th>
                    	</tr>
                    </thead>
                    <tbody>
						<tr>
						<?php
							if(isset($desired_forms)) {
  								foreach($desired_forms as $row) {
									echo '<tr>';
				    				echo '<td>';
				    				echo '<form>';
									echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/form/viewForm/'.$row->user_id.'/'.$row->semester_id.'"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> View</button> ';
					    			echo '</td>';
					    			echo '<td>'.$row->first_name.' '.$row->last_name.'</td>';
					    			echo '<td>'.$row->gpa.'</td>';
		               				echo '</tr>';
		               				echo '</form>';
	               				}
	               			}
						?>
					</tbody>
                    </table>
				</div>
			</div>
		</div>
	</body>
</html>