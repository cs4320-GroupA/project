<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Application Form</title>
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
	        <h2>Application</h2>
	      </div>
		</div>
		<div class = "container">
			<form class="form-inline" name="form_data" role="form" action="<?php echo base_url(); ?>index.php/form/submitForm" method="POST">
				<div class = "row">
					<div class = "col-md-6">
			      		<input type="radio" name="radioTAPLA" value = "PLA">
			      		<label class="radio-inline">PLA (Undergraduate Student)</label>
					</div>
					<div class = "col-md-6">
				     	<input type="radio" name="radioTAPLA" value = "TA">
				     	<label class="radio-inline">TA (Graduate Student)</label>
					</div>
				</div>
				<br>
				<hr>
			  <div class="row">
					<div class = "col-md-2">
				    <label for="fname">First Name: </label>
				    <input type="text" class="form-control" name="fname" placeholder="John ">
					</div>
					<div class = "col-md-2">
				    <label for="lname">Last Name: </label>
				    <input type="text" class="form-control" name="lname" placeholder="Doe ">
					</div>
					<div class = "col-md-2">
				    <label for="idNumber">ID: </label>
				    <input type="text" class="form-control" name="idNumber" placeholder="14359687">
					</div>
					<div class = "col-md-2">
				    <label for="gpa">GPA: </label>
				    <input type="text" class="form-control" name="gpa" placeholder="3.487">
					</div>
					<div class = "col-md-1">
						<label for="gradYear">Grad Year: </label>
						<select class="form-control" name = "gradYear">
							<option>2016</option>
							<option>2017</option>
							<option>2018</option>
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
							<option>2022</option>
							<option>2023</option>
							<option>2024</option>
							<option>2025</option>
						</select>
					</div>
			  </div>
				<br>
				<hr>
				<div class = "row">
					<div class = "col-md-6">
				    <label>If undergraduate applying for PLA, indicate department and grade </label>
						<br>
						<br>
						<label for="dept">Department: </label>
						<select class="form-control" name = "dept">
							<option>CS</option>
							<option>IT</option>
						</select>
						<br>
						<br>
						<label for="grade">Grade: </label>
						<select class="form-control" name = "grade">
							<option>Freshman</option>
							<option>Sophomore</option>
							<option>Junior</option>
							<option>Senior</option>
						</select>
					</div>
					<div class = "col-md-6">
						<p><b>If gradute: </b></p>
						<div class = "radio">
							<label class="radio-inline">
				      <input type="radio" name="gradRadio" value = "MS"> MS (Master's)
					    </label>
						</div>
						<br>
						<div class = "radio">
							<label class="radio-inline">
				      <input type="radio" name="gradRadio" value = "PhD"> PhD (Doctorate)
					    </label>
						</div>
						<br>
						<br>
				    <label for="advisorName">Advisor's Name: </label>
				    <input type="text" class="form-control" name="advisorName" placeholder="John Doe">
					</div>
				</div>
				<br>
				<hr>
				<div class = "row">
					<div class = "col-md-6">
				    <label for="phoneNumber">Phone Number: </label>
				    <input type="text" class="form-control" name="phoneNumber" placeholder="5738675309">
					</div>
					<div class = "col-md-6">
				    <label for="mizzouEmail">Email: </label>
				    <input type="text" class="form-control" name="mizzouEmail" placeholder="abc123@mail.missouri.edu">
					</div>
				</div>
				<hr>
				<br>
				<div class = "row">
					<label for="classesTeaching">Classes Currently Teaching: </label>
					<select class="form-control" name = "classesTeaching">
						<option>X</option>
						<option>Y</option>
						<option>Z</option>
					</select>
				</div>
				<hr>
				<div class = "row">
					<label for="classesTaught">Classes Previously Taught: </label>
					<select class="form-control" name = "classesTaught">
						<option>X</option>
						<option>Y</option>
						<option>Z</option>
					</select>
				</div>
				<hr>
				<div class = "row">
					<label for="classesPreferred">Preferred Classes: </label>
					<select class="form-control" name = "classesPreferred">
						<option>X</option>
						<option>Y</option>
						<option>Z</option>
					</select>
					<label for="gradeReceived">Grade Received: </label>
					<select class="form-control" name = "gradeReceived">
						<option>A+</option>
						<option>A</option>
						<option>A-</option>
						<option>B+</option>
						<option>B</option>
						<option>B-</option>
						<option>C+</option>
						<option>C</option>
						<option>C-</option>
						<option>D+</option>
						<option>D</option>
						<option>D-</option>
						<option>F</option>
					</select>
				</div>
				<hr>
				<div class = "row">
					<label for="otherWork">Other Work:  </label>
					<input type="text" class="form-control" name="otherWork" placeholder="Tiger Tech">
				</div>
				<hr>
				<div class = "row">
					<div class = "col-md-6">
						<label for="speakOPT">SPEAK/OPT Score, if applicable):  </label>
						<input type="text" class="form-control" name="speakOPT" placeholder="15">
					</div>
					<div class = "col-md-6">
						<label for="lastTestDate">Semester of Last Test:  </label>
						<select class="form-control" name = "lastTestDate">
							<option>Fall 2015</option>
							<option>Spring 2014</option>
							<option>Fall 2014</option>
							<option>Spring 2013</option>
							<option>Fall 2013</option>
							<option>Spring 2012</option>
							<option>Fall 2012</option>
							<option>Spring 2011</option>
							<option>Fall 2011</option>
							<option>Spring 2010</option>
							<option>Fall 2010</option>
						</select>
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-12">
						<hr>
						<p><b>Please note the following</b></p>
						<div class = "col-md-9">
							<li>New TAs, ITAs, and PLAs who have received an appointment, are required to participate in the GATO (Graduate Assistant Teaching Orientation), which is offered just prior to the start of fall and winter terms. (You do not need to attend more than once.)</li><br>
						</div>
						<div class = "col-md-3">
							<div class = "radio">
								<label class="radio-inline">
								<input type="radio" name="gatoRadio" value = "Met"> Requirement Met
								</label>
							</div>
							<br>
							<div class = "radio">
								<label class="radio-inline">
								<input type="radio" name="gatoRadio" value = "notMet"> Will Attend August/January Session
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-6">
						<li>Please list the courses that you'd like to be a TA for</li>
						<br>
						<li>Per CS Dept. policy, GTA's must not exceed half-time total employment within the University system including, but not limited to, the CS Department
						</li>
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-12">
						<hr>
						<p><b>INTERNATIONAL STUDENTS, PLEASE BE AWARE OF THE FOLLOWING</b></p>
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-9">
						<li>Prior to becoming a TA, any ITA (International Teaching Assistant) who received their primary and	secondary education in a country where English is not the principal language are required by law to	be assessed for English proficiency (SPEAK test). If you do not register for and satisfy applicable		 language assessment requirements, you will not be eligible to accept a TA appointment.	Arrangements for language assessments must be made before the end of the semester prior to accepting a TA position</li><br>
					</div>
					<div class = "col-md-3">
						<div class = "radio">
							<label class="radio-inline">
							<input type="radio" name="speakRadio" value = "Met"> Requirement Met
							</label>
						</div>
						<br>
						<div class = "radio">
							<label class="radio-inline">
							<input type="radio" name="speakRadio" value = "notMet"> Will Attend August/January Session
							</label>
						</div>
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-9">
						<li>New TAs, ITAs, and PLAs who have received an appointment, are required to participate in the GATO	(Graduate Assistant Teaching Orientation), which is offered just prior to the start of fall and winter terms.	(You do not need to attend more than once.)</li><br>
					</div>
					<div class = "col-md-3">
						<div class = "radio">
							<label class="radio-inline">
							<input type="radio" name="internationalGATORadio" value = "Met"> Requirement Met
							</label>
						</div>
						<br>
						<div class = "radio">
							<label class="radio-inline">
							<input type="radio" name="internationalGATORadio" value = "notMet"> Will Attend August/January Session
							</label>
						</div>
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-9">
						<li>ONITA, is a requirement for all international TAs and PLAs who have not previously attended this orientation. You cannot have a TA/PLA appointment until this requirement has been met. (You do not need to attend more than once.) </li><br>
					</div>
					<div class = "col-md-3">
						<div class = "radio">
							<label class="radio-inline">
							<input type="radio" name="onitaRadio" value = "Met"> Requirement Met
							</label>
						</div>
						<br>
						<div class = "radio">
							<label class="radio-inline">
							<input type="radio" name="onitaRadio" value = "notMet"> Will Attend August/January Session
							</label>
						</div>
					</div>
				</div>
				<div class = "row">
					<div class = "col-md-12">
						<br><li>A potential ITA is required to have satisfactorily completed at least one semester as a student at the University of Missouri before being considered for a TA position. </li>
					</div>
				</div>
				<hr>
				<div class = "row">
					<div class = "col-md-4">
						<label for="name">Signature: </label>
						<input type="text" class="form-control" name="signature" placeholder="John Doe">
					</div>
					<div class = "col-md-4">
						<label for="name">Date: </label>
						<input type="text" class="form-control" name="date" placeholder="1/1/2015">
					</div>
					<div class = "col-md-12">
						<br>
						<label class="control-label" for="formSubmission"></label>
						<div class="controls">
							<button name="formSubmission" class="btn btn-success">Submit Application</button>
						</div>
					</div>
					<br>
				</div>
				<hr>
		 </form>
	 </div>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  	 <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>
