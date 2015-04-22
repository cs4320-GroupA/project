<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Modify Course</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include 'nav.php';
		?>
		<div class="container">
			<div class="page-header">
				<h2>Modify Course</h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Add a Course</h3>
					<form method="post" accept-charset="utf-8" action=<?php echo base_url().'index.php/adminModifyCourseController/edit/'.$course_id; ?> />
						<div class="form-group">
							<label for="courseName">Course Name: </label>
							<input type="text" class="form-control" name="courseName" id="courseName" placeholder="<?php echo $courseName?>">
						</div>
						<div class="form-group">
							<label for="semester">Semester: </label>
							<select name="semester" class="form-control">
							    <option>FALL 2015</option>
							    <option>SPRING 2016</option>
							    <option>FALL 2016</option>
							    <option>SPRING 2017</option>
							    <option>FALL 2017</option>
							    <option>SPRING 2018</option>
							    <option>FALL 2018</option>
							</select>
						</div>
						<div class="form-group">
							<label for="instructorPawprint">Instructor Pawprint: </label>
							<input type="text" class="form-control" id="instructorPawprint" placeholder="<?php echo $instructorPawnprint?>">
						</div>
						<button type="submit" class="btn btn-success">Finish Editing</button>
					</form>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>
