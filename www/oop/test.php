<?php

	include 'database.php';
	include 'class_result.php';


	$conn = new MYSQLConn();
	$stmt = $conn->prepare("SELECT * FROM admin ");

	while($row = $stmt->fetch(MYSQLResult::FETCH_ASSOC)){

		echo $row['lastname']. "<br>";
		

		
	
	}



?>