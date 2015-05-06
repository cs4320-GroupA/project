<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Assign Applicants</title>
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
				<h2>Assign Applicants</h2>
			</div>
		</div>
		<div class="container">
		<?php if(isset($message_header)) { ?>
			<div class = "row">
	      	<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
	 		 			<div class="panel-heading">
	    					<h3 class="panel-title"><b><?php echo $message_header; ?></b></h3>
	  					</div>
	  					<div class="panel-body">
	    					<?php
	    					if(isset($message)) {
	    						echo $message;
	    					}
	    				?>
	    				</div>
	    			</div>
	    	</div>
	    	</div>
	    <?php
	    	}
	    ?>
			<div class='row'>
				<div class="col-md-4">
					<h3>Course</h3>
                    <form accept-charset="utf-8"  method=post action=<?php echo base_url().'index.php/adminAssignApplicantController/getApplicants/' ?> />
                    <select class="form-control" name = "courseToAssign" required>
                    	<option disabled selected hidden></option>
						<?php
						if(isset($courses)) {
							foreach($courses as $row){
								if(isset($currentCourse)) {
                                	if($currentCourse->course_id == $row->course_id) {
								    	echo "<option selected>".$row->course_name."</option>";
								    }
								    else {
								    	echo "<option>".$row->course_name."</option>";
									}
								}
                                else {
								    echo "<option>".$row->course_name."</option>";
								}
							}
						}
						?>
                    </select>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
				<br>
					<button type = "submit" class="btn btn-default"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Select a Course</button>
                    </form>
				</div>
			</div>
			<br><br>
			<?php if(isset($assigned_applicants)) { ?>
			<div class="row">
			    <h3>Currently Assigned Students</h3>
			    <table class="table table-hover table-striped">
			      <thead>
			        <tr>
			          <th>Remove</th>
			          <th>Full Name</th>
			          <th>GPA</th>
			          <th>Grad Year</th>
			        </tr>
			      </thead>
			      <tbody>
			        <tr>
                    <?php
                        foreach($assigned_applicants as $row) {
                            echo '<tr>'; 
                            echo '<form>';
                                echo '<td><button class="btn btn-default" formaction="'.base_url().'index.php/adminAssignApplicantController/remove/'.$row->assigned_id.'/'.$currentCourse->course_id.'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove</button>';
                                echo "<td>" . $row->first_name . " " . $row->last_name . "</td>"; 
                                echo "<td>" . $row->gpa . "</td>";
                                echo "<td>" . $row->expected_graduation . "</td>";
                            echo '</form>';
                            echo '</tr>';
                        }
			         ?>
			        </tr>
			      </tbody>
			    </table>
		    </div>
		   	<?php } ?>
			<?php if(isset($currentCourse)) { ?>
			<div class='row'>
				<div class="col-md-6">
                 <form accept-charset="utf-8"  method=post action=<?php echo base_url().'index.php/adminAssignApplicantController/assign/'.$currentCourse->course_id ?> />
					<?php if(!isset($applicant_pool)) { echo '<h3>Applicants that Preferenced this Course</h3>'; }
						  else if(isset($applicant_pool)) { echo '<h3>Applicant Pool</h3>'; }
					?>
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Assign</th>
								<th>Full Name</th>
								<th>GPA</th>
								<th>Course Grade</th>
								<th>Grad Year</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                            if(isset($applicants)) {
                                if(count($applicants) > 0){
                                    foreach($applicants as $applicant) {
                                        echo '<tr>'; 
                                            echo "<td><input type='checkbox' name='applicants[]' value='".$applicant->form_id."'></td>";
                                            //print_r($applicant);
                                            echo "<td>" . $applicant->first_name . " " . $applicant->last_name . "</td>"; 
                                            echo "<td>" . $applicant->gpa . "</td>";
                                            echo "<td>" . $applicant->grade . "</td>";
                                            echo "<td>" . $applicant->expected_graduation . "</td>";
                                            echo '<td><button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/form/viewForm/'.$applicant->user_id.'/'.$applicant->semester_id.'"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> View</button></td>';
                                        echo '</tr>';
                                    }
                                }
                            } else if(isset($applicant_pool)) {
                                    foreach($applicant_pool as $applicant) {
                                        echo '<tr>'; 
                                            echo "<td><input type='checkbox' name='applicants[]' value='".$applicant->form_id."'></td>";
                                            //print_r($applicant);
                                            echo "<td>" . $applicant->first_name . " " . $applicant->last_name . "</td>"; 
                                            echo "<td>" . $applicant->gpa . "</td>";
                                            echo "<td>" . $applicant->grade . "</td>";
                                            echo "<td>" . $applicant->expected_graduation . "</td>";
                                            echo '<td><button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/form/viewForm/'.$applicant->user_id.'/'.$applicant->semester_id.'"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> View</button></td>';
                                        echo '</tr>';
                                    }
                            } else {
                                echo '<tr>';
                                    echo "<td></td>";
                                    echo "<td></td>"; 
                                    echo "<td></td>";
                                    echo "<td></td>";
                                    echo "<td></td>";
                                echo '</tr>';
                            }
							?>							
						</tbody>
					</table>
					<?php if(isset($assignable)) { ?>
						<button type = "submit" class = "btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Assign Selected Applicants</button>
                	<?php } ?>
                </form>
				</div>
				<div class="col-md-6">
					<h3>Instructor Preferences for this Course</h3>
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Preference</th>
								<th>Full Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
                             if(isset($preferences)){     
                                 if(count($preferences) > 0){ 
                                    foreach($preferences as $preference){
                                        echo '<tr>';
                                        	echo '<form>';
                                        	echo '<td>'.$preference->preference_number.'</td>';
                                            echo '<td>'.$preference->first_name.' '.$preference->last_name.'</td>';
                                            echo '<td>';
                                            
                                            if(isset($assignable)) {
                                            	echo '<button type="submit" class="btn btn-default message_panel" formaction="'.base_url().'index.php/adminAssignApplicantController/quick_assign/'.$course_id.'/'.$preference->form_id.'"><span class="glyphicon glyphicon-add" aria-hidden="true"></span> Assign</button> ';
                                        	}
                                        	
                                        	echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/form/viewForm/'.$preference->user_id.'/'.$preference->semester_id.'"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> View</button>';
                                        	echo '</td>';
                                        	echo '</form>';
                                        echo '</tr>';
                                    }
                                 }
                             } else {
                                 echo '<tr>';
                                    echo '<td></td>';
                                    echo '<td></td>';
                                echo '</tr>';
                             }
							?>
						</tbody>
					</table>
				</div>
			</div>
			<?php } ?>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>
