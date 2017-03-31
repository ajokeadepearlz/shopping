<?php

# title
	$page_title = "login";

#include header
	include 'includes/header.php';
	include 'includes/db.php';

?>

<?php

if(array_key_exists('login', $_POST)) {
	errors = [];

	if(empty($_POST['email'])) {
		$errors['email'] = "please enter email";

	if(empty($_POST['password'])) {
		$errors['password'] = "please enter password";

		}

		$clean = array_map('trim', $_POST);

		$hash = password_hash($clean['password'], PASSWORD_BCRYPT);

		$stmt = $conn->prepare("SELECT * FROM admin WHERE email = '".$clean['email']. "' AND password = '".$hash."'");
		$stmt->execute();

		# get number of rows returned
		$count = $stmt->rowCount();

		if ($count > 0) {

			while ($result = mysqli_fetch_array($stmt)) {

				# establish session for the admin
				$_SESSION['id'] = $result['admin_id'];
				$_SESSION['admin_name'] = $result['firstname'].' '.$result['lastname'];


			header("Location:register.php");

			}
		} else { # if record is not = 1
			$login_error = "invalid email and/or password";
			header("Location:login.php?login_error=$login_error");

		}
		

		if(isset($_GET['login_error'])) {
				echo $_GET['login_error'];
	}


?>

		<?php

		echo "<p>Admin ID:<strong>".$_SESSION['id']."</strong></p>";
		echo "<p>Admin Name:<strong>".$_SESSION['admin_name']."</strong></p>";

		?>

<div class="wrapper">
		<h1 id="register-label">Admin Login</h1>
		<hr>
		<form id="register"  action ="login.php" method ="POST">
			<div>
				<label>email:</label>
				<input type="text" name="email" placeholder="email">
			</div>
			<div>
				<label>password:</label>
				<input type="password" name="password" placeholder="password">
			</div>

			<input type="submit" name="register" value="login">
		</form>

		<h4 class="jumpto">Don't have an account? <a href="register.php">register</a></h4>
	</div>

	<?php

	#include footer
	include 'includes/footer.php';

?>
