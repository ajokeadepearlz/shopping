<?php

include 'includes/db.php';

include 'includes/bookhead.php';

include 'includes/function.php';

?>


<?php

define("MAX_FILE_SIZE", "2097152"); 

$ext = ["image/jpeg", "image/jpg", "image/png"];

$error = [];

if(array_key_exists('submit', $_POST)){

	
	if(empty($_FILES['pic']['name'])) {
			$error[] = "please choose a file";
	}

	if(!in_array($_FILES['pic']['type'], $ext)){

		$error['pic'] = "invalid file format";
	}

	#$print_r; exit();


	if($_FILES['pic']['size'] > MAX_FILE_SIZE){

		$error['pic'] = "FILE TOO LARGE".MAX_FILE_SIZE;
	}

	$rnd = rand(0000000000,9999999999);
	$strip_name = str_replace("_", "", $_FILES['pic']['name']);
	$filename = $rnd.$strip_name;
	$destination = "uploads/".$filename;

	if(!move_uploaded_file($_FILES['pic']['tmp_name'], $destination)){

		$error['pic'] = "file upload failed";
	}

	if(empty($errors)){
			echo "done";
		} else {
			foreach($errors as $err){
				echo $err. '</br>';
			}	


}

#$print_r; exit();




}



?>




<?php

	$error = [];
if(array_key_exists('submit', $_POST)){

	
if(empty($_POST['btitle'])){

	$error['btitle'] = "please enter the book title";

}

if(empty($_POST['bauthor'])){

	$error['bauthor'] = "please enter author"; 
}

if(empty($_POST['category'])){

	$error['category'] = "please select category id";
}

if(empty($_POST['bprice'])){

	$error['bprice'] = "enter book price";
}

if(empty($_POST['year'])){

	$error['year'] = "enter year";
}

if(empty($_POST['isbn'])){

	$error['isbn'] = "enter isbn number";
}

if(empty($error)){

$clean = array_map('trim', $_POST);

$stmt = $conn->prepare("INSERT INTO book VALUES(NULL,:bt, :au, :id, :bpr, :yr, :is, :fi)");
#bind param
$data = [

":bt" => $clean['btitle'],
":au" => $clean['bauthor'],
":id" => $clean['category'],
":bpr" => $clean['bprice'],
":yr" => $clean['year'],
":is" => $clean['isbn'],
":fi" => $destination,
];

$stmt->execute($data);
$success = "product added";
header("location:home.php?success=$success");


} 
foreach($error as $err){
	echo "<p>".$err. "</p>";
}

}

if(isset($_GET['success'])){
	echo "<p>".$_GET['success']. "</p>";
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

		</section>
	<div class="wrapper">
<!-- <form id="file" action="add_product.php" method="post" enctype="multipart/form-data"> -->
<!-- <label>PLEASE SELECT FILE</label></br> -->
<!-- <input type="file" name="pic"> -->
<!-- <input type="submit" name="submit" value="upload file"> -->

	
</form>
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>BOOK Title</th>
						<th>Author</th>
						 <th>Price</th> 
						<th>Year of publication</th> 
						<th>ISBN</th>
					</tr>
				<!-- </thead> -->
				<!-- <tbody> -->
					<!-- <tr> -->
						<!-- <td>the knowledge gap</td> -->
						<!-- <td>maja</td> -->
						<!-- <td>January, 10</td> -->
						<!-- <td><a href="#">edit</a></td> -->
						<!-- <td><a href="#">delete</a></td> -->
					</tr>
          		</tbody>
			</table>
		</div>



<form id="file/add" action="add_product.php" method="post" enctype="multipart/form-data">
<label>PLEASE SELECT FILE</label></br>
<input type="file" name="pic"></br>
</br>
</br>

<!-- <input type="submit" name="submit" value="upload file"> -->


<?php displayErrors($error, 'btitle'); ?>
<label>BOOK TITLE:</label>
<input type="text" name="btitle" placeholder="book name"/></br>
</br>

<label>AUTHOR:</label>
<input type="text" name="bauthor" placeholder="Author"/></br>
</br>

<label>category ID</label>
<select name="category">
<option>select category</option>
<?php  $stmt = $conn->prepare("SELECT * FROM categories");

$stmt->execute(); 
for($i=0; $row = $stmt->fetch(); $i++){

?>
<option value="<?php echo $row['category_id']; ?>">
<?php echo $row['category_id'];?></option>
<?php } ?></select>



<input type="hidden" name="cat_id" placeholder="category ID"></br>

<label>PRICE:</label>
<input type="text" name="bprice" placeholder="Price of book"></br>
</br>

<label>Year Of Publication</label>
<input type="text" name="year" placeholder="year"></br>
</br>

<label>ISBN</label>
<input type="text" name="isbn" placeholder="isbn"></br>
</br>

<input type="submit" name="submit" value="Add book">

	



</form>


</body>
</html>