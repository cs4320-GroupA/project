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
	        	<h2>Applicant Pool</h2>
	      	</div>
	      	<div>
	      	<table class="table table-hover">
	      		<thead>
		        	<tr>
		        		<th>Action</th>
		        		<th>Name</th>
		        		<th>GPA</th>
		        	</tr>
		    	</thead>
		    	<tbody>
					<?php
  						foreach($applicants as $row) {
							echo '<tr>';
		    				echo '<td>';

		    				echo '<form>';
							echo '<button type="submit" class="btn btn-primary" formaction="'.base_url().'index.php/form/viewForm/'.$row->user_id.'/'.$row->semester_id.'">View</button> ';
			    			echo '</td>';
			    			echo '<td>'.$row->first_name.' '.$row->last_name.'</td>';
			    			echo '<td>'.$row->gpa.'</td>';
			    			
               				echo '</tr>';
               				echo '</form>';
               			}
					?>
				</tbody>
		    </table>				
			</div>
		</div>
</body>
</html>