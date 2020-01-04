<!DOCTYPE html>
<html>
	<head>
		<title>ibuy Auctions</title>
		 <meta charset="UTF-8" />
		<link rel="stylesheet" href="front-end/ibuy.css" />
	</head>

	<body>
		<h1>EDIT CATEGORY</h1>
			<form method="GET" action="/add-category/">
				<label>Category name</label> 
				<?php 
					if (isset($_GET['id']))
						echo "
							<input type=hidden name=edit value=".$_GET['id'].">
							<input name=name type=text>
						";
				?>
				<input type="submit" value="edit">
			</form>


		<footer>
			&copy; ibuy 2019
		</footer>
	</body>
</html>