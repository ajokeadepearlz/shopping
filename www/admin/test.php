<?php 
#test.php sandbox




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
 
}

?>

<form id="register" method="POST" enctype="multipart/form-data">

<p>please upload a file</p>
<input type="file" name="pic">
<input type="submit" name="save">

</form>

	