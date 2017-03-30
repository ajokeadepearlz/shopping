<?php
	function doAdminRegister($dbconn, $input) {

		# hash the password
		$hash = password_hash($input['password'], PASSWORD_BCRYPT);

		# insert data
			$stmt = $conn->prepare("INSERT INTO admin(firstname, lastname, email, hash) VALUES(:fn, :ln, :e, :h)");

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


?>