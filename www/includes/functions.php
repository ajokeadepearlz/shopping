<?php
	function doAdminRegister($dbconn, $input) {

		# hash the password
		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

		# insert data
			$stmt = $dbconn->prepare("INSERT INTO admin(firstname, lastname, email, hash) VALUES(:fn, :ln, :e, :h)");

			#bind params...
			$data = [
				':fn' => $input['fname'],
				':ln' => $input['lname'],
				':e' => $input['email'],
				':h' => $hash

			];

			$stmt->execute($data);
	}

	function doesEmailExist($dbconn, $email) {
			$result = false;

			$stmt = $dbconn->prepare("SELECT email FROM admin WHERE email=:e");

			# bind params
			$stmt->bindParam(":e", $email);
			$stmt->execute();

			# get number of rows returned
			$count = $stmt->rowCount();

			if($count > 0) {
				$result = true;
			}

			return $result;
	}

	function displayError($dbconn, $result){

		$result = [];

		if(empty($result)) {

			# validate firstname
		if(empty($_POST['fname'])) {
			$errors['fname'] = "please enter first name";
		}

		if(empty($_POST['lname'])) {
			$errors['lname'] = "please enter last name";
		}

		if(empty($_POST['email'])) {
			$errors['email'] = "please enter email address";
		}

		if(doesEmailExist($conn, $_POST['email'])) {
			$errors['email'] = "email already exists";
		}

		if(empty($_POST['password'])) {
			$errors['password'] = "please enter password";
		}

		# validate confirm password
		if($_POST['password'] != $_POST['pword']) {
			$errors['pword'] = "passwords do not match";
		}
	}	
	
}

function fileuploads($in, $amp, $tom) {

	

define("MAX_FILE_SIZE", "2097152");

# allowed extention...
$ext = ["image/jpg", "image/jpeg", "image/png"];

if(array_key_exists('save', $_POST)) {
	$errors = [];
	
	#be sure a file was seLected..

	if(empty($_FILES['pic']['name'])) {
		$errors[] = "please choose a file";

	}

	# check file size...

	if($_FILES['pic']['size'] > MAX_FILE_SIZE) {
		$errors[] = "file size exceeds maximum. maximum: ". MAX_FILE_SIZE;
}

# check extension...
if(!in_array($_FILES['pic']['type'], $ext)) {
	$errors[] = "invalid file type";

}

# generate random number to append
$rnd = rand(00000, 99999);

# strip filename for spaces
$strip_name = str_replace(" ", "_", $_FILES['pic']['name']);

$filename = $rnd.$strip_name;
$destination = 'uploads/'.$filename;

if(!move_uploaded_file($_FILES['pic']['tmp_name'], $destination)) {
	$errors[] = "file upload failed";

}

if(empty($errors)) {
	echo "done";
} else {
	foreach ($errors as $err) {
		echo $err. '</br>';
		# code...
	     }
    }

 }





?>

