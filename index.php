<?php

	require ('form_validator.php');
/*
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	
*/	
	if(isset($_POST['submit'])){ 
		$validation = new FormValidator($_POST);
		$errors = $validation->validateForm();
		
		foreach ($errors as $err)		
		echo "$err <br>";
		
	} 
	
?>
	<!doctype html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport"
			  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>FormValidator</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	</head>
	<body>

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">

				<form method="post">

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" name="username" value="Ivanov"  placeholder="Required field">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" name="email" value="ivanov@gmail.com"  placeholder="Required field">
					</div>
					
					<div class="form-group">
						<label>URL:</label>
						<input type="url" class="form-control" name="url" value="https://www.google.com/">
					</div>
					
					<div class="form-group">
						<label>Message</label>
						<input type="text" class="form-control" name="message" value="Test message"  placeholder="Required field">
					</div>		
					<div class="form-group">									
						<p>Make a choise:</p>
						<input type="checkbox" name="question[]" value="yes">yes
						<input type="checkbox" name="question[]" value="maybe">maybe 
						<input type="checkbox" name="question[]" value="no">no
						<input type="checkbox" name="question[]" value="perhaps">perhaps						
						<input type="checkbox" name="question[]" value="probably">probably 						
					</div>
					
					<input type="submit" name="submit" value="Send" class="btn btn-primary">
				</form>			
			</div>

		</div>
	</div>

	</body>
	</html>