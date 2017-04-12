<!DOCTYPE html>
<html>
<head>
	<title><?php echo $page_title; ?></title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<section>
		<div class="mast">
			<h1>T<span>SSB</span></h1>


			<?php

if(isset($_SESSION['active']) && $_SESSION['active']){

?>
	
			<nav>
				<ul class="clearfix">
					<li><a href="dashboard.php" class="selected">Dashboard</a></li>
					<li><a href="category.php">Categories</a></li>
					<li><a href="product.php">Products</a></li>
					<li><a href="add_products.php">Add Products</a></li>
				</ul>
			</nav>
		
	<?php }



	?>

	</div>
	</section>



