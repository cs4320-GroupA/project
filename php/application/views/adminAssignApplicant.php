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
			<div class='row'>
				<div class="col-md-4">
					<h3>Course</h3>
                    <form accept-charset="utf-8"  method=post action="<?php echo base_url().'index.php/adminAssignApplicantController/getApplicants/'.$row->course_id; ?>" />
					<select class="form-control" name = "courseToAssign" required>
						<?php
							foreach($courses as $row){
								echo "<option>".$row->course_name."</option>";
							}
						?>
					</select>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
				<br>
					<button type = "submit" class="btn btn-default"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Select Course</button>
				</div>
			</div>
			<br><br>
			<div class='row'>
				<div class="col-md-6">
					<h3>Applicant Pool</h3>
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Assign</th>
								<th>Full Name</th>
								<th>GPA</th>
								<th>Course Grade</th>
								<th>Grad Year</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                if(isset($applicants)){
                                    foreach($applicants as $row){
                                        echo '<tr>'; 
                                            echo "<td><input type='checkbox'></td>";
                                            echo "<td>" . $row->first_name . " " . $row->last_name . "</td>"; 
                                            echo "<td>" . $row->gpa_float . "</td>";
                                            echo "<td>" . $row->grade . "</td>";
                                            echo "<td>" . $row->expected_graduation . "</td>";
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr>';
                                        echo "<td><input type='checkbox'></td>";
                                        echo "<td></td>"; 
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                    echo '</tr>';
                                }
							?>							
						</tbody>
					</table>
					<button type = "submit" class = "btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Assign Selected Applicants</button>
				</div>
				<div class="col-md-6">
					<h3>Instructor Preferences</h3>
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Full Name</th>
								<th>Instructor Preference</th>
							</tr>
						</thead>
						<tbody>
							<?php
                                 if(isset($preferences)){ 
                                    foreach($preference as $row){
                                        echo '<tr>';
                                            echo '<td>'.$row->username.'</td>';
                                            echo '<td>'.$row->cp.'</td>';
                                        echo '</tr>';
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
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>
