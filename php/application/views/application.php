<html>
<head>
	<title>Form</title>
</head>

<body>

<h3>COMPUTER SCIENCE DEPARTMENT</h3>
<h4>GRADUATE TEACHING ASSISTANT APPLICATION</h4>
<h2>Fall 2015</h2>
<p>DeadLine:  Friday, April 3rd</p>


<form>
	TA (grad student)<input type="radio" required="" name="TAPLA" value="TA">
	PLA (undergrad student)<input type="radio" required="" name="TAPLA" value="PLA">
</br></br>
	<input placeholder="Name" type="text" required="" name="Name">
	<input placeholder="ID" type="text" required="" name="ID">
	<input placeholder="GPA" type="text" required="" name="GPA">
</br></br>
	IF UNDERGRADUATE applying for PLA, indicate program and level 
	<input placeholder="ex: CS BA jr" type="text" required="" name="ProgramLevel">
</br></br>
	IF GRADUATE
</br>
MS:<input type="radio" required="" name="Choice" value="MS">
PHD:<input type="radio" required="" name="Choice" value="PHD">
<input placeholder="Advisor's Name" type="text" required="" name="Advisor">
</br></br>
	<input placeholder="Phone Number" type="text" required="" name="Phone">
	<input placeholder="Mizzou Email Address" type="text" required="" name="Email">
</br></br>
	<input placeholder="Anticipated Graduation Date" type="text" required="" name="Graduation">
</br></br>
	<input placeholder="Course(s) Currently Teaching" type="text" required="" name="Current">
</br></br>
	<input placeholder="Course(s) Previously Taught" type="text" required="" name="Past">
</br></br>
	<input placeholder="Course(s) You Would Like To Teach (Include Grade)" type="text" required="" name="Future">
</br></br>
	<input placeholder="Other Places You Work" type="text" required="" name="Work">
</br></br>
	<input placeholder="SPEAK/OPT score, if applicable" type="text" required="" name="SPEAK">
	<input placeholder="Semester of Last Test" type="text" required="" name="Semester">
</br></br></br>	

<!--WILL NEED TO REWRITE SOME PARTS OF THIS-->
<p>Please return this form to 244 EBW along with a current resume, and note the following:
</p>
<ul>
	<li>Please list the courses that you'd like to be a TA for</li>
	
	<li>Per CS Dept. policy, GTA's must not exceed half-time total employment within the University system
including, but not limited to, the CS department</li>
	
	<li> New TAs, ITAs, and PLAs who have received an appointment, are required to participate in the GATO
(Graduate Assistant Teaching Orientation), which is offered just prior to the start of fall and winter terms. (You
do not need to attend more than once.)</li>
	Requirement Met<input type="radio" required="" name="Attended" value="Attended">
	Will attend in Aug/Jan<input type="radio" required="" name="Attended" value="WillAttend">
</br></br>
	<li>INTERNATIONAL STUDENTS, PLEASE BE AWARE OF THE FOLLOWING:</li>
	<ul>
		<li>Prior to becoming a TA, any ITA (International Teaching Assistant) who received their primary and
secondary education in a country where English is not the principal language are required by law to
be assessed for English proficiency (SPEAK test). If you do not register for and satisfy applicable
 language assessment requirements, you will not be eligible to accept a TA appointment.
Arrangements for language assessments must be made before the end of the semester prior to
accepting a TA position</li>
		Requirement Met<input type="radio" required="" name="Talk" value="TookTest">
		Registered for SPEAK<input type="radio" required="" name="Talk" value="WillTake">
		<input placeholder="(date)" type="text" required="" name="DateOfTest">
		
		<li>A potential ITA is required to have satisfactorily completed at least one semester as a student at the
University of Missouri before being considered for a TA position. </li>
	
	<li>New TAs, ITAs, and PLAs who have received an appointment, are required to participate in the GATO
(Graduate Assistant Teaching Orientation), which is offered just prior to the start of fall and winter terms.
(You do not need to attend more than once.)</li>

		Requirement Met<input type="radio" required="" name="GATO" value="TookGATO">
		Will attend in Aug/Jan<input type="radio" required="" name="GATO" value="WillGATO">
	
	<li>ONITA, is a requirement for all international TAs and PLAs who have not previously attended this
orientation. You cannot have a TA/PLA appointment until this requirement has been met. (You do not
need to attend more than once.) </li>
		Requirement Met<input type="radio" required="" name="ONITA" value="TookONITA">
		Will attend in Aug/Jan<input type="radio" required="" name="ONITA" value="WillONITA">
	</ul>
</ul>

Electronic Signature<input placeholder="Your Name Here" type="text" required="" name="Sig">
<input placeholder="Date" type="text" required="" name="date">
</br></br>

Assigned Appointment<input type="radio" required="" name="Appointment" value="HaveOne">
<input placeholder="When?" type="text" required="" name="when">
No Appointment<input type="radio" required="" name="Appointment" value="Nope">


</form>

</body>

</html>