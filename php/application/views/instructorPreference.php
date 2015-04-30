<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">
		<title>Preference</title>
		<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
		<link href="<?php echo base_url(); ?>css/bespoke.css" rel="stylesheet">
	</head>
	<body>
		<?php
			include 'nav.php';
		?>
		<div class="container">
			<div class="page-header">
				<h2>Preferences </h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Current Preferenced Students</h3>
					<table class="table table-hover table-striped">
                    <thead>
                    	<tr>
                    		<th>Name</th>
                    		<th>Preference</th>
                    	</tr>
                    </thead>
                    <tbody>
                    	<?php 
                    		if(isset($preferenced_forms)) {
                    			foreach($preferenced_forms as $row) {
                    				echo '<tr>';
									echo '<td>'.$row->first_name.' '.$row->last_name.'</td>';
									echo '<td>'.$row->preference_number.'</td>';
									echo '</tr>';
                    			}
                    		}
                    	?>
					</tbody>
                    </table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Applicants that Preferenced This Course</h3>
					<table class="table table-hover table-striped">
                    <thead>
                    	<tr>
                    		<th>Preference</th>
                    		<th>Name</th>
                    		<th>Grade</th>
                    	</tr>
                    </thead>
                    <tbody>
						<tr>
							<td>
								<div class="col-md-2">
									<select class="form-control">
		                    			<option>1</option>
		                    			<option>2</option>
		                    			<option>3</option>
		                    			<option>4</option>
		                    			<option>5</option>
	                    			</select>
                    			</div>
							</td>
							<td>Tim</td>
							<td>5</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-2">
									<select class="form-control">
		                    			<option>1</option>
		                    			<option>2</option>
		                    			<option>3</option>
		                    			<option>4</option>
		                    			<option>5</option>
	                    			</select>
                    			</div>
							</td>
							<td>Nick</td>
							<td>3</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-2">
									<select class="form-control">
		                    			<option>1</option>
		                    			<option>2</option>
		                    			<option>3</option>
		                    			<option>4</option>
		                    			<option>5</option>
	                    			</select>
                    			</div>
							</td>
							<td>Mike</td>
							<td>1</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-2">
									<select class="form-control">
		                    			<option>1</option>
		                    			<option>2</option>
		                    			<option>3</option>
		                    			<option>4</option>
		                    			<option>5</option>
	                    			</select>
                    			</div>
							</td>
							<td>John</td>
							<td>1</td>
						</tr>
					</tbody>
                    </table>
				</div>
			</div>
		</div>
	</body>
</html>