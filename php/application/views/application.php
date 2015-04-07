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
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jumbotron.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
</head>

<body>
	<div class="container">
      <div class="page-header">
        <h2>Application</h2>
      </div>
	</div>
	<div class = "container">
		<form class="form-inline">
			<div class = "row">
				<div class = "col-md-6">
					<input type="radio" required="" name="TA" value="TA">
					<label for="TA">Teaching Assistant (Graduate Students)</label>
				</div>
				<div class = "col-md-6">
					<input type="radio" required="" name="PLA" value="PLA">
					<label for="PLA">Peer Learning Assistant (Undergraduate Students)</label>
				</div>
			</div>
			<br>
		  <div class="row">
				<div class = "col-md-4">
			    <label for="name">Name: </label>
			    <input type="text" class="form-control" id="name" placeholder="John Doe">
				</div>
				<div class = "col-md-4">
			    <label for="idNumber">ID Number: </label>
			    <input type="text" class="form-control" id="idNumber" placeholder="14359687">
				</div>
				<div class = "col-md-4">
			    <label for="gpa">GPA: </label>
			    <input type="text" class="form-control" id="gpa" placeholder="3.487">
				</div>
		  </div>
			<br>
			<div class = "row">
				<div class = "col-md-12">
			    <label for="plaInfo">If undergraduate applying for PLA, indicate program and level: </label>
			    <input type="text" class="form-control" id="plaInfo" placeholder="CS BA jr">
				</div>
			</div>
			<br>
			<div class = "row">
				<div class = "col-md-1">
					<p><b>If gradute: </b></p>
				</div>
				<div class = "col-md-3">
					<input type="radio" required="" name="masters" value="masters">
					<label for="masters">Master's </label>
				</div>
				<div class = "col-md-3">
					<input type="radio" required="" name="doctorate" value="doctorate">
					<label for="doctorate">Doctorate</label>
				</div>
				<div class = "col-md-5">
			    <label for="advisorName">Advisor's Name: </label>
			    <input type="text" class="form-control" id="advisorName" placeholder="John Doe">
				</div>
			</div>
			<br>
			<div class = "row">
				<div class = "col-md-6">
			    <label for="phoneNumber">10 Digit Phone Number: </label>
			    <input type="text" class="form-control" id="phoneNumber" placeholder="5738675309">
				</div>
				<div class = "col-md-6">
			    <label for="mizzouEmail">Mizzou Email Address: </label>
			    <input type="text" class="form-control" id="mizzouEmail" placeholder="abc123@mail.missouri.edu">
				</div>
			</div>
			<br>
			<div class = "row">
				<div class = "col-md-6">
			    <label for="phoneNumber">Expected Graduation Date: </label>
					<select class="form-control">
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
			<div class = "row">
				<label for="classesTeaching">Classes You Are Currently Teaching:</label><br>
				<label><input type = "checkbox" name = "classes"> CS1000: Intro to CS</label><br>
				<label><input type = "checkbox" name = "classes"> CS1001: Topics in CS</label><br>
				<label><input type = "checkbox" name = "classes"> CS1040: Intro to Problem Solving & Programming</label><br>
				<label><input type = "checkbox" name = "classes"> CS1050: Algorithm Design and Programming 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS2001: Topics in CS</label><br>
				<label><input type = "checkbox" name = "classes"> CS2050: Algorithm Design and Programming 2</label><br>
				<label><input type = "checkbox" name = "classes"> CS2111: Production Languages</label><br>
				<label><input type = "checkbox" name = "classes"> CS2270: Intro to Ditgal Logic</label><br>
				<label><input type = "checkbox" name = "classes"> CS2830: Intro to the Internet, WWW & Multimedia Systems</label><br>
				<label><input type = "checkbox" name = "classes"> CS3001: Topics in CS</label><br>
				<label><input type = "checkbox" name = "classes"> CS3050: Advanced Algorithm Design</label><br>
				<label><input type = "checkbox" name = "classes"> CS3270: Intro to Digital Logic</label><br>
				<label><input type = "checkbox" name = "classes"> CS3280: Computer Organization & Assembly Language</label><br>
				<label><input type = "checkbox" name = "classes"> CS3330: Object Oriented Programming</label><br>
				<label><input type = "checkbox" name = "classes"> CS3380: Database Applications and Information Systems</label><br>
				<label><input type = "checkbox" name = "classes"> CS3530: Unix Operating System</label><br>
				<label><input type = "checkbox" name = "classes"> CS4001: Topics in CS</label><br>
				<label><input type = "checkbox" name = "classes"> CS4050: Design and Analysis of Algorithms 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4060: String Algorithms</label><br>
				<label><input type = "checkbox" name = "classes"> CS4070: Numerical Methods for Science and Engineering</label><br>
				<label><input type = "checkbox" name = "classes"> CS4085: Problems in CS</label><br>
				<label><input type = "checkbox" name = "classes"> CS4270: Computer Architecture 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4280: Network Systems Architecture</label><br>
				<label><input type = "checkbox" name = "classes"> CS4320: Software Engineering 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4330: Object Oriented Design 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4380: Database Management Systems 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4410: Theory of Computation 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4430: Compilers 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4440: Malware Analysis and Defense</label><br>
				<label><input type = "checkbox" name = "classes"> CS4450: Principles of Programming Languages</label><br>
				<label><input type = "checkbox" name = "classes"> CS4520: Operating Systems 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4610: Computer Graphics 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4620: Physically Based Modeling & Animation</label><br>
				<label><input type = "checkbox" name = "classes"> CS4650: Digital Image Processing</label><br>
				<label><input type = "checkbox" name = "classes"> CS4670: Digital Image Compression </label><br>
				<label><input type = "checkbox" name = "classes"> CS4720: Intro to Machine Learning & Pattern Recognition</label><br>
				<label><input type = "checkbox" name = "classes"> CS4730: Building Intelligent Robots</label><br>
				<label><input type = "checkbox" name = "classes"> CS4740: Interdisc. Intro to Natural Language Processing</label><br>
				<label><input type = "checkbox" name = "classes"> CS4750: Artificial Intelligence 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4770: Intro to Computational Intelligence</label><br>
				<label><input type = "checkbox" name = "classes"> CS4830: Science and Engineering of the World Wide Web</label><br>
				<label><input type = "checkbox" name = "classes"> CS4850: Computer Networks 1</label><br>
				<label><input type = "checkbox" name = "classes"> CS4860: Network Security</label><br>
				<label><input type = "checkbox" name = "classes"> CS4970: Senior Capstone Design</label><br>
				<label><input type = "checkbox" name = "classes"> CS4980: Senior Capstone Design 2</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc1040 Intro to Problem Solving and Programming</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc1610: Intro to Entertainment Media</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc2001: Topics in IT</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc2600: Digital Multimedia</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc2610: Audio/Video 1</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc2620: Computer Modeling & Animation 1</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc2810: Fundamentals of Network Technology</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc2910: Cyber Security</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc3001: Topics in IT</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc3610: Audio/Video 2</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc3620: Computer Modeling & Animation 2</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc3630: Intro to Game Design</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc3640: Digital Effects</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc3850: Computer System Administration</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc4001: Topics in IT</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc4390: Database Administration</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc4440: C#/.NET Development</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc4500: Team-based Mobile Application Development</label><br>
				<label><input type = "checkbox" name = "classes"> InfoTc4640: Digital Effects 2</label><br>
				<label><input type="checkbox" name = "classes"> CS7001: Topics in CS</label><br>
				<label><input type="checkbox" name = "classes"> CS7010: Computational Methods in Bioinformatics</label><br>
				<label><input type="checkbox" name = "classes"> CS7050: Design & Analysis of Algorithms 2</label><br>
				<label><input type="checkbox" name = "classes"> CS7060: String Algorithms</label><br>
				<label><input type="checkbox" name = "classes"> CS7070: Numerical Methods for Science and Engineering</label><br>
				<label><input type="checkbox" name = "classes"> CS7270: Computer Architecture 1</label><br>
				<label><input type="checkbox" name = "classes"> CS7280: Network Systems Architecture</label><br>
				<label><input type="checkbox" name = "classes"> CS7320: Software Engineering 1</label><br>
				<label><input type="checkbox" name = "classes"> CS7380: Database Management Systems 1</label><br>
				<label><input type="checkbox" name = "classes"> CS7410: Theory of Computation 1</label><br>
				<label><input type="checkbox" name = "classes"> CS7430: Compilers 1</label><br>
				<label><input type="checkbox" name = "classes"> CS7440: Malware Analysis and Defense</label><br>
				<label><input type="checkbox" name = "classes"> CS7450: Principles of Programming Languages</label><br>
				<label><input type="checkbox" name = "classes"> CS7520: Operating Systems 1</label><br>
				<label><input type="checkbox" name = "classes"> CS7610: Computer Graphics 1</label><br>
				<label><input type="checkbox" name = "classes"> CS7620: Physically Based Modeling and Animation</label><br>
				<label><input type="checkbox" name = "classes"> CS7650: Digital Image Processing</label><br>
				<label><input type="checkbox" name = "classes"> CS7670: Digital Image Compression</label><br>
				<label><input type="checkbox" name = "classes"> CS7720: Intro to Machine Learning and Pattern Recognition</label><br>
				<label><input type="checkbox" name = "classes"> CS7730: Building Intelligent Robots</label><br>
				<label><input type="checkbox" name = "classes"> CS7740: Interdisc Intro to Natural Language Processing</label><br>
				<label><input type="checkbox" name = "classes"> CS7750: Artificial Intelligence 1</label><br>
				<label><input type="checkbox" name = "classes"> CS7770: Intro to Computational Intelligence</label><br>
				<label><input type="checkbox" name = "classes"> CS7830: Science and Engineering of the World Wide Web</label><br>
				<label><input type="checkbox" name = "classes"> CS7850: Computer Networks 1</label><br>
				<label><input type="checkbox" name = "classes"> CS7860: Network Security</label><br>
				<label><input type="checkbox" name = "classes"> CS8001: Advanced Topics in CS</label><br>
				<label><input type="checkbox" name = "classes"> CS8050: Design and Analysis of Algorithms 3</label><br>
				<label><input type="checkbox" name = "classes"> CS8060: Survey of Advanced Algorithm Techniques</label><br>
				<label><input type="checkbox" name = "classes"> CS8085: Problems in CS</label><br>
				<label><input type="checkbox" name = "classes"> CS8090: Computational Geometry</label><br>
				<label><input type="checkbox" name = "classes"> CS8110: Problem Solving in Bioinformatics</label><br>
				<label><input type="checkbox" name = "classes"> CS8120: Structural Bioinformaticsy of Proteins, Complexes, Systems</label><br>
				<label><input type="checkbox" name = "classes"> CS8130: Computational Genomics</label><br>
				<label><input type="checkbox" name = "classes"> CS8150: Integrative Methods in Bioinformatics</label><br>
				<label><input type="checkbox" name = "classes"> CS8180: Machine Learning Methods for Biomedical Informatics</label><br>
				<label><input type="checkbox" name = "classes"> CS8190: Computational Systems Biology</label><br>
				<label><input type="checkbox" name = "classes"> CS8370: Data Mining and Knowledge Discovery</label><br>
				<label><input type="checkbox" name = "classes"> CS8390: Information Indexing and Retrieval</label><br>
				<label><input type="checkbox" name = "classes"> CS8440: Information Security -- A Language-Based Approach</label><br>
				<label><input type="checkbox" name = "classes"> CS8520: Operating Systems 2</label><br>
				<label><input type="checkbox" name = "classes"> CS8610: Computer Graphics 2</label><br>
				<label><input type="checkbox" name = "classes"> CS8620: Physically Based Modeling and Animation 2</label><br>
				<label><input type="checkbox" name = "classes"> CS8630: Data Visualization</label><br>
				<label><input type="checkbox" name = "classes"> CS8660: Multimedia Security</label><br>
				<label><input type="checkbox" name = "classes"> CS8670: Multimedia Communication</label><br>
				<label><input type="checkbox" name = "classes"> CS8690: Computer Vision</label><br>
				<label><input type="checkbox" name = "classes"> CS8725: Supervised Learning</label><br>
				<label><input type="checkbox" name = "classes"> CS8750: Artificial Intelligence 2</label><br>
				<label><input type="checkbox" name = "classes"> CS8770: Neural Networks</label><br>
				<label><input type="checkbox" name = "classes"> CS8790: Filtering, Tracking, and Data Fusion</label><br>
				<label><input type="checkbox" name = "classes"> CS8850: Computer Networks 2</label><br>
				<label><input type="checkbox" name = "classes"> CS8860: Parallel & Distrubuted Processing</label><br>
				<label><input type="checkbox" name = "classes"> CS8880: Wireless Embedded Systems</label><br>
			</div>
		</form>
	</div>

	<form>


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
