<?php

		session_start();
		
		$_SESSION['active'] = true;
		$_SESSION ['cat_page'] = true;
	
	include 'includes/db.php';
	include 'includes/functions.php';
	include 'includes/header.php';


	if(array_key_exists('add', $_POST)) {
		$clean = array_map('trim', $_POST);
		addCategory($conn, $clean);
	}
	if(array_key_exists('edit', $_POST)) {
		$clean = array_map('trim', $_POST);
		 editCategory($conn, $clean);
	}

	

	?>

	<div class = "wrapper">
		<div id = "stream"><br/><br/>

	<p>




	<?php

if(isset($_GET['message']))
		{
			echo $_GET['message'];

	}


		if(isset($_GET['action'])) {
			if($_GET['action'] = "edit") {

	?>

	<h3>Edit Category</h3>
	
		<form id="register" method="post" action="category.php">
			  <input type="text" name="cat_name" placeholder="Category Name" value="<?php echo $_GET['cat_name']; ?>" />
			  <input type="hidden" name="cat_id" value="<?php echo $_GET['cat_id']; ?>" />
			  <input type="submit" name="edit" value="edit" />
		</form>

			<?php

				}
			}

		if(isset($_GET['act'])) {
		if($_GET['act']= "delete") {
			deleteCat($conn, $_GET['cat_id']);
		}

	} 


	?>


	<h3> Add Category</h3>
		<form id="register" method="post" action="category.php">
			<input type="text" name="cat_name" placeholder="category Name" />
			<input type="submit" name="add" value="Add">
		</form>
		</p><br/><br/>

		<hr>

		<h3>Categories Available</h3>
			<table id="tab">
				<thead>
					<tr>

					<th>Category Id</th>
					<th>Category Name</th>
					<th>Edit</th>
					<th>Delete</th>

					</tr>
				</thead>
				<tbody>
					 <?php $view = showCategory($conn); echo $view; ?>
				</tbody>
			</table>


			</div>

			<div class="paginated">
			<a href="#">1</a>
			<a href="#">2</a>
			<span>3</span>
			<a href="#">2</a>

		</div>

		<?php include 'includes/footer.php' ?>
			</div>

