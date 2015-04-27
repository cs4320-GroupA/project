<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Add Courses</title>
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
	        <h2>Add a Course</h2>
	      </div>
		</div>
		<div class="container">
	      	<div>
	      	<table class="table table-hover">
	      		<thead>
		        	<tr>
		        		<th>Action</th>
		        		<th>Course Title</th>
		        		<th>Current Instructor</th>
		        	</tr>
		    	</thead>
		    	<tbody>
					<?php
  						foreach($courses as $row) {
							echo '<tr>';
		    				echo '<td>';

		    				echo '<form>';
							echo '<button type="submit" class="btn btn-primary" formaction="'.base_url().'index.php/instructorAddCourseController/add/'.$row['course_id'].'"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</button> ';
			    			echo '</td>';
			    			echo '<td>'.$row['course_name'].'</td>';
			    			echo '<td>'.$row['username'].'</td>';

               				echo '</tr>';
               				echo '</form>';
               			}
					?>
				</tbody>
		    </table>				
			</div>
		</div><!--container-->
		
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  	 <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>
