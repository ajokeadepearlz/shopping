<?php

	
	include 'includes/db.php';
	include 'includes/functions.php';
	include 'includes/header.php';


	if(array_key_exists('amount', $_POST)) {
		$clean = array_map('trim', $_POST);
		addCategory($conn, $clean);
	}
	if(array_key_exists('edit', $_POST)) {
		$clean = array_map('trim', $_POST);
		 editCategory($conn, $clean);
	}

	if(isset($_GET['success']))
		{
			echo $_GET['success'];

	}

	?>

	<div class = "wrapper">
		<div id = "stream"><br/><br/>

	<p>

	<?php
		if(isset($_GET['action'])) {
			if($_GET['action'] = "edit") {

	?>

	<h3>Edit Category</h3>
		<form id="register" method="post" action="category.php">
			  <input type="text" name="fish_name" placeholder="Category Name" value="<?php echo $_GET['fish_name']; ?>" />
			  <input type="hidden" name="fish_id" value="<?php echo $_GET['fish_id']; ?>" />
			  <input type="submit" name="edit" />
		</form>

			<?php

				}
			}

		if(isset($_GET['act'])) {
		if($_GET['act']= "delete") {
			deleteFish($conn, $_GET['fish_id']);
		}

	} 


	?>


	<h3> Add Category</h3>
		<form id="register" method="post" action="category.php">
			<input type="text" name="fish_name" placeholder="category Name" />
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
					<th>edit</th>
					<th>delete</th>

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

