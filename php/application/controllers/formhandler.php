<?php
	
	include 'Submit_model.php';

	if(isset($_REQUEST['formSubmission']))
	{
		$errorMessage = "";
		$TAPLA = $_POST['radioTAPLA']; 
		$FName = $POST['fname'];
		$LName = $POST['lname'];
		$IdNumber = $POST['idNumber'];
		$GPA = $POST['gpa'];
		$GradDate = $POST['gradYear'];
		$GradType = $POST['gradRadio'];
		$Advisor = $POST['advisorName'];
		$Phone = $POST['phoneNumber'];
		$Email = $POST['mizzouEmail'];
		$ClassTeaching = $POST['classesTeaching']; //NEEDED IN DATABASE
		$ClassesTaught = $POST['classesTaught']; //NEEDED IN DATABASE
		$ClassesPreferred = $POST['classesPreferred']; //NEEDED IN DATABASE
		$GradeReceived = $POST['gradeReceived'];
		$OtherWork = $POST['otherWork']; //NEEDED IN DATABASE
		$Speak = $POST['speakOPT'];
		$Semester = $POST['semester'];
		$Gato = $POST['gatoRadio']; //NEEDED IN DATABASE
		$SpeakRadio = $POST['speakRadio']; //NEEDED IN DATABASE
		$InterGato = $POST['internationalGATORadio']; //NEEDED IN DATABASE
		$Onita = $POST['onitaRadio']; //NEEDED IN DATABASE
		$Sig = $POST['signature']; //NEEDED IN DATABASE
		$Date = $POST['date']; //NEEDED IN DATABASE
	

if ($errorMessage != "" ) {
echo "<p class='message'>" .$errorMessage. "</p>" ;
}

else{
	submitForm( $FName, $LName, $mizzouEmail, $idNumber, $TAPLA, $GradDate, $Speak, $Semester, $Advisor, $GPA, $Phone);
}
}


?>