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
		<link href="<?php echo base_url(); ?>css/comments.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    	<link href="<?php echo base_url(); ?>css/bespoke.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script> 
    		var currently_max_fields = 4; //maximum input boxes allowed
    		var desired_max_fields = 8; //maximum input boxes allowed
    		var previous_max_fields = 10; //maximum input boxes allowed
    		var currently_count = 1; //initlal text box count
    		var desired_count = 1;
    		var previously_count = 1;

    		function validateForm() {
    			var assistant_type = document.forms["form_data"]["radioTAPLA"].value;

    			if(assistant_type == "PLA") {
    				if(document.forms["form_data"]["dept"].value == "" || document.forms["form_data"]["dept"].value == null) {
    					alert("If applying for PLA, department must be selected!");
    					return false;
    				}
    				if(document.forms["form_data"]["grade"].value == "" || document.forms["form_data"]["grade"].value == null) {
    					alert("If applying for PLA, grade must be selected!");
    					return false;
    				}
    			} else {
    				if(document.forms["form_data"]["advisorName"].value == "" || document.forms["form_data"]["advisorName"].value == null) {
    					alert("If applying for TA, your advisor must be entered!");
    					return false;
    				}
    				if(document.forms["form_data"]["gradRadio"].value == "" || document.forms["form_data"]["gradRadio"].value == null) {
    					alert("If applying for TA, graduate type must be selected!");
    					return false;
    				}
    			}

    			return true;
    		}

    		function addCurrentlyRow(form) {
    			currently_count++;
    			if(currently_count < currently_max_fields) {
    				var new_row = '<p id="currently_row'+currently_count+'"><select class="form-control" name = "currently_teaching'+currently_count+'">'+getCourses()+'</select> <input type="button" class="btn btn-default" onclick="removeCurrentlyRow('+currently_count+');" value="Remove"></p>';
    				$('.currently_wrapper').append(new_row);
    			} else {
    				currently_count--;
    			}
    		}

    		function removeCurrentlyRow(row) {
    			$('#currently_row'+row).remove();
    			currently_count--;
    		}
    		
    		function addPreviouslyRow(form) {
    			previously_count++;
    			if(previously_count <= previous_max_fields) {
    				var new_row = '<p id="previously_row'+previously_count+'"><select class="form-control" name = "previously_taught'+previously_count+'">'+getCourses()+'</select> <input type="button" class="btn btn-default" onclick="removePreviouslyRow('+previously_count+');" value="Remove"></p>';
    				$('.previously_wrapper').append(new_row);
    			} else {
					previously_count--;
    			}
    		}

    		function removePreviouslyRow(row) {
    			$('#previously_row'+row).remove();
    			previously_count--;
    		}
    		
    		function addDesiredRow(form) {
    			desired_count++;
    			if(desired_count <= desired_max_fields) {
    				var new_row = '<p id="desired_row'+desired_count+'"><select class="form-control" name = "desired_courses'+desired_count+'">'+getCourses()+'</select> ';
    				new_row += ' <select class="form-control" name = "gradeReceived'+desired_count+'"> \
    								<option selected disabled hidden value=""></option> \
									<option>A+</option> \
									<option>A</option> \
									<option>A-</option> \
									<option>B+</option> \
									<option>B</option> \
									<option>B-</option> \
									<option>C+</option> \
									<option>C</option> \
									<option>C-</option> \
									<option>D+</option> \
									<option>D</option> \
									<option>D-</option> \
									<option>F</option> \
								</select> ';
					new_row += '<input type="button" class="btn btn-default" onclick="removeDesiredRow('+desired_count+');" value="Remove"></p>';
    				$('.desired_wrapper').append(new_row);
    			} else {
    				desired_count--;
    			}
    		}

    		function removeDesiredRow(row) {
    			$('#desired_row'+row).remove();
    			desired_count--;
    		}

    		function getCourses() {
    			var string = '';
				$("#courses option").each(function() {
   					string += '<option>'+$(this).val()+'</option>';
				});

				return string;
    		}

		</script>
		<script type="text/javascript">
		$( document ).ready(function() {
		<?php
			if(isset($previous)) {
				$count = 1;
				foreach($previous as $row) {
					if($count == 1) {
						$first_previous = $row->course_name;
						$count++;
					} else {
		?>
    			previously_count++;
    			var new_row = '<p id="previously_row'+previously_count+'"><select class="form-control" name = "previously_taught'+previously_count+'">'+getCourses();

    			<?php 
    				echo 'new_row += \'<option selected hidden value="'.$row->course_name.'">'.$row->course_name.'</option></select> \';'; 
    			?>

				new_row += '<input type="button" class="btn btn-default" onclick="removePreviouslyRow('+previously_count+');" value="Remove"></p>';
    			$('.previously_wrapper').append(new_row);
    	<?php
    				}	
    			}
			}
			if(isset($current)) {
				$count = 1;
				foreach($current as $row) {
					if($count == 1) {
						$first_current = $row->course_name;
						$count++;
					} else {
		?>
    			currently_count++;
    			var new_row = '<p id="currently_row'+currently_count+'"><select class="form-control" name = "currently_teaching'+currently_count+'">'+getCourses();

    			<?php 
    				echo 'new_row += \'<option selected hidden value="'.$row->course_name.'">'.$row->course_name.'</option></select> \';'; 
    			?>
    			
				new_row += '<input type="button" class="btn btn-default" onclick="removeCurrentlyRow('+currently_count+');" value="Remove"></p>';
    			$('.currently_wrapper').append(new_row);
    	<?php
    				}
				}
			}
			if(isset($desired)) {
				$count = 1;
				foreach($desired as $row) {
					if($count == 1) {
						$first_desired = $row->course_name;
						$first_grade = $row->grade;
						$count++;
					} else {
		?>
    			desired_count++;
    			var new_row = '<p id="desired_row'+desired_count+'"><select class="form-control" name = "desired_courses'+desired_count+'">'+getCourses();

    			<?php 
    				echo 'new_row += \'<option selected hidden value="'.$row->course_name.'">'.$row->course_name.'</option></select> \';'; 
    			?>

    			new_row += ' <select class="form-control" name = "gradeReceived'+desired_count+'">';

    			<?php
    				echo 'new_row += \'<option selected hidden value="'.$row->grade.'">'.$row->grade.'</option> \';';
    			?>
				new_row +=	 '<option>A+</option> \
								<option>A</option> \
								<option>A-</option> \
								<option>B+</option> \
								<option>B</option> \
								<option>B-</option> \
								<option>C+</option> \
								<option>C</option> \
								<option>C-</option> \
								<option>D+</option> \
								<option>D</option> \
								<option>D-</option> \
								<option>F</option> \
							</select> ';
				new_row += '<input type="button" class="btn btn-default" onclick="removeDesiredRow('+desired_count+');" value="Remove"></p>';
    			$('.desired_wrapper').append(new_row);
    	<?php
    				}
				}
			}
		?>
		});	
		</script>
		<?php
			if(isset($view_only)) {
				if($view_only == TRUE) {
					echo '<script type="text/javascript">
							$(document).ready(function(){
        						$(".container :input").attr("disabled", true);
        						$(".container .comments").attr("disabled", false);
        						$(".container .message_panel").attr("disabled", false);
    						});
						</script>';
				}	
			}
		?>
	</head>
	<body>
		<?php
			include 'nav.php';
		?>
		<div class="container">
	      <div class="page-header">
	        <h2>Application</h2>
	      </div>
		<div class = "container">
			<div class = "row">
	      	<div class="col-md-6 col-md-offset-3">
		        <?php
		        	if(isset($message_header)) { ?>
					<div class="panel panel-default">
	 		 			<div class="panel-heading">
	    					<h3 class="panel-title"><b><?php echo $message_header?></b></h3>
	  					</div>
	  					<div class="panel-body">
	    					<?php
	    					if(isset($message)) {
	    						echo $message;
	    					}

                        	if($this->session->userdata('user_type') != 'applicant') {	
								echo'<div class="row">';
								  echo '<form class="message_panel" name="message_panel" action="'.base_url().'index.php/preferenceByCourseController/quick_add/'.$form_id.'/'.$user_id.'" method="POST">';
								    echo'<div class="col-md-6">';
								      echo'<label>Course</label>';
								      echo '<select class="form-control message_panel" name = "course_for_preference">';
								        echo '<option selected disabled hidden value=""></option>';
								        foreach($instructor_courses as $temp)
								        {
								        	echo '<option value="'.$temp->course_id.'">'.$temp->course_name.'</option>';
								        }
								      echo '</select>';
								    echo'</div>';
								    echo'<div class="col-md-6">';
								      echo'<label>Preference</label>';
								      echo '<select class="form-control message_panel" name="rank">';
								        echo '<option selected value="1">1</option>';
								        echo '<option value="2">2</option>';
								        echo '<option value="3">3</option>';
								        echo '<option value="4">4</option>';
								        echo '<option value="5">5</option>';
								      echo '</select>';
								      echo'<p class="help-block">1 = Lowest, 5 = Highest</p>';
								    echo'</div>';
								    echo'<div class="col-md-12">';
								      echo'<button type="submit" class="btn btn-default message_panel"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Preference</button>';
								    echo'</div>';
								echo'</div>';
                        	}
                           ?>
                       </form>
	  					</div>
					</div>
					<hr>
		        <?php } ?>
	        </div>
	      </div>
	    </div>
			<?php
				if(isset($editable)) {
					if($editable == TRUE) {
						echo '<form class="form-inline" name="form_data" role="form" onsubmit="return validateForm()" action="'.base_url().'index.php/form/editForm" method="POST">';
					}
				}
				if(isset($submittable)) {
					if($submittable == TRUE) {
							echo '<form class="form-inline" name="form_data" role="form" onsubmit="return validateForm()" action="'.base_url().'index.php/form/submitForm" method="POST">';
					}
				}
				if(isset($view_only)) {
					if($view_only == TRUE) {
							echo '<form class="form-inline" name="form_data" role="form" action="" method="POST">';
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
					<div class = "col-md-6">
						<label for="fname">First Name: </label>
						<?php 
							if(isset($first_name)) {
								echo '<input type="text" class="form-control" name="fname" value="'.$first_name.'" required>';
							} else {
								echo '<input type="text" class="form-control" name="fname" placeholder="John " required>';
							}
						?>
						</div>
					<div class = "col-md-6">
						<label for="lname">Last Name: </label>
						<?php 
							if(isset($last_name)) {
								echo '<input type="text" class="form-control" name="lname" value="'.$last_name.' " required>';
							} else {
								echo '<input type="text" class="form-control" name="lname" placeholder="Doe " required>';
							}
						?>
						</div>
				</div>
				<br>
				<hr>
				<div class="row">
					<div class = "col-sm-4">
						<label for="idNumber">ID: </label>
						<?php
							if(isset($student_id)) {
								echo '<input type="text" class="form-control" name="idNumber" value="'.$student_id.'" required>';
							} else {
								echo '<input type="text" class="form-control" name="idNumber" placeholder="14359687" required>';
							}
						?>
						</div>
					<div class = "col-sm-4">
						<label for="gpa">GPA: </label>
						<?php
							if(isset($gpa)) {
								echo '<input type="text" class="form-control" name="gpa" value="'.$gpa.'" required>';
							} else {
								echo '<input type="text" class="form-control" name="gpa" placeholder="3.487" required>';
							}
						?>						
						</div>
					<div class = "col-sm-4">
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
								echo '<input type="text" class="form-control" name="advisorName">';
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
					<div class="col-md-12">
						<label for="classesTeaching">Classes Currently Teaching: </label>
						<div class="currently_wrapper">
							<select id="courses" class="form-control" name = "currently_teaching1">
								<option selected disabled hidden value=""></option>
								<?php
									foreach($courses as $temp) {
										if(isset($first_current)) {
											if($first_current == $temp['course_name']) {
												echo '<option selected value="'.$first_current.'">'.$first_current.'</option>';
											}
											else {
												echo '<option>'.$temp['course_name'].'</option>';
											}
										} else {
											echo '<option>'.$temp['course_name'].'</option>';
										}
									}
								?>
							</select>
							<input type="button" class="btn btn-default" onclick="addCurrentlyRow(this.form);" value="Add row"/>
							<p></p>						
						</div>
					</div>
				</div>
				<hr>
				<div class = "row">
					<div class="col-md-12">
						<label for="classesTaught">Classes Previously Taught: </label>
						<div class="previously_wrapper">
							<select class="form-control" name = "previously_taught1">
								<option selected disabled hidden value=""></option>
								<?php
									foreach($courses as $temp) {
										if(isset($first_previous)) {
											if($first_previous == $temp['course_name']) {
												echo '<option selected value="'.$first_previous.'">'.$first_previous.'</option>';
											}
											else {
												echo '<option>'.$temp['course_name'].'</option>';
											}
										} else {
											echo '<option>'.$temp['course_name'].'</option>';
										}
									}
								?>
							</select>
							<input type="button" class="btn btn-default" onclick="addPreviouslyRow(this.form);" value="Add row"/>
							<p></p>
						</div>
					</div>
				</div>
				<hr>
				<div class = "row">
					<div class="col-md-12">
						<label for="classesPreferred">Preferred Classes & Grade Received: </label>
						<div class="desired_wrapper">
							<select class="form-control" name = "desired_courses1">
								<option selected disabled hidden value=""></option>
								<?php
									foreach($courses as $temp) {
										if(isset($first_desired)) {
											if($first_desired == $temp['course_name']) {
												echo '<option selected value="'.$first_desired.'">'.$first_desired.'</option>';
											}
											else {
												echo '<option>'.$temp['course_name'].'</option>';
											}
										} else {
											echo '<option>'.$temp['course_name'].'</option>';
										}
									}
								?>
							</select>
							<select class="form-control" name = "gradeReceived1">
								<option selected disabled hidden value=""></option>
								<?php
									if(isset($first_grade)) {
										echo '<option selected hidden value="'.$first_grade.'">'.$first_grade.'</option>';
									}
								?>
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
							<input type="button" class="btn btn-default" onclick="addDesiredRow(this.form);" value="Add row"/>
							<p></p>
						</div>
					</div>
				</div>
				<hr>
				<div class = "row">
					<div class = "col-md-12">
						<label for="otherWork">Other Work:  </label>
						<?php
							if(isset($other_work)) {
								echo '<input type="text" class="form-control" name="otherWork" value="'.$other_work.'">';
							} else {
								echo '<input type="text" class="form-control" name="otherWork">';
							}
						?>
					</div>
				</div>
				<hr>
				<div class = "row">
					<div class = "col-md-6">
						<label for="speakOPT">SPEAK/OPT Score (if applicable):  </label>
						<?php 
							if(isset($SPEAK_OPT_score)) {
								echo '<input type="text" class="form-control" name="speakOPT" value="'.$SPEAK_OPT_score.'">';
							} else {
								echo '<input type="text" class="form-control" name="speakOPT">';
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
						<?php
							if(isset($signature)) {
								echo '<input type="text" class="form-control" name="signature" value="'.$signature.'">';
							} else {
								echo '<input type="text" class="form-control" name="signature" placeholder="John Doe" required>';
							}
						?>
					</div>
					<div class = "col-md-4">
						<label for="name">Date: </label>
						<?php
							if(isset($signature)) {
								echo '<input type="text" class="form-control" name="date" value="'.$date.'" required>';
							} else {
								echo '<input type="text" class="form-control" name="date" placeholder="1/1/2015" required>';
							}
						?>
					</div>
					<div class = "col-md-12">
						<br>
						<label class="control-label" for="formSubmission"></label>
						<div class="controls">
							<?php 
								if(isset($editable)) {
									if($editable == TRUE) {
										echo '<button name="formSubmission" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit Application</button>';
									}
								}
								if(isset($submittable)) {
									if($submittable == TRUE) {
										echo '<button name="formSubmission" class="btn btn-default"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Submit Application</button>';
									}
								}
							?>
						</div>
					</div>
					<br>
				</div>
				<hr>
			</form>
			<?php
			  if(isset($comments)) 
			  {
			?>
			<div class="row">
			  <div class="page-header">
			    <h2>Comments</h2>
			  </div>
			</div>
			<div class="row">
			  <div class="col-md-6">
			    <div class="row">
			      <h3>Post a Comment</h3>
			      <br>
			      <form name="comment_box" action="<?php echo base_url().'index.php/comments/add/'.$user_id.'/'.$semester_id; ?>" method="POST">
			        <div class="col-md-2">
			          <label for="description" class="col-sm-2 control-label">Admin Pawprint</label>
			        </div>
			        <div class="col-md-10">
			          <textarea class="form-control comments" rows = "6" id="description" name = "description" placeholder="Things to note about this applicant...." required></textarea>
			        </div>
			      </div>
			      <br>
			      <div class="row">
			        <div class="col-md-2">
			          <label for="description" class="col-sm-2 control-label">Score</label>
			        </div>
			        <div class="col-md-10">
			          <select class="form-control comments" id = "score" name = "score" required>
			            <option>1</option>
			            <option>2</option>
			            <option>3</option>
			            <option>4</option>
			            <option>5</option>
			          </select>
			          <p class="help-block">1 = Lowest, 5 = Highest</p>
			        </div>
			      </div>
			      <div class="row">
			        <div class="col-md-2 col-md-offset-10">
			          <button type="submit" class="btn btn-default comments"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Post</button>
			          <br>
			          <br>
			        </div>
			      </div>
			    </form>
			  </div>
			  <div class = "col-md-6">
			    <h3>Prior Comments</h3>
			    <table class="table table-hover table-striped">
			      <thead>
			        <tr>
			          <th>Instructor</th>
			          <th>Score</th>
			          <th>Comment</th>
			        </tr>
			      </thead>
			      <tbody>
			        <?php
			          if(isset($comments_about_user)) 
			          {
			            foreach($comments_about_user as $row) 
			            {
			              echo '<tr>';
			              echo '<td>'.$row->posted_by_pawprint.'</td>';
			              echo '<td>'.$row->score.'</td>';
			              echo '<td>'.$row->description.'</td>';
			              echo '</tr>';
			            }
			          }
			        ?>
			      </tbody>
			    </table>
			  </div>
			  <?php
			    }
			  ?>
			</div>
		</div>
	</body>
</html>