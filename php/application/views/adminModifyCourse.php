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
    	<link href="<?php echo base_url(); ?>css/bespoke.css" rel="stylesheet">
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
		      <?php echo '<form name="newCourse" action="'.base_url().'index.php/adminModifyCourseController/add" method="POST">'; ?>
		        <div class="form-group">
		          <div class="row">
		            <div class="col-md-2">
		              <label for="courseName">Course Name </label>
		            </div>
		            <div class="col-md-6">
		              <input type="text" class="form-control" name="courseName" id="courseName" placeholder="CS 4320: Software Engineering" required>
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="row">
		            <div class="col-md-2">
		              <label for="semester">Semester </label>
		            </div>
		            <div class="col-md-6">
		              <select name="semester" class="form-control" required>
					  <?php
					  		if(isset($semesters)) {
						    	foreach($semesters as $row) {
						    		echo'<option value="'.$row->semester_title.'">'.$row->semester_title.'</option>';
						    	}
						    }
						?>
		              </select>
		            </div>
		          </div>
		        </div>
		        <div class="row">
		          <div class="col-md-6 col-md-offset-2">
		            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add</button>
		          </div>
		        </div>
		      </form>
		    </div>
		    <div class="col-md-12">
		      <h3>Edit or Remove an Existing Course</h3>
                <div class="col-md-12">
		      <h3>Add a Course</h3>
		      <?php echo '<form name="select_semester" action="'.base_url().'index.php/adminModifyCourseController" method="POST">'; ?>
		        <div class="form-group">
		          <div class="row">
		            <div class="col-md-2">
		              <label for="semester">Semester </label>
		            </div>
		            <div class="col-md-6">
		              <select name="semester_pool" class="form-control" required>
					  <?php
					  		if(isset($semesters)) {
						    	foreach($semesters as $row) {
                                    if($selected_semester == $row->semester_title){
						    	     	echo'<option selected value="'.$row->semester_title.'">'.$row->semester_title.'</option>';   
                                    } else {
                                        echo'<option value="'.$row->semester_title.'">'.$row->semester_title.'</option>';
                                    }
						    	}
						    }
						?>
		              </select>
		            </div>
		          </div>
		        </div>
		        <div class="row">
		          <div class="col-md-6 col-md-offset-2">
		            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Select</button>
		          </div>
		        </div>
		      </form>
		    </div>
		      <table class="table table-hover table-striped">
		        <thead>
		          <tr>
		            <th>Action</th>
		            <th>Course</th>
		            <th>Semester</th>
		            <th>Instructor</th>
		          </tr>
		        </thead>
		        <tbody>
		          <?php
		          	if(isset($courses)) {
		            	foreach($courses as $row) {
		              		echo '<tr>';
			              	echo '<td>';
			              	echo '<form>';
			              	echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminEditCourseController/index/'.$row->course_id.'/"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button> ';
			              	echo '<button type="submit" class="btn btn-default" formaction="'.base_url().'index.php/adminModifyCourseController/remove/'.$row->course_id.'"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove</button> ';
			              	echo '</td>';
			              	echo '<td>'.$row->course_name.'</td>';
			              	echo '<td>'.$row->semester.'</td>';
			              	echo '<td>'.$row->username.'</td>';
			              	echo '</tr>';
			              	echo '</form>';
			            }
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
