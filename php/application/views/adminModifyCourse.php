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
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
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
					<form>
						<div class="form-group">
							<label for="courseName">Course Name: </label>
							<input type="text" class="form-control" id="courseName" placeholder="CS4320">
						</div>
						<div class="form-group">
							<label for="semester">Semester: </label>
							<select class="form-control">
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
							<input type="text" class="form-control" id="instructorPawprint" placeholder="pws326">
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
		          <tr>
		            <td>
		                <button type="button" class="btn btn-primary">Edit</button>
						<button type="button" class="btn btn-danger">Remove</button>
		            </td>
		            <td>CS4320</td>
		            <td>scottgs</td>
		          </tr>
		          <tr>
		            <td>
		                <button type="button" class="btn btn-primary">Edit</button>
						<button type="button" class="btn btn-danger">Remove</button>
		            </td>
		            <td>CS4001</td>
		            <td>scottgs</td>
		          </tr>
		          <tr>
		            <td>
		                <button type="button" class="btn btn-primary">Edit</button>
						<button type="button" class="btn btn-danger">Remove</button>
		            </td>
		            <td>CS3380</td>
		            <td>klaricm</td>
		          </tr>
			  <?php
  				    foreach($courses as $row){
							echo '<tr>';
		         		    echo '<td>';
						echo '<button type="button" class="btn btn-primary" onclick="'.base_url().'index.php/adminModifyCourseController/edit/'.$row->course_id.'">Edit</button> ';
						echo '<button type="button" class="btn btn-danger" onclick="'.base_url().'index.php/adminModifyCourseController/remove/'.$row->course_id.'">Remove</button> ';
					    echo '</td>';
					    echo '<td>'.$row->course_name.'</td>';

					    if($row->instructor_id == NULL) {
					    	 echo '<td>unassigned</td>';
					    } else {
					   		echo '<td>'.$row->instructor_id.'</td>';
					   	}
	                    
	                echo '</tr>';
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
