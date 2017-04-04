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

			if($stmt->execute($data)){
				$sucess = 'You registration is successful, you can login now';

					header("Location:login.php?message=$sucess");


			};
	}

	function doesEmailExist($dbconn, $e) {
			$result = false;

			$stmt = $dbconn->prepare("SELECT email FROM admin WHERE email=:e");

			# bind params
			$stmt->bindParam(":e", $e);
			$stmt->execute();

			# get number of rows returned
			$count = $stmt->rowCount();

			if($count > 0) {
				$result = true;
			}

			return $result;
	}

	/* function displayErrors($dbconn, $result) {

		$result = "";

		if(isset($dbconn[$result])) {

			$result = '<span class="err">'. $dbconn[$result]. '</span>';
		}

			return $result;

		}

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

		if(doesEmailExist($_POST['email'])) {
			$errors['email'] = "email already exists";
		}

		if(empty($_POST['password'])) {
			$errors['password'] = "please enter password";
		}

		# validate confirm password
		if($_POST['password'] != $_POST['pword']) {
			$errors['pword'] = "passwords do not match";
	}	
	*/


	function doAdminLogin($dbconn, $input){
 		

	 		//INSERT DATA INTO TABLE
	 		$stmt = $dbconn->prepare("SELECT * FROM  admin WHERE email = :e  ");

	 		//bind params

	 		$stmt->bindParam(":e", $input['email']);
	 		$stmt->execute();
	 		$count = $stmt->rowCount();


	 		if($count == 1){
	 		
	 		$result = $stmt->fetch(PDO::FETCH_ASSOC);

	 		if(password_verify($input['password'],$result['hash'])){	 		

	 			header("Location:dashboard.php");
			}else{

				$errors = "Invalid Username and/or Password";
				header("Location:login.php?message=$errors");

				}														


	 		}

		}



		function addCategory($dbconn,$input){


			$stmt = $dbconn->prepare("INSERT INTO category(cat_name) VALUES (:c)");

	 		//bind params
			$stmt->bindParam(":c", $input['cat_name']);
			if($stmt->execute()){
			
			$success = "category added";
  		header("Location:category.php?message=$success");
	 		}

	}


	function showCategory($dbconn){
				$stmt = $dbconn->prepare("SELECT * FROM category ");
				 $stmt->execute();
				 $result = "";

	 		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	 			$cat_id = $row['cat_id'];
	 			$cat_name = $row['cat_name'];
	 			
	 			 $result .= "<tr>";
	 			  $result .= "<td>" .$cat_id.  "</td>";
	 			   $result .= "<td>" .$cat_name.  "</td>";

	 			 $result .=   "<td><a href='category.php?action=edit&cat_id=$cat_id&cat_name=$cat_name'>edit</a></td>";
					$result .=	 "<td><a href='category.php?act=delete&cat_id=$cat_id'>delete</a></td> ";
	 			     $result .= "</tr>";


	 		}
	  return $result;

	}


	function editCategory($dbconn,$input){

		$stmt = $dbconn->prepare("UPDATE  category SET cat_name = :cn 	WHERE cat_id = :i ");

		$stmt->bindParam(":cn", $input['cat_name']);
		$stmt->bindParam(":i", $input['cat_id']);
		 $stmt->execute();
		 	$success = "category edited!";
  		header("Location:category.php?success=$success");





	}





	function deleteCat($dbconn, $input){


		$stmt = $dbconn->prepare("DELETE FROM  category WHERE cat_id = :i ");

		$stmt->bindParam(":i", $input);
		 $stmt->execute();
		 $success = "category deleted!";
  		header("Location:category.php?message=$success");

}