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
					</select>
				</div>				
			</div>
			<div class="row">
				<div class="col-md-4">
				<br><br>
					<button type = "submit" class="btn btn-success">Select Course</button>
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
								<th>Pawprint</th>
								<th>GPA</th>
								<th>Course Grade</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox"></td>
								<td>masyv6</td>
								<td>3.875</td>
								<td>A-</td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>ats314</td>
								<td>3.245</td>
								<td>A+</td>
							</tr>
							<tr>
								<td><input type="checkbox"></td>
								<td>pws326</td>
								<td>2.587</td>
								<td>C+</td>
							</tr>
						</tbody>
					</table>
					<button type = "submit" class = "btn btn-success">Assign Selected Applicants</button>
				</div>
				<div class="col-md-6">
					<h3>Instructor Preferences</h3>
					<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Pawprint</th>
								<th>Comments</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>masyv6</td>
								<td>Great TA -- would love him back this semester</td>
							</tr>
							<tr>
								<td>ats314</td>
								<td>Never again</td>
							</tr>
							<tr>
								<td>pws326</td>
								<td>Solid TA -- strong technical ability, low effort in the classroom</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>