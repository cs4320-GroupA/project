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
	        <?php if(isset($message)) {echo $message;} ?>
	      </div>
		</div>
		<div class = "container">
			<?php 
				if(isset($editable)) {
					if($editable == TRUE) {
						echo '<form class="form-inline" name="form_data" role="form" action="'.base_url().'index.php/form/editForm" method="POST">';
					}
				}
				if(isset($submittable)) {
					if($submittable == TRUE) {
							echo '<form class="form-inline" name="form_data" role="form" action="'.base_url().'index.php/form/submitForm" method="POST">';
					}
				}
			?>
				<div class = "row">
					<div class = "col-md-6">
						<?php 
							if(isset($assistant_type)) {
								if($assistant_type == 'PLA') {
									echo '<input type="radio" name="radioTAPLA" value = "PLA" checked required>';
								} else {
									echo '<input type="radio" name="radioTAPLA" value = "PLA" required>';
								}
							} else {
									echo '<input type="radio" name="radioTAPLA" value = "PLA" required>';
							}
						?>
						<label class="radio-inline">PLA (Undergraduate Student)</label>
					</div>
					<div class = "col-md-6">
						<?php 
							if(isset($assistant_type)) {
								if($assistant_type == 'TA') {
									echo '<input type="radio" name="radioTAPLA" value = "TA" checked>';
								} else {
									echo '<input type="radio" name="radioTAPLA" value = "TA">';
								}
							} else {
								echo '<input type="radio" name="radioTAPLA" value = "TA">';
							}
						?>
						<label class="radio-inline">TA (Graduate Student)</label>
					</div>
				</div>
				<br>
				<hr>
				<div class="row">
					<div class = "col-md-2">
						<label for="fname">First Name: </label>
						<?php 
							if(isset($first_name)) {
								echo '<input type="text" class="form-control" name="fname" value="'.$first_name.'" required>';
							} else {
								echo '<input type="text" class="form-control" name="fname" placeholder="John " required>';
							}
						?>
					</div>
					<div class = "col-md-2">
						<label for="lname">Last Name: </label>
						<?php 
							if(isset($last_name)) {
								echo '<input type="text" class="form-control" name="lname" value="'.$last_name.' " required>';
							} else {
								echo '<input type="text" class="form-control" name="lname" placeholder="Doe " required>';
							}
						?>
					</div>
					<div class = "col-md-2">
						<label for="idNumber">ID: </label>
						<?php
							if(isset($student_id)) {
								echo '<input type="text" class="form-control" name="idNumber" value="'.$student_id.'" required>';
							} else {
								echo '<input type="text" class="form-control" name="idNumber" placeholder="14359687" required>';
							}
						?>
					</div>
					<div class = "col-md-2">
						<label for="gpa">GPA: </label>
						<?php
							if(isset($gpa)) {
								echo '<input type="text" class="form-control" name="gpa" value="'.$gpa.'" required>';
							} else {
								echo '<input type="text" class="form-control" name="gpa" placeholder="3.487" required>';
							}
						?>						
					</div>
					<div class = "col-md-2">
						<label for="gradYear">Grad Year: </label>
						<select class="form-control" name = "gradYear" required>
							<?php
								if(isset($expected_graduation)) {
									echo '<option selected hidden value="'.$expected_graduation.'">'.$expected_graduation.'</option>';
								} else {
									echo '<option selected disabled hidden value=""></option>';
								}
							?>
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
							<?php
								if(isset($department)) {
									echo '<option selected hidden value="'.$department.'">'.$department.'</option>';
								} else {
									echo '<option selected disabled hidden value=""></option>';
								}
							?>
							<option>CS</option>
							<option>IT</option>
						</select>
						<br>
						<br>
						<label for="grade">Grade: </label>
						<select class="form-control" name = "grade">
							<?php
								if(isset($grade)) {
									echo '<option selected hidden value="'.$grade.'">'.$grade.'</option>';
								} else {
									echo '<option selected disabled hidden></option>';
								}
							?>
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
								<?php
									if(isset($grad_type)) {
										if($grad_type == 'MS') {
											echo '<input type="radio" name="gradRadio" value="MS" checked> MS (Master\'s)';
										} else {
											echo '<input type="radio" name="gradRadio" value = "MS"> MS (Master\'s)';
										}
									} else {
										echo '<input type="radio" name="gradRadio" value = "MS"> MS (Master\'s)';
									}
								?>
							</label>
						</div>
						<br>
						<div class = "radio">
							<label class="radio-inline">
								<?php
									if(isset($grad_type)) {
										if($grad_type == 'PhD') {
											echo '<input type="radio" name="gradRadio" value = "PhD" checked> PhD (Doctorate)';
										} else {
											echo '<input type="radio" name="gradRadio" value = "PhD"> PhD (Doctorate)';
										}
									} else {
										echo '<input type="radio" name="gradRadio" value = "PhD"> PhD (Doctorate)';
									}
								?>
							</label>
						</div>
						<br>
						<br>
						<label for="advisorName">Advisor's Name: </label>
						<?php
							if(isset($advisor)) {
								echo '<input type="text" class="form-control" name="advisorName" value="'.$advisor.'">';
							} else {
								echo '<input type="text" class="form-control" name="advisorName" placeholder="John Doe">';
							}
						?>
					</div>
				</div>
				<br>
				<hr>
				<div class = "row">
					<div class = "col-md-6">
						<label for="phoneNumber">Phone Number: </label>
						<?php
							if(isset($phone_number)) {
								echo '<input type="text" class="form-control" name="phoneNumber" value="'.$phone_number.'" required>';
							} else {
								echo '<input type="text" class="form-control" name="phoneNumber" placeholder="5738675309" required>';
							}
						?>
					</div>
					<div class = "col-md-6">
						<label for="mizzouEmail">Email: </label>
						<?php
							if(isset($mizzou_email)) {
								echo '<input type="text" class="form-control" name="mizzouEmail" value="'.$mizzou_email.'" required>';
							} else {
								echo '<input type="text" class="form-control" name="mizzouEmail" placeholder="abc123@mail.missouri.edu" required>';
							}
						?>
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
					<?php
						if(isset($other_work)) {
							echo '<input type="text" class="form-control" name="otherWork" value="'.$other_work.'">';
						} else {
							echo '<input type="text" class="form-control" name="otherWork" placeholder="Tiger Tech">';
						}
					?>
				</div>
				<hr>
				<div class = "row">
					<div class = "col-md-6">
						<label for="speakOPT">SPEAK/OPT Score, if applicable):  </label>
						<?php 
							if(isset($SPEAK_OPT_score)) {
								echo '<input type="text" class="form-control" name="speakOPT" value="'.$SPEAK_OPT_score.'">';
							} else {
								echo '<input type="text" class="form-control" name="speakOPT" placeholder="15">';
							}
						?>
					</div>
					<div class = "col-md-6">
						<label for="lastTestDate">Semester of Last Test:  </label>
						<select class="form-control" name = "lastTestDate">
							<?php
								if(isset($last_date_of_test)) {
									echo '<option selected hidden value="'.$last_date_of_test.'">'.$last_date_of_test.'</option>';
								} else {
									echo '<option selected disabled hidden value=""></option>';
								}
							?>
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
								<?php
									if(isset($gato)) {
										if($gato == 'Met') {
											echo '<input type="radio" name="gatoRadio" value = "Met" checked required> Requirement Met';
										} else {
											echo '<input type="radio" name="gatoRadio" value = "Met" required> Requirement Met';
										}
									} else {
										echo '<input type="radio" name="gatoRadio" value = "Met" required> Requirement Met';
									}
								?>
								</label>
							</div>
							<br>
							<div class = "radio">
								<label class="radio-inline">
								<?php
									if(isset($gato)) {
										if($gato == 'notMet') {
											echo '<input type="radio" name="gatoRadio" value = "notMet" checked> Will Attend August/January Session';
										} else {
											echo '<input type="radio" name="gatoRadio" value = "notMet"> Will Attend August/January Session';
										}
									} else {
										echo '<input type="radio" name="gatoRadio" value = "notMet"> Will Attend August/January Session';
									}
								?>
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
								<?php
									if(isset($speak_assessment)) {
										if($speak_assessment == 'Met') {
											echo '<input type="radio" name="speakRadio" value = "Met" checked required> Requirement Met';
										} else {
											echo '<input type="radio" name="speakRadio" value = "Met" required> Requirement Met';
										}
									} else {
										echo '<input type="radio" name="speakRadio" value = "Met" required> Requirement Met';
									}
								?>
							</label>
						</div>
						<br>
						<div class = "radio">
							<label class="radio-inline">
								<?php
									if(isset($speak_assessment)) {
										if($speak_assessment == 'notMet') {
											echo '<input type="radio" name="speakRadio" value = "notMet" checked> Will Attend August/January Session';
										} else {
											echo '<input type="radio" name="speakRadio" value = "notMet"> Will Attend August/January Session';
										}
									} else {
										echo '<input type="radio" name="speakRadio" value = "notMet"> Will Attend August/January Session';
									}
								?>
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
								<?php
									if(isset($onita)) {
										if($onita == 'Met') {
											echo '<input type="radio" name="onitaRadio" value = "Met" checked required> Requirement Met';
										} else {
											echo '<input type="radio" name="onitaRadio" value = "Met" required> Requirement Met';
										}
									} else {
										echo '<input type="radio" name="onitaRadio" value = "Met" required> Requirement Met';
									}
								?>
							</label>
						</div>
						<br>
						<div class = "radio">
							<label class="radio-inline">
								<?php
									if(isset($onita)) {
										if($onita == 'notMet') {
											echo '<input type="radio" name="onitaRadio" value = "notMet" checked> Will Attend August/January Session';
										} else {
											echo '<input type="radio" name="onitaRadio" value = "notMet"> Will Attend August/January Session';
										}
									} else {
										echo '<input type="radio" name="onitaRadio" value = "notMet"> Will Attend August/January Session';
									}
								?>
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
						<input type="text" class="form-control" name="signature" placeholder="John Doe" required>
					</div>
					<div class = "col-md-4">
						<label for="name">Date: </label>
						<input type="text" class="form-control" name="date" placeholder="1/1/2015" required>
					</div>
					<div class = "col-md-12">
						<br>
						<label class="control-label" for="formSubmission"></label>
						<div class="controls">
							<?php 
								if(isset($editable)) {
									if($editable == TRUE) {
										echo '<button name="formSubmission" class="btn btn-success">Edit Application</button>';
									}
								}
								if(isset($submitable)) {
									if($submitable == TRUE) {
										echo '<button name="formSubmission" class="btn btn-success">Submit Application</button>';
									}
								}
							?>
						</div>
					</div>
					<br>
				</div>
				<hr>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<?php
			if(isset($view_only)) {
				if($view_only == TRUE) {
					echo '<script type="text/javascript">
							$(document).ready(function(){
        						$("#container :input").attr("disabled", true);
    						});
						</script>';
				}	
			}
		?>
	</body>
</html>
]
