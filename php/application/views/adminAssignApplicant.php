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
					<select class="form-control" name = "courseToAssign" required>
						<?php
							foreach($courses as $row){
								echo "<option>".$row->course_name."</option>";
							}
						?>
						<!--
						<option>a</option>
						<option>b</option>
						<option>c</option>
						<option>d</option>
						<option>e</option>
						<option>f</option>
						<option>g</option>
						<option>h</option>
						<option>i</option>
						<option>j</option>
						-->
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
							<!-- <tr>
								<td><input type="checkbox"></td>
								<td>Michael Slaughter</td>
								<td>3.875</td>
								<td>A-</td>
								<td>2016</td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>Jack Boening</td>
								<td>3.245</td>
								<td>A+</td>
								<td>2016</td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>James Landy</td>
								<td>2.587</td>
								<td>C+</td>
								<td>2016</td>
							</tr> --> 

							<?php 
								foreach($studentInfo as $row){
									echo '<tr>'; 
										echo "<td><input type='checkbox'></td>";
										echo "<td>" . $row->first_name . " " . $row->last_name . "</td>"; 
										echo "<td>" . $row->gpa_float . "</td>";
										echo "<td>" . $row->grade . "</td>";
										echo "<td>" . $row->expected_graduation . "</td>";
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
								echo '<tr>';
									echo '<td>masyv6</td>';
									echo '<td>5</td>';
								echo '</tr>';
							?>
							<!--
								<td>masyv6</td>
								<td>5</td>
							</tr>
							<tr>
								<td>ats314</td>
								<td>4</td>
							</tr>
							<tr>
								<td>pws326</td>
								<td>1</td>
							</tr>
							-->
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>
