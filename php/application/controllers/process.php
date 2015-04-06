<?php session_start();

	//not sure how to connect to db
	//but i figured $conn could be the handle for the database connection agent
	//these scripts were written for a different class, but i ported them over

	/*

		I'm trying to leave as many notes around so that way what I did here doesn't seem archaic and just 'bad'.
		I figure we can check the session variables on page load, and check if they are empty, and do certain things
		from there. 

		Generally; if anything needs to be modified or changed, let me know. I can take care of it after my
		exam tomorrow, I would hate for someone else to have to cover my work that I said I would take care of.
		Unless someone is truly feeling up to taking care of it, then by all means go for it. 

	*/

	if(!$conn){
		echo "<h1>There was a problem connecting</h1>"; 
	}

	if(!empty($_SESSION['username'])){
		header("location:../views/welcome.php"); 
	}

	if(isset($_POST['register'])){
		if(empty($_POST['pawprint']) || empty($_POST['passwordinput'])){
			$_SESSION['regError'] = "The username or password field were blank!"; 
			header("location:../views/welcome.php"); 
		}

		$username = htmlspecialchars($_POST['pawprint']); 
		$password = htmlspecialchars($_POST['passwordinput']);
		$salt = uniqid(mt_rand(), false);
		$saltedPass = hash("sha1", $password . $salt); 

		$res = regUser($conn, $username, $saltedPass, $salt); 
		if($res){
			unset($_POST); 
			$_SESSION['pawprint'] = $username; 
			header("location:../views/welcome.php"); 
		}
	} 

	if(isset($_POST['login'])){

		if(empty($_POST['pawprint']) || empty($_POST['passwordinput'])){
			//$_SESSION['error'] = "Username or password field was blank!"; 
			header("location:../views/welcome.php"); 
		}

		$username = htmlspecialchars($_POST['pawprint']); 
		$password = htmlspecialchars($_POST['passwordinput']);   
		$newPass = trim($password); 

		//modify logIn call

		$res = logIn($conn, $username, $password); 
		if($res){
			unset($_POST); 
			$_SESSION['username'] = $username; 
			header("location:../views/welcome.php"); 
		}else{
			$_SESSION['error'] = "Invalid username or password"; 
			header("location:../views/welcome.php"); 
		}
	}

	function logIn($conn, $username, $password){

		//prepared statments for mysql
		//using $conn again as the connection agent, I'm not 100% if this is how it should be done; but since I don't exactly know how to 
		//manage the connection, this is what I'm doing for now

		$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
		$stmt->bind_param("ss", $username, $password);
		$stmt->execute();

		$result; 

		$stmt->bind_result($result);
		$stmt->fetch();

		$data = $stmt->fetch();

		$passSalt = $data['salt'];
		$dbPass = $data['password'];

		$saltedPass = hash("sha1", $password . trim($passSalt));

		if($saltedPass == $dbPass){
			return true; 
		}else{
			return false; 
		}

		/*

			I'm not exactly sure if this is 100% correct, as I said before, I'm trying to study for this test
			tomorrow; but if it's not completely correct, feel free to edit it. I'm not a super database guru 
			so I sometimes have a hard time writing correct statements and quering the database correctly

		*/

	}


	function regUser($conn, $username, $saltedPass, $salt){
		
		$stmt = $conn->prepare("INSERT INTO users (username, salt, password) VALUES (?, ?, ?);");
		$stmt->bind_param("sss", $username, $salt, $password);
		$stmt->execute();

		$result; 

		$stmt->bind_result($result);
		$stmt->fetch();

		if($result){
			return true; 
		}else{
			return false; 
		}


		/*
			As with the other function; this one may not be written completely correct. If changes need to be made
			or the entire thing needs to be rewritten, it can either be changed, or you can let me know and I can 
			work on it some more after the 4050 test. I'm just stressing about it hardcore and don't want to 
			mess up on it, but I also don't want to leave you guys hanging with nothing. 

			Hopefully what I have here isn't too terrible or hard to understand. 
		*/

	}

?>