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
			<div class="row">
				<div class="col-md-12">
					<!--HAVE TEACHER TYPE OUT CSXXXX FOR WHICH CLASS THEY WANT. PULL THE PAWPRINT OF THE TEACHER AND SEND CLASS CHOICE TO THE DATABASE AND ASSIGN THEM TO IT-->
					<?php
				if ($query->num_rows() > 0){
  				    foreach ($query->result() as $row){
					echo '<tr>';
		         		    echo '<td>';
						<a href='controllers/instructorAddCourse/add'>Add</a>;
					    echo '</td>';
					    echo '<td>'.$row->course_name.'</td>';
					    echo '<td>'.$row->instructor_id.'</td>';
	                                echo '</tr>';
				    };
				};
				?>
				</div><!--col-md-12-->
			</div><!--row-->
		</div><!--container-->
		
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  	 <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>
