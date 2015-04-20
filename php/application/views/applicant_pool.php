<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<link rel="stylesheet" type="text/css" href="CSS/applicant_view.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body onload='test()'>

	<!-- This list would be populated automatically using database queries to fill out the data -->

	<div id='potential'>
		<h2>Potential Applicants</h2>
		<ul>
			<li onclick='select()' class='applicant'>Applicant #1</li>
			<li onclick='select()' class='applicant'>Applicant #2</li>
			<li onclick='select()' class='applicant'>Applicant #3</li>
			<li onclick='select()' class='applicant'>Applicant #4</li>
		</ul>
		<button id='sendToDesired' onclick='send(applicants)'>TEST</button>
	</div>

	<div id='desired'>
		<h2>Desired Applicants</h2>
		<ul>

		</ul>
	</div>

	<script type="text/javascript">

	var applicants = []; 

	function test(){
		$(".applicant").mouseover(function(){
			$(this).css("background-color", "blue");
		});

		$(".applicant").mouseleave(function(){
			$(this).css("background-color", "white");
		});
	}

	function select(){
		var isColored;

		console.log(isColored);

		if(isColored == 1){
			$(".applicant").click(function(){
				$(this).css("color", "black");
				isColored = 0; 
			});
		}else{
			$(".applicant").click(function(){
				$(this).css("color", "red");
				$("#sendToDesired").css("display", "inline");
				$("#assignToDesired").css("display", "inline");
					assign($(this).html());
				isColored = 1; 
			});
		}
	}

	function send(applicants){
		//this should parse out the applicants and set them to the other active list. 
		//this is more complicated than i initally had thought. 

		var index = 0;
		for(index = 0; index < applicants.length; index++){
			$("#desired > ul").append(applicants[index]);
		}
	}

	function assign(applicant){
		applicants[applicants.length] = applicant; 
	}

	//OTHER SIDE OF SPECTRUM; NEED TO BE ABLE TO REMOVE THEM IF NEED BE

	</script>

</body>
</html>