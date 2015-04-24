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
						<form method="post" accept-charset="utf-8" action=<?php echo base_url().'index.php/adminModifyCourseController/add/'; ?> />
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label for="courseName">Course Name </label>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control" name="courseName" id="courseName" placeholder="CS4320">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-2">
									<label for="semester">Semester </label>
								</div>
								<div class="col-md-6">
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
							</div>
						</div>
						<button type="submit" class="btn btn-success">Add</button>
					</form>
				</div>
			</div>
			<br>
			<br>
			<div class="row">
				<h3>Edit or Remove an Existing Course</h3>
				<table class="table table-hover">
		        <thead>
		          <tr>
		            <th>Action</th>
		            <th>Course</th>
		            <th>Instructor</th>
		          </tr>
		        </thead>
		        <tbody>
			  <?php
  				    foreach($courses as $row){
						echo '<tr>';
		         		echo '<td>';

		         		echo '<form>';
						echo '<button type="submit" class="btn btn-primary" formaction="'.base_url().'index.php/adminEditCourseController/index/'.$row->course_id.'/">Edit</button> ';
						echo '<button type="submit" class="btn btn-danger" formaction="'.base_url().'index.php/adminModifyCourseController/remove/'.$row->course_id.'">Remove</button> ';
					    echo '</td>';
					    echo '<td>'.$row->course_name.'</td>';
					    echo '<td>'.$row->username.'</td>';
	                	echo '</tr>';
	                	echo '</form>';
				    };


			   ?>
		        </tbody>
		      </table>				
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>
