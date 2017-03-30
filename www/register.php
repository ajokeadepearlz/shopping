<?php

	# title
	$page_title = "register";

	# load db connection
	include 'includes/db.php';


	#include header
	include 'includes/header.php';

	if(array_key_exists('register', $_POST)) {
		# cache errors
		$errors = [];

		# validate first name
		if(empty($_POST['fname'])) {
			$errors['fname'] = "please enter a first name";
		}

		if(empty($_POST['lname'])) {
			$errors['lname'] = "please enter last name";
		}

		if(empty($_POST['email'])) {
			$errors['email'] = "please enter email";
		}

		if(empty($_POST['password'])) {
			$errors['password'] = "please enter password";
		}

		if($_POST['password'] = $_POST['pword']) {
			$errors['pword'] = "passwords do not match";
		}

		if(empty($errors)) {

			// do database stuff

			# eliminate unwanted spaces values in the $_POST array
			$clean = array_map('trim', $_POST);

			# harsh the password
			$harsh = password_harsh($clean['password'], PASSWORD_BCRYPT);

			# insert data
			$stmt = $conn->prepare("INSERT INTO admin(firstname, lastname, email, harsh) VALUES(:fn, :ln, :e, :h)");

			# bind params...
			$data = [
					':fn' => $clean['fname'],
					':ln' => $clean['lname'],
					':e' => $clean['email'],
					':h' => $clean['password'],

					];

					$stmt->execute($data);


		}
		
	}
?>

<div class="wrapper">

		<h1 id="register-label">Admin Register</h1>
		<hr>
		<form id="register"  action ="register.php" method ="POST">
			<div>

			<?php
				if(isset($errors['fname'])) { echo '<span class="err">'. $errors['fname']. '</span>'; }

			?>
				<label>first name:</label>
				<input type="text" name="fname" placeholder="first name">
			</div>
			<div>
				<label>last name:</label>	
				<input type="text" name="lname" placeholder="last name">
			</div>

			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>
 
			<div>
				<label>confirm password:</label>	
				<input type="password" name="pword" placeholder="password">
			</div>

			<input type="submit" name="register" value="register">
		</form>

		<h4 class="jumpto">Have an account? <a href="login.php">login</a></h4>
	</div>

	<?php

	#include footer
	include 'includes/footer.php';

	?>