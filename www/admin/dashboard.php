<?php
		session_start();

		$_SESSION['active'] = true;

		# title
		$page_title = "login";

		#include header
	include 'includes/header.php';
	include 'includes/db.php';
	include 'includes/functions.php';


	?>


		<div class="wrapper">
		<div id="stream">
			<table id="tab">
				<thead>
					<tr>
						<th>post title</th>
						<th>post author</th>
						<th>date created</th>
						<th>edit</th>
						<th>delete</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>the knowledge gap</td>
						<td>maja</td>
						<td>January, 10</td>
						<td><a href="#">edit</a></td>
						<td><a href="#">delete</a></td>
					</tr>
          		</tbody>
			</table>
		</div>

		<div class="paginated">
			<a href="#">1</a>
			<a href="#">2</a>
			<span>3</span>
			<a href="#">2</a>
		</div>
	</div>

	<section class="foot">
		<div>
			<p>&copy; 2016;
		</div>
	</section>
</body>
</html>
