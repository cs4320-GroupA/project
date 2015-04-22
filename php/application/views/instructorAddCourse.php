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
		        		<th>Signature</th>
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
			    			echo '<td>'.$row->signature.'</td>';

			   	 			foreach($form_data as $temp) {
			    				if($temp->form_data_id == $row->form_data) {
			    					echo '<td>'.$temp->gpa.'</td>';
			    					break;
			    				}
			    			}

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
