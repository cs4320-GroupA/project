<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Account Creation</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include 'nav.php';
		?>
		<div class="container">
			<div class="page-header">
				<h2>Account Creation</h2>
			</div>
		</div>
		<div class="container">
			<form method="POST" class="form-horizontal" action=<?php echo base_url().'index.php/adminAccountCreationController/createAccount/'; ?>>
				<div class="form-group">
					<label for="adminID" class="col-sm-2 control-label">Admin Pawprint</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="adminID" name="adminID" placeholder="Admin Pawprint">
					</div>
				</div>
				<div class="form-group">
					<label for="adminPassword" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-8">
						<input type="password" class="form-control" name="password" id="adminPassword" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Register a New Admin Account</button>
					</div>
				</div>
			</form>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	</body>
</html>
